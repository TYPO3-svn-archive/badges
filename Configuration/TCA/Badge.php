<?php
if(!defined ('TYPO3_MODE')) {
	die('Access denied.');
}

$TCA['tx_badges_domain_model_badge'] = array(
	'ctrl' => $TCA['tx_badges_domain_model_badge']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, date_start, date_end, category, parentid, starttime, endtime',
	),
	'types' => array(
		'1' => array('showitem' => 'parentid, category, date_start, date_end, --div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access, hidden;;1, starttime, endtime'),
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'tstamp' => Array (
			'exclude' => 1,
		),
		'crdate' => Array (
			'exclude' => 1,
		),
		'date_start' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:badges/Resources/Private/Language/locallang_db.xml:tx_badges_domain_model_badge.date_start',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
			),
		),
		'date_end' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:badges/Resources/Private/Language/locallang_db.xml:tx_badges_domain_model_badge.date_end',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
			),
		),
		'category' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:badges/Resources/Private/Language/locallang_db.xml:tx_badges_domain_model_badge.category',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_badges_domain_model_category',
				'foreign_table_where' => 'ORDER BY tx_badges_domain_model_category.title',
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'int,required'
			),
		),
		'parentid' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
?>