# Region management

APIs for managing regions and get regions info

## Return the total number of entries for regions in database




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/regions/count" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/regions/count"
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
13
```
<div id="execution-results-GETapi-regions-count" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-regions-count"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-regions-count"></code></pre>
</div>
<div id="execution-error-GETapi-regions-count" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-regions-count"></code></pre>
</div>
<form id="form-GETapi-regions-count" data-method="GET" data-path="api/regions/count" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-regions-count', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-regions-count" onclick="tryItOut('GETapi-regions-count');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-regions-count" onclick="cancelTryOut('GETapi-regions-count');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-regions-count" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/regions/count</code></b>
</p>
</form>


## Return a json listing of the regions.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/regions?offset=16&limit=13" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/regions"
);

let params = {
    "offset": "16",
    "limit": "13",
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
<div id="execution-results-GETapi-regions" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-regions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-regions"></code></pre>
</div>
<div id="execution-error-GETapi-regions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-regions"></code></pre>
</div>
<form id="form-GETapi-regions" data-method="GET" data-path="api/regions" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-regions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-regions" onclick="tryItOut('GETapi-regions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-regions" onclick="cancelTryOut('GETapi-regions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-regions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/regions</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>offset</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="offset" data-endpoint="GETapi-regions" data-component="query"  hidden>
<br>
Point in the array where to start the set of returned data. Default 0. If specified limit must be specified too.</p>
<p>
<b><code>limit</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="limit" data-endpoint="GETapi-regions" data-component="query"  hidden>
<br>
Number of regions to return. Default all. If specified offset must be specified too.</p>
</form>


## Store a newly created region in database storage.


Return the region info as json

> Example request:

```bash
curl -X POST \
    "http://localhost/api/regions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"minima"}'

```

```javascript
const url = new URL(
    "http://localhost/api/regions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "minima"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-regions" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-regions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-regions"></code></pre>
</div>
<div id="execution-error-POSTapi-regions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-regions"></code></pre>
</div>
<form id="form-POSTapi-regions" data-method="POST" data-path="api/regions" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-regions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-regions" onclick="tryItOut('POSTapi-regions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-regions" onclick="cancelTryOut('POSTapi-regions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-regions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/regions</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-regions" data-component="body" required  hidden>
<br>
Name of the region, must be unique and between 3 and 45 characters.</p>

</form>


## Return a json of the region info corresponding to specified id.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/regions/7" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/regions/7"
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
{
    "id": 7,
    "name": "centre"
}
```
<div id="execution-results-GETapi-regions--region-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-regions--region-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-regions--region-"></code></pre>
</div>
<div id="execution-error-GETapi-regions--region-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-regions--region-"></code></pre>
</div>
<form id="form-GETapi-regions--region-" data-method="GET" data-path="api/regions/{region}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-regions--region-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-regions--region-" onclick="tryItOut('GETapi-regions--region-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-regions--region-" onclick="cancelTryOut('GETapi-regions--region-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-regions--region-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/regions/{region}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="region" data-endpoint="GETapi-regions--region-" data-component="url" required  hidden>
<br>
The ID of the region.</p>
</form>


## Update the region specified by id in database storage.


Return a json of the region info.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/regions/3" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"in"}'

```

```javascript
const url = new URL(
    "http://localhost/api/regions/3"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "in"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-PUTapi-regions--region-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-regions--region-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-regions--region-"></code></pre>
</div>
<div id="execution-error-PUTapi-regions--region-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-regions--region-"></code></pre>
</div>
<form id="form-PUTapi-regions--region-" data-method="PUT" data-path="api/regions/{region}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-regions--region-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-regions--region-" onclick="tryItOut('PUTapi-regions--region-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-regions--region-" onclick="cancelTryOut('PUTapi-regions--region-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-regions--region-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/regions/{region}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/regions/{region}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="region" data-endpoint="PUTapi-regions--region-" data-component="url" required  hidden>
<br>
The ID of the region.</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-regions--region-" data-component="body"  hidden>
<br>
Name of the region, must be unique and between 3 and 45 characters.</p>

</form>


## Remove the region specified by id from database storage.


Return json with removed region id in 'id' key and action performed in 'action' key.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/regions/13" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/regions/13"
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


<div id="execution-results-DELETEapi-regions--region-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-regions--region-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-regions--region-"></code></pre>
</div>
<div id="execution-error-DELETEapi-regions--region-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-regions--region-"></code></pre>
</div>
<form id="form-DELETEapi-regions--region-" data-method="DELETE" data-path="api/regions/{region}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-regions--region-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-regions--region-" onclick="tryItOut('DELETEapi-regions--region-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-regions--region-" onclick="cancelTryOut('DELETEapi-regions--region-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-regions--region-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/regions/{region}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="region" data-endpoint="DELETEapi-regions--region-" data-component="url" required  hidden>
<br>
The ID of the region.</p>
</form>



