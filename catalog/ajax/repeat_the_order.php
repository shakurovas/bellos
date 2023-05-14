<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$APPLICATION->RestartBuffer();
if(isset($_POST['products'])) {
	
	session_start();
	
	foreach ($_POST['products'] as $name => $props) {
		if (!isset($_SESSION['BASKET']['PRODUCTS'][$name])) {
			$_SESSION['BASKET']['PRODUCTS'][$name] = $props; 
			$_SESSION['BASKET']['PRODUCTS'][$name]['SUM'] = $props['AMOUNT'] * $props['PRICE'];
		} else {
			$_SESSION['BASKET']['PRODUCTS'][$name]['AMOUNT'] += $props['AMOUNT']; 
			$_SESSION['BASKET']['PRODUCTS'][$name]['SUM'] += $props['AMOUNT'] * $props['PRICE'];
		}

		if (!isset($_SESSION['BASKET']['TOTAL_SUM'])) {
			$_SESSION['BASKET']['TOTAL_SUM'] = $props['AMOUNT'] * $props['PRICE'];
		} else {
			$_SESSION['BASKET']['TOTAL_SUM'] += $props['AMOUNT'] * $props['PRICE'];
		}
		
	}

	if (!isset($_POST['is_from_history_or_catalog'])) {
		$newTable = [];
		foreach ($_SESSION['BASKET']['PRODUCTS'] as $name => $props) {
			$newTable[] = '<tr class="order__table-third__line"><td class="order__table-third__column">' . $name . '</td><td class="order__table-third__column">' . $props['AMOUNT'] . '</td><td class="order__table-third__column">' . $props['PRICE'] . ' руб </td><td class="order__table-third__column">' . $props['SUM'] . '</td><td class="order__table-third__column"><button id="delete-button" onclick="deleteFromOrder('. CUtil::PhpToJSObject(array($name, $props['SUM'], 'desktop')) . ')"><img src="/local/templates/bellos/images/icons/cross.svg" alt=""></button></td></tr>';
		}
		$newTableData = implode('', $newTable);
		print_r(json_encode([
			'tableData' => $newTableData,
			'totalSum' => $_SESSION['BASKET']['TOTAL_SUM']
		]));
	} else {
		print_r(json_encode([
			'status' => 'success_history_or_mobile'
		]));
	}

	die();
}