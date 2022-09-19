/**
* jQuery Plugin for the Validation of South African ID Numbers.
*
* Javascript and jQuery 
*
* @category jquery Plugin
* @package  RSA_ID_Validator
* @author   Philip Csaplar <philip@osit.co.za>
* @version  1.2.3
* @link     http://www.VerifyID.co.za
* 
* Copyright (C) 2013  Philip Csaplar <philip@osit.co.za>
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

(function($){  
 $.fn.rsa_id_validator = function(options) {  
 
	var defaults = {  
		displayValid: [true,"<font color='#00CC00'>Checking...</font>","<color='red'>IDNo InValid</font>"],
		displayDate: [true,"<b></b> "],
		displayAge: [true,"<b>Age:</b> "],  
		displayGender: [true,"<b></b> Male","<b></b> Female"],  
		displayCitizenship: [true,"<b></b> South African","<b></b> Foreign Citizenship"],
		displayValid_id: "id_results",
		displayDate_id: "id_results",  
		displayAge_id: "id_results",  
		displayGender_id: "id_results",  
		displayCitizenship_id: "id_results"  
	};  
	var options = $.extend(defaults, options);
  
    return this.each(function() {  
		obj = $(this);
		$(obj).attr('maxlength','13');
		$(obj).keydown(function(event) {
			// Allow: backspace, delete, tab, escape, and enter
			if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
				 // Allow: Ctrl+A
				(event.keyCode == 65 && event.ctrlKey === true) || 
				 // Allow: home, end, left, right
				(event.keyCode >= 35 && event.keyCode <= 39)) {
					 // let it happen, don't do anything
					 return;
			}
			else {
				// Ensure that it is a number and stop the keypress
				if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
					event.preventDefault(); 
				}   
			}
    	});
		
	 	$(obj).bind("keyup", function(){
			
			//error array creation variables
			var displayResults = [" "," "," "," "," "];
			var html = ""; 
			
			//Variable declaration
			var element_type = "";
			var currentTime = new Date();
			var id_number = $(this).val();
			
			
			//display date of birth
			if(options.displayDate[0] == true){ //start if statement
				if (id_number.length > 5){ //start if statement
					var date = "";
					var year      	= id_number.substr ( 0  , 2 );
					var nowYearNotCentury = currentTime.getFullYear() + '';
					nowYearNotCentury = nowYearNotCentury.substr(2,2);
					if (year <= nowYearNotCentury){
						date = '20' + year+ "-" + id_number.substr(2, 2) + "-" + id_number.substr(4, 2);
					} else {
						date = '19' + year+ "-" + id_number.substr(2, 2) + "-" + id_number.substr(4, 2);
					}//end if
					displayResults[1] = options.displayDate[1] + date +"<br/>,";
				}//end if
			}//end if
			
			//display age
			if(options.displayAge[0] == true){ //start if statement
				if (id_number.length > 5){  //start if statement
					var year      	= id_number.substr ( 0  , 2 );
					var nowYearNotCentury = currentTime.getFullYear() + '';
					nowYearNotCentury = nowYearNotCentury.substr(2,2);
					if (year <= nowYearNotCentury){
						year = '20' + year;
					} else {
						year = '19' + year;
					}//end if
					var birthDate = new Date(year);
					var age = currentTime.getFullYear() - birthDate.getFullYear();
					var m = currentTime.getMonth() - birthDate.getMonth();
					if (m < 0 || (m === 0 && currentTime.getDate() < birthDate.getDate())) {
						age--;
					}
					displayResults[2] = options.displayAge[1]+ age +"<br/>,";
				}//end if
			}//end if
			
			//display gender
			if(options.displayGender[0] == true){ //start if statement
				if (id_number.length > 9){ //start if statement
					var MaleFemale = id_number.substr(6, 4);
					MaleFemale = (MaleFemale * 1) + 0;
					
					if ((MaleFemale >= 0) & (MaleFemale < 5000)){
						displayResults[3] = options.displayGender[2]+"<br/>,";
					}//end if
					
					if ((MaleFemale > 4999) & (MaleFemale < 10000)){
						displayResults[3] = options.displayGender[1]+"<br/>,";
					}//end if
				}//end if
			}//end if
			
			//display citizenship
			if(options.displayCitizenship[0] == true){ //start if statement
				if (id_number.length > 12){ //start if statement
					var citizen  = (id_number.substr ( 10 , 2 )*1);
					if ((citizen == 8) || (citizen == 9)){
						displayResults[4] = options.displayCitizenship[1]+"<br/>,";
					}	
					else if ((citizen == 18) || (citizen < 19)){
						displayResults[4] = options.displayCitizenship[2]+"<br/>,";
					}//end if
				}//end if
			}//end if
			
			//check validility of IDNO
			if(options.displayValid[0] == true){ //start if statement
				if (id_number.length == 13){ //start if statement
					var testResult = ValidateID(id_number);
					if (testResult[0] == 1){
						displayResults[0] = options.displayValid[1]+'<br/>,';
					} else {
						var errorMessage = '';
						for( count = 0 ; count < testResult[2].length ; count++ )
							errorMessage += testResult[2][count] + '';
						displayResults[0] = options.displayValid[2] + ": " + errorMessage +'<br/>,';
					}//end if
				}//end if
			}//end if
			
			//display function
			
			if(options.displayValid_id != "id_results"){
				element_type = $("#"+options.displayValid_id).get(0).tagName;
				displayResults[0] = displayResults[0].replace(/(<.*?>)/ig,"");
				displayResults[0] = displayResults[0].replace(/,/g , "");
				if(element_type == "DIV"){
					$("#"+options.displayValid_id).html(displayResults[0]);
				}else if(element_type == "INPUT"){
					$("#"+options.displayValid_id).val(displayResults[0]);
				}else if(element_type == "SELECT"){
					$("#"+options.displayValid_id).val(displayResults[0]);
				}else if(element_type == "SPAN"){
					$("#"+options.displayValid_id).text(displayResults[0]);
				}
			}else{
				if(displayResults[0] != " "){
					html = html+displayResults[0];
				}
			}
			if(options.displayDate_id != "id_results"){
				element_type = $("#"+options.displayDate_id).get(0).tagName;
				displayResults[1] = displayResults[1].replace(/(<.*?>)/ig,"");
				displayResults[1] = displayResults[1].replace(/,/g , "");
				if(element_type == "DIV"){
					$("#"+options.displayDate_id).html(displayResults[1]);
				}else if(element_type == "INPUT"){
					$("#"+options.displayDate_id).val(displayResults[1]);
				}else if(element_type == "SELECT"){
					$("#"+options.displayDate_id).val(displayResults[1]);
				}else if(element_type == "SPAN"){
					$("#"+options.displayDate_id).text(displayResults[1]);
				}
			}else{
				if(displayResults[1] != " "){
					html = html+displayResults[1];
				}
			}
			if(options.displayAge_id != "id_results"){
				element_type = $("#"+options.displayAge_id).get(0).tagName;
				displayResults[2] = displayResults[2].replace(/(<.*?>)/ig,"");
				displayResults[2] = displayResults[2].replace(/,/g , "");
				if(element_type == "DIV"){
					$("#"+options.displayAge_id).html(displayResults[2]);
				}else if(element_type == "INPUT"){
					$("#"+options.displayAge_id).val(displayResults[2]);
				}else if(element_type == "SELECT"){
					$("#"+options.displayAge_id).val(displayResults[2]);
				}else if(element_type == "SPAN"){
					$("#"+options.displayAge_id).text(displayResults[2]);
				}
			}else{
				if(displayResults[2] != " "){
					html = html+displayResults[2];
				}
			}
			if(options.displayGender_id != "id_results"){
				element_type = $("#"+options.displayGender_id).get(0).tagName;
				displayResults[3] = displayResults[3].replace(/(<.*?>)/ig,"");
				displayResults[3] = displayResults[3].replace(/,/g , "");
				if(element_type == "DIV"){
					$("#"+options.displayGender_id).html(displayResults[3]);
				}else if(element_type == "INPUT"){
					$("#"+options.displayGender_id).val(displayResults[3]);
				}else if(element_type == "SELECT"){
					$("#"+options.displayGender_id).val(displayResults[3]);
				}else if(element_type == "SPAN"){
					$("#"+options.displayGender_id).text(displayResults[3]);
				}
			}else{
				if(displayResults[3] != " "){
					html = html+displayResults[3];
				}
			}
			if(options.displayCitizenship_id != "id_results"){
				element_type = $("#"+options.displayCitizenship_id).get(0).tagName;
				displayResults[4] = displayResults[4].replace(/(<.*?>)/ig,"");
				displayResults[4] = displayResults[4].replace(/,/g , "");
				if(element_type == "DIV"){
					$("#"+options.displayCitizenship_id).html(displayResults[4]);
				}else if(element_type == "INPUT"){
					$("#"+options.displayCitizenship_id).val(displayResults[4]);
				}else if(element_type == "SELECT"){
					$("#"+options.displayCitizenship_id).val(displayResults[4]);
				}else if(element_type == "SPAN"){
					$("#"+options.displayCitizenship_id).text(displayResults[4]);
				}
			}else{
				if(displayResults[4] != " "){
					html = html+displayResults[4];
				}
			}
			
			if($("#id_results").length != 0){
				$('#id_results').html(html.replace(/,/g , ""));
			}else{
				html = html.replace(/(<.*?>)/ig,"");
				html = html.replace(/,/g , "\n");
				if (id_number.length == 13){
					
				}
			}
			});//end of function  
			
			function ValidateID(id_number){
				var sectionTestsSuccessFull = 1;
				var MessageCodeArray 		= [];
				var MessageDescriptionArray = [];
				var currentTime 			= new Date();
				
				/* DO ID LENGTH TEST */
				if (id_number.length == 13){ 
					/* SPLIT ID INTO SECTIONS */
					var year      	= id_number.substr ( 0  , 2 );
					var month     	= id_number.substr ( 2  , 2 );
					var day       	= id_number.substr ( 4  , 2 );
					var gender    	= (id_number.substr ( 6  , 4 )*1);
					var citizen   	= (id_number.substr ( 10 , 2 )*1);
					var check_sum 	= (id_number.substr ( 12 , 1 )*1);
					
					/* DO YEAR TEST */
					var nowYearNotCentury = currentTime.getFullYear() + '';
					nowYearNotCentury = nowYearNotCentury.substr(2,2);
					if (year <= nowYearNotCentury){
						year = '20' + year;
					} else {
						year = '19' + year;
					}//end if
					if ((year > 1900) && (year < currentTime.getFullYear())){
						//correct
					} else {
						sectionTestsSuccessFull = 0;
						MessageCodeArray[MessageCodeArray.length] = 1;
						MessageDescriptionArray[MessageDescriptionArray.length] = 'Year is not valid, ';
					}//end if
					
					/* DO MONTH TEST */
					if ((month > 0) && (month < 13)){
						//correct
					} else {
						sectionTestsSuccessFull = 0;
						MessageCodeArray[MessageCodeArray.length] = 2;
						MessageDescriptionArray[MessageDescriptionArray.length] = 'Month is not valid, ';
					}//end if
					
					/* DO DAY TEST */
					if ((day > 0) && (day < 32)){
						//correct
					} else {
						sectionTestsSuccessFull = 0;
						MessageCodeArray[MessageCodeArray.length] = 3;
						MessageDescriptionArray[MessageDescriptionArray.length] = 'Day is not valid, ';
					}//end if
					
					/* DO DATE TEST */
					if ((month==4 || month==6 || month==9 || month==11) && day==31) {
						sectionTestsSuccessFull = 0;
						MessageCodeArray[MessageCodeArray.length] = 4;
						MessageDescriptionArray[MessageDescriptionArray.length] = 'Date not valid. This month does not have 31 days, ';
					}
					if (month == 2) { // check for february 29th
						var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
						if (day > 29 || (day==29 && !isleap)) {
							sectionTestsSuccessFull = 0;
							MessageCodeArray[MessageCodeArray.length] = 5;
							MessageDescriptionArray[MessageDescriptionArray.length] = 'Date not valid. February does not have ' + day + ' days for year ' + year +', ';
						}//end if
					}//end if
					
					/* DO GENDER TEST */
					if ((gender >= 0) && (gender < 10000)){
						//correct
					} else {
						sectionTestsSuccessFull = 0;
						MessageCodeArray[MessageCodeArray.length] = 6;
						MessageDescriptionArray[MessageDescriptionArray.length] = 'Gender is not valid, ';
					}//end if
					
					/* DO CITIZEN TEST */
					//08 or 09 SA citizen
					//18 or 19 Not SA citizen but with residence permit
					if ((citizen == 8) || (citizen == 9) || (citizen == 18) || (citizen == 19)){
						//correct
					} else {
						sectionTestsSuccessFull = 0;
						MessageCodeArray[MessageCodeArray.length] = 7;
						MessageDescriptionArray[MessageDescriptionArray.length] = 'Citizen value is not valid, ';
					}//end if
					
					/* GET CHECKSUM VALUE */
					var check_sum_odd         = 0;
					var check_sum_even        = 0;
					var check_sum_even_temp   = "";
					var check_sum_value       = 0;
					var count = 0;
					// Get ODD Value
					for( count = 0 ; count < 11 ; count += 2 ){
						check_sum_odd += (id_number.substr ( count , 1 )*1);
					}//end for
					// Get EVEN Value
					for( count = 0 ; count < 12 ; count += 2 ){
						check_sum_even_temp = check_sum_even_temp + (id_number.substr ( count+1 , 1 )) + '';
					}//end for
					check_sum_even_temp = check_sum_even_temp * 2;
					check_sum_even_temp = check_sum_even_temp + '';
					for( count = 0 ; count < check_sum_even_temp.length ; count++ ){
						check_sum_even += (check_sum_even_temp.substr( count , 1 ))*1;
					}//end for
					// GET Checksum Value
					check_sum_value = (check_sum_odd*1) + (check_sum_even*1);
					check_sum_value = check_sum_value + 'xxx';
					check_sum_value = ( 10 - (check_sum_value.substr( 1 , 1 )*1) );
					if(check_sum_value == 10)
						check_sum_value = 0;
					
					/* DO CHECKSUM TEST */
					if(check_sum_value == check_sum){
						//correct
					} else {
						sectionTestsSuccessFull = 0;
						MessageCodeArray[MessageCodeArray.length] = 8;
						MessageDescriptionArray[MessageDescriptionArray.length] = 'Checksum is not valid, ';
					}//end if
					
				} else {
					sectionTestsSuccessFull = 0;
					MessageCodeArray[MessageCodeArray.length] = 0;
					MessageDescriptionArray[MessageDescriptionArray.length] = 'IDNo is not the right length, ';
				}//end if
				
				var returnArray = [ sectionTestsSuccessFull, MessageCodeArray, MessageDescriptionArray];
				return returnArray;
			}//end function
	});

 };  
})(jQuery); 