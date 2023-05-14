<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Localization\Loc;
$APPLICATION->RestartBuffer();
if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['amount']) && isset($_POST['device_type'])) {
	
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
        if ($_POST['device_type'] == 'desktop') {
            foreach ($_SESSION['BASKET']['PRODUCTS'] as $name => $props) {
                $newTable[] = '<tr class="order__table-third__line"><td class="order__table-third__column">' . $name . '</td><td class="order__table-third__column">' . $props['AMOUNT'] . '</td><td class="order__table-third__column">' . $props['PRICE'] . ' руб </td><td class="order__table-third__column">' . $props['SUM'] . '</td><td class="order__table-third__column"><button id="delete-button" onclick="deleteFromOrder('. CUtil::PhpToJSObject(array($name, $props['SUM'], 'desktop')) . ')"><img src="/local/templates/bellos/images/icons/cross.svg" alt=""></button></td></tr>';
            }
        } else if ($_POST['device_type'] == 'mobile') {
            $newTable[] = '<h3 class="order__mobile__subtitle">' . Loc::getMessage('ORDER_DETAILS_CAPITALIZED'). ':</h3>';
            foreach ($_SESSION['BASKET']['PRODUCTS'] as $name => $props) {
                $newTable[] = '<div class="order__mobile__wrap" style="border-bottom: #EAEAEA 1px solid;"><h4 class="order__mobile__description">' . $name . '</h4><div class="order__mobile__block-top"><div class="order__mobile__wrapper"><p class="order__mobile__text">' . Loc::getMessage('REMAINS') . ':</p><p class="order__mobile__text">10 000 ' . Loc::getMessage('UNIT') . '</p></div><div class="order__mobile__wrapper"><p class="order__mobile__text">' . Loc::getMessage('PRICE_CAPITALIZED') . ':</p><p class="order__mobile__text">' . $props['PRICE'] . '</p></div></div><div class="order__mobile__block"><div class="order__mobile__block-color"><p class="order__mobile__text-color">' . Loc::getMessage('SUM') . ':</p><p class="order__mobile__text-color sum"> ' . number_format($props['SUM'], 0, '.', ',') . '.</p></div><div class="order__mobile__counter"><div class="counter"><div class="order__mobile__price__wrap price__wrap"><button type="button" class="minus order__mobile__minus" onclick="minusOrderSum(' . $props['PRICE'] . ', ' . array_search($name, array_keys($_SESSION['BASKET']['PRODUCTS'])) . ')">-</button> <input type="number" class="number order__mobile__input input-for-order" value="' . $props['AMOUNT'] . '" placeholder="1"> <button type="button" class="order__mobile__plus plus" onclick="plusOrderSum(' . $props['PRICE'] . ', ' . array_search($name, array_keys($_SESSION['BASKET']['PRODUCTS'])) . ')">+</button></div></div></div><button class="order__mobile__btn" onclick="deleteFromOrder(' . CUtil::PhpToJSObject(array($name, $props['SUM'], 'mobile')) . ')">' . Loc::getMessage('REMOVE') . '</button></div></div>'; 
            }
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