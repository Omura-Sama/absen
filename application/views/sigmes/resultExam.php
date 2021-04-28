<!DOCTYPE html>
<html lang="en">
    <head>
  <title>Result Exam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(function (){
            $('#myEdit').on('show.bs.modal', function (event){
                var button = $(event.relatedTarget); // Button that triggered the modal
                var codeId = button.data('id'); // Extract info from data-* attributes
                var setExamName = button.data('nameexam'); // Extract info from data-* attributes
                var setSoaltype = button.data('descgroup'); // Extract info from data-* attributes
                var setTotalExam = button.data('totalexam'); // Extract info from data-* attributes
                var setDuration = button.data('duration'); // Extract info from data-* attributes
                var setSDate = button.data('startdate'); // Extract info from data-* attributes
                var setEDate = button.data('enddate'); // Extract info from data-* attributes

                var modal = $(this);
                modal.find('#editcode').val(codeId);
                modal.find('#editexamname').val(setExamName);          
                modal.find('#editsoaltype').val(setSoaltype);          
                modal.find('#edittotalexam').val(setTotalExam);          
                modal.find('#editduration').val(setDuration);          
                modal.find('#editsdate').val(setSDate); 
                modal.find('#editedate').val(setEDate); 

            })
        })

        $(function (){
            $('#myDelete').on('show.bs.modal', function (event){
                var button = $(event.relatedTarget); // Button that triggered the modal
                var codeId = button.data('id'); // Extract info from data-* attributes
                var desk = button.data('desk'); // Extract info from data-* attributes
        
                var modal = $(this);
                modal.find('#editcode').val(codeId);
                modal.find('#editdesk').val(desk);          
            })
        })
    </script>
</head>
    
        <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Exam</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <form action="<?php echo base_url() ?>index.php/Exam/create" method="POST">
                    <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Exam Name</label>
                                                <input class="form-control py-4" name="examName" type="text" placeholder="Exam Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Question type</label>
                                                <select class="form-control" name="soalType" required>
                                                        <option value="">Choose Group Question</option>
                                                    <?php $no=0; foreach ($listGroupSoal as $key ): $no++ ?>
                                                        <option value="<?= $key->id_soal_group; ?>"><?= $key->desc_soal_group; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Total Exam</label>
                                                <input class="form-control py-4" name="totalExam" type="number" min="0" max="100" placeholder="Total Exam" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Duration</label>
                                                <input class="form-control py-4" name="duration" type="number" min="0" max="100" placeholder="Menit" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Start Date</label>
                                                <input class="form-control py-4" name="sDate" type="datetime-local" placeholder="Date Start" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">End Date</label>
                                                <input class="form-control py-4" name="eDate" type="datetime-local" placeholder="Date End" />
                                            </div>
                                        </div>          
                                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" name="submit">Add</button>
                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                    </form>

                  </div>
                  
                </div>
            </div>
        
        <!-- Modal Edit -->
            <div class="modal fade" id="myEdit" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Soal</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <form action="<?php echo base_url() ?>index.php/Soal/edit" method="POST">
                    <div class="modal-body">
                        <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Exam Name</label>
                                                <input class="form-control py-4" name="examName" id="editexamname" type="text" placeholder="Exam Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Question type</label>
                                                <select class="form-control" name="soalType" required>
                                                        <option value="">Choose Group Question</option>
                                                    <?php $no=0; foreach ($listGroupSoal as $key ): $no++ ?>
                                                        <option value="<?= $key->id_soal_group; ?>"><?= $key->desc_soal_group; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Total Exam</label>
                                                <input class="form-control py-4" name="totalExam" id="edittotalexam" type="number" min="0" max="100" placeholder="Total Exam" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Duration</label>
                                                <input class="form-control py-4" name="duration" id="editduration" type="number" min="0" max="100" placeholder="Menit" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Start Date</label>
                                                <input class="form-control py-4" name="sDate" id="editsdate" type="datetime-local" placeholder="Date Start" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">End Date</label>
                                                <input class="form-control py-4" name="eDate" id="editedate" type="datetime-local" placeholder="Date End" />
                                            </div>
                                        </div>                   
                                    </div>   
                        </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" name="submit">Ubah</button>
                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                    </form>

                  </div>
                  
                </div>
            </div>

         <!-- Modal Delete -->
            <div class="modal fade" id="myDelete" role="dialog">
                <div class="modal-dialog modal-confirm" align="center">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="icon-box">
                                <span style="font-size: 6em; color: Tomato;">
                                     <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </span>
                               
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>              
                            <p>
                                <h4>Are you sure?</h4>  
                            </p>
                            <p>Do you really want to delete these records?</p>
                            <p> This process cannot be undone.</p>
                        </div>
                        <form method="post" action="<?php echo base_url() ?>index.php/Soal_type/delete/" >
                            <div class="modal-footer">
                                <input hidden  type="text" name="id" id="editcode">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div> 

            <main>
                <div class="container-fluid">
                    <h1 class="mt-4"><?= $title; ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Data Result</li>
                    </ol>

                    <div class=" mb-4">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="card">
                                            <div class="card-header">
                                            SISTEM INFORMASI GANGGUAN EMOSIONAL (SI G-MES) 
                                            </div>
                                            <!-- <?php print_r($profil); ?> -->
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">NIP</th>
                                                            <th scope="col"><?= $profil[0]->nip; ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Nama Lengkap</th>
                                                            <td><?= $profil[0]->fullname; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Usia</th>
                                                            <td><?php
                                                                    $tgl = date('Y', strtotime($profil[0]->tgl_lahir));
                                                                    $now = date('Y');
                                                                    echo $now-$tgl;
                                                                 ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Jenis Pekerjaan</th>
                                                            <td><?= $profil[0]->jenis_peg; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Masa Kerja</th>
                                                            <td><?php
                                                                    $tgl1 = date('Y', strtotime($profil[0]->tmt)); 
                                                                    $now1 = date('Y');
                                                                    echo $now1-$tgl1;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Unit Kerja</th>
                                                            <td><?= $profil[0]->nama_unit; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Status Perkawinan</th>
                                                            <td><?= '-'; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Jenis Kelamin</th>
                                                            <td><?= $profil[0]->gender; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td><?= $profil[0]->email; ?></td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card">
                                        <div class="card-header">
                                            Pemberitahuan
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            
                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Isi kuesioner</th>
                                                            <td> </td>
                                                            <!-- <td><?= $profil['fullname'] ?></td> -->
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Rekomendasi</th>
                                                            <?php if($dataHasil[0]->correct >= 6){ ?>
                                                                <td>
                                                                <br>    
                                                                    Konsultasi Dokter Spesialis Kedokteran Jiwa (juga informasikan jadwal praktek Sp.KJ)
                                                                </td>                                                       
                                                            <?php }elseif($dataHasil[0]->correct <= 6){ ?>
                                                                <td>
                                                                <br>    
                                                                    Konsulasi Dokter Spesialis Kedokteran Okupasi (juga informasikan jadwal praktek Sp.Ok) 
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>                  
                  
                </div>
            </main>
   
</body>

</html>