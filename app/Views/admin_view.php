
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container pt-5">
    <a href="<?= base_url('Admin/tambah'); ?>" class="btn btn-success mb-2">Tambah Data Fasilitas</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Data Fasilitas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="admin">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Koordinat </th>
                            <th>Alamat</th>
                            <th>No_telp</th>
                            <th>Aksi</th>

                        </tr>
                        </thead>
                    <tbody>
                        <?php $no=1; foreach($getFasilitas as $isi){?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['id']?></td>
                                <td><?= $isi['nama'];?></td>
                                <td><?= $isi['jenis']?></td>
                                <td><?= $isi['koordinat'];?></td>
                                <td><?= $isi['alamat']?></td>
                                <td><?= number_format($isi['no_telp']);?>,-</td>
                                <td>
                                    <a href="<?= base_url('Admin/edit/'.$isi['id']);?>" 
                                    class="btn btn-success">
                                    Edit</a>
                                    <a href="<?= base_url('Admin/hapus/'.$isi['id']);?>" 
                                    onclick="javascript:return confirm('Apakah ingin menghapus data ini ?')"
                                    class="btn btn-danger">
                                    Hapus</a>

                                </td>
                            </tr>
                        <?php $no++;}?>
                    </tbody>
                    </table>
                

            </div>
        </div>
    </div>
</div>
<?= $this->endSection()?>