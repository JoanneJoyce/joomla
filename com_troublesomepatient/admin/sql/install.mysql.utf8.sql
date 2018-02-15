DROP TABLE IF EXISTS `#__problem_patient`;

CREATE TABLE `#__problem_patient` (
  `pid`           int unsigned NOT NULL auto_increment,
  `pname`         varchar(60) NOT NULL,
  `furigana`      varchar(60) NOT NULL,
  `bday`	      int(10) unsigned NOT NULL,
  `sex`           tinyint(1) unsigned NOT NULL default '0',
  `occur_date`    int(10) unsigned NOT NULL,
  `contents`      text NOT NULL,
  `event_level`   tinyint(1) unsigned NOT NULL default '0',
  `regist_date`   int(10) unsigned NOT NULL,
  `update_date`   int(10) unsigned NOT NULL,
  PRIMARY KEY  (`pid`)
) 
    ENGINE =MyISAM
    AUTO_INCREMENT =0
    DEFAULT CHARSET =utf8;

INSERT INTO `#__problem_patient` (`pname`, `furigana`, `bday`, `sex`, `occur_date`, `contents`, `event_level`, `regist_date`, `update_date`) VALUES
('Joanne Joyce', 'なると', 359910000, 0, 1122735600, 'Swearing at Nurse', 1, 1511481600, NOW()),
('Fred Smith', 'ふれど', 359910000, 0, 1122735600, 'Swearing at Nurse', 1, 1511481600, NOW()),
('Sam Smith', 'かかし', 214761600,	0,	1121011200,	'Swearing at Doctor',	0,	1511481600,	NOW()),
('Erica Cochran',	'さくら',	86976000,	1,	1428940800,	'Punch Doctor',	0,	1511481600,	1511481600),
('Allen Loy',	'しかまる',	23212800,	0,	1121356800,	'Slap Doctor',	1,	1511481600,	1511481600),
('Effie Artis',	'いの',	434649600,	1,	1425484800,	'Kick Doctor',	1,	1511481600,	1511481600),
('Anthony Jacques',	'きば',	285436800,	0,	1427212800,	'Topple medicine cabinet',	1,	1511481600,	1511481600),
('Julie Lewis',	'さらだ',	535132800,	1,	1426348800,	'Destroy Television',	1,	1511481600,	1511481600),
('Lara Croft',	'ららくろふと',	579798000,	1,	1513263600,	'Slapped Nurse',	0,	1513302892,	1513302892),
('Samwell Tarly',	'さむうぇるたりー',	345654000,	0,	1513263600, 'Hit nurse',	1,	1513305825,	1513305825),
('Tony Stark',	'とにーすたーく',	1177200,	0,	1513263600,	'The quick brown fox jumps over the lazy white dog. 1234567890　０１２３４５６７８９・ヲァィゥェォャュョッーアイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワンヴガギグゲゴザジズゼゾダヂヅデドバビブベボパピプペポとにーすたーく',	0,	1513307340,	1513307340),
('Lyanna Stark',	'りあんな・すたーく',	250959600,	1,	1513263600,	'Swear at doctor',	0,	1513307871,	1513307871),
('Fred Smith',	'さすけ',	501346800,	0,	988556400,	'Punch Nurse',	1,	1511481600,	1513316864);

