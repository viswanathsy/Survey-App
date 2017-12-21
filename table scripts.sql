create table code_mapping(
id integer,
code varchar(100),
survey_id integer,
resp_status integer default 0,
created_on date);

insert into code_mapping values(1,'123',1,0,now());
insert into code_mapping values(2,'123',1,0,now());

CREATE TABLE `survey_mt` (
  `PK_SURVEY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_SURVEY_NAME` varchar(50) DEFAULT NULL,
  `C_SURVEY_DESCRIPTION` varchar(100) DEFAULT NULL,
  `D_START_DATE` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `D_END_DATE` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `I_NUMBER_OF_QUESTIONS` int(11) DEFAULT NULL,
  `FK_FREQUENCY` int(11) DEFAULT NULL,
  `D_CREATED_ON` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `FK_CREATED_BY` int(11) DEFAULT NULL,
  `D_UPDATED_ON` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `FK_UPDATED_BY` int(11) DEFAULT NULL,
  `FK_STATUS_ID` int(11) DEFAULT NULL,
  `FK_SURVEY_CATEGORY` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_SURVEY_ID`)
);

insert into survey_mt values(1,'Test Survey',null,now(),now()+100,null,null,null,null,null,null,1,1);

CREATE TABLE `questions_mt` (
  `PK_QUESTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_QUESTION_TEXT` varchar(1000) DEFAULT NULL,
  `FK_QUESTION_SUB_TYPE` int(11) DEFAULT NULL,
  `D_CREATED_ON` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `FK_CREATED_BY` int(11) DEFAULT NULL,
  `D_UPDATED_ON` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `FK_UPDATED_BY` int(11) DEFAULT NULL,
  `FK_STATUS_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_QUESTION_ID`)
);
INSERT INTO `questions_mt` VALUES (1,'The hospital has modern equipment.',4,'2017-04-12 12:21:24.000000',1,'2017-04-12 12:21:24.312051',NULL,1)	

CREATE TABLE `options_mt` (
  `PK_OPTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_OPTION_TEXT` varchar(100) DEFAULT NULL,
  `D_CREATED_ON` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `FK_CREATED_BY` int(11) DEFAULT NULL,
  `D_UPDATED_ON` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `FK_UPDATED_BY` int(11) DEFAULT NULL,
  `FK_STATUS_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_OPTION_ID`)
);
INSERT INTO `options_mt` VALUES (1,'Strongly Disagree','2017-04-12 12:22:12.000000',1,'2017-04-12 12:22:12.098901',NULL,1),
(2,'Disagree','2017-04-12 12:22:12.000000',1,'2017-04-12 12:22:12.189966',NULL,1),
(3,'Neutral','2017-04-12 12:22:12.000000',1,'2017-04-12 12:22:12.247007',NULL,1),
(4,'Agree','2017-04-12 12:22:12.000000',1,'2017-04-12 12:22:12.333067',NULL,1),
(5,'Strongly Agree','2017-04-12 12:22:12.000000',1,'2017-04-12 12:22:12.379100',NULL,1);

CREATE TABLE `option_groups_mt` (
  `PK_OPTION_GROUP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_OPTION_GROUP_NAME` varchar(100) DEFAULT NULL,
  `D_CREATED_ON` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `FK_CREATED_BY` int(11) DEFAULT NULL,
  `D_UPDATED_ON` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `FK_UPDATED_BY` int(11) DEFAULT NULL,
  `FK_STATUS_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_OPTION_GROUP_ID`)
);
INSERT INTO `option_groups_mt` VALUES (4,'Agreement','2017-04-12 12:22:29.000000',1,'2017-04-12 12:22:29.522302',NULL,1);

CREATE TABLE `option_to_group_mapping_t` (
  `PK_OPT_TO_GRP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_OPTION_ID` int(11) DEFAULT NULL,
  `FK_OPTION_GROUP_ID` int(11) DEFAULT NULL,
  `D_CREATED_ON` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `FK_CREATED_BY` int(11) DEFAULT NULL,
  `D_UPDATED_ON` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `FK_UPDATED_BY` int(11) DEFAULT NULL,
  `FK_STATUS_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_OPT_TO_GRP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
INSERT INTO `option_to_group_mapping_t` VALUES (1,1,4,'2017-04-12 12:22:56.000000',1,'2017-04-12 12:22:56.940911',NULL,1),
(2,2,4,'2017-04-12 12:22:57.000000',1,'2017-04-12 12:22:57.053991',NULL,1),
(3,3,4,'2017-04-12 12:22:57.000000',1,'2017-04-12 12:22:57.097021',NULL,1),
(4,4,4,'2017-04-12 12:22:57.000000',1,'2017-04-12 12:22:57.173089',NULL,1),
(5,5,4,'2017-04-12 12:22:57.000000',1,'2017-04-12 12:22:57.221110',NULL,1);


CREATE TABLE `survey_questions_t` (
  `PK_SURVEY_QUESTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FK_SURVEY_ID` int(11) DEFAULT NULL,
  `FK_QUESTION_ID` int(11) DEFAULT NULL,
  `FK_OPTION_GROUP_ID` int(11) DEFAULT NULL,
  `D_CREATED_ON` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `FK_CREATED_BY` int(11) DEFAULT NULL,
  `D_UPDATED_ON` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `FK_UPDATED_BY` int(11) DEFAULT NULL,
  `FK_STATUS_ID` int(11) DEFAULT NULL,
  `fk_question_sub_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`PK_SURVEY_QUESTION_ID`)
) ;
INSERT INTO `survey_questions_t` VALUES (1,1,1,4,'2017-04-19 10:15:10.202984',1,'2017-04-12 12:23:47.211431',NULL,1,2),