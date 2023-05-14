<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$APPLICATION->RestartBuffer();
if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['amount'])) {
	
	session_start();
	
    if ($_POST['amount']) {
        if (!isset($_SESSION['BASKET']['PRODUCTS'][$_POST['name']])) {
            $_SESSION['BASKET']['PRODUCTS'][$_POST['name']]['AMOUNT'] = $_POST['amount']; 
            $_SESSION['BASKET']['PRODUCTS'][$_POST['name']]['PRICE'] = $_POST['price']; 
            $_SESSION['BASKET']['PRODUCTS'][$_POST['name']]['SUM'] = $_POST['amount'] * $_POST['price'];
        } else {
            $_SESSION['BASKET']['PRODUCTS'][$_POST['name']]['AMOUNT'] += $_POST['amount']; 
            $_SESSION['BASKET']['PRODUCTS'][$_POST['name']]['SUM'] += $_POST['amount'] * $_POST['price'];
        }
    
        if (!isset($_SESSION['BASKET']['TOTAL_SUM'])) {
            $_SESSION['BASKET']['TOTAL_SUM'] = $_POST['amount'] * $_POST['price'];
        } else {
            $_SESSION['BASKET']['TOTAL_SUM'] += $_POST['amount'] * $_POST['price'];
        }

        $newTable = [];
		foreach ($_SESSION['BASKET']['PRODUCTS'] as $name => $props) {
			$newTable[] = '<tr class="order__table-third__line"><td class="order__table-third__column">' . $name . '</td><td class="order__table-third__column">' . $props['AMOUNT'] . '</td><td class="order__table-third__column">' . $props['PRICE'] . ' руб </td><td class="order__table-third__column">' . $props['SUM'] . '</td><td class="order__table-third__column"><button id="delete-button" onclick="deleteFromOrder('. CUtil::PhpToJSObject(array($name, $props['SUM'], 'desktop')) . ')"><img src="/local/templates/bellos/images/icons/cross.svg" alt=""></button></td></tr>';
		}
		$newTableData = implode('', $newTable);
		print_r(json_encode([
			'tableData' => $newTableData,
			'totalSum' => $_SESSION['BASKET']['TOTAL_SUM'],
            'status' => 'success_order_modal'
        ]));
        
    } else {
        print_r(json_encode([
            'status' => 'zero_amount_of_goods'
        ]));
    }

	die();
}