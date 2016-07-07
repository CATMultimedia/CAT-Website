$(document).ready(function(){

var images = Array("/img/himg-1.jpg",
				"/img/himg-2.jpg",
               "/img/himg-3.jpg",
               "/img/himg-4.jpg",
               "/img/himg-5.jpg",
               "/img/himg-6.jpg",
               "/img/himg-7.jpg",
               "/img/himg-8.jpg");
var currimg = 0;


function bgimg(){

   $('.logo').animate({ opacity: 1 }, 500,function(){

        //finish animation, fade between images
        $('.logo').animate({ opacity: 0.5 }, 100, function(){

            currimg++;
            if(currimg > images.length-1){
                currimg=0;
            }

            var newimage = images[currimg];

            //swap images
            $('.logo').css("background-image", "url("+newimage+")");

            //animate fully back in
            $('.logo').animate({ opacity: 1 }, 400,function(){

                //set timer for next
                setTimeout(bgimg,5000);
            });
        });
    });
  }
  setTimeout(bgimg,5000);
});