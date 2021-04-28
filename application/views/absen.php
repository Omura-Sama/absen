<!DOCTYPE html>
<html lang="en">
<!-- <?php
		// header("refresh: 5"); 
		// ?> -->

<?php
// include "db_connection.php";
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico"> -->
	<title>Dashboard Absensi</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="content">
		<h3>
			<p class="text-center font-weight-bold">ABSENSI RSUD CIBINONG</p>
		</h3>
		<div class="row" style="padding-left: 50px!important; padding-right: 40px;">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<div class="dash-widget">
					<span class="dash-widget-bg1"><i class="fa fa-user-o" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3>
							<?=  
								$sumAbsen1;
							?>
						</h3>
						<span class="widget-title1">Total Absen<i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
				<!-- <div class="dash-widget">
					<span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
					<div class="dash-widget-info text-right">
						<h3>1072</h3>
						<span class="widget-title2">Absen Pulang<i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div> -->
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				<!-- <div class="dash-widget"> -->
					<!-- <span class="dash-widget-bg3"><i class="fa fa-user-o" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3>72</h3>
						<span class="widget-title3">Terlambat <i class="fa fa-check" aria-hidden="true"></i></span>
					</div> -->
				<!-- </div> -->
				<div class="dash-widget">
					<span class="dash-widget-bg4"><i class="fa fa-user-o" aria-hidden="true"></i></span>
					<div class="dash-widget-info text-right">
						<h3>
							<?=  
								$sumAbsen;
							?>
						</h3>
						<span class="widget-title4">Total Tidak Absen <i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
				
			</div>
		</div>

		<div class="row" style="padding-left: 2px!important; padding-right: 5px;">
			
			<div class="col-md col-sm col-lg ol-xl">
				<div class="dash-widget" style="width: auto;">
				<form method="POST" action="http://absen.rsudcibinong.com/index.php/Login/search">

                <div class="row filter-row">
				 	<div class="col-sm col-md-2">
                        <div class="form-group form-focus select-focus focused">
						</div>
                    </div>
                    <div class="col-sm col-md">
                        <div class="form-group form-focus select-focus focused">
                            <label class="focus-label">Select Date</label>
							<?php if(empty($tglselect)){ ?>
								<input id="el" class="col-sm" type="date" name="datef">	
								<button class="col-sm-2" onclick="javascript:el.value=''">X</button>
							<?php }else{ ?>
								<input id="el" class="col-sm" type="date" name="datef" value="<?= $tglselect; ?>">	
								<button class="col-sm-2" onclick="javascript:el.value=''">X</button>
							<?php } ?>
						</div>
                    </div>
                    <!-- <div class="col-sm col-md">
                        <div class="form-group form-focus select-focus focused">
                            <label class="focus-label">Select Date Until</label>
							<input class="col-sm" type="date" name="dateto"> 
                        </div>
                    </div> -->
                    <!-- <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Select Year</label>
                            <select class="select floating">
                                <option>-</option>
                                <option>2017</option>
                                <option>2016</option>
                                <option>2015</option>
                                <option>2014</option>
                                <option>2013</option>
                            </select> 
                        </div>
                    </div> -->
                    <div class="col-sm col-md">
                        <!-- <a href="#" class="btn btn-success btn-block"> Search </a> -->
                        <input type="submit" class="btn btn-success btn-block" name="Search">
                    </div>
					<div class="col-sm col-md-2">
                        <div class="form-group form-focus select-focus focused">
						</div>
                    </div>
                </div>
                </form>
				</div>
				<!-- <div class="dash-widget">
					<span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
					<div class="dash-widget-info text-right">
						<h3>1072</h3>
						<span class="widget-title2">Absen Pulang<i class="fa fa-check" aria-hidden="true"></i></span>
					</div>
				</div> -->
			</div>
			
		</div>

		<div class="row">
			<div class="col-12 col-md-6 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="chart-title">
							<h4>Kehadiran Pegawai</h4>
							<!-- <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span> -->
						</div>
						<div class="table-responsive">
							<!-- <table class="table mb-0"> -->
                            <table id="example" class="ui celled table"  style="width:100%">

								<thead>
									<tr>
                                        <!-- <th>No</th> -->
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Unit</th>
                                        <th>Total Absen</th>
                                        </tr>
								</thead>

								<tbody>
                                        <!-- <?= print_r($listAbsenNull); ?> -->
                                        <?php $no=0; foreach($listAbsen as $key): $no++;?>
                                            <tr>
                                                <!-- <td><?= $no;  ?></td> -->
                                                <td><?= $key->nip; ?></td>
                                                <td><?= $key->fullname; ?></td>
                                                <td><?= $key->nama_unit; ?></td>
                                                <td><?= $key->total_absen; ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>	
								
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="chart-title">
							<h4>Tidak Absen</h4>
						</div>
						<div class="table-responsive">
							<!-- <table class="table mb-0"> -->
                            <table id="example1" class="ui celled table"  style="width:100%">
							
								<thead>
									<tr>
                                        <!-- <th>No</th> -->
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Unit</th>
                                        <th>Total Absen</th>
                                    </tr>
								</thead>
								<tbody>
                                        <!-- <?= print_r($listAbsenNull); ?> -->
                                        <?php $no=0; foreach($listAbsenNull as $key): $no++;?>
                                            <tr>
                                                <!-- <td><?= $no;  ?></td> -->
                                                <td><?= $key->nip; ?></td>
                                                <td><?= $key->fullname; ?></td>
                                                <td><?= $key->nama_unit; ?></td>
                                                <td><?= $key->total_absen; ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
								<!-- <tfoot>
									<tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Unit</th>
                                        <th>Total Absen</th>
                                    </tr>
								</tfoot>	 -->
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="row"> -->
			<!-- <div class="col-12 col-md-6 col-lg-8 col-xl-8"> -->
				<!-- <div class="card" style="padding-left: 50px!important; padding-right: 20px;">
					<div class="card-header">
						<h4 class="card-title d-inline-block">Pegawai Absen</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
					</div>
					<div class="card-body p-0">
						
					</div>
				</div> -->
			<!-- </div> -->
			<!-- <div class="col-12 col-md-6 col-lg-4 col-xl-4">
				<div class="card member-panel">
					<div class="card-header bg-white">
						<h4 class="card-title mb-0">Pegawai Paling Produktif</h4>
					</div>
					<div class="card-body">
						<ul class="contact-list">
							<li>
								<div class="contact-cont">
									<div class="float-left user-img m-r-10">
										<a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
									</div>
									<div class="contact-info">
										<span class="contact-name text-ellipsis">Maulana Yusril Mahendra</span>
										<span class="contact-date">Instalasi IT</span>
									</div>
								</div>
							</li>
						</ul>
					</div> -->
						<!-- <div class="card-footer text-center bg-white">
							<a href="doctors.html" class="text-muted">View all Employee</a>
						</div> -->
				<!-- </div>
			</div> -->
		<!-- </div> -->
	</div>
	<div class="sidebar-overlay" data-reff=""></div>
	<script src="../../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../../assets/js/popper.min.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
	<script src="../../assets/js/jquery.slimscroll.js"></script>
	<script src="../../assets/js/Chart.bundle.js"></script>
	<script src="../../assets/js/chart.js"></script>
	<script src="../../assets/js/app.js"></script>

	<script>
		$(document).ready(function() {
			$('#example').DataTable( {
				"order": [[ 3, "asc" ]]
			} );
		} );
	</script>

	<script>
		// $(document).ready(function() {
		// 	$('#example1').DataTable();
		// } );

		$(document).ready(function() {
			$('#example1').DataTable( {
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select><option value=""></option></select>')
							.appendTo( $(column.header()) )
							// .appendTo( $(column.footer()).empty() )
							// .appendTo( '#userstable_filter' )
							.on( 'change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);
		
								column
									.search( val ? '^'+val+'$' : '', true, false )
									.draw();
							} );
						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			} );
		} );
	</script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

</body>

</html>