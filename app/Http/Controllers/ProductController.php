<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Product management
 *
 * APIs for managing products and get products info
 */
class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     * Apply ProductPolicy
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }*/


    /**
     * Return a json listing of the products.
     *
     * @queryParam offset integer Point in the array where to start the set of returned data. Default 0. If specified limit must be specified too. No-example
     * @queryParam limit integer Number of products to return. Default all. If specified offset must be specified too. No-example
     * @queryParam region integer Id of the region the returned products must be in Example: 1
     * @queryParam category integer Id of the category the returned products must belong to Example: 1
     * @queryParam search string Terms researched in the product's name No-example
     * @queryParam max_price integer Maximum price of the returned products Example: 300
     * @queryParam min_price integer Minimum price of the returned products Example: 10
     * @queryParam sorting string Sorting options, defaults to order by id. Existing options : price_asc price_desc alphabet_asc alphabet_desc. Example: price_asc
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('regions', 'regions.id', '=', 'products.region_id')
            ->select('products.*', 'categories.name AS category_name', 'regions.name AS region_name')
            ->region()
            ->category()
            ->search()
            ->maxPrice()
            ->minPrice();

        if((!empty(request()->offset) || request()->offset == 0) && !empty(request()->limit) 
        && intval(request()->offset) >= 0 && intval(request()->limit) > 0) {

            $products = $products->offset(intval(request()->offset))
            ->limit(intval(request()->limit));
        }

        switch(request()->sorting) {
            case 'price_asc' :
                $products = $products->orderBy('products.price');
                break;
            case 'price_desc' :
                $products = $products->orderByDesc('products.price');
                break;
            case 'alphabet_asc' :
                $products = $products->orderBy('products.name');
                break;
            case 'alphabet_desc' :
                $products = $products->orderByDesc('products.name');
                break;
            default :
                $products = $products->orderBy('id');
        }

        $products = $products->get();

        return response()->json($products, 200);
    }

    /**
     * Store a newly created product in database storage.
     * Return the product info as json
     * 
     * @bodyParam name string required Name of the product, must be unique and between 10 and 45 characters.
     * @bodyParam description string required Description of the product, must be 1000 characters maximum.
     * @bodyParam price number required Price of the product, must be numeric and positive.
     * @bodyParam quantity int required Quantity in stock of the product, must be an integer and positive.
     * @bodyParam image string required URL link for the photo of the product, must be a valid URL.
     * @bodyParam category_id int required The id of the category the product belongs to, must exist in categories table.
     * @bodyParam region_id int required The id of the region where the product is, must exist in regions table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:10|max:45|unique:products,name',
            'description' => 'required|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id',
            'region_id' => 'required|exists:regions,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 500);
        }

        $product = Product::create($request->all());

        return $this->show($product);

        //return response()->json($product, 201);
    }

    /**
     * Return a json of the product info corresponding to specified id.
     *
     * @urlParam product integer required The ID of the product.
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $productFullInfo = Product::leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('regions', 'regions.id', '=', 'products.region_id')
        ->where('products.id', '=', $product->id)
        ->select('products.*', 'categories.name AS category_name', 'regions.name AS region_name')
        ->first();

        return $productFullInfo;
    }

    /**
     * Update the product specified by id in database storage.
     * Return a json of the product info.
     *
     * @bodyParam name string Name of the product, must be unique and between 10 and 45 characters.
     * @bodyParam description string Description of the product, must be 1000 characters maximum.
     * @bodyParam price number Price of the product, must be numeric and positive.
     * @bodyParam quantity int Quantity in stock of the product, must be an integer and positive.
     * @bodyParam image string URL link for the photo of the product, must be a valid URL.
     * @bodyParam category_id int The id of the category the product belongs to, must exist in categories table.
     * @bodyParam region_id int The id of the region where the product is, must exist in regions table.
     * 
     * @urlParam product integer required The ID of the product.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'min:10|max:45|unique:products,name,' . $product->id,
            'description' => 'max:1000',
            'price' => 'numeric|min:0',
            'quantity' => 'integer|min:0',
            'category_id' => 'exists:categories,id',
            'region_id' => 'exists:regions,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 500);
        }

        $product->update($request->all());

        return $this->show($product);
    }

    /**
     * Remove the product specified by id from database storage.
     * Return json with removed product id in 'id' key and action performed in 'action' key.
     *
     * @urlParam product integer required The ID of the product.
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $productId = $product->id;
        $product->delete();

        return response()->json(['action' => 'deleted product', 'id' => $productId], 200);
    }

    /**
     * Return the total number of entries for products in database
     *
     * @queryParam region integer Id of the region the returned products must be in Example: 1
     * @queryParam category integer Id of the category the returned products must belong to Example: 1
     * @queryParam search string Terms researched in the product's name No-example
     * @queryParam max_price integer Maximum price of the returned products Example: 300
     * @queryParam min_price integer Minimum price of the returned products Example: 10
     * 
     * @return \Illuminate\Http\Response
     */
    public function total()
    {
        $products = Product::region()
            ->category()
            ->search()
            ->maxPrice()
            ->minPrice();

        return $products->count();
    }

    /**
     * Return an array of all the names of all the products
     * 
     * @return \Illuminate\Http\Response
     */
    public function takenProductNames()
    {
        $productsArray = [];
        $products = Product::select('products.name')->get();

        foreach($products as $product) {
            $productsArray[] = $product->name;
        }

        return $productsArray;
    }
}
