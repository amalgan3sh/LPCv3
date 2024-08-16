-- Agent Query details

CREATE TABLE `agent_bank_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `swift_code` varchar(200) NOT NULL,
  `acc_holder_name` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `iban_no` varchar(200) NOT NULL,
  `bank_address` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- New query details 
ALTER TABLE `kyc_registration` ADD `other_documents` text;

ALTER TABLE `kyc_registration` ADD `tax_details` varchar(200), ADD `iec_code` varchar(200);

-- Franchise Query 
CREATE TABLE `franchise_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `franchise_id` int(11) NOT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `franchise_bank_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `swift_code` varchar(200) NOT NULL,
  `acc_holder_name` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `iban_no` varchar(200) NOT NULL,
  `bank_address` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Supplier DB Changes

CREATE TABLE `supplier_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `kyc_registration` ADD `gmp_certificate` varchar(200);

CREATE TABLE `supplier_bank_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `swift_code` varchar(200) NOT NULL,
  `acc_holder_name` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `iban_no` varchar(200) NOT NULL,
  `bank_address` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `user_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- SPRINT #3 QUERY
ALTER TABLE `kyc_registration` ADD `added_date` date, ADD `added_time` time;

