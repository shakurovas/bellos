<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);

use Bitrix\Main\Page\Asset;
CJSCore::Init(array("core", "jquery", "ajax", "fx"));

?>

<!doctype html>
<html lang="<?=LANGUAGE_ID;?>">
<head>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php $APPLICATION->ShowHead();?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <?php
  Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.min.css");
  Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style_banner.css");
  Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/app.min.js', true);
  Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/adding_new_user.js');
  Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/changing_colors.js');
  Asset::getInstance()->addJs('/local/templates/bellos/components/bitrix/catalog.section/furniture/js/fifth_modal_handler.js');
  Asset::getInstance()->addJs('/local/templates/bellos/js/entrance_to_account.js');
  // Asset::getInstance()->addJs('https://unpkg.com/imask');
  Asset::getInstance()->addJs('https://unpkg.com/imask@6.6.0/dist/imask.js');
  Asset::getInstance()->addJs('/local/templates/bellos/js/vendor.3691f8a.bundle.js');
  Asset::getInstance()->addJs('/local/templates/bellos/js/bundle.dbba96c.bundle.js');

  $APPLICATION->AddHeadString('<link rel="stylesheet" href="https://unpkg.com/tailwindcss@1.8.9/dist/tailwind.min.css">', true);
  $APPLICATION->AddHeadString('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">', true);
  $APPLICATION->AddHeadString('<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">', true);
  $APPLICATION->AddHeadString('<link rel="preconnect" href="https://fonts.googleapis.com">', true);
  $APPLICATION->AddHeadString('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>', true);
  $APPLICATION->AddHeadString('<link rel="preconnect" href="https://fonts.googleapis.com">', true);
  $APPLICATION->AddHeadString('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>', true);

  ?>

  <title><?$APPLICATION->ShowTitle()?></title>
</head>

