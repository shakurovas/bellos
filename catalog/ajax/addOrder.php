<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

global $USER;

if(\CModule::IncludeModule('iblock') && isset($_SESSION['BASKET']) && !empty($_SESSION['BASKET'])) {

	// getting the ID of infoblock with orders
	CModule::IncludeModule("iblock");
	$arrFilter = array(
		'CODE'    => 'orders',
		'SITE_ID' => "s1",
	);

	// getting the infoblock with orders
	$res = CIBlock::GetList(Array("SORT" => "ASC"), $arrFilter, false);

	// getting the ID of the infoblock with orders
	if ($arRes = $res->Fetch()) {
		$ordersIBlockID = $arRes["ID"];
	}


    $productNames = [];
    foreach ($_SESSION['BASKET']['PRODUCTS'] as $name => $props) {
        $productNames[] = $name;
    }



    // getting the ID of infoblock with products
	$arrFilterForGoods = array(
		'CODE'    => 'products',
		'SITE_ID' => "s1",
	);

	$resGoods = \CIBlock::GetList(Array("SORT" => "ASC"), $arrFilterForGoods, false);

	// getting the ID of the infoblock with products
	if ($arResGoods = $resGoods->Fetch()) {
		$productsIBlockID = $arResGoods["ID"];
	}

	// getting the info about the products
	$rsGoods = CIBlockElement::GetList(
		array("ID"=>"DESC"),
		array("IBLOCK_ID" => $productsIBlockID, 'NAME' => $productNames),
		false,
		false,
		array('ID', 'NAME')
	);

    $namesIDs = [];
	while($arGoods = $rsGoods->fetch()) {
		$namesIDs[$arGoods['NAME']] = $arGoods['ID'];
	}

				
	$arrayToSend = [];
    foreach ($_SESSION['BASKET']['PRODUCTS'] as $name => $props) {
        $arrayToSend[$namesIDs[$name]] = (int)$props['AMOUNT'];
    }


	// adding the new element for infoblock with orders
	$el = new \CIBlockElement;

	$el->Add([
		'IBLOCK_ID' => $ordersIBlockID,
		'NAME' => GetMessage('ORDER_TITLE'),
		'PROPERTY_VALUES' => array(
			'CLIENT' => $USER->GetID(),
			'ORDERED_PRODUCTS' => serialize($arrayToSend),
            'STATUS' => 5
		)
		
	]);

	unset($_SESSION['BASKET']);
	
}
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');