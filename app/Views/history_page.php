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
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    </tfoot>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($historyArr as $h) :?>
                        
                            <tr>
                                <td><?= $h['tanggal']; ?></td>
                                <?php foreach ($barang as $b) : ?>
                                    <?php if ($h['barang_id'] == $b['barang_id']) : ?>
                                        <td><?= $b['nama']; ?></td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <td><?= $h['keterangan']; ?></td>
                                <td><?= $h['jumlah']; ?></td>
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