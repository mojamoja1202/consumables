
CREATE TABLE `consumables_add` (
  `add_sn` int(10) UNSIGNED NOT NULL  AUTO_INCREMENT COMMENT '增購索引',
  `add_item` varchar(64) NOT NULL COMMENT '增購消耗品項目',
  `add_number` int(10) UNSIGNED NOT NULL COMMENT '增購消耗品數量',
  `add_postTime` datetime NOT NULL COMMENT '增購消耗品時間',
  PRIMARY KEY (`add_sn`)
) ENGINE=MyISAM;


CREATE TABLE `consumables_get` (
  `get_sn` int(10) UNSIGNED NOT NULL  AUTO_INCREMENT COMMENT '領取索引',
  `get_item` varchar(255) NOT NULL COMMENT '領取消耗品名稱',
  `get_teacher` varchar(255) NOT NULL COMMENT '領取消耗品教師',
  `get_number` int(10) UNSIGNED NOT NULL COMMENT '領取消耗品數量',
  `get_postTime` datetime NOT NULL COMMENT '領取消耗品時間',
  PRIMARY KEY (`get_sn`)
) ENGINE=MyISAM;



CREATE TABLE `consumables_teacher` (
  `teacher_sn` int(11) NOT NULL  AUTO_INCREMENT COMMENT '教師名稱索引',
  `teacher_name` varchar(255) NOT NULL COMMENT '教師名稱',
  `teacher_postTime` datetime NOT NULL COMMENT '最後修改時間',
  PRIMARY KEY (`teacher_sn`)
) ENGINE=MyISAM;



CREATE TABLE `consumables_item` (
  `item_sn` int(10) UNSIGNED NOT NULL  AUTO_INCREMENT COMMENT '消耗品索引',
  `item_name` varchar(255) NOT NULL COMMENT '消耗品名稱',
  `item_number` int(10) UNSIGNED NOT NULL COMMENT '消耗品數量',
  `item_postTime` datetime NOT NULL COMMENT '最後修改時間',
  PRIMARY KEY (`item_sn`)
) ENGINE=MyISAM;
