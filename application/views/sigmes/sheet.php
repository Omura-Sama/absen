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
            <main>
                <div class="container-fluid">
                    <h3>Test </h3>
                   <div>
                     <p>Waktu Tersisa :</p>
                   </div>

                    <div id="progressBar">
                        <div class="bar"></div>
                    </div>
                    <div>
                        <div class="row"> 
                        <?php $no=0; foreach ($soal as $key ): $no++ ?>
                            <div> 
                                <form action="<?php echo base_url() ?>index.php/Exam/edit" method="GET">
                                    <input hidden type="text" value="<?= $key->id; ?>" name='id'>
                                    <input hidden type="text" class="myids" name='tesVal'>                           
                                    <button type="submit" class="btn btn-outline-info btn-lg">
                                        <?= $key->nourut; ?>
                                        <!-- <a href="javascript:void(0);" class="btn btn-danger" data-name="<?php echo $key->nourut?>" data-id="<?php echo $key->id?>" onclick="hapus_warna(this)"><i ><?= $key->nourut; ?></i></a> -->
                                        <!-- <a href="<?php echo site_url('Exam/edit/'.$key->id.'/'.$thediv)?>"class="btn btn-small"> <?= $key->nourut; ?> </a> -->
                                    </button>
                                </form>
                            </div>
                        <?php endforeach ?>   
                        </div>
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
                                                <!-- <div id="test"></div> -->
                                                <!-- <?= print_r($soal); ?> -->
                                                <form action="<?php echo base_url() ?>index.php/Exam/edit" method="POST">

                                                <?php $no=0; foreach ($soal as $key ): $no++ ?> 
                                                    <?php if($key->nourut == '1'){ ?> 
                                                        <?php echo $key->desk_soal; ?>
                                                            <br>
                                                            <div id="btnPoli" class="btn-group-toggle align-middle" role="group" data-toggle="buttons">
                                                            
                                                            <label class="btn btn-outline-success mt-3 mr-3" style="width: 70px;">
                                                                <input type="radio" id="jwb" name="jwbuser" value="a" hidden> 
                                                                <p for="opsia"><?= $key->opsi_a; ?></p> 
                                                            </label>
                                                            <label class="btn btn-outline-success mt-3 mr-3" style="width: 70px;">
                                                                <input type="radio" id="jwb" name="jwbuser" value="b" hidden>
                                                                <p for="opsib"><?= $key->opsi_b; ?></p> 
                                                            </label><br>
                                                            <input hidden type="text" id="tesVal1" name='lastdrs'>
                                                            </div><br>
                                                           
                                                        <!-- <button> -->

                                                        <?php $urutanke = $key->id+1; ?>
                                                            <input hidden type="text" name="urutanke" value="<?= $urutanke;?>">
                                                            <button type="submit" value="submit" class="btn btn-secondary">Selanjutnya</button>

                                                            <!-- <a href="<?php echo site_url('Exam/edit/'.$urutanke)?>"class="btn btn-small"> Selanjutnya </a> -->
                                                        <!-- </button> -->
                                                        <?php }else{ ?>

                                                        <?php } ?>
                                                <?php endforeach ?> 

                                                </div>                                                
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
                <!-- <?= $exam[0]->duration; ?> -->

            </main>
</body>

<script>
var javaScriptVar = "<?php echo $exam[0]->duration*60; ?>";

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
progress(10, 10, $('#progressBar'));

// progress(javaScriptVar, javaScriptVar, $('#progressBar'));


function hapus_warna(obj)
{
    var id = $(obj).attr('data-id');    
    var drs = document.getElementById("tesVal1").value;

        $.ajax({
            // url : "edit/"+id+"/"+drs,
            url : "edit/",
            type: "POST",
            data:{'id': id, 'durasi':drs},
            // success: function(data) {
            //    location.reload();
            // },
            // error: function (jqXHR, textStatus, errorThrown) {
            //    alert('Error deleting data');
            // }
        });
}
</script>




</html>