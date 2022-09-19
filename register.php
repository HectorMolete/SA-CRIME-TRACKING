<!--===================================================THIS IS HTML=======================================================-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    SA CRIME TRACKING
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="dist/css/cxdialog.min.css">
  <link type="text/css" rel="stylesheet" href="loader/dist/jquery.loading-indicator.css" />
  <link type="text/css" rel="stylesheet" href="loader/dist/jquery.loading-indicator.css" /> 
  <style>
     .title:hover{
	   color:pink;
	   border-bottom:2px solid #f2f2f2;
	 }
  </style>
</head>
 <script src="jquery.js"></script>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
             <img src="assets/img/logo.png">
        </div>
        <ul class="nav">
          <li>
            <a href="index.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="./icons.html">
              <i class="tim-icons icon-bell-55"></i>
              <p>Panic Button</p>
            </a>
          </li>
         <li class="">
            <a href="nearby_stations.php">
              <i class="tim-icons icon-square-pin"></i>
              <p>Nearby Stations</p>
            </a>
          </li>
          <li>
            <a href="./map.html">
              <i class="tim-icons icon-alert-circle-exc"></i>
              <p>FAQs</p>
            </a>
          </li>
          <li>
            <a href="login.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Login</p>
            </a>
          </li>
          <li class="active">
            <a href="register.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Register</p>
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

          <div class="col-md-12">
		  <h2>Registration</h2>
            <div class="card" id="individual">
			  <h3 id="error" style="color:red"></h3>
              <div class="card-header" style="display:flex;width:100%;">
                <h5 class="title" style="width:50%;border-bottom:2px solid pink;cursor:pointer">Individual</h5>
				<h5 class="title" style="cursor:pointer;width:50%" onclick="police()">Police Officer</h5>
              </div>
              <div class="card-body">
                <form id="user" onchange="validate()">
                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>SA ID Number</label>
                        <input type="text" class="form-control" id="id_number"  placeholder="" value=""onchange="checkID()">
						<a id="error_id"></a>
						<span id='valid' style='display:none'></span>
                      </div>
                    </div>
                    <div class="col-md-3 px-md-1">
                      <div class="form-group">
                        <label>Phone NO</label>  <a id="changeNo" style="cursor:pointer" onclick="change()"></a>
                        <input type="text" class="form-control" id="phone_number" placeholder="" value="" onchange="validatePhone()">
						<input type="text" class="form-control" id="confirm_code" placeholder="Confirmation Code" value="" style="display:none" onchange="verify()">
						<input type="text" class="form-control" id="code" placeholder="Confirmation Code" value="<?php echo (rand(100000,999999)); ?>" style="display:none">
						<a id="mobile_error"></a>
                       <i class="tim-icons icon-check-2" style="display:none"> Verified</i>

                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="" id="user_email" onchange="checkEmail()">
						<a id="email_error"></a>
						
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="" value="" id="first_name" onchange="checkName()">
						<a id="first_error"></a>
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="" value="" id="last_name" onchange="lastName()">
						<a id="last_error"></a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="text" class="form-control" id="date" readonly>
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control" id="gender" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Home Address</label>
                        <input type="text" class="form-control" placeholder="" value="" id="address" onchange="validateAddress()">
						<a id="address_error"></a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Province</label>
                        
						<select  class="form-control" id="province" onchange="checkProvince()">
						   <option></option>
						   <option  style="color:black">Gauteng</option>
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
                    <div class="col-md-4 px-md-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control"  id="user_password" onchange="checkPass()">
						<a id="password_error"></a>
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control"  id="confirm_password" onchange="checkPassword()">
						<a id="errorPassword"></a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary" onclick="register()" disabled  id="user_reg">Register</button>
              </div>
            </div>

            <div class="card" id="police" style="display:none" >
			  <h3 id="error_officer" style="color:red"></h3>
              <div class="card-header" style="display:flex;width:100%;">
                <h5 class="title" style="width:50%;cursor:pointer" onclick="individual()">Individual</h5>
				<h5 class="title" style="width:50%;border-bottom:2px solid pink;cursor:pointer">Police Officer</h5>
              </div>
              <div class="card-body">
                <form id="officer" onchange="Avalidate()">
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
                        <input type="text" class="form-control" placeholder="" id="officer_mobile" onchange="AvalidatePhone()">
						<a id="mobile_e"></a>
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="officer_email" onchange="valOfficerEmail()">
						<a id="email_e"></a>
                      </div>
                    </div>
                  </div>
				 
				  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Home Address</label>
                        <input type="text" class="form-control" placeholder="" id="officer_address" onchange="AvalidateAddress()">
						<a id="address_e"></a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>password</label>
                        <input type="password" class="form-control" placeholder="" id="officer_password" onchange="AcheckPass()">
						<a id="password_e"></a>
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="" id="officer_confirm" onchange="AcheckPassword()">
						<a id="errorP"></a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" id="officer_reg" class="btn btn-fill btn-primary" onclick="officer_registration()" disabled>Register</button>
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
  <div id="data"></div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <script src="assets/demo/demo.js"></script>
  <script src="loader/jquery.min.js"></script>
  <script src="loader/dist/jquery.loading-indicator.js"></script>
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
	
	
//=========================================VALIDATING INDIVIDUAL FORM=====================================================	


