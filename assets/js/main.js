/*

Template:  Jobhere
Author: author name
Version: 1
Design and Developed by: Devitems

*/
/*================================================
[  Table of contents  ]
================================================
	01. Clear Menu
	02. Owl Carousel
	03. ScrollUp jquery
	04. wow js active
	05. jQuery MeanMenu
	06. Counter Up
	07. Textilate Activation
	08. Video Player
	09. Mail Chimp
	10. ColorSwitcher


======================================
[ End table content ]
======================================*/


(function($) {
    "use strict";
/*-------------------------------------------
    03. ScrollUp jquery
--------------------------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

/*-------------------------------------------
    04. wow js active
--------------------------------------------- */
    new WOW().init();

/*-------------------------------------------
    05. jQuery MeanMenu
--------------------------------------------- */
	jQuery('nav#dropdown').meanmenu();

/*--------------------------
    06. Counter Up
---------------------------- */
    // $('.counter').counterUp({
    //     delay: 70,
    //     time: 5000
    // });

/*------------------------------------
	07. Textilate Activation
--------------------------------------*/
    // $('.tlt').textillate({
    //     loop: true,
    //     minDisplayTime: 2500
    // });

/*------------------------------------
	08. Video Player
--------------------------------------*/
    // $(".player").YTPlayer({
    //     showControls: false
    // });

    // $(".player-small").YTPlayer({
    //     showControls: true
    // });

    // $(".player-blog").YTPlayer({
    //     showControls: true
    // });

    /*----------------------------
        10. Nice Select Activation
    ------------------------------ */
    $('select:not(.ignore)').niceSelect();



    /*------------------------------------
    	11. Customize Form
    --------------------------------------*/

    // Open
    $('.toggle-sidebar').click(function() {
        $(".customizeContainer").css("right", "0");
    });

    // Close
    $('.customize .close-btn').click(function() {
        $(".customizeContainer").css("right", "-100vw");
    });

    // Close using the empty space
    $('.customizeContainer').on('click', function(e) {
        if (e.target.classList.contains('clickToClose')) {
            $(".customizeContainer").css("right", "-100vw");
        }
    });

    $('input[name="dateRadio"]').on('click', function(e) {
        $('input[name="date"]').val('');
        if (e.target.value == 'Flexible') {
            $('input[name="date"]').css("display", "none");
        }
        else if (e.target.value == 'Month/Year') {
            $('input[name="date"]').css("display", "block");

            $('[data-toggle="datepicker"]').datepicker('destroy');
            $('[data-toggle="datepicker"]').datepicker({format: 'mm/yyyy'});
        }
        else if (e.target.value == 'Exact Date') {
            $('input[name="date"]').css("display", "block");

            $('[data-toggle="datepicker"]').datepicker('destroy');
            $('[data-toggle="datepicker"]').datepicker({format: 'mm/dd/yyyy'});
        }
    });



    /*------------------------------------
    	12. Date Picker
    --------------------------------------*/

    $('[data-toggle="datepicker"]').datepicker();



    /*------------------------------------
    	13. Guide Box
    --------------------------------------*/

    // Open
    $('.guideButton').click(function() {
        // Hide the other info
        $('.guideBoxInfo').css("display", "none");

        // Get the info ready
        var guideNumber = $(this)[0].getAttribute('value');
        var guideInfo = $('.guideBoxInfo[value="' + guideNumber + '"]');
        guideInfo.css("display", "flex");
        $('.guideBox').append(guideInfo);

        // Reveal the box
        $(".guideBoxContainer").css("right", "0");
    });

    // Close
    $('.guideBoxContainer .close-btn').click(function() {
        $(".guideBoxContainer").css("right", "-100vw");
    });

    // Close using the empty space
    $('.guideBoxContainer').on('click', function(e) {
        if (e.target.classList.contains('clickToClose')) {
            $(".guideBoxContainer").css("right", "-100vw");
        }
    });

    if (typeof readMoreInit !== 'undefined') {
        if (readMoreInit == true) {
            var readMoreTexts = document.getElementsByClassName(readMoreClass);
            for (var i = 0; i < readMoreTexts.length; i++) {
                var readMoreText = $(readMoreTexts[i]);
                var maxHeight = parseInt(readMoreText.css('line-height')) * readMoreLines;
                if (readMoreText.height() <= maxHeight) { // If it's less than or equal to the amount of lines
                    readMoreTexts[i].nextSibling.nextSibling.style.display = 'none';
                } else { // If it's a lot of text
                    readMoreTexts[i].nextSibling.nextSibling.style.display = 'block';
                }
            }
            $('.' + readMoreClass).css('max-height', maxHeight + "px");
        }
    }


})(jQuery);

