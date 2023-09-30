<?php

@include 'config.php';

session_start();
error_reporting(1);







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
    $update_status_sql="update students set status='$status' where id='$id'";
    mysqli_query($conn,$update_status_sql);
  }
  
  if($type=='delete'){
    $id=$_GET['id'];
    $delete_sql="delete from students where id='$id'";
    mysqli_query($conn,$delete_sql);
  }
}

$sql="SELECT * FROM students";
$res=mysqli_query($conn,$sql);


$dis = $row['discount'];






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
                <form class="px-4" id="searchForm" action="" method="GET">
                  <div class="input-group position-relative flex-column flex-lg-row flex-nowrap">
                    <input class="form-control shadow-0 bg-none px-0 w-100" type="search" name="search" placeholder="What are you searching for..." value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                    <button class="btn btn-link text-gray-600 px-0 text-decoration-none fw-bold cursor-pointer text-center" type="submit">Search Student</button>
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
            <?php
      if(isset($alert)){
         foreach($alert as $alert){
            echo '<span class="alert alert-success" style="width: 100%;">'.$alert.'</span>';
         };
      };
      ?>







      <div class="row gy-4">
              <div class="col-lg-12">
                <div class="card mb-0">
                  <div class="card-header">
                    <h3 class="h4 mb-0">Search Results</h3>
                    <br>
                    <p>Search results will appear here...</p>
                  </div>
                  
                            


                <div class="card-body pt-0">
                    <div class="table-responsive">
                      <table class="table mb-0">
                        <thead>
                          <tr>
                            
                            <th>Name</th>
                            
                           
                            <th>F.pay</th>
                            <th>S.pay</th>
                            <th>T.pay</th>
                            <th>Ft.pay</th>
                            <th>Fth.pay</th>
                            <th>Discount</th>
                            <th>Course</th>
                            <th>TotalPaid</th>
                            <th>Balance</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                <?php
            if(isset($_GET['search'])){
              $filtervalues = $_GET['search'];
              $query = "SELECT * FROM students WHERE CONCAT(id,firstname,lastname) LIKE '%$filtervalues%' ";
              $query_run = mysqli_query($conn,$query);



              if(mysqli_num_rows($query_run) > 0)
              {
                foreach($query_run as $items)
                {
                  ?>
                  

              <tr>
                 
                
                 <td class="border-bottom-0"><?php echo $items['firstname'] . ' ' . $items['lastname']; ?></td>
                 
                 <td class="border-bottom-0"><?php echo $items['firstly']?></td>
                 <td class="border-bottom-0"><?php echo $items['secondly']?></td>
                 <td class="border-bottom-0"><?php echo $items['thirdly']?></td>
                 <td class="border-bottom-0"><?php echo $items['fourthly']?></td>
                 <td class="border-bottom-0"><?php echo $items['fifthly']?></td>
                 <td class="border-bottom-0"><?php echo $items['discount']?></td>
                 <td class="border-bottom-0"><?php echo $items['course']?></td>
                 <td class="border-bottom-0"><?php echo $all?></td>

                 <td class="border-bottom-0"><?php echo $bal?></td>
                 
                 <td class="border-bottom-0">
                   <?php
                
                echo "<a class='btn btn-sm btn-success' href='payment.php?id=".$items['id']."'><i class='fa fa-edit'></i></a>&nbsp;";
                

                
                
               
                
                ?>
              </td>
                          
                          </tr>
                          <?php

                }

              }
              else
              {
                ?>
                <tr>
                  <td colspan="3"> <div class="alert alert-danger" role="alert">
  No records found
</div></td>
                </tr>

                <?php
              }
            }

            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div></div>
                <br>
              
            <div class="row gy-4">
              <div class="col-lg-12">
                <div class="card mb-0">
                  <div class="card-header">
                    <h3 class="h4 mb-0">Students</h3>
                  </div>
                  <div class="card-body pt-0">
                    <div class="table-responsive">
                      <table class="table mb-0">
                        <thead>
                          <tr>
                            
                            <th>Full Name</th>
                          
                            <th>Stud_phone</th>
                            <th>Guardian</th>
                            <th>phone</th>
                            <th>Admitted</th>
                            <th>Course</th>
                            <th>Course2</th>
                            <th>Total</th>
                            <th>Disc</th>
                            <th>Pay</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <?php 
              
              

              while($row=mysqli_fetch_assoc($res)){
                $amt = $row['course'];
                $cselect = "SELECT price FROM courses WHERE coursename = '$amt'";
$cres = mysqli_query($conn,$cselect);
$rowc = mysqli_fetch_array($cres);
$total = $rowc['price'];
$dis = $row['discount'];
$pay = $total - $dis;


                ?>
             


              <tr>
                 
                
                 <td class="border-bottom-0"><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>

                 <td class="border-bottom-0"><?php echo $row['phone']?></td>
                 <td class="border-bottom-0"><?php echo $row['parent']?></td>
                 <td class="border-bottom-0"><?php echo $row['p_phone']?></td>
                 <td class="border-bottom-0"><?php echo $row['admission_date']?></td>
                 <td class="border-bottom-0"><?php echo $row['course']?></td>
                 <?php 
                 if($row['course2'] == 0){
                  echo "<td class='border-bottom-0'>Null</td>";
                 }
                 else{
                  echo "<td class='border-bottom-0'>".$row['course2']."</td>";
                 }

                 ?>

                 <td class="border-bottom-0"><?php echo $total?></td>
                 <td class="border-bottom-0"><?php echo $dis?></td>
                 <td class="border-bottom-0"><?php echo $pay?></td>
                 
                 <td class="border-bottom-0">
                   <?php
                
                

                echo "<a class='btn btn-sm btn-primary' href='activity.php?id=".$row['id']."'><i class='fa fa-eye'></i>View</a>&nbsp;";

                echo "<a class='btn btn-sm btn-primary' href='delete.php?id=".$row['id']."'><i class='fa fa-trash'></i>Delete</a>&nbsp;";
                
                
                
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
</html>