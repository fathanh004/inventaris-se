<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Jadwal <?= $lab['nama'] ?></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered border-primary text-center">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">7:30 - 8:20</th>
                            <th scope="col">8:20 - 9:10</th>
                            <th scope="col">9:10 - 10:00</th>
                            <th scope="col">10:00 - 10:50</th>
                            <th scope="col">10:50 - 11:40</th>
                            <th scope="col">11:40 - 12:30</th>
                            <th scope="col">12:30 - 13:20</th>
                            <th scope="col">13:20 - 14:10</th>
                            <th scope="col">14:10 - 15:00</th>
                            <th scope="col">15:00 - 15:50</th>
                            <th scope="col">15:50 - 16:40</th>
                            <th scope="col">16:40 - 17:30</th>

                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <th scope="row">Senin</th>

                            <td><?= $jadwal[0][1] ?></td>
                            <td><?= $jadwal[0][2] ?></td>
                            <td><?= $jadwal[0][3] ?></td>
                            <td><?= $jadwal[0][4] ?></td>
                            <td><?= $jadwal[0][5] ?></td>
                            <td><?= $jadwal[0][6] ?></td>
                            <td><?= $jadwal[0][7] ?></td>
                            <td><?= $jadwal[0][8] ?></td>
                            <td><?= $jadwal[0][9] ?></td>
                            <td><?= $jadwal[0][10] ?></td>
                            <td><?= $jadwal[0][11] ?></td>
                            <td><?= $jadwal[0][12] ?></td>

                        </tr>
                        <tr>
                            <th scope="row">Selasa</th>
                            <td><?= $jadwal[1][1] ?></td>
                            <td><?= $jadwal[1][2] ?></td>
                            <td><?= $jadwal[1][3] ?></td>
                            <td><?= $jadwal[1][4] ?></td>
                            <td><?= $jadwal[1][5] ?></td>
                            <td><?= $jadwal[1][6] ?></td>
                            <td><?= $jadwal[1][7] ?></td>
                            <td><?= $jadwal[1][8] ?></td>
                            <td><?= $jadwal[1][9] ?></td>
                            <td><?= $jadwal[1][10] ?></td>
                            <td><?= $jadwal[1][11] ?></td>
                            <td><?= $jadwal[1][12] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Rabu</th>
                            <td><?= $jadwal[2][1] ?></td>
                            <td><?= $jadwal[2][2] ?></td>
                            <td><?= $jadwal[2][3] ?></td>
                            <td><?= $jadwal[2][4] ?></td>
                            <td><?= $jadwal[2][5] ?></td>
                            <td><?= $jadwal[2][6] ?></td>
                            <td><?= $jadwal[2][7] ?></td>
                            <td><?= $jadwal[2][8] ?></td>
                            <td><?= $jadwal[2][9] ?></td>
                            <td><?= $jadwal[2][10] ?></td>
                            <td><?= $jadwal[2][11] ?></td>
                            <td><?= $jadwal[2][12] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Kamis</th>
                            <td><?= $jadwal[3][1] ?></td>
                            <td><?= $jadwal[3][2] ?></td>
                            <td><?= $jadwal[3][3] ?></td>
                            <td><?= $jadwal[3][4] ?></td>
                            <td><?= $jadwal[3][5] ?></td>
                            <td><?= $jadwal[3][6] ?></td>
                            <td><?= $jadwal[3][7] ?></td>
                            <td><?= $jadwal[3][8] ?></td>
                            <td><?= $jadwal[3][9] ?></td>
                            <td><?= $jadwal[3][10] ?></td>
                            <td><?= $jadwal[3][11] ?></td>
                            <td><?= $jadwal[3][12] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Jum'at</th>
                            <td><?= $jadwal[4][1] ?></td>
                            <td><?= $jadwal[4][2] ?></td>
                            <td><?= $jadwal[4][3] ?></td>
                            <td><?= $jadwal[4][4] ?></td>
                            <td><?= $jadwal[4][5] ?></td>
                            <td><?= $jadwal[4][6] ?></td>
                            <td><?= $jadwal[4][7] ?></td>
                            <td><?= $jadwal[4][8] ?></td>
                            <td><?= $jadwal[4][9] ?></td>
                            <td><?= $jadwal[4][10] ?></td>
                            <td><?= $jadwal[4][11] ?></td>
                            <td><?= $jadwal[4][12] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Sabtu</th>
                            <td><?= $jadwal[5][1] ?></td>
                            <td><?= $jadwal[5][2] ?></td>
                            <td><?= $jadwal[5][3] ?></td>
                            <td><?= $jadwal[5][4] ?></td>
                            <td><?= $jadwal[5][5] ?></td>
                            <td><?= $jadwal[5][6] ?></td>
                            <td><?= $jadwal[5][7] ?></td>
                            <td><?= $jadwal[5][8] ?></td>
                            <td><?= $jadwal[5][9] ?></td>
                            <td><?= $jadwal[5][10] ?></td>
                            <td><?= $jadwal[5][11] ?></td>
                            <td><?= $jadwal[5][12] ?></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Presensi</h5>
        </div>
        <div class="card-body">
            <form action="/presensi" method="post">
                <div class="table">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Waktu Tiba</th>
                                <th>Waktu Pulang</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        </tfoot>
                        <tbody>
                            <div class="input-group input-group-sm mb-3">
                                <tr>
                                    <td><input type="date" name="tanggal" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                    <td><input type="time" name="tiba"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                    <td><input type="time" name="pulang" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                    <td><input type="text" name="keterangan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                    <input type="hidden" name="nim" value="<?= $nim ?>" />
                    <div class="container-fluid text-center">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a class="btn btn-danger" href="/barang">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?= $this->endSection(); ?>