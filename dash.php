<?php

@include ('config.php');

session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
  header('Location:index.php');
  exit;
}
error_reporting(1);



/*
$query = "SELECT * FROM fee_payment";
$query_run = mysqli_query($conn,$query);

$sql = "SELECT count(*) FROM courses";
$result = mysqli_query($conn,$sql);
$acc = "SELECT count(*) FROM teachers WHERE status = 1 ";
$res = mysqli_query($conn,$acc);
$regist = "SELECT count(*) FROM teachers";
$signups = mysqli_query($conn,$regist);

*/
$stu = "SELECT count(*) FROM students";
$servcount = mysqli_query($conn,$stu);

$sql = "SELECT count(*) FROM courses";
$result = mysqli_query($conn,$sql);

$query = "SELECT * FROM students";
$query_run = mysqli_query($conn,$query);

$project = "SELECT * FROM projects";
$procount = mysqli_query($conn,$project);

$sql="SELECT * FROM students";
$res=mysqli_query($conn,$sql);

$rows = mysqli_fetch_array($res);



while($row = mysqli_fetch_array($servcount)){
  $servcounter = $row['count(*)'];
}
while($row = mysqli_fetch_array($result)) {
    $counter = $row['count(*)'];
    

}
while($row = mysqli_fetch_array($procount)) {
    $projects = $row['count(*)'];
    

}
//$cat = "SELECT count(*) FROM orders";
//$catnum = mysqli_query($conn,$cat);
 //sum of all donattions offered


/*
$qty= 0;
while ($num = mysqli_fetch_assoc ($query_run)) {
    $qty += $num['Total'];
  }



  
// Display data on web page
while($row = mysqli_fetch_array($result)) {
    $counter = $row['count(*)'];
    

}

while ($row = mysqli_fetch_array($res)) {
  $adcounter = $row['count(*)'];
  
}

while($row = mysqli_fetch_array($signups)){
  $regcounter = $row['count(*)'];
}
*/



while ($num = mysqli_fetch_assoc ($query_run)) {
    $qty += $num['firstly'];
    $qty2 += $num['secondly'];
    $qty3 += $num['thirdly'];
    $qty4 += $num['fourthly'];
    $qty5 += $num['fifthly'];
    $reg += $num['regfee'];
    $qty6 += $num['totally'];

  }

  $revenue = $qty + $qty2 + $qty3 + $qty4 + $qty5 + $reg;
  $unpaid = $qty6 - $revenue;
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
                <h2 class="h5 mb-0">Dashboard</h2>
              </div>
            </div>
        <section>
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#user-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Students</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-1"><?php echo $servcounter?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#stack-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Courses</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-2"><?php echo $counter?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#survey-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Projects</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-3"><?php echo $projects?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-3" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card mb-0">
                  <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                      <div class="me-2">
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                              <use xlink:href="#paper-stack-1"> </use>
                            </svg>
                        <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Unpaid</p>
                      </div>
                      <p class="text-xxl lh-1 mb-0 text-dash-color-4"><?php echo $unpaid?></p>
                    </div>
                    <div class="progress" style="height: 3px">
                      <div class="progress-bar bg-dash-color-4" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="pt-0">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-0">Unpaid Fee</h3>
                    <p class="text-sm fw-light mb-5"></p>
                    <div class="position-relative text-center">
                      <canvas id="pieChartHome1"></canvas>
                      <div class="position-absolute top-50 start-50 translate-middle"><strong class="text-lg d-block">Kes.<?php echo $unpaid?></strong><span class="d-block"></span></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-0">Received</h3>
                    <p class="text-sm fw-light mb-5"></p>
                    <div class="position-relative text-center">
                      <canvas id="pieChartHome2"></canvas>
                      <div class="position-absolute top-50 start-50 translate-middle"><strong class="text-lg d-block">Kes.<?php echo $revenue?></strong><span class="d-block"></span></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="h4 mb-0">Completed Projects</h3>
                    <p class="text-sm fw-light mb-5"></p>
                    <div class="position-relative text-center">
                      <canvas id="pieChartHome3"></canvas>
                      <div class="position-absolute top-50 start-50 translate-middle"><strong class="text-lg d-block"><?php echo $projects?> projects</strong><span class="d-block"></span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="pt-0">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <canvas id="barChartExample1"></canvas>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <canvas id="barChartExample2"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                    <canvas id="lineChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="pt-0">
          <div class="container-fluid">
            <div class="row gy-4">
              <div class="col-lg-6">
                <!-- Stat card-->
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row gx-sm-5">
                      <div class="col-6 border-sm-end border-dash-dark-1">
                            <!-- Stat item-->
                            <div class="d-flex"><i class="mt-3 fas fa-caret-down text-danger"></i>
                              <div class="ms-2">
                                <p class="text-xl fw-normal mb-0">5.657</p>
                                <p class="text-uppercase text-sm fw-light mb-2">Standard scans</p>
                                <div class="progress" style="height: 2px">
                                  <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                      </div>
                      <div class="col-6">
                            <!-- Stat item-->
                            <div class="d-flex"><i class="mt-3 fas fa-caret-up text-success"></i>
                              <div class="ms-2">
                                <p class="text-xl fw-normal mb-0">3.1459</p>
                                <p class="text-uppercase text-sm fw-light mb-2">Team Scans</p>
                                <div class="progress" style="height: 2px">
                                  <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Stat card-->
                
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <canvas id="lineChart1"></canvas>
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