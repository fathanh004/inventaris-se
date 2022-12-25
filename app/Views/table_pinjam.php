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
                            <th>Alasan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    </tfoot>
                    <tbody>
                    <?php
                        $i = 0;
                        foreach ($pinjamArr as $h) :?>
                        
                            <tr>
                                <?php foreach ($barang as $b) : ?>
                                    <?php if ($h['barang_id'] == $b['barang_id']) : ?>
                                        <td><?= $b['nama']; ?></td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <td><?= $h['jumlah_pinjam']; ?></td>
                                <td><?= $h['tanggal_pinjam']; ?></td>
                                <td><?= $h['tanggal_kembali']; ?></td>
                                <td><?= $h['nama_peminjam']; ?></td>
                                <td><?= $h['alasan']; ?></td>
                                <td><?= $h['status']; ?></td>
                            </tr>
                        <?php
                            $i++;
                        endforeach; ?>
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