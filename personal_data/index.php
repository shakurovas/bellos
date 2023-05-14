<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "личные данные");
$APPLICATION->SetTitle("личные данные");

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>

<main class="page" id="brands">
	<section class="catalog">
		<div class="container">
			<div class="catalog__wrap__block">
				<a href="/catalog/catalog.php"><button class="catalog__button"><?=Loc::GetMessage('CATALOG');?></button></a>
				<a href="/catalog/order.php"><button class="catalog__button"><?=Loc::GetMessage('CREATE_AN_ORDER');?></button></a>
				<a href="/personal_data/history-of-orders.php"><button class="catalog__button"><?=Loc::GetMessage('HISTORY_OF_ORDERS');?></button></a>
				<a href="/personal_data/"><button class="catalog__button" style="background: black; color: white;"><?=Loc::GetMessage('PERSONAL_DATA');?></button></a>
			</div>
		</div>
	</section>
	<section class="data">
		<div class="container__stock">
			<ul class="catalog__list-top data__list">
				<li class="catalog__item-top"><a href="/menu_buttons/"><?=Loc::GetMessage('PERSONAL_ACCOUNT');?></a></li>
				<li class="catalog__item-top"><a href="/personal_data/"><?=Loc::GetMessage('PERSONAL_DATA_CAPITALIZED');?></a></li>
			</ul>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.profile",
				"bellos_personal_data",
				Array(
					"CHECK_RIGHTS" => "N",
					"SEND_INFO" => "N",
					"SET_TITLE" => "Y",
					"USER_PROPERTY" => array(),
					"USER_PROPERTY_NAME" => ""
				)
			);?><br>
		</div>
	</section>
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>