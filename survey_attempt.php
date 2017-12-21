<!DOCTYPE html>
<?php
	include_once 'db_config.php';
?>
<html>
<head>
	<title>Attempt Survey</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	</script>
</head>

<body>
<div id = "survey_div">
<form action= "survey_attempt.php" method="POST">
	<ul style="list-style-type: none;">
		<?php
			$sql = 'select * from QUESTIONS_MT where fk_status_id = 1;';
			$result = $conn->query($sql);
					$var=0;
					$num_qts=0;
					while($row = $result->fetch_assoc())
					{

						echo "<li class='question'>".$row["PK_QUESTION_ID"].") ".$row["C_QUESTION_TEXT"]."</li>";
							$sql12="select
									 opt.pk_option_id opt_id,
								 	 opt.c_option_text opt_text,
								 	 survey.fk_question_sub_type_id subtype
								from option_to_group_mapping_t ogm,
									 options_mt opt,
								 	 survey_questions_t survey,
								 	 questions_mt question
								where
									 survey.fk_question_id = question.pk_question_id
								and  opt.pk_option_id = ogm.fk_option_id
								and  ogm.fk_option_group_id = survey.fk_option_group_id
								and  survey.fk_question_id =".$row["PK_QUESTION_ID"];
							$result2 =$conn->query($sql12);
							while($row2 = $result2->fetch_assoc())
									{
										if($row2["subtype"] ==4)
										{
										echo "<input id = \"radio\" class='radio_input' type=\"radio\" name=answergroup[".$row["PK_QUESTION_ID"].
										"][] value=".$row2["opt_id"].">".$row2["opt_text"]."</input></br>";
										}
										else if($row2["subtype"] ==2)
										{
										echo "<input id = \"checkbox\" class='checkbox_input' type=\"checkbox\" name=answergroup[".$row["PK_QUESTION_ID"].
										"][] value=".$row2["opt_id"].">".$row2["opt_text"]."</input></br>";
										}
									}
							echo("<br/>");
						$num_qts++ ;
					}
		?>
	</ul>
	<button style="align="centre" name ="save">Save</button>
</form>

<?php
	if(isset($_POST['save']))
		{
			$x = count($_POST['answergroup']);
			$days =[];
			echo '<script>console.log(\'selected count is \')</script>';
			echo '<script>console.log('.$x.')</script>';
			echo '<script>console.log(\'selected count ends \')</script>';
			for ($i=1; $i<=$num_qts; $i++)
				{
					if (isset($_POST['answergroup'][$i])) 
					{	
						$aDoor = $_POST['answergroup'][$i];
						echo '<script>console.log(\' door is \')</script>';
						echo '<script>console.log('.$aDoor[$i].')</script>';
						echo '<script>console.log(\'door ends \')</script>';
						$N = count($aDoor);
						echo '<script>console.log(\' N is \')</script>';
						echo '<script>console.log('.$aDoor.')</script>';
						echo '<script>console.log(\'n ends \')</script>';
						for($j=0; $j < $N; $j++)
					    {
					      echo($aDoor[$j] . " ");
					      echo '<script>console.log('.$aDoor[$j].')</script>';
					      $days[] .= ' ' . $aDoor[$j];
					      echo '<script>console.log('.$days[$j].')</script>';
					    }				    	
						echo implode(" ",$days);
					    echo '<script>console.log(\'days is\')</script>';
					    $rstr = implode(" ",$days);
					    echo '<script>console.log('.$rstr.')</script>';
						//if(sizeof($_POST['answergroup'][$i]) > 1)
							$ins = "insert into survey_responses_t
							(FK_SURVEY_ID,
							FK_QUESTION_ID,
							FK_OPTION_ID,
							C_RESPONSE_TEXT,
							FK_USER_ID,
							D_RESPONSE_DATE,
							FK_STATUS_ID,
							FK_RESPONSE_MODE_ID) values ("
							."1,"
							.$i.","
							.$i.","
							."'".implode(",", $days)."'"
							.",1,sysdate(),1,1)";
							echo $ins;
							$sql = mysqli_query($conn,$ins);						
					}
					/*else
					{
						$checked = $_POST['answergroup'][$i];
						$size = count($checked);
						$countsss = $_POST['answergroup'][$i];
						echo '<script>console.log(\'radio\')</script>';
						echo '<script>console.log('.$countsss.')</script>';
						echo '<script>console.log('.$checked.')</script>';
						$ins = "insert into survey_responses_t
						(FK_SURVEY_ID,
						FK_QUESTION_ID,
						FK_OPTION_ID,
						C_RESPONSE_TEXT,
						FK_USER_ID,
						D_RESPONSE_DATE,
						FK_STATUS_ID,
						FK_RESPONSE_MODE_ID) values ("
						."1,"
						.$i.","
						.$_POST['answergroup'][$i].","
						."null,1,sysdate(),1,1)";
						debugger;
						$sql = mysqli_query($conn,$ins);
					}*/
				}			
		}
?>
</div>
</body>
</html>
