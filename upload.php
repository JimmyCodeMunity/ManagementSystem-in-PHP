<?php

@include 'config.php';
error_reporting(1);
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
  header('Location:index.php');
  exit;
}
//collect couse
$id = $_GET['id'];
$data = "SELECT * FROM students";
$res = mysqli_query($conn,$data);
$row = mysqli_fetch_array($res);
$amt = $row['course'];


//colect project
$project = "SELECT * FROM projects";
$prores = mysqli_query($conn,$project);
$info = mysqli_fetch_assoc($prores);





if(isset($_POST['postproject'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $link = $_POST['link'];
  $marks = $_POST['marks'];
  $course = $_POST['course'];
  $ytlink = $_POST['ytlink'];
  $status = 1;
  



  
  
  
    
    $select = "SELECT * FROM projects WHERE firstname = '$fname' && lastname = '$lname' && phone = '$phone'";
    $check = mysqli_query($conn,$select);

    if(mysqli_num_rows($check)>0){
      $error[] = 'Student project already available';
    }
    else{
      $insert = "INSERT INTO projects(firstname,lastname,phone,githublink,ytlink,course,marks,status)VALUES('$fname','$lname','$phone','$link','$ytlink','$course','$marks','$status')";
    $query = mysqli_query($conn,$insert);
    $error[] = 'project successfully submitted';

    //update status on success
    /*
    $updstatus = "UPDATE projects SET status = 1 WHERE id = '$id'";
    mysqli_query($conn,$updstatus);
    */
    }
  }
  else{
    echo "file not uploaded";
  };





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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <script>
    function updateAmount() {
      var courseSelect = document.getElementById("course");
      var amountInput = document.getElementById("amount");
      amountInput.value = courseSelect.value;
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
            <li class="list-inline-item dropdown px-lg-2"><a class="nav-link text-reset px-1 px-lg-0" id="navbarDropdownMenuLink1" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#envelope-1"> </use>
                    </svg><span class="badge bg-dash-color-1">5</span></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink1">
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="position-relative"><img class="avatar avatar-md" src="img/avatar-3.jpg" alt="Nadia Halsey">
                      <div class="availability-status bg-success"></div>
                    </div>
                    <div class="ms-3">   <strong class="d-block">Nadia Halsey</strong><span class="d-block text-xs">lorem ipsum dolor sit amit</span><small class="d-block">9:30am</small></div></a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="position-relative"><img class="avatar avatar-md" src="img/avatar-2.jpg" alt="Peter Ramsy">
                      <div class="availability-status bg-warning"></div>
                    </div>
                    <div class="ms-3">   <strong class="d-block">Nadia Halsey</strong><span class="d-block text-xs">lorem ipsum dolor sit amit</span><small class="d-block">9:30am</small></div></a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="position-relative"><img class="avatar avatar-md" src="img/avatar-1.jpg" alt="Sam Kaheil">
                      <div class="availability-status bg-danger"></div>
                    </div>
                    <div class="ms-3">   <strong class="d-block">Nadia Halsey</strong><span class="d-block text-xs">lorem ipsum dolor sit amit</span><small class="d-block">9:30am</small></div></a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="position-relative"><img class="avatar avatar-md" src="img/avatar-5.jpg" alt="Sara Wood">
                      <div class="availability-status bg-secondary"></div>
                    </div>
                    <div class="ms-3">   <strong class="d-block">Nadia Halsey</strong><span class="d-block text-xs">lorem ipsum dolor sit amit</span><small class="d-block">9:30am</small></div></a></li>
                <li><a class="dropdown-item text-center message" href="#"> <strong>See All Messages <i class="fas fa-angle-right ms-1"></i></strong></a></li>
              </ul>
            </li>
            <!-- Tasks dropdown                   -->
            <li class="list-inline-item dropdown px-lg-2"><a class="nav-link text-reset px-1 px-lg-0" id="navbarDropdownMenuLink2" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#paper-stack-1"> </use>
                    </svg><span class="badge bg-dash-color-3">9</span></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink2">
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 1</strong><span>40% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 2</strong><span>20% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 3</strong><span>70% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-3" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 4</strong><span>40% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-4" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li><a class="dropdown-item" href="#">
                    <div class="d-flex justify-content-between mb-1"><strong>Task 5</strong><span>30% complete</span></div>
                    <div class="progress" style="height: 2px">
                      <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div></a></li>
                <li>           <a class="dropdown-item text-center" href="#"> <strong>See All Tasks <i class="fas fa-angle-right ms-1"></i></strong></a></li>
              </ul>
            </li>
            <!-- Mega menu-->
            
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
                <h2 class="h5 mb-0">Payments</h2>
              </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid py-2">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Forms</li>
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
                  
                  <div class="card-header">
                    <h3 class="h4 mb-0">Upload Project</h3>
                  </div>
                  <div class="card-body pt-0">
                    <p class="text-sm">Fill in the details</p>
                    <p class="text-sm">status: <?php
                    if($info['status']==1){
                      echo "<button class='btn btn-sm btn-warning'> submited</button>";
                    }
                    else{
                      echo "waiting";
                    }
                  ?></p>

                    <form action="" method="POST" id="myform">
                      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="alert alert-danger" style="width: 100%;">'.$error.'</span>';
         };
      };
      ?>
                      
                      <div class="row">
                    <h4 class="text-primary"><i class="fa fa-user"></i> Student Details</h4>
                  </div>
                      <div class="row">
                        <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Firstname</label>
                        <input class="form-control" id="exampleInputEmail1" type="text" name="fname" aria-describedby="emailHelp" value="<?php echo $row['firstname']?>">
                        
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1">Lastname</label>
                        <input class="form-control" id="exampleInputPassword1" type="text" name="lname" value="<?php echo $row['lastname']?>">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Phone(student)</label>
                        <input class="form-control" id="exampleInputEmail1" name="phone" value="<?php echo $row['phone']?>" type="text" aria-describedby="emailHelp">
                                              </div>
                    </div>
                    


                    <div class="row">
                    <h4 class="text-primary"><i class="fa fa-book"></i> Project details</h4>
                  </div>
                    <div class="row">

                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1"><i class="fab fa-github"></i>Github Link</label>
                        <input class="form-control" required id="exampleInputPassword1" value="" type="text" name="link">
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1"><i class="fab fa-youtube"></i> Youtube Link</label>
                        <input class="form-control" required id="exampleInputPassword1" value="" type="text" name="ytlink">
                      </div>
                    </div>
                    </div>

                    
                  </div>
                  <div class="row">
                    <h4 class="text-primary">Course Details</h4>
                  </div>
                  <div class="row">
                     <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Course</label>
                        <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" value="<?php echo $row['course']?>" name="course">
                        
                      </div>

                    </div>
                    <div class="col-lg-5">
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Marks</label>
                        <input class="form-control" id="exampleInputEmail1" required name="marks" value="" type="number" aria-describedby="emailHelp">
                                              </div>
                    </div>
                        
                      </div>

                    </div>

                  </div>
                  
                  
                    
                <div class="row">
                
                  </div>
                
                    
                      <button class="btn btn-primary" type="submit" name="postproject">Submit</button>
                      <a href="tables.php" class="btn btn-warning">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Horizontal Form-->
              
              
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