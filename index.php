<!DOCTYPE html>
<html>

<?php
session_start();
include 'dbconnect.php';

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


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>data buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Global site tag (gtag.js) - Google A 
nalytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-144808195-1');
    </script>
    <script src="jquery.min.js"></script>
    <style>body{background-color: #d8d8d8}
    @media screen and (max-width: 600px) {
h4{font-size:85%;}
}
    </style>
    <link rel="icon" 
      type="image/png" 
      href="smk.png">
  </head>
  <body>
  
  <div align="center">
  
  
  
    <head>
    <meta charset="utf-8">
    <link rel="icon" 
      type="image/png"      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-144808195-1');
    </script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                </div>
            </div>
            <!-- header area end -->
            <?php 
            
                $periksa_bahan=mysqli_query($conn,"select * from sstock_brg where stock <1");
                while($p=mysqli_fetch_array($periksa_bahan)){   
                    if($p['stock']<=1){ 
                        ?>  
                        <script>
                            $(document).ready(function(){
                                $('#pesan_sedia').css("color","white");
                                $('#pesan_sedia').append("<i class='ti-flag'></i>");
                            });
                        </script>
                        <?php
                        echo "<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>Stok  <strong><u>".$p['nama']. "</u> <u>".($p['merk'])."</u> &nbsp <u>".$p['ukuran']."</u></strong> yang tersisa sudah habis</div>";     
                    }
                }
                ?>
            <p></p>
            <h1 align="right"><a href="login.php" class="btn btn-primary" >Login</a></h1>
            <img src="smk.png" width="150px" height="150px">
            <h2 align="center">Selamat Datang Di Perpustakaan</h2>
            <h2 align="center">SMK Taruna Bangsa</h2>
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <ul class="breadcrumbs pull-left">
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right" style="color:black; padding:0px;" >
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5" >
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center" >
                                </div>
                                <p align="right"><button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Pinjam Buku</button>
                                    <div class="data-tables datatable-dark">
                                         <table align="center" id="dataTable3" class="display" style="width:100%"><thead class="thead-dark" >
                                            <tr bgcolor="black" style="color: white">
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>Penerbit</th>
                                                <th>pengarang</th>
                                                <th>Tahun buku</th>
                                                <th>Stock</th>
                                                <th>Letak</th>
                                                <th>Id Buku</th>
                                                
                                            </tr></thead><tbody>
                                            <?php 
                                            $brgs=mysqli_query($conn,"SELECT * from sstock_brg order by nama ASC");
                                            $no=1;
                                            while($p=mysqli_fetch_array($brgs)){
                                                $idb = $p['idx'];
                                                ?>
                                                
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $p['nama'] ?></td>
                                                    <td><?php echo $p['jenis'] ?></td>
                                                    <td><?php echo $p['merk'] ?></td>
                                                    <td><?php echo $p['ukuran'] ?></td>
                                                    <td><?php echo $p['stock'] ?></td>
                                                    <td><?php echo $p['satuan'] ?></td>
                                                    <td><?php echo $p['lokasi'] ?></td>

                                                </tr>

                                                <?php 
                                            }
                                            ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
       
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" align="center">DATA PEMINJAMAN</h4>
                        </div>
                        <div class="modal-body">
                            <form action="barang_keluar_act.php" method="post">
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input name="nisn" type="text" class="form-control" placeholder="Masukkan NISN">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input name="kelas" type="text" class="form-control" placeholder="Masukkan Kelas">
                                </div>
                                <div class="form-group">
                                    <label>Identitas Buku</label>
                                    <select name="barang" class="custom-select form-control">
                                    <option selected>Judul Buku, id_buku, stock</option>
                                    <?php
                                    $det=mysqli_query($conn,"select * from sstock_brg order by nama ASC")or die(mysqli_error());
                                    while($d=mysqli_fetch_array($det)){
                                    ?>
                                        <option value="<?php echo $d['idx'] ?>"><?php echo $d['nama'] ?> , Id. <?php echo $d['ukuran'] ?> --- Stock : <?php echo $d['stock'] ?></option>
                                        <?php
                                }
                                ?>      
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input name="qty" type="number" min="1" class="form-control" placeholder="Qty">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pinjam   :</label>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kembali   :</label>
                                </div>
                                

                                
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Kirim">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <script>
        $(document).ready(function() {
        $('input').on('keydown', function(event) {
            if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
               var $t = $(this);
               event.preventDefault();
               var char = String.fromCharCode(event.keyCode);
               $t.val(char + $t.val().slice(this.selectionEnd));
               this.setSelectionRange(1,1);
            }
        });
    });
    
    $(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
    } );
    </script>
    
    <!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
        <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    
    
</body>

</html>
