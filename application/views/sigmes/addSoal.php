<!DOCTYPE html>
<html lang="en">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?= $title;  ?></h3></div>
                                    <div class="card-body">
                                        <!-- <form action="" method="post"> -->
                                        <form action="<?php echo base_url() ?>index.php/Home/insertObat" method="post">                   
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Type Soal</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Isi Type Soal" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Soal Pertanyaan</label>
                                                        <input class="form-control py-4" name="obatName" id="inputFirstName" type="text" placeholder="Isi Soal atau Pertanyaan " />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Ukuran</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter Size" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Jumlah</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Jumlah" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="login.html">Tambah Obat</a></div>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            
</html>
