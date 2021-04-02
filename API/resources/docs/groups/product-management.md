# Product management

APIs for managing products and get products info

## Return the total number of entries for products in database




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/products/count" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/products/count"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
4
```
<div id="execution-results-GETapi-products-count" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products-count"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-count"></code></pre>
</div>
<div id="execution-error-GETapi-products-count" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-count"></code></pre>
</div>
<form id="form-GETapi-products-count" data-method="GET" data-path="api/products/count" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products-count', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products-count" onclick="tryItOut('GETapi-products-count');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products-count" onclick="cancelTryOut('GETapi-products-count');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products-count" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products/count</code></b>
</p>
</form>


## Return a json listing of the products.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/products?region=1&category=1&max_price=300&min_price=10&sorting=price_asc" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/products"
);

let params = {
    "region": "1",
    "category": "1",
    "max_price": "300",
    "min_price": "10",
    "sorting": "price_asc",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
[
    {
        "id": 21,
        "name": "Test incrémentation id",
        "description": "Ceci est une description test pour ce produit.",
        "price": "200.00",
        "quantity": 3,
        "image": "https:\/\/picsum.photos\/200\/300",
        "category_id": 1,
        "region_id": 1,
        "category_name": "Catégorie test",
        "region_name": "grand_est"
    }
]
```
<div id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"></code></pre>
</div>
<div id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products"></code></pre>
</div>
<form id="form-GETapi-products" data-method="GET" data-path="api/products" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products" onclick="tryItOut('GETapi-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products" onclick="cancelTryOut('GETapi-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>offset</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="offset" data-endpoint="GETapi-products" data-component="query"  hidden>
<br>
Point in the array where to start the set of returned data. Default 0. If specified limit must be specified too.</p>
<p>
<b><code>limit</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="limit" data-endpoint="GETapi-products" data-component="query"  hidden>
<br>
Number of products to return. Default all. If specified offset must be specified too.</p>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="region" data-endpoint="GETapi-products" data-component="query"  hidden>
<br>
Id of the region the returned products must be in</p>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="category" data-endpoint="GETapi-products" data-component="query"  hidden>
<br>
Id of the category the returned products must belong to</p>
<p>
<b><code>search</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search" data-endpoint="GETapi-products" data-component="query"  hidden>
<br>
Terms researched in the product's name</p>
<p>
<b><code>max_price</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="max_price" data-endpoint="GETapi-products" data-component="query"  hidden>
<br>
Maximum price of the returned products</p>
<p>
<b><code>min_price</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="min_price" data-endpoint="GETapi-products" data-component="query"  hidden>
<br>
Minimum price of the returned products</p>
<p>
<b><code>sorting</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="sorting" data-endpoint="GETapi-products" data-component="query"  hidden>
<br>
Sorting options, defaults to order by id. Existing options : price_asc price_desc alphabet_asc alphabet_desc.</p>
</form>


## Store a newly created product in database storage.


Return the product info as json

> Example request:

```bash
curl -X POST \
    "http://localhost/api/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"maiores","description":"dolore","price":276545482.6,"quantity":11,"image":"distinctio","category_id":15,"region_id":7}'

```

```javascript
const url = new URL(
    "http://localhost/api/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "maiores",
    "description": "dolore",
    "price": 276545482.6,
    "quantity": 11,
    "image": "distinctio",
    "category_id": 15,
    "region_id": 7
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-products" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"></code></pre>
</div>
<div id="execution-error-POSTapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products"></code></pre>
</div>
<form id="form-POSTapi-products" data-method="POST" data-path="api/products" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-products" onclick="tryItOut('POSTapi-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-products" onclick="cancelTryOut('POSTapi-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/products</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
Name of the product, must be unique and between 10 and 45 characters.</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
Description of the product, must be 1000 characters maximum.</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
Price of the product, must be numeric and positive.</p>
<p>
<b><code>quantity</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="quantity" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
Quantity in stock of the product, must be an integer and positive.</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="image" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
URL link for the photo of the product, must be a valid URL.</p>
<p>
<b><code>category_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category_id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
The id of the category the product belongs to, must exist in categories table.</p>
<p>
<b><code>region_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="region_id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>
The id of the region where the product is, must exist in regions table.</p>

</form>


## Return a json of the product info corresponding to specified id.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/products/15" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/products/15"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (404):

```json
{
    "error": "Resource not found for model App\\Models\\Product",
    "code": "404"
}
```
<div id="execution-results-GETapi-products--product-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products--product-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--product-"></code></pre>
</div>
<div id="execution-error-GETapi-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--product-"></code></pre>
</div>
<form id="form-GETapi-products--product-" data-method="GET" data-path="api/products/{product}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products--product-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products--product-" onclick="tryItOut('GETapi-products--product-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products--product-" onclick="cancelTryOut('GETapi-products--product-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products--product-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products/{product}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="product" data-endpoint="GETapi-products--product-" data-component="url" required  hidden>
<br>
The ID of the product.</p>
</form>


## Update the product specified by id in database storage.


Return a json of the product info.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/products/4" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"quia","description":"ut","price":48179.1589545,"quantity":5,"image":"laborum","category_id":10,"region_id":6}'

```

```javascript
const url = new URL(
    "http://localhost/api/products/4"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "quia",
    "description": "ut",
    "price": 48179.1589545,
    "quantity": 5,
    "image": "laborum",
    "category_id": 10,
    "region_id": 6
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-PUTapi-products--product-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-products--product-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--product-"></code></pre>
</div>
<div id="execution-error-PUTapi-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--product-"></code></pre>
</div>
<form id="form-PUTapi-products--product-" data-method="PUT" data-path="api/products/{product}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--product-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-products--product-" onclick="tryItOut('PUTapi-products--product-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-products--product-" onclick="cancelTryOut('PUTapi-products--product-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-products--product-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/products/{product}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/products/{product}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="product" data-endpoint="PUTapi-products--product-" data-component="url" required  hidden>
<br>
The ID of the product.</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>
Name of the product, must be unique and between 10 and 45 characters.</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="description" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>
Description of the product, must be 1000 characters maximum.</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="price" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>
Price of the product, must be numeric and positive.</p>
<p>
<b><code>quantity</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="quantity" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>
Quantity in stock of the product, must be an integer and positive.</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>
URL link for the photo of the product, must be a valid URL.</p>
<p>
<b><code>category_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="category_id" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>
The id of the category the product belongs to, must exist in categories table.</p>
<p>
<b><code>region_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="region_id" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>
The id of the region where the product is, must exist in regions table.</p>

</form>


## Remove the product specified by id from database storage.


Return json with removed product id in 'id' key and action performed in 'action' key.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/products/14" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/products/14"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEapi-products--product-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-products--product-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-products--product-"></code></pre>
</div>
<div id="execution-error-DELETEapi-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-products--product-"></code></pre>
</div>
<form id="form-DELETEapi-products--product-" data-method="DELETE" data-path="api/products/{product}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-products--product-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-products--product-" onclick="tryItOut('DELETEapi-products--product-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-products--product-" onclick="cancelTryOut('DELETEapi-products--product-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-products--product-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/products/{product}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="product" data-endpoint="DELETEapi-products--product-" data-component="url" required  hidden>
<br>
The ID of the product.</p>
</form>



