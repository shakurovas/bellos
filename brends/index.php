<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "бренды");
$APPLICATION->SetTitle("бренды");
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?><?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"brends_page", 
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_TEXT",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "products",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "DETAIL_TEXT",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/brends/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"COMPONENT_TEMPLATE" => "brends_page",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_ID#/",
		)
	),
	false
);?>

<footer class="footer">
	<div class="container">
		<?php if (!$USER->IsAuthorized()):?>
			<div class="stock__block-bottom">
				<h2 class="stock__subtitle"><?=Loc::getMessage('LEAVE_A_REQUEST');?></h2>
				<div class="main__wrap" id="main__wrapthird">
					<h3 id="footer-title" class="main__subtitle"><?=Loc::getMessage('REQUEST_FOR_PERSONAL_ACCOUNT');?></h3>
					<svg id="color-change-svg-footer" xmlns="http://www.w3.org/2000/svg" width="43" height="43" fill="#4A4A4A">
						<path fill-rule="evenodd" d="M18.722 43a.788.788 0 0 1-.78-.681l-.38-2.784v-.53a17.854 17.854 0 0 1-5.636-2.362l-.394.394-2.237 1.7a.788.788 0 0 1-1.034-.07l-3.928-3.928a.788.788 0 0 1-.07-1.034l1.7-2.237.411-.411a17.85 17.85 0 0 1-2.318-5.62h-.59L.68 25.059a.788.788 0 0 1-.681-.78v-5.556c0-.394.29-.727.681-.78l2.784-.38h.591a17.852 17.852 0 0 1 2.319-5.619L6.13 11.7 4.271 9.296a.788.788 0 0 1 .066-1.039l3.92-3.92a.788.788 0 0 1 1.039-.066l2.403 1.86.227.226a17.854 17.854 0 0 1 5.636-2.362v-.294l.385-3.013A.788.788 0 0 1 18.728 0h5.544c.396 0 .73.295.781.688l.385 3.013v.259a17.85 17.85 0 0 1 5.698 2.336l.165-.166 2.403-1.859a.788.788 0 0 1 1.039.066l3.92 3.92c.28.28.308.725.066 1.039l-1.86 2.403-.147.148a17.855 17.855 0 0 1 2.38 5.715h.197l3.013.385c.393.05.688.385.688.781v5.544a.788.788 0 0 1-.688.781l-3.014.385h-.196a17.854 17.854 0 0 1-2.38 5.715l.315.315 1.7 2.237a.788.788 0 0 1-.07 1.034l-3.928 3.928a.788.788 0 0 1-1.034.07l-2.237-1.7-.332-.333a17.85 17.85 0 0 1-5.698 2.337v.494l-.38 2.784a.788.788 0 0 1-.78.681h-5.556Zm2.778-9.854c6.432 0 11.646-5.214 11.646-11.646S27.932 9.854 21.5 9.854 9.854 15.068 9.854 21.5 15.068 33.146 21.5 33.146Z" clip-rule="evenodd"/>
					</svg>
				</div>
			</div>
		<?php endif;?>
	</div>
</footer>


<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>