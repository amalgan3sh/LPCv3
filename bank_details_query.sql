
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

ALTER TABLE `kyc_registration` ADD `other_documents` text;
