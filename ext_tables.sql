

#
# Table structure for table 'tx_wsflexslider_domain_model_image'
#
CREATE TABLE tx_wsflexslider_domain_model_image (

	uid int(11) unsigned NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,

	content_uid int(11) unsigned DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	fal_image int(11) unsigned DEFAULT '0',
	link text,
	textposition varchar(10) DEFAULT 'left' NOT NULL,
	styleclass varchar(10) DEFAULT 'style1' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	sorting int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) unsigned DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) unsigned DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);


CREATE TABLE tt_content (
	tx_wsflexslider_images text
);