//==========================================VALIDATING MOBILE NO==================================================================
  function validatePhone(){
	  var number=document.getElementById('phone_number').value;
	  
	  var mobile=/^0(6|7|8){1}[0-9]{1}[0-9]{7}$/;
	  if(mobile.test(number)){
           document.getElementById('mobile_error').innerHTML="";
		   document.getElementById('phone_number').disabled=true;
		   document.getElementById('phone_number').style.border="";
		   document.getElementById('confirm_code').style.display="block";
		   document.getElementById('changeNo').innerHTML='<i class="tim-icons icon-refresh-01" style="" id="change">Change</i>';
           var otp=document.getElementById('code').value;

           $.ajax({
             url: "classess/send_otp.php",
             cache: false,
		     data:{otp:otp,number:number},
             success: function(html){                       		   
		         document.getElementById("mobile_error").style.display="none";
				 document.getElementById('mobile_error').innerHTML="Wrong Cellphone number";  
            }
           });		   
		   
		 
	  }	
     else{
         document.getElementById('mobile_error').innerHTML="Wrong Cellphone number";  
		  
     }		 
   }
   
   function change(){
	       document.getElementById('phone_number').value="";
		   document.getElementById('phone_number').disabled=false;
		   document.getElementById('confirm_code').style.display="none";
		   document.getElementById('changeNo').innerHTML='';	   
   }
   function verify(){
	   if(document.getElementById('confirm_code').value===document.getElementById('code').value){
		   document.getElementById('confirm_code').style.display="none";
		   document.getElementById('changeNo').innerHTML='';
		   document.getElementById('changeNo').disabled=true;
		   document.getElementById('mobile_error').innerHTML=""; 
		     
	   }
	   else{
		   document.getElementById('confirm_code').style.border="1px solid red";
		   document.getElementById('mobile_error').innerHTML="Wrong Cellphone number";  
		   document.getElementById("mobile_error").style.display="none";
		 
	   }
   }
   
   function AvalidatePhone(){
	  var number=document.getElementById('officer_mobile').value;
	  
	  var mobile=/^0(6|7|8){1}[0-9]{1}[0-9]{7}$/;
	  if(mobile.test(number)){
           document.getElementById('mobile_e').innerHTML="";	
           document.getElementById('officer_mobile').style.border="";		   
		 
	  }	
     else{
         document.getElementById('mobile_e').innerHTML="Wrong Cellphone number";  
		  
     }		 
   }  
   
//================================================VALIDATING EMAIL ADDRESS=========================================================================
   function checkEmail(){
	var email=document.getElementById('user_email').value;
	 var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  if (pattern.test(email)) {
		 document.getElementById("email_error").innerHTML=""; 	 
		 document.getElementById('user_email').style.border="";
		 
	  }
	  else{
		 document.getElementById("email_error").innerHTML="Wrong Email Address";  
		 
	  }
}

