CREATE TABLE `campaigns`(
	`id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, 
	`title` VARCHAR(48) NOT NULL, 
	`html` TEXT NOT NULL, 
	`active` BOOLEAN NOT NULL, 
	`start_time` DATETIME NOT NULL, 
	`stop_time` DATETIME NOT NULL, 
	`pass_percent` SMALLINT UNSIGNED NOT NULL,
	`failure_threshold` SMALLINT UNSIGNED NOT NULL, 
	`questions_weighted` BOOLEAN NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `questions`(
	`id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT, 
	`campaign_id` SMALLINT UNSIGNED NOT NULL,
	`answers_weighted` BOOLEAN NOT NULL,
	`weight` SMALLINT UNSIGNED NOT NULL,
	`html` TEXT NOT NULL, 
	`multiple_answers` BOOLEAN NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = InnoDB;


CREATE TABLE `answers`(
	`id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT, 
	`question_id` MEDIUMINT UNSIGNED NOT NULL,
	`weight` SMALLINT UNSIGNED NOT NULL, 
	`html` TEXT NOT NULL, 
	`correct` BOOLEAN NOT NULL, 
	`explanation` TEXT NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE `user_roles`(
	`id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
	`local_name` VARCHAR(32) NOT NULL, 
	`external_name` VARCHAR(128) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `campaign_roles`(
	`id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`campaign_id` SMALLINT UNSIGNED NOT NULL, 
	`user_role_id` TINYINT UNSIGNED NOT NULL, 
	`grace_period` TIME NOT NULL,
	`reminder_interval` TIME NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE `attempts`(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	`user_identifier` VARCHAR(64) NOT NULL, 
	`campaign_id` SMALLINT UNSIGNED NOT NULL,
	`start_time` DATETIME NOT NULL, 
	`last_skip` DATETIME,
	`score` FLOAT(4,2) NOT NULL, 
	`attempts` TINYINT UNSIGNED NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = InnoDB;
