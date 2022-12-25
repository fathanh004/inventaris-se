<?= $this->extend('layout/navbar'); ?>

<?= $this->section('contentMain'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Jadwal <?= $lab['nama']?></h5>
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
                            <th colspan="3">as</th>
                        </tr>
                        <tr>
                            <th scope="row">Selasa</th>
                            
                        </tr>
                        <tr>
                            <th scope="row">Rabu</th>
                            
                        </tr>
                        <tr>
                            <th scope="row">Kamis</th>
                        </tr>
                        <tr>
                            <th scope="row">Jumat</th>
                        </tr>
                        <tr>
                            <th scope="row">Sabtu</th>
                        </tr>
                        
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