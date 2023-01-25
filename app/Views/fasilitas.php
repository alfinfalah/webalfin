<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Fasilitas Umum</h1>
    <div id="maps"></div>
</div>
<script>
    var mymap = L.map('maps').setView([-7.025151052342599, 109.68650957109492], 15);
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
        "features": [<?=''; ?>]
    }, {
            style: vb
        }).addTo(mymap);

    // fasilitas
    <?php foreach ($facilities as $facility => $f) { ?>
            L.marker([<?= $f->koordinat; ?>]).addTo(mymap).on('click', function () {
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