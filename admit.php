<?php

@include 'config.php';
error_reporting(1);

session_start();
if(isset($_POST['submit'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gphone = $_POST['gphone'];
  $parent = $_POST['guardian'];
  $sphone = $_POST['sphone'];
  $date = $_POST['date'];
  $course = $_POST['course'];
  $course2 = $_POST['course2'];
  $start = $_POST['startdate'];
  $total = $_POST['total'];
  $discount = $_POST['discount'];
 

  $insert = "INSERT INTO students(firstname,lastname,phone,parent,p_phone,admission_date,course,course2,start,discount)VALUES('$fname','$lname','$sphone','$parent','$gphone','$date','$course','$course2','$start','$discount')";
  $result = mysqli_query($conn,$insert);

  if($result){
    $error[] = 'student added successfully';
  echo '<meta http-equiv="refresh" content="0">';
  header('location:tables.php');

  }
  else{
    $error[] = 'Student add failure!!';

  }
  

}

else{
  
  
}


?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inceptor|Admission</title>
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





      <div class="page-content form-page">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">New</h2>
              </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid py-2">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">New</li>
                </ol>
              </nav>
            </div>
        <!-- Forms Section-->
        <section class="pt-0"> 
          <div class="container-fluid">
            <div class="row gy-4">
              <!-- Basic Form-->
              <div class="col-lg-12">
                <div class="card">
                  <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="alert alert-danger" style="width: 100%;">'.$error.'</span>';
         };
      };
      ?>
                  <div class="card-header">
                    <h3 class="h4 mb-0">Add new student</h3>
                  </div>
                  <div class="card-body pt-0">
                    <p class="text-sm">Fill in the details</p>
                    <form action="" method="POST">
                      <div class="row">
                        <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Firstname</label>
                        <input class="form-control" id="exampleInputEmail1" type="text" name="fname" aria-describedby="emailHelp">
                        
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1">Lastname</label>
                        <input class="form-control" id="exampleInputPassword1" type="text" name="lname">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Phone(student)</label>
                        <input class="form-control" id="exampleInputEmail1" name="sphone" type="text" aria-describedby="emailHelp">
                                              </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1">Guardian</label>
                        <input class="form-control" id="exampleInputPassword1" type="text" name="guardian">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Phone(Guardian)</label>
                        <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" name="gphone">
                        
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="course" name="course" onchange="updateAmount()">
                          <option for="course" selected>select course 1</option>
                          <?php
                          $servsel = "SELECT * FROM courses";
                          $sel = mysqli_query($conn,$servsel);
                          while($row = $sel->fetch_assoc()){
                            $cn++;
                            ?>
                            <option for="service"><?php echo $row['coursename']?></option>
                            <?php } ?>
                          
                        </select>
                      </div>
                    </div>


                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="course" name="course2" onchange="updateAmount()">
                          <option for="course2" selected>select course 2</option>
                          <?php
                          $servsel = "SELECT * FROM courses";
                          $sel = mysqli_query($conn,$servsel);
                          while($row = $sel->fetch_assoc()){
                            $cn++;
                            ?>
                            <option for="service"><?php echo $row['coursename']?></option>
                            <?php } ?>
                          
                        </select>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1">Discount</label>
                        <input class="form-control" id="exampleInputPassword1" type="number" name="discount">
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1">Date</label>
                        <input class="form-control" id="exampleInputPassword1" type="date" name="date">
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1">Start Date</label>
                        <input class="form-control" id="exampleInputPassword1" type="date" name="startdate">
                      </div>
                    </div>
                    
                    
                  </div>
                    </div>
                      <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Horizontal Form-->
              
              
              </div>
            </div>
          </div>
          <!-- Page Footer-->
          <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://Inceptor.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="mb-0 text-dash-gray">2021 &copy; Your company. Design by <a href="https://Inceptor.com">Inceptor</a>.</p>
            </div>
          </footer>
        </section>
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
</html>