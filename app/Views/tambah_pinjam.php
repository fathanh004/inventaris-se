<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Buat Peminjaman Barang</h5>
        </div>
        <div class="card-body">
            <form action="/tambah-aksi-pinjam" method="post">
                <div class="table-responsive">
                    <table class="table table-bordered table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Jumlah Pinjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Nama Peminjam</th>
                                <th>Keperluan</th>
                            </tr>
                        </thead>
                        </tfoot>
                        <tbody>
                            <div class="input-group input-group-sm mb-3">
                                <tr>
                                    <select name="barang_id" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        <?php foreach ($barang as $b) : ?>
                                            <option value="<?= $b['barang_id']; ?>"><?= $b['nama']; ?> (<?= $b['jumlah'] ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <td><input step="1" name="jumlah_pinjam" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                    <td><input type="date" name="tanggal_pinjam" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                    <td><input type="text" name="nama_peminjam" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>
                                    <td><input type="text" name="alasan" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"></td>                                
                                </tr>
                            </div>
                            <input type="date" name="tanggal_kembali" class="form-control d-none" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="-">
                            <input type="text" name="status" class="form-control d-none" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="Belum Kembali">
                        </tbody>
                    </table>
                    
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