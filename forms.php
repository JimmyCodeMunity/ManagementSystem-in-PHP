<?php

@include 'config.php';

session_start();




if(isset($_GET['type']) && $_GET['type']!=''){
  $type=$_GET['type'];
  if($type=='status'){
    $operation=$_GET['operation'];
    $id=$_GET['id'];
    if($operation=='active'){
      $status='1';
    }else{
      $status='0';
    }
    $update_status_sql="update courses set status='$status' where id='$id'";
    mysqli_query($conn,$update_status_sql);
  }
  
  if($type=='delete'){
    $id=$_GET['id'];
    $delete_sql="delete from courses where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}

$courses = "SELECT * FROM courses";
$res1 = mysqli_query($conn,$courses);

//add a new course
if(isset($_POST['addcourse'])){
  $course = $_POST['course'];
  $price = $_POST['price'];

  $select = "SELECT * FROM courses WHERE coursename = '$course'";
  $result = mysqli_query($conn,$select);

  

  if(mysqli_num_rows($result) > 0){
    $error[] = 'Course already exist';
  }
  else{
    $insert = "INSERT INTO courses(coursename,price)VALUES('$course','$price')";
  $res = mysqli_query($conn,$insert);
  $error[] = 'Course added successfully';
   echo '<meta http-equiv="refresh" content="0">';
  }


}


?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inceptor||Courses</title>
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
                <h2 class="h5 mb-0">Forms</h2>
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
              


              <div class="row">
              <div class="col-lg">
                <div class="card mb-0">
                  <div class="card-header">
                    <h3 class="h4 mb-0">Courses</h3>
                  </div>
                  <div class="card-body pt-0">
                    <div class="table-responsive">
                      <table class="table mb-0 table-striped table-hover">
                        <thead>
                          <tr>
                            <th>NO.</th>
                            <th>Couser Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php 
              $i=1;
              while($row1=mysqli_fetch_assoc($res1)){?>
              <tr style="">
                 <th class="border-bottom-0"><?php echo $i++?></td>
                
                 <td class="border-bottom-0"><?php echo $row1['coursename']?></td>
                 <td class="border-bottom-0"><?php echo $row1['price']?></td>
                 
                 
                 <td class="border-bottom-0">
                   <?php
                if($row1['status']==1){
                  echo "<a class='btn btn-sm btn-success' href='?type=status&operation=deactive&id=".$row1['id']."'><i class='fa fa-eye'></i></a>&nbsp;";
                }else{
                  echo "<a class='btn btn-sm btn-pending' href='?type=status&operation=active&id=".$row1['id']."'><i class='fa fa-eye-slash'></i></a>&nbsp;";
                }
                echo "<a class='btn btn-sm btn-primary' href='cupdate.php?id=".$row1['id']."'><i class='fa fa-edit'></i></a>&nbsp;";

                
                echo "<a class='btn btn-sm btn-danger' href='?type=delete&id=".$row1['id']."'><i class='fa fa-trash'></i></a>";
                
                ?>
              </td>
                          
                          </tr>
                          <?php } ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


              <!-- Basic Form-->

              <div class="col-lg-3 mb-3">
                <button class="btn btn-primary btn-lg" data-bs-toggle="collapse" data-bs-target="#mycard"><i class="fa fa-plus"></i> Add</button>
                


                
                <div id="mycard" class="card mcard collapse">
                  <div class="card-header">
                    <h3 class="h4 mb-0">Add Course</h3>
                  </div>
                  <div class="card-body pt-0">
                    <p class="text-sm"></p>
                    <form action="" method="POST">
                      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="alert alert-danger" style="width: 100%;">'.$error.'</span>';
         };
      };
      ?>
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Course</label>
                        <input class="form-control" id="exampleInputEmail1" type="text" name="course" aria-describedby="emailHelp">
                        <div class="form-text" id="emailHelp"></div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1">Price</label>
                        <input class="form-control" id="exampleInputPassword1" type="number" name="price">
                      </div>
                      <button class="btn btn-primary" name="addcourse" type="submit">Submit</button>
                    </form>
                  </div>
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