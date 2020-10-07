<?php
require('mahasiswa.class.php');

if (isset($_GET["deleted"])) {
    if ($_GET["deleted"] == "success") {
        $alert = array(
            "type" => "alert-success",
            "message" => "Data <strong>".ucwords($_GET["data"])."</strong> berhasil dihapus.",
        );
    } else if ($_GET["deleted"] == "failed") {
        $alert = array(
            "type" => "alert-danger",
            "message" => "Data <strong>".ucwords($_GET["data"])."</strong> gagal dihapus.",
        );
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>INF304 - Rekayasa Perangkat Lunak</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="https://raw.githubusercontent.com/naufalist/rpl/master/assets/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Custom CSS -->
    <style>
        body {
            overflow-x: hidden;
        }

        .navbar{
            background-color: #1c7ad8;
        }

        #page-header{
            background-color: #2196f3;
            background-image: url(https://raw.githubusercontent.com/naufalist/rpl/master/assets/bg-publik.jpg);
            background-position: bottom;
            background-repeat: no-repeat;
            background-size: 100% auto
        }

        #page-header .jumbotron{
            padding: 2rem 1rem!important;
            text-align: center;
            color: #fff
        }

        #page-header .jumbotron h1{
            font-size: 2.5rem!important;
            font-weight: 500!important
        }

        .bg-primary {
            background-color: #007bff!important;
        }

        .accortoggle > a {
            display: block;
            position: relative;
        }

        .accortoggle > a:after {
            content: "\f078"; /* fa-chevron-down */
            font-family: 'FontAwesome';
            position: absolute;
            right: 0;
        }

        .accortoggle > a[aria-expanded="true"]:after {
            content: "\f077"; /* fa-chevron-up */
        }

        #footer {
            background-color: #f5f5f5;
            position: fixed;
        }
    </style>

