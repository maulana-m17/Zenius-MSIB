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

    include 'connect.php';

    require 'function.php';

    if(isset($_SESSION['status']) != "login"){
        header("location:/FinalZenius/home.php");
    }
    if(isset($_POST['submit'])){
        session_destroy();
        header("location:/FinalZenius/home.php");
    }

    if(isset($_POST['filter_submit'])){
        if($_POST['kategori'] !== ""){
            $sql = "SELECT * FROM berita 
            JOIN kategori  ON berita.kategori_id = berita.id
            WHERE berita.kategori_id = ".$_POST['kategori'];
        }
    }

    $kategori_sql = mysqli_query($koneksi, "SELECT * FROM kategori");

    $sql = mysqli_query($koneksi, "SELECT * FROM berita JOIN kategori ON berita.kategori_id = kategori.id");

    if(isset($_POST['cari'])){
        $sql = cari($_POST['keyword']);
    }

?>

<!-- navbar -->
<div class="col mb-3">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <form class="d-flex" role="search" method="post" action="">
                <input class="form-control me-2" type="text" name="keyword"  placeholder="Search" aria-label="Search" autocomplete="off">
                <button class="btn btn-outline-danger" type="submit" name="cari" ><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <!-- <form class="d-flex" role="kategori">
                <input class="form-control me-2" type="text" name="kategori">
                <button class="btn btn-outline-danger" type="submit" name="filter_kategori">Kategori</button>
            </form> -->

            <span class="navbar-text">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">        
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" 
                aria-expanded="false" style="font-size: 16px;">
                    Selamat Datang, <?= $_SESSION['username']; ?>
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

<div class="container">
    <div class="row">
        <div class="col mb-5">
            <nav class="navbar navbar-expand-lg" style="background-color: #7e121f34;">
                <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 24px; padding-left: 62px;" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 24px; padding-left: 62px;" href="kategori/global.php">Global</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 24px; padding-left: 62px;" href="kategori/politik.php">Politik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 24px; padding-left: 62px;" href="kategori/bisnis.php">Bisnis</a>
                    </li>                   
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 24px; padding-left: 62px;" href="kategori/peristiwa.php" >Peristiwa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 24px; padding-left: 62px;" href="kategori/bola.php">Bola</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="font-size: 24px; padding-left: 62px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lainya
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Musik</a></li>
                        <li><a class="dropdown-item" href="#">Game</a></li>
                    </ul>
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- akhir navbar -->

<div class="container">
    <div class="row">
        <div class="col-8">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner mb-4">
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
            <div>
                <h2 class="fw-semibold"><a href="detail.php">Pembangunan 2.400 Rumah Bagi Warga Terdampak 
                    Gempa Cianjur Rampung Sebelum Lebaran</a> </h2>
                <p>Pembangunan tidak hanya rumah warga terdampak gempa Cianjur. Basuki ....</p>
            </div>
            </div>
        </div>
        <div class="col-4">
            <h1 class="fw-bold" style="color: #7E121F;">Popular Tags<br><br></h1>
            <h3><a href="#" ># Piala Dunia</a><br><br></h3>
            <h3><a href="#"># Gempa Cianjur</a><br><br></h3>
            <h3><a href="#"># Presidensi G20 2022</a><br><br></h3>
            <h3><a href="#"># PPPK 2022</a><br><br></h3>
        </div>
        <div class="mb-3">
            <hr  color="#7e121f" height="10" size="20">
        </div>
    </div>
</div>



<!-- <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="col-3">
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect01" name="arrival">
                        <option value="" selected>Ke...</option>
                        <?php foreach($kategoris as $kategori): ?>
                            <option value="<?php echo($kategori['id']) ?>" <?php echo($_POST['kategori']) == $kategori['id'] ? "selected" : ""; ?> <?= $kategori['name']; ?></option>                  
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <a class="nav-link "><i class="fa-solid fa-magnifying-glass"></i></a>
                    </button>
                </div>
            </div>
            </form> -->

<div class="container">
    <div class="row">
    <h1 class="fw-bold" style="color: #A72535;">Latest News<br><br></h1>
    <?php while($row = mysqli_fetch_assoc($sql) ) : ?>
        <div class="col-4 mb-4">         
            <img src="img/<?= $row["gambar"]; ?>" width="400">
        </div>
        <div class="col-6">
            <p><a href=""><?= $row['name']; ?></a></p>
            <h4><?= $row['judul']; ?></h4>
            <p><?= $row['desk_awal']; ?></p>
            <p><?= $row['datetime']; ?></p>
            <hr  color="#aeaaaa" height="5" size="10">
        </div>
        <?php endwhile; ?>
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