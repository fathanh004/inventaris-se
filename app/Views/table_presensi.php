<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Laporan Presensi</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Waktu Datang</th>
                            <th>Waktu Pulang</th>
                            <th>Keterangan</th>
                            <th>Upah</th>
                        </tr>
                    </thead>
                    </tfoot>
                    <tbody>
                    <?php
        foreach ($presensiArr as $p) :
            foreach ($employee as $e) :
                if ($p['nim'] == $e['nim']) :
                    foreach ($users as $u) :
                        if ($u['user_id'] == $e['user_id']) :
                            //upah
                            $tiba = new DateTime($p['waktu_tiba']);
                            $pulang = new DateTime($p['waktu_pulang']);

                            // hitung selisih waktu tiba dan pulang
                            $selisih = $tiba->diff($pulang);

                            // hitung jumlah upah dalam menit
                            $durasi = ($selisih->h * 60) + $selisih->i;

                            // hitung upah sesuai ketentuan
                            if ($durasi <= 360) { // maksimal 6 jam
                                $upah = floor($durasi / 10) * 1000;
                            } else {
                                $upah = (360 / 10) * 1000; // 6 jam
                            }

                            // tambahkan bonus jika lebih dari 3 jam
                            if ($selisih->h >= 3) {
                                $upah += 15000;
                            }
                            
                            ?>
                            <tr>
                                <td><?= $p['nim']; ?></td>
                                <td><?= $u['nama']; ?></td>
                                <td><?= $p['tanggal']; ?></td>
                                <td><?= $p['waktu_tiba']; ?></td>
                                <td><?= $p['waktu_pulang']; ?></td>
                                <td><?= $p['keterangan']; ?></td>
                                <td><?= $upah;?></td>
                            </tr>
                            <?php
                        endif;
                    endforeach;
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