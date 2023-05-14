<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
      <footer class="footer">
        <div class="container">
          <a href="/">
            <img class="footer__img-top" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/logo.svg" alt="">
          </a>
          <ul class="menu__list footer__list" id="footer__list">
            <li class="menu__item-first footer__item"><a href="/about/"><?=GetMessage('ABOUT_COMPANY');?></a></li>
            <li class="menu__item-first footer__item"><a href="/brends/"><?=GetMessage('BRENDS');?></a></li>
            <li class="menu__item-first footer__item"><a href="/promotions/"><?=GetMessage('ACTIONS');?></a></li>
            <li class="menu__item-first footer__item"><a href="/contacts/"><?=GetMessage('CONTACTS');?></a> </li>
            <li class="menu__item-first footer__item"><a href="/personal_data/"><?=GetMessage('PERSONAL_ACCOUNT');?></a></li>
          </ul>
          <div class="footer__wrapper">
            <a href="/">
              <img class="footer__img" src="<?=SITE_TEMPLATE_PATH;?>/images/icons/logo.svg" alt="">
            </a>
            <div class="footer__wrap">
              <p class="footer__text footer__text-left"><?=GetMessage('ADDRESS');?></p>
              <a href="/privacy/">
                <p class="footer__text"><?=GetMessage('PRIVACY_POLICY');?></p>
              </a>
            </div>
          </div>
            <a href="https://itdr.pro" style="font-size:20px; text-align:center; display: block; color: #8A8A8A">СОЗДАНО<span style="font-size:20px;">ITDR.PRO</span></a>
        </div>
      </footer>
    </div>
  </body>
</html> 
