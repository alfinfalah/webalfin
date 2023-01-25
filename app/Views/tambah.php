<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container p-5">
    <a href="<?= base_url('admin/'); ?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Tambah Data Fasilitas</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/add'); ?>">
                <div class="form-group">
                    <label for="">id</label>
                    <input type="text" name="id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Jenis</label>
                    <input type="text" name="jenis" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Koordinat</label>
                    <input type="text" name="koordinat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">no_telp</label>
                    <input type="number" name="no_telp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="text" name="gambar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Video</label>
                    <input type="text" name="video" class="form-control" required>
                </div>
                <button class="btn btn-success">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>