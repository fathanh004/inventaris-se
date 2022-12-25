<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Barang Masuk/Keluar</h5>
        </div>
        <div class="card-body">
            <form action="/edit-jumlah-aksi" method="post">
                <div class="table">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Jumlah Awal</th>
                                <th>Jumlah Keluar/Masuk</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        </tfoot>
                        <tbody>
                            <div class="input-group input-group-sm mb-3">
                                <tr>
                                    <td><?= $barang['jumlah'] ?></td>
                                    <td><input type="text" name="jumlah" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="keterangan" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Barang Masuk</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="keterangan" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Barang Rusak</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="keterangan" id="inlineRadio3" value="option3">
                                            <label class="form-check-label" for="inlineRadio3">Barang Hilang</label>
                                        </div>
                                    </td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                    <input type="hidden" name="jumlah_awal" value="<?= $barang['jumlah'] ?>" />
                    <input type="hidden" name="barang_id" value="<?= $barang['barang_id'] ?>" />
                    <div class="container-fluid text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
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