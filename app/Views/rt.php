<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Batas RT</h1>
    <div id="maps"></div>
</div>
<script>
    var mymap = L.map('maps').setView([-6.575306838659675, 110.68475717533627], 15);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
    }).addTo(mymap);
    // style
    var rt = {
        'weight': 3
    }
    var vb = {
        'color': 'gray',
        'opacity': 1,
        'weight': 2,
        'fillColor': 'white',
        'fillOpacity': 0.5
    }

    // get data

    // vb
    L.geoJSON({
        "type": "FeatureCollection",
        "features": [<?= $vb; ?>]
    }, {
        style: vb
    }).addTo(mymap);


    // rt
    <?php foreach ($neighborhood_associations as $neighborhood_association => $rt) { ?>
        L.geoJSON({
            "type": "FeatureCollection",
            "features": [<?= $rt->koordinat; ?>]
        }, {
            style: rt
        }).addTo(mymap).on('click', function() {
            Swal.fire({
                title: '<span class="text-uppercase"><?= $rt->nama; ?></span>',
                html: '<p class="my-1"><?= $rt->jumlah; ?> Jiwa</p><p class="small my-1"><?= $rt->alamat; ?></p>',
                imageUrl: '<?= $rt->gambar; ?>',
                imageHeight: 200,
                imageAlt: '<?= $rt->nama; ?>',
            })
        });
    <?php } ?>
</script>
<?= $this->endSection(); ?>