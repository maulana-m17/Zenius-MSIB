<?php 
    session_start();
    if(isset($_SESSION['status']) != "login"){
        header("location:/FinalZenius");
    }

    if(isset($_POST['submit'])){
        $gambar = $_POST['gambar'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];

        include './connect.php';
        $sql = "INSERT INTO berita (gambar, judul, deskripsi) VALUES ('$gambar', '$judul', '$deskripsi');";
        $datas = $koneksi->query($sql);

        if(mysqli_affected_rows($koneksi) > 0){
            header("Location:index.php");
        }else{
            $_SESSION['error'] = "Gagal menambahkan data !";
        }
    }
?>