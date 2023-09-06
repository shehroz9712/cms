




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

$(document).ready(function () {
    var scaleAmount = 1;
    var scrollContainer = $(".scroll-container");
    var lastScrollTop = 0;
    var scrollCounter2 = 0;
    var scrollCounter = 0;
    var contentHidden = true; // Content starts hidden

    $(window).on("scroll", function () {
        var scrollAmount = $(window).scrollTop();
        // console.log(scrollAmount);
        var scrollDirection = scrollAmount > lastScrollTop ? "down" : "up";
        lastScrollTop = scrollAmount;

        if (scrollDirection === "down") {
            scaleAmount += 0.005;
        } else {
            scaleAmount -= 0.005;
        }
        var slide_header = $('.slide-header')

        // Ensure scaleAmount stays within bounds
        scaleAmount = Math.min(Math.max(scaleAmount, 2), 15);

        var translateY = scrollAmount * 0.005;
        var moonOpacity = 1 - scrollAmount / 100;

        // Apply effect to .scroll-container .backgrounds img and .moon img
        // $(".scroll-container .backgrounds img, .scroll-container .moon img").css({
        //     "transform": "scale(" + scaleAmount + ") translateY(" + translateY + "px)",
        //     "transition": "transform 0.5s ease-in-out, opacity 0.5s ease-in-out",
        // });
        if (scrollAmount * 2 > 400) {
            // Apply effect to .scroll-container .backgrounds img first
            $(".scroll-container .backgrounds img,.scroll-container .moon img").css({

                "opacity": scrollAmount * 2 > 400 ? moonOpacity :
                    1 // Hide when opacity is zero or less

            });

            // Apply effect to .moon img

        } else {
            // Reverse the order of effects when scrolling back up
            // Apply effect to .moon img first
            $(".scroll-container .backgrounds img,.scroll-container .moon img").css({

                "opacity": scrollAmount * 2 > 400 ? moonOpacity :
                    1 // Hide when opacity is zero or less

            });

        }
        if (moonOpacity < -3) {
            $(".scroll-container .backgrounds img,.scroll-container .moon img").css({
                "display": "none"
            });
            // slide_header.addClass('position-absolute');

        } else {
            $(".scroll-container .backgrounds img,.scroll-container .moon img").css({
                "display": "block"
            });
            // slide_header.removeClass('position-absolute');

        }



        if (scrollDirection === "down") {
            // Apply effect to .scroll-container .backgrounds img first
            $(".scroll-container .backgrounds img").css({
                "transform": "scale(" + scaleAmount + ") translateY(" + translateY + "px)",
                "transition": "transform 0.5s ease-in-out, opacity 0.5s ease-in-out",

            });

            // Apply effect to .moon img
            $(".scroll-container .moon img").css({
                "top": scrollAmount * 3,
                "transition": "transform 0.5s ease-in-out, opacity 0.5s ease-in-out",

            });
        } else {
            // Reverse the order of effects when scrolling back up
            // Apply effect to .moon img first
            $(".scroll-container .moon img").css({
                "top": scrollAmount * 3,
                "transition": "transform 0.5s ease-in-out, opacity 0.5s ease-in-out",

            });

            // Set the initial scale to 1 for .scroll-container .backgrounds img
            $(".scroll-container .backgrounds img").css({
                "transform": "scale(1) translateY(" + translateY + "px)",
                "transition": "transform 0.5s ease-in-out, opacity 0.5s ease-in-out",

            });
        }

        if (scrollDirection === "down" && scrollCounter < 5) {
            // Increase the scroll counter when scrolling down
            scrollCounter++;

        } else if (scrollDirection === "up" && scrollCounter > 0) {
            // Decrease the scroll counter when scrolling back up
            scrollCounter--;

        }

        // Calculate opacity and translateY for content
        var contentOpacity = 1 - moonOpacity;
        var contentTranslateY = contentOpacity * 100; // Adjust this value as needed

        if (scrollDirection === "up" || scrollCounter === 0) {
            // Show content slowly when scrolling up or at the top
            contentOpacity = 1;
            contentTranslateY = 0;
        }

        // contentTranslateY = contentTranslateY < 700 ? contentTranslateY : 500;
        // Apply the animations to the content
        var $aboutWrapper = $(".about-section1");
        var $about_container = $(".about-container");
        $aboutWrapper.css({
            "opacity": contentOpacity,
            "transform": "translateY(-" + contentTranslateY + "px)",
            "transition": "opacity 0.5s ease-in-out, transform 0.5s ease-in-out",

        });

        // Hide the space occupied by the content when moonOpacity is zero or less
        var $aboutContainer = $(".about-container");
        var minHeight = 0;

        var maxHeight = 600; // Adjust this value as needed

        if (contentTranslateY > maxHeight) {
            $aboutContainer.css({
                "height": minHeight,
                "transition": "height 1.0s ease-in-out",
            });
        } else {
            $aboutContainer.css({
                "height": maxHeight + "px",
                "transition": "height 1.0s ease-in-out",
            });
        }
    });
    $(window).on("resize", function () {
        var viewportWidth = $(window).width();

        // Mobile adjustments
        if (viewportWidth <= 767) {
            // Example adjustments for mobile
            // You can change animation parameters as needed
            scaleAmount = 2; // Adjust scale for mobile
            // You can also adjust other parameters specific to mobile
        }
        // Tablet adjustments
        else if (viewportWidth <= 1024) {
            // Example adjustments for tablet
            // You can change animation parameters as needed
            scaleAmount = 5; // Adjust scale for tablet
            // You can also adjust other parameters specific to tablet
        }
        // Laptop/desktop adjustments (default or larger screens)
        else {
            // Example adjustments for laptop/desktop
            // You can change animation parameters as needed
            scaleAmount = 10; // Adjust scale for laptop/desktop
            // You can also adjust other parameters specific to laptop/desktop
        }

        // Apply your adjustments here
        // For example, update the CSS properties or animation parameters based on the device type
    });
});


function yesnoCheck() {
    if (document.getElementById('other').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    } else document.getElementById('ifYes').style.visibility = 'hidden';

}
$(document).ready(function () {
    $(".readMoreLink").on("click", function (event) {
        event.preventDefault();
        var index = $(this).data("index");
        $("#limitedContent" + index).slideUp("slow", function () {
            $("#fullContent" + index).slideDown("slow", function () {
                $(".readMoreLink[data-index='" + index + "']").hide();
            });
        });
    });
});

$(document).ready(function () {
    const secondPara = $("#second-para");
    const readMoreBtn = $("#read-more-btn");

    readMoreBtn.on("click", function () {
        if (secondPara.is(":hidden")) {
            secondPara.slideDown();
            readMoreBtn.text('Read Less');
        } else {
            secondPara.slideUp();
            readMoreBtn.text('Read More');
        }
    });
});