//================================================VALIDATING EMAIL ADDRESS=========================================================================
   function valOfficerEmail(){
	var email=document.getElementById('officer_email').value;
	 var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  if (pattern.test(email)) {
		 document.getElementById("email_e").innerHTML=""; 	 
		 document.getElementById('officer_email').style.border="";
		 
	  }
	  else{
		 document.getElementById("email_e").innerHTML="Wrong Email Address";  
		 
	  }
}



//===========================================FUNCTION TO CHECK IF THE STRING CONTAINS ONLY SPACES===================================================
function checkEmpty(str){
   return str.trim().length===0;
}



//==================================================VALIDATING FIRST NAME=================================================================================
function   checkName(){
	  var str=document.getElementById('first_name').value;
	  if(checkEmpty(str)===false){
	      if(!/[^A-Za-z ]/.test(str)&&str!=""){
               document.getElementById('first_error').innerHTML="";
			   document.getElementById('first_name').style.border="";
	       }	
          else{
               document.getElementById('first_error').innerHTML="Only alphabets and white space are allowed";  
           }	
	     }
 		 else{
			document.getElementById('first_error').innerHTML="Only alphabets are allowed";   
		 }	
   		 
}

function   checkNameA(){
	  var str=document.getElementById('officer_firstname').value;
	  if(checkEmpty(str)===false){
	      if(!/[^A-Za-z ]/.test(str)&&str!=""){
               document.getElementById('first_e').innerHTML="";
			   document.getElementById('officer_firstname').style.border="";
	       }	
          else{
               document.getElementById('first_e').innerHTML="Only alphabets and white space are allowed";  
           }	
	     }
 		 else{
			document.getElementById('first_e').innerHTML="Only alphabets are allowed";   
		 }	
   		 
}




//====================================================VALIDATING LAST NAME================================================================
function   lastName(){
	  var str=document.getElementById('last_name').value;
	  if(checkEmpty(str)===false){
	      if(!/[^A-Za-z ]/.test(str)&&str!=""){
               document.getElementById('last_error').innerHTML="";
			   document.getElementById('last_name').style.border="";
	       }	
          else{
               document.getElementById('last_error').innerHTML="Only alphabets and white space are allowed";  
           }	
	     }
 		 else{
			document.getElementById('last_error').innerHTML="Only alphabets are allowed";   
		 }	
   		 
}

function   AlastName(){
	  var str=document.getElementById('officer_lastname').value;
	  if(checkEmpty(str)===false){
	      if(!/[^A-Za-z ]/.test(str)&&str!=""){
               document.getElementById('last_e').innerHTML="";
			   document.getElementById('officer_lastname').style.border="";
	       }	
          else{
               document.getElementById('last_e').innerHTML="Only alphabets and white space are allowed";  
           }	
	     }
 		 else{
			document.getElementById('last_e').innerHTML="Only alphabets are allowed";   
		 }	
   		 
}


//===================================================VALIDATING PASSWORD IF MATCH====================================================================

function checkPassword(){


	
	if(document.getElementById('user_password').value!=document.getElementById('confirm_password').value){

		document.getElementById('errorPassword').innerHTML="* Passwords do not match!";
	}
	else{
		document.getElementById('errorPassword').innerHTML="";
	}
	
}


function AcheckPassword(){


	
	if(document.getElementById('officer_password').value!=document.getElementById('officer_confirm').value){

		document.getElementById('errorP').innerHTML="* Passwords do not match!";
	}
	else{
		document.getElementById('errorP').innerHTML="";
	}
	
}


//===============================================VALIDATING PASSWORD TO MEETS MINUMUM REQUIRMENTS
function checkPass(){
   var passw=document.getElementById('user_password').value;
   var conPassw=document.getElementById('confirm_password').value;

	let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.])[A-Za-z\d$@$1%*?&.]{8,20}/;
	
	if(pattern.test(passw)) {
		
		document.getElementById('password_error').innerHTML=""
		document.getElementById('user_password').style.border="";
	}
	else{
		document.getElementById('password_error').innerHTML="Password should be at least 8 characters in length. Should include at least upper case letter, lowercase case letter, a number, and special character."
		
	}
	
   if(conPassw.length!=0){
	if(conPassw!=passw){

		document.getElementById('errorPassword').innerHTML="* Passwords do not match!";
		document.getElementById('confirm_password').style.border="";
		
	}
	else{
		
		document.getElementById('errorPassword').innerHTML="*";		
		
	}
  }
	

	
}

