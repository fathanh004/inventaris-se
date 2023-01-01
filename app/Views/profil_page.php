<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Profil Saya</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>NIM</p>
            </div>
            <div class="col-md-9">
                <p>: <?= $nim ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Nama</p>
            </div>
            <div class="col-md-9">
                <p>: <?= $nama ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Email</p>
            </div>
            <div class="col-md-9">
                <p>: <?= $email ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Telpon</p>
            </div>
            <div class="col-md-9">
                <p>: <?= $telpon ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Prodi</p>
            </div>
            <div class="col-md-9">
                <p>: <?= $prodi ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Angkatan</p>
            </div>
            <div class="col-md-9">
                <p>: <?= $angkatan ?></p>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>