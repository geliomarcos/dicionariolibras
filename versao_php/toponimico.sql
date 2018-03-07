# Host: localhost  (Version 5.5.5-10.1.28-MariaDB)
# Date: 2018-02-28 20:55:37
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "municipios"
#

DROP TABLE IF EXISTS `municipios`;
CREATE TABLE `municipios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `area_territorial` int(11) DEFAULT NULL,
  `populacao` int(11) DEFAULT NULL,
  `localizacao` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL COMMENT 'campo "created" refere-se a data e hora que o usuario criou o registro',
  `criado_usuario` varchar(50) DEFAULT NULL COMMENT 'campo "criado_usuario" refere ao nome do usuario que criou o registro',
  `modified` datetime DEFAULT NULL COMMENT 'campo "modified" refere-se a data e hora que o usuario modificou o registro',
  `modificado_usuario` varchar(50) DEFAULT NULL COMMENT 'campo "modificado_usuario" refere-se ao nome do usuario que modificou o registro',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "municipios"
#

INSERT INTO `municipios` VALUES (1,'Xapuri','AC',10000,26789,'Regional Alto Acre',NULL,NULL,'2018-02-27 15:24:48','admin'),(2,'Sena Madureira','AC',11232512,12321321,'alto acre','2018-02-27 15:54:11','admin','2018-02-27 15:54:11',NULL),(3,'AcrelÃ¢ndia','AC',157455,NULL,'Vale do Acre','2018-02-28 17:34:39','admin','2018-02-28 17:34:39',NULL),(4,'Assis Brasil','AC',2875915,NULL,'Vale do Acre','2018-02-28 17:35:28','admin','2018-02-28 17:35:28',NULL),(5,'Brasileia','AC',4336189,NULL,'Vale do Acre','2018-02-28 17:37:43','admin','2018-02-28 17:38:05','admin'),(6,'Bujari','',3467681,NULL,'Vale do Acre','2018-02-28 17:38:52','admin','2018-02-28 17:38:52',NULL),(7,'Capixaba','AC',1713412,NULL,'Vale do Acre','2018-02-28 17:39:56','admin','2018-02-28 17:39:56',NULL),(8,'Cruzeiro do Sul','AC',7924943,NULL,'Vale do JuruÃ¡','2018-02-28 17:41:42','admin','2018-02-28 17:41:42',NULL),(9,'EpitaciolÃ¢ndia','AC',1659131,NULL,'Vale do Acre','2018-02-28 17:53:08','admin','2018-02-28 17:53:08',NULL),(10,'FeijÃ³','AC',27975427,NULL,'Vale do JuruÃ¡','2018-02-28 17:55:06','admin','2018-02-28 17:55:06',NULL),(11,'JordÃ£o','AC',5428765,NULL,'Vale do JuruÃ¡','2018-02-28 17:55:40','admin','2018-02-28 17:55:40',NULL);

#
# Structure for table "toponimicos"
#

DROP TABLE IF EXISTS `toponimicos`;
CREATE TABLE `toponimicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etimologia` longtext,
  `taxionomia` longtext,
  `entrada_lexical` longtext,
  `estrutura_morfologica` longtext,
  `historico` longtext,
  `informacao` longtext,
  `pesquisadora` varchar(200) DEFAULT NULL,
  `revisora` varchar(200) DEFAULT NULL,
  `fontes` longtext,
  `data_coleta` varchar(200) DEFAULT NULL,
  `municipios_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL COMMENT 'campo "created" refere-se a data e hora que o usuario criou o registro',
  `criado_usuario` varchar(50) DEFAULT NULL COMMENT 'campo "criado_usuario" refere ao nome do usuario que criou o registro',
  `modified` datetime DEFAULT NULL COMMENT 'campo "modified" refere-se a data e hora que o usuario modificou o registro',
  `modificado_usuario` varchar(50) DEFAULT NULL COMMENT 'campo "modificado_usuario" refere-se ao nome do usuario que modificou o registro',
  PRIMARY KEY (`id`),
  KEY `fk_municipio_toponomicos` (`municipios_id`),
  CONSTRAINT `fk_municipio_toponomicos` FOREIGN KEY (`municipios_id`) REFERENCES `municipios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "toponimicos"
#

INSERT INTO `toponimicos` VALUES (2,'Teste','teste','teste','teste','teste','teste','teste','teste','teste','novembro de 2017',1,NULL,NULL,NULL,NULL),(3,'Teste','teste3','teste','teste','teste','teste','teste','teste','teste','novembro de 2017',1,NULL,NULL,NULL,NULL),(4,'Xapuri derivado do vocÃ¡bulo indÃ­gena â€œChapuryâ€ que significa â€œrio antesâ€\r\nmotivado pela caracterÃ­stica geogrÃ¡fica de encontro de confluÃªncia entre o rio â€œchapuryâ€ e o rio\r\nâ€œAcreâ€. Segundo Ranzi (2008), significa tribo dos Xapurys.','EtnotopÃ´nimo','Xapuri','No caso do vocÃ¡bulo â€œChapuryâ€, Dick (1999) destaca que o /y/ designa\r\no termo genÃ©rico â€œrioâ€. Na lÃ­ngua indÃ­gena a posiÃ§Ã£o do termo genÃ©rico implica em modificaÃ§Ã£o\r\nna significaÃ§Ã£o, no caso em pauta, o genÃ©rico situa-se no final do sintagma toponÃ­mico que\r\nfunciona para designar caracterÃ­stica acidental do objeto. Desta forma, aplicando numa\r\nperspectiva de estudo linguÃ­stico brasileiro sob o vocÃ¡bulo indÃ­gena â€œchapuryâ€ Ã© classificado\r\ncomo topÃ´nimo especÃ­fico simples. No caso do vocÃ¡bulo aportuguesado Xapuri, classificamo-lo\r\ncomo topÃ´nimo especÃ­fico hÃ­brido, visto que hÃ¡ a funÃ§Ã£o de elementos linguÃ­sticos de\r\nprocedÃªncia portuguesa e indÃ­gena.','Xapuri, o municÃ­pio, Ã© â€œ[..] localizado Ã  margem do Rio Acre, em frente Ã \r\nconfluÃªncia com o Rio Xapuri, tem seu nome originado de uma tribo dos seus primitivos\r\nhabitantes os â€œXapuriâ€ (RANZI, 2008, p. 250).','A cidade foi criada em um ponto estratÃ©gico de confluÃªncia dos\r\nrios que serviam de estradas para escoamento da produÃ§Ã£o de borracha. A â€œcidadeâ€ teve sua\r\ndenominaÃ§Ã£o modificada para Mariscal Sulcre pelos bolivianos, na ocasiÃ£o da RevoluÃ§Ã£o\r\nacreana.','Sandra Mara Souza de Oliveira Silva','Alexandre Melo de Sousa','Dick (1999), Ranzi ( 2008), Site do IBGE, Mapa digital do IBGE.','02 de julho de 2016.',2,'2018-02-27 17:49:16','admin','2018-02-27 17:51:23','admin');

#
# Structure for table "uploads"
#

DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_arquivo` varchar(255) DEFAULT NULL,
  `toponomicos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_uploads_toponomicos` (`toponomicos_id`),
  CONSTRAINT `fk_uploads_toponomicos` FOREIGN KEY (`toponomicos_id`) REFERENCES `toponomicos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "uploads"
#


#
# Structure for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'campo "id" refere-se a chave primaria da tabela "usuarios"',
  `nome` varchar(100) NOT NULL COMMENT 'campo "nome" refere-se ao nome do usuario',
  `username` varchar(50) NOT NULL COMMENT 'campo "username" refere-se ao login do usuario',
  `senha` varchar(50) NOT NULL COMMENT 'campo "senha" refere-se a senha do usuario',
  `perfil` varchar(20) NOT NULL DEFAULT '' COMMENT 'campo \\"perfil\\" refere-se ao perfil do usuario (\\"admin\\" - administrador \\"user\\" - usuario comum)',
  `email` varchar(50) NOT NULL COMMENT 'campo "email" refere-se ao email do usuario',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'campo \\"status\\" refere-se ao status do usuario (0 - inativo 1 - ativo).  Por padrão será setado o valor \\"1\\"',
  `created` datetime DEFAULT NULL COMMENT 'campo "created" refere-se a data e hora que o usuario criou o registro',
  `criado_usuario` varchar(50) DEFAULT NULL COMMENT 'campo "criado_usuario" refere ao nome do usuario que criou o registro',
  `modified` datetime DEFAULT NULL COMMENT 'campo "modified" refere-se a data e hora que o usuario modificou o registro',
  `modificado_usuario` varchar(50) DEFAULT NULL COMMENT 'campo "modificado_usuario" refere-se ao nome do usuario que modificou o registro',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (1,'Teste','admin','47a49dc12fc96000dc069aa74877f9e2a16f44b6','admin','admin@gmail.com',1,NULL,NULL,NULL,''),(4,'gelio marcos vital','gelio.marcos','d2c4bf5c667335962cee3825f0aa8c5009fd3867','user','gelio.souza@uninorteac.com.br',1,'2018-02-27 15:48:29','admin','2018-02-27 15:48:29',NULL);
