

CREATE TABLE IF NOT EXISTS `act` (
  `date` varchar(500) NOT NULL,
  `filelink` varchar(500) NOT NULL,
  `filename` varchar(500) NOT NULL,
  `newfilename` varchar(500) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

