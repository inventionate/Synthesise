# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.12-0ubuntu1.1)
# Datenbank: homestead
# Erstellt am: 2016-07-09 10:08:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle cuepoints
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cuepoints`;

CREATE TABLE `cuepoints` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cuepoint` int(11) NOT NULL,
  `video_videoname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `video_sequence_id` int(11) NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `cuepoints` WRITE;
/*!40000 ALTER TABLE `cuepoints` DISABLE KEYS */;

INSERT INTO `cuepoints` (`id`, `cuepoint`, `video_videoname`, `video_sequence_id`, `content`, `created_at`, `updated_at`)
VALUES
	(1,29,'Griechisch-römische Antike',1,'Beginn pädagogischer Geschichte','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(2,66,'Griechisch-römische Antike',1,'Periodisierung der Antike','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(3,100,'Griechisch-römische Antike',1,'Entdeckte Kindheit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(4,129,'Griechisch-römische Antike',1,'Kinder: unfertige Menschen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(5,158,'Griechisch-römische Antike',1,'Haus, oíkos, familia','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(6,199,'Griechisch-römische Antike',1,'Heirat und Schwangerschaft','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(7,221,'Griechisch-römische Antike',1,'paideía, educatio, formatio','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(8,294,'Griechisch-römische Antike',1,'Fehlendes Erziehungsinteresse','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(9,316,'Griechisch-römische Antike',1,'Umgang mit Kindern','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(10,368,'Griechisch-römische Antike',1,'Disziplinierung und Prügel','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(11,409,'Griechisch-römische Antike',1,'Kleinkinderpflege: Frauensache','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(12,446,'Griechisch-römische Antike',1,'Der Vater erzieht','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(13,470,'Griechisch-römische Antike',1,'paidagogós','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(14,514,'Griechisch-römische Antike',1,'Elementare Knabenbildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(15,584,'Griechisch-römische Antike',1,'Keine Institution Schule','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(16,630,'Griechisch-römische Antike',1,'Organisation des Unterrichts','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(17,710,'Griechisch-römische Antike',1,'Alphabetisierung ','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(18,733,'Griechisch-römische Antike',1,'Disziplinen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(19,770,'Griechisch-römische Antike',1,'Unterricht','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(20,802,'Griechisch-römische Antike',1,'Bildungsangebote','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(21,861,'Griechisch-römische Antike',1,'Anfänge des Studiums','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(22,922,'Griechisch-römische Antike',1,'enkýklios paideía','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(23,956,'Griechisch-römische Antike',1,'septem artes liberales','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(24,1015,'Griechisch-römische Antike',1,'Römische Schulen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(25,1070,'Griechisch-römische Antike',1,'Schule als Spiel und Muße?','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(26,1096,'Griechisch-römische Antike',1,'Gehobener Unterricht','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(27,1166,'Griechisch-römische Antike',1,'Untergang der Antike','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(28,30,'Mittelalter',1,'Völkerwanderung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(29,75,'Mittelalter',1,'Aufstieg des Christentums','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(30,125,'Mittelalter',1,'Hoch- und Spätmittelalter','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(31,200,'Mittelalter',1,'Kinder: Noch-nicht-Erwachsene','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(32,269,'Mittelalter',1,'Fürsorge und Misshandlungen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(33,314,'Mittelalter',1,'Achtlosigkeit und Gefahren','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(34,359,'Mittelalter',1,'Frei von Erziehung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(35,411,'Mittelalter',1,'Verbessert die Erziehung!','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(36,444,'Mittelalter',1,'Altersstufen spielen geringe Rolle','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(37,491,'Mittelalter',1,'Einteilung der Altersgruppen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(38,529,'Mittelalter',1,'Kinder als Rechtspersonen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(39,586,'Mittelalter',1,'Christliche Vorstellungen vom Kind','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(40,638,'Mittelalter',1,'Ambivalentes Verhältnis zum Kind','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(41,676,'Mittelalter',1,'Stellenwert der Erziehung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(42,727,'Mittelalter',1,'Aufbau aus Trümmern','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(43,767,'Mittelalter',1,'Initiativen Karls des Großen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(44,807,'Mittelalter',1,'Schulpflicht','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(45,823,'Mittelalter',1,'Ablehnung des klassischen Curriculums','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(46,855,'Mittelalter',1,'Alphabetisierung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(47,890,'Mittelalter',1,'Ausbau von Schulen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(48,917,'Mittelalter',1,'Klosterschulen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(49,945,'Mittelalter',1,'Lehr-Lern-Gemeinschaften','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(50,1028,'Mittelalter',1,'Unterricht ohne Klassenstufen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(51,1058,'Mittelalter',1,'Dauer des Schul- und Universitätsbesuchs','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(52,1111,'Mittelalter',1,'Schulunterricht','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(53,1177,'Mittelalter',1,'Universitäten','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(54,1243,'Mittelalter',1,'Universitätslehre','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(55,1287,'Mittelalter',1,'Fächerspektrum an der Universität','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(56,1380,'Mittelalter',1,'Weltliche Schulen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(57,1429,'Mittelalter',1,'Christentum in Bedrängnis','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(58,30,'Frühe Neuzeit',1,'Eingrenzung der Epoche','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(59,122,'Frühe Neuzeit',1,'Verstaatlichung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(60,175,'Frühe Neuzeit',1,'Konfessionalisierng','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(61,227,'Frühe Neuzeit',1,'Säkularisierung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(62,276,'Frühe Neuzeit',1,'Patriarchat','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(63,342,'Frühe Neuzeit',1,'Veränderungen im Familienleben','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(64,375,'Frühe Neuzeit',1,'Familiengröße','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(65,416,'Frühe Neuzeit',1,'Privatisierung des Hauses','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(66,448,'Frühe Neuzeit',1,'Geburt','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(67,467,'Frühe Neuzeit',1,'Freiheit und Reglements','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(68,513,'Frühe Neuzeit',1,'Erziehungsgeräte','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(69,564,'Frühe Neuzeit',1,'Arbeit der Kinder','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(70,682,'Frühe Neuzeit',1,'Spiele und Spielzeug','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(71,728,'Frühe Neuzeit',1,'Erziehungsalltag','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(72,790,'Frühe Neuzeit',1,'Züchtigungen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(73,858,'Frühe Neuzeit',1,'Väter- und Müterrollen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(74,913,'Frühe Neuzeit',1,'Hofmeister und Gouvernanten','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(75,1038,'Frühe Neuzeit',1,'Schule als Kampfschauplatz','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(76,1116,'Frühe Neuzeit',1,'Wer die Schule hat, hat die Zukunft','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(77,1170,'Frühe Neuzeit',1,'Alphabetisierung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(78,1342,'Frühe Neuzeit',1,'Landesherrliche Schulinitiativen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(79,1384,'Frühe Neuzeit',1,'Schul- oder Unterrichtspflicht','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(80,1448,'Frühe Neuzeit',1,'Deutsche Schulen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(81,1552,'Frühe Neuzeit',1,'Höhere Schulen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(82,1617,'Frühe Neuzeit',1,'Veränderungen des Curriculums','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(83,1668,'Frühe Neuzeit',1,'Neuer Schultyp: Realschule','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(84,1769,'Frühe Neuzeit',1,'Mädchenbildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(85,1860,'Frühe Neuzeit',1,'Katholische Gelehrtenschulen der Jesuiten','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(86,71,'Jean-Jacques Rousseau',1,'Rousseau als Erzieher','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(87,217,'Jean-Jacques Rousseau',1,'Möglichkeiten und Grenzen von Eduktion ','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(88,303,'Jean-Jacques Rousseau',1,'Eduktion: Veränderte Wahrnehmung\n        ermöglicht neue Erfahrung ','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(89,347,'Jean-Jacques Rousseau',1,'Beriffsprobleme','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(90,361,'Jean-Jacques Rousseau',1,'Kritisches Denken als Notwendigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(91,405,'Jean-Jacques Rousseau',1,'Eduktion','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(92,429,'Jean-Jacques Rousseau',1,'Der Vorrang allgemeiner Menschenbildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(93,499,'Jean-Jacques Rousseau',1,'Das Problem des Bürgertums','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(94,587,'Jean-Jacques Rousseau',1,'Das Plädoyer für eine Natur-gemäße Eduktion','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(95,633,'Jean-Jacques Rousseau',1,'Rousseaus Vertrauensanthropologie','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(96,881,'Jean-Jacques Rousseau',1,'Rousseaus weiter Erziehungsbegriff','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(97,1005,'Jean-Jacques Rousseau',1,'Die Natur als Erzieher','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(98,1052,'Jean-Jacques Rousseau',1,'Der Entwicklungsaspekt der Natur','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(99,1147,'Jean-Jacques Rousseau',1,'Die Bedeutung des Entwicklungsaspekts','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(100,1194,'Jean-Jacques Rousseau',1,'Die Dynamik des Rousseauschen Naturbegriffs','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(101,1251,'Jean-Jacques Rousseau',1,'Entwicklung - Freiheit - Vervollkommnungsfähigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(102,1342,'Jean-Jacques Rousseau',1,'Die Doppelseitigkeit der Vervollkommnungsfähigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(103,1383,'Jean-Jacques Rousseau',1,'Der »Mensch« als Erzieher','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(104,1428,'Jean-Jacques Rousseau',1,'Die »Dinge« als Erzieher','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(105,1494,'Jean-Jacques Rousseau',1,'Fazit zum Begriff einer Natur-gemäßen Eduktion','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(106,1594,'Jean-Jacques Rousseau',1,'Negative Eduktion vor positiver Eduktion','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(107,1633,'Jean-Jacques Rousseau',1,'Die Perspektive des Kindes einnehmen können','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(108,1737,'Jean-Jacques Rousseau',1,'Freiheit und Selbsttätigkeit des Kindes  ','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(109,1868,'Jean-Jacques Rousseau',1,'Erfolgserlebnisse: Wichtigkeit und Problematik','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(110,1903,'Jean-Jacques Rousseau',1,'Die Freiheit des Kindes als Gefühl der Freiheit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(111,1949,'Jean-Jacques Rousseau',1,'Die vorbereitete Lernumgebung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(112,2001,'Jean-Jacques Rousseau',1,'Verzicht auf Herrschaft','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(113,2045,'Jean-Jacques Rousseau',1,'Das anspornend realistische Selbstbild des Kindes','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(114,2129,'Jean-Jacques Rousseau',1,'Plädoyer für Selbsttätigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(115,2187,'Jean-Jacques Rousseau',1,'Bildung der Urteilskraft','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(116,2225,'Jean-Jacques Rousseau',1,'Positive Eduktion erst nach Entwicklung der Vernunft','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(117,2290,'Jean-Jacques Rousseau',1,'Negative und positive Eduktion','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(118,45,'Johann Heinrich Pestalozzi',1,'Pestalozzis Geburtshaus','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(119,93,'Johann Heinrich Pestalozzi',1,'Pestalozzi und seine Frau Anna beim Unterrichten','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(120,107,'Johann Heinrich Pestalozzi',1,'Der Neuhoff bei Birr','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(121,225,'Johann Heinrich Pestalozzi',1,'Die Abendstunde eines Einsiedlers (1780)','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(122,247,'Johann Heinrich Pestalozzi',1,'Über Gesetzgebung und Kindermord (1783)','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(123,254,'Johann Heinrich Pestalozzi',1,'Lienhard und Gertrud (1781–1787)','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(124,262,'Johann Heinrich Pestalozzi',1,'Meine Nachforschungen… (1797)','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(125,354,'Johann Heinrich Pestalozzi',1,'Grundlage der Bildung im Inneren unserer Natur','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(126,368,'Johann Heinrich Pestalozzi',1,'Familie als ›Haushimmel‹','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(127,615,'Johann Heinrich Pestalozzi',1,'»Schule der Sitten und des Staates«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(128,558,'Johann Heinrich Pestalozzi',1,'Problem des »Kindermords«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(129,634,'Johann Heinrich Pestalozzi',1,'Karl V: »Carolina« (1532)','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(130,773,'Johann Heinrich Pestalozzi',1,'Die Rolle des Staates','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(131,801,'Johann Heinrich Pestalozzi',1,'Die Notwendigkeit staatlichen Eingreifens','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(132,871,'Johann Heinrich Pestalozzi',1,'Leidenschaften und Triebe der menschlichen Natur','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(133,959,'Johann Heinrich Pestalozzi',1,'Das Dorf Bonnal: »vollendete Sündhaftigkeit«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(134,983,'Johann Heinrich Pestalozzi',1,'Gertrud und Junker Arner','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(135,1022,'Johann Heinrich Pestalozzi',1,'Voght und armer Mann','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(136,1036,'Johann Heinrich Pestalozzi',1,'Der Pfarrer spricht mit dem Vogt','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(137,1090,'Johann Heinrich Pestalozzi',1,'  Auswirkungen der Industrialisierung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(138,1189,'Johann Heinrich Pestalozzi',1,'Die Notwendigkeit der Schule','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(139,1293,'Johann Heinrich Pestalozzi',1,'Kindererziehung: »hart und unerbittlich«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(140,1350,'Johann Heinrich Pestalozzi',1,'Gleiche Erziehung zur Herstellung der ›Ordnung‹','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(141,1503,'Johann Heinrich Pestalozzi',1,'Überwindung des dualistischen Menschenbilds','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(142,1535,'Johann Heinrich Pestalozzi',1,'Die Abfolge der Zustände','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(143,1517,'Johann Heinrich Pestalozzi',1,'Die drei Zustände im Menschen vereint','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(144,1649,'Johann Heinrich Pestalozzi',1,'Weder naiv-harmonistisch, noch dualistisch ','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(145,1699,'Johann Heinrich Pestalozzi',1,'»Das Werk meiner selbst«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(146,1763,'Johann Heinrich Pestalozzi',1,'»ganzheitliche Bildung«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(147,1817,'Johann Heinrich Pestalozzi',1,'Die Trias: »Kopf, Herz und Hand«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(148,1868,'Johann Heinrich Pestalozzi',1,'Die sittliche Erziehung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(149,71,'Wilhelm von Humboldt',1,'Epoche des Neuhumanismus','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(150,363,'Wilhelm von Humboldt',1,'Studium und Beruf','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(151,411,'Wilhelm von Humboldt',1,'Alexander von Humboldt','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(152,455,'Wilhelm von Humboldt',1,'Humboldt-Universität','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(153,497,'Wilhelm von Humboldt',1,'»Theorie der Bildung des Menschen« (~1793)','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(154,520,'Wilhelm von Humboldt',1,'»Ideen zu einem Versuch, die Grenzen\n		der Wirksamkeit des Staates zu bestimmen« (1792)','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(155,564,'Wilhelm von Humboldt',1,'»Über Religion« (1798)','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(156,584,'Wilhelm von Humboldt',1,'»Theorie der Bildung des Menschen«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(157,739,'Wilhelm von Humboldt',1,'Die Schule','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(158,778,'Wilhelm von Humboldt',1,'Struktur des Bildungsvorgangs','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(159,897,'Wilhelm von Humboldt',1,'Studium als ›Bildungsaufgabe‹','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(160,988,'Wilhelm von Humboldt',1,'Humboldts Schulpläne','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(161,1057,'Wilhelm von Humboldt',1,'horizontale vs. vertikale Dreistufigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(162,1131,'Wilhelm von Humboldt',1,'möglichst langer, allgemeinbildender Schulweg','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(163,1163,'Wilhelm von Humboldt',1,'»allseitige Kräftebildung«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(164,1362,'Wilhelm von Humboldt',1,'Souveränität der Studierenden','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(165,1390,'Wilhelm von Humboldt',1,'»Wissen-schaffen«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(166,1446,'Wilhelm von Humboldt',1,'Bedeutungsänderung des Bildungsbegriffs','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(167,1475,'Wilhelm von Humboldt',1,'Einfluss der OECD ','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(168,30,'Erziehung und Unterricht',1,'Erziehung ⇔ Unterricht','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(169,84,'Erziehung und Unterricht',1,'Lehreralltag','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(170,212,'Erziehung und Unterricht',1,'Prange: Pädagogisches Handeln','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(171,337,'Erziehung und Unterricht',1,'Lernen?','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(172,821,'Erziehung und Unterricht',1,'Historische Verortungen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(173,1290,'Erziehung und Unterricht',1,'Unterricht und Erziehung als Ordnungshilfe','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(174,1554,'Erziehung und Unterricht',1,'Erziehender Unterricht','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(175,1694,'Erziehung und Unterricht',1,'Lernen: Vertiefung und Besinnung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(176,1743,'Erziehung und Unterricht',1,'Vertiefung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(177,1766,'Erziehung und Unterricht',1,'Besinnung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(178,1822,'Erziehung und Unterricht',1,'Lernprozesse: geistige Tätigkeiten','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(179,1888,'Erziehung und Unterricht',1,'Vielseitigkeit des Interesses','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(180,1928,'Erziehung und Unterricht',1,'Zusammenhänge herstellen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(181,1971,'Erziehung und Unterricht',1,'Charakterstärke der Sittlichkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(182,2143,'Erziehung und Unterricht',1,'»ästhetische Notwendigkeit«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(183,47,'Heterogenität',1,'Facetten von Gleichheit und Verschiedenheit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(184,148,'Heterogenität',1,'Der Kontext einer Pädagogik der Vielfalt','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(185,211,'Heterogenität',1,'Verschiedenheit als pädagogische Herausforderung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(186,535,'Heterogenität',1,'Heterogenität in der Schule','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(187,958,'Heterogenität',1,'Konstitutive Prinzipien pädagogischen Handelns','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(188,1196,'Heterogenität',1,'Didaktische Überleungen im Kontext von Heterogenität','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(189,1265,'Heterogenität',1,'Eine »Inklusive Didaktik«','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(190,1584,'Heterogenität',1,'Strukturelle Überlegungen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(191,1655,'Heterogenität',1,'Inklusion','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(192,1870,'Heterogenität',1,'Inklusives Schulsystem','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(193,1954,'Heterogenität',1,'Gemeinschaftsschule','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(194,30,'Wozu ist die Bildung da?',1,'Schlüsselbegriff der Pädagogik\n		','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(195,38,'Wozu ist die Bildung da?',1,'Ein Chamäleon unter den Begriffen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(196,48,'Wozu ist die Bildung da?',1,'Ringvorlesung 2010\n		','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(197,86,'Wozu ist die Bildung da?',1,'Doppeldeutigkeit des Begriffs\n		','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(198,129,'Wozu ist die Bildung da?',1,'Zeitkern der Bildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(199,200,'Wozu ist die Bildung da?',1,'Objektive und subjektive Bildungszeiten','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(200,210,'Wozu ist die Bildung da?',1,'Kein allgemeines Zeitmaß der Bildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(201,235,'Wozu ist die Bildung da?',1,'Bildung im Raum','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(202,252,'Wozu ist die Bildung da?',1,'Schularchitektur','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(203,326,'Wozu ist die Bildung da?',1,'Komplexität von Bildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(204,365,'Wozu ist die Bildung da?',1,'Grenzen der Vorhersagbarkeit und Steuerbarkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(205,412,'Wozu ist die Bildung da?',1,'Erziehung – intentional','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(206,443,'Wozu ist die Bildung da?',1,'Man wird erzogen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(207,504,'Wozu ist die Bildung da?',1,'Man bildet sich selbst','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(208,537,'Wozu ist die Bildung da?',1,'Zur Geschichte der Aus- und Fortbildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(209,560,'Wozu ist die Bildung da?',1,'Aus- und Fortbildung als Teilbereich der Bildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(210,632,'Wozu ist die Bildung da?',1,'Bildungswert von Arbeit und Beruf','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(211,710,'Wozu ist die Bildung da?',1,'Berufsausbildung als vollwertige Bildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(212,771,'Wozu ist die Bildung da?',1,'Bildung ohne Zweck und Nutzen?','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(213,810,'Wozu ist die Bildung da?',1,'Neuhumanistische Bildungsidee','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(214,869,'Wozu ist die Bildung da?',1,'Gegen gesellschaftliche Instrumentalisierung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(215,909,'Wozu ist die Bildung da?',1,'Bildung im Interessenstreit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(216,933,'Wozu ist die Bildung da?',1,'Verantwortung der Bildungs-Politik','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(217,969,'Wozu ist die Bildung da?',1,'Eine Art Präambel','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(218,1024,'Wozu ist die Bildung da?',1,'Glück als Bildungskategorie','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(219,1054,'Wozu ist die Bildung da?',1,'Glück eines gelingenden Lebens','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(220,1075,'Wozu ist die Bildung da?',1,'Formale Voraussetzungen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(221,1104,'Wozu ist die Bildung da?',1,'Pädagogische Aufgaben','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(222,1142,'Wozu ist die Bildung da?',1,'Gerechtigkeit setzt Grenzen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(223,1209,'Wozu ist die Bildung da?',1,'Gerechtigkeitsbildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(224,1242,'Wozu ist die Bildung da?',1,'Glück der Bildung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(225,56,'Bildung und Glück',1,'Inhalte des Glücks sind individuell','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(226,97,'Bildung und Glück',1,'Zwei Bedeutungen, ein Wort','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(227,149,'Bildung und Glück',1,'Glück als Strebens- und Lebensziel','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(228,171,'Bildung und Glück',1,'Glück als Erfüllung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(229,218,'Bildung und Glück',1,'Flow\n		','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(230,315,'Bildung und Glück',1,'Negatives, episodisches Glück','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(231,373,'Bildung und Glück',1,'Flow: Lust oder Last','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(232,394,'Bildung und Glück',1,'Positives Glück\n		','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(233,435,'Bildung und Glück',1,'Liebes-Glück','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(234,490,'Bildung und Glück',1,'Glück ist temporär','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(235,517,'Bildung und Glück',1,'Glück: Maßstab des Humanen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(236,564,'Bildung und Glück',1,'Subjektive Bedingungen des Glücks','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(237,590,'Bildung und Glück',1,'Objektive Bedingungen des Glücks','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(238,620,'Bildung und Glück',1,'Übergreifendes Glück','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(239,688,'Bildung und Glück',1,'Wunschlos glücklich','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(240,737,'Bildung und Glück',1,'Glück als Ziel von Bildung?','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(241,818,'Bildung und Glück',1,'Glück als Voraussetzung von Bildung?','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(242,873,'Bildung und Glück',1,'Glück im Lernen','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(243,930,'Bildung und Glück',1,'Bildung als Voraussetzung von Glück?','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(244,968,'Bildung und Glück',1,'Bildung: Erweiterung von Glücksmöglichkeiten','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(245,980,'Bildung und Glück',1,'Negative Bildungsprozesse','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(246,1036,'Bildung und Glück',1,'Positive Bildungsprozesse','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(247,1080,'Bildung und Glück',1,'Orte der Bildung – Orte des Glücks','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(248,1114,'Bildung und Glück',1,'Selbsterkenntnis','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(249,1158,'Bildung und Glück',1,'Glück ist nicht lernbar!','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(250,30,'Bildung und Gerechtigkeit',1,'Keine Demokratie ohne Gerechtigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(251,58,'Bildung und Gerechtigkeit',1,'Drei Formen des Gerechtigkeitssinns','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(252,94,'Bildung und Gerechtigkeit',1,'Personale und institutionelle Gerechtigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(253,180,'Bildung und Gerechtigkeit',1,'Elemente der Gerechtigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(254,197,'Bildung und Gerechtigkeit',1,'Gleichheit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(255,334,'Bildung und Gerechtigkeit',1,'Neutralität','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(256,360,'Bildung und Gerechtigkeit',1,'Befolgung von Gesetzen und Wechselseitigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(257,405,'Bildung und Gerechtigkeit',1,'Egalität, Neutralität, Legalität und Reziprozität','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(258,456,'Bildung und Gerechtigkeit',1,'Gerechtigkeit in der Pädagogik','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(259,556,'Bildung und Gerechtigkeit',1,'Gerechte Grundstruktur der Gesellschaft','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(260,597,'Bildung und Gerechtigkeit',1,'Die allgemeine Gerechtigkeitsvorstellung','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(261,633,'Bildung und Gerechtigkeit',1,'Die speziellen Gerechtigkeitsgrundsätze','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(262,670,'Bildung und Gerechtigkeit',1,'Pädagogische Konsequenz','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(263,723,'Bildung und Gerechtigkeit',1,'Begründung der Grundsätze','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(264,800,'Bildung und Gerechtigkeit',1,'Bildung des Gerechtigkeitssinn','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(265,863,'Bildung und Gerechtigkeit',1,'Moralstufenmodell','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(266,906,'Bildung und Gerechtigkeit',1,'Erstes Niveau: Vorkonventionell','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(267,975,'Bildung und Gerechtigkeit',1,'Zweites Niveau: Konventionell','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(268,1018,'Bildung und Gerechtigkeit',1,'Drittes Niveau: Postkonventionell','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(269,1083,'Bildung und Gerechtigkeit',1,'Stufe 6 ein Postulat\n		','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(270,1111,'Bildung und Gerechtigkeit',1,'Erziehung zur Gerechtigkeit','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(271,1142,'Bildung und Gerechtigkeit',1,'Stimulation durch Diskussion statt Indoktrination','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(272,1210,'Bildung und Gerechtigkeit',1,'Gerechte Schulgemeinschaft','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(273,1265,'Bildung und Gerechtigkeit',1,'Kritik an Kohlberg\n		','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(274,1330,'Bildung und Gerechtigkeit',1,'Gerechtigkeitsbildung durch aktive Partizipation','2016-07-09 12:07:52','2016-07-09 12:07:52');

/*!40000 ALTER TABLE `cuepoints` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle faqs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;

INSERT INTO `faqs` (`id`, `area`, `subject`, `question`, `answer`, `created_at`, `updated_at`)
VALUES
	(1,'A','Anmeldung für die wöchentlichen Mentoriate','Wie melde ich mich an?','Über LSF. Bitte lesen Sie dort zuvor die Bemerkungen.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(2,'A','Anmeldung für Klausur','Wie und wann melde ich mich für die Klausur an?','Die Anmeldung organisiert das <a href=\"http://www.ph-karlsruhe.de/de/studium-lehre/studien-service-zentrum/pruefungsaemter/\">Prüfungsamt</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(3,'A','Anwesenheit','Besteht Anwesenheitspflicht in den Präsenzveranstaltungen?','Es besteht keine Verpflichtung. Die regelmäßige Teilnahme wird dringend empfohlen.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(4,'B','Belegungspflicht','Ist die M1-Veranstaltung eine Pflichtveranstaltung?','Das Besuch der Veranstaltung ist verpflichtend. Das Bestehen der Akademischen Vorprüfung ist Voraussetzung für das Weiterstudium an der PH Karlsruhe.</p>\n			<h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>\n			<ol>\n			<li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>\n			<li>Die Akademische Vorprüfung wird in den Studienbereichen BW, 1. HF und dem 2. HF abgelegt.</li>\n			<li>Wer alle in Absatz 2 genannten studienbegleitenden Modulprüfungen bestanden hat, hat die Akademische Vorprüfung bestanden. Die studienbegleitenden Modulprüfungen, die gemäß Absatz 2 die Akademische Vorprüfung bilden, können gemäß § 18 jeweils einmal wiederholt werden.</li>\n			</ol><p>','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(5,'B','Belegungszeitraum','Bis zu welchem Semester muss ich die M1-Veranstaltung besucht bzw. die Klausur bestanden haben?','</p><h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>\n			<ol>\n			<li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>\n			</ol><p>','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(6,'D','Durchgefallen','Was passiert, wenn ich die Klausur nicht bestehe?','Die Klausur kann im folgenden Semester einmal wiederholt werden. Im Sommersemester werden von den einzelnen Fachgebieten Repetitorien (Wiederholungsveranstaltungen) angeboten.</p>\n			<h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>\n			<ol>\n			<li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>\n			<li>Die Akademische Vorprüfung wird in den Studienbereichen BW, 1. HF und dem 2. HF abgelegt.</li>\n			<li>Wer alle in Absatz 2 genannten studienbegleitenden Modulprüfungen bestanden hat, hat die Akademische Vorprüfung bestanden. Die studienbegleitenden Modulprüfungen, die gemäß Absatz 2 die Akademische Vorprüfung bilden, können gemäß § 18 jeweils einmal wiederholt werden.</li>\n			</ol><p>','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(7,'E','e:t:p:M','Was bedeutet e:t:p:M?','Alles Wissenswerte zum e:t:p:M-Konzept erfahren Sie auf der <a href=\"http://www.ph-karlsruhe.de/institute/ph/ew/etpm/\" target=\"_blank\">e:t:p:M Website</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(8,'E','Evaluation','Wie kann man zur Veranstaltung Rückmeldung geben?','Gegen Ende der Vorlesungszeit erhalten Sie die Gelegenheit, die Veranstaltung zu evaluieren. Der genaue Zeitraum der Evaluation wird Ihnen rechtzeitig auf dem Dashboard bekannt gegeben. Wir möchten Sie bitten, sich daran zu beteiligen.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(9,'I','Infoveranstaltung','Gibt es eine Informationsveranstaltung, in der ich über den Aufbau und Ablauf der Veranstaltung informiert werde?','Die Informationsveranstaltung findet in der Woche nach der Einführungswoche statt. Den Termin erfahren Sie über LSF bzw. unter »Termine«.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(10,'I','Inhalte','Welche Inhalte hat die Veranstaltung?','Die Gesamtveranstaltung gibt einen Einblick in zentrale Fragestellungen und Forschungsbereiche der Allgemeinen und Historischen Erziehungswissenschaft. Die Vorlesung besteht aus Einführungen in die Sozial-, Ideen- und Personengeschichte der Pädagogik sowie aus erziehungs- und bildungstheoretischen Themenblöcken. Für die Inhalte sind die jeweiligen Dozenten – Mitglieder des <a href=\"http://www.ph-karlsruhe.de/institute/ph/ew/personen/\" target=\"_blank\">Instituts für Allgemeine und Historische Erziehungswissenschaft</a> – verantwortlich.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(11,'K','Klausuraufbau','Wie ist die Klausur aufgebaut?','Die Klausur besteht aus zwei gleichwertigen Teilen: Allgemeine/Historische Erziehungswissenschaft und Schulpädagogik. Der Teil der Allgemeinen/Historischen Erziehungswissenschaft setzt sich aus Single Choice- und Multiple Choice-Aufgaben zusammen.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(12,'K','Klausurbewertung','Wie wird die Klausur bewertet?','Die Klausur wird benotet.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(13,'K','Klausurdauer','Wie lange dauert die Klausur?','Insgesamt 90 Minuten.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(14,'K','Klausureinsicht','Kann ich meine Klausur einsehen?','Die Einsicht in die eigene Klausur ist nach Bekanntgabe der Ergebnisse möglich. Bitte wenden Sie sich an die zuständigen Dozenten. Für den Klausurteil der Allgemeinen und Historischen Erziehungswissenschaft: <a href=\"http://www.ph-karlsruhe.de/institute/ph/ew/personen/timo-hoyer/\" target=\"_blank\">Apl. Prof. Dr. Timo Hoyer</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(15,'K','Klausurergebnisse','Wann und wie erfahre ich die Ergebnisse der Klausur?','Die Ergebnisse werden in der vorlesungsfreien Zeit mitgeteilt. Der genaue Zeitpunkt der Bekanntgabe steht nicht fest.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(16,'K','Klausurformalitäten','Wer ist für den formalen Ablauf, für rechtliche und technische Fragen zuständig?','Formale und rechtliche Fragen zur Prüfung beantwortet das <a href=\"http://www.ph-karlsruhe.de/studium-lehre/studien-service-zentrum/pruefungsaemter/\" target=\"_blank\">Prüfungsamt</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(17,'K','Klausurtermin','Kann ich die Klausur im Wintersemester und im Sommersemester schreiben?','Die Klausur wird im ersten Studiensemester nach dem Besuch der M1-Veranstaltung in der Prüfungswoche abgelegt (meistens also im Wintersemester). Wer sie nicht bestanden hat, kann sie im darauffolgenden Semester wiederholen.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(18,'K','Klausurwiederholung','Was geschieht, wenn ich die Klausur nicht bestanden habe?','Die Klausur (bestehend aus drei Teilen) kann im folgenden Semester einmal wiederholt werden. Im Sommersemester werden von den einzelnen Fachgebieten Repetitorien (Wiederholungsveranstaltungen) angeboten, die sinnvollerweise zu besuchen sind.\n			<h5>Prüfungsordnung 2011: § 4 Akademische Vorprüfung</h5>\n			<ol>\n			<li>Die Akademische Vorprüfung bildet den Abschluss der ersten Modulstufe. Die Akademische Vorprüfung ist bis zum Ende des zweiten Semesters abzulegen. Wer die Vorprüfung einschließlich etwaiger Wiederholungen bis zum Ende des vierten Fachsemesters nicht bestanden hat, verliert den Prüfungsanspruch, es sei denn, er bzw. sie hat die Fristüberschreitung nicht zu vertreten.</li>\n			<li>Die Akademische Vorprüfung wird in den Studienbereichen BW, 1. HF und dem 2. HF abgelegt.</li>\n			<li>Wer alle in Absatz 2 genannten studienbegleitenden Modulprüfungen bestanden hat, hat die Akademische Vorprüfung bestanden. Die studienbegleitenden Modulprüfungen, die gemäß Absatz 2 die Akademische Vorprüfung bilden, können gemäß § 18 jeweils einmal wiederholt werden.</li>\n			</ol>','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(19,'K','Klausurinhalt','Bezieht sich die Klausur nur auf die Inhalte der online-Lektionen?','Die online-Lektionen und die Texte sind gleichwertig. Die Klausurfragen können sich auf beide Inhalte beziehen.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(20,'K','Kontakt zu den Dozenten','Wie kann ich Kontakt zu den Dozenten aufnehmen?','Die Dozenten haben wöchentliche Sprechstunden (ohne Voranmeldung zu besuchen), und sie sind über Email zu erreichen. Weitere Angaben finden Sie unter <a href=\"http://home.ph-karlsruhe.de/etpM/kontakt\">Kontakt</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(21,'M','Mentoren','Wer und was sind Mentoren?','Mentoren sind Studierende der PH Karlsruhe, die zusätzlich zu ihrem Lehramtsstudium das <a href=\"http://www.ph-karlsruhe.de/institute/ph/ew/etpm/mentoring/\" target=\"_blank\">Zertifikatsstudium Mentoring</a> absolvieren. Sie qualifizieren sich in der Gestaltung von Lehrveranstaltungen und wissenschaftlichen Arbeiten, sie erwerben Schlüsselqualifikationen des selbstorganisierten Studiums, und sie vertiefen sich in die inhaltlichen Angebote der Allgemeinen und Historischen Erziehungswissenschaft. Mit ihren Kompetenzen tragen sie im Mentoriat dazu bei, Studienanfänger/innen den Übergang von der Schule auf die Hochschule zu erleichtern, sie begleiten und unterstützen Erstsemesterstudierende bei der selbstständigen Aneignung der fachwissenschaftlichen Studieninhalte und sie beraten bei Fragen rund ums Studium. Mentoren sind Experten für den Einstieg in die akademische Lehr-Lern-Kultur, aber sie sind nicht verantwortlich für die Inhalte der Veranstaltung oder der Prüfung.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(22,'M','Mentorenausbildung','Wie kann ich Mentor/in werden?','Nach bestandener Prüfung können Sie sich jederzeit zum Zertifikatsstudium Mentoring anmelden. Alle Informationen finden Sie auf der Seite des <a href=\"http://www.ph-karlsruhe.de/institute/ph/ew/etpm/mentoring/\" target=\"_blank\">Zertifikatsstudium Mentoring</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(23,'M','Mentoriatswechsel','Darf ich meine Mentoriatsgruppe wechseln?','Über LSF sind sie einer von Ihnen priorisierten Mentoriatsgruppe zugeteilt worden. Um die Organisation der Veranstaltung zu gewährleisten, sollte ein Wechsel unterbleiben. In gut begründeten Ausnahmefälle, sprechen sie den Wechsel bitte mit den jeweils davon betroffenen Mentoren ab. Deren Zustimmung ist Voraussetzung für den Wechsel.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(24,'N','Notizfunktion','Was ist die Notizfunktion des Videoplayers?','Mit Hilfe der Notizfunktion der Web-App können Sie ihr individuelles Skript für jede online-Lektion erstellen. Sobald Sie auf ein sog. »Fähnchen« (rote Punkte auf der Videotimeline) klicken können Sie zu diesem eine Notiz verfassen (max. 500 Zeichen). Diese Notiz wird verschlüsselt gespeichert. D. h., nur Sie haben Zugriff darauf. Es ist auch problemlos möglich, die Notiz im Nachhinein zu verändern. Dazu einfach erneut auf das entsprechende Fähnchen klicken. Über »Notizen herunterladen« können Sie sich alle Notizen als PDF herunterladen, um diese z. B. handschriflich zu bearbeiten.<br><br>\n            Sie können Ihre Notizen auch semantisch auszeichnen. Das Eingabefeld interpretiert alle grudnlegenden HTML Tags:\n            <dl>\n                <dt>Fett</dt>\n                <dd><code>&lt;b&gt;Ihr Text&lt;/b&gt;</code> wird zu: <b>Ihr Text</b></dd>\n                <dt>Kursiv</dt>\n                <dd><code>&lt;i&gt;Ihr Text&lt;/i&gt;</code> wird zu: <i>Ihr Text</i></dd>\n                <dt>Unterstrichen</dt>\n                <dd><code>&lt;u&gt;Ihr Text&lt;/u&gt;</code> wird zu: <u>Ihr Text</u></dd>\n                <dt>Absatz</dt>\n                <dd><code>&lt;br&gt;</code></dd>\n            </dl>\n            ','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(25,'O','Online-Lektionen Download','Darf ich die online-Lektionen auf meinem PC speichern oder sie anderen zur Verfügung stellen?','Die online-Lektionen sind urheberrechtlich geschützt. Ihre Verwendung ist ausschließlich im Rahmen der Lehrveranstaltung gestattet. Der Download oder die Weitergabe sind untersagt. Siehe <a href=\"http://home.ph-karlsruhe.de/etpM/impressum#rechtshinweise\" target=\"_blank\">Rechtshinweise</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(26,'O','Online-Lektionen Probleme','An wen kann ich mich wenden, wenn ich mit der online Vorlesung ein technisches Problem habe?','An Fabian Mundt. Nutzen Sie bitte das Formular unter <a href=\"http://home.ph-karlsruhe.de/etpM/kontakt\">Kontakt</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(27,'O','Online-Lektionen Sichtbarkeit','Sind alle online-Lektionen sofort und ständig sichtbar?','Die Lektionen werden nacheinander in festgelegten Abständen geöffnet und bleiben ab dann bis zur Klausur geöffnet. Danach besteht kein Zugang mehr.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(28,'P','Passwortverlust','Was passiert, wenn ich mich nicht an mein Passwort erinnern kann?','Bei Verlust des persönlichen Passwortes wenden Sie sich bitte an das ZIM. Die Web-App verwendet Ihre LSF-Zugangsdaten.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(29,'P','Präsenszveranstaltungen','Was sind Präsenzveranstaltungen?','Alle Informationen hierzu finden Sie auf dem <a href=\"http://home.ph-karlsruhe.de/etpM/dashboard\">Dashboard</a> unter den »Allgemeinen Informationen«.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(30,'R','Repetitorium','Was ist ein Repetitorium?','Repetitorien sind Seminare, in denen im Sommersemester die Inhalte der Lehrveranstaltung wiederholt werden. Repetitorien sind in der Hauptsache für Studierende gedacht, die die Akademische Vorprüfung nicht bestanden haben und sich erneut darauf vorbereiten wollen.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(31,'S','Stud.IP Materialien','Wie lade ich Materialien / Dateien auf Stud.IP hoch?','Die Stud.IP Dokumentation liefert hierzu eine ausführliche Beschreibung: <a href=\"http://hilfe.studip.de/index.php/Basis/Dateien\" target=\"_blank\">Stud.IP Dokumentation > Dateiverwaltung</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(32,'S','Stud.IP Lerngruppe','Wie kann ich auf Stud.IP eine Lerngruppe erstellen?','Die Stud.IP Dokumentation liefert hierzu eine ausführliche Beschreibung: <a href=\"http://hilfe.studip.de/index.php/Basis/Studiengruppen\" target=\"_blank\">Stud.IP Dokumentation > Studiengruppen</a>.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(33,'T','Termine','Wie erfahre ich die Termine der Veranstaltung?','Die Termine stehen in LSF, Stud.IP und sind auf dem <a href=\"http://home.ph-karlsruhe.de/etpM/dashboard\" target=\"_blank\">Dashboard</a> verfügbar.','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(34,'T','Textbearbeitung','Wie sollte ich die Texte und die online-Lektionen bearbeiten?','</p><ol>\n			<li>Notieren Sie sich offene Fragen, Verständnisschwierigkeiten, Ungereimtheiten. Versuchen Sie zunächst eigenhändig, Unklarheiten zu beseitigen. Ungeklärt bleibende Fragen können in den Mentoriaten aufgeworfen werden.</li>\n			<li>Notieren Sie sich Personennamen, von denen in den online-Lektionen und den Texten die Rede ist. Recherchieren Sie, wer sich hinter den Namen verbirgt.</li>\n			<li>Zeichnen Sie den Argumentationsgang von online-Lektion und Text (am besten Absatz für Absatz) schriftlich nach.</li>\n			<li>Fassen Sie in eigenen Sätzen Kernaussagen zusammen.</li>\n			<li>Halten Sie inhaltliche Zusammenhänge, Übereinstimmungen und Abweichungen zwischen dem Text und den online-Lektionen fest.</li>\n			</ol><p>','2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(35,'W','Weiterführende Literatur','Welche Bedeutung haben die allgemeinen und weiterführenden Literaturhinweise?','Die aufgeführte Literatur kann, wie die in den online-Lektionen eingeblendeten Buchtitel, zur Vertiefung der in der Vorlesung behandelten Themen herangezogen werden. Es sind Empfehlungen für das weitere Studium. Die Inhalte der Studien sind kein Gegenstand der Klausur.','2016-07-09 12:07:52','2016-07-09 12:07:52');

/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `colour` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Export von Tabelle migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_08_07_113754_create_cuepoints_table',1),
	('2014_08_07_114218_create_users_table',1),
	('2014_08_11_115145_create_videos_table',1),
	('2014_09_08_140525_create_faqs_table',1),
	('2014_09_08_161757_create_notes_table',1),
	('2014_09_09_102329_create_papers_table',1),
	('2014_10_08_152457_create_messages_table',1),
	('2014_10_17_120455_create_session_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `cuepoint_id` int(11) NOT NULL,
  `video_videoname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Export von Tabelle papers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `papers`;

