<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "контакты");
$APPLICATION->SetTitle("контакты");
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?><main class="page" id="brands">
<div class="contacts">
	<div class="container">
 <img src="./images/icons/contacts.svg" class="contacts__img" alt="">
	</div>
	<div class="container__stock">
		<div class="contacts__map">
			<div class="contacts__block stock__block">
			<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab0a1ed324cf9021bde9815ce99d0b71916f0117ed5e6229b7104cf7372694c33&amp;source=constructor"  width="1276" height="400" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				<ul class="stock__list">
					<li class="stock__item"> <img src="/local/templates/bellos/images/stock/Whatsapp.svg" alt="">
					<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_SHOW" => "file",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/phone.php"
	)
);?> </li>
					<li class="stock__item"> <img src="/local/templates/bellos/images/stock/Email.svg" alt="">
					<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_SHOW" => "file",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/email.php"
	)
);?> </li>
					 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/schedule.php"
	)
);?>
				</ul>
			</div>
		</div>
	</div>
</div>
 </main> <footer class="footer">
    <div class="container">
        <?php if (!$USER->IsAuthorized()):?>
            <div class="stock__block-bottom">
                <h2 class="stock__subtitle"><?=Loc::GetMessage('LEAVE_A_REQUEST');?></h2>
                <div class="main__wrap" id="main__wrapthird">
                    <h3 class="main__subtitle banner-subtitle" id="footer-title"><?=Loc::GetMessage('A_REQUEST_FOR_PERSONAL_ACCOUNT');?></h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" fill="#4A4A4A" id="color-change-svg-footer">
                        <path fill-rule="evenodd" d="M18.722 43a.788.788 0 0 1-.78-.681l-.38-2.784v-.53a17.854 17.854 0 0 1-5.636-2.362l-.394.394-2.237 1.7a.788.788 0 0 1-1.034-.07l-3.928-3.928a.788.788 0 0 1-.07-1.034l1.7-2.237.411-.411a17.85 17.85 0 0 1-2.318-5.62h-.59L.68 25.059a.788.788 0 0 1-.681-.78v-5.556c0-.394.29-.727.681-.78l2.784-.38h.591a17.852 17.852 0 0 1 2.319-5.619L6.13 11.7 4.271 9.296a.788.788 0 0 1 .066-1.039l3.92-3.92a.788.788 0 0 1 1.039-.066l2.403 1.86.227.226a17.854 17.854 0 0 1 5.636-2.362v-.294l.385-3.013A.788.788 0 0 1 18.728 0h5.544c.396 0 .73.295.781.688l.385 3.013v.259a17.85 17.85 0 0 1 5.698 2.336l.165-.166 2.403-1.859a.788.788 0 0 1 1.039.066l3.92 3.92c.28.28.308.725.066 1.039l-1.86 2.403-.147.148a17.855 17.855 0 0 1 2.38 5.715h.197l3.013.385c.393.05.688.385.688.781v5.544a.788.788 0 0 1-.688.781l-3.014.385h-.196a17.854 17.854 0 0 1-2.38 5.715l.315.315 1.7 2.237a.788.788 0 0 1-.07 1.034l-3.928 3.928a.788.788 0 0 1-1.034.07l-2.237-1.7-.332-.333a17.85 17.85 0 0 1-5.698 2.337v.494l-.38 2.784a.788.788 0 0 1-.78.681h-5.556Zm2.778-9.854c6.432 0 11.646-5.214 11.646-11.646S27.932 9.854 21.5 9.854 9.854 15.068 9.854 21.5 15.068 33.146 21.5 33.146Z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        <?php endif;?>
    </div>
</footer><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>