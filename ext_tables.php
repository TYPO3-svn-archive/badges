<?php
if(!defined('TYPO3_MODE')) {
	die('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Main',
	'Badges'
);
$TCA['tt_content']['types']['list']['subtypes_addlist']['badges_main'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue('badges_main', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForm/Main.xml');
// remove some fields from the plugin
$TCA['tt_content']['types']['list']['subtypes_excludelist']['badges_main'] = 'layout,select_key';

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Badges');

t3lib_extMgm::addLLrefForTCAdescr('tx_badges_domain_model_badge', 'EXT:badges/Resources/Private/Language/locallang_csh_badges.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_badges_domain_model_badge');
$TCA['tx_badges_domain_model_badge'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:badges/Resources/Private/Language/locallang_db.xml:tx_badges_domain_model_badge',
		'label' => 'category',
		#'label_alt' => 'category, date_start',
		#'label_alt_force' => TRUE,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Badge.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/badge.gif'
	),
);

t3lib_extMgm::allowTableOnStandardPages('tx_badges_domain_model_category');
$TCA['tx_badges_domain_model_category'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:badges/Resources/Private/Language/locallang_db.xml:tx_badges_domain_model_category',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/category.gif'
	),
);

$tempColumns = array(
	'tx_badges_badge' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:badges/Resources/Private/Language/locallang_db.xml:fe_users.tx_badges_badge',
		'config' => array (
			'type' => 'inline',
			'foreign_table' => 'tx_badges_domain_model_badge',
			'foreign_field' => 'parentid',
			'foreign_default_sortby' => 'date_start',
			#'foreign_sortby' => 'date_start',
			#'foreign_table_where' => 'ORDER BY tx_badges_domain_model_badge.date_start'
		)
	),
);

t3lib_div::loadTCA('fe_users');
t3lib_extMgm::addTCAcolumns('fe_users', $tempColumns, 1);
t3lib_extMgm::addToAllTCAtypes('fe_users', '--div--;LLL:EXT:badges/Resources/Private/Language/locallang_db.xml:tt_content.tab.badges, tx_badges_badge');
?>