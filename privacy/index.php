<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "политика конфиденциальности");
$APPLICATION->SetTitle("политика конфиденциальности");
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$APPLICATION->SetTitle(Loc::GetMessage('PRIVACY_POLICY_PAGE_TITLE'));?>

<main class="page" id="brands">
    <section class="politics">
        <div class="container">
            <div class="about__img">
				<?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb", 
					"bellos", 
					array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0",
						"COMPONENT_TEMPLATE" => "bellos"
					),
					false
				);?>
			</div>	
            <div class="politics__wrap">
                <h2 class="politics__title"><?=Loc::GetMessage('PRIVACY_POLICY_TITLE');?></h2>
                <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_RECURSIVE" => "Y",
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/privacy.php"
                        )
                    );?><br>
            </div>
        </div>
    </section>
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>