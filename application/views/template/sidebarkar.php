            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main Menu</div>
                        <a class="nav-link" href="<?= site_url('Page/karIndex'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="<?= site_url('Page/listtestKar'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                            Tes
                        </a>
                        
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">
                        Logged in as : 
                        <?php 
                        if (!empty($profil['nickname'])) {
                            echo $profil['nickname'];
                        }else{
                           echo $profil[0]->nickname;
                        }
                         ?></div> 
                </div>
            </nav>