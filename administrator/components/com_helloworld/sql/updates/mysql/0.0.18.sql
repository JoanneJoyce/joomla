CREATE TABLE `#__problem_patient` (
  `pid` 	 	int unsigned NOT NULL auto_increment,
  `pname` 	 	varchar(60) NOT NULL,
  `furigana` 	varchar(60) NOT NULL,
  `bday`	 	int(10) unsigned NOT NULL,
  `sex` 	 	tinyint(1) unsigned NOT NULL default '0',
  `occur_date`  int(10) unsigned NOT NULL,
  `contents` 	text NOT NULL,
  `event_level` tinyint(1) unsigned NOT NULL default '0',
  `regist_date` int(10) unsigned NOT NULL,
  `update_date` int(10) unsigned NOT NULL,
  PRIMARY KEY  (pid)
) ENGINE=MyISAM
 AUTO_INCREMENT =0
 DEFAULT CHARSET =utf8;