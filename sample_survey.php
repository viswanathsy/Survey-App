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
<ul style="list-style-type: none;">	
<?php
	$str = implode(",", $_GET);
	$sql1 = "select survey_id,resp_status from code_mapping where code ='".$str."';";
	$result1 = $conn->query($sql1);
	$sur_id = 10;
	$resp_status = 0;
	while($row1 = $result1->fetch_assoc())
			{
				$sur_id = $row1["survey_id"];
				$resp_status = $row1["resp_status"];
			}
			//echo "<br/";
			//echo "<br/";
			if ($resp_status == 0)
			{
				$sql = "select * from QUESTIONS_MT where fk_status_id = 1 and pk_question_id in (select fk_question_id from survey_questions_t where fk_status_id = 1 and fk_survey_id =".$sur_id.");";
				//echo $sql;
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
			}
			else if($resp_status == 1)
				echo "You have submitted the Survey already";
			
?>
</ul>

</div>
</body>
</html>
