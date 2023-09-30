<?php

@include 'config.php';
error_reporting(1);
session_start();
//collect couse
$id = $_GET['id'];
$data = "SELECT * FROM students";
$res = mysqli_query($conn,$data);
$row = mysqli_fetch_array($res);
$amt = $row['course'];





if(isset($_POST['submit'])){
  $fpay = $_POST['fpay'];
  $spay = $_POST['spay'];
  $tpay = $_POST['tpay'];
  $ftpay = $_POST['ftpay'];
  $fhpay = $_POST['fhpay'];
  $regfee = $_POST['reg'];
  $total = $_POST['total'];
  $pdone = $_POST['pdone'];
  $pdtwo = $_POST['pdtwo'];
  $pdthree = $_POST['pdthree'];
  $pdfour = $_POST['pdfour'];
  $pdfive = $_POST['pdfive'];
  $duration = $_POST['duration'];
  
 

  $update = "UPDATE students SET regfee = '$regfee',firstly = '$fpay',pdone='$pdone',secondly = '$spay',pdtwo='$pdtwo',thirdly = '$tpay',pdthree='$pdthree',fourthly = '$ftpay',pdfour='$pdfour',fifthly = '$fhpay',pdfive='$pdfive',totally = '$total',duration='$duration' WHERE id='$id'";
  $updsuccess = mysqli_query($conn,$update);
  if($updsuccess){
    $error[] = 'payment successfull';
    echo '<meta http-equiv="refresh" content="0">';

  }else{
    $error[] = 'payment failed';
  }
  

}





//collect id
if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from students where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $username=$row['firstname'];
    $amt = $row['course'];

    $cselect = "SELECT price FROM courses WHERE coursename = '$amt'";
    $cres = mysqli_query($conn,$cselect);
    $rowc = mysqli_fetch_array($cres);
    $total = $rowc['price'];
    
  }else{
    header('location:vendor_management.php');
    die();
  }
}


?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inceptor|Desk</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Choices.js-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg py-3 bg-dash-dark-2 border-bottom border-dash-dark-1 z-index-10">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer"><span>Close </span>
                  <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
                    <use xlink:href="#close-1"> </use>
                  </svg>
            </div>
            <div class="row w-100">
              <div class="col-lg-8 mx-auto">
                <form class="px-4" id="searchForm" action="#">
                  <div class="input-group position-relative flex-column flex-lg-row flex-nowrap">
                    <input class="form-control shadow-0 bg-none px-0 w-100" type="search" name="search" placeholder="What are you searching for...">
                    <button class="btn btn-link text-gray-600 px-0 text-decoration-none fw-bold cursor-pointer text-center" type="submit">Search</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between py-1">
          <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset" href="index.html">
              <div class="brand-text brand-big"><strong class="text-primary">Inc</strong><strong>eptor</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">I</strong><strong></strong></div></a>
            <button class="sidebar-toggle">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
                    <use xlink:href="#arrow-left-1"> </use>
                  </svg>
            </button>
          </div>
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a class="search-open nav-link px-0" href="#">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy text-gray-700">
                      <use xlink:href="#find-1"> </use>
                    </svg></a></li>
            <!-- Messages dropdown -->
            
           
            <!-- Languages dropdown    -->
            <li class="list-inline-item dropdown"><a class="nav-link dropdown-toggle text-sm text-reset px-1 px-lg-0" id="languages" rel="nofollow" data-bs-target="#" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block ms-2">English</span></a>
              <ul class="dropdown-menu dropdown-menu-end mt-sm-3 dropdown-menu-dark" aria-labelledby="languages">
                <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2" src="img/flags/16/DE.png" alt="English"><span>German</span></a></li>
                <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2" src="img/flags/16/FR.png" alt="English"><span>French                   </span></a></li>
              </ul>
            </li>
            <li class="list-inline-item logout px-lg-2">                 <a class="nav-link text-sm text-reset px-1 px-lg-0" id="logout" href="logout.php"> <span class="d-none d-sm-inline-block">Logout </span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#disable-1"> </use>
                    </svg></a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      



      <?php @include('sidebar.php')?>




      <div class="page-content">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">Choose Action for <?php echo $row['firstname']?></h2>
              </div>
            </div>
        <section>
          
        </section>
        
        
        
        
        <section class="pt-0">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-0 text-primary">Pay Fee</h3>
                    <p class="text-sm fw-light mb-5"></p>
                    <div class="position-relative text-center">
                      <canvas id="pieChartHome1"></canvas>
                      <div class="position-absolute top-50 start-50 translate-middle"><strong class="text-lg d-block"><?php
echo "<a class='btn btn-lg btn-primary' href='payment.php?id=".$row['id']."'><i class='fa fa-dollar-sign'></i></a>&nbsp;";
                    ?></strong><span class="d-block"></span></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-0 text-warning">Print Receipts</h3>
                    <p class="text-sm fw-light mb-5"></p>
                    <div class="position-relative text-center">
                      <canvas id="pieChartHome2"></canvas>
                      <div class="position-absolute top-50 start-50 translate-middle"><strong class="text-lg d-block">
                      <?php
echo "<a class='btn btn-lg btn-warning' href='receipt.php?id=".$row['id']."'><i class='fa fa-print'></i></a>&nbsp;";
                    ?></strong><span class="d-block"></span></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-0 text-secondary">Upload Project</h3>
                    <p class="text-sm fw-light mb-5"></p>
                    <div class="position-relative text-center">
                      <canvas id="pieChartHome3"></canvas>
                      <div class="position-absolute top-50 start-50 translate-middle"><strong class="text-lg d-block"><?php
echo "<a class='btn btn-lg btn-secondary' href='project.php?id=".$row['id']."'><i class='fa fa-upload'></i></a>&nbsp;";
                    ?></strong><span class="d-block"></span></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-0 text-success">Edit</h3>
                    <p class="text-sm fw-light mb-5"></p>
                    <div class="position-relative text-center">
                      <canvas id="pieChartHome3"></canvas>
                      <div class="position-absolute top-50 start-50 translate-middle"><strong class="text-lg d-block"><?php
echo "<a class='btn btn-lg btn-success' href='studupdate.php?id=".$row['id']."'><i class='fa fa-edit'></i></a>&nbsp;";
                    ?></strong><span class="d-block"></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
          <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://Inceptor.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p class="mb-0 text-dash-gray">2021 &copy; Your company. Design by <a href="https://Inceptor.com">Inceptor</a>.</p>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>