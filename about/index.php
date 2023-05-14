<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "о нас");
$APPLICATION->SetTitle("о нас");
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/app.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/about_carousel.js');
Asset::getInstance()->addCss('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
Asset::getInstance()->addJs('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js');

?>
<main class="page" id="about">
	<section class="about">
		<div class="container">
			<div class="about__img">
				<?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"bellos",
					Array(
						"COMPONENT_TEMPLATE" => "bellos",
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0"
					)
				);?>

				<div class="about__wrap">
					<img class="about__logo" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/logo.svg" alt="logo">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						".default",
						Array(
							"AREA_FILE_SHOW" => "file",
							"COMPONENT_TEMPLATE" => ".default",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/about_text_over_image.php"
						)
					);?>
				</div>
			</div>
            <section class="hero">
                <div class="wrapper">
                    <div class="hero_wrapper">
                        <div class="hero__slider">
                            <div class="swiper hero-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH;?>/images/banner/hero-slide1.png" alt="hero-slide1"></div>
                                    <div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH;?>/images/banner/hero-slide2.png" alt="hero-slide2"></div>
                                    <div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH;?>/images/banner/hero-slide1.png" alt="hero-slide1"></div>
                                    <div class="swiper-slide"><img src="<?=SITE_TEMPLATE_PATH;?>/images/banner/hero-slide2.png" alt="hero-slide2"></div>
                                </div>
                                <div class="hero__slider__navigation">
                                    <div class="hero__slider-prev"><img src="<?=SITE_TEMPLATE_PATH;?>/images/banner/arrow-prev.svg" alt="arrow-prev"></div>
                                    <div class="hero__slider-next"><img src="<?=SITE_TEMPLATE_PATH;?>/images/banner/arrow-next.svg" alt="arrow-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<div class="container">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					".default",
					Array(
						"AREA_FILE_SHOW" => "file",
						"COMPONENT_TEMPLATE" => ".default",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/about_text_under_image.php"
					)
				);?>
			</div>
			</div>
	</section>        
</main>

<footer class="footer">
<div class="container">
	 <?php if (!$USER->IsAuthorized()):?>
	<div class="stock__block-bottom">
		<h2 class="stock__subtitle"><?=Loc::GetMessage('LEAVE_A_REQUEST_FOR_PERSONAL_ACCOUNT');?></h2>
		<div class="main__wrap" id="main__wrapthird">
			<h3 class="main__subtitle banner-subtitle" id="footer-title"><?=Loc::GetMessage('REQUEST_FOR_A_PERSONAL_ACCOUNT');?></h3>
			<svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" fill="#4A4A4A" id="color-change-svg-footer">
				<path fill-rule="evenodd" d="M18.722 43a.788.788 0 0 1-.78-.681l-.38-2.784v-.53a17.854 17.854 0 0 1-5.636-2.362l-.394.394-2.237 1.7a.788.788 0 0 1-1.034-.07l-3.928-3.928a.788.788 0 0 1-.07-1.034l1.7-2.237.411-.411a17.85 17.85 0 0 1-2.318-5.62h-.59L.68 25.059a.788.788 0 0 1-.681-.78v-5.556c0-.394.29-.727.681-.78l2.784-.38h.591a17.852 17.852 0 0 1 2.319-5.619L6.13 11.7 4.271 9.296a.788.788 0 0 1 .066-1.039l3.92-3.92a.788.788 0 0 1 1.039-.066l2.403 1.86.227.226a17.854 17.854 0 0 1 5.636-2.362v-.294l.385-3.013A.788.788 0 0 1 18.728 0h5.544c.396 0 .73.295.781.688l.385 3.013v.259a17.85 17.85 0 0 1 5.698 2.336l.165-.166 2.403-1.859a.788.788 0 0 1 1.039.066l3.92 3.92c.28.28.308.725.066 1.039l-1.86 2.403-.147.148a17.855 17.855 0 0 1 2.38 5.715h.197l3.013.385c.393.05.688.385.688.781v5.544a.788.788 0 0 1-.688.781l-3.014.385h-.196a17.854 17.854 0 0 1-2.38 5.715l.315.315 1.7 2.237a.788.788 0 0 1-.07 1.034l-3.928 3.928a.788.788 0 0 1-1.034.07l-2.237-1.7-.332-.333a17.85 17.85 0 0 1-5.698 2.337v.494l-.38 2.784a.788.788 0 0 1-.78.681h-5.556Zm2.778-9.854c6.432 0 11.646-5.214 11.646-11.646S27.932 9.854 21.5 9.854 9.854 15.068 9.854 21.5 15.068 33.146 21.5 33.146Z" clip-rule="evenodd"/>
			</svg>
		</div>
	</div>
	 <?php endif;?>
</div>
 </footer>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>