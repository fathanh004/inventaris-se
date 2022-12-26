<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Tanggal Kembali</h5>
        </div>
        <div class="card-body">
            <form action="/edit-aksi-pinjam" method="post">
                <div class="table">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal Kembali</th>
                            </tr>
                        </thead>
                        </tfoot>
                        <tbody>
                            <div class="input-group input-group-sm mb-3">
                                <tr>
                                    <td><input type="date" name="tanggal_kembali" value="<?= $pinjam['tanggal_kembali'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                    <input type="hidden" name="pinjam_id" value="<?= $pinjam['pinjam_id'] ?>" />
                    <input type="hidden" name="barang_id" value="<?= $pinjam['barang_id'] ?>" />
                    <input type="hidden" name="jumlah_pinjam" value="<?= $pinjam['jumlah_pinjam'] ?>" />
                    <input type="hidden" name="status" value="Sudah Kembali" />
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