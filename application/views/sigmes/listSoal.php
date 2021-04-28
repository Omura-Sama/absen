<!DOCTYPE html>
<html lang="en">
    <head>
  <title>Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">List Test</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">SIGMES/List Soal</li>
                    </ol>

                    <div class="row">
                            <!-- <div class="col-xl-3 col-md-6"></div> -->
                            <!-- <div class="col-xl-3 col-md-6"></div> -->
                            <!-- <div class="col-xl-2 col-md-4"></div> -->
                            <div class="col">
                                <div class="card bg-primary text-white mb-4" style="width:fit-content">
                                    <div class="card-body">
                                        Tanggal : <span> <?= date('l, d F Y'); ?> </span>
                                    </div>
                                    <!-- <div class="card-footer d-flex align-items-center justify-content-between"> -->
                                        <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                                        <!-- <p><?= date('l, d F Y'); ?></p> -->
                                        <!-- <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                                    <!-- </div> -->
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jam</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                                List Test
                            <!-- <button type="button"  style="float: right;" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>  -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Test Name</th>
                                            <th>Number of test</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Test Name</th>
                                            <th>Number of test</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=0; foreach($listExam as $key): $no++;?>
                                            <tr>
                                                <td><?= $no;  ?></td>
                                                <td><?= $key->name_exam; ?></td>
                                                <td><?= $key->total_exam; ?></td>
                                                <td><?= $key->duration." menit"; ?></td>
                                                <td>
                                                    <?php if($statusSheet != '1'){ ?>
                                                        <a class="btn btn-primary text-light" class="btn btn-small" href="<?= site_url('Page/token/'.$key->id_exam); ?>"><i class="fa fa-edit"></i> Mulai Ujian</a>
                                                    <?php }else{ ?>
                                                        <a class="btn btn-success text-light" class="btn btn-small" href="<?= site_url('Page/result/'.$key->id_exam); ?>"><i class="fa fa-file-signature"></i> Cek Hasil</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>                  
                  
                </div>
            </main>
   
</body>

</html>