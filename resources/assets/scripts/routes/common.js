export default {
  init() {
  

    $('.hamburger').click(function() {
      $(this).toggleClass('is-active');
      document.querySelector('.mobileMenu').classList.toggle('is-active')
    });

    function stickyNavbar() {
      let SiteNavbar = document.querySelector('.siteHeader')
      // let scrollPosition = document.body.scrollY()

    window.scrollY > 0 ? SiteNavbar.classList.add('stickyNavbar') : SiteNavbar.classList.remove('stickyNavbar')
      
    }


    document.querySelector('#menu-header-menu-1 .menu-item-28545').addEventListener('mouseenter', () => {
   
      document.querySelector('.megaMenu').classList.add('is-active')
    })
    document.querySelector('.megaMenu').addEventListener('mouseleave', () => {
      document.querySelector('.megaMenu').classList.remove('is-active')
    })

    window.addEventListener('scroll', () => {
      stickyNavbar()
    })





    const hightlightedCats = document.querySelectorAll('.megaMenuContent__highlightedCategoriesHolder a')
    const hightlightedProducts = document.querySelectorAll('.megaMenu__productsColumn')
  
  
  
    for(let z = 0; z < hightlightedCats.length; z++) {
      hightlightedCats[z].addEventListener('mouseenter', () => {
        for(let za = 0; za < hightlightedCats.length; za++) {
          hightlightedCats[za].classList.remove('is-active')
          hightlightedProducts[za].classList.remove('is-active')
        }
        hightlightedCats[z].classList.add('is-active')
        hightlightedProducts[z].classList.add('is-active')
      })
    }

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