function AcheckPass(){
   var passw=document.getElementById('officer_password').value;
   var conPassw=document.getElementById('officer_confirm').value;

	let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.])[A-Za-z\d$@$1%*?&.]{8,20}/;
	
	if(pattern.test(passw)) {
		
		document.getElementById('password_e').innerHTML=""
		document.getElementById('officer_password').style.border="";
	}
	else{
		document.getElementById('password_e').innerHTML="Password should be at least 8 characters in length. Should include at least upper case letter, lowercase case letter, a number, and special character."
		
	}
	
   if(conPassw.length!=0){
	if(conPassw!=passw){

		document.getElementById('errorP').innerHTML="* Passwords do not match!";
		document.getElementById('officer_confirm').style.border="";
		
	}
	else{
		
		document.getElementById('errorP').innerHTML="*";		
		
	}
  }
	

	
}



//=======================================FUNCTION FOR PRINTING ERROR IF THE ID IS CORRECT OR  NOT===========================
 function checkID(){
	 
	 var text=document.getElementById("valid").innerHTML;

	 if(text.length>=0){
		 
	    if(text==="Checking..."){
		   document.getElementById('error_id').innerHTML="";
		   document.getElementById('id_number').style.border="";
        }
		else{
			document.getElementById('error_id').innerHTML="Please Enter a valid ID No";
		}
	 
	 }
 }
 

//=========================================FUNCTION FOR VALIDATING ADDRESS 
 function validateAddress(){
	 
	var address=document.getElementById("address").value;
    
    if(address.length<5){

       document.getElementById("address_error").innerHTML="Please Enter a vailid Home Address";

	}else{

        document.getElementById("address_error").innerHTML="";
		document.getElementById("address").style.border="";
	}		
	 
 }
 
  function AvalidateAddress(){
	 
	var address=document.getElementById("officer_address").value;
    
    if(address.length<5){

       document.getElementById("address_e").innerHTML="Please Enter a vailid Home Address";

	}else{

        document.getElementById("address_e").innerHTML="";
		document.getElementById("officer_address").style.border="";
	}		
	 
 }
 
 
 
 //==========================================FUNCTION FOR VALIDATIN PROVINCE=========================
 function checkProvince(){
	 
	 if(document.getElementById("province").value!=""){
		 
		 document.getElementById("province").style.border="";
	 }
 }

//==========================================SUBMITING REGISTERATION FORM=========================================================

//=========================================USER REGISTERATION====================================================================
  function register(){  
  
    var id_number=document.getElementById('id_number').value;
    var phone_number=document.getElementById('phone_number').value;
    var email=document.getElementById('user_email').value;
    var first_name=document.getElementById('first_name').value;
    var last_name=document.getElementById('last_name').value;
    var address=document.getElementById('address').value;
    var password=document.getElementById('user_password').value;
	var province=document.getElementById('province').value;
    var confirm_password=document.getElementById('confirm_password').value;
    //$('body').loadingIndicator();
    //var loader = $('body').data("loadingIndicator");
	//loader.show()
	//Checking field are not empty
	if(id_number!=""&&phone_number!=""&&email!=""&&first_name!=""&&last_name!=""&&password!=""&&address!=""&&province!=""&&confirm_password!=""){
	//pass variables to php  class using ajax
	//=========================THIS IS AJAX CODE============================================
    $.ajax({
        url: "classess/register.php",
        cache: false,
		data:{id_number:id_number,phone_number:phone_number,email:email,first_name:first_name,last_name:last_name,address:address,password:password,province:province},
        success: function(html){ 
            //loader.hide();		
			$("#data").html(html);
           	document.getElementById("user").reset();	
            document.getElementById('phone_number').disabled=false;			
        }
    });
	}
	//==========================PUT A RED BOREDER IF THE FIELD IS EMPTY
	else{
	//loader.hide();
	cxDialog('Failed <br>Please Fill all Required fields');  	
    var fields =["phone_number","user_email","first_name","user_password","address","last_name","province","id_number","confirm_password"]
	
	var i,l=fields.length;
	var fieldname;
	var isComplete=0;
	
	for(i=0;i<l;i++){
		fieldname=fields[i];
		
		if(document.forms["user"][fieldname].value===""){
			document.forms["user"][fieldname].style.border='1px solid red';
		}
		else{
            document.forms["user"][fieldname].style.border='';
		}
	}
		
	}
	
	
} 



