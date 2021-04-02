# Category management

APIs for managing categories and get categories info

## Return the total number of entries for categories in database




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/categories/count" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/count"
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
3
```
<div id="execution-results-GETapi-categories-count" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-categories-count"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories-count"></code></pre>
</div>
<div id="execution-error-GETapi-categories-count" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories-count"></code></pre>
</div>
<form id="form-GETapi-categories-count" data-method="GET" data-path="api/categories/count" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-categories-count', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-categories-count" onclick="tryItOut('GETapi-categories-count');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-categories-count" onclick="cancelTryOut('GETapi-categories-count');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-categories-count" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/categories/count</code></b>
</p>
</form>


## Return a json listing of the categories.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/categories?offset=12&limit=7" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories"
);

let params = {
    "offset": "12",
    "limit": "7",
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

[]
```
<div id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-categories"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"></code></pre>
</div>
<div id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories"></code></pre>
</div>
<form id="form-GETapi-categories" data-method="GET" data-path="api/categories" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-categories" onclick="tryItOut('GETapi-categories');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-categories" onclick="cancelTryOut('GETapi-categories');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-categories" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/categories</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>offset</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="offset" data-endpoint="GETapi-categories" data-component="query"  hidden>
<br>
Point in the array where to start the set of returned data. Default 0. If specified limit must be specified too.</p>
<p>
<b><code>limit</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="limit" data-endpoint="GETapi-categories" data-component="query"  hidden>
<br>
Number of categories to return. Default all. If specified offset must be specified too.</p>
</form>


## Store a newly created category in database storage.


Return the category info as json.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"pariatur"}'

```

```javascript
const url = new URL(
    "http://localhost/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "pariatur"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-categories" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-categories"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-categories"></code></pre>
</div>
<div id="execution-error-POSTapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-categories"></code></pre>
</div>
<form id="form-POSTapi-categories" data-method="POST" data-path="api/categories" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-categories', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-categories" onclick="tryItOut('POSTapi-categories');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-categories" onclick="cancelTryOut('POSTapi-categories');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-categories" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/categories</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-categories" data-component="body" required  hidden>
<br>
Name of the category, must be unique and between 3 and 45 characters.</p>

</form>


## Return a json of the category info corresponding to specified id.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/categories/9" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/9"
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
    "error": "Resource not found for model App\\Models\\Category",
    "code": "404"
}
```
<div id="execution-results-GETapi-categories--category-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-categories--category-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--category-"></code></pre>
</div>
<div id="execution-error-GETapi-categories--category-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--category-"></code></pre>
</div>
<form id="form-GETapi-categories--category-" data-method="GET" data-path="api/categories/{category}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--category-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-categories--category-" onclick="tryItOut('GETapi-categories--category-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-categories--category-" onclick="cancelTryOut('GETapi-categories--category-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-categories--category-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/categories/{category}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category" data-endpoint="GETapi-categories--category-" data-component="url" required  hidden>
<br>
The ID of the category.</p>
</form>


## Update the category specified by id in database storage.


Return a json of the category info.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/categories/10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"recusandae"}'

```

```javascript
const url = new URL(
    "http://localhost/api/categories/10"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "recusandae"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-PUTapi-categories--category-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-categories--category-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-categories--category-"></code></pre>
</div>
<div id="execution-error-PUTapi-categories--category-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-categories--category-"></code></pre>
</div>
<form id="form-PUTapi-categories--category-" data-method="PUT" data-path="api/categories/{category}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-categories--category-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-categories--category-" onclick="tryItOut('PUTapi-categories--category-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-categories--category-" onclick="cancelTryOut('PUTapi-categories--category-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-categories--category-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/categories/{category}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/categories/{category}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category" data-endpoint="PUTapi-categories--category-" data-component="url" required  hidden>
<br>
The ID of the category.</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-categories--category-" data-component="body"  hidden>
<br>
Name of the category, must be unique and between 3 and 45 characters.</p>

</form>


## Remove the category specified by id from database storage.


Return json with removed category id in 'id' key and action performed in 'action' key.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/categories/20" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/categories/20"
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


<div id="execution-results-DELETEapi-categories--category-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-categories--category-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-categories--category-"></code></pre>
</div>
<div id="execution-error-DELETEapi-categories--category-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-categories--category-"></code></pre>
</div>
<form id="form-DELETEapi-categories--category-" data-method="DELETE" data-path="api/categories/{category}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-categories--category-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-categories--category-" onclick="tryItOut('DELETEapi-categories--category-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-categories--category-" onclick="cancelTryOut('DELETEapi-categories--category-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-categories--category-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/categories/{category}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category" data-endpoint="DELETEapi-categories--category-" data-component="url" required  hidden>
<br>
The ID of the category.</p>
</form>



