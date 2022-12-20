<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Edu-Airline</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/style.css">
</head>
    <body>
    <?php 

        session_start();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            header("location: /FinalZenius/admin/dashboard.php");
            die();
        }

        include './connect.php';

        if(isset($_POST['username']) && $_POST['password']){
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            $sql = "SELECT * FROM admins WHERE username = '$username' and password = '$password'";
            $datas = $koneksi->query($sql);
        
            $check = mysqli_num_rows($datas);
        
            if(isset($_POST['submit'])){
                if($check != 0){
                    $_SESSION['username'] = $username;
                    $_SESSION['status'] = "login";
                    header("location: /FinalZenius/admin/dashboard.php");
                }else{
                    $_SESSION['error'] = "Gagal login, silahkan cek kembali username dan password anda";
                }
            }
        }

    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Login Form</h2>
                <div class="text-center mb-5 text-dark">Sky News</div>
                <div class="card my-5">
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="card-body cardbody-color p-lg-5">
                        <div class="text-center">
                            <img src="img/logo.png" class="img-fluid profile-image-pic img-thumnail rounded-circle my-3" width="200px" alt="profile">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <p style="color:red; font-size: 12px;"><?php if(isset($_SESSION['error'])){echo($_SESSION['error']);} ?></p>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn text-white px-5 mb-5 w-100" style="background-color: #7e121f;">Login</button>
                        </div>
                        <div id="emailHelp" class="form-text text-center mb-4 text-dark">
                            Not Registered ?
                            <a href="#" class="text-dark fw-bold">Create an Account</a>
                            <br><br>
                            <a href="#" class="text-dark fw-bold">Back to Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
        unset($_SESSION['error']);
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
