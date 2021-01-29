<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Fasilitas umum</h1>
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

    // fasilitas
    <?php foreach ($facilities as $facility => $f) { ?>
        L.marker([<?= $f->koordinat; ?>]).addTo(mymap).on('click', function() {
            Swal.fire({
                title: '<span class="text-uppercase"><?= $f->nama; ?></span>',
                html: '<span class = "small" > <?= $f->deskripsi; ?> </span>',
                imageUrl: '<?= $f->gambar; ?>',
                imageHeight: 200,
                imageAlt: 'Custom image',
            })
        });
    <?php } ?>
</script>
<?= $this->endSection(); ?>