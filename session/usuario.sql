CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nivel` varchar(10) NOT NULL DEFAULT 'visitante',
  PRIMARY KEY (`id`),
  KEY `nivel` (`nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
