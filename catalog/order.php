<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "создать заказ");
$APPLICATION->SetTitle("создать заказ");
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);


use Bitrix\Main\Page\Asset;
Asset::getInstance()->addJs('/catalog/js/cart_handler.js');
Asset::getInstance()->addJs('/catalog/js/plus_minus_handler.js');
Asset::getInstance()->addJs("/catalog/js/delete_from_order.js");
Asset::getInstance()->addJs("/catalog/js/addOrder.js");
Asset::getInstance()->addJs("/local/templates/bellos/js/changing_colors.js");

?><main class="page" id="brands"> <section class="catalog">
<div class="container">
	<div class="catalog__wrap__block">
 <a href="/catalog/catalog.php"><button class="catalog__button"><?=Loc::getMessage('CATALOG');?></button></a> <a href="/catalog/order.php"><button class="catalog__button" style="background: black; color: white;"><?=Loc::getMessage('CREATE_AN_ORDER');?></button></a> <a href="/personal_data/history-of-orders.php"><button class="catalog__button"><?=Loc::getMessage('HISTORY_OF_ORDERS');?></button></a> <a href="/personal_data/"><button class="catalog__button"><?=Loc::getMessage('PERSONAL_DATA');?></button></a>
	</div>
</div>
 </section> <section class="order">
<div class="container">
	<ul class="catalog__list-top">
		<li class="catalog__item-top"><a href="/menu_buttons/"><?=Loc::getMessage('PERSONAL_ACCOUNT');?></a></li>
		<li class="catalog__item-top"><a href="/catalog/order.php"><?=Loc::getMessage('MAKE_AN_ORDER');?></a></li>
	</ul>