//====================================================POLICE OFFICER REGISTRATION=======================================================//


function officer_registration(){

    var officer_id=document.getElementById('officer_id').value;
    var phone_number=document.getElementById('officer_mobile').value;
    var email=document.getElementById('officer_email').value;
    var address=document.getElementById('officer_address').value;
    var password=document.getElementById('officer_password').value;
	var confirm=document.getElementById('officer_confirm').value;
	
    if(officer_id!=""&&phone_number!=""&&email!=""&&first_name!=""&&last_name!=""&&address!=""&&password!=""&&confirm!=""){
	//====================THIS IS AJAX CODE TO PASS VARIABLE TO PHP FILE=====================================================
    $.ajax({
        url: "classess/officer_registration.php",
        cache: false,
		data:{officer_id:officer_id,phone_number:phone_number,email:email,address:address,password:password},
        success: function(html){       
			$("#data").html(html);
           	document.getElementById("officer").reset();	
			
        }
    });
	}	
	else{
	//============================================PUTING A RED BORDER IF A FIELD IS EMPTY=========================================	
    var fields =["officer_id","officer_email","officer_firstname","officer_password","officer_address","officer_lastname","officer_confirm","officer_mobile"]
	cxDialog('Failed <br>Please Fill all Required fields');  
	var i,l=fields.length;
	var fieldname;
	var isComplete=0;
	
	for(i=0;i<l;i++){
		fieldname=fields[i];
		
		if(document.forms["officer"][fieldname].value===""){
			document.forms["officer"][fieldname].style.border='1px solid red';
		}
		else{
			document.forms["officer"][fieldname].style.border='';
		}
	}
		
	}	
	
}

//Activation Submit button if the is no Error Message Found
function validate(){
	
   var id=document.getElementById("error_id").innerHTML;
   var mobile=document.getElementById("mobile_error").innerHTML;
   var email=document.getElementById("email_error").innerHTML;
   var name=document.getElementById("first_error").innerHTML;
   var surname=document.getElementById("last_error").innerHTML;
   var address=document.getElementById("address_error").innerHTML;
   var password=document.getElementById("password_error").innerHTML;
   var confirm=document.getElementById("errorPassword").innerHTML;

   if(id===""&&mobile===""&&email===""&&name===""&&surname===""&&address===""&&password===""&&confirm===""){
	   
	   document.getElementById("user_reg").removeAttribute("disabled");
	   
   }
   else{
	   document.getElementById("user_reg").setAttribute('disabled', '');
	   
   }
	
}

function Avalidate(){
	
   var mobile=document.getElementById("mobile_e").innerHTML;
   var email=document.getElementById("email_e").innerHTML;
   var address=document.getElementById("address_e").innerHTML;
   var password=document.getElementById("password_e").innerHTML;
   var confirm=document.getElementById("errorP").innerHTML;

   if(mobile===""&&email===""&&address===""&&password===""&&confirm===""){
	   
	   document.getElementById("officer_reg").removeAttribute("disabled");
	   
   }
   else{
	   document.getElementById("officer_reg").setAttribute('disabled', '');
	   
   }
	
}


<!--==============================================CALLING A JQUEY ALERT DIALOG==============================================-->
 </script>

</body>

</html>

 <script src="jquery.js"></script>
 <script type="text/javascript" src="jquery.rsa_id_validator.js"></script>
 
<script>
 $().ready(function() { 
 $('#id_number').rsa_id_validator({ 

 displayValid_id: "valid",
 displayDate_id: "date", 
 displayGender_id: "gender"
 }); 
 }); 
 
 </script>
 <script src="dist/js/cxdialog.min.js"></script>



</head>
