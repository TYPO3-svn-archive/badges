<?php

########################################################################
# Extension Manager/Repository config file for ext: "badges"
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Badges for FE users',
	'description' => 'Assign badges to frontend users. Listing of FE users, filtering by badges and A to Z list. Used on typo3.org.',
	'category' => 'plugin',
	'author' => 'Sven Burkert',
	'author_email' => 'bedienung@sbtheke.de',
	'author_company' => 'SBTheke web development',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'version' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-4.9.99',
			'extbase' => '1.3',
			'fluid' => '1.3',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);
?>