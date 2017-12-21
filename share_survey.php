<!DOCTYPE html>
<?php
	session_start();	
	include_once 'db_config.php';	
?>
<html>
<head>
	<title>Attempt Survey</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
	body {
            font-family: Arial;
            font-size: 10pt;
        }
 
        table {
            border: 1pxsolid#ccc;
            border-collapse: collapse;
            background-color: #fff;
        }
 
        table th {
            background-color: #B8DBFD;
            color: #333;
            font-weight: bold;
        }
 
        table th, table td {
            padding: 5px;
            border: 1pxsolid#ccc;
        }
 
        table, table table td {
            border: 0pxsolid#ccc;
        }
</style>       
<script type="text/javascript">
	 $(document).ready(
        function()
        {	
        		$(document).on("click", "#ckbCheckAll" , function()         		
        		{
        			$(".checkBoxClass").prop('checked', $(this).prop('checked'));
		    	});

				$('#apply').click(function(e)
			    	{
			    		$('#div1').remove();
			    		 var cl = $('#class').val();
				         var sec = $('#section').val();
				         e.preventDefault();
				         $.ajax({
				         	type:"POST",
				         	url:"stu_select.php",
				         	data:{sec:sec,cl:cl},
				         	success:function(response)
				         	{				         
				         		var parsed_data = JSON.parse(response);
				         		var row = $("#tblCustomers tr:last-child").removeAttr("style").clone(true);
						        var row = "<div id = \"div\"><table class = \"tblCustomers \"><th>Student ID</th><th>Name</th><th>Class</th><th>Section</th><th>Mobile number</th><th><input type = \"checkbox\" id = \"ckbCheckAll\"></th>"
						        for(i in parsed_data) 
                				{								
                					row += "<tr value ="+parsed_data[i].stu_slno+">";
									row += "<td name = stu_slno["+parsed_data[i].stu_slno+"] value ="+parsed_data[i].stu_slno+">"+parsed_data[i].stu_slno + "</td>";
									row += "<td name = stu_name[]>"+parsed_data[i].stu_name + "</td>";
							        row += "<td>"+parsed_data[i].class + "</td>";
							        row += "<td>"+parsed_data[i].section + "</td>";
							        row += "<td name = stu_mob["+parsed_data[i].stu_slno+"]>"+parsed_data[i].mob_num + "</td>";
							        row += "<td><input type = \"checkbox\" class=\"checkBoxClass\" value ="+i+" name =\"stu_chkbox[]\" id =" +parsed_data[i].mob_num+"></td>";						        
							        row += "</tr>"							        
						        }
						        row += "</table>";
						        row += "<br/>";	
						        row += "<button value = \"send\" name =\"send\" id = \"send\">Save</button>";	
						        row += "</div>";
						        $('#fortab').html(row);
				         	}	
				         });		         
			    	}); 			
			    	
			    	function randomPassword(length) 
			    	{
					    var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP1234567890";
					    var pass = "";
					    for (var x = 0; x < length; x++) {
					        var i = Math.floor(Math.random() * chars.length);
					        pass += chars.charAt(i);
					    }
					    return pass;
					}					

			    	$(document).on("click", "#send" , function() 
			    	{
			    		var TableData = new Array();
			            var i = 0;       					       		
			            $('.tblCustomers tr').each(function(row, tr)
			            {       			     
			            	if($(this).find('input').is(':checked')) 
				       		{  
				       			if(parseInt($(tr).find('td:eq(0)').text()) > 0)
				       			{
					       			TableData[i] = 
							        {    
							        	"stu_slno" : $(tr).find('td:eq(0)').text(),    
							        	"code" : randomPassword(8),
							        	"survey_id" : 1,
						                "name" : $(tr).find('td:eq(1)').text(),
						                "class" : $(tr).find('td:eq(2)').text(),
						                "section" : $(tr).find('td:eq(3)').text(),
						                "mobile" : $(tr).find('td:eq(4)').text()						                
							        }
							        i = i + 1;
							    }
					    	}					    	
				    	});				    	
				    	var jsonString = TableData;
				    	$.ajax({
				         	type:"POST",
				         	url:"insert_students.php",
				         	data:{data:TableData},
				         	success:function(response)
				         	{	
				         		alert("Saved Successfully");
				         		//window.location.href = 'share_survey.php';
				         	}
				         });
				    });	
});
</script>	
</head>

<body>
<ul style="list-style-type: none;">	
	<label>Select Class</label> <select name = "class" id = "class">
		<option>5</option> <option>6</option> <option>7</option> <option>8</option> <option>9</option> <option>10</option>
	</select>
	<label>Select Section</label> <select name = "section" id = "section">
		<option>1</option> <option>2</option> <option>3</option> 
	</select>
	<label>Share Via</label> <select name = "share">
		<option>SMS</option> <option>E-Mail</option> 
	</select><br/>
	<input type="button" name="apply" value="Apply" id = "apply">
</ul>


<div id = "fortab">
	<div id = "div1">
		
	</div>
</div>	


</body>
</html>
