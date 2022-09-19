
  
  </style>
 <script src="jquery.js"></script>
 <script type="text/javascript" src="jquery.rsa_id_validator.js"></script>
 
<script>
 $().ready(function() { 
 $('#idno').rsa_id_validator({ 

 displayValid_id: "valid",
 displayDate_id: "date", 
 displayGender_id: "gender"
 }); 
 }); 
 
 </script>


</head>

<input type="text" id="idno">

<span id="valid"></span>
<span id="date"></span>
<span id="gender"></span>

<?php

?>

