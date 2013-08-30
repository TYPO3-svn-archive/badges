<?php
if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Main',
	array(
		'Badge' => 'list, listUncached',
	),
	// non-cacheable actions
	array(
		'Badge' => 'listUncached',
	)
);
?>