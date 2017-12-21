<?php
	include_once 'db_config.php';
    $sel_q_id = $_POST['sel_question_id'];
   
    $qry =
            "select a.opt_text option_text,IFNULL(b.resp_count,0) resp_count from 
            (select
             survey.fk_question_id question_id,
             opt.pk_option_id opt_id,
             opt.c_option_text opt_text
             from option_to_group_mapping_t ogm,
             options_mt opt,
             survey_questions_t survey,
             questions_mt question
             where survey.fk_question_id = question.pk_question_id
             and  opt.pk_option_id = ogm.fk_option_id
             and  ogm.fk_option_group_id = survey.fk_option_group_id) a left join
            (select fk_question_id resp_question,fk_option_id resp_option,
             count(distinct pk_survey_response_id) resp_count from survey_responses_t group by fk_question_id,fk_option_id) b
             on a.question_id = b.resp_question and b.resp_option = a.opt_id 
             where  a.question_id =" .$sel_q_id;
    $result = $conn->query($qry);           
    $data = Array();
    if (!$result) 
    {
        print_r (var_dump($result));
    }
    else
    {
        while($row = $result->fetch_assoc()) 
        {
            $data[] = $row;            
        }
        $result -> close();
        print_r (json_encode($data));
    }
?>