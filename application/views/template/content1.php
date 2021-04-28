<!DOCTYPE html>
<html>
<body>
	<div id='right-panel'>
		<div class="breadcrumbs">
            
        	<div class="col-lg-10">
                    <div class="card">
                      <div class="card-header">
                        <strong>Input Kode Part Tag Delivery </strong>
                      </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="form-horizontal">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Kode Part Tag Delivery</label></div>
                            <div class="col-12 col-md-9"><input required="" name="kode" type="text" placeholder="Input No PTD" class="form-control" autofocus></div>
                          </div>
                        </form>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                      </div>
                    </div>
           </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table Good Recived</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
        				<th>Number</th>
        				<th>SO Code</th>
        				<th>Item Number</th> 
        				<th>Part Tag Number</th>
        				<th>PTD Ke</th>
        				<th>Part Number</th>
        				<th>Description</th>
        				<th>Job Number</th>
        				<!-- <th>Plan Qty</th>   -->
        				<!-- <th>Sales Unit</th> -->
        				<th>Document Date</th>
        				<th>Request Delivery Date</th>
        				<th>Delivery Complited</th>
        				<!-- <th>Create On</th> -->
        				<!-- <th>Computer Name</th> -->
        				<!-- <th>User Name</th> </b> -->
        				<!-- <th>Order Quantity</th> -->
        				<!-- <th>Picking List Number</th> -->
        				<!-- <th>Plan Quantity</th> -->
        				<!-- <th>Kode Pallet</th>  -->
        				<!-- <th>Tag Number</th>  -->
        				<!-- <th>Cycle</th> -->
        				<th>Status</th> 
        				<!-- <th>Jumlah</th>  -->
      				</tr>
                    </thead>
                    <tbody>
                      <?php $no=0; foreach($partno as $row): $no++;?>

      <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row->vbeln; ?></td>
          <td><?php echo $row->posnr;?></td>
          <td><?php echo $row->zdn;?></td>
          <td><?php echo $row->dn;?></td>
          <td><?php echo $row->matnr; ?></td>
          <td><?php echo $row->maktx; ?></td>
          <td><?php echo $row->bismt; ?></td>
          <td><?php echo $row->lwpmg; ?></td>
          <td>PC</td>
          <td><?php echo $row->audat; ?></td>
          <td><?php echo $row->vdatu; ?></td>
          <td><?php echo $row->elikz; ?></td>
          <td><?php echo $row->erdat; ?></td>
          <td><?php echo $row->zcname; ?></td>
          <td><?php echo $row->uname; ?></td>
          <td><?php echo $row->qtylot; ?></td>
          <td><?php echo $row->znopick; ?></td>
          <td><?php echo $row->zqty; ?></td>
          <td><?php echo $row->zpallet; ?></td>
          <td><?php echo $row->notag; ?></td>
          <td><?php echo $row->zcycle; ?></td>
          <td><?php echo $row->zcount; ?></td>
          <td>
          <?php $row->zdo;
              if ( $row->zdo == 1) {
                  $row->zdo = "Sudah diterima";
              }else{
                  $row->zdo = "Belum diterima";
              }
              echo $row->zdo;?> 
          </td>
          <td><?php echo $row->zminus; ?></td>
      </tr>
      <?php endforeach;?>

  </table>
</div>

</tbody>

</body>

<?php 

if (isset($_POST['simpan']) AND isset($_POST['kode'])){ 


$this->load->library('sap');
      $sap = new SAPConnection();
      $sap->Connect();
    
      if ($sap->GetStatus() == SAPRFC_OK ) $sap->Open ();
      if ($sap->GetStatus() != SAPRFC_OK ) {
          $sap->PrintStatus();
          exit;
            }
  
    $fce = &$sap->NewFunction ("Z_RFC_GET_VENDOR");
      if ($fce == false ) {
          $sap->PrintStatus();
          exit;
      }

    $fce->ZDN = $this->input->post('kode');
    $fce->Call();

    // echo $fce->T_LFA1;

      $fce->T_LFA1->Reset();
      while ( $fce->T_LFA1->Next() )


      $data = array(
        'vbeln' => $fce->T_LFA1->row["VBELN"],
        'posnr' => $fce->T_LFA1->row["POSNR"], 
        'zdn'   => $fce->T_LFA1->row["ZDN"], 
        'matnr' => $fce->T_LFA1->row["MATNR"],
        'maktx' => $fce->T_LFA1->row["MAKTX"],
        'bismt' => $fce->T_LFA1->row["BISMT"],
        'lwpmg' => $fce->T_LFA1->row["LWPMG"],
        'vrkme' => $fce->T_LFA1->row["VRKME"], 
        'audat' => $fce->T_LFA1->row["AUDAT"], 
        'vdatu' => $fce->T_LFA1->row["VDATU"],
        'elikz' => $fce->T_LFA1->row["ELIKZ"],
        'erdat' => $fce->T_LFA1->row["ERDAT"],
        'zcname'  => $fce->T_LFA1->row["ZCNAME"],
        'uname'   => $fce->T_LFA1->row["UNAME"], 
        'qtylot'  => $fce->T_LFA1->row["QTYLOT"], 
        'znopick' => $fce->T_LFA1->row["ZNOPICK"],
        'zqty'    => $fce->T_LFA1->row["ZQTY"],
        'zpallet' => $fce->T_LFA1->row["ZPALLET"],
        'notag'  => $fce->T_LFA1->row["NOTAG"], 
        'zcycle' => $fce->T_LFA1->row["ZCYCLE"], 
        'zcount' => $fce->T_LFA1->row["ZCOUNT"],
      );


      $sap->Close();


      $insert = $this->db->insert('part_tag',$data);

      // print_r($data);  

      redirect('');
    }
 ?>
                  	</tbody>
                  </table>	
	</div>
</body>
<script src="<?php echo base_url() ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>


    <script src="<?php echo base_url() ?>assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
</html>