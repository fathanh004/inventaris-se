<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Tambah Barang</h5>
        </div>
        <div class="card-body">
            <form action="/tambahaksi" method="post">
                <div class="table">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        </tfoot>
                        <tbody>
                            <div class="input-group input-group-sm mb-3">
                                <tr>
                                    <td><input type="text" name="nama" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                    <td><input step="1" name="jumlah" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                    <div class="container-fluid text-center">
                        <button class="btn btn-primary">Tambah</button>
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