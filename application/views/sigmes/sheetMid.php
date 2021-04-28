<!DOCTYPE html>
<html lang="en">


<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


<meta charset="UTF-8">
<style>
div#test{ border:#000 1px solid; padding:10px 40px 40px 40px; }

#progressBar {
  width: 90%;
  margin: 10px auto;
  height: 22px;
  background-color: #0A5F44;
}

#progressBar div {
  height: 100%;
  text-align: right;
  padding: 0 10px;
  line-height: 22px; /* same as #progressBar height if we want text middle aligned */
  width: 0;
  background-color: #CBEA00;
  box-sizing: border-box;
}

/* Do not take in account */
html{padding-top:30px}a.solink{position:fixed;top:0;width:100%;text-align:center;background:#f3f5f6;color:#cfd6d9;border:1px solid #cfd6d9;line-height:30px;text-decoration:none;transition:all .3s;z-index:999}a.solink::first-letter{text-transform:capitalize}a.solink:hover{color:#428bca}
</style>

<script>
var pos = 0, test, test_status, question, choice, choices, chA, chB, chC, correct = 0;
<?php
    foreach ($listSoal as $key) {
        $soal = $key->desk_soal;
        $opsiA = $key->opsi_a;
        $opsiB = $key->opsi_b;
    $array = array($soal,$opsiA,$opsiB,$opsiB,'A');
    }

?>
var questions = [
    [<?= '"'.implode('","', $array).'"'?>],
    [<?= '"'.implode('","', $array).'"'?>],
    [<?= '"'.implode('","', $array).'"'?>],
    [<?= '"'.implode('","', $array).'"'?>],
    [<?= '"'.implode('","', $array).'"'?>]
];

var questions1 = [
	[ "What is 20 - 9?", "7", "13", "11", "C" ],
	[ "What is 7 x 3?", "21", "24", "25", "A" ],
	[ "What is 8 / 2?", "10", "2", "4", "C" ]
];
function _(x){
	return document.getElementById(x);
}
function renderQuestion(){
	test = _("test");
	if(pos >= questions.length){
		test.innerHTML = "<h2>You got "+correct+" of "+questions.length+" questions correct</h2>";
		_("test_status").innerHTML = "Test Completed";
		pos = 0;
		correct = 0;
		return false;
	}
	_("test_status").innerHTML = "Question "+(pos+1)+" of "+questions.length;
	question = questions[pos][0];
	chA = questions[pos][1];
	chB = questions[pos][2];
	// chC = questions[pos][3];
	test.innerHTML = "<h3>"+question+"</h3>";
	test.innerHTML += "<input type='radio' name='choices' value='A'> "+chA+"<br>";
	test.innerHTML += "<input type='radio' name='choices' value='B'> "+chB+"<br><br>";
	// test.innerHTML += "<input type='radio' name='choices' value='C'> "+chC+"<br><br>";
	test.innerHTML += "<button onclick='checkAnswer()'>Submit Answer</button>";
}
function checkAnswer(){
	choices = document.getElementsByName("choices");
	for(var i=0; i<choices.length; i++){
		if(choices[i].checked){
			choice = choices[i].value;
		}
	}
	if(choice == questions[pos][4]){
		correct++;
	}
	pos++;
	renderQuestion();
}
window.addEventListener("load", renderQuestion, false);
</script>
</head>
<!-- <?php print_r($title); ?> -->
            <main>
                <div class="container-fluid">
                    <h3>
                    <!-- <?php print_r($title); ?> -->
                        <!-- <?= $title[0]->name_exam; ?> -->
                    </h3>
                   <div>
                     <p>Waktu Tersisa :</p>
                   </div>

                    <div id="progressBar">
                        <div class="bar"></div>
                    </div>

                    <div>
                        <div class="row">
                            <!-- <?php $myPhpVar= $_COOKIE['myDuration'];?> -->

                                <?php $no=0; foreach ($soal as $key ): $no++ ?>
                                    <?php $cekJwb = $key->jawaban_user; ?>
                                <?php if($cekJwb != null){ ?>
                                    <form action="<?php echo base_url() ?>index.php/Exam/edit" method="GET">
                                        <input hidden type="text" value="<?= $key->id; ?>" name='id'>
                                        <input hidden type="text" class="myids" name='tesVal'>                           
                                       <button type="submit" class="btn btn-success btn-outline-info btn-lg ">
                                            <!-- <p class="text-light"><?= $key->nourut; ?></p> -->
                                            <span class="text-light"><?= $key->nourut; ?></span>   
                                        </button>
                                    </form>
                                <?php }else{ ?>
                                    <form action="<?php echo base_url() ?>index.php/Exam/edit" method="GET">
                                        <input hidden type="text" value="<?= $key->id; ?>" name='id'>
                                        <input hidden type="text" class="myids" name='tesVal'>                           
                                        <button type="submit" class="btn btn-outline-info btn-lg">
                                            <?= $key->nourut; ?>
                                        </button>
                                    </form>
                                <?php } ?>                      
                                <?php endforeach ?>
                        </div>

                        <!-- <?php print_r($dataNosoal); ?> -->
                    </div>

                    <br><br>

                        <div class="row">
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 id="test_status"></h2>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            </thead>
                                            <tbody>
                                                <!-- <?= print_r($soalInt); ?> -->

                                                <form action="<?php echo base_url() ?>index.php/Exam/edit" method="POST">
                                                <input hidden type="text" id="tesVal1" name='lastdrs'>

                                                <?php $no=0; foreach ($soalInt as $key ): $no++ ?> 
                                                        <?php echo $key->desk_soal; ?>
                                                            <br>
                                                        <?php if($key->jawaban_user != null){ ?>
                                                            <?php if($key->jawaban_user == 'a') {?>
                                                                <input type="radio" id="jwb" name="jwbuser" value="a" checked> 
                                                                <label for="opsia"><?= $key->opsi_a; ?></label><br>  
                                                                <input type="radio" id="jwb" name="jwbuser" value="b"> 
                                                                <label for="opsib"><?= $key->opsi_b; ?></label><br>    
                                                            <?php }else{ ?>
                                                                <input type="radio" id="jwb" name="jwbuser" value="a"> 
                                                                <label for="opsia"><?= $key->opsi_a; ?></label><br>
                                                                <input type="radio" id="jwb" name="jwbuser" value="b" checked> 
                                                                <label for="opsib"><?= $key->opsi_b; ?></label><br>
                                                            <?php } ?>
                                                        <?php }else{ ?>
                                                            <input type="radio" id="jwb" name="jwbuser" value="a"> 
                                                            <label for="opsia"><?= $key->opsi_a; ?></label><br>
                                                            <input type="radio" id="jwb" name="jwbuser" value="b"> 
                                                            <label for="opsib"><?= $key->opsi_b; ?></label><br>
                                                        <?php } ?>

                                                        <!-- <div class="container"> -->
                                                            <div class="row">
                                                                <div class="col-sm">
                                                                    <?php if($key->nourut != $urutStart ){ ?>                                                       
                                                                        <?php $urutanke = $key->id-1; ?>
                                                                        <input hidden type="text" name="urutanke" value="<?= $urutanke;?>">
                                                                        <button type="submit" value="submit" class="btn btn-secondary">Sebelumnya</button>
                                                                        <!-- <button>
                                                                            <a href="<?php echo site_url('Exam/edit/'.$urutanke)?>"class="btn btn-small"> Sebelumnya </a>
                                                                        </button> -->
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="col-sm">
                                                                    <?php if ($key->nourut != $urutEnd) { ?>
                                                                        <?php $urutanke = $key->id+1; ?>
                                                                        <input hidden type="text" name="urutanke" value="<?= $urutanke;?>">
                                                                        <button type="submit" value="submit" class="btn btn-secondary">Selanjutnya</button>

                                                                        <!-- <button>
                                                                            <a href="<?php echo site_url('Exam/edit/'.$urutanke)?>"class="btn btn-small"> Selanjutnya </a>
                                                                        </button> -->
                                                                    <?php }else{ ?>
                                                                        <?php $urutanke = $key->id; ?>
                                                                        <input hidden type="text" name="urutanke" value="<?= $urutanke;?>">
                                                                        <button type="submit" name="submit" value="selesai" class="btn btn-secondary">Selesai</button>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        <!-- </div> -->
                                                <?php endforeach ?> 
                                                </form>
                                               
                                                <!-- <div>testing</div> -->
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
                </div>
            </main>
   
</body>

<script>
 var javaScriptVar = "<?php echo $soalInt[0]->durasi; ?>";

function progress(timeleft, timetotal, $element) {
    var progressBarWidth = timeleft * $element.width() / timetotal;
    $element.find('div').animate({ width: progressBarWidth }, 500).html(Math.floor(timeleft/60) + ":"+ timeleft%60);
    if(timeleft > 0) {
        setTimeout(function() {
            progress(timeleft - 1, timetotal, $element);
        }, 1000);
    }

     // document.write(timeleft);
    $("#lastdurastion").html(timeleft);
     var modal = $(this);
    modal.find('#lsdur').val(timeleft);
    document.getElementById("tesVal1").value = timeleft;
    $('.myids').val(timeleft);
    document.cookie = "myDuration = " + timeleft

    if(timeleft <= 0 ){
        // selesai();
        alert('Waktu ujian telah habis!');
        // selesai();
        window.location.href = "<?php echo site_url('Exam/saveSheet'); ?>";
    }
};

// progress(800, 800, $('#progressBar'));
progress(javaScriptVar, javaScriptVar, $('#progressBar'));

function selesai() {
    simpan();
    ajaxcsrf();
    $.ajax({
        type: "POST",
        url: base_url + "ujian/simpan_akhir",
        data: { id: id_tes },
        beforeSend: function () {
            simpan();
            // $('.ajax-loading').show();    
        },
        success: function (r) {
            console.log(r);
            if (r.status) {
                window.location.href = base_url + 'ujian/list';
            }
        }
    });
}

</script>

</html>