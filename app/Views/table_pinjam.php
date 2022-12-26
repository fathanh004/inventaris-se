<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Laporan Barang</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Peminjam</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    </tfoot>
                    <tbody>
                    <?php
        foreach ($pinjamArr as $p) :
            foreach ($barang as $b) :
                if ($p['barang_id'] == $b['barang_id']) :
                    ?>
                    <tr>
                        <td><?= $b['nama']; ?></td>
                        <td><?= $p['jumlah_pinjam']; ?></td>
                        <td><?= $p['tanggal_pinjam']; ?></td>
                        <td><?= $p['tanggal_kembali']; ?></td>
                        <td><?= $p['nama_peminjam']; ?></td>
                        <td><?= $p['alasan']; ?></td>
                        <td><?= $p['status']; ?></td>
                        <td>
                            <a href="<?php echo site_url('edit-pinjam/' . $p['pinjam_id']) ?>" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                <span class="text">Edit</span>
                            </a>
                        </td>
                    </tr>
                    <?php
                endif;
            endforeach;
        endforeach;
                    ?>
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