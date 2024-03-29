# Data Hub OAuth 2 API

Demonstrates basic usage of the Data Hub OAuth 2 API (https://osdatahub.os.uk/docs/oauth2/overview) to provide time limited tokens for access to resources.

Examples include:

- Leaflet
  - Uses custom headers on Leaflet TileLayer (https://github.com/jaq316/leaflet-header).
- MapLibre GL JS
  - Uses the [`transformRequest`](https://maplibre.org/maplibre-gl-js-docs/api/map/) option to add a custom header:
    > A callback run before the Map makes a request for an external URL. The callback can be used to modify the url, set headers, or set the credentials property for cross-origin requests. Expected to return an object with a `url` property and optionally `headers` and `credentials` properties.
- OpenLayers
  - Uses the [`tileLoadFunction`](https://openlayers.org/en/latest/apidoc/module-ol_Tile.html#~LoadFunction) with fetch to add the Authorization Header (Bearer Token).

The above examples show how to request map tiles. Users wishing to use the Data Hub OAuth 2 API in order to make calls for GeoJSON responses (e.g. OS Features API) can do so as follows:

```
const accessToken = 'INSERT_ACCESS_TOKEN_HERE';
fetch('https://api.os.uk/features/v1/wfs?service=WFS&request=GetFeature&version=2.0.0&...', {
    headers: {
        'Authorization': 'Bearer ' + accessToken
    }
})
.then(response => response.json())
.then(data => {
    // do something with data
});
```
