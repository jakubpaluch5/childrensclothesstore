import Splide from '@splidejs/splide';

export default {
  init() {
    

    const heroFullWidthSlider = new Splide( '.splide#homeHeroSliderSection', {
      type   : 'loop',
      perPage: 1,
      height: '645px',
      arrows: false,
      pagination: true,
      speed: 1000,
      breakpoints: {
        1200: {
          height: '500px',
        },
        900: {
          height: '400px',
        },
      },
    } );
    
    heroFullWidthSlider.mount();


    document.querySelector('.homeHeroSlider__arrow--left').addEventListener('click', () => {
      heroFullWidthSlider.go('<')
    })
    
    document.querySelector('.homeHeroSlider__arrow--right').addEventListener('click', () => {
      heroFullWidthSlider.go('>')
    })



    const homeCategoriesFadeSection = new Splide( '.splide#homeCategoriesFadeSection', {
      type   : 'loop',
      perPage: 3,
      perMove: 3,
      drag: false,
      autoplay: 1,
      interval: 3000,
      arrows: false,
      height   : '280px',
      pagination: false,
      speed: 1000,
      breakpoints: {
        1200: {
          perPage: 2,
      perMove: 2,
        },
        600: {
          perPage: 1,
      perMove: 1,
        },
      },
    } );
    
    homeCategoriesFadeSection.mount();




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



    const homeTestimonialSlider = new Splide( '#homeTestimonialSliderSection .splide', {
      type   : 'loop',
      perPage: 3,
      perMove: 1,
      arrows: false,
      pagination: false,
      destroy: true,
      focus: 'center',
      width: '1500px',
      gap: '90px',
      breakpoints: {
        1000: {
          destroy: false,
          perPage: 1,
          padding: '100px',
          gap: '20px',
        },
        600: {
          destroy: false,
          perPage: 1,
          padding: '50px',
          gap: '10px',
        },
       
      },
    } );
    
    homeTestimonialSlider.mount();




  //   homeCategoriesFadeSection.on( 'go', function() {
  //     // const activeSlides =  document.querySelectorAll('.homeCategoriesFadeSection__categoryBox.is-visible .categoryBox__photo')
  //     // for(let z = 0; z < activeSlides.length; z++) {
  //     //   activeSlides[z].classList.add('test')
  //     // }
  //     alert('work')
  // });
  



  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
