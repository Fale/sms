SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `receiver` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `time` datetime NOT NULL,
  `message` varchar(3072) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

INSERT INTO `sms` (`id`, `sender`, `receiver`, `time`, `message`) VALUES