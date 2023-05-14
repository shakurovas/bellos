<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
IncludeTemplateLangFile(__FILE__);

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle(GetMessage("404_NOT_FOUND"));?>

    <main class="page" id="brands">
        <section class="error">
            <div class="container">
                <img class="error__img" src="./images/icons/404.svg" alt="">
                <div class="error__wrap">
                    <h2 class="error__title">404</h2>
                    <p class="error__text"><?=GetMessage('SOMETHING_WENT_WRONG');?></p>
                </div>
            </div>
        </section>
    </main>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>