<div class="container p-5">
    <a href="<?= base_url('admin/'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Edit Data Fasilitas : <?= $fasilitas->nama; ?></h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/update'); ?>">

                <div class="form-group">
                    <label for="">id</label>
                    <input type="text" value="<?= $fasilitas->id; ?>" name="id" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Nama </label>
                    <input type="text" value="<?= $fasilitas->nama; ?>" name="nama" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">jenis</label>
                    <input type="text" value="<?= $fasilitas->jenis; ?>" name="jenis" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">koordinat</label>
                    <input type="text" value="<?= $fasilitas->koordinat; ?>" name="koordinat" required
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="">alamat</label>
                    <input type="text" value="<?= $fasilitas->alamat; ?>" name="alamat" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">no_telp</label>
                    <input type="number" value="<?= $fasilitas->no_telp; ?>" name="no_telp" required
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="">gambar</label>
                    <input type="text" value="<?= $fasilitas->gambar; ?>" name="gambar" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">video</label>
                    <input type="text" value="<?= $fasilitas->video; ?>" name="video" required class="form-control">
                </div>
                <input type="hidden" value="<?= $fasilitas->id; ?>" name="id">
                <button class="btn btn-success">Edit Data</button>
            </form>

        </div>
    </div>
</div>