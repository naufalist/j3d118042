<?php
require('mahasiswa.class.php');
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
            
                <div class="card mb-2 shadow-sm">
                    <header class="card-header">
                        <div class="d-md-flex justify-content-between font-weight-bold">
                            <h5 class="mb-2"><i class="fa fa-graduation-cap fa-md"></i> Detail Mahasiswa</h5>
                            <p class="mb-0 float-right">
                            <a href="index.php" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-arrow-left fa-sm"></i> Kembali
                            </a>
                                <!-- Jumlah Kelas <span class="badge mr-1 badge-primary"> Kuliah = 2 </span><span class="badge mr-1 badge-info"> Praktikum = 4 </span> -->
                            </p>
                        </div>
                    </header>
                    <div class="card-body">
                    <table class="table table-sm table-hover">
                        <tbody>
                        <?php

                        if (isset($_GET["id"]) and is_numeric($_GET["id"]) ) {

                            $mahasiswa = new Mahasiswa("localhost", "root", "", "pbw");
                            $table = "mahasiswa";
                            // $data = array("nim");
                            $where = array("id" => $_GET["id"]);

                            $res = $mahasiswa->select($table, $data = NULL, $where);
                            
                            if (!$res) {
                                echo "Hmm sepertinya data tidak ada.";
                            } else {

                        ?>
                            <tr>
                                <th scope="col">NIM</th>
                                <td><?php echo $res[0]->nim ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Nama</th>
                                <td><?php echo $res[0]->nama ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Jenis Kelamin</th>
                                <td>
                                    <?php 
                                        if ($res[0]->jenis_kelamin == "L") {
                                            echo "Laki-laki";
                                        } else if ($res[0]->jenis_kelamin == "P") {
                                            echo "Perempuan";
                                        } else {
                                            "";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Agama</th>
                                <td><?php echo ucfirst($res[0]->agama) ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Olahraga</th>
                                <td><?php
                                        if (empty($res[0]->olahraga_fav)) {
                                            echo "-";
                                        } else {
                                            $olahraga = explode("#", $res[0]->olahraga_fav);
                                            for ($i=0; $i < count($olahraga); $i++) { 
                                                if ($i == (count($olahraga)-1)) {
                                                    echo ucfirst($olahraga[$i]);
                                                } else {
                                                    echo ucfirst($olahraga[$i]).", ";
                                                }
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Foto</th>
                                <td><?php echo "<img width=\"200\" src=\"data:image/jpeg;base64,".base64_encode($res[0]->foto_profil)."\"/>" ?></td>
                            </tr>
                        <?php
                            }
                        } else {
                            echo "Hmm sepertinya data tidak ada.";
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
</html>