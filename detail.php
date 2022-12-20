<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sky News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>
<?php 
    session_start();
    if(isset($_SESSION['status']) != "login"){
        header("location:/FinalZenius");
    }
        
    include './connect.php';

    $sql = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = 1");
?>
<!-- navbar -->
<div class="container">
    <div class="row">
        <div class="col mb-5">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                    </form>
                    
                    <span class="navbar-text">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">        
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Selamat Datang, Maulana
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form id="logout_form" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                    <button class="dropdown-item" type="submit" name="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </ul>
                    </div>
                    </span>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- akhir navbar -->

<div class="container">
    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                </ol>
            </nav>
            <?php while($datas = mysqli_fetch_assoc($sql) ) : ?>
            <h2 class="fw-semibold mb-4"><?= $datas['judul']; ?></a> </h2>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner mb-5">
                <div class="carousel-item active">
                    <img src="img/gempa1.png" class="d-block w-100 r" alt="gempa1">
                </div>
                <div class="carousel-item">
                    <img src="img/gempa2.png" class="d-block w-100" alt="gempa2">
                </div>
                <div class="carousel-item">
                    <img src="img/gempa3.png" class="d-block w-100" alt="gempa3">
                </div>
            </div>
            
            <p><?= $datas['deskripsi']; ?></p>
            
            <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<footer class="footer text-white pt-5 pb-4" style="background-color: #7E121F;">
    <div class="container text-md-left">
        <div class="row text-md-left">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"><br><br></a>
                <p>Melalui website ini kamu dapat menemukan beragam informasi menarik seputar
                    keadaan dunia saat ini.
                </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight bold text-warning">Layanan</h5>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Kontak</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Redaksi</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Karir</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Sitemap</a>
                </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight bold text-warning"></h5>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Disclaimer</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Kontak Kami</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Kode Etik</a>
                </p>
                <p>
                    <a href="#" class="text-white" style="text-decoration: none;"> Pengaduan</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" 
    integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>