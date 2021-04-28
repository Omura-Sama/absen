<div class="container">
    <div class="callout callout-info">
        <h4>Peraturan Tes!</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime minus dolores accusantium fugiat debitis modi voluptates non consequuntur nemo expedita nihil laudantium commodi voluptatum voluptatem molestiae consectetur incidunt animi, qui exercitationem? Nisi illo, magnam perferendis commodi consequuntur impedit, et nihil excepturi quas iste cum sunt debitis odio beatae placeat nemo..</p>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Konfirmasi Data</h3>
        </div>
        <div class="box-body">
            <!-- <?php print_r($listExam); ?> -->
            <div class="row">
                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                                <td><?= $profil['nickname'] ?></td> 
                        </tr>
                        <tr>
                            <th>Nama Ujian</th>
                            <?php $no=0; foreach ($listExam as $key ): $no++ ?> 
                            <td><?=$key->name_exam?></td>
                            <?php endforeach ?>
                        </tr>
                        <tr>
                            <th>Jumlah Soal</th>
                            <?php $no=0; foreach ($listExam as $key ): $no++ ?> 
                                <td><?=$key->total_exam?></td>
                            <?php endforeach ?>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <?php $no=0; foreach ($listExam as $key ): $no++ ?> 
                            <td><?=$key->duration?> Menit</td>
                        </tr>
                    <form action="<?php echo base_url() ?>index.php/exam/cekToken" method="post">
                        <tr>
                            <th style="vertical-align:middle">Token</th>
                            <td>
                                <input autocomplete="off" hidden id="token" name="idExam" value="<?=$key->id_exam?>" placeholder="Token" type="text" class="input-sm form-control">
                                <input autocomplete="off" required id="token" name="tokenUsr" placeholder="Token" type="text" class="input-sm form-control">
                                <?php echo $this->session->flashdata('notif'); ?>
                            </td>
                            <?php endforeach ?>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <div class="box box-solid">
                        <div class="box-body pb-0">
                            <div class="callout callout-info">
                                <p>
                                    Waktu boleh mengerjakan ujian adalah saat tombol "MULAI" berwarna hijau.
                                </p>
                            </div>
                            <?php
                            foreach ($listExam as $key) {
                                $mulai = strtotime($key->start_date);
                                $terlambat = strtotime($key->end_date);
                            }
                            $now = time();
                            $date = date("F j, Y, g:i a"); 

                            // echo $mulai;

                            if($mulai > $now) : 
                            ?>
                            <div class="callout callout-success">
                                <strong><i class="fas fa-clock"></i> Ujian akan dimulai pada</strong>
                                <br>
                                <?php $no=0; foreach ( $listExam as $key ): $no++ ?> 
                                    <span class="countdown" data-time="<?= $date; ?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br/>
                                <?php endforeach ?>
                            </div>
                            <?php elseif( $terlambat > $now ) : ?>
                            
                            <?php $no=0; foreach ($listExam as $key ): $no++ ?> 
                            <button id="btncek" data-id="<?=$key->name_exam?>" class="btn btn-success btn-lg mb-4">
                                <i class="fas fa-pencil-alt"></i> Mulai
                                <!-- <a class="btn text-light" href="<?= site_url('Page/token/'.$key->id_exam); ?>"><i class="fa fa-edit"></i> Mulai </a> -->
                            </button>
                            <?php endforeach ?>

                            </form>
                            
                            <div class="callout callout-danger">
                                    <i class="fas fa-clock"></i> <strong class="countdown" data-time="<?= $mulai; ?>"></strong><br/>
                                <!-- Batas waktu menekan tombol mulai. -->
                            </div>
                            <?php else : ?>
                            <div class="callout callout-danger">
                                Waktu untuk menekan tombol <strong>"MULAI"</strong> sudah habis.<br/>
                                Silahkan hubungi Admin anda untuk bisa mengikuti tes selanjutnya.
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/app/ujian/token.js"></script>
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/pace/pace.min.js"></script>


<script>

var dataID = element.getAttribute('data-id');

// var time = new Date();
// var time = $(".countdown");
if (time.length) {
//   countdown(time.data("time"));
    countdown(time);
}
</script>

<script type="text/javascript">
	function sisawaktu(t) {
		var time = new Date(t);
		var n = new Date();
		var x = setInterval(function() {
			var now = new Date().getTime();
			var dis = time.getTime() - now;
			var h = Math.floor((dis % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60));
			var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
			var s = Math.floor((dis % (1000 * 60)) / (1000));
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);
			var cd = h + ":" + m + ":" + s;
			$('.sisawaktu').html(cd);
		}, 100);
		setTimeout(function() {
			waktuHabis();
		}, (time.getTime() - n.getTime()));
	}

	function countdown(t) {
		var time = new Date(t);
		var n = new Date();
		var x = setInterval(function() {
			var now = new Date().getTime();
			var dis = time.getTime() - now;
			var d = Math.floor(dis / (1000 * 60 * 60 * 24));
			var h = Math.floor((dis % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var m = Math.floor((dis % (1000 * 60 * 60)) / (1000 * 60));
			var s = Math.floor((dis % (1000 * 60)) / (1000));
			d = ("0" + d).slice(-2);
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);
			var cd = d + " Hari, " + h + " Jam, " + m + " Menit, " + s + " Detik ";
			$('.countdown').html(cd);

			setTimeout(function() {
				location.reload()
			}, dis);
		}, 1000);
	}

	function ajaxcsrf() {
		var csrfname = '<?= $this->security->get_csrf_token_name() ?>';
		var csrfhash = '<?= $this->security->get_csrf_hash() ?>';
		var csrf = {};
		csrf[csrfname] = csrfhash;
		$.ajaxSetup({
			"data": csrf
		});
	}

	$(document).ready(function() {
		setInterval(function() {
			var date = new Date();
			var h = date.getHours(),
				m = date.getMinutes(),
				s = date.getSeconds();
			h = ("0" + h).slice(-2);
			m = ("0" + m).slice(-2);
			s = ("0" + s).slice(-2);

			var time = h + ":" + m + ":" + s;
			$('.live-clock').html(time);
		}, 1000);
	});
</script>