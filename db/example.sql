# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(255) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `username`, `wachtwoord`) VALUES (1,'Johan','Janssen','johan','$2y$10$hrlNZT8SyuobJZVzNoCI4u4IUqkY6ZrlENIUqldlpwGfrxTyAMIWy');