</head>
<body">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#" style="overflow: hidden;">
            <img src="https://raw.githubusercontent.com/naufalist/rpl/master/assets/logo.png" alt="IPB" style="height: 30px;">
            <strong class="ml-2 d-none d-md-inline-block">Pemrograman Berbasis Web</strong>
            <span class="ml-2 font-italic" style="opacity: 0.5;">TEK305</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ml-auto font-weight-bold font-italic">
                <li class="nav-item ml-2">
                    <a href="index.php" class="nav-link active router-link-active" target="_self">
                        <i class="fa fa-home fa-lg"></i> Beranda 
                    </a>
                </li>
                <li class="nav-item ml-2">
                    <a href="#" class="nav-link">
                        <i class="fa fa-users fa-md"></i> Daftar Mahasiswa
                    </a>
                </li>
                <!-- <li class="nav-item ml-2">
                    <a href="/" class="nav-link" target="_self" data-toggle="modal" data-target="#anggotaKelompok">
                        <i class="fa fa-users fa-md"></i> Informasi Kelompok
                    </a>
                </li> -->
            </ul>
        </div>
    </nav>

    <!-- Page Header -->
    <div id="page-header">
        <div class="jumbotron jumbotron-fluid" style="background-color: transparent;">
            <div class="container-fluid">
                <h1 class="display-3 m-0"> CRUD Mahasiswa </h1>
                <!-- <h2 class="lead font-weight-bold font-italic mt-2">
                    <div style="">
                    SiCeMet  merupakan aplikasi simulasi untuk cek metodologi agar sesuai dengan karakteristik proyek dalam pengembangan sistem. Selamat Mencoba ! 
                    </div>
                </h2> -->
                <!-- <p class="lead">
                    <div>
                    SiCeMet  merupakan aplikasi simulasi untuk cek metodologi agar sesuai dengan karakteristik proyek dalam pengembangan sistem. Selamat Mencoba !
                    </div>
                </p> -->
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container-fluid" style="margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col col-md-7">
            
            <?php if (isset($alert)) { ?>
                <div class="alert <?php echo $alert["type"]; ?> alert-dismissible fade show" role="alert">
                    <?php echo $alert["message"]; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

                <div class="card mb-2 shadow-sm">
                    <header class="card-header">
                        <div class="d-md-flex justify-content-between font-weight-bold">
                            <h5 class="mb-2"><i class="fa fa-graduation-cap fa-md"></i> Daftar Mahasiswa</h5>
                            <p class="mb-0 float-right">
                            <a href="add.php" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-user-plus fa-sm"></i> Tambah
                            </a>
                                <!-- Jumlah Kelas <span class="badge mr-1 badge-primary"> Kuliah = 2 </span><span class="badge mr-1 badge-info"> Praktikum = 4 </span> -->
                            </p>
                        </div>
                    </header>
                    <div class="card-body">
                    <table class="table table-sm table-hover">
                        <?php

                            $mahasiswa = new Mahasiswa("localhost", "root", "", "pbw");
                            $table = "mahasiswa";
                            // $data = array("nim");
                            // $where = array("nama" => "naufal");

                            $res = $mahasiswa->select($table);

                            if (!empty($res)) {

                                echo '
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>';

                                $i = 1;
                                foreach ($res as $row) {

                        ?>
                            <tr>
                                <th scope="row"><?php echo $i++ ?></th>
                                <td><?php echo $row->nim ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td>
                                    <a href="delete.php?id=<?php echo $row->id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-md"></i></a>
                                    <a href="edit.php?id=<?php echo $row->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="detail.php?id=<?php echo $row->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail</a>
                                </td>
                            </tr>
                        <?php
                            
                                }
                            } else {
                                echo "<div class='text-center'>Data kosong</div>";
                            }
                        ?>
                        </tbody>
                    </table>
                        <!-- <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahMahasiswa" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" class="form-control" name="nim" placeholder="" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="float-right">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" value="L" checked>
                                    <label class="form-check-label">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" value="P">
                                    <label class="form-check-label">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" class="form-control" required>
                                <option value="" selected disabled>-- Pilih! tdk boleh atheiss --</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Olahraga</label>
                            <div class="float-right">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="olahraga" type="checkbox" value="">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Sepak bola
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="olahraga" type="checkbox" value="">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Basket
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="olahraga" type="checkbox" value="">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Renang
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="olahraga" type="checkbox" value="">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Futsal
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="olahraga" type="checkbox" value="">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Badminton
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label></label>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <div class="float-right">
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label></label>
                        </div>

                        <button type="submit" name="subform" class="btn btn-primary btn-md">
                            <i class="fa fa-paper-plane fa-md"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-warning btn-md float-right">
                            <i class="fa fa-refresh fa-md"></i> Bersihkan
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="detailMahasiswa" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal Mahasiswa -->
    <div class="modal fade" id="mahasiswa" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="container">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <em class="font-weight-bold mb-2">Alur Metodologi</em>
                            <div class="text-center">
                                <img width="300" height="auto" src="" class="rounded modal-img" alt="modal-img">
                            </div>
                            <em class="font-weight-bold mb-2">Penjelasan</em>
                            <div class="modal-ket">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam deserunt quibusdam ducimus consectetur expedita fuga iste fugit eum voluptate vel explicabo asperiores nostrum, similique ipsa a dicta distinctio aut impedit!</p>
                            </div>
                            <em class="font-weight-bold mb-2">Kelebihan</em>
                            <div class="modal-ket2">
                                <ul>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>consectetur, adipisicing elit</li>
                                    <li>Totam deserunt quibusdam</li>
                                </ul>
                            </div>
                            <em class="font-weight-bold mb-2">Kekurangan</em>
                            <div class="modal-ket3">
                                <ul>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>consectetur, adipisicing elit</li>
                                    <li>Totam deserunt quibusdam</li>
                                </ul>
                            </div>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Page Footer -->
    <footer id="footer" class="mt-4 fixed-bottom">
        <div class="container-fluid py-3 small text-black-50" style="border-top: 1px solid rgb(221, 221, 221);">
            <div class="row">
                <div class="col-6"> Made with <span style="color: #e25555;">&#9829;</span><strong> J3D118042 </strong>
                </div>
                <div class="col-6 text-right"> Version <strong> 20200915.1 </strong>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
  </body>
</html>x