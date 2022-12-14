<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Edit Keterangan Barang</h5>
        </div>
        <div class="card-body">
            <form action="/edit-aksi" method="post">
                <div class="table">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                            </tr>
                        </thead>
                        </tfoot>
                        <tbody>
                            <div class="input-group input-group-sm mb-3">
                                <tr>
                                    <td><input type="text" name="nama" value="<?= $barang['nama'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                    <td><input type="text" name="satuan" value="<?= $barang['satuan'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
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