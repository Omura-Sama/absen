<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Kuesioner</div>
                        <a class="nav-link" href="<?= site_url('Page/listExam'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-file "></i></div>
                            Exam
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Bank Soal
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= site_url('Page/listSigmes'); ?>">List Soal</a>
                                <a class="nav-link" href="<?= site_url('Page/typeSoal'); ?>">Type Soal</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Rekap Absensi</div>
                        <a class="nav-link" href="<?= site_url('Absen/index'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-file "></i></div>
                            List Tidak Absen
                        </a>
                        <a class="nav-link" href="<?= site_url('Absen/dataAbsen'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-file "></i></div>
                            List Absen
                        </a>
                        <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Absensi
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= site_url('Page/listSigmes'); ?>">Tidak Absen</a>
                                <a class="nav-link" href="<?= site_url('Page/typeSoal'); ?>">Absen</a>
                            </nav>
                        </div> -->
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                </div>
            </nav>