import Splide from '@splidejs/splide';

export default {
  init() {



    var splides = document.querySelectorAll('.collectionRow__productSlider .splide');
// 1. query slider elements: are there any splide elements?
if(splides.length){
    // 2. process all instances
    for(var i=0; i<splides.length; i++){
        var splideElement = splides[i];
        //3.1 if no options are defined by 'data-splide' attribute: take these default options
        var splideDefaultOptions = 
        {
            type   : 'slide',
            perPage: '3',
            perMove: '1',
            width: '630px',
            gap: '20px',
            arrows: true,
            pagination: false,
            breakpoints: {
                1200: {
                  width: '500px',
                },
                700: {
                    width: '400px',
                    perPage: 2,
                  },
                  600: {
                    width: '80vw',
                    perPage: 2,
                  },
                  400: {
                    width: '80vw',
                    perPage: 1,
                  },
               
               
              },
            
        }
        /**
        * 3.2 if options are defined by 'data-splide' attribute: default options will we overridden
        * see documentation: https://splidejs.com/guides/options/#by-data-attribute
        **/
        
        var splide = new Splide( splideElement, splideDefaultOptions ); 
        // 3. mount/initialize this slider
        splide.mount();


        
    }

    
}

    

  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
