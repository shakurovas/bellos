<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$APPLICATION->SetTitle(Loc::GetMessage('CATALOG_PAGE_TITLE'));
?>

<main class="page" id="brands">
        <section class="catalog">
  <div class="container">
    <div class="catalog__wrap__block">
      <a href="/catalog/catalog.php"><button class="catalog__button"><?=Loc::GetMessage('CATALOG');?></button></a>
      <a href="/catalog/order.php"><button class="catalog__button"><?=Loc::GetMessage('MAKE_AN_ORDER');?></button></a>
      <a href="/personal_data/history-of-orders.php"><button class="catalog__button"><?=Loc::GetMessage('HISTORY_OF_ORDERS');?></button></a>
      <a href="/personal_data/"><button class="catalog__button"><?=Loc::GetMessage('PERSONAL_DATA');?></button></a> 
    </div>
    <div class="catalog__wrap__block-mobile">
      <a class="catalog__link-mobile" href="/catalog/catalog.php"><button class="catalog__button-mobile"><?=Loc::GetMessage('CATALOG');?></button></a>
      <a class="catalog__link-mobile" href="/catalog/order.php"><button class="catalog__button-mobile"><?=Loc::GetMessage('MAKE_AN_ORDER');?></button></a>
      <a class="catalog__link-mobile" href="/personal_data/history-of-orders.php"><button class="catalog__button-mobile"><?=Loc::GetMessage('HISTORY_OF_ORDERS');?></button></a>
      <a class="catalog__link-mobile" href="/personal_data/"><button class="catalog__button-mobile"><?=Loc::GetMessage('PERSONAL_DATA');?></button></a> 
    </div>
   
  </div>
</section>
      </main>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>