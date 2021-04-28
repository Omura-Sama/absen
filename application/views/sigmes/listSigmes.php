<!DOCTYPE html>
<html lang="en">
    <head>
  <title>Dashboard Admin</title>
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
                var desk = button.data('desk'); // Extract info from data-* attributes
                var setSoaltype = button.data('soaltype'); // Extract info from data-* attributes
                var setSoalgroup = button.data('soalGroup'); // Extract info from data-* attributes
                var setSoaltypeID = button.data('sltypeid'); // Extract info from data-* attributes
                var setSoalgroupID = button.data('soalGroupID'); // Extract info from data-* attributes

        
                var modal = $(this);
                modal.find('#editcode').val(codeId);
                modal.find('#editdesk').val(desk);          
                modal.find('#editsoaltype').val(setSoaltype);          
                modal.find('#editsoaltypeid').val(setSoaltypeID);          
                modal.find('#editsoalgp').val(setSoalgroup);          
                modal.find('#editsoalgroupid').val(setSoalgroupID); 

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
                      <h4 class="modal-title">Tambah Soal</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    
                    <form action="<?php echo base_url() ?>index.php/Soal/create" method="POST">
                    <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Type Soal</label>
                                                <select class="form-control" name="typeSoal">
                                                    <?php foreach ($listTypeSoal as $key): ?>
                                                        <option value="<?= $key->id_soal_type; ?>"><?= $key->type_soal; ?> </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <label class="small mb-1" for="inputFirstName">List Soal Group</label>
                                                
                                                <select class="form-control" name="soalGroup">
                                                    <?php foreach ($listSoalGroup as $key): ?>
                                                        <option value="<?= $key->id_soal_group; ?>"><?= $key->desc_soal_group; ?> </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Deskripsi Soal</label>
                                                <input class="form-control" name="descSoal" id="inputFirstName" type="text" placeholder="Deskripsi Soal" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Jawaban A</label>
                                                <input class="form-control" name="opsiA" id="inputFirstName" type="text" placeholder="Opsi A" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Jawaban B</label>
                                                <input class="form-control" name="opsiB" id="inputFirstName" type="text" placeholder="Opsi B" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Jawaban C</label>
                                                <input class="form-control" name="opsiC" id="inputFirstName" type="text" placeholder="Opsi C" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Jawaban D</label>
                                                <input class="form-control" name="opsiD" id="inputFirstName" type="text" placeholder="Opsi D" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Bobot Soal</label>
                                                <input class="form-control" name="bobotSoal" id="inputFirstName" type="number" min="0" max="100" placeholder="Bobot Soal" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Waktu Pengerjaan</label>
                                                <input class="form-control" name="wktMenit" id="inputFirstName" type="number" min="0" max="59" placeholder="menit" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Jawaban Benar</label>
                                                <select class="form-control" name="jawaban" id="pilihanjwb">
                                                        <option value="a"> A </option>
                                                        <option value="b"> B </option>
                                                        <option value="c"> C </option>
                                                        <option value="d"> D </option>
                                                </select>
                                                <!-- <input class="form-control py-4" name="jawaban" id="inputFirstName" type="text" placeholder="Jawaban" /> -->
                                            </div>
                                        </div>                   
                                    </div>
                    </div>


                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" name="submit">Tambah</button>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Type Soal</label>
                                                <!-- <input class="form-control py-4" type="text" name="descSoal1" id="editsoaltypeid"> -->
                                                <!-- <p id="editsoaltype"></p> -->

                                                <select class="form-control" name="typeSoal">
                                                    <?php foreach ($listTypeSoal as $key): ?>
                                                        <option <?php if($key->id_soal_type == '<input class="form-control py-4" type="text" name="descSoal1" id="editsoaltypeid">'){ echo 'selected="selected"'; } ?> value="<?php echo $key->type_soal ?>"><?php echo $key->type_soal?> </option>
                                                    <?php endforeach ?>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">List Soal Group</label>
                                                
                                                <select class="form-control" name="soalGroup">
                                                        <!-- <option value="<?= $key->id_soal_group; ?>"><?= $key->desc_soal_group; ?> </option> -->
                                                    <?php foreach ($listSoalGroup as $key): ?>
                                                        <!-- <option value="<?= $key->id_soal_group; ?>"><?= $key->desc_soal_group; ?> </option> -->
                                                        <option <?php if($key->id_soal_group == '<input class="form-control py-4" type="text" name="descSoal1" id="editsoaltypeid">'){ echo 'selected="selected"'; } ?> value="<?php echo $key->id_soal_group ?>"><?php echo $key->desc_soal_group?> </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Deskripsi Soal</label>
                                                <input class="form-control py-4" type="text" name="descSoal" id="editdesk">
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
                    <h1 class="mt-4">SI-GMES</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">SIGMES/List Soal</li>
                    </ol>
                    <?php echo $this->session->flashdata('hasil'); ?>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                                List Soal SI-GMES
                            <button type="button"  style="float: right;" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button> 
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Group Soal</th>
                                            <th>Soal / Deskripsi</th>
                                            <th>Type Soal</th>
                                            <th>Create on</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Group Soal</th>
                                            <th>Soal / Deskripsi</th>
                                            <th>Type Soal</th>
                                            <th>Create on</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=0; foreach($listSoal as $key): $no++;?>
                                            <tr>
                                                <td><?= $no;  ?></td>
                                                <td><?= $key->desc_soal_group; ?></td>
                                                <td><?= $key->desk_soal; ?></td>
                                                <td><?= $key->type_soal; ?></td>
                                                <td><?= $key->date_create; ?></td>
                                                <td>
                                                    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myEdit">Edit</button> -->
                                                    <a class="btn btn-primary text-light" data-target="#myEdit" data-toggle="modal" data-id="<?= $key->id; ?>"
                                                     data-desk="<?= $key->desk_soal; ?>" data-soaltype="<?= $key->type_soal; ?>" data-sltypeid="<?= $key->id_soal_type; ?>" 
                                                     data-soalGroupID="<?= $key->id_soal_group; ?>" data-soalGroup="<?= $key->desc_soal_group; ?>"  class="btn btn-small"><i class="fa fa-edit"></i></a>

                                                    <a class="btn btn-danger text-light" data-target="#myDelete" data-toggle="modal" data-id="<?= $key->id; ?>"
                                                     data-desk="<?= $key->desk_soal; ?>" data-soalType="<?= $key->id_soal_type; ?>" data-soalGroup="<?= $key->id_soal_group; ?>" class="btn btn-small"><i class="fa fa-trash"></i></a>
                                                    
                                                    <!-- <a href="<?php echo site_url('Soal_type/delete/'.$key->id_soal_type)?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> -->
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                  
                  
                </div>
            </main>
   
</body>

</html>