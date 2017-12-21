<!DOCTYPE html>
<html>
	<head>
		<?php include_once 'db_config.php'; ?>
		<title>ChartJS - BarGraph</title>
		<style type="text/css">
			#chart-container {
				width: 640px;
				height: auto;
			}
		</style>
	</head>
	<body>
		
		<div>
		<label for="Question" >Question</label>
                    <select id="question" name = "question">        
                    <option selected="true" disabled="true">Select Question</option>            
                    <?php 
					$sql = mysqli_query($conn, "SELECT * FROM questions_mt");
					while ($row = $sql->fetch_assoc())
						{
							echo "<option value=".$row['PK_QUESTION_ID'].">" .$row['C_QUESTION_TEXT'] . "</option>";
						}?>
                    </select>
		</div>
		<div id="chart-container">
			<canvas id="mycanvas"></canvas>
		</div>

		<!-- javascript -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
		<script type="text/javascript" src="app.js"></script>
		
	</body>
</html>