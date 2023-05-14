<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$APPLICATION->RestartBuffer();
if(isset($_POST['product_to_delete'])) {
	session_start();
	
	if (isset($_SESSION['BASKET']['PRODUCTS'][$_POST['product_to_delete'][0]])) {
		unset($_SESSION['BASKET']['PRODUCTS'][$_POST['product_to_delete'][0]]);
		$_SESSION['BASKET']['TOTAL_SUM'] -= $_POST['product_to_delete'][1];
	}

	if ($_POST['device_type'] == 'mobile') {
		$newTable = ['<h3 class="order__mobile__subtitle">Детали заказа:</h3>'];
	} else {
		$newTable = [];
	}

	if (isset($_SESSION['BASKET']['PRODUCTS']) && !empty($_SESSION['BASKET']['PRODUCTS'])) {
		foreach ($_SESSION['BASKET']['PRODUCTS'] as $name => $props) {
			if ($_POST['device_type'] == 'mobile') {
				$newTable[] = '<div class="order__mobile__wrap"><h4 class="order__mobile__description">' . $name . '</h4><div class="order__mobile__block-top"><div class="order__mobile__wrapper"><p class="order__mobile__text">Остаток:</p><p class="order__mobile__text">10 000 шт.</p></div><div class="order__mobile__wrapper"><p class="order__mobile__text">Цена:</p><p class="order__mobile__text">' . $props['PRICE'] . '</p></div></div><div class="order__mobile__block"><div class="order__mobile__block-color"><p class="order__mobile__text-color">Сумма: </p><p class="order__mobile__text-color">' . number_format((int)$props['SUM'], 0, '.', ',') . '.</p></div><div class="order__mobile__counter"><div class="counter"><div class="order__mobile__price__wrap price__wrap"><button type="button" class="minus order__mobile__minus">-</button> <input type="number" class="number order__mobile__input" value="' . $props['AMOUNT'] . '" placeholder="1"> <button type="button" class="order__mobile__plus plus">+</button></div></div></div><button class="order__mobile__btn" onclick="deleteFromOrder(' . CUtil::PhpToJSObject(array($name, $props['SUM'], 'mobile')) . ')">Убрать</button></div></div>';
			} else {
				$newTable[] = '<tr class="order__table-third__line"><td class="order__table-third__column">' . $name . '</td><td class="order__table-third__column">' . $props['AMOUNT'] . '</td><td class="order__table-third__column">' . $props['PRICE'] . ' руб </td><td class="order__table-third__column">' . $props['SUM'] . '</td><td class="order__table-third__column"><button id="delete-button" onclick="deleteFromOrder(' . CUtil::PhpToJSObject(array($name, $props['SUM'], 'desktop')) . ')"><img src="/local/templates/bellos/images/icons/cross.svg" alt=""></button></td></tr>';
			}
		}
	} else {
		if ($_POST['device_type'] == 'mobile') {
			$newTable[] = '<div class="order__mobile__wrap"><h4 class="order__mobile__description">В корзине нет товаров</h4></div>';
		} else {
			$newTable[] = '<tr class="order__table-third__line"><td colspan="5" class="order__table-third__column">В корзине нет товаров</td></tr>';
		}
	}

	$newTableData = implode('', $newTable);

	print_r(json_encode([
		'tableData' => $newTableData,
		'totalSum' => $_SESSION['BASKET']['TOTAL_SUM']
	]));

	die();
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");