-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.50-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema emlpleo
--

CREATE DATABASE IF NOT EXISTS emlpleo;
USE emlpleo;

--
-- Definition of table `oficinas`
--

DROP TABLE IF EXISTS `oficinas`;
CREATE TABLE `oficinas` (
  `nombre` varchar(100) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `cod_postal` int(11) NOT NULL,
  `localidad` varchar(45) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(115) NOT NULL,
  `posicion` varchar(45) NOT NULL,
  `enlace` varchar(1000) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oficinas`
--

/*!40000 ALTER TABLE `oficinas` DISABLE KEYS */;
INSERT INTO `oficinas` (`nombre`,`calle`,`cod_postal`,`localidad`,`telefono`,`email`,`posicion`,`enlace`) VALUES 
 ('Oficina de Empleo de Béjar','Carretera de Salamanca-Cáceres, nº 11',37700,'Béjar','923 402 479','ecylbejar@jcyl.es','40.384525#-5.7595205#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233548196/DirectorioPadre'),
 ('Oficina de Empleo de Ciudad Rodrigo','Pza. Herrasti, 1',37500,'Ciudad Rodrigo','923 460 545','ecylciudadrodrigo@jcyl.es','40.59962#-6.535766#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233548221/DirectorioPadre'),
 ('Oficina de Empleo de Guijuelo','C/ Nueva de la Iglesia, 2',37770,'Guijuelo','923 580 028','ecylguijuelo@jcyl.es','40.55547#-5.673217#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233548121/DirectorioPadre'),
 ('Oficina de Empleo de Peñaranda de Bracamonte','C/ San José, 2',37300,'Peñaranda de Bracamonte','923 540 890','ecylpenaranda@jcyl.es','40.898613#-5.2004566#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233548146/DirectorioPadre'),
 ('Oficina de Empleo de Vitigudino','C/ El Parque, 11',37210,'Vitigudino','923 500 774','ecylvitigudino@jcyl.es','41.005077#-6.4368377#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233548171/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Aguilar de Campoo','Paseo el Soto, 1',34800,'Aguilar de Campoo','979 122 176','ecylaguilar@jcyl.es','42.791#-4.2589045#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233537528/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Almazán','Ronda San Francisco, 24-Bajo',42200,'Almazán','975 318 082','ecylalmazan@jcyl.es','41.486923#-2.5281758#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233561917/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Aranda de Duero','Plaza San Esteban, 10',9400,'Aranda de Duero','947 503 818','ecylaranda@jcyl.es','41.667430056686534#-3.6879730224609375#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233515965/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Arenas de San Pedro','Calle José Gochicoa, s/n',5400,'Arenas de San Pedro','920 370 071','ecylarenas@jcyl.es','40.211304#-5.0860057#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233503980/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Arévalo','C/ Santa Catalina, 2',5200,'Arévalo','920 300 098','ecylarevalo@jcyl.es','41.062236#-4.719014#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233504006/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Astorga','C/ Juego de Cañas, 5',24700,'Astorga','987 616 102','ecylastorga@jcyl.es','42.455875#-6.058817#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529238/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Ávila','Pza. de la Virreina María Dávila, 2',5001,'Ávila','920 226 178','ecylavila@jcyl.es','40.654617#-4.687988#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233503954/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Bembibre','Paseo del Profesor Veremundo Núñez, 15 - bajo',24300,'Bembibre','987 511 461','ecylbembibre@jcyl.es','42.618164#-6.420106#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529290/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Benavente','Avda. de León, 14',49600,'Benavente','980 631 689','ecylbenavente@jcyl.es','42.0041#-5.673113#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233583038/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Briviesca','C/ Joaquín Costa, 21',9240,'Briviesca','947 590 022','ecylbriviesca@jcyl.es','42.55192#-3.3222756#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233516001/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Burgo de Osma','C/ Juan Carlos I, 6',42300,'Burgo de Osma-Ciudad de Osma','975 340 302','ecylburgosma@jcyl.es','41.587765#-3.0678911#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233561942/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Burgos I - Capiscol Gamonal','C/ Real, 7',9007,'Burgos','947 225 281','ecylcapiscol@jcyl.es','42.34679#-3.6680853#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233515886/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Burgos II - Calzadas','C/ Calzadas, 34-36',9004,'Burgos','947 278 454','ecylcalzadas@jcyl.es','42.345028#-3.6875799#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233515912/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Burgos III - Infantas','C/ Las Infantas, 10',9001,'Burgos','947 264 462','ecylinfantas@jcyl.es','42.337246#-3.7244425#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233515939/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Carrión de los Condes','C/ Piña Blasco, 33',34120,'Carrión de los Condes','979 880 298','ecylcarrion@jcyl.es','42.33937#-4.6058764#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233537555/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Cistierna','Pza. del Ayuntamiento, 1 - bajo',24800,'Cistierna','987 701 387','ecylcistierna@jcyl.es','42.762424#-5.138229#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529316/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Cuéllar','C/ Magdalena, 2',40200,'Cuéllar','921 140 658','ecylcuellar@jcyl.es','41.402178#-4.314313#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1171390329368/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de El Tiemblo','Pza. de la Villa 27- 28',5270,'Tiemblo (El)','918 625 260','ecyltiemblo@jcyl.es','40.412598#-4.501443#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233504058/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Fabero','Pza. del Ayuntamiento, 4',24420,'Fabero','987 550 669','ecylfabero@jcyl.es','42.765934#-6.6281643#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529342/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Guardo','C/ Santa Bárbara, 21',34880,'Guardo','979 850 077','ecylguardo@jcyl.es','42.78951#-4.8460665#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233537581/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Íscar','C/ Antero García, 3',47420,'Iscar','983 611 747','ecyliscar@jcyl.es','41.36129#-4.5339146#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575144/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de La Bañeza','Avenida de Odón Alonso, 16',24750,'Bañeza (La)','987 640 884','ecylbaneza@jcyl.es','42.30225372263321#-5.895860195159912#100','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529264/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de León I - Centro','C/ Ramón y Cajal, 14-16',24002,'León','987 249 530','ecylramonycajal@jcyl.es','42.602333#-5.57183#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529186/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de León II - Serna','C/ Ciudad de Puebla, 3 - bajo',24007,'León','987 215 200','ecylleondos@jcyl.es','42.601845#-5.56044#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529212/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Medina de Rioseco','C/ Empedrada, 3',47800,'Medina de Rioseco','983 700 989','ecylrioseco@jcyl.es','41.88328#-5.043584#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575196/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Medina del Campo','Plaza de Montmorillón, 2',47400,'Medina del Campo','983 801 495','ecylmedina@jcyl.es','41.310528#-4.9153743#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575170/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Miranda de Ebro','C/ Torre de Miranda, 5',9200,'Miranda de Ebro','947 320 408','ecylmiranda@jcyl.es','42.687828#-2.945352#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233516029/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Palencia','C/ Las Monjas, 11-13',34005,'Palencia','979 745 323','ecylpalencia@jcyl.es','42.013996#-4.539244#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233537501/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Piedrahita','Plaza Nueva de la Vila - Patio de Armas, s/n',5500,'Piedrahíta','920 360 045','ecylpiedrahita@jcyl.es','40.462486#-5.326152#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233504084/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Ponferrada','Paseo San Antonio, 5',24400,'Ponferrada','987 410 859','ecylponferrada@jcyl.es','42.54729#-6.5883293#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529368/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Puebla de Sanabria','C/ Candanedo, 13 A',49300,'Puebla de Sanabria','980 620 126','ecylpueblasa@jcyl.es','42.05122#-6.6368365#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233583064/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Salamanca I - San José','Avda. Carlos I, 78',37008,'Salamanca','923 216 709','ecylsanjose@jcyl.es','40.949712#-5.669885#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233548071/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Salamanca II - San Quintín','C/ Calatañazor, 5-11',37001,'Salamanca','923 267 061','ecylsanquintin@jcyl.es','40.96193#-5.6585007#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233548096/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Salas de los Infantes','Pza. Jesús Aparicio, 10',9600,'Salas de los Infantes','947 380 884','ecylsalas@jcyl.es','42.023067#-3.286846#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233516055/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Segovia','C/ General Santiago, 6',40005,'Segovia','921 425 261','ecylsegovia@jcyl.es','40.941494#-4.1126914#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1171390327973/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Soria','C/ Aduana Vieja, 8',42002,'Soria','975 222 150','ecylempleosoria@jcyl.es','41.764877#-2.4669387#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233561892/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Tordesillas','C/ San Pedro, 27',47100,'Tordesillas','983 770 471','ecyltordesillas@jcyl.es','41.501373#-4.9983964#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575248/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Toro','C/ Concepción, 3 (Palacio Condes de Requena)',49800,'Toro','980 690 671','ecyltoro@jcyl.es','41.52245#-5.391601#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233583090/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Valencia de Don Juan','C/ Joan Miró, 4',24200,'Valencia de Don Juan','987 750 975','ecylvaldejuan@jcyl.es','42.28721#-5.51664#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529394/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Valladolid I - Poniente','Pza. Poniente, 1',47003,'Valladolid','983 341 213','ecylponiente@jcyl.es','41.653206#-4.730273#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575040/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Valladolid II - Paseo de Zorrilla','C/ Domingo Martínez, 7-9',47007,'Valladolid','983 224 534','ecylpaseozorrilla@jcyl.es','41.638695#-4.7372637#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575118/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Valladolid III - Villabáñez','C/ Villabáñez, 26',47012,'Valladolid','983 396 188','ecylvillabanez@jcyl.es','41.648342#-4.70687#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575092/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Valladolid IV - San Pablo','C/ Cadenas de San Gregorio, 6',47011,'Valladolid','983 259 854','ecylcadenas@jcyl.es','41.657196#-4.72331#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575066/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Venta de Baños','Avda. Primero de Junio, 30',34200,'Venta de Baños','979 770 199','ecylventa@jcyl.es','41.920483#-4.496035#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233537625/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Villablino','C/ La Libertad, 2',24100,'Villablino','987 471 566','ecylvillablino@jcyl.es','42.937477#-6.3204713#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233529420/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Villalón','C/ Quevedo, 10',47600,'Villalón de Campos','983 740 289','ecylvillalon@jcyl.es','42.099403#-5.035605#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575274/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Villarcayo','C/ Sigifredo Albajara, 22',9550,'Villarcayo de Merindad de Castilla La Vieja','947 131 053','ecylvillarcayo@jcyl.es','42.941944#-3.5690415#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233516081/DirectorioPadre'),
 ('Oficina del Servicio Público de Empleo de Zamora','C/ Doctor Fleming, 6-8',49026,'Zamora','980 521 582','ecyldoctorfleming@jcyl.es','41.503174#-5.753262#88','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233583012/DirectorioPadre'),
 ('Oficina provisional del Servicio Público de Empleo de Peñafiel','C/ Derecha al Coso, 43 (Centro Social \"El Mirador\")',47300,'Peñafiel','983 87 81 87','ecylpenafiel@jcyl.es','41.59459#-4.118428#94','http://www.jcyl.es/web/jcyl/Portada/es/Plantilla100Detalle/1204812992020/_/1142233575222/DirectorioPadre');
/*!40000 ALTER TABLE `oficinas` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
