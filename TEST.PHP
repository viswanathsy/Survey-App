<?php
include_once('sessions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 	
					$sql = "SELECT * FROM M_QUESTION_TYPES";
					$result = mysqli_query($connection, $sql);
					while ($row = mysqli_fetch_assoc($result))
						{
							echo $row['QUESTION_TYPE_NAME'];
						}
						?>


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
</html>