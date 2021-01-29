<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Charts</h1>
    <!-- <img src='https://images.unsplash.com/photo-1611600382820-b7d6214847c5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80' width='50px'> -->
    <div id="maps"></div>
</div>
<script>
    var mymap = L.map('maps').setView([-6.575828608949939, 110.67487586495848], 14);
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
    <?php foreach ($datas as $data => $d) { ?>
        L.geoJSON({
            "type": "FeatureCollection",
            "features": [<?= $d->koordinat; ?>]
        }).addTo(mymap).bindPopup('RT : <b><?= $d->nama; ?></b></br><img style="width:130px" src="/img/<?= $d->gambar; ?>">');
    <?php } ?>
</script>
<?= $this->endSection(); ?>