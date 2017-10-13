(function($) {

    "use strict";


    // Preloder
    $(window).on('load', function() {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({'overflow':'visible'});
    })


    // Navbar Fixed Top On Scroll
    var affixElement = '#navbar-main';

        $(affixElement).affix({
          offset: {
            // Distance of between element and top page
            top: function () {
              return (this.top = $(affixElement).offset().top)
            },
          }
    });


    // Navbar Animation
    window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 120,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"changer");
            } else {
                if (classie.has(header,"changer")) {
                    classie.remove(header,"changer");
                }
            }
    });



    // Bootstrap Slider Caption Animation
    (function( $ ) {
        //Function to animate slider captions
        function doAnimations( elems ) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';

            elems.each(function () {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $myCarousel = $('#carousel-example-generic'),
            $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

        //Initialize carousel
        $myCarousel.carousel({
            interval: 5000,
        });

        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);

        //Other slides to be animated on carousel slide event
        $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });

        $myCarousel.on('mouseover', function (e) {
             $myCarousel.carousel();
        });

    })(jQuery);



    // Scroll To Top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500);
        return false;
    });


    // CounterUp
    $('.count').counterUp({
        delay: 10, // the delay time in ms
        time: 2000 // the speed time in ms
    });



    // owl-carousel for testimonial
    if($('.testimonial-carousel').length){
        $('.testimonial-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:true,
            margin: 50,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:false,
            autoplaySpeed:1000,
            animateOut:'',
            animateIn:'zoomIn',
            responsive: {
                0: {
                    items:1,
                },
                600:{
                    items:1,
                },
                1000: {
                    items:1,
                },
            }
        })
    }



    // owl-carousel for client
    if($('.client-carousel').length){
        $('.client-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:false,
            margin: 50,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:false,
            autoplaySpeed:1000,
            responsive: {
                0: {
                    items:2,
                },
                600:{
                    items:3,
                },
                1000: {
                    items:5,
                },
            }
        })
    }

    // Parallax
    $('.parallax').jarallax({
        // parallax effect speed. 0.0 - 1.0
        speed             : 0.5,
    })

    // Filtering
    // var filterizd = $('.filtr-container').filterizr({
    // });



    // SkillBar Animation
    // var offsetTop = $('#skills').offset().top;
    //         $(window).scroll(function() {
    //       var height = $(window).height();
    //       if($(window).scrollTop()+height > offsetTop) {
    //         jQuery('.skillbar').each(function(){
    //           jQuery(this).find('.skillbar-bar').animate({
    //             width:jQuery(this).attr('data-percent')
    //           },2000);
    //         });
    //       }
    // });

    // Fancybox
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });

    // Video popup
    jQuery("a.demo").YouTubePopUp();



    // ----------- Ajax Contact script -----------//
    // $(function() {
    //     // Get the form.
    //     var form = $('#ajax-contact');
    //
    //     // Get the messages div.
    //     var formMessages = $('#form-messages');
    //
    //     // TODO: The rest of the code will go here...
    // });
    // Set up an event listener for the contact form.
    // $(form).submit(function(event) {
    //     // Stop the browser from submitting the form.
    //     event.preventDefault();
    //
    //     // TODO
    // });
    // Serialize the form data.
    // var formData = $(form).serialize();
    // // Submit the form using AJAX.
    // $.ajax({
    //     type: 'POST',
    //     url: $(form).attr('action'),
    //     data: formData
    // })
    // .done(function(response) {
    //     // Make sure that the formMessages div has the 'success' class.
    //     $(formMessages).removeClass('error');
    //     $(formMessages).addClass('success');
    //
    //     // Set the message text.
    //     $(formMessages).text(response);
    //
    //     // Clear the form.
    //     $('#name').val('');
    //     $('#subject').val('');
    //     $('#email').val('');
    //     $('#message').val('');
    // })
    //
    // .fail(function(data) {
    //     // Make sure that the formMessages div has the 'error' class.
    //     $(formMessages).removeClass('success');
    //     $(formMessages).addClass('error');
    //
    //     // Set the message text.
    //     if (data.responseText !== '') {
    //         $(formMessages).text(data.responseText);
    //     } else {
    //         $(formMessages).text('Oops! An error occured and your message could not be sent.');
    //     }
    // });


})(window.jQuery);
