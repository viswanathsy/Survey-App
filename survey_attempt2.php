<form action= "survey_attempt.php" method="POST">
	<ul style="list-style-type: none;">
		<?php
			$sql = 'select * from QUESTIONS_MT';
			$result = $conn->query($sql);			
					$var=0;
					$num_qts=0;
					while($row = $result->fetch_assoc()) 
					{
						
						echo "<li class='question'>".$row["PK_QUESTION_ID"].") ".$row["C_QUESTION_TEXT"]."</li>";
							$sql12="select
									 opt.pk_option_id opt_id,survey.fk_
								 	 opt.c_option_text opt_text
								from option_to_group_mapping_t ogm,
									 options_mt opt,
							question_sub_type_id subtype survey_questions_t survey,
								 	 questions_mt question
								where 
									 survey.fk_question_id = question.pk_question_id
								and  opt.pk_option_id = ogm.fk_option_id
								and  ogm.fk_option_group_id = survey.fk_option_group_id
								and  survey.fk_question_id =".$row["PK_QUESTION_ID"];
							$result2 =$conn->query($sql12);
							while($row2 = $result2->fetch_assoc()) 
									{
										if($row2['subtype'] ==2)
										{
										echo "<input class='radio_input' type=\"radio\" name=answergroup[".$row["PK_QUESTION_ID"].
										"] value=".$row2["opt_id"].">".$row2["opt_text"]."</input>";
										}
									}
							echo("<br/>");
						$num_qts++ ;						
					}
		?>
	</ul>
	<button name ="save">login</button>  
</form>