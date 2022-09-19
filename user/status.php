<!--===================================================THIS IS HTML=======================================================-->

<?php
  session_start();
  include("../database/connection.php");  
  $email=$_SESSION['user'];
  $sql="SELECT * from user where email_address='$email'";
  $res=mysqli_query($conn,$sql);
  $profile_pic="";
  while($row=mysqli_fetch_assoc($res)){
	
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
  <link rel="../stylesheet" href="../dist/css/cxdialog.min.css">
  <link type="text/css" rel="stylesheet" href="../loader/dist/jquery.loading-indicator.css" />
  
  <style>
     .title:hover{
	   color:pink;
	   border-bottom:2px solid #f2f2f2;
	 }
  </style>
	<style>
	
    .top-header{
	    display:flex;
	    width:100%;	
    }
    .active-header{
        width:50%;
	    border-bottom:4px solid pink;
	    cursor:pointer	
    }
    .not_active{
	    cursor:pointer;
	    width:50%
     }
    .status{	
	    width:90%;
	    display:flex;
		border-bottom:1px solid #fff;
		margin:0 auto;
    }
   .status h6{
	    margin-top:5%;	
	    width:33.33%;
    }
   #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: #455A64;
        padding-left: 0px;
        margin-top: 30px
    }

   #progressbar li {
        list-style-type: none;
        font-size: 13px;
        width: 33.33%;
        float: left;
        position: relative;
        font-weight: 400;
        color: #686868 !important;
    
    }

    #progressbar #step1:before {
        content: "1";
        color: #fff;
        width: 29px;
        margin-left: 15px !important;
        padding-left: 11px !important;
    }


    #progressbar #step2:before {
       content: "2";
       color: #fff;
       width: 29px;

    }

    #progressbar #step3:before {
       content: "3";
       color: #fff;
       width: 29px;
       margin-right: 15px !important;
       padding-right: 11px !important;
    }

    #progressbar li:before {
       line-height: 29px;
       display: block;
       font-size: 12px;
       background: #686868 ;
       border-radius: 50%;
       margin: auto;
    }

    #progressbar li:after {
       content: '';
       width: 121%;
       height: 2px;
       background: #686868;
       position: absolute;
       left: 0%;
       right: 0%;
       top: 15px;
       z-index: -1;
    } 

    #progressbar li:nth-child(2):after {
       left: 50%;
    }

    #progressbar li:nth-child(1):after {
       left: 25%;
       width: 121%;
    }
    #progressbar li:nth-child(3):after {
       left: 25% !important;
       width: 50% !important;
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
       background: pink; 
    }
	
	.pr{
		
		width:90%;
		margin:0 auto;
		margin-bottom:5%;
		
	}
	
	</style>
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
          <li >
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
         <li  class="active">
            <a href="status.php">
              <i class="tim-icons icon-chart-bar-32"></i>
              <p>Track Status</p>
            </a>
          </li>

          <li>
            <a href="../index.php">
              <i class="tim-icons icon-button-power"></i>
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
	  <div id="cancel"></div>
      <div class="content">
        <div class="row">

          <div class="col-md-12">
		  <h2>Track Status</h2>
            <div class="card" id="individual">
			  <h3 id="error" style="color:red"></h3>
              <div class="card-header" style="display:flex;width:90%;margin:0 auto">
                <h5 class="title" style="width:50%;border-bottom:2px solid pink;cursor:pointer">Active</h5>
				<h5 class="title" style="cursor:pointer;width:50%">Closed/Canceled</h5>
              </div>
              <div class="card-body">
		   <?php
                   //Selecting all active tickets
		           $sql="select * from  reported_case where user_id='$email'";
				   $results=mysqli_query($conn,$sql);
				   if(mysqli_num_rows($results)>0){
					   
					   while($row=mysqli_fetch_assoc($results)){
						   
						   
			

					     if(strtoupper($row['case_status'])=='ATTENDED'){
							 
		                  echo '
						    	<div class="status">
                                   <h6>Case ID : '.$row["case_id"].'</h6>
								   <h6>Case Type : '.$row["case_type"].'</h6>
								   <h6>Date Submited : '.$row["date_submited"].'</h6>
		                         </div>	
								 
                                <div class="pr">
                                   <div class="">
                                      <ul id="progressbar" >
                                         <li class="step0 active " id="step1">SUBMITTED</li>
                                         <li class="step0 active text-center" id="step2">VIEWED</li>
                                         <li class="step0 active text-muted text-right" id="step3">'.strtoupper($row['case_status']).'</li>
                                       </ul>
                                   </div>
								   <i class="tim-icons icon-cloud-download-93" style="margin-right:15px"><a style="cursor:pointer" onclick=status("'.$row["case_id"].'")> Print a Report </a></i>
								   
								    <i class="tim-icons icon-trash-simple"><a style="cursor:pointer" onclick=cancel("'.$row["case_id"].'")> Cancel A Case</a></i>								   
                                </div>
								';
									
						 }
						 else if(strtoupper($row['case_status'])=='VIEWED'){
		                  echo '
						    	<div class="status">
                                   <h6>Case ID : '.$row["case_id"].'</h6>
								   <h6>Case Type : '.$row["case_type"].'</h6>
								   <h6>Date Submitted : '.$row["date_submited"].'</h6>
		                         </div>	
								 
                                <div class="pr">
                                   <div class="">
                                      <ul id="progressbar" >
                                         <li class="step0 active " id="step1">SUBMITTED</li>
                                         <li class="step0 active text-center" id="step2">VIEWED</li>
                                         <li class="step0  text-muted text-right" id="step3">COMPLETED</li>
                                       </ul>
                                   </div>
								   <i class="tim-icons icon-cloud-download-93" style="margin-right:15px"><a style="cursor:pointer" onclick=status("'.$row["case_id"].'")> Print a Report </a></i>
								   
								    <i class="tim-icons icon-trash-simple"><a style="cursor:pointer" onclick=cancel("'.$row["case_id"].'")> Cancel A Case</a></i>								   
                                </div>
								';							 
							 
						 }
						 else if(strtoupper($row['case_status'])=='SUBMITED'){
		                  echo '
						    	<div class="status">
                                   <h6>Case ID : '.$row["case_id"].'</h6>
								   <h6>Case Type : '.$row["case_type"].'</h6>
								   <h6>Date Submitted : '.$row["date_submited"].'</h6>
		                         </div>	
								 
                                <div class="pr">
                                   <div class="">
                                      <ul id="progressbar" >
                                         <li class="step0 active " id="step1">SUBMITED</li>
                                         <li class="step0  text-center" id="step2">VIEWED</li>
                                         <li class="step0  text-muted text-right" id="step3">COMPLETED</li>
                                       </ul>
                                   </div>
								   <i class="tim-icons icon-cloud-download-93" style="margin-right:15px"><a style="cursor:pointer" onclick=status("'.$row["case_id"].'")> Print a Report </a></i>
								   
								    <i class="tim-icons icon-trash-simple"><a style="cursor:pointer" onclick=cancel("'.$row["case_id"].'")> Cancel A Case</a></i>
                                </div>
								';							 
							 
						 }
						    
					   }
					   
					   
				   }
				   else{
					   echo '
	                        <div class="card-body" style="text-align:center">
                            <h6>No Active Ticket Found</h6>
		                    </div>		
    											   
					   ';
				   }
		  
		  ?>
              </div>
            </div>

            <div class="card" id="police" style="display:none" >
			  <h3 id="error_officer" style="color:red"></h3>
              <div class="card-header" style="display:flex;width:100%;">
                <h5 class="title" style="width:50%;cursor:pointer" onclick="individual()">Individual</h5>
				<h5 class="title" style="width:50%;border-bottom:2px solid pink;cursor:pointer">Police Officer</h5>
              </div>
              <div class="card-body">
                <form id="officer">
                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>Police Officer ID</label>
                        <input type="text" class="form-control"  id="officer_id">
                      </div>
                    </div>
                    <div class="col-md-3 px-md-1">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" placeholder="" id="officer_mobile">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="officer_email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="" id="officer_firstname">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="" id="officer_lastname">
                      </div>
                    </div>
                  </div>
				 
				  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Home Address</label>
                        <input type="text" class="form-control" placeholder="" id="officer_address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>password</label>
                        <input type="text" class="form-control" placeholder="" id="officer_password">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="" id="officer_confirm">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary" onclick="officer_registration()">Register</button>
              </div>
            </div>
			
			
          </div>

        </div>
      </div>
	  <div id="print" ></div>
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
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <script src="../assets/demo/demo.js"></script>
  <script src="../loader/jquery.min.js"></script>
  <script src="../loader/dist/jquery.loading-indicator.js"></script>
  <!--====================================================================THIS IS JQUEY================================================-->
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
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
  
  
  
<!--======================================================THIS IS A JAVASCRIPT=================================================-->
<!--===========================================================================================================================-->


 <script>
 
 //=================================SWITCHING BETWEEN THE FORMS======================================================
    function police(){
	   document.getElementById('police').style.display="block";
	   document.getElementById('individual').style.display="none";
	}
	
	function individual(){
	   document.getElementById('police').style.display="none";
	   document.getElementById('individual').style.display="block";	
	}
	
    function status(case_no){

		window.open("../classess/print_case_status.php?case_no="+case_no,"_blank");

	}

   function cancel(case_no){
      $.ajax({
          url: "../classess/cancel_case.php",
          cache: false,
		  data:{case_no:case_no},
          success: function(html){       
            // $("#cancel").html(html); 
             //cxDialog('Case Successfully Canceled');	
             cxDialog('Failed <br>Please Fill all Required fields');  			 
          },
       });
     }	   
</script>
<script src="../dist/js/cxdialog.min.js"></script>
</body>

</html>