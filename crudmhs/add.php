<?php
require('mahasiswa.class.php');

if (isset($_POST["submit"])) {

    // print_r($_POST);
    // exit();

    if (strlen($_POST["nim"]) == 9) {

        if (!isset($_POST["olahraga"])) {
            $olahraga = "";
        } else {
            $olahraga = "";
            for ($i=0; $i < count($_POST["olahraga"]); $i++) { 
                if ($i == (count($_POST["olahraga"])-1)) {
                    $olahraga .= $_POST["olahraga"][$i];
                } else {
                    $olahraga .= $_POST["olahraga"][$i]."#";
                }
            }
        }
    
        $extArr	= array('png', 'jpg','jpeg');
        $ext = explode('.', $_FILES['foto']['name']);
        $foto_ext = strtolower(end($ext));
    
        if(in_array($foto_ext, $extArr) === true){

            if($_FILES["foto"]["size"] < 1044070){			
                // move_uploaded_file($_FILES['foto']['tmp_name']), 'file/'.$foto);
                $fotoProfil   = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    
                $mahasiswa = new Mahasiswa("localhost", "root", "", "pbw");
                $table = "mahasiswa";
                $data = array(
                    "id" => "",
                    "nim" => strtoupper($_POST["nim"]),
                    "nama" => ucwords($_POST["nama"]),
                    "jenis_kelamin" => $_POST["jk"],
                    "agama" => $_POST["agama"],
                    "olahraga_fav" => $olahraga,
                    "foto_profil" => $fotoProfil,
                );
    
                $res = $mahasiswa->insert($table, $data);
    
                if($res == "success"){
                    $alert = array(
                        "type" => "alert-success",
                        "message" => "Data <strong>".ucwords($_POST["nama"])."</strong> berhasil ditambahkan.",
                    );
                } else {
                    $alert = array(
                        "type" => "alert-danger",
                        "message" => $res,
                    );
                }
            } else {
                $alert = array(
                    "type" => "alert-danger",
                    "message" => "Ukuran foto <strong>melebihi</strong> 1 MB.",
                );
            }
        } else {
            $alert = array(
                "type" => "alert-danger",
                "message" => "Ekstensi foto hanya boleh <strong>jpg/jpeg</strong>.",
            );
        }
    } else {
        $alert = array(
            "type" => "alert-danger",
            "message" => "NIM harus berjumlah <strong>9</strong> !",
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

    <script type="text/javascript">
        function validateForm() {
            var x = document.forms["crud"]["nim"].value;
            // var y = document.forms["crud"]["nisn"].value;
            if (x.length !== 9) {
                setTimeout(function () { swal("Invalid!","NIM harus berjumlah 9","error")}, 1000);
                // alert("Nomor Pendaftaran harus berjumlah 10!");
                return false;
            }
            // if (y.length !== 10) {
            //     setTimeout(function () { swal("Invalid!","NISN harus berjumlah 10","error")}, 1000);
            //     // alert("NISN harus berjumlah 10!");
            //     return false;
            // }
        }
    </script>
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
                            <h5 class="mb-2"><i class="fa fa-user-plus fa-md"></i> Tambah Mahasiswa</h5>
                            <p class="mb-0 float-right">
                            <a href="index.php" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-arrow-left fa-sm"></i> Kembali
                            </a>
                                <!-- Jumlah Kelas <span class="badge mr-1 badge-primary"> Kuliah = 2 </span><span class="badge mr-1 badge-info"> Praktikum = 4 </span> -->
                            </p>
                        </div>
                    </header>
                    <form method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" name="nim" placeholder="" autocomplete="off" style="text-transform: uppercase" maxlength="9" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="" autocomplete="off" style="text-transform: capitalize" required>
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
                                    <option value="" selected disabled>-- Pilih! ga boleh atheis! --</option>
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
                                        <input class="form-check-input" name="olahraga[]" type="checkbox" value="sepak bola">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Sepak bola
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="olahraga[]" type="checkbox" value="basket">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Basket
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="olahraga[]" type="checkbox" value="renang">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Renang
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="olahraga[]" type="checkbox" value="futsal">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Futsal
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="olahraga[]" type="checkbox" value="badminton">
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
                                    <input type="file" name="foto" class="form-control-file" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label></label>
                            </div>
                        
                        <!-- <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary btn-md">
                            <i class="fa fa-paper-plane fa-md"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-warning btn-md float-right">
                            <i class="fa fa-refresh fa-md"></i> Bersihkan
                        </button>
                    </div>
                    </form>
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