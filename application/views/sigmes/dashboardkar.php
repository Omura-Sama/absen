<!DOCTYPE html>
<html lang="en">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard/Data Diri</li>
                    </ol>
                     <!-- <?php print_r($profil); ?> -->

                        <div class="row">
                            <div class="col-8">
                                <div class="card">
                                <div class="card-header">
                                    Informasi Akun
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            
                                            <tr>
                                                <th scope="col">NIP</th>
                                                <th scope="col"><?= $profil['nip'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama Lengkap</th>
                                                <td><?= $profil['fullname'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis Kelamin</th>
                                                <td><?= $profil['gender'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td><?= $profil['email'] ?></td>
                                            </tr>
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

</html>