</div>
<div class="container__stock">
<?php global $USER;
	if (!$USER->IsAuthorized()) {
		echo '<p class="main__subtitle">' . Loc::getMessage('YOU_ARE_NOT_AUTHORIZED') . '</p>';
	} else {?>
		<div class="order__blocks">
			<div class="order__wrapper">
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.search",
							"bellos_catalog",
							Array(
								"ACTION_VARIABLE" => "action",
								"AJAX_MODE" => "N",
								"AJAX_OPTION_ADDITIONAL" => "",
								"AJAX_OPTION_HISTORY" => "N",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "Y",
								"BASKET_URL" => "/catalog/order.php",
								"CACHE_TIME" => "36000000",
								"CACHE_TYPE" => "A",
								"CHECK_DATES" => "N",
								"DETAIL_URL" => "#SITE_DIR#/catalog/#SECTION_ID#/#ELEMENT_ID#/",
								"DISPLAY_BOTTOM_PAGER" => "Y",
								"DISPLAY_COMPARE" => "N",
								"DISPLAY_TOP_PAGER" => "N",
								"ELEMENT_SORT_FIELD" => "sort",
								"ELEMENT_SORT_FIELD2" => "id",
								"ELEMENT_SORT_ORDER" => "asc",
								"ELEMENT_SORT_ORDER2" => "desc",
								"IBLOCK_ID" => "2",
								"IBLOCK_TYPE" => "products",
								"LINE_ELEMENT_COUNT" => "3",
								"NO_WORD_LOGIC" => "N",
								"OFFERS_LIMIT" => "5",
								"PAGER_DESC_NUMBERING" => "N",
								"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
								"PAGER_SHOW_ALL" => "N",
								"PAGER_SHOW_ALWAYS" => "N",
								"PAGER_TEMPLATE" => ".default",
								"PAGER_TITLE" => "Товары",
								"PAGE_ELEMENT_COUNT" => "30",
								"PRICE_CODE" => array(),
								"PRICE_VAT_INCLUDE" => "Y",
								"PRODUCT_ID_VARIABLE" => "id",
								"PRODUCT_PROPERTIES" => array(),
								"PRODUCT_PROPS_VARIABLE" => "prop",
								"PRODUCT_QUANTITY_VARIABLE" => "quantity",
								"PROPERTY_CODE" => array("",""),
								"RESTART" => "N",
								"SECTION_ID_VARIABLE" => "SECTION_ID",
								"SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_ID#/",
								"SHOW_PRICE_COUNT" => "1",
								"USE_LANGUAGE_GUESS" => "Y",
								"USE_PRICE_COUNT" => "N",
								"USE_PRODUCT_QUANTITY" => "N",
								"USE_SEARCH_RESULT_ORDER" => "N",
								"USE_TITLE_RANK" => "N"
							)
						);?><br>
			</div>
			<div class="order__wrapper order__wrapper-second">
				<div class="order__wrap-bottom">
					<h3 class="order__subtitle"><?=Loc::getMessage('PREVIOUS_ORDERS');?></h3>
					<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"orders_list_new_order", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "DATE_CREATE",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "products",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "ORDERED_PRODUCTS",
			1 => "CLIENT",
			2 => "STATUS",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "orders_list_new_order"
	),
	false
);?>
				</div>
				<div class="order__wrap-bottom-right">
					<h3 class="order__subtitle"><?=Loc::getMessage('ORDER_DETAILS');?></h3>
					<table class="order__table-third" id="ajax-content">
					<thead>
					<tr class="order__table-third__line">
						<td class="order__table-third__column order__table-third__column-top">
							<?=Loc::getMessage('GOOD');?>
						</td>
						<td class="order__table-third__column order__table-third__column-top">
							<?=Loc::getMessage('AMOUNT');?>
						</td>
						<td class="order__table-third__column order__table-third__column-top">
							<?=Loc::getMessage('PRICE');?>
						</td>
						<td class="order__table-third__column order__table-third__column-top">
							<?=Loc::getMessage('TOTAL_SUM');?>
						</td>
						<td class="order__table-third__column order__table-third__column-top">
						</td>
					</tr>
					</thead>
					<tbody>
					<?php if (isset($_SESSION['BASKET']['PRODUCTS']) && !empty($_SESSION['BASKET']['PRODUCTS'])):?>
						<?php foreach ($_SESSION['BASKET']['PRODUCTS'] as $name => $props):?>
							<tr class="order__table-third__line">
								<td class="order__table-third__column">
									<?=$name;?>
								</td>
								<td class="order__table-third__column">
									<?=$props['AMOUNT'];?>
								</td>
								<td class="order__table-third__column">
									<?=$props['PRICE'];?> <?=Loc::getMessage('RUB_UPPERCASE');?>
								</td>
								<td class="order__table-third__column">
									<?=$props['SUM'];?>
								</td>
								<td class="order__table-third__column">
									<button id="delete-button" onclick="deleteFromOrder(<?=CUtil::PhpToJSObject(array($name, $props['SUM'], 'desktop'));?>)"><img src="<?=SITE_TEMPLATE_PATH;?>/images/icons/cross.svg" alt=""></button>
								</td>
							</tr>
						<?php endforeach;?>
					<?php else:?>
						<tr class="order__table-third__line">
							<td colspan="5" class="order__table-third__column">
								<?=Loc::getMessage('NO_GOODS_ADDED_TO_CART');?>
							</td>
						</tr>
					<?php endif;?>
					
					
					</tbody>
					</table>
				</div>
			</div>
			<div class="order__mobile" id="order-content-mobile">
				<h3 class="order__mobile__subtitle"><?=Loc::getMessage('ORDER_DETAILS_CAPITALIZED');?>:</h3>

				<?php if (isset($_SESSION['BASKET']['PRODUCTS']) && !empty($_SESSION['BASKET']['PRODUCTS'])):?>
					<?php foreach($_SESSION['BASKET']['PRODUCTS'] as $name => $props):?>
						<div class="order__mobile__wrap">
							<h4 class="order__mobile__description"><?=$name;?></h4>
							<div class="order__mobile__block-top">
								<div class="order__mobile__wrapper">
									<p class="order__mobile__text">
										<?=Loc::getMessage('REMAINS');?>:
									</p>
									<p class="order__mobile__text">
										10 000 <?=Loc::getMessage('UNIT');?>
									</p>
								</div>
								<div class="order__mobile__wrapper order-mobile-price">
									<p class="order__mobile__text">
										<?=Loc::getMessage('PRICE_CAPITALIZED');?>:
									</p>
									<p class="order__mobile__text">
										<?=$props['PRICE'];?>
									</p>
								</div>
							</div>
							<div class="order__mobile__block">
								<div class="order__mobile__block-color" style="width: 60px;">
									<p class="order__mobile__text-color">
										<?=Loc::getMessage('SUM');?>:
									</p>
									<p class="order__mobile__text-color sum">
										<?=' ' . number_format($props['SUM'], 0, '.', ',');?>.
									</p>
								</div>
								<div class="order__mobile__counter" style="max-width: 60px;">
									<div class="counter">
										<div class="order__mobile__price__wrap price__wrap">
											<button type="button" class="minus order__mobile__minus" onclick="minusOrderSum(<?=$props['PRICE'];?>, <?=array_search($name, array_keys($_SESSION['BASKET']['PRODUCTS']));?>)">-</button> <input type="number" class="number order__mobile__input input-for-order" value="<?=$props['AMOUNT'];?>" placeholder="1"> <button type="button" class="order__mobile__plus plus" onclick="plusOrderSum(<?=$props['PRICE'];?>, <?=array_search($name, array_keys($_SESSION['BASKET']['PRODUCTS']));?>)">+</button>
										</div>
									</div>
								</div>
								<button style="width: 50px;" class="order__mobile__btn" onclick="deleteFromOrder(<?=CUtil::PhpToJSObject(array($name, $props['SUM'], 'mobile'));?>)"><?=Loc::getMessage('REMOVE');?></button>
							</div>
						</div>
					<?php endforeach;?>
				<?php else:?>
					<div class="order__mobile__wrap">
						<h4 class="order__mobile__description"><?=Loc::getMessage('NO_GOODS_ADDED_TO_CART');?></h4>
					</div>
				<?php endif;?>

			</div>
			<div class="order__block-bottom">
				<div class="order__block-bottom__text">
					<h3 class="order__price-subtitle" style="font-family: DIN Condensed;"><?=Loc::getMessage('ORDERS_SUM');?></h3>
					<h3 class="order__price" id="order-sum" style="font-family: DIN Condensed;"><?php echo isset($_SESSION['BASKET']['TOTAL_SUM']) && !empty($_SESSION['BASKET']['TOTAL_SUM']) ? $_SESSION['BASKET']['TOTAL_SUM'] : 0;?> <?=Loc::getMessage('RUB_UPPERCASE');?></h3>
				</div>
				<div class="order__button-gray <?php if (isset($_SESSION['BASKET']['PRODUCTS']) && (!empty($_SESSION['BASKET']['PRODUCTS']))) echo 'order-button-change-color mobile-change-color';?>" id="order-btn" <?php if (!isset($_SESSION['BASKET']['PRODUCTS']) || (empty($_SESSION['BASKET']['PRODUCTS']))) echo 'style="cursor: default;"';?>>
					<p class="order__button__text <?php if (isset($_SESSION['BASKET']['PRODUCTS']) && (!empty($_SESSION['BASKET']['PRODUCTS']))) echo 'order-title-change-color';?>" id="order-button">
						<?=Loc::getMessage('ORDER');?>
					</p>
					<svg id="color-change-svg-order" xmlns="http://www.w3.org/2000/svg" width="43" height="43" fill="white">
						<path fill-rule="evenodd" d="M18.722 43a.788.788 0 0 1-.78-.681l-.38-2.784v-.53a17.854 17.854 0 0 1-5.636-2.362l-.394.394-2.237 1.7a.788.788 0 0 1-1.034-.07l-3.928-3.928a.788.788 0 0 1-.07-1.034l1.7-2.237.411-.411a17.85 17.85 0 0 1-2.318-5.62h-.59L.68 25.059a.788.788 0 0 1-.681-.78v-5.556c0-.394.29-.727.681-.78l2.784-.38h.591a17.852 17.852 0 0 1 2.319-5.619L6.13 11.7 4.271 9.296a.788.788 0 0 1 .066-1.039l3.92-3.92a.788.788 0 0 1 1.039-.066l2.403 1.86.227.226a17.854 17.854 0 0 1 5.636-2.362v-.294l.385-3.013A.788.788 0 0 1 18.728 0h5.544c.396 0 .73.295.781.688l.385 3.013v.259a17.85 17.85 0 0 1 5.698 2.336l.165-.166 2.403-1.859a.788.788 0 0 1 1.039.066l3.92 3.92c.28.28.308.725.066 1.039l-1.86 2.403-.147.148a17.855 17.855 0 0 1 2.38 5.715h.197l3.013.385c.393.05.688.385.688.781v5.544a.788.788 0 0 1-.688.781l-3.014.385h-.196a17.854 17.854 0 0 1-2.38 5.715l.315.315 1.7 2.237a.788.788 0 0 1-.07 1.034l-3.928 3.928a.788.788 0 0 1-1.034.07l-2.237-1.7-.332-.333a17.85 17.85 0 0 1-5.698 2.337v.494l-.38 2.784a.788.788 0 0 1-.78.681h-5.556Zm2.778-9.854c6.432 0 11.646-5.214 11.646-11.646S27.932 9.854 21.5 9.854 9.854 15.068 9.854 21.5 15.068 33.146 21.5 33.146Z" clip-rule="evenodd"/>
					</svg>
				</div>
			</div>
		</div>
	<?php }?>
</div>
 </section>
</main><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>