<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laman Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css" integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../asset/style.css">
</head>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['status']) != "login"){
            header("location:/FinalZenius");
        }
        if(isset($_POST['submit'])){
            $gambar = $_POST['gambar'];
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $desk_awal = $_POST['desk_awal'];
            $kategori = $_POST['kategori'];

            include '../../connect.php';
            $sql = "INSERT INTO berita (gambar, judul, deskripsi, desk_awal, kategori) 
            VALUES ('$gambar', '$judul', '$deskripsi', '$desk_awal', '$kategori', );";
            $datas = $koneksi->query($sql);

            if(mysqli_affected_rows($koneksi) > 0){
                header("Location:index.php");
            }else{
                $_SESSION['error'] = "Gagal menambahkan data !";
            }
        }
    ?>

<!-- namvbar -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../../img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        
        <span class="navbar-text">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">        
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
<!-- akhir navbar -->
<!-- menu samping -->
<div class="container-fluid">
        <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="menu active" aria-current="page" href="/FinalZenius/admin/">
                                <i class="fa-solid fa-home px-2"></i>
                                <span>Beranda<br><br></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="menu" aria-current="page" href="/FinalZenius/admin/berita/">
                                <i class="fa-solid fa-user px-2"></i>
                                <span>Berita<br><br></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="menu" aria-current="page" href="/FinalZenius/user.php">
                                <i class="fa-solid fa-user px-2"></i>
                                <span>User<br><br><br><br></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="menu" aria-current="page" href="#">
                                <i class="fa-solid fa-user px-2"></i>
                                <span>Logout<br><br></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 yp-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Berita</a></li>
                        <li class="breadcrumb-item"><a href="#">Tambah Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h1>Tambah Berita</h1>
                <p>Ini adalah halaman untuk upload berita.</p>
                
                <div class="card">
                    <div class="card-body">
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="text" id="gambar" name="gambar" class="form-control" 
                            placeholder="Masukan Gambar" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" id="judul" name="judul" class="form-control" 
                            placeholder="Masukan Judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control" 
                            placeholder="Masukan Deskripsi Berita">
                        </div>
                        <div class="mb-3">
                            <label for="desk_awal" class="form-label">Deskripsi awal</label>
                            <input type="text" id="desk_awal" name="desk_awal" class="form-control" 
                            placeholder="Masukan Highlingt Berita">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" id="kategori" name="kategori" class="form-control" 
                            placeholder="Masukan Kategori Berita">
                        </div>
                        <p style="color: red; font-size: 12px;"<?php if(isset($_SESSION['error'])){echo($_SESSION['error']); }?>></p>
                        <button type="submit" name="submit" class="btn btn-warning">Save</button>
                        </form>
                    </div>
                </div>

                <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright @ 2022 <a href="#">Edu Airline</a></span>
                    <ul class="nav m-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-secondary">Hubungi Kami</a>
                        </li>
                    </ul>
                </footer>
            </main>
        </div>
    </div>
    <?php 
        unset($_SESSION['error']);
    ?>

<!-- akhir menu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js" integrity="sha512-9rxMbTkN9JcgG5euudGbdIbhFZ7KGyAuVomdQDI9qXfPply9BJh0iqA7E/moLCatH2JD4xBGHwV6ezBkCpnjRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>