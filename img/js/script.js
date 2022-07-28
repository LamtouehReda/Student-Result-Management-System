$('.side_bar').mouseenter(function (e) { 
    $('.side_bar').removeClass('active');
});
$('.side_bar').mouseleave(function (e) { 
    $('.side_bar').toggleClass('active');
    $('#disc').removeClass('show-more')
});
$('#disc').click(function (e) { 
    $(this).toggleClass('show-more')
});
$('#disc').click(function (e) { 
    $(this).toggeleClass('show-more')
});
(function ($) {
    var allPanels = $('.toc-tab-box .acc-content').hide();
    var insdeDivs = $('.acc-content .quest .answer').hide();
    var allanswer = $('.acc-content .quest .accordionItemHeading h4')
    $('#TNIM-desc').slideDown()
    var alltitle = $('#TNIM-title,#TWM-title,#TI-title,#BDM-title,#CPM-title,#TDM-title,#MIQS-title,#PMM-title,#PFE-title,#APR-title')
    $('#TNIM-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#TNIM-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('#TWM-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#TWM-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('#TI-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#TI-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('#BDM-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#BDM-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('#CPM-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#CPM-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('#APR-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#APR-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('#TDM-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#TDM-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('#MIQS-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#MIQS-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('#PMM-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#PMM-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('#PFE-title').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            allPanels.slideUp();
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            alltitle.removeClass('open');
            $(this).addClass('open');
            $('#PFE-desc').slideDown();
        } else {
            allPanels.slideUp();
            $(this).removeClass('open');
        }
    });
    $('.acc-content .quest .accordionItemHeading h4').off().on('click', function (event) {
        if (!$(this).hasClass('open')) {
            insdeDivs.slideUp();
            allanswer.removeClass('open')
            $(this).addClass('open');
            $(this).parent().parent().parent().parent().parent().parent().find('.answer').slideDown();
        } else {
            insdeDivs.slideUp();
            $(this).removeClass('open');
        }
    });
})(jQuery);

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
}

$(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
