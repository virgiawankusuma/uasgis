<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Anda Mencari: <?= $keyword; ?></h1>
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
    var roads = {
        'color': 'red',
        'dashArray': '7',
        'weight': 5
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
                html: '<p class="my-1 text-danger"><?= $rt->jumlah; ?> Jiwa</p><p class="small my-1"><?= $rt->alamat; ?></p>',
                imageUrl: '<?= $rt->gambar; ?>',
                imageHeight: 200,
                imageAlt: '<?= $rt->nama; ?>',
            })
        });
    <?php } ?>

    // jalan
    <?php foreach ($roads as $road => $r) { ?>
        L.geoJSON({
            "type": "FeatureCollection",
            "features": [<?= $r->koordinat; ?>]
        }, {
            style: roads
        }).addTo(mymap).on('click', function() {
            Swal.fire({
                title: '<span class="text-capitalize"><?= $r->nama; ?></span>',
                html: '<a href="/cari?keyword=<?= $r->jenis; ?>" class="text-capitalize h5 text-primary"><?= $r->jenis; ?></a>'
            })
        });
    <?php } ?>

    // fasilitas
    <?php foreach ($facilities as $facility => $f) { ?>
        L.marker([<?= $f->koordinat; ?>]).addTo(mymap).on('click', function() {
            Swal.fire({
                title: '<span class="text-capitalize"><?= $f->nama; ?></span>',
                html: '<a href="/cari?keyword=<?= $f->jenis; ?>" class="text-capitalize h5 text-primary"><?= $f->jenis; ?></a><p class="small my-1"><?= $f->alamat; ?></p> <p class="small my-1"><?= $f->no_telp; ?></p>',
                imageUrl: '<?= $f->gambar; ?>',
                imageHeight: 200,
                imageAlt: '<?= $f->nama; ?>',
            })
        });
    <?php } ?>
</script>
<?= $this->endSection(); ?>