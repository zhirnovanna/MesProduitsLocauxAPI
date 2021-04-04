<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Region management
 *
 * APIs for managing regions and get regions info
 */
class RegionController extends Controller
{
    /**
     * Create a new controller instance.
     * Apply ProductPolicy
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->authorizeResource(Region::class, 'regions');
    }*/


    /**
     * Return a json listing of the regions.
     *
     * @queryParam offset integer Point in the array where to start the set of returned data. Default 0. If specified limit must be specified too.
     * @queryParam limit integer Number of regions to return. Default all. If specified offset must be specified too.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if((!empty(request()->offset) || request()->offset == 0) && !empty(request()->limit) 
        && intval(request()->offset) >= 0 && intval(request()->limit) >= 0) {

            return Region::offset(intval(request()->offset))
            ->limit(intval(request()->limit))
            ->get();

        } else {
            return Region::all();
        }
    }

    /**
     * Store a newly created region in database storage.
     * Return the region info as json
     * 
     * @bodyParam name string required Name of the region, must be unique and between 3 and 45 characters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:45|unique:regions,name'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 500);
        }

        $region = Region::create($request->all());

        return response()->json($region, 201);
    }

    /**
     * Return a json of the region info corresponding to specified id.
     *
     * @urlParam region integer required The ID of the region.
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        return $region;
    }

    /**
     * Update the region specified by id in database storage.
     * Return a json of the region info.
     * 
     * @bodyParam name string Name of the region, must be unique and between 3 and 45 characters.
     *
     * @urlParam region integer required The ID of the region.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'min:3|max:45|unique:regions,name,' . $region->id
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 500);
        }

        $region->update($request->all());

        return response()->json($region, 200);
    }

    /**
     * Remove the region specified by id from database storage.
     * Return json with removed region id in 'id' key and action performed in 'action' key.
     *
     * @urlParam region integer required The ID of the region.
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $regionId = $region->id;
        $region->delete();

        return response()->json(['action' => 'deleted region', 'id' => $regionId], 200);
    }

    /**
     * Return the total number of entries for regions in database
     *
     * @return \Illuminate\Http\Response
     */
    public function total()
    {
        return Region::count();
    }
}
