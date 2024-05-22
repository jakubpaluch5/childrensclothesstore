<div class="siteFooter">
  <div class="wrapper">
    <div data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200" class="siteFooter__column siteFooter__column--logo">
      <img src="{!! get_field('logo_w_stopce', 'options') !!}" alt="Logo motulinka w stopce">
    </div>
    <div class="siteFooter__column siteFooter__column--content">
      <div class="siteFooterContent__newsletter">
        <p  class="newsletterDesc">Zapisz się do naszego newslettera i otrzymaj <span class="color-brown">5% rabatu</span> na pierwsze zakupy!</p>
      {!! do_shortcode('[contact-form-7 id="9f51952" title="Newsletter"]') !!}
    </div>
    <div class="siteFooterContent__navHolder">
        <div class="navHolder__column">
           <div class="navHolderColumn__row">
                <p class="navHolderRow__title">
                    Kontakt
                </p>
                <div class="navHolderRow__content">
                    <ul>
                        <li>
                            <p>
                                <strong>Adres:</strong>
                            </p>
                            <p>
                                32-600 Oświęcim <br/>
                                ul. Zaborska 5/4c
                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                    Telefon:
                                </strong>
                            </p>
                            <p>
                                <a href="tel:533 747 300">533 747 300</a>
                            </p>
                        </li>
                        <li>
                            <p>
                                <strong>
                                    Email:
                                </strong>
                            </p>
                            <p>
                                <a href="mailto:motulinkadladzieci@protonmail.com">motulinkadladzieci@protonmail.com</a>
                            </p>
                        </li>
                    </ul>
                </div>
           </div>
           <div class="navHolderColumn__row navHolderColumn__row--openingHours">
            <p class="navHolderRow__title">
                Godziny otwarcia sklepu stacjonarnego
            </p>
            <div class="navHolderRow__content">
                <ul>
                    <li>
                        <p>
                            <strong>Poniedziałek - Piątek:</strong>
                        </p>
                        <p>
                            9:00 - 17:00
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>
                                Sobota:
                            </strong>
                        </p>
                        <p>
                            9:00 - 13:00
                        </p>
                    </li>
               
                </ul>
            </div>
       </div>


        </div>
        <div class="navHolder__column">
            <div class="navHolderColumn__row">
                 <p class="navHolderRow__title">
                    Obserwuj nas
                 </p>
                 <div class="navHolderRow__content">
                     <ul>
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=100028121126999" target="_blank">
                                <img alt="Ikonka ulubionych - otwórz ulubione" src="<?= get_template_directory_uri(); ?>/assets/images/footer/fb-icon.svg">
                            </a>
                            <a href="https://www.instagram.com/motulinka_forbaby/" target="_blank">
                                <img alt="Ikonka ulubionych - otwórz ulubione" src="<?= get_template_directory_uri(); ?>/assets/images/footer/instagram-icon.svg">
                            </a>
                        </li>
                     </ul>
                 </div>
            </div>
            <div class="navHolderColumn__row navHolderColumn__row--openingHours">
             <p class="navHolderRow__title">
                 Przydatne linki
             </p>
             <div class="navHolderRow__content">
                {!! wp_nav_menu(array('menu' =>'footer-menu', 'container' => '',)); !!}
             </div>
        </div>
 
 
         </div>
    </div>
    </div>
    <div data-aos="fade-up" data-aos-duration="1300" data-aos-offset="200" class="siteFooter__column siteFooter__column--photo">
      <img src="{!! get_field('zdjecie_po_prawej_w_stopce', 'options') !!}" alt="Logo motulinka w stopce">
    </div>
   
  </div>
   <p class="copyrightInfo">Copyright ©️ 2024 Motulinka</p>
</div>

<style>
    .siteFooter__column--photo, .siteFooter__column--logo {
        display: flex;
        align-items: center;
    }
</style>

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"
/>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
<script>
    Array.prototype.forEach.call(
document.querySelectorAll('.mobileMenuProductsBox__scrollbarArea'),
(el) => new SimpleBar(el, { autoHide: false })
);
  </script>



<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


<script>
    AOS.init();
  </script>