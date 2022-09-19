<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Locate the user</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<div style="position:fixed;z-index:9999;top:2%"><button onclick="window.location.href='index.php'">Home</button></div>
<div id="map"></div>
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibWFraGVuc2EiLCJhIjoiY2w2anRiczN0MHE0ZDNpbXl6NXUzcGtmaiJ9.e1XWVPfjk39cQIgix9IX0g';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [-24, 42], // starting center in [lng, lat]
        zoom: 1, // starting zoom
        projection: 'globe' // display map as a 3D globe
    });

    map.on('style.load', () => {
        map.setFog({}); // Set the default atmosphere style
    });

    // Add geolocate control to the map.
    map.addControl(
        new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            // When active the map will receive updates to the device's location as it changes.
            trackUserLocation: true,
            // Draw an arrow next to the location dot to indicate which direction the device is heading.
            showUserHeading: true
        })
    );
</script>

</body>
</html>