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

$totalpaid = $row['firstly']+$row['secondly']+$row['thirdly']+$row['fourthly']+$row['fifthly']+$row['regfee'];
$bal = $row['totally'] - $totalpaid;


?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inceptor|Students</title>
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
    <script>
    function printSection(sectionId) {
      var printContents = document.getElementById(sectionId).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;
      window.print();

      document.body.innerHTML = originalContents;
    }
  </script>
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
              <div class="brand-text brand-sm"><strong class="text-primary">I</strong><strong>A</strong></div></a>
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
            <li class="list-inline-item logout px-lg-2">                 <a class="nav-link text-sm text-reset px-1 px-lg-0" id="logout" href="login.html"> <span class="d-none d-sm-inline-block">Logout </span>
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




<!-- Modal Form-->






      <div class="page-content form-page">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">Records</h2>
                <button class="btn btn-primary" onclick="printSection('print-section')">Print</button>
              </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid py-2">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Records</li>
                </ol>
              </nav>
            </div>
        <section class="tables py-0">
          <div class="container-fluid">
            <div class="page-content form-page">
              <div class="col-md-12">   
 <div class="row">

    
        <div class="receipt-main mx-4 col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
          <div class="receipt-header">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="receipt-left">
              <img class="img-responsive" alt="iamgurdeeposahan" src="img/favicon.png" style="width: 71px; border-radius: 43px;">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 text-right">
            <div class="receipt-right">
              <h5>Inceptor</h5>
              <p>+1 3649-6589 <i class="fa fa-phone"></i></p>
              <p>inceptor.co.ke <i class="fa fa-envelope-o"></i></p>
              <p>Kenya <i class="fa fa-location-arrow"></i></p>
            </div>
          </div>
        </div>
            </div>
      
      <div class="row">
        <div class="receipt-header receipt-header-mid">
          <div class="col-xs-8 col-sm-8 col-md-8 text-left">
            <div class="receipt-right">
              <h5><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></h5>
              <p><b>Mobile :</b> <?php echo $row['phone']?></p>
              <p><b>Course:</b> <?php echo $row['course']?></p>
              
            </div>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="receipt-left">
              <h5>INVOICE # 102</h5>
            </div>
          </div>
        </div>
            </div>
      
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">First Payment</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $row['firstly']?></td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Second Pay</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $row['secondly']?></td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Third Pay</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $row['thirdly']?></td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Fourth Pay</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $row['thirdly']?></td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Fifth Pay</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $row['thirdly']?></td>
                        </tr>
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total to pay: </strong>
                            </p>
                            <p>
                                <strong>registration </strong>
                            </p>
             
              <p>
                                <strong>Balance Due: </strong>
                            </p>
              </td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i><?php echo $row['totally']?></strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?php echo $row['regfee']?></strong>
                            </p>
              <p>
                                <strong><i class="fa fa-inr"></i><?php echo $bal?> </strong>
                            </p>
              
              </td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?php echo $totalpaid?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
      
      <div class="row">
        <div class="receipt-header receipt-header-mid receipt-footer">
          <div class="col-xs-8 col-sm-8 col-md-8 text-left">
            
          
        </div>
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
            <p class="mb-0 text-dash-gray">2021 &copy; Your company. Design by <a href="https://incepto.co.ke">Inceptor</a>.</p>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
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
  <style type="text/css">
    
.text-danger strong {
          color: #9f181c;
    }
    .receipt-main {
      background: #ffffff none repeat scroll 0 0;
      border-bottom: 12px solid #333333;
      border-top: 12px solid #9f181c;
      margin-top: 50px;
      margin-bottom: 50px;
      padding: 40px 30px !important;
      position: relative;
      box-shadow: 0 1px 21px #acacac;
      color: #333333;
      font-family: open sans;
    }
    .receipt-main p {
      color: #333333;
      font-family: open sans;
      line-height: 1.42857;
    }
    .receipt-footer h1 {
      font-size: 15px;
      font-weight: 400 !important;
      margin: 0 !important;
    }
    .receipt-main::after {
      background: #414143 none repeat scroll 0 0;
      content: "";
      height: 5px;
      left: 0;
      position: absolute;
      right: 0;
      top: -13px;
    }
    .receipt-main thead {
      background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
      color:#fff;
    }
    .receipt-right h5 {
      font-size: 16px;
      font-weight: bold;
      margin: 0 0 7px 0;
    }
    .receipt-right p {
      font-size: 12px;
      margin: 0px;
    }
    .receipt-right p i {
      text-align: center;
      width: 18px;
    }
    .receipt-main td {
      padding: 9px 20px !important;
    }
    .receipt-main th {
      padding: 13px 20px !important;
    }
    .receipt-main td {
      font-size: 13px;
      font-weight: initial !important;
    }
    .receipt-main td p:last-child {
      margin: 0;
      padding: 0;
    } 
    .receipt-main td h2 {
      font-size: 20px;
      font-weight: 900;
      margin: 0;
      text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
      font-weight: 100;
      margin: 34px 0 0;
      text-align: right;
      text-transform: uppercase;
    }
    .receipt-header-mid {
      margin: 24px 0;
      overflow: hidden;
    }
    @media print {
      body * {
        display: none;
      }
      #print-section {
        display: block;
      }
    }
    
    #container {
      background-color: #dcdcdc;
    }
  </style>
</html>