(function ($) {
 "use strict";
    
    //---------------------------------------------
    //Nivo slider
    //---------------------------------------------
    $('#nivoslider').nivoSlider({
        effect: 'sliceUp',
    slices: 15,
    boxCols: 8,
    boxRows: 4,
    animSpeed: 500,
    pauseTime: 5000,
    startSlide: 0,
    directionNav: true,
    controlNav: true,
    controlNavThumbs: false,
    pauseOnHover: true,
    manualAdvance: false,
    prevText: 'Prev',
    nextText: 'Next',
    randomStart: false,
    beforeChange: function(){},
    afterChange: function(){},
    slideshowEnd: function(){},
    lastSlide: function(){},
    afterLoad: function(){}
    });
})(jQuery); 