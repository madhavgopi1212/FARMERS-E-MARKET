   
 //owl carousal   
    $(document).ready(function(){
        $('.place-carousall').owlCarousel({
            loop:true,
            margin:40,
            nav:true,
            dots:false,
           autoplay:true,
            autoplayHoverPause:true,
            autoplayTimeout:2000,
            autoplaySpeed:2000,
            responsive:{
                0:{
                    items:1
                },
                576:{
                    items:2
                },
                768:{
                    items:3
                },
                992:{
                    items:3
                },
                1200:{
                    items:4
                }
            }
        })
    
        });
    