<body>
  <?php
  
  if (isset($_GET['logout']) && !empty($_GET['logout']) && $_GET['logout'] == 'yes') {
    session_destroy();
  }?>

  <?php $APPLICATION->ShowPanel();?>
  <header class="header">
    <div class="container">
      <div class="header__wrapper">
        <a href="/">
          <img class="header__logo logo" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/logo.svg" alt="">
        </a>
        <nav class="header__menu menu nav">
          <ul class="menu__list">
            <li class="menu__item-first"><a href="/about/" class="menu__link"><?=GetMessage('ABOUT_COMPANY');?></a></li>
            <li class="menu__item-first"><a href="/brends/" class="menu__link"><?=GetMessage('BRENDS');?></a></li>
            <li class="menu__item-first"><a href="/promotions/" class="menu__link"><?=GetMessage('ACTIONS');?></a></li>
            <li class="menu__item-first"><a href="/contacts/" class="menu__link"><?=GetMessage('CONTACTS');?></a></li>
          </ul>
          <ul class="menu__list <?php echo ($USER->IsAuthorized()) ? 'menu-mobile-items' : 'menu-items-top'?>" <?php echo ($USER->IsAuthorized()) ? 'style="grid-gap: 20px 3px;"' : '';?>>
            <li class="menu__item menu__item__icon <?php if ($USER->IsAuthorized()) echo 'icons-distance-mobile';?>">
              <a href="https://wa.me/+79687688333">
                <div class="main__img__block">
                  <img class="main__img-first rot" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/spinner.svg" alt="">
                  <img class="main__img-second" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/Whatsapp.svg" alt="">
                </div>
              </a>
            </li>
            <li class="menu__item menu__item__icon">
              <a href="https://t.me/+79687688333">
                <div class="main__img__block">
                  <img class="main__img-first rot" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/spinner.svg" alt="">
                  <img class="main__img-second main__img-custom" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/airplane.svg" alt="">
                </div>
              </a>
            </li>
            
            <?php if (!$USER->IsAuthorized()):?>
              <li class="menu__item menu__item__icon desktop-entrance-item entrance-phrase-desktop" id="entrance-item">
                <?=GetMessage('ENTRANCE_TO_PERSONAL_ACCOUNT');?>
              </li>
            <?php endif;?>

            <li <?php if (!$USER->IsAuthorized()) echo 'id="modalBtn"';?> class="menu__item menu__item__icon <?php echo (!$USER->IsAuthorized()) ? 'modal-btn-gear' : 'gear-button-entrance';?>" <?php if (!$USER->IsAuthorized()) echo 'style="margin-right: -64px;"';?>>
              <a <?php if ($USER->IsAuthorized()) {
                if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) echo 'href="/menu_buttons/"';
                else echo 'href="/personal_data/"';
              }?>>
                <div class="main__img__block <?php if (!$USER->IsAuthorized()) echo 'gear-button-mobile';?>">
                  <img class="main__img-first rot" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/spinner.svg" alt="">
                  <img class="main__img-second" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/user.svg" alt="">
                </div>
              </a>
            </li>

            <?php if ($USER->IsAuthorized()):?>
              <li class="menu__item menu__item__icon menu__item-right user-name-logined desktop-name"><a href="/personal_data/"><?=mb_strtoupper(CUser::GetFullName());?></a></li>
              <li class="menu__item menu__item__icon menu__item-right user-name-logined mobile-name"><a class="mobile-name-link" href="/menu_buttons/"><?=mb_strtoupper(CUser::GetFullName());?></a></li>
            <?php endif;?>

            <?php if (!$USER->IsAuthorized()):?>
              <li class="mobile-entrance-item entrance-phrase-mobile" id="entrance-item-mobile">
                <?=GetMessage('ENTRANCE_TO_PERSONAL_ACCOUNT');?>
              </li>
            <?php endif;?>
           
            </ul>
            <?php if ($USER->IsAuthorized()):?>
            <button class="menu__button exit-button"><a href="/?logout=yes&<?=bitrix_sessid_get();?>"><?=GetMessage('EXIT');?></a></button>
          <?php endif;?>
          
          
          
          
        </nav>
        
        <div class="burger burger__btn"></div>
        
      </div>
    </div>
    <div class="modal">
      <div class="modal__wrapper">
        <div class="modal__header">
          <div class="modal__wrap__btn">
            <img class="close-btn" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/close.svg" alt="">
          </div>
          <div class="modal__wrap">
            <img src="<?=SITE_TEMPLATE_PATH;?>/images/icons/personal-account.svg" alt="" class="modal__img">
              <?$APPLICATION->IncludeComponent(
                "bitrix:system.auth.form",
                "personal",
                Array(
                  "FORGOT_PASSWORD_URL" => "",
                  "PROFILE_URL" => "/personal_data/",
                  "REGISTER_URL" => "index.php",
                  "SHOW_ERRORS" => "Y",
                )
              );?><br>
              
          </div>
        </div>
      </div>
    </div>

    <div class="modal-second">
      <div class="modal__wrapper">
        <div class="modal__header">
          <div class="modal__wrap__btn">
            <img class="close-btn close-btn-new" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/close.svg" alt="">
          </div>
          <div class="modal__wrap">
            <img src="<?=SITE_TEMPLATE_PATH;?>/images/icons/personal-account.svg" alt="" class="modal__img">
            <form class="modal__form" name="request" id="request_form">
              <p class="modal__text"><?=GetMessage('NAME');?></p>
              <input class="modal__input modal__input__name" id="name_account_request" type="text" name="name" required>
              <p class="modal__text"><?=GetMessage('NUMBER');?></p>
              <input class="modal__input modal__input__pass" id="phone_account_request" type="tel" required>
              <p class="modal__button modal__button__text" id="application-processing" style="cursor: default;"><?=GetMessage('LEAVE_A_REQUEST');?></p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-third">
      <div class="modal__wrapper">
        <div class="modal__header">
          <div class="modal__wrap__btn">
            <img class="close-btn-third" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/close.svg" alt="">
          </div>
          <div class="modal__wrap">
            <img src="<?=SITE_TEMPLATE_PATH;?>/images/icons/personal-account.svg" alt="" class="modal__img">
            <form class="modal__form" name='request'>
              <p class="modal__text"><?=GetMessage('NAME');?></p>
              <input class="modal__input modal__input__name" id="name_account_request2" type="text" name="name">
              <p class="modal__text"><?=GetMessage('NUMBER');?></p>
              <input class="modal__input modal__input__pass" id="phone_account_request2" type="tel">
              <p class="modal__button modal__button__text" id="application-processing2" style="cursor: default;"><?=GetMessage('LEAVE_A_REQUEST');?></p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-fourth">
      <div class="modal__wrapper modal-fourth__wrapper">
        <div class="modal__header">
          <div class="modal__wrap__btn">
            <img class="close-btn close-btn-fourth" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/close.svg" alt="">
          </div>
          <div class="modal__wrap">
            <img src="<?=SITE_TEMPLATE_PATH;?>/images/icons/personal-account.svg" alt="" class="modal__img">
            <div class="modal__block">
              <h2 class="modal__title" style="font-family: DIN Condensed;"><?=GetMessage('YOUR_REQUEST_IS_ACCEPTED');?></h2>
              <h3 class="modal__subtitle" style="font-family: DIN Condensed;"><?=GetMessage('WE_WILL_CONTACT_YOU_SOON');?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-fifth">
      <div class="modal__wrapper">
        <div class="modal__header">
          <div class="modal__wrap__btn">
            <button onclick="closingButton()"><img class="close-btn-fifth" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/close.svg" alt=""></button>
          </div>
          <div class="modal__wrap">
            <div class="modal-fifth__block">
              <h2 class="modal-fifth__subtitle"><?=GetMessage('EXAMPLE_OF_GOOD');?></h2>
            </div>
            <form class="modal__form">
              <p class="modal__text" style="font-family: DIN Condensed;"><?=GetMessage('AMOUNT');?></p>
              <input class="modal__input modal__input__name" id="amount-input" type="number" name="name" value="1">
              <p class="modal__text" style="font-family: DIN Condensed;"><?=GetMessage('PRICE');?></p>
              <div class="modal-fifth__price" style="font-family: DIN Condensed;"><?=GetMessage('PRICE_OF_EXAMPLE');?></div>
              <p class="modal__button modal__button__text" id="application-processing2" style="font-family: DIN Condensed;"><?=GetMessage('ADD');?></p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-six">
      <div class="modal__wrapper">
        <div class="modal__header">
          <div class="modal__wrap__btn">
            <img class="close-btn-six" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/Union.svg" alt="">
          </div>
          <div class="modal__wrap">
            <div class="modal-fifth__block">
              <h2 class="modal-fifth__subtitle"><?=GetMessage('EXAMPLE_OF_GOOD');?></h2>
            </div>
            <form class="modal__form">
              <p class="modal__text" style="font-family: DIN Condensed;"><?=GetMessage('AMOUNT');?></p>
              <input class="modal__input modal__input__name" style="font-family: DIN Condensed;" type="number" name="name">
              <p class="modal__text" style="font-family: DIN Condensed;"><?=GetMessage('PRICE');?></p>
              <div class="modal-fifth__price" style="font-family: DIN Condensed;"><?=GetMessage('PRICE_OF_EXAMPLE');?></div>
              <p class="modal__button modal__button__text adopted" style="font-family: DIN Condensed;"><?=GetMessage('ADD');?></p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-seven">
      <div class="modal__wrapper modal-fourth__wrapper">
        <div class="modal__header">
          <div class="modal__wrap modal-seven__wrap">
            <img src="<?=SITE_TEMPLATE_PATH;?>/images/icons/personal-account.svg" alt="" class="modal__img">
            <div class="modal__block">
              <h2 class="modal__title modal-seven__title" style="font-family: DIN Condensed;"><?=GetMessage('YOUR_ORDER_IS_ACCEPTED');?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php if (!$USER->IsAuthorized() && $APPLICATION->arAuthResult['TYPE'] == 'ERROR') {
      echo '<div class="modal__text" style="color: red; text-align: center;">' . $APPLICATION->arAuthResult['MESSAGE'] . '</div>';
    } ?>
  </header>

  
  <div class="wrapper">