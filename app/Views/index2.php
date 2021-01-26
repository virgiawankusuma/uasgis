<?= $this->extend('layout/template2'); ?>
<?= $this->section('content'); ?>
<div id="maps"></div>
<script>
    var mymap = L.map('maps').setView([-6.575828608949939, 110.67487586495848], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
    }).addTo(mymap);

    var styleku = {
        "color": "red",
        "weight": 3
    }

    function popUp(f, l) {
        var out = [];
        if (f.properties) {
            for (key in f.properties) {
                out.push(key + ": " + "<b>" + f.properties[key] + "</b>");
            }
            l.bindPopup(out.join("<br />"));
        }
    }
    var jepara = new L.GeoJSON.AJAX(["geojson/kuwasen.geojson"], {
        onEachFeature: popUp,
        style: styleku
    }).addTo(mymap);
</script>
<?= $this->endSection(); ?>