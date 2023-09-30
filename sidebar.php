<?php

@include ('config.php');
session_start();
?>

<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle" src="img/favicon.png" alt="...">
          <div class="ms-3 title">
            <h1 class="h5 mb-1"><?php echo $_SESSION['admin_name']?></h1>
            <p class="text-sm text-gray-700 mb-0 lh-1"><?php echo $_SESSION['user_email']?></p>
          </div>
        </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Home</span>
        <ul class="list-unstyled">
              <li class="sidebar-item active"><a class="sidebar-link" href="dash.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#real-estate-1"> </use>
                      </svg><span>Home </span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="tables.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#portfolio-grid-1"> </use>
                      </svg><span>Students </span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="admit.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#sales-up-1"> </use>
                      </svg><span>Admission </span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="forms.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#survey-1"> </use>
                      </svg><span>Courses </span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse" data-bs-target="#exampledropdownDropdown"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#browser-window-1"> </use>
                      </svg><span>Records </span></a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  <li><a class="sidebar-link" href="transactions.php">Fee paymets</a></li>
                  <li><a class="sidebar-link" href="testchart.php">Fee reminder</a></li>
                  <li><a class="sidebar-link" href="#"></a></li>
                </ul>
              </li>
              <li class="sidebar-item"><a class="sidebar-link" href="project.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#survey-1"> </use>
                      </svg><span>Projects </span></a></li>
              <li class="sidebar-item"><a class="sidebar-link" href="login.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#disable-1"> </use>
                      </svg><span>Profile </span></a></li>
                      <li class="sidebar-item"><a class="sidebar-link" href="admins.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#sales-up-1"> </use>
                      </svg><span>System Users</span></a></li>
        </ul><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Extras</span>
        <ul class="list-unstyled">
              <li class="sidebar-item"><a class="sidebar-link" href="logout.php"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        <use xlink:href="#disable-1"> </use>
                      </svg><span>Logout </span></a></li>
              
        </ul>
      </nav>