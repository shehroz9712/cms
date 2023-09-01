




function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");
    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}
var counters = document.querySelectorAll(".counter");

// Callback function to handle intersection changes
function handleIntersection(entries, observer) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            // Start the counter animation
            startCounter(entry.target);
            // Stop observing this element
            observer.unobserve(entry.target);
        }
    });
}

// Create an intersection observer instance
var observer = new IntersectionObserver(handleIntersection);

// Observe each counter element
counters.forEach(function (counter) {
    // Start observing the counter element
    observer.observe(counter);
});

function startCounter(counter) {
    var target = parseInt(counter.dataset.target);
    var icon = counter.dataset.icon;
    var count = 0;
    var interval = target <= 100 ? 10 : 1; // Adjust the interval based on the target value

    function updateCounter() {
        counter.textContent = count + icon;
        count++;
        if (count > target) {
            clearInterval(stop);
        }
    }

    var stop = setInterval(updateCounter, interval);
}


var scrollCount = 0;

function blockScroll(event) {
    scrollCount++;
    if (scrollCount >= 3) {
        // alert('s')
        event.preventDefault();
        event.stopPropagation();
    }
}
window.addEventListener('scroll', blockScroll, {
    passive: false
});


$('.slick').owlCarousel({
    loop: true,
    margin: 30,
    navText: [" ", " "],
    autoplay: true,
    nav: false,
    autoplay: true,
    dots: false,
    responsiveClass: true,
    slideTransition: 'linear',
    autoplaySpeed: 6000,
    smartSpeed: 8000,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 2,
            nav: false
        },
        1000: {
            items: 5,
            nav: true,
        }
    }
})
jQuery('.slick').trigger('play.owl.autoplay', [2000]);

function setSpeed() {
    jQuery('.slick').trigger('play.owl.autoplay', [6000]);
}

setTimeout(setSpeed, 100);

// $('.slick-portfolio').owlCarousel({
//     loop: true,
//     margin: 10,
//     // center: true,
//     navText: [" ", " "],
//     autoplay: true,
//     nav: false,
//     dots: false,
//     responsiveClass: true,
//     responsive: {
//         0: {
//             items: 1,
//             nav: true
//         },
//         600: {
//             items: 2,
//             nav: false
//         },
//         1000: {
//             items: 3,
//             nav: true,
//             loop: false
//         }
//     }
// })


var owl2 = $('.slick-portfolio');
owl2.owlCarousel({
    rtl: true,
    margin: 10,
    nav: true,
    loop: false,
    navSpeed: 1000,
    pullDrag: false,
    freeDrag: false,
    autoplay: false,
    onDragged: function () {
        $('body').css('overflow', 'auto');
    },
    onDrag: function (e) {
        var current = e.item.index + 1;
        var total = e.item.count;
        if (current === total) {
            $('body').css('overflow', 'auto');
        }
        else {
            $('body').css('overflow', 'hidden');
        }

    },
    responsive: {
        0: {
            items: 1
        },
        400: {
            items: 1
        },
        600: {
            items: 1
        },
        900: {
            items: 1
        }

    },
    onTranslate: function () {
        $('.owl-item').find('video').each(function () {
            this.pause();
            this.currentTime = 0;
        });

    },

});


owl2.on('drag.owl.carousel', function (e) {
    var current = e.item.index + 1;
    var total = e.item.count;
    document.ontouchmove = function (e) {
        if (current !== total) {
            e.preventDefault();
        }
        else {
            return true;
        }
    }


});


owl2.on('dragged.owl.carousel', function (event) {
    document.ontouchmove = function (e) {
        return true;
    }
});

/////////////////////////////////////////
    document.addEventListener("DOMContentLoaded", function () {
        const mouseWheel = document.querySelector('.box-scroll');

        if (mouseWheel) {
            mouseWheel.addEventListener('wheel', function (e) {
                const race = 150; // How many pixels to scroll
                if (e.deltaY > 0) {
                    // Scroll right
                    if (mouseWheel.scrollLeft + mouseWheel.clientWidth >= mouseWheel.scrollWidth) {
                        // At the end of the slider, trigger page scroll
                        window.scrollBy({ top: race, left: 0, behavior: 'smooth' });
                    } else {
                        mouseWheel.scrollLeft += race;
                    }
                } else {
                    // Scroll left
                    if (mouseWheel.scrollLeft <= 0) {
                        // At the beginning of the slider, trigger page scroll
                        window.scrollBy({ top: -race, left: 0, behavior: 'smooth' });
                    } else {
                        mouseWheel.scrollLeft -= race;
                    }
                }
                e.preventDefault();
            });
        }
    });

/////////////////////////////////////////

$('.slick-testimonials').owlCarousel({
    loop: true,
    margin: 10,
    navText: [" ", " "],
    autoplay: true,
    nav: false,
    autoplay: true,
    dots: false,
    responsiveClass: true,
    items: 1,
})


// $(document).ready(function () {
//     $(".scroll-container").on("scroll", function () {
//         var scrollAmount = $(this).scrollTop();
//         // Zoom background image
//         $(".background img").css("transform", "scale(" + (1 + scrollAmount * 0.005) + ")");
//         // Move left image to the left
//         $(".left-image img").css("transform", "translateX(-" + scrollAmount + 1 * 9 + "px)");
//         // Move right image to the right
//         $(".right-image img").css("transform", "translateX(" + scrollAmount + 1 * 9 + "px)");
//     });
// });


// (function ($) {
//     $.fn.extend({
//         mouseParallax: function (options) {
//             var defaults = {
//                 moveFactor: 5,
//                 zIndexValue: "-1",
//                 targetContainer: "#casestudy",
//             };
//             var options = $.extend(defaults, options);
//             return this.each(function () {
//                 var o = options;
//                 var background = $(this);
//                 var targetContainer = $(o.targetContainer);
//                 targetContainer.on("mousemove", function (e) {
//                     var containerOffset = targetContainer.offset();
//                     var mouseX = e.pageX - containerOffset.left;
//                     var mouseY = e.pageY - containerOffset.top;
//                     var windowWidth = targetContainer.width();
//                     var windowHeight = targetContainer.height();
//                     var percentX = ((mouseX / windowWidth) - 0.5) * o.moveFactor;
//                     var percentY = ((mouseY / windowHeight) - 0.5) * o.moveFactor;
//                     var transformString = "translate(" + percentX + "px, " + percentY + "px)";
//                     background.css("transform", transformString);
//                     if (o.zIndexValue) {
//                         background.css("z-index", o.zIndexValue);
//                     }
//                 });
//             });
//         },
//     });
// }(jQuery));
// $(document).ready(function () {
//     $('.lr').mouseParallax({
//         moveFactor: -100,
//         abc: 0.5
//     });
//     $('.lr2').mouseParallax({
//         moveFactor: -200,
//         abc: 0.6
//     });
//     $('.lr3').mouseParallax({
//         moveFactor: -300,
//         abc: 0.7
//     });
//     $('.lr4').mouseParallax({
//         moveFactor: -400,
//         abc: 0.8
//     });
//     $('.lr5').mouseParallax({
//         moveFactor: -500,
//         abc: 0.5
//     });
//     $('.lr6').mouseParallax({
//         moveFactor: -600,
//         abc: 0.6
//     });
//     $('.lr7').mouseParallax({
//         moveFactor: -700,
//         abc: 0.5
//     });
//     $('.lr8').mouseParallax({
//         moveFactor: -800,
//         abc: 0.9
//     });
//     $('.lr9').mouseParallax({
//         moveFactor: -900,
//         abc: 0.1
//     });
//     $('.lr10').mouseParallax({
//         moveFactor: -1000,
//         abc: 0.8
//     });
//     $('.lr11').mouseParallax({
//         moveFactor: -1100,
//         abc: 0.2
//     });
//     $('.lr12').mouseParallax({
//         moveFactor: -1200,
//         abc: 0.56
//     });
// });



$(document).ready(function () {
    $('nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    });
});
