select
	 survey.fk_question_id q_id,
	 question.c_question_text q_text,
	 question.fk_question_sub_type q_sub_type,
	 survey.fk_option_group_id opt_grp,
	 opt.pk_option_id opt_id,
	 opt.c_option_text opt_text

from option_to_group_mapping_t ogm,
	 options_mt opt,
	 survey_question_t survey,
	 question_mt question
where survey.survey_ud = 1
and
	 survey.fk_question_id = question.pk_question_id
and  option.pk_option_id = ogm.fk_option_id
and  ogm.fk_option_group_id = survey.fk_option_group_id;	
