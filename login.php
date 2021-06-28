  <!DOCTYPE html>
<html>
<head>
  <title>Login </title>
  <style type="text/css">
    body {
      background-image: url(../admin/smk.jpg);
      font-family: "Segoe UI";
      background-position: auto;
      background-size: 100%;
      background-repeat: no-repeat;

    }
    #wrapper {
      background-color: #f5f5f5;
      width: 400px;
      height: 430px;
      margin-top: 50px;
      margin-left: auto;
      margin-right: auto;
      padding: 20px;
      border-radius: 4px;
    }
    input[type=text], input[type=password] {
      border: 1px solid #ddd;
      padding: 10px;
      width: 95%;
      border-radius: 2px;
      outline: none;
      margin-top: 10px;
      margin-bottom: 20px;
    }
    label, h1 {
      text-transform: uppercase;
      font-weight: bold;
      color: white;
    }
    h1 {
      text-align: center;
      font-size: 40px;
      color: white;
    }
    button {
      border-radius: 2px;
      padding: 10px;
      width: 120px;
      background-color: #024c68;
      border: none;
      color: #fff;
      font-weight: bold;
    }
    .error {
      background-color: #f72a68;
      width: 200px;
      height: auto;
      margin-top: 20px;
      margin-left: auto;
      margin-right: auto;
      padding: 20px;
      border-radius: 4px;
      color: #fff;
    }

  </style></head>
<?php
session_start();
include 'koneksi.php';

if(isset($_SESSION['role'])){
    header("location:stock");
}

if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo "Username atau Password salah!";
        }else if($_GET['pesan'] == "logout"){
            echo "Anda berhasil keluar dari sistem";
        }else if($_GET['pesan'] == "belum_login"){
            echo "Anda harus Login";
        }else if($_GET['pesan'] == "noaccess"){
            echo "Akses Ditutup";
    }
}


if(isset($_POST['btn-login']))
{
 $uname = mysqli_real_escape_string($koneksi,$_POST['username']);
 $upass = mysqli_real_escape_string($koneksi,md5($_POST['password']));

 // menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from slogin where username='$uname' and password='$upass';");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
    $data = mysqli_fetch_assoc($login);
 
 if($data['role']=="stock"){
        // buat session login dan username
        $_SESSION['user'] = $data['nickname'];
        $_SESSION['user_login'] = $data['username'];
        $_SESSION['id'] = $data['id'];
        $_SESSION['role'] = "stock";
        header("location:stock");

 }
 else
 {
  header("location:index.php?pesan=gagal");

 }
 
}

}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-144808195-1');
    </script>
    <script src="jquery.min.js"></script>
    <style>body{background-image:url("smk.jpg");}
    @media screen and (max-width: 400px) {
h4{font-size:65%;}
}
    </style>
    <link rel="icon" 
      type="image/png" 
      href="smk.png">
  </head>
  <body>
  
  <div align="center">
  
  
  
    <br \><br \>
            <!-- Login Container -->
        <div style="background-image: url('img/abu.jpeg');" id="login-container" class="animation-fadeIn">
            <!-- Login Block -->
            <div align="center">

<br><br><br><br><br><br>

            <form>
              <div id="wrapper">
            <div class="container" style="color:black">
                        <a href="index.php"><img src="smk.png" alt="logo" width="30%"></a>
                    <h5 style="color: black" <img src="smk.png">LOGIN ADMINISTRASI <br>SMK TARUNA BANGSA </h5>
                    
                    </div>
            </form>    
                <form method="post">
                    <div class="form-group">
                        
                        <input type="text"  placeholder="Username" name="username" autofocus>
                    </div>
                    <div class="form-group">
                       
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="btn-login">Masuk</button>
            
                </form>

                
            </div></form></div>
            <br>
        </div></div></form>
            <!-- END Login Tittle Block -->
        </div>
        <!-- END Login Container -->
     
    
    
  </body>
</html>