CREATE TABLE `papers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `papername` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `video_videoname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `papers` WRITE;
/*!40000 ALTER TABLE `papers` DISABLE KEYS */;

INSERT INTO `papers` (`id`, `papername`, `author`, `video_videoname`, `created_at`, `updated_at`)
VALUES
	(1,'Ethik und Moralerziehung','Timo Hoyer','Griechisch-römische Antike','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(2,'Vom Kindheitsmythos zur Lebenswelt der Kinder','Oskar Negt','Mittelalter','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(3,'Wandel der Erziehungsverhältnisse','Heinz-Elmar Tenorth','Frühe Neuzeit','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(4,'Auszug aus »Émile« und »Julie«','Jean-Jacques Rousseau','Jean-Jacques Rousseau','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(5,'Auszug aus dem »Stanser Brief«','Johann Heinrich Pestalozzi','Johann Heinrich Pestalozzi','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(6,'Auszug aus dem »Königsberger« und dem »Litauer Schulplan«','Wilhelm von Humboldt','Wilhelm von Humboldt','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(7,'Über die Grenzen der Erziehung in Schule und Unterricht','Heinz-Jürgen Ipfling','Erziehung und Unterricht','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(8,'Inklusive Bildung: Wirksame Unterstützung des Lernens für alle Schüler','Clemens Hillenbrand','Heterogenität','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(9,'Bildung, Halbbildung, Unbildung','Konrad Paul Liessmann','Wozu ist die Bildung da?','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(10,'Glück soll lernbar sein? Ist es aber nicht!','Timo Hoyer','Bildung und Glück','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(11,'Bildungsgerechtigkeit','Krassimir Stojanov','Bildung und Gerechtigkeit','2016-07-09 12:07:53','2016-07-09 12:07:53');

/*!40000 ALTER TABLE `papers` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Export von Tabelle users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `role`, `email`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'student','$2y$10$jsN2reSXJPtbOfn3W3ljBOhMExVLisBhZuPanMKunmbdOnfDNz2mC','Test','Benutzer','Student','student@stud.ph-karlsruhe.de',NULL,'2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(2,'mentor','$2y$10$hFSVnY8PMmsbT8G2k0vzvuBm/kQSj9b.rEow571tjrXvrlm6cLTLS','Test','Benutzer','Teacher','mentor@stud.ph-karlsruhe.de',NULL,'2016-07-09 12:07:52','2016-07-09 12:07:52'),
	(3,'dozent','$2y$10$cVh1suXs9JaLaGkgYyT2zeBkvuYrTFT/kQQsnNUBq06oAuEvje6sG','Test','Benutzer','Admin','dozent@ph-karlsruhe.de',NULL,'2016-07-09 12:07:52','2016-07-09 12:07:52');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle videos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `videoname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `online` tinyint(1) NOT NULL,
  `sequence_id` int(11) NOT NULL,
  `sequence_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `available_from` date NOT NULL,
  `available_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;

INSERT INTO `videos` (`id`, `videoname`, `section`, `author`, `online`, `sequence_id`, `sequence_name`, `available_from`, `available_to`, `created_at`, `updated_at`)
VALUES
	(1,'Griechisch-römische Antike','Sozialgeschichte der Erziehung und Bildung','Apl. Prof. Dr. Timo Hoyer',1,1,NULL,'2015-10-21','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(2,'Mittelalter','Sozialgeschichte der Erziehung und Bildung','Apl. Prof. Dr. Timo Hoyer',1,1,NULL,'2015-10-28','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(3,'Frühe Neuzeit','Sozialgeschichte der Erziehung und Bildung','Apl. Prof. Dr. Timo Hoyer',1,1,NULL,'2015-11-04','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(4,'Jean-Jacques Rousseau','Ideen- und Personengeschichte der Pädagogik','Prof. Dr. Rainer Bolle',1,1,NULL,'2015-11-11','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(5,'Johann Heinrich Pestalozzi','Ideen- und Personengeschichte der Pädagogik','Prof. Dr. Gabriele Weigand',1,1,NULL,'2015-11-18','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(6,'Wilhelm von Humboldt','Ideen- und Personengeschichte der Pädagogik','Prof. Dr. Gabriele Weigand',1,1,NULL,'2015-11-25','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(7,'Erziehung und Unterricht','Erziehung und Schule','Dr. Albert Berger',1,1,NULL,'2015-12-02','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(8,'Heterogenität','Erziehung und Schule','Dr. Albert Berger',1,1,NULL,'2015-12-09','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(9,'Wozu ist die Bildung da?','Bildung – Glück – Gerechtigkeit','Apl. Prof. Dr. Timo Hoyer',1,1,NULL,'2015-12-16','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(10,'Bildung und Glück','Bildung – Glück – Gerechtigkeit','Apl. Prof. Dr. Timo Hoyer',1,1,NULL,'2015-12-23','2016-02-17','2016-07-09 12:07:53','2016-07-09 12:07:53'),
	(11,'Bildung und Gerechtigkeit','Bildung – Glück – Gerechtigkeit','Apl. Prof. Dr. Timo Hoyer',1,1,NULL,'2015-12-31','2014-02-28','2016-07-09 12:07:53','2016-07-09 12:07:53');

/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
