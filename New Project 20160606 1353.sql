-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.24


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema accounting
--

CREATE DATABASE IF NOT EXISTS accounting;
USE accounting;

--
-- Definition of table `tbl_acctchart`
--

DROP TABLE IF EXISTS `tbl_acctchart`;
CREATE TABLE `tbl_acctchart` (
  `idAcctTitle` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acctCode` varchar(15) NOT NULL,
  `acctTitle` varchar(150) NOT NULL,
  `idParent` int(10) DEFAULT NULL,
  `acctTypeID` int(10) unsigned DEFAULT NULL,
  `normsID` tinyint(10) unsigned DEFAULT NULL,
  `FSID` int(10) unsigned NOT NULL,
  `depth` tinyint(3) DEFAULT '1',
  `postedBy` int(10) DEFAULT NULL,
  `fundID` int(10) unsigned NOT NULL,
  `branchCode` varchar(3) NOT NULL DEFAULT 'CDO',
  PRIMARY KEY (`idAcctTitle`),
  KEY `acctTypeID_FK` (`acctTypeID`),
  CONSTRAINT `acctTypeID_FK` FOREIGN KEY (`acctTypeID`) REFERENCES `tbl_acctgroup` (`acctTypeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acctchart`
--

/*!40000 ALTER TABLE `tbl_acctchart` DISABLE KEYS */;
INSERT INTO `tbl_acctchart` (`idAcctTitle`,`acctCode`,`acctTitle`,`idParent`,`acctTypeID`,`normsID`,`FSID`,`depth`,`postedBy`,`fundID`,`branchCode`) VALUES 
 (1,'try Tryt','aa',NULL,1,2,2,1,5,4,'CDO'),
 (2,'100-130-70','Accounts Receivable',NULL,1,1,1,1,1,3,'CDO'),
 (3,'100-130-70','Accounts Receivable',2,1,1,1,2,1,3,'CDO'),
 (4,'200-210-80','Accounts Payable',NULL,3,2,1,1,1,3,'CDO'),
 (5,'200-210-80','Accounts Payable',4,3,2,1,2,1,3,'CDO'),
 (6,'250-225-00','Members\' & Owners\' Equity',NULL,5,2,1,1,1,3,'CDO'),
 (7,'300-310-00','Operating Income',NULL,6,2,2,1,1,3,'CDO'),
 (8,'400-420-00','Expense',NULL,7,1,2,1,1,3,'CDO'),
 (9,'100-120-60','Deposit in Bank - Savings - RCBC - Maf',1,1,1,1,2,1,3,'CDO'),
 (10,'100-120-65','Deposit in Bank - Current - PCIB - CDO - Maf',1,1,1,1,2,1,3,'CDO'),
 (11,'250-225-70','Equity Participation',6,5,2,1,2,1,3,'CDO'),
 (12,'250-225-80','Surplus (Free)',6,5,2,1,2,1,3,'CDO'),
 (13,'300-310-60','Members Contribution',7,6,2,2,2,1,3,'CDO'),
 (14,'400-420-80','Death Benefit Paid',8,7,1,2,2,1,3,'CDO'),
 (15,'100-120-00','Deposit in Bank - RCBC s/a',NULL,1,1,1,1,1,2,'CDO'),
 (16,'100-120-50','Deposit in Bank - Savings - RCBC - Velez - Maf',15,1,1,1,2,1,2,'CDO'),
 (22,'100-130-60','Accounts Receivable',NULL,1,1,1,1,1,2,'CDO'),
 (23,'100-130-60','Accounts Receivable',22,1,1,1,2,1,2,'CDO'),
 (24,'200-210-60','Accounts Payable',NULL,3,2,1,1,1,2,'CDO'),
 (25,'200-210-60','Accounts Payable',24,3,2,1,2,1,2,'CDO'),
 (26,'250-225-00','Members\' & Owners\' Equity',NULL,5,2,1,1,1,2,'CDO'),
 (27,'300-310-00','Operating Income',NULL,6,2,2,1,1,2,'CDO'),
 (28,'300-320-00','Other Income',NULL,6,2,2,1,1,2,'CDO'),
 (29,'400-420-00','Expenses',NULL,8,1,2,1,1,2,'CDO'),
 (30,'100-120-55','Deposit in Bank - Savings - PCIB - CDO - Maf',15,1,1,1,2,1,2,'CDO'),
 (31,'250-225-60','Surplus (Free)',26,5,2,1,2,1,2,'CDO'),
 (32,'300-310-30','Membership Fees Dues',27,6,2,2,2,1,2,'CDO'),
 (33,'300-320-40','Interest on Deposit with Bank',28,6,2,2,2,1,2,'CDO'),
 (34,'400-420-60','Fuel & Lubricants',29,8,1,2,2,1,2,'CDO'),
 (35,'400-420-61','Postage & Documentary Stamps',29,8,1,2,2,1,2,'CDO'),
 (36,'400-420-62','Repair & Maintenance',29,8,1,2,2,1,2,'CDO'),
 (37,'400-420-63','Representation & Entertainment',29,8,1,2,2,1,2,'CDO'),
 (38,'400-420-64','Salaries & Wages',29,8,1,2,2,1,2,'CDO'),
 (39,'400-420-65','Staff Benefits',29,8,1,2,2,1,2,'CDO'),
 (40,'400-420-66','Stationeries & Office Supplies Used',29,8,1,2,2,1,2,'CDO'),
 (41,'400-420-67','Taxes & Licenses',29,8,1,2,2,1,2,'CDO'),
 (42,'400-420-68','Telephone & Telegram',29,8,1,2,2,1,2,'CDO'),
 (43,'400-420-69','Travelling Expenses',29,8,1,2,2,1,2,'CDO'),
 (44,'400-420-70','Miscellaneous Expenses',29,8,1,2,2,1,2,'CDO'),
 (98,'100-120-00','Deposit In Bank',NULL,1,1,1,1,1,1,'CDO'),
 (99,'100-130-00','Accounts Receivable',NULL,1,1,1,1,1,1,'CDO'),
 (100,'100-130-45','Financial Assistance Receivable',NULL,1,1,1,1,1,1,'CDO'),
 (101,'100-130-45','Financial Assistance Receivable',100,1,1,1,2,1,1,'CDO'),
 (102,'100-130-50','Past Due Loans Receivables',NULL,1,1,1,1,1,1,'CDO'),
 (103,'100-130-50','Past Due Loans Receivables',102,1,1,1,2,1,1,'CDO'),
 (104,'100-135-10','Allowance For Probable Losses',NULL,1,2,1,1,1,1,'CDO'),
 (105,'100-135-10','Allowance For Probable Losses',104,1,2,1,2,1,1,'CDO'),
 (106,'100-130-55','Dues Receivables',NULL,1,1,1,1,1,1,'CDO'),
 (107,'100-130-55','Dues Receivables',106,1,1,1,2,1,1,'CDO'),
 (108,'100-140-00','Stationeries & Supplies Unissued',NULL,1,1,1,1,1,1,'CDO'),
 (109,'100-140-00','Stationeries & Supplies Unissued',108,1,1,1,2,1,1,'CDO'),
 (110,'100-150-00','Prepaid Expenses',NULL,1,1,1,1,1,1,'CDO'),
 (111,'100-160-00','Investment in Bonds & Other Debt Instrument',NULL,2,1,1,1,1,1,'CDO'),
 (112,'100-160-00','Investment in Bonds & Other Debt Instrument',111,2,1,1,2,1,1,'CDO'),
 (113,'100-170-00','Property & Equipment',NULL,2,1,1,1,1,1,'CDO'),
 (114,'100-175-00','Accumulated Depreciation',NULL,2,2,1,1,1,1,'CDO'),
 (115,'100-180-00','Leasehold Rights & Improvement',NULL,2,1,1,1,1,1,'CDO'),
 (116,'100-180-00','Leasehold Rights & Improvement',115,2,1,1,2,1,1,'CDO'),
 (117,'100-181-00','Construction Work in Progress',NULL,2,1,1,1,1,1,'CDO'),
 (118,'100-181-00','Construction Work in Progress',117,2,1,1,2,1,1,'CDO'),
 (119,'100-183-00','Deposit with Cepalco/Parasat',NULL,2,1,1,1,1,1,'CDO'),
 (120,'100-183-00','Deposit with Cepalco/Parasat',119,2,1,1,2,1,1,'CDO'),
 (121,'100-184-00','Deferred Charges',NULL,2,1,0,1,1,1,'CDO'),
 (122,'100-184-00','Deferred Charges',121,2,1,1,2,1,1,'CDO'),
 (123,'200-210-00','Accounts Payable',NULL,3,2,0,1,1,1,'CDO'),
 (124,'200-220-00','Unearned Interest',NULL,3,2,1,1,1,1,'CDO'),
 (125,'200-220-00','Unearned Interest',124,3,2,1,2,1,1,'CDO'),
 (126,'200-230-00','Other Liabilities',NULL,3,2,1,1,1,1,'CDO'),
 (127,'200-230-75','Other Deferred Credits',NULL,4,2,1,1,1,1,'CDO'),
 (128,'200-230-75','Other Deferred Credits',127,4,2,1,2,1,1,'CDO'),
 (129,'250-225-00','Members\' & Owners\' Equity',NULL,5,2,1,1,1,1,'CDO'),
 (130,'300-310-00','Operating Income',NULL,6,2,2,1,1,1,'CDO'),
 (131,'300-320-00','Other Income',NULL,6,2,2,1,1,1,'CDO'),
 (132,'400-410-00','Direct Expenses',NULL,7,1,2,1,1,1,'CDO'),
 (133,'400-420-00','Operating Expenses',NULL,8,1,2,1,1,1,'CDO'),
 (134,'400-420-46','Interest Rebates on Loans',NULL,8,1,2,1,1,1,'CDO'),
 (135,'400-420-46','Interest Rebates on Loans',134,8,1,2,2,1,1,'CDO'),
 (137,'100-120-10','Deposit in Bank - Savings - DBP - CDO',98,1,1,1,2,1,1,'CDO'),
 (138,'100-120-15','Deposit in Bank - Savings - RCBC - CDO',98,1,1,1,2,1,1,'CDO'),
 (139,'100-120-20','Deposit in Bank - Metrobank Time Deposit',98,1,1,1,2,1,1,'CDO'),
 (140,'100-120-25','Deposit in Bank - Current - RCBC - Malabon - Cap',98,1,1,1,2,1,1,'CDO'),
 (141,'100-120-30','Deposit in Bank - Savings - RCBC - MTMAS',98,1,1,1,2,1,1,'CDO'),
 (142,'100-120-35','Deposit in Bank - Current - RCBC - Malabon - JRL Main',98,1,1,1,2,1,1,'CDO'),
 (143,'100-120-40','Deposit In Bank - Savings - PCIB - CDO - Cap',98,1,1,1,2,1,1,'CDO'),
 (144,'100-120-45','Deposit In Bank - Current - PCIB - CDO - Cap',98,1,1,1,2,1,1,'CDO'),
 (145,'100-130-10','A/R - Pagadian',99,1,1,1,2,1,1,'CDO'),
 (146,'100-130-20','A/R - Butuan',99,1,1,1,2,1,1,'CDO'),
 (147,'100-130-25','A/R - Valencia',99,1,1,1,2,1,1,'CDO'),
 (148,'100-130-30','A/R - Iligan',99,1,1,1,2,1,1,'CDO'),
 (149,'100-130-35','A/R - Davao/KDP',99,1,1,1,2,1,1,'CDO'),
 (150,'100-130-40','A/R - Others',99,1,1,1,2,1,1,'CDO'),
 (151,'100-150-10','Insurance',110,1,1,1,2,1,1,'CDO'),
 (152,'100-170-10','Land',113,2,1,1,2,1,1,'CDO'),
 (153,'100-170-15','Building',113,2,1,1,2,1,1,'CDO'),
 (154,'100-170-20','Furniture & Fixture',113,2,1,1,2,1,1,'CDO'),
 (155,'100-170-25','Office Equipment',113,2,1,1,2,1,1,'CDO'),
 (156,'100-170-30','Garage Equipment',113,2,1,1,2,1,1,'CDO'),
 (157,'100-170-35','Transportation Equipment',113,2,1,1,2,1,1,'CDO'),
 (158,'100-170-40','Computer Outfit',113,2,1,1,2,1,1,'CDO'),
 (159,'100-175-15','Accumulated Depreciation - Building',114,2,2,1,2,1,1,'CDO'),
 (160,'100-175-20','Accumulated Depreciation - Furniture & Fixture',114,2,2,1,2,1,1,'CDO'),
 (161,'100-175-25','Accumulated Depreciation - Office Equipment',114,2,2,1,2,1,1,'CDO'),
 (162,'100-175-30','Accumulated Depreciation - Garage Equipment',114,2,2,1,2,1,1,'CDO'),
 (163,'100-175-35','Accumulated Depreciation - Transportation Equipment',114,2,2,1,2,1,1,'CDO'),
 (164,'100-175-40','Accumulated Depreciation - Computer Outfit',114,2,2,1,2,1,1,'CDO'),
 (165,'200-210-10','A/P - Head Office',123,3,2,1,2,1,1,'CDO'),
 (166,'200-210-15','A/P - Others',123,3,2,1,2,1,1,'CDO'),
 (167,'200-210-20','A/P - MOPF - SF',123,3,2,1,2,1,1,'CDO'),
 (168,'200-230-10','Accrued Expenses Payable',126,3,2,1,2,1,1,'CDO'),
 (169,'200-230-15','Rental Deposit Payable',126,3,2,1,2,1,1,'CDO'),
 (170,'200-230-20','Management & Other Prof. Fees Payable',126,3,2,1,2,1,1,'CDO'),
 (171,'200-230-25','Notarial Fees Payable',126,3,2,1,2,1,1,'CDO'),
 (172,'200-230-30','Loans Payable',126,3,2,1,2,1,1,'CDO'),
 (173,'200-230-35','Dividends Payable',126,3,2,1,2,1,1,'CDO'),
 (174,'200-230-40','SSS, Medicare, & ECC Premium Payable',126,3,2,1,2,1,1,'CDO'),
 (175,'200-230-45','Withholding Tax Payable',126,3,2,1,2,1,1,'CDO'),
 (176,'200-230-50','Pag-ibig Fund Contribution Payable',126,3,2,1,2,1,1,'CDO'),
 (177,'200-230-55','Legal policy Reserve',126,3,2,1,2,1,1,'CDO'),
 (178,'200-230-60','Loan Liquidation Reserve Fund',126,3,2,1,2,1,1,'CDO'),
 (179,'200-230-65','Hospitalization Reserve Fund',126,3,2,1,2,1,1,'CDO'),
 (180,'200-230-70','Miscellaneous Liabilities',126,3,2,1,2,1,1,'CDO'),
 (181,'250-225-10','Equity Participation',129,5,2,1,2,1,1,'CDO'),
 (182,'250-225-20','Capital Equity',129,5,2,1,2,1,1,'CDO'),
 (183,'250-225-30','Members Deposit',129,5,2,1,2,1,1,'CDO'),
 (184,'250-225-40','Surplus (Free)',129,5,2,1,2,1,1,'CDO'),
 (185,'250-225-50','Other Surplus Reserve',129,5,2,1,2,1,1,'CDO'),
 (186,'300-310-10','Membership Fees Dues',130,6,2,2,2,1,1,'CDO'),
 (187,'300-310-20','Members Contribution',130,6,2,2,2,1,1,'CDO'),
 (188,'300-320-10','Interest Earned',131,6,2,2,2,1,1,'CDO'),
 (189,'300-320-20','Interest on Past Due Loans',131,6,2,2,2,1,1,'CDO'),
 (190,'300-320-15','Interest on Deposit with Banks',131,6,2,2,2,1,1,'CDO'),
 (191,'300-320-20','Interest on Investment',131,6,2,2,2,1,1,'CDO'),
 (192,'300-320-25','Service Charges',131,6,2,2,2,1,1,'CDO'),
 (193,'300-320-30','Miscellaneous Income',131,6,2,2,2,1,1,'CDO'),
 (194,'400-420-10','Salaries and Wages',133,8,1,2,2,1,1,'CDO'),
 (195,'400-420-11','Staff Benefit',133,8,1,2,2,1,1,'CDO'),
 (196,'400-420-12','Directors\' & Committee Membership Fee',133,8,1,2,2,1,1,'CDO'),
 (197,'400-420-13','SSS, Medicare, & ECC Premium- Assn. Share',133,8,1,2,2,1,1,'CDO'),
 (198,'400-420-14','Pag-ibig Fund Association Share',133,8,1,2,2,1,1,'CDO'),
 (199,'400-420-15','Honorarium Pay',133,8,1,2,2,1,1,'CDO'),
 (200,'400-420-16','Management & Other Professional Fees - SF',133,8,1,2,2,1,1,'CDO'),
 (201,'400-420-17','Representation & Entertainment',133,8,1,2,2,1,1,'CDO'),
 (202,'400-420-18','Travelling Expenses',133,8,1,2,2,1,1,'CDO'),
 (203,'400-420-19','Rent',133,8,1,2,2,1,1,'CDO'),
 (204,'400-420-20','Light',133,8,1,2,2,1,1,'CDO'),
 (205,'400-420-21','Water',133,8,1,2,2,1,1,'CDO'),
 (206,'400-420-22','Fuel & Lubricants',133,8,1,2,2,1,1,'CDO'),
 (207,'400-420-23','Retainers Fee',133,8,1,2,2,1,1,'CDO'),
 (208,'400-420-24','Repair & Maintenance',133,8,1,2,2,1,1,'CDO'),
 (209,'400-420-25','Insurance Expense',133,8,1,2,2,1,1,'CDO'),
 (210,'400-420-26','Interest Expense',133,8,1,2,2,1,1,'CDO'),
 (211,'400-420-27','Stationeries & Supplies Used',133,8,1,2,2,1,1,'CDO'),
 (212,'400-420-28','Telephone & Telegram',133,8,1,2,2,1,1,'CDO'),
 (213,'400-420-29','Postage and Documentary Stamp',133,8,1,2,2,1,1,'CDO'),
 (214,'400-420-30','Security, Messengerial, & Janitorial Services',133,8,1,2,2,1,1,'CDO'),
 (215,'400-420-31','Withholding tax',133,8,1,2,2,1,1,'CDO'),
 (216,'400-420-32','Notarial Fees Expense',133,8,1,2,2,1,1,'CDO'),
 (217,'400-420-33','Books, Periodicals & Magazines',133,8,1,2,2,1,1,'CDO'),
 (218,'400-420-34','Membership Fees and Dues Expense',133,8,1,2,2,1,1,'CDO'),
 (219,'400-420-35','Taxes and Licences',133,8,1,2,2,1,1,'CDO'),
 (220,'400-420-36','Meetings and Conferences',133,8,1,2,2,1,1,'CDO'),
 (221,'400-420-37','Donations & Charitable Contribution',133,8,1,2,2,1,1,'CDO'),
 (222,'400-420-38','Bank Charges',133,8,1,2,2,1,1,'CDO'),
 (223,'400-420-39','Depreciation Expenses',133,8,1,2,2,1,1,'CDO'),
 (224,'400-420-40','Expenses Contribution to HO',133,8,1,2,2,1,1,'CDO'),
 (225,'400-420-41','Amortization Expense',133,8,1,2,2,1,1,'CDO'),
 (226,'400-420-42','Year End Expense',133,8,1,2,2,1,1,'CDO'),
 (227,'400-420-43','Provision For Probable Losses',133,8,1,2,2,1,1,'CDO'),
 (228,'400-420-44','Provision For Year End Expenses',133,8,1,2,2,1,1,'CDO'),
 (229,'400-420-45','Miscellaneous Expenses',133,8,1,2,2,1,1,'CDO'),
 (230,'400-410-10','Death Benefit Paid',132,7,2,2,2,1,1,'CDO'),
 (231,'400-410-20','Underwriting Expense',132,7,2,2,2,1,1,'CDO'),
 (232,'100-110-10','Cash on Hand',NULL,1,1,1,1,1,1,'CDO'),
 (233,'100-110-10','Cash on Hand',232,1,1,1,2,1,1,'CDO'),
 (236,'100-181-00','Accumulated Amortization',NULL,2,2,1,1,1,1,'CDO'),
 (237,'100-181-10','Accumulated Amortization-Leasehold',236,2,2,1,2,1,1,'CDO'),
 (238,'200-210-10A','Accounts Payable -OF',123,3,2,1,2,1,1,'CDO'),
 (239,'100-110-00','Cash on Hand',NULL,1,1,1,1,1,2,'CDO'),
 (240,'100-110-11','Petty Cash Fund',239,1,1,1,2,1,2,'CDO'),
 (246,'115-889','Test Accounting Title',35,6,2,2,2,NULL,2,'CDO'),
 (247,'Trye1111','Try Account Title',NULL,3,2,2,2,5,2,'CDO'),
 (248,'Trye1111','Try Account Title',NULL,3,2,2,2,5,2,'CDO'),
 (249,'Hes','aa',NULL,1,2,2,1,5,4,'CDO'),
 (250,'0910-11','Try Sub Account',31,6,2,2,1,NULL,3,'CDO');
/*!40000 ALTER TABLE `tbl_acctchart` ENABLE KEYS */;


--
-- Definition of table `tbl_acctgroup`
--

DROP TABLE IF EXISTS `tbl_acctgroup`;
CREATE TABLE `tbl_acctgroup` (
  `acctTypeID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acctType` varchar(50) NOT NULL,
  `acctGroup` varchar(10) NOT NULL,
  `norm` varchar(5) NOT NULL,
  `groupCode` varchar(10) NOT NULL,
  PRIMARY KEY (`acctTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acctgroup`
--

/*!40000 ALTER TABLE `tbl_acctgroup` DISABLE KEYS */;
INSERT INTO `tbl_acctgroup` (`acctTypeID`,`acctType`,`acctGroup`,`norm`,`groupCode`) VALUES 
 (1,'Current Assets','A','DR','CA'),
 (2,'Noncurrent Assets','A','DR','NCA'),
 (3,'Current Liabilities','L','CR','CL'),
 (4,'Noncurrent Liabilities','L','CR','NCL'),
 (5,'Member\'s and Owner\'s Equity','O','CR','MOE'),
 (6,'Revenue','R','CR','R'),
 (7,'Operating Expenses','E','DR','OE'),
 (8,'Other Expenses','E','DR','OX');
/*!40000 ALTER TABLE `tbl_acctgroup` ENABLE KEYS */;


--
-- Definition of table `tbl_acctngentries`
--

DROP TABLE IF EXISTS `tbl_acctngentries`;
CREATE TABLE `tbl_acctngentries` (
  `PK` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cdvID` int(10) unsigned NOT NULL,
  `idAcctTitleDB` int(10) unsigned DEFAULT NULL,
  `idAcctTitleCR` int(10) unsigned DEFAULT NULL,
  `amount` double(10,0) NOT NULL,
  PRIMARY KEY (`PK`),
  KEY `fkcdv` (`cdvID`),
  KEY `CRFK` (`idAcctTitleCR`),
  KEY `DBFK` (`idAcctTitleDB`),
  CONSTRAINT `CRFK` FOREIGN KEY (`idAcctTitleCR`) REFERENCES `tbl_acctchart` (`idAcctTitle`) ON UPDATE CASCADE,
  CONSTRAINT `DBFK` FOREIGN KEY (`idAcctTitleDB`) REFERENCES `tbl_acctchart` (`idAcctTitle`) ON UPDATE CASCADE,
  CONSTRAINT `fkcdv` FOREIGN KEY (`cdvID`) REFERENCES `tbl_cdv` (`cdvID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acctngentries`
--

/*!40000 ALTER TABLE `tbl_acctngentries` DISABLE KEYS */;
INSERT INTO `tbl_acctngentries` (`PK`,`cdvID`,`idAcctTitleDB`,`idAcctTitleCR`,`amount`) VALUES 
 (1,1,5,NULL,1000),
 (2,1,NULL,32,1000),
 (3,2,32,NULL,500),
 (4,2,37,NULL,100),
 (5,2,NULL,33,600),
 (6,3,3,NULL,2000),
 (7,3,NULL,12,2000),
 (8,5,30,NULL,12),
 (9,5,NULL,34,12),
 (18,21,NULL,31,12),
 (19,21,16,NULL,12),
 (20,22,32,NULL,12),
 (21,22,NULL,34,12),
 (28,26,34,NULL,45),
 (29,26,NULL,31,45),
 (30,27,34,NULL,1000),
 (31,27,NULL,33,1000),
 (32,28,32,NULL,345),
 (33,28,NULL,31,345),
 (36,30,13,NULL,12),
 (37,30,NULL,13,12),
 (44,38,3,NULL,1000),
 (45,38,NULL,5,1000),
 (46,39,3,NULL,100),
 (47,39,NULL,12,100),
 (48,40,32,NULL,122),
 (49,40,NULL,36,122),
 (50,41,NULL,208,7509),
 (51,42,NULL,36,7509),
 (52,46,NULL,36,7509),
 (53,49,NULL,42,2556),
 (54,51,NULL,5,2385),
 (55,52,36,36,7509),
 (56,53,42,42,2556),
 (57,54,5,5,5000),
 (58,55,5,5,5000),
 (59,56,5,5,2385),
 (60,57,172,172,26044),
 (61,58,212,212,2599),
 (62,59,212,212,2400),
 (63,60,41,41,3555),
 (64,61,42,42,921),
 (65,62,5,5,30000),
 (66,63,34,34,3400),
 (67,64,44,44,5000),
 (68,65,42,42,2906),
 (69,66,34,34,1500),
 (70,67,43,43,3000),
 (71,68,43,43,3000),
 (72,69,5,5,9601),
 (73,70,5,5,10485),
 (74,71,42,42,1200),
 (75,72,172,172,57825),
 (76,73,41,41,8512),
 (77,74,197,197,30073),
 (78,75,168,168,2853),
 (79,76,240,240,3888),
 (80,77,212,212,1200),
 (81,78,155,155,56886);
/*!40000 ALTER TABLE `tbl_acctngentries` ENABLE KEYS */;


--
-- Definition of table `tbl_acctperiod`
--

DROP TABLE IF EXISTS `tbl_acctperiod`;
CREATE TABLE `tbl_acctperiod` (
  `periodID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `strDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`periodID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acctperiod`
--

/*!40000 ALTER TABLE `tbl_acctperiod` DISABLE KEYS */;
INSERT INTO `tbl_acctperiod` (`periodID`,`strDate`,`endDate`) VALUES 
 (1,'2015-01-01','2015-12-31');
/*!40000 ALTER TABLE `tbl_acctperiod` ENABLE KEYS */;


--
-- Definition of table `tbl_apv`
--

DROP TABLE IF EXISTS `tbl_apv`;
CREATE TABLE `tbl_apv` (
  `apvID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `APVNum` varchar(15) NOT NULL,
  `transDate` date NOT NULL,
  `particulars` varchar(50) NOT NULL,
  `prepBy` int(10) unsigned NOT NULL,
  `approveBy` int(10) unsigned DEFAULT NULL,
  `auditedBy` int(10) unsigned DEFAULT NULL,
  `glPosted` varchar(5) NOT NULL DEFAULT 'PEN',
  `tranStatus` varchar(5) NOT NULL DEFAULT 'PEN',
  `brnch` varchar(5) NOT NULL DEFAULT 'CDO',
  PRIMARY KEY (`apvID`),
  KEY `pID` (`prepBy`),
  KEY `approve` (`approveBy`),
  KEY `audit` (`auditedBy`),
  CONSTRAINT `approve` FOREIGN KEY (`approveBy`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE,
  CONSTRAINT `audit` FOREIGN KEY (`auditedBy`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE,
  CONSTRAINT `pID` FOREIGN KEY (`prepBy`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_apv`
--

/*!40000 ALTER TABLE `tbl_apv` DISABLE KEYS */;
INSERT INTO `tbl_apv` (`apvID`,`APVNum`,`transDate`,`particulars`,`prepBy`,`approveBy`,`auditedBy`,`glPosted`,`tranStatus`,`brnch`) VALUES 
 (3,'201511-0007','2015-11-11','Please save...',5,5,5,'PEN','AUD','CDO'),
 (4,'201605-0009','2016-05-30','mt cdo',5,NULL,NULL,'PEN','PEN','CDO');
/*!40000 ALTER TABLE `tbl_apv` ENABLE KEYS */;


--
-- Definition of table `tbl_apventries`
--

DROP TABLE IF EXISTS `tbl_apventries`;
CREATE TABLE `tbl_apventries` (
  `PK` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apvID` int(10) unsigned NOT NULL,
  `idAcctTitleDB` int(10) unsigned DEFAULT NULL,
  `idAcctTitleCR` int(10) unsigned DEFAULT NULL,
  `amount` double(10,0) DEFAULT NULL,
  PRIMARY KEY (`PK`),
  KEY `idAcctTitleCR` (`idAcctTitleCR`),
  KEY `idAcctTitleDB` (`idAcctTitleDB`),
  KEY `APVoucher` (`apvID`),
  CONSTRAINT `APVoucher` FOREIGN KEY (`apvID`) REFERENCES `tbl_apv` (`apvID`) ON UPDATE CASCADE,
  CONSTRAINT `FKCR` FOREIGN KEY (`idAcctTitleCR`) REFERENCES `tbl_acctchart` (`idAcctTitle`) ON UPDATE CASCADE,
  CONSTRAINT `FKDB` FOREIGN KEY (`idAcctTitleDB`) REFERENCES `tbl_acctchart` (`idAcctTitle`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_apventries`
--

/*!40000 ALTER TABLE `tbl_apventries` DISABLE KEYS */;
INSERT INTO `tbl_apventries` (`PK`,`apvID`,`idAcctTitleDB`,`idAcctTitleCR`,`amount`) VALUES 
 (5,3,31,NULL,100),
 (6,3,NULL,36,100),
 (7,4,NULL,5,1000);
/*!40000 ALTER TABLE `tbl_apventries` ENABLE KEYS */;


--
-- Definition of table `tbl_assetinfo`
--

DROP TABLE IF EXISTS `tbl_assetinfo`;
CREATE TABLE `tbl_assetinfo` (
  `itemID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemName` varchar(50) NOT NULL,
  `cost` double(10,0) NOT NULL,
  `datePurchased` date NOT NULL,
  `estLife` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `categoryID` int(10) unsigned DEFAULT NULL,
  `idPeriod` tinyint(3) unsigned DEFAULT NULL,
  `postedDate` date NOT NULL,
  `postedBy` int(10) NOT NULL,
  PRIMARY KEY (`itemID`),
  KEY `catID_FK` (`categoryID`),
  KEY `idPeriod_FK` (`idPeriod`),
  CONSTRAINT `catID_FK` FOREIGN KEY (`categoryID`) REFERENCES `tbl_category` (`categoryID`) ON UPDATE CASCADE,
  CONSTRAINT `idPeriod_FK` FOREIGN KEY (`idPeriod`) REFERENCES `tbl_acctperiod` (`periodID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assetinfo`
--

/*!40000 ALTER TABLE `tbl_assetinfo` DISABLE KEYS */;
INSERT INTO `tbl_assetinfo` (`itemID`,`itemName`,`cost`,`datePurchased`,`estLife`,`qty`,`categoryID`,`idPeriod`,`postedDate`,`postedBy`) VALUES 
 (1,'gfhgf',4,'2015-08-03',12,12,3,1,'0000-00-00',0),
 (2,'aa',12,'2015-08-03',2,3,2,1,'0000-00-00',0),
 (3,'Test Item',10000,'2015-08-03',12,3,4,1,'0000-00-00',0),
 (4,'Computers',40000,'2015-09-01',20,4,4,1,'2015-09-03',0),
 (5,'Mac Book Pro',55000,'2015-11-17',12,1,4,NULL,'2015-11-18',5),
 (6,'uytuy',12,'2015-11-17',12,12,6,NULL,'2015-11-18',5),
 (7,'Cars',12,'2015-11-23',12,12,5,NULL,'2015-11-18',5),
 (8,'dsadsa',12,'2015-11-19',12,11,6,NULL,'2015-11-18',5),
 (9,'Try',12,'2015-12-03',12,12,3,NULL,'2015-12-04',5),
 (10,'Tryyyyyy',480,'2016-05-24',3,2,3,NULL,'2016-05-28',5);
/*!40000 ALTER TABLE `tbl_assetinfo` ENABLE KEYS */;


--
-- Definition of table `tbl_bank`
--

DROP TABLE IF EXISTS `tbl_bank`;
CREATE TABLE `tbl_bank` (
  `bankID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bankName` varchar(60) DEFAULT NULL,
  `acctNum` varchar(40) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `Tel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`bankID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

/*!40000 ALTER TABLE `tbl_bank` DISABLE KEYS */;
INSERT INTO `tbl_bank` (`bankID`,`bankName`,`acctNum`,`address`,`Tel`) VALUES 
 (1,'RCBC','4895-485-45','Velez St., CDO','225-956'),
 (2,'Metro Bank','gfhgf','ghgf','12345678'),
 (3,'Union Bank','1254697','Velez St.','2239052'),
 (4,'Metro Bank','ass','q','ewrewr');
/*!40000 ALTER TABLE `tbl_bank` ENABLE KEYS */;


--
-- Definition of table `tbl_bankacct`
--

DROP TABLE IF EXISTS `tbl_bankacct`;
CREATE TABLE `tbl_bankacct` (
  `acctID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acctNo` varchar(30) NOT NULL,
  `bankID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`acctID`),
  KEY `bankID` (`bankID`),
  CONSTRAINT `bankID` FOREIGN KEY (`bankID`) REFERENCES `tbl_bank` (`bankID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bankacct`
--

/*!40000 ALTER TABLE `tbl_bankacct` DISABLE KEYS */;
INSERT INTO `tbl_bankacct` (`acctID`,`acctNo`,`bankID`) VALUES 
 (1,'1919-1919-11',1);
/*!40000 ALTER TABLE `tbl_bankacct` ENABLE KEYS */;


--
-- Definition of table `tbl_book`
--

DROP TABLE IF EXISTS `tbl_book`;
CREATE TABLE `tbl_book` (
  `bookID` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `bookType` varchar(10) NOT NULL,
  `bookName` varchar(60) NOT NULL,
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_book`
--

/*!40000 ALTER TABLE `tbl_book` DISABLE KEYS */;
INSERT INTO `tbl_book` (`bookID`,`bookType`,`bookName`) VALUES 
 (1,'CRJ','Cash Receipts Journal'),
 (2,'GJ','General Journal'),
 (3,'SRA','Sales Return and Allowances'),
 (4,'CDJ','Cash Disbursement Journal'),
 (5,'BB','Beginning Balance'),
 (6,'ARJ','Accounts Receivable Journal'),
 (7,'SJ','Sales Journal'),
 (8,'APJ','Accounts Payable Journal'),
 (9,'PRA','Purchase Return and Allowances');
/*!40000 ALTER TABLE `tbl_book` ENABLE KEYS */;


--
-- Definition of table `tbl_branch`
--

DROP TABLE IF EXISTS `tbl_branch`;
CREATE TABLE `tbl_branch` (
  `brID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brName` varchar(100) DEFAULT NULL,
  `brManager` varchar(100) DEFAULT NULL,
  `brAddress` varchar(100) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `IP` varchar(60) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `userID` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`brID`),
  KEY `IDUser` (`userID`),
  CONSTRAINT `IDUser` FOREIGN KEY (`userID`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

/*!40000 ALTER TABLE `tbl_branch` DISABLE KEYS */;
INSERT INTO `tbl_branch` (`brID`,`brName`,`brManager`,`brAddress`,`tel`,`IP`,`code`,`userID`) VALUES 
 (1,'MT-ILG','Dantes, Jean','CDO','2254045','198.68.1.12','001',5),
 (2,'MT-DVO','Eunice Lacson','Davao City','2239052','192.168.1.1','1125',5),
 (4,'MT-CDO','Bersano, Melanie M','Barra Iponan, CDO','223-9052','198.168.1.1','002fff',5),
 (5,'qqqq','dsfghjhjhg','sdfdshgj','tertret','dsfds','dsfdsf',5),
 (6,'MT-PGD','fdgfd','fdgfdg','fdgfd','gfgfd','fdgfdg',5),
 (7,'Solutions Management System Inc.','Montera, Elvira','47 Hayes Cor. Pabayo Sts. , Cagayan De Oro','789456321','192.168.1.1','SMSi',5),
 (8,'MT ZAMBOANGA','Ryan Rems','Zamboanga Sibugay','2257426','192.167.1.1','mt_zbo',5);
/*!40000 ALTER TABLE `tbl_branch` ENABLE KEYS */;


--
-- Definition of table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `categoryID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desc` varchar(50) NOT NULL,
  `idAcctTitle` int(10) unsigned NOT NULL,
  `Type` varchar(5) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`categoryID`,`desc`,`idAcctTitle`,`Type`) VALUES 
 (1,'Land',152,'FA'),
 (2,'Building',153,'FA'),
 (3,'Furniture and Fixture',154,'FA'),
 (4,'Office Equipment',155,'FA'),
 (5,'Garage Equipment',156,'FA'),
 (6,'Transportation Equipment',157,'FA');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;


--
-- Definition of table `tbl_cdv`
--

DROP TABLE IF EXISTS `tbl_cdv`;
CREATE TABLE `tbl_cdv` (
  `cdvID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CDVNo` varchar(30) NOT NULL,
  `payee` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `chkDate` date NOT NULL,
  `bankID` int(10) unsigned NOT NULL,
  `amount` double(10,0) DEFAULT NULL,
  `chkNO` varchar(20) NOT NULL,
  `particular` varchar(100) NOT NULL,
  `transDate` date DEFAULT NULL,
  `status` varchar(10) DEFAULT 'PEN',
  `prepBy` int(10) unsigned DEFAULT NULL,
  `posted` varchar(15) DEFAULT 'PEN',
  `postedBy` int(10) unsigned DEFAULT NULL,
  `postedDate` date DEFAULT NULL,
  `approveby` int(10) unsigned DEFAULT NULL,
  `auditedBy` int(10) unsigned DEFAULT NULL,
  `idperiod` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`cdvID`),
  KEY `bnkID` (`bankID`),
  KEY `UID` (`prepBy`),
  KEY `appBy` (`approveby`),
  CONSTRAINT `UID` FOREIGN KEY (`prepBy`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE,
  CONSTRAINT `appBy` FOREIGN KEY (`approveby`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE,
  CONSTRAINT `bnkID` FOREIGN KEY (`bankID`) REFERENCES `tbl_bank` (`bankID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cdv`
--

/*!40000 ALTER TABLE `tbl_cdv` DISABLE KEYS */;
INSERT INTO `tbl_cdv` (`cdvID`,`CDVNo`,`payee`,`address`,`chkDate`,`bankID`,`amount`,`chkNO`,`particular`,`transDate`,`status`,`prepBy`,`posted`,`postedBy`,`postedDate`,`approveby`,`auditedBy`,`idperiod`) VALUES 
 (1,'2015090001','Janine Jasmin','Cagayabn','2015-09-05',1,1000,'34343','Test','2015-09-05','APR',5,'PEN',NULL,NULL,2,NULL,NULL),
 (2,'2015090002','Philp Garay','Nazareth, CDO','2015-09-04',1,600,'35435436','Test Test Test','2015-09-11','APR',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (3,'2015090003','Annie Rose Deloso','Kauswagan','2015-09-10',1,2000,'3534654645','tgrtret','0000-00-00','DNY',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (4,'2015090004','sdfds','sdfsdf','2015-09-10',1,12,'5435345','rtyrey','0000-00-00','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (5,'2015090005','sdfds','sdfsdf','2015-09-10',1,12,'5435345','rtyrey','2015-09-11','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (21,'2015090007','wqewqe','wqewq','2015-09-14',1,12,'34325436','213213','2015-09-15','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (22,'2015090008','rtyrty','trytry','2015-09-14',1,12,'343454','dfgdfgfd','2015-09-15','APR',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (26,'201590009','Test','Trest','2015-09-15',1,45,'46545654','Test Tes','2015-09-16','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (27,'2015910','Sherwin Villamor','DAvao','2015-09-14',2,1000,'3543546','Te sTetstststs','2015-09-16','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (28,'2015090010','tr','utru','2015-09-17',1,345,'543656','retret','2015-09-18','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (29,'2016010011','Philip Garay','Nazareth, CDO','2015-10-20',1,1000,'7657657','Test Test','2016-01-04','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (30,'2016010002','rtyt','trytr','2016-01-03',1,12,'2321321','sdads','2016-01-04','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (38,'2015110027','dasdasdasda','asdasdsad','2015-11-03',1,1000,'12321321','zxczxxZX','2015-11-04','AUD',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (39,'2015110028','This is Test Test','Test Test Tes','2015-11-04',2,100,'6545654','Forever Test!!!','2015-11-05','AUD',5,'PEN',NULL,NULL,5,5,NULL),
 (40,'201511-0028','gfdg','fdgfdg','2015-11-10',2,122,'4325435','tertert','2015-11-11','APR',5,'PEN',NULL,NULL,5,5,NULL),
 (41,'201605-0029','Jean A. Salvan','Cagayan de Oro City','2014-01-26',1,7509,'1200000216','Repair and Maintenance for Innova','2016-05-30','APR',5,'PEN',NULL,NULL,5,NULL,NULL),
 (42,'201605-0030','ALFREDO BONIEL &/OR JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-01-26',1,7509,'1200000216','REPAIR AND MAINTENANCE FOR INNOVA','2016-05-30','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (43,'201605-0031','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-01-26',1,2556,'1200000215','TELEPHONE ALLOWANCE OF BBC FOR DECEMBER 13, 2013-JANUARY 12,','2016-05-30','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (44,'201605-0032','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-01-26',1,2556,'1200000215','TELEPHONE ALLOWANCE OF BBC FOR DECEMBER 13, 2013-JANUARY 12,','2016-05-30','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (45,'201605-0033','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-01-26',1,2556,'1200000215','TELEPHONE ALLOWANCE OF BBC FOR DECEMBER 13, 2013-JANUARY 12,','2016-05-30','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (46,'201606-0036','ALFREDO BONIEL &/OR JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-01-26',1,7509,'1200000216','IN FULL PAYMENT OF SMSi\'s REPAIR AND MAINTENANCE FOR INNOVA','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (47,'201606-0037','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-01-26',1,2556,'1200000215','IN FULL PAYMENT OF SMSi\'s TELEPHONE ALLOWANCE OF BBC FOR THE PERIOD OF DECEMBER 13,2013-JANUARY 12,2','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (48,'201606-0038','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-01-26',1,2556,'1200000215','IN FULL PAYMENT OF SMSi\'s TELEPHONE ALLOWANCE OF BBC FOR THE PERIOD OF DECEMBER 13,2013-JANUARY 12,2','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (49,'201606-0039','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-01-26',1,2556,'1200000215','IN FULL PAYMENT OF SMSi\'s TELEPHONE ALLOWANCE OF BBC FOR THE PERIOD OF DECEMBER 13,2013-JANUARY 12,2','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (50,'201606-0040','MEMBA','CAGAYAN DE ORO CITY','2014-01-17',1,2385,'1200000212','IN FULL PAYMENT OF SMSi\'s MD&EP SHARE FR THE MONTH OF JANUARY 2014','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (51,'201606-0041','MEMBA','CAGAYAN DE ORO','2014-01-17',1,2385,'1200000212','IN FULL PAYMENT OF SMSi\'s MD & EP SHARE FOR THE MONTH OF JANUARY 2014','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (52,'201606-0043','ALFREDO BONIEL &/OR JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-01-26',1,7509,'1200000216','IN FULL PAYMENTS OF SMSI\'S REPAIR AND MAINTENANCE FOR INNOVA','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (53,'201606-0044','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-01-26',1,2556,'1200000215','IN FULL PAYMENT OF SMSI\'S TELEPHONE ALLOWANCE OF BBC FOR THE PERIOD OF DECEMBER 13, 2013-JANUARY 12,','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (54,'201606-0045','ELVIRA C. MONTERA','CAGAYAN DE ORO CITY','2014-01-21',1,5000,'1200000214','IN FULL PAYMENT OF SMSI\'S CASH ADVANCE - ECM','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (55,'201606-0046','ELVIRA C. MONTERA','CAGAYAN DE ORO CITY','2014-01-21',1,5000,'1200000213','IN FULL PAYMENT OF SMSI\'S CASH ADVANCE - ECM','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (56,'201606-0047','MEMBA','CAGAYAN DE ORO CITY','2014-01-17',1,2385,'1200000212','IN FULL PAYMENT OF SMSI\'S MD & EP SHARE FOR THE MONTH OF JANUARY 2014','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (57,'201606-0048','AMAARA FINANCIAL CORPORATION','CAGAYAN DE ORO CITY','2014-01-17',1,26044,'1200000211','IN FULL PAYEMENT OF SMSI\'S LOAN PAYABLE TO AFC-DVO FOR THE MONTH OF JANUARY 15,2014','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (58,'201606-0049','BAYAN TELECOMMUNICATIONS INC','CAGAYAN DE ORO CITY','2014-01-17',1,2599,'1200000210','IN FULL PAYMENT OF SMSI\'S INTERNET SUBSCRIPTION FOR THE MONTH OF DECEMBER 2013','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (59,'201606-0050','SMART COMMUNICATIONS INC','CAGAYAN DE ORO CITY','2014-01-17',1,2400,'1200000209','IN FULL PAYMENT OF SMSI\'S TELEPHONE (SMART GOLD) FOR THE PERIOD OF NOV 29-DEC 28,2013','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (60,'201606-0051','BUREAU OF INTERNAL REVENUE','CAGAYAN DE ORO CITY','2014-01-17',1,3555,'4261595124','IN FULL PAYMENT OF SMSI\'S PERCENTAGE TAX FOR THE REVENUE PERIOD OF DECEMBER 2013','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (61,'201606-0052','PLDT-PHILCOM INC.','CAGAYAN DE ORO CITY','2014-01-17',1,921,'1200000208','IN FULL PAYMENT OF SMSI\'S TELEPHONE FOR THE STATEMENT AS OF JAN 01, 2014','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (62,'201606-0053','MANILA TEACHERS\' SLAI','CAGAYAN DE ORO CITY','2014-01-17',1,30000,'1200000207','IN FULL PAYMENT OF SMSI\'S ELECTRICITY AND WATER SHARE FOR THE MONTHS OF NOVEMBER AND DECEMBER','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (63,'201606-0054','JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-01-17',1,3400,'1200000206','IN FULL PAYMENT OF SMSI\'S FUEL AND CASH ADVANCE FOR BUSINESS PERMIT','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (64,'201606-0055','RENANTE E. BUTALID &/OR JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-01-17',1,5000,'1200000205','IN FULL PAYMENT OF SMSI\'S DONATIONS/FINANCIAL ASSISTANCE FOR REB','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (65,'201606-0056','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-01-14',1,2906,'1200000204','IN FULL PAYMENT OF SMSI\'S TELEPHONE ALLOWANCE OF BBC- BILL PERIOD: NOVEMBER 13, 2013-DECEMBER 12, 20','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (66,'201606-0057','JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-01-12',1,1500,'4261595123','IN FULL PAYMENT OF SMSI\'S FUEL REQUEST','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (67,'201606-0058','SHERWIN S. VILLAMOR','CAGAYAN DE ORO CITY','2014-01-12',1,3000,'1200000203','IN FULL PAYMENT OF SSV\'S CASH ADVANCE FOR DAVAO TRAVEL','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (68,'201606-0059','SHERWIN S. VILLAMOR','CAGAYAN DE ORO CITY','2014-01-12',1,3000,'1200000203','IN FULL PAYMENT OF SSV\'S CASH ADVANCE FOR DAVAO TRAVEL','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (69,'201606-0060','METROPOLITAN BANK & TRUST COMPANY','CAGAYAN DE ORO CITY','2014-01-12',1,9601,'4261595122','IN FULL PAYMENT OF SMSI\'S PAYABLE TO JRL CREDIT CARD FOR THE PURCHASES OF DOMAIN NAMES','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (70,'201606-0061','INTERPACE COMPUTER SYSTEMS','CAGAYAN DE ORO CITY','2014-01-12',1,10485,'1200000202','IN FULL PAYMENT OF SMSI\'S A/R OF C3 AND M.CHIONGBIAN WITH PO NO. 2013-027 & 2013-028','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (71,'201606-0062','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-01-12',1,1200,'1200000201','IN FULL PAYMENT OF SMSI\'S TELEPHONE ALLOWANCE OF SSV FOR BILL PERIOD: NOVEMBER 21, 201 - DECEMBER 20','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (72,'201606-0063','JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-01-09',1,57825,'1200000200','IN FULL PAYMENT OF SMSI\'S CASH ADVANCE FOR RENEWAL OF ALL BUSINESS LICENSE FOR THE WHOLE YEAR OF 201','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (73,'201606-0064','BUREAU OF INTERNAL REVENUE','CAGAYAN DE ORO CITY','2014-01-08',1,8512,'4261595121','IN FULL PAYMENT OF SMSI\'S WITHHOLDING TAX-COMPENSATION FOR THE MONTH OF DECEMBER 2013','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (74,'201606-0065','JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-01-07',1,30073,'1200000199','IN FULL PAYMENT OF SMSI\'S STAFF BENEFITS REMITTANCES FOR DECEMBER 2013','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (75,'201606-0066','JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-01-05',1,2853,'4261595120','IN FULL PAYMENT OF SMSI\'S PETTY CASH REPLENISHMENT AND OFFICE SUPPLIES FOR THE PERIOD OF JANUARY 201','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (76,'201606-0067','JEAN A. SALVAN','CAGAYAN DE ORO CITY','2014-02-26',2,3888,'4261595131','IN FULL PAYMENT OF SMSI\'S PETTY CASH REPLENISHMENT, FUEL FOR ECQ ON MARCH 3, 2014','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (77,'201606-0068','GLOBE TELECOM','CAGAYAN DE ORO CITY','2014-02-25',1,1200,'1200000235','IN FULL PAYMENT OF SMSI\'S TELEPHONE ALLOWANCE OF SSV FOR BILL PERIOD 21 DECEMBER 2013-20 JANUARY 201','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL),
 (78,'201606-0069','DANIEL O. FAGELA &/OR JEAN A.SALVAN','CAGAYAN DE ORO CITY','2014-02-21',1,56886,'1200000234','IN FULL PAYMENT OF SMSI\'S CASH ADVANCE FOR CCTV EQUIPMENT FOR VESPA SHOWROOM','2016-06-01','PEN',5,'PEN',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_cdv` ENABLE KEYS */;


--
-- Definition of table `tbl_checks`
--

DROP TABLE IF EXISTS `tbl_checks`;
CREATE TABLE `tbl_checks` (
  `checkID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Items` varchar(100) NOT NULL,
  `amount` double(10,0) NOT NULL,
  `check_date` date NOT NULL,
  `userID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`checkID`),
  KEY `checkUserID` (`userID`),
  CONSTRAINT `checkUserID` FOREIGN KEY (`userID`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_checks`
--

/*!40000 ALTER TABLE `tbl_checks` DISABLE KEYS */;
INSERT INTO `tbl_checks` (`checkID`,`Items`,`amount`,`check_date`,`userID`) VALUES 
 (1,'Mac Book Pro',55000,'2015-11-13',5),
 (2,'Computers',30000,'2015-11-16',5),
 (15,'dcgfdg',12,'2015-12-05',5),
 (16,'Jaye',12,'2015-12-04',5),
 (17,'gfhgf',12,'2015-12-04',5),
 (18,'asas',12,'2015-12-04',5),
 (19,'ffdsf',12,'2015-12-04',5),
 (20,'dfgd',12,'2015-12-04',5),
 (21,'kjhk',12,'0000-00-00',5),
 (22,'gdf',12,'0000-00-00',5),
 (23,'Computers',5000,'2016-05-27',5),
 (24,'JEAN A. SALVAN',7509,'2014-01-26',5);
/*!40000 ALTER TABLE `tbl_checks` ENABLE KEYS */;


--
-- Definition of table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
CREATE TABLE `tbl_employee` (
  `empID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empName` varchar(100) DEFAULT NULL,
  `empAddress` varchar(100) DEFAULT NULL,
  `phoneNo` varchar(15) DEFAULT NULL,
  `idPosition` tinyint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`empID`),
  KEY `idPosition` (`idPosition`),
  CONSTRAINT `tbl_employee_ibfk_1` FOREIGN KEY (`idPosition`) REFERENCES `tbl_position` (`idPosition`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

/*!40000 ALTER TABLE `tbl_employee` DISABLE KEYS */;
INSERT INTO `tbl_employee` (`empID`,`empName`,`empAddress`,`phoneNo`,`idPosition`) VALUES 
 (1,'Alchas, Shiela','Gusa, Cdo','546456',5),
 (2,'Sherwin qq','Iponan, CDO','09123645789',2),
 (3,'Janine Jasmin','Lugait','09214563985',3),
 (4,'Jasmin, Janine','12th-29th St. Nazareth, Cdo','09093130225',1),
 (5,'Moreno, Renan','Barra, Iponan','09094569874',4),
 (6,'Arangco, Marco','Kauswagan, NHA','fdgfdg',3),
 (7,'rwe','ewr','werwer',1);
/*!40000 ALTER TABLE `tbl_employee` ENABLE KEYS */;


--
-- Definition of table `tbl_fs`
--

DROP TABLE IF EXISTS `tbl_fs`;
CREATE TABLE `tbl_fs` (
  `FSID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `FSDesc` varchar(30) NOT NULL,
  `FS` varchar(5) NOT NULL,
  PRIMARY KEY (`FSID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fs`
--

/*!40000 ALTER TABLE `tbl_fs` DISABLE KEYS */;
INSERT INTO `tbl_fs` (`FSID`,`FSDesc`,`FS`) VALUES 
 (1,'Balance Sheet','BS'),
 (2,'Income Statement','IS');
/*!40000 ALTER TABLE `tbl_fs` ENABLE KEYS */;


--
-- Definition of table `tbl_fund`
--

DROP TABLE IF EXISTS `tbl_fund`;
CREATE TABLE `tbl_fund` (
  `fundID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fundDesc` varchar(60) DEFAULT NULL,
  `fundCode` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`fundID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fund`
--

/*!40000 ALTER TABLE `tbl_fund` DISABLE KEYS */;
INSERT INTO `tbl_fund` (`fundID`,`fundDesc`,`fundCode`) VALUES 
 (1,'Optional Fund','OF'),
 (2,'General Fund','GF'),
 (3,'Basic Benefit Fund','BF'),
 (4,'Consolidated Fund','CF');
/*!40000 ALTER TABLE `tbl_fund` ENABLE KEYS */;


--
-- Definition of table `tbl_gj`
--

DROP TABLE IF EXISTS `tbl_gj`;
CREATE TABLE `tbl_gj` (
  `JID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `JVNum` varchar(30) NOT NULL,
  `transDate` date DEFAULT NULL,
  `prepBy` int(10) unsigned NOT NULL,
  `particulars` varchar(50) NOT NULL,
  `approveBy` int(10) unsigned DEFAULT NULL,
  `auditedBy` int(10) unsigned DEFAULT NULL,
  `glPOsted` varchar(10) NOT NULL DEFAULT 'PEN',
  `status` varchar(10) NOT NULL DEFAULT 'PEN',
  `brnch` varchar(10) DEFAULT 'CDO',
  PRIMARY KEY (`JID`),
  KEY `ID` (`prepBy`),
  KEY `AppID` (`approveBy`),
  CONSTRAINT `AppID` FOREIGN KEY (`approveBy`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE,
  CONSTRAINT `ID` FOREIGN KEY (`prepBy`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gj`
--

/*!40000 ALTER TABLE `tbl_gj` DISABLE KEYS */;
INSERT INTO `tbl_gj` (`JID`,`JVNum`,`transDate`,`prepBy`,`particulars`,`approveBy`,`auditedBy`,`glPOsted`,`status`,`brnch`) VALUES 
 (10,'201511-0001','2015-11-06',5,'test',NULL,5,'PEN','PEN','CDO'),
 (11,'201511-0002','2015-11-10',5,'test',NULL,NULL,'PEN','PEN','CDO'),
 (12,'201511-0003','2015-11-10',5,'dsfdsfdsf',5,NULL,'PEN','APR','CDO'),
 (13,'201511-0005','2015-11-10',5,'ddfgfg',5,5,'PEN','AUD','CDO'),
 (14,'201511-0006','2015-11-11',5,'eretret',2,5,'PEN','AUD','CDO');
/*!40000 ALTER TABLE `tbl_gj` ENABLE KEYS */;


--
-- Definition of table `tbl_gl`
--

DROP TABLE IF EXISTS `tbl_gl`;
CREATE TABLE `tbl_gl` (
  `GLID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idAcctTitle` int(10) unsigned DEFAULT NULL,
  `transDate` date NOT NULL,
  `amount` double(10,0) NOT NULL,
  `branchCode` varchar(10) NOT NULL DEFAULT 'CDO',
  `periodID` tinyint(3) unsigned DEFAULT NULL,
  `bookID` tinyint(5) unsigned DEFAULT NULL,
  `normsID` int(5) unsigned DEFAULT NULL,
  `postedBY` int(5) unsigned NOT NULL,
  PRIMARY KEY (`GLID`),
  KEY `idacctTitle_FK` (`idAcctTitle`),
  KEY `periodID_FK` (`periodID`),
  KEY `bookIDFK` (`bookID`),
  KEY `normID_FK` (`normsID`),
  CONSTRAINT `bookIDFK` FOREIGN KEY (`bookID`) REFERENCES `tbl_book` (`bookID`) ON UPDATE CASCADE,
  CONSTRAINT `idacctTitle_FK` FOREIGN KEY (`idAcctTitle`) REFERENCES `tbl_acctchart` (`idAcctTitle`) ON UPDATE CASCADE,
  CONSTRAINT `normID_FK` FOREIGN KEY (`normsID`) REFERENCES `tbl_normalbalance` (`normsID`) ON UPDATE CASCADE,
  CONSTRAINT `periodID_FK` FOREIGN KEY (`periodID`) REFERENCES `tbl_acctperiod` (`periodID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gl`
--

/*!40000 ALTER TABLE `tbl_gl` DISABLE KEYS */;
INSERT INTO `tbl_gl` (`GLID`,`idAcctTitle`,`transDate`,`amount`,`branchCode`,`periodID`,`bookID`,`normsID`,`postedBY`) VALUES 
 (1,NULL,'0000-00-00',100,'CDO',NULL,NULL,NULL,0),
 (2,1,'0000-00-00',100,'CDO',1,5,NULL,0),
 (3,14,'2015-09-01',12,'CDO',NULL,NULL,NULL,0),
 (4,14,'2015-09-01',1234,'CDO',1,5,NULL,0),
 (5,10,'2015-09-01',5354,'CDO',1,5,NULL,0),
 (6,31,'2015-09-02',5765,'CDO',1,5,2,0),
 (7,34,'2015-09-02',4324,'CDO',1,5,1,0),
 (8,3,'2015-09-22',100000,'CDO',1,5,1,0),
 (9,23,'2016-05-28',145000,'CDO',1,5,1,0);
/*!40000 ALTER TABLE `tbl_gl` ENABLE KEYS */;


--
-- Definition of table `tbl_journalentries`
--

DROP TABLE IF EXISTS `tbl_journalentries`;
CREATE TABLE `tbl_journalentries` (
  `PK` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `JID` int(10) unsigned NOT NULL,
  `idAcctTitleDB` int(10) unsigned DEFAULT NULL,
  `idAcctTitleCR` int(10) unsigned DEFAULT NULL,
  `amount` double(10,0) NOT NULL,
  PRIMARY KEY (`PK`),
  KEY `JID` (`JID`),
  KEY `CR` (`idAcctTitleCR`),
  KEY `DB` (`idAcctTitleDB`),
  CONSTRAINT `CR` FOREIGN KEY (`idAcctTitleCR`) REFERENCES `tbl_acctchart` (`idAcctTitle`) ON UPDATE CASCADE,
  CONSTRAINT `DB` FOREIGN KEY (`idAcctTitleDB`) REFERENCES `tbl_acctchart` (`idAcctTitle`) ON UPDATE CASCADE,
  CONSTRAINT `JID` FOREIGN KEY (`JID`) REFERENCES `tbl_gj` (`JID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_journalentries`
--

/*!40000 ALTER TABLE `tbl_journalentries` DISABLE KEYS */;
INSERT INTO `tbl_journalentries` (`PK`,`JID`,`idAcctTitleDB`,`idAcctTitleCR`,`amount`) VALUES 
 (15,10,35,NULL,200),
 (16,10,NULL,34,200),
 (17,11,32,NULL,100),
 (18,11,NULL,31,100),
 (19,12,32,NULL,100),
 (20,12,NULL,33,100),
 (21,13,23,NULL,100),
 (22,13,NULL,35,100),
 (23,14,32,NULL,11),
 (24,14,NULL,34,11);
/*!40000 ALTER TABLE `tbl_journalentries` ENABLE KEYS */;


--
-- Definition of table `tbl_modules`
--

DROP TABLE IF EXISTS `tbl_modules`;
CREATE TABLE `tbl_modules` (
  `module_id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modules`
--

/*!40000 ALTER TABLE `tbl_modules` DISABLE KEYS */;
INSERT INTO `tbl_modules` (`module_id`,`module_name`) VALUES 
 (1,'Manage Users'),
 (2,'Settings'),
 (3,'Accounting'),
 (4,'Tasks'),
 (5,'Reports');
/*!40000 ALTER TABLE `tbl_modules` ENABLE KEYS */;


--
-- Definition of table `tbl_mop`
--

DROP TABLE IF EXISTS `tbl_mop`;
CREATE TABLE `tbl_mop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mop`
--

/*!40000 ALTER TABLE `tbl_mop` DISABLE KEYS */;
INSERT INTO `tbl_mop` (`id`,`payment`) VALUES 
 (1,'check'),
 (2,'cash');
/*!40000 ALTER TABLE `tbl_mop` ENABLE KEYS */;


--
-- Definition of table `tbl_normalbalance`
--

DROP TABLE IF EXISTS `tbl_normalbalance`;
CREATE TABLE `tbl_normalbalance` (
  `normsID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `normDesc` varchar(8) DEFAULT NULL,
  `normCode` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`normsID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_normalbalance`
--

/*!40000 ALTER TABLE `tbl_normalbalance` DISABLE KEYS */;
INSERT INTO `tbl_normalbalance` (`normsID`,`normDesc`,`normCode`) VALUES 
 (1,'Debit','DR'),
 (2,'Credit','CR');
/*!40000 ALTER TABLE `tbl_normalbalance` ENABLE KEYS */;


--
-- Definition of table `tbl_or`
--

DROP TABLE IF EXISTS `tbl_or`;
CREATE TABLE `tbl_or` (
  `ORID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ORNum` varchar(50) NOT NULL,
  `transDate` date NOT NULL,
  `branch` int(10) unsigned NOT NULL,
  `amount` double NOT NULL,
  `particulars` varchar(50) NOT NULL,
  `userID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ORID`),
  KEY `addedBY` (`userID`),
  KEY `BRName` (`branch`),
  CONSTRAINT `BRName` FOREIGN KEY (`branch`) REFERENCES `tbl_branch` (`brID`) ON UPDATE CASCADE,
  CONSTRAINT `addedBY` FOREIGN KEY (`userID`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_or`
--

/*!40000 ALTER TABLE `tbl_or` DISABLE KEYS */;
INSERT INTO `tbl_or` (`ORID`,`ORNum`,`transDate`,`branch`,`amount`,`particulars`,`userID`) VALUES 
 (1,'464567547','2015-11-17',2,50000,'Purchased MAc Book Pro',5),
 (2,'123424','2015-11-19',6,123,'ewrewrewrer',5);
/*!40000 ALTER TABLE `tbl_or` ENABLE KEYS */;


--
-- Definition of table `tbl_permission_role`
--

DROP TABLE IF EXISTS `tbl_permission_role`;
CREATE TABLE `tbl_permission_role` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `role_id` tinyint(10) unsigned NOT NULL,
  `permission_id` tinyint(10) unsigned NOT NULL,
  `Read` tinyint(3) NOT NULL,
  `Write` tinyint(3) NOT NULL,
  `Delete` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perm_id` (`permission_id`),
  KEY `RID` (`role_id`),
  KEY `u_id` (`userid`),
  CONSTRAINT `RID` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`roleID`) ON UPDATE CASCADE,
  CONSTRAINT `perm_id` FOREIGN KEY (`permission_id`) REFERENCES `tbl_permissions` (`ID`) ON UPDATE CASCADE,
  CONSTRAINT `u_id` FOREIGN KEY (`userid`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permission_role`
--

/*!40000 ALTER TABLE `tbl_permission_role` DISABLE KEYS */;
INSERT INTO `tbl_permission_role` (`id`,`userid`,`role_id`,`permission_id`,`Read`,`Write`,`Delete`) VALUES 
 (1,5,1,1,1,1,1),
 (5,5,1,2,1,1,1),
 (6,5,1,3,1,1,1),
 (8,5,1,4,1,1,1),
 (9,5,1,5,1,1,1),
 (10,5,1,6,1,1,1),
 (11,5,1,7,1,1,1),
 (12,5,1,8,1,1,1),
 (13,5,1,9,1,1,1),
 (14,5,1,10,1,1,1),
 (15,5,1,11,1,1,1),
 (16,5,1,12,1,1,1),
 (18,5,1,13,1,1,1),
 (19,5,1,14,1,1,1),
 (20,5,1,15,1,1,1),
 (21,5,1,16,1,1,1);
/*!40000 ALTER TABLE `tbl_permission_role` ENABLE KEYS */;


--
-- Definition of table `tbl_permissions`
--

DROP TABLE IF EXISTS `tbl_permissions`;
CREATE TABLE `tbl_permissions` (
  `ID` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_title` varchar(50) NOT NULL,
  `permission_slug` varchar(50) NOT NULL,
  `module` tinyint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `moduleid_fk` (`module`),
  CONSTRAINT `moduleid_fk` FOREIGN KEY (`module`) REFERENCES `tbl_modules` (`module_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permissions`
--

/*!40000 ALTER TABLE `tbl_permissions` DISABLE KEYS */;
INSERT INTO `tbl_permissions` (`ID`,`permission_title`,`permission_slug`,`module`) VALUES 
 (1,'ManageUserMenuItem','Manage User ',1),
 (2,'EmployeeMenuItem','Employee Mgt.',2),
 (3,'PositionMenuItem','Position Mgt.',2),
 (4,'BranchMenuItem','Branch Mgt.',2),
 (5,'BankMenuIem','Bank Mgt.',2),
 (6,'BBalanceMenuItem','Creating New Beginning Balance',3),
 (7,'UpdateNumberSeriesMenuItem','Update No. Series',3),
 (8,'AccountMenuItem','Creating New Accounting Titles',3),
 (9,'FAMenuItem','Adding New Fixed Asset',3),
 (10,'WriteCheckMenuItem','Creating New Check',4),
 (11,'POMenuItem','Creating New Purchase Order',4),
 (12,'ORMenuItem','Issuing new Official Reciept',4),
 (13,'UpdateAccountingMenuItem','Update Accounting Balances',4),
 (14,'CDVMenuItem','Check Disbursement Voucher Mgt.',4),
 (15,'JVMenuItem','Journal Voucher Mgt.',4),
 (16,'APVMenuItem','Account Payable Voucher Mgt.',4);
/*!40000 ALTER TABLE `tbl_permissions` ENABLE KEYS */;


--
-- Definition of table `tbl_po`
--

DROP TABLE IF EXISTS `tbl_po`;
CREATE TABLE `tbl_po` (
  `poID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `po_num` varchar(20) NOT NULL,
  `supplier` int(10) unsigned NOT NULL,
  `branch` int(10) unsigned NOT NULL,
  `PO_date` date NOT NULL,
  `bank` int(10) unsigned NOT NULL,
  `purchasing_agent` varchar(60) NOT NULL,
  `requestedby` int(10) unsigned NOT NULL,
  `mop` int(10) unsigned NOT NULL,
  `userID` int(10) unsigned DEFAULT NULL,
  `approveBy` int(10) unsigned DEFAULT NULL,
  `status` varchar(10) DEFAULT 'PEN',
  `paymentStatus` varchar(10) NOT NULL,
  PRIMARY KEY (`poID`),
  KEY `supplierID` (`supplier`),
  KEY `idBnk` (`bank`),
  KEY `requestedBy` (`requestedby`),
  KEY `branchID` (`branch`),
  KEY `mop` (`mop`),
  KEY `userid` (`userID`),
  KEY `approveID` (`approveBy`),
  CONSTRAINT `approveID` FOREIGN KEY (`approveBy`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE,
  CONSTRAINT `branchID` FOREIGN KEY (`branch`) REFERENCES `tbl_settings` (`idSettings`) ON UPDATE CASCADE,
  CONSTRAINT `idBnk` FOREIGN KEY (`bank`) REFERENCES `tbl_bank` (`bankID`) ON UPDATE CASCADE,
  CONSTRAINT `mop` FOREIGN KEY (`mop`) REFERENCES `tbl_mop` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `requestedBy` FOREIGN KEY (`requestedby`) REFERENCES `tbl_branch` (`brID`) ON UPDATE CASCADE,
  CONSTRAINT `supplierID` FOREIGN KEY (`supplier`) REFERENCES `tbl_supplier` (`supplierID`) ON UPDATE CASCADE,
  CONSTRAINT `userid` FOREIGN KEY (`userID`) REFERENCES `tbl_useracct` (`userID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po`
--

/*!40000 ALTER TABLE `tbl_po` DISABLE KEYS */;
INSERT INTO `tbl_po` (`poID`,`po_num`,`supplier`,`branch`,`PO_date`,`bank`,`purchasing_agent`,`requestedby`,`mop`,`userID`,`approveBy`,`status`,`paymentStatus`) VALUES 
 (7,'2015015',1,1,'2015-10-15',1,'Daniel Fagela',2,1,5,5,'APR','U'),
 (8,'2015016',2,1,'2015-10-16',1,'Mikel Baculio',4,1,5,NULL,'PEN','U'),
 (9,'2015017',2,1,'2015-10-16',2,'Mikel Baculio',2,1,5,NULL,'PEN','U'),
 (10,'2015018',2,1,'2015-11-12',2,'Darylle Battad',2,1,5,NULL,'PEN','P'),
 (11,'2015019',2,1,'2015-11-12',2,'hgh',2,2,5,5,'APR','P'),
 (12,'2015020',2,1,'2015-11-12',3,'fgdfgf',4,2,5,5,'APR','U'),
 (13,'2015021',2,1,'2015-11-12',2,'dsds',4,1,5,NULL,'PEN','U'),
 (14,'2015022',2,1,'2015-11-19',3,'rewr',2,1,5,NULL,'PEN','U'),
 (15,'2016023',1,1,'2016-05-30',1,'PETE BALAGOSA',1,1,5,NULL,'PEN',''),
 (16,'2016024',1,1,'2016-05-31',1,'Jnaine Jamsin',4,1,5,5,'APR','');
/*!40000 ALTER TABLE `tbl_po` ENABLE KEYS */;


--
-- Definition of table `tbl_po_items`
--

DROP TABLE IF EXISTS `tbl_po_items`;
CREATE TABLE `tbl_po_items` (
  `itemID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `poID` int(10) unsigned NOT NULL,
  `items` varchar(200) NOT NULL,
  `qty` int(10) unsigned NOT NULL,
  `unit` int(10) unsigned NOT NULL,
  `unit_price` double(8,0) unsigned NOT NULL,
  `total` double(10,0) unsigned NOT NULL,
  PRIMARY KEY (`itemID`),
  KEY `poID` (`poID`),
  KEY `unitID` (`unit`),
  CONSTRAINT `poID` FOREIGN KEY (`poID`) REFERENCES `tbl_po` (`poID`) ON UPDATE CASCADE,
  CONSTRAINT `unitID` FOREIGN KEY (`unit`) REFERENCES `tbl_unit` (`unitID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_items`
--

/*!40000 ALTER TABLE `tbl_po_items` DISABLE KEYS */;
INSERT INTO `tbl_po_items` (`itemID`,`poID`,`items`,`qty`,`unit`,`unit_price`,`total`) VALUES 
 (2,7,'Laptop',1,1,12000,12000),
 (3,8,'CPU',2,1,12000,24000),
 (4,9,'laptop ASUS',1,1,24000,24000),
 (5,9,'CPU',1,1,10000,10000),
 (6,10,'MAC BOOK',1,1,45000,45000),
 (7,11,'dsfgfdg',12,2,12,12222),
 (8,12,'wqewewq',1,1,11,11),
 (9,13,'dsadsad',1,1,12,12),
 (10,14,'ytr',1,1,12,12),
 (11,15,'MONITOR',1,1,3895,3895),
 (12,16,'fsdfds',1,1,12,12),
 (13,16,'rt',1,2,123,123);
/*!40000 ALTER TABLE `tbl_po_items` ENABLE KEYS */;


--
-- Definition of table `tbl_position`
--

DROP TABLE IF EXISTS `tbl_position`;
CREATE TABLE `tbl_position` (
  `idPosition` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `posName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idPosition`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

/*!40000 ALTER TABLE `tbl_position` DISABLE KEYS */;
INSERT INTO `tbl_position` (`idPosition`,`posName`) VALUES 
 (1,'Administrator'),
 (2,'Operations Manager'),
 (3,'Bookkeeper'),
 (4,'Business Analyst'),
 (5,'Admin Assistant');
/*!40000 ALTER TABLE `tbl_position` ENABLE KEYS */;


--
-- Definition of table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE `tbl_roles` (
  `roleID` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_title` varchar(50) NOT NULL,
  `read` tinyint(3) NOT NULL,
  `write` tinyint(3) NOT NULL,
  `delete` tinyint(3) NOT NULL,
  `print` tinyint(3) NOT NULL,
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

/*!40000 ALTER TABLE `tbl_roles` DISABLE KEYS */;
INSERT INTO `tbl_roles` (`roleID`,`role_title`,`read`,`write`,`delete`,`print`) VALUES 
 (1,'super_admin',1,1,1,1),
 (2,'admin_assistant',1,1,1,1),
 (3,'bookkeeper',1,1,0,1);
/*!40000 ALTER TABLE `tbl_roles` ENABLE KEYS */;


--
-- Definition of table `tbl_series`
--

DROP TABLE IF EXISTS `tbl_series`;
CREATE TABLE `tbl_series` (
  `idNum` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numSeries` varchar(15) DEFAULT NULL,
  `Description` varchar(30) DEFAULT NULL,
  `ABRV` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idNum`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_series`
--

/*!40000 ALTER TABLE `tbl_series` DISABLE KEYS */;
INSERT INTO `tbl_series` (`idNum`,`numSeries`,`Description`,`ABRV`) VALUES 
 (1,'7','Journal Voucher','JV'),
 (2,'70','Check Disbursement Voucher','CDV'),
 (3,'10','Accounts Payable Voucher','APV'),
 (4,'25','Purchase Order','PO'),
 (5,'001','Statement of Account','SOA');
/*!40000 ALTER TABLE `tbl_series` ENABLE KEYS */;


--
-- Definition of table `tbl_settings`
--

DROP TABLE IF EXISTS `tbl_settings`;
CREATE TABLE `tbl_settings` (
  `idSettings` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(30) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`idSettings`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

/*!40000 ALTER TABLE `tbl_settings` DISABLE KEYS */;
INSERT INTO `tbl_settings` (`idSettings`,`item`,`value`) VALUES 
 (1,'BranchName','Solutions Management System Inc');
/*!40000 ALTER TABLE `tbl_settings` ENABLE KEYS */;


--
-- Definition of table `tbl_supplier`
--

DROP TABLE IF EXISTS `tbl_supplier`;
CREATE TABLE `tbl_supplier` (
  `supplierID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` (`supplierID`,`supplier`,`address`,`phone`) VALUES 
 (1,'Interpace','CDO','2239052'),
 (2,'MicroTrade GSM','CDO Hayes','9052223');
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;


--
-- Definition of table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
CREATE TABLE `tbl_unit` (
  `unitID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(50) NOT NULL,
  PRIMARY KEY (`unitID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

/*!40000 ALTER TABLE `tbl_unit` DISABLE KEYS */;
INSERT INTO `tbl_unit` (`unitID`,`unit`) VALUES 
 (1,'Pc(s)'),
 (2,'Box(s)');
/*!40000 ALTER TABLE `tbl_unit` ENABLE KEYS */;


--
-- Definition of table `tbl_useracct`
--

DROP TABLE IF EXISTS `tbl_useracct`;
CREATE TABLE `tbl_useracct` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empID` int(10) unsigned DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role_title` tinyint(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userID`),
  KEY `UserFK` (`empID`),
  KEY `role_title` (`role_title`),
  CONSTRAINT `UserFK` FOREIGN KEY (`empID`) REFERENCES `tbl_employee` (`empID`) ON UPDATE CASCADE,
  CONSTRAINT `role_title` FOREIGN KEY (`role_title`) REFERENCES `tbl_roles` (`roleID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useracct`
--

/*!40000 ALTER TABLE `tbl_useracct` DISABLE KEYS */;
INSERT INTO `tbl_useracct` (`userID`,`empID`,`username`,`password`,`role_title`,`remember_token`,`created_at`,`updated_at`,`active`) VALUES 
 (2,1,'ff','ff',2,'','2016-01-29 10:27:29','2016-01-29 10:27:29',1),
 (5,4,'aa','aa',1,'','2016-05-30 14:27:24','2016-05-30 14:27:24',1),
 (10,6,'marco','dwefdfd',3,NULL,'2016-05-30 16:22:17','2016-05-30 16:22:17',1);
/*!40000 ALTER TABLE `tbl_useracct` ENABLE KEYS */;


--
-- Definition of procedure `ACCOUNTING_ENTRY_BB`
--

DROP PROCEDURE IF EXISTS `ACCOUNTING_ENTRY_BB`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACCOUNTING_ENTRY_BB`(IN IDACCOUNT INT,IN AMOUNT DOUBLE(18,2))
BEGIN 
	/*SET @BRANCHCODE = (SELECT code FROM tbl_branch WHERE brID = (SELECT idBranch FROM tblsettings))*/

	IF ((SELECT normsID FROM tbl_acctchart WHERE idAcctTitle=IDACCOUNT)=1) THEN
		INSERT INTO tbl_gl(idAcctTitle,transDate,Debit,periodID,book)
		VALUES(IDACCOUNT,curdate,AMOUNT,PERIOD,'BB');
	END IF;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
