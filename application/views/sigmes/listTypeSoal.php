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
        
                var modal = $(this);
                modal.find('#editcode').val(codeId);
                modal.find('#editdesk').val(desk);          
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
                      <h4 class="modal-title">Tambah Type Soal</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <form action="<?php echo base_url() ?>index.php/Soal_type/create" method="POST">
                    <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">Type Deskripsi Soal</label>
                                                <input class="form-control py-4" name="typeSoal" id="inputFirstName" type="text" placeholder="Masukan Type Soal" />
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
                      <h4 class="modal-title">Edit Type Soal</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <form action="<?php echo base_url() ?>index.php/Soal_type/edit" method="POST">
                    <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input hidden type="text" name="id" id="editcode">
                                                <label class="small mb-1" for="inputFirstName">Deskripsi Type Soal</label>
                                                <input class="form-control py-4" type="text" name="desk" id="editdesk">
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
                        <li class="breadcrumb-item active">SIGMES/List Type Soal</li>
                    </ol>
                    <?php echo $this->session->flashdata('hasil'); ?>

                    <div class="card mb-4">
                        <div class="card-header row-">
                                <div class="col-sm-" align="left">
                                    <i class="fas fa-table mr-1"></i>
                                    List Type Soal SI-GMES
                                </div>
                               
                                <div class="col-sm-" align="right">
                                    <!-- <button align="left">Tambah</button> -->

                                     <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> -->
                                        
                                    <!-- </button> -->
                                </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Type Soal</th>
                                            <th>Create on</th>
                                            <th>Action</th>
                                            <!-- <th>Remark</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Type Soal</th>
                                            <th>Create on</th>
                                            <th>Action</th>
                                            <!-- <th>Remark</th> -->
                                        </tr>
                                    </tfoot>
                                    <?php print_r($listTypeSoal); ?>
                                    <tbody>
                                        <?php $no=0; foreach($listTypeSoal as $key): $no++;?>
                                            <tr>
                                                <td><?= $no;  ?></td>
                                                <td><?= $key->type_soal; ?></td>
                                                <td><?= $key->date_create; ?></td>
                                                <td>
                                                    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myEdit">Edit</button> -->
                                                    <a class="btn btn-primary text-light" data-target="#myEdit" data-toggle="modal" data-id="<?= $key->id_soal_type; ?>"
                                                     data-desk="<?= $key->type_soal; ?>" class="btn btn-small"><i class="fa fa-edit"></i></a>

                                                    <a class="btn btn-danger text-light" data-target="#myDelete" data-toggle="modal" data-id="<?= $key->id_soal_type; ?>"
                                                     data-desk="<?= $key->type_soal; ?>" class="btn btn-small"><i class="fa fa-trash"></i></a>
                                                    
                                                    <!-- <a href="<?php echo site_url('Soal_type/delete/'.$key->id_soal_type)?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> -->
                                                </td>
                                                <!-- <td></td> -->
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