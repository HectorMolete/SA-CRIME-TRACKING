<?php
session_start();
include("sessions.php");
include("../database/connection.php");
 
$user=$_SESSION['user'];
 $sql="SELECT * from user where email_address='$user'";
$res=mysqli_query($conn,$sql);
$profile_pic="";
while($row=mysqli_fetch_assoc($res)){
	
	$first_name=strtoupper($row['last_name']);
	$last_name=strtoupper($row['first_name']);
	$profile_pic=$row['profile_pic'];
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    SA CRIME TRACKING
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="../dist/css/cxdialog.min.css">
  <link type="text/css" rel="stylesheet" href="../loader/dist/jquery.loading-indicator.css" />
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
           <img src="../assets/img/logo.png">
        </div>
        <ul class="nav">
         <li class="">
            <a href="index.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="active">
            <a href="report_case.php">
              <i class="tim-icons icon-user-run"></i>
              <p>Report Crime</p>
            </a>
          </li>
         <li >
            <a href="nearby_stations.php">
              <i class="tim-icons icon-square-pin"></i>
              <p>Nearby Stations</p>
            </a>
          </li>
         <li >
            <a href="status.php">
              <i class="tim-icons icon-chart-bar-32"></i>
              <p>Track Status</p>
            </a>
          </li>

          <li>
            <a href="../index.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Logout</p>
            </a>
          </li>


        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
				    <?php  
					   if($profile_pic==""){
						?>
                       <img src="../assets/img/anime3.png" alt="Profile Photo">
					   <?php
					}
					else{
					?>
					 <img src="profile pictures/<?php echo $profile_pic; ?>" alt="Profile Photo">
					<?php
					
					}?>
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="profile.php" class="nav-item dropdown-item">Profile</a></li>
                  <li class="nav-link"><a href="change_password.php" class="nav-item dropdown-item">Change Password</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Report A Crime</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row" style="display:none">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" id="email"  value="<?php echo $user;?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-3 px-md-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control"  value="<?php echo $first_name;?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="email" class="form-control" value="<?php echo $last_name;?>" readonly>
                      </div>
                    </div>
                  </div>
				  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
   
                        <label>Province</label>
                        
						<select  class="form-control" id="province" onchange="select()">
						   <option></option>
						   <option  style="color:black" value="Gauteng">Gauteng</option>
						   <option  style="color:black">Limpopo</option>
						   <option  style="color:black">Mpumalanga</option>
						   <option  style="color:black">Western Cape</option>
						   <option  style="color:black">North West</option>
						   <option  style="color:black">Eastern Cape</option>
						   <option  style="color:black">Kwazulu-Natal</option>
						   <option  style="color:black">Free State</option>
						   <option  style="color:black">Northern Cape</option>
						</select>
						<a id="province_error"></a>
                      </div>
                    </div>
                  </div>
				  
                  <div class="row" id="">
                    <div class="col-md-12">
                      <div class="form-group" id="">
   
                        <label>Police Station</label>
                       
						  <select  class="form-control" id="police_station" >
	                         
						  </select>
					
						<a id="province_error"></a>
                      </div>
                    </div>
                  </div>
                  <div class="row" id="">
                    <div class="col-md-12">
                      <div class="form-group" id="">
   
                        <label>Type of Crime</label>                 
						  <select  class="form-control" id="crime_type" >
						       <option style='color:black'></option>
	                           <option style='color:black'>Personal crimes</option>
							   <option style='color:black'>Property crimes</option>
		                       <option style='color:black'>Inchoate crimes</option>
							   <option style='color:black'>Felonies</option>
		                       <option style='color:black'>Violent crimes</option>
							   <option style='color:black'>arceny and theft</option>
						  </select>
                      </div>
                    </div>
                  </div>
				  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Reason</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Brief Explanation on why you are reporting a case" id="description"></textarea>
                      </div>
                    </div>
                  </div>
				  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Location</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Enter Location where incident took place" id="location"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Date of Incident</label>
                        <input type="date" class="form-control" id="incident_date">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary" onclick="submit()">Submit</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                     <!-- <img class="avatar" src="../assets/img/.jpg" alt="...">-->
                      <h5 class="title"><?php echo $first_name." ".$last_name;?></h5>
                    </a>
                    <p class="description">
                      User
                    </p>
                  </div>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
  <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                T&Cs
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Disclaimer
              </a>
            </li>
          </ul>
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> SA CRIME TRACKING . All Rights Reserved.
            <a href="javascript:void(0)" target="_blank">
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div id="notif"></div>
  <div id="submit_case"></div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script src="../loader/jquery.min.js"></script>
  <script src="../loader/dist/jquery.loading-indicator.js"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
	  
 function select(){    
   var province=document.getElementById('province').value;
   $('body').loadingIndicator();
   var loader = $('body').data("loadingIndicator");
   loader.show()
   
    $.ajax({
        url: "../classess/select_stations.php",
        cache: false,
		data:{province:province},
        success: function(html){   


              setTimeout(function() {
              loader.hide()
			  $("#police_station").html(html); 
             }, 4000);	
   			
            	
        },
    });
}  


 function submit(){    
   var user=document.getElementById('email').value;
   var crime_type=document.getElementById('crime_type').value;
   var station_name=document.getElementById('police_station').value;
   var description=document.getElementById('description').value;
   var location=document.getElementById('location').value;
   var incident_date=document.getElementById('incident_date').value;
   
    $.ajax({
        url: "../classess/submit_case.php",
        cache: false,
		data:{user:user,crime_type:crime_type,station_name:station_name,description:description,location:location,incident_date:incident_date},
        success: function(html){       
            $("#submit_case").html(html);  
            document.getElementById('email').value="";
			document.getElementById('crime_type').value="";
			document.getElementById('police_station').value="";
			document.getElementById('description').value="";
			document.getElementById('province').value="";
			document.getElementById('location').value="";
			document.getElementById('incident_date').value="";
        },
    });
}

function get_notification(){   
    $.ajax({
        url: "../classess/case_user_notifications.php",
        cache: false,
        success: function(html){       
           $("#notif").html(html); 	   
        },
    });
   } 

setInterval (get_notification, 2500);  

  </script>
    <script src="../dist/js/cxdialog.min.js"></script>
</body>

</html>