/*------------------------------------
    14. Highlight Buttons on Tour Sidebar
--------------------------------------*/

if (document.getElementById('scrollAnimation') != undefined) {
    // How early to highlight the buttons in pixels
    pixelsBeforeElementOffset = 200;

    // Get the positions of elements to scroll to
    elements = document.getElementsByClassName('tourInfoBox');
    elementPositions = [];
    for (var i = 0; i < elements.length; i++) {
        elementPositions.push(elements[i].offsetTop - pixelsBeforeElementOffset);
    }

    window.onscroll = function() {
        // Figure out which element we are viewing
        var scrollPosition = document.body.scrollTop || document.documentElement.scrollTop;
        targetElementIndex = -1;
        for (var i = 0; i < elementPositions.length; i++) {
            if (scrollPosition >= elementPositions[i]) {
                targetElementIndex += 1;
            }
        }

        // Highlight the sidebar button
        if (targetElementIndex >= 0) {
            sidebarButtons = document.getElementsByClassName('sidebarButton');
            for (var i = 0; i < sidebarButtons.length; i++) {
                sidebarButtons[i].classList.remove('selected');
            }
            if (targetElementIndex <= 3) { // Don't highlight the button "Book this trip"
                sidebarButtons[targetElementIndex].classList.add('selected');
            }

        }

        // Also, lock the sidebar in place at the bottom of the page
        if (scrollPosition > document.getElementsByClassName('footer')[0].offsetTop - document.documentElement.clientHeight) {
            document.getElementById('sidebar').classList.add('locked');
        } else {
            document.getElementById('sidebar').classList.remove('locked');
        }
    }
}



/*------------------------------------
    15. Change Image
--------------------------------------*/

function changeImage(id) {
    var images = document.getElementsByClassName('mainImage');
    for (var i = 0; i < images.length; i++) {
        images[i].style.display = 'none';
    }
    document.getElementById(id).style.display = 'block';
}

function scrollImageNav(leftOrRight) {
    nav = document.getElementsByClassName('smallImageContainerContainer')[0];
    console.log(nav);
    if (leftOrRight == 'left') {
        nav.scrollLeft -= nav.clientWidth;
    } else {
        nav.scrollLeft += nav.clientWidth;
    }
}



/*------------------------------------
    16. Read More
--------------------------------------*/

function readMore(i) {
    var targetDescription = document.getElementById(readMoreClass + i);
    var targetButton = document.getElementById(readMoreButtonClass + i);
    document.getElementById(readMoreClass + i).classList.toggle('more');

    if (targetDescription.classList.contains('more')) {
        targetButton.textContent = 'Show less...';
    } else {
        targetButton.textContent = 'Read more...';
    }
}



/*------------------------------------
    17. Add Background to Navbar on Scroll
--------------------------------------*/

targetToChange = $('#sticky-header'); // Element to change
targetToWatch = $('#clearNavHere'); // Element to see if we've scrolled past or not
$(document).on('scroll', function() {
    if ($(this).scrollTop() >= targetToWatch[0].clientHeight - targetToChange[0].clientHeight) {
        targetToChange.removeClass('clear');
    } else {
        targetToChange.addClass('clear');
    }
})

$(document).trigger('scroll');
setTimeout(function(){
    $(document).trigger('scroll');
}, 1000);

$(function(){
    $('body').addClass('ready');
})