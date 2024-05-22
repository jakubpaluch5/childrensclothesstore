import Splide from '@splidejs/splide';

export default {
  init() {
    
    
    const horizontalSlider = new Splide( '.splide.horizontalSlider', {
        type   : 'slide',
        perPage: 5,
        arrows: false,
        pagination: false,
        direction: 'ttb',
        height: '515px',
        gap: '10px',
        isNavigation: true,
        speed: 1000,
      } );
      
      


      const verticalSlider = new Splide( '.splide.verticalSlider', {
        type   : 'fade',
        perPage: 1,
        arrows: false,
        pagination: false,
        height: '515px',
        width: '460px',
        gap: '10px',
        speed: 1000,
        breakpoints: {
          1200: {
           width: '400px',
           height: '450px',
          },
          
        },
      } );
      
      horizontalSlider.sync(verticalSlider);
      verticalSlider.mount();
      
      horizontalSlider.mount();

      

  
      const homeMostBoughtSectionSlider = new Splide( '#homeMostBoughtSection .splide', {
        type   : 'loop',
        perPage: 4,
        perMove: 1,
        arrows: false,
        pagination: false,
        width: '1320px',
        gap: '90px',
        breakpoints: {
          1200: {
            perPage: 3,
        perMove: 3,
        gap: '40px',
          },
          800: {
            perPage: 2,
            perMove: 2,
            gap: '20px',
          },
          500: {
            perPage: 1,
            perMove: 1,
          },
        },
      } );
      
      homeMostBoughtSectionSlider.mount();
  
  
  
      document.querySelector('.homeMostBoughtSlider__arrow--left').addEventListener('click', () => {
        homeMostBoughtSectionSlider.go('<')
      })
      
      document.querySelector('.homeMostBoughtSlider__arrow--right').addEventListener('click', () => {
        homeMostBoughtSectionSlider.go('>')
      })

  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
