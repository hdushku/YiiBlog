CREATE TABLE `blg_page` 
(
    `id`              BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title`           VARCHAR(128) NOT NULL,
    `url`             VARCHAR(128) NOT NULL,
    `text`            TEXT,
    `pageTitle`       VARCHAR(250),
    `pageKeywords`    VARCHAR(250),
    `pageDescription` VARCHAR(250),
    `createTime`      BIGINT UNSIGNED,
    `updateTime`      BIGINT UNSIGNED,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE `blg_post`
(
	`id`                BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`title`             VARCHAR(128) NOT NULL,
    `url`               VARCHAR(128) NOT NULL,
	`text`              TEXT NOT NULL,
	`tags`              TEXT,
	`status`            INTEGER NOT NULL,
    `pageTitle`         VARCHAR(250),
    `pageKeywords`      VARCHAR(250),
    `pageDescription`   VARCHAR(250),
	`createTime`        BIGINT UNSIGNED,
	`updateTime`        BIGINT UNSIGNED,
    `anonceText`        text,
    `image`             VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE `blg_tag`
(
	`id`            BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name`          VARCHAR(128) NOT NULL,
	`frequency`     INTEGER DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;