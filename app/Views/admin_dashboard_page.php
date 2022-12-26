<?= $this->extend('layout/admin'); ?>

<?= $this->section('contentMain'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Daftar Student Employee</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th>Lab</th>
                            <th>Presensi</th>
                        </tr>
                    </thead>
                    </tfoot>
                    <tbody>
                        <?php foreach ($employee as $e) : ?>
                            <tr>
                                <td><?= $e['nim']; ?></td>
                                <td><?= $e['nama']; ?></td>
                                <td><?= $e['prodi']; ?></td>
                                <td><?= $e['angkatan']; ?></td>
                                <td><?= $e['lab']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('tampil-presensi/' . $e['nim']) ?>" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-book"></i>
                                        </span>
                                        <span class="text">Detail Presensi</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?= $this->endSection(); ?>