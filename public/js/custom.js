/**
 * When scrolling down, make top bar dark and animate it.
 */
window.onscroll = function(){topBar();};
function topBar() {
    var body = document.body;
    var haeder = document.getElementById('header');
    var menuRight = document.getElementById('menuright');
    var logo = document.getElementById('logo');
    var getpos = body.getBoundingClientRect();

    if (getpos.top === 0) {
        haeder.classList.add('transparentmenu');
        menuRight.classList.add('menu-right-transparent');
        logo.classList.add('hidden');

        haeder.classList.remove('menu');
        menuRight.classList.remove('menu-right');
    }
    else {
        haeder.classList.remove('transparentmenu');
        menuRight.classList.remove('menu-right-transparent');
        logo.classList.remove('hidden');

        haeder.classList.add('menu');
        menuRight.classList.add('menu-right');
    }
}

/**
 * Scrolling to the top when clicked on logo in topbar
 */
function scrollToTop() {
    window.scrollToY(0, 200, 'easeInOutQuint');
}

// first add raf shim
// http://www.paulirish.com/2011/requestanimationframe-for-smart-animating/
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

// main function
function scrollToY(scrollTargetY, speed, easing) {
    // scrollTargetY: the target scrollY property of the window
    // speed: time in pixels per second
    // easing: easing equation to use

    var scrollY = window.scrollY,
        // scrollTargetY = scrollTargetY || 0,
        // speed = speed || 2000,
        // easing = easing || 'easeOutSine',
        currentTime = 0;

    // min time .1, max time .8 seconds
    var time = Math.max(0.1, Math.min(Math.abs(scrollY - scrollTargetY) / speed, 0.8));

    // easing equations from https://github.com/danro/easing-js/blob/master/easing.js
    var PI_D2 = Math.PI / 2,
        easingEquations = {
            easeOutSine: function (pos) {
                return Math.sin(pos * (Math.PI / 2));
            },
            easeInOutSine: function (pos) {
                return (-0.5 * (Math.cos(Math.PI * pos) - 1));
            },
            easeInOutQuint: function (pos) {
                if ((pos /= 0.5) < 1) {
                    return 0.5 * Math.pow(pos, 5);
                }
                return 0.5 * (Math.pow((pos - 2), 5) + 2);
            }
        };

    // add animation loop
    function tick() {
        currentTime += 1 / 60;

        var p = currentTime / time;
        var t = easingEquations[easing](p);

        if (p < 1) {
            requestAnimFrame(tick);

            window.scrollTo(0, scrollY + ((scrollTargetY - scrollY) * t));
        } else {
            console.log('scroll done');
            window.scrollTo(0, scrollTargetY);
        }
    }

    // call it once to get started
    tick();
}

/**
 * Show/hide the discription of a card
 */
function showDiscriptionCard(thisId) {
    var checkArrow = document.getElementById(thisId).getElementsByClassName("glyphicon-chevron-down").item(0);
    var cardDiscription = document.getElementById(thisId).parentNode.getElementsByClassName("card-discription").item(0);
    var arrow = document.getElementById(thisId).getElementsByClassName("glyphicon").item(0);

    if (checkArrow) {
        cardDiscription.classList.remove('card-discription-hide');
        cardDiscription.classList.add('card-discription-show');

        arrow.classList.remove('glyphicon-chevron-down');
        arrow.classList.add('glyphicon-chevron-up');

        window.setTimeout(function(){
            cardDiscription.classList.remove('card-discription-transition-down');
            cardDiscription.classList.add('card-discription-transition-up');
        }, 1000);
    } else {

        cardDiscription.classList.add('card-discription-hide');
        cardDiscription.classList.remove('card-discription-show');

        arrow.classList.add('glyphicon-chevron-down');
        arrow.classList.remove('glyphicon-chevron-up');

        window.setTimeout(function(){
            cardDiscription.classList.add('card-discription-transition-down');
            cardDiscription.classList.remove('card-discription-transition-up');
        }, 10);
    }
}

window.onscroll = function(){blogTop();};
function blogTop() {
    var haeder = document.getElementById('blog-header');
    var getpos = document.body.getBoundingClientRect();
    if (getpos.top === 0) {
        haeder.classList.add('blog-header-background');
        haeder.classList.remove('blog-header-background-border');
    }
    else {
        haeder.classList.add('blog-header-background-border');
        haeder.classList.remove('blog-header-background');
    }
}
