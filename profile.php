<?php
include_once('sessions.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#create {width:auto;margin:auto;position:relative;float:right}
</style>
</head>
<body>
	<?php 
	       if (isset($_POST['create'])) 
		    {
				header("location: create_survey.php");
		    }
	?>
	<form method="POST" action="profile.php">
		<div id="profile">
			<table border="strong 1px">
			<caption style="font-size:140%;padding:5px;">Existing data
	                <input id = 'create' name="create" type="submit" value=" Create ">
	                </caption>
				<tr>
					<th style="display: none;">Teacher Name</th>	
					<th>Title</th>	
					<th>Start Date</th>	
					<th>End Date</th>	
					<th colspan = 2>Actions</th>	
				</tr>
			<?php
						$sql = "select *  from phpdsp_surveys";
						$result = mysqli_query($connection,$sql);								
						while($row = mysqli_fetch_assoc($result)) 
							{
			     		   		echo "<tr>";
				           			echo "<td id = \"first\"align='center'>".$row["title"]."</td>";
							        echo "<td id = \"second\"contenteditable=\"true\" width='200'>".$row["start_date"]."</td>";
							        echo "<td width='200'>".$row["end_date"]."</td>";
				     	            echo "<td name=\"edit\" value=\"Edit\" id = \"edit\">Edit</td>";
				            		echo "<td>Delete</td>";
							    echo "</tr>";
			    			}		
					?>
			</table>
			<b id="logout"><a href="logout.php">Log Out</a></b>
		</div>
	</form>	
</body>
</html>