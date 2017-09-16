(function($) {
	"use strict";

    var common = {};
    edgtf.modules.common = common;

    common.edgtfIsTouchDevice = edgtfIsTouchDevice;
    common.edgtfDisableSmoothScrollForMac = edgtfDisableSmoothScrollForMac;
    common.edgtfFluidVideo = edgtfFluidVideo;
    common.edgtfPreloadBackgrounds = edgtfPreloadBackgrounds;
    common.edgtfPrettyPhoto = edgtfPrettyPhoto;
    common.edgtfCheckHeaderStyleOnScroll = edgtfCheckHeaderStyleOnScroll;
    common.edgtfInitParallax = edgtfInitParallax;
    //common.edgtfSmoothScroll = edgtfSmoothScroll;
    common.edgtfEnableScroll = edgtfEnableScroll;
    common.edgtfDisableScroll = edgtfDisableScroll;
    common.edgtfWheel = edgtfWheel;
    common.edgtfKeydown = edgtfKeydown;
    common.edgtfPreventDefaultValue = edgtfPreventDefaultValue;
    common.edgtfSlickSlider = edgtfSlickSlider;
    common.edgtfInitSelfHostedVideoPlayer = edgtfInitSelfHostedVideoPlayer;
    common.edgtfSelfHostedVideoSize = edgtfSelfHostedVideoSize;
    common.edgtfInitBackToTop = edgtfInitBackToTop;
    common.edgtfBackButtonShowHide = edgtfBackButtonShowHide;
    common.edgtfSmoothTransition = edgtfSmoothTransition;
    common.edgtfShuffleChars = edgtfShuffleChars;
    common.edgtfBackToTopSkin = edgtfBackToTopSkin;

    common.edgtfOnDocumentReady = edgtfOnDocumentReady;
    common.edgtfOnWindowLoad = edgtfOnWindowLoad;
    common.edgtfOnWindowResize = edgtfOnWindowResize;
    common.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfIsTouchDevice();
        edgtfDisableSmoothScrollForMac();
        edgtfFluidVideo();
        edgtfPreloadBackgrounds();
        edgtfPrettyPhoto();
        edgtfInitElementsAnimations();
        edgtfInitAnchor().init();
        edgtfInitVideoBackground();
        edgtfInitVideoBackgroundSize();
        edgtfSetContentBottomMargin();
        //edgtfSmoothScroll();
		edgtfSlickSlider();
        edgtfInitSelfHostedVideoPlayer();
        edgtfSelfHostedVideoSize();
        edgtfInitBackToTop();
        edgtfBackButtonShowHide();
        edgtfShuffleChars();
        edgtfBackToTopSkin();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfCheckHeaderStyleOnScroll(); //called on load since all content needs to be loaded in order to calculate row's position right
        edgtfInitParallax();
        edgtfSmoothTransition();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
        edgtfInitVideoBackgroundSize();
        edgtfSelfHostedVideoSize();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {
        
    }

    /*
     ** Disable shortcodes animation on appear for touch devices
     */
    function edgtfIsTouchDevice() {
        if(Modernizr.touch && !edgtf.body.hasClass('edgtf-no-animations-on-touch')) {
            edgtf.body.addClass('edgtf-no-animations-on-touch');
        }
    }

    /*
     ** Disable smooth scroll for mac if smooth scroll is enabled
     */
    function edgtfDisableSmoothScrollForMac() {
        var os = navigator.appVersion.toLowerCase();

        if (os.indexOf('mac') > -1 && edgtf.body.hasClass('edgtf-smooth-scroll')) {
            edgtf.body.removeClass('edgtf-smooth-scroll');
        }
    }

	function edgtfFluidVideo() {
        fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'player.vimeo.com']
		});
	}

	/**
     * Init Slick Carousel
     */
    function edgtfSlickSlider() {

        var sliders = $('.edgtf-slick-slider:not(.slick-initialized)');

        if (sliders.length) {
            sliders.each(function(){

                var slider = $(this),
                	element;

    			slider.on('init', function(slick){
					element = slider.find('.slick-slide');

					element.each(function(){
						var thisElement = $(this),
							flag = 0,
							mousedownFlag = 0,
							moved = false;
							
						thisElement.on("mousedown", function(){
							flag = 0;
							mousedownFlag = 1;
							moved = false;
						});

						thisElement.on("mousemove", function(){
							if (mousedownFlag == 1){
								if (moved){
									flag = 1;
								}
								moved = true;
							}
						});

						thisElement.on("mouseleave", function(){
							flag = 0;
						});

						thisElement.on("mouseup", function(e){
							if(flag === 1){
								thisElement.find('a[data-rel^="prettyPhoto"]').unbind('click');
							}
							else{
								edgtf.modules.common.edgtfPrettyPhoto();
							}
							flag = 0;
							mousedownFlag = 0;
						});
					});

				});

				slider.slick({
					infinite: true,
					autoplay: true,
					slidesToShow : 1,
					arrows: true,
					dots: false,
					adaptiveHeight: true,
                    easing: 'easeInOutQuint',
                    speed: 1200,
					prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"><span class="icon-arrows-slim-left"></span></span>',
					nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"><span class="icon-arrows-slim-right"></span></span>'
				});

            });
        }

    }


    /*
     *	Preload background images for elements that have 'edgtf-preload-background' class
     */
    function edgtfPreloadBackgrounds(){

        $(".edgtf-preload-background").each(function() {
            var preloadBackground = $(this);
            if(preloadBackground.css("background-image") !== "" && preloadBackground.css("background-image") != "none") {

                var bgUrl = preloadBackground.attr('style');

                bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
                bgUrl = bgUrl ? bgUrl[1] : "";

                if (bgUrl) {
                    var backImg = new Image();
                    backImg.src = bgUrl;
                    $(backImg).load(function(){
                        preloadBackground.removeClass('edgtf-preload-background');
                    });
                }
            }else{
                $(window).load(function(){ preloadBackground.removeClass('edgtf-preload-background'); }); //make sure that edgtf-preload-background class is removed from elements with forced background none in css
            }
        });
    }

    function edgtfPrettyPhoto() {
        /*jshint multistr: true */
        var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><i class="icon-arrows-slim-right"></i></a> \
                                            <a class="pp_previous" href="#"><i class="icon-arrows-slim-left"></i></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';

        $("a[data-rel^='prettyPhoto']").prettyPhoto({
            hook: 'data-rel',
            animation_speed: 'normal', /* fast/slow/normal */
            slideshow: false, /* false OR interval time in ms */
            autoplay_slideshow: false, /* true/false */
            opacity: 0.80, /* Value between 0 and 1 */
            show_title: true, /* true/false */
            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
            horizontal_padding: 0,
            default_width: 960,
            default_height: 540,
            counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
            theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque', /* Set the flash wmode attribute */
            autoplay: true, /* Automatically start videos: True/False */
            modal: false, /* If set to true, only the close button will close the window */
            overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
            keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
            deeplinking: false,
            custom_markup: '',
            social_tools: false,
            markup: markupWhole
        });
    }

    /*
     *	Check header style on scroll, depending on row settings
     */
    function edgtfCheckHeaderStyleOnScroll(){

        if($('[data-edgtf_header_style]').length > 0 && edgtf.body.hasClass('edgtf-header-style-on-scroll')) {

            var waypointSelectors = $('.wpb_row.edgtf-section');
            var changeStyle = function(element){
                (element.data("edgtf_header_style") !== undefined) ? edgtf.body.removeClass('edgtf-dark-header edgtf-light-header').addClass(element.data("edgtf_header_style")) : edgtf.body.removeClass('edgtf-dark-header edgtf-light-header').addClass(''+edgtf.defaultHeaderStyle);
            };

            waypointSelectors.waypoint( function(direction) {
                if(direction === 'down') { changeStyle($(this.element)); }
            }, { offset: 0});

            waypointSelectors.waypoint( function(direction) {
                if(direction === 'up') { changeStyle($(this.element)); }
            }, { offset: function(){
                return -$(this.element).outerHeight();
            } });
        }
    }

    /*
     *	Start animations on elements
     */
    function edgtfInitElementsAnimations(){

        var touchClass = $('.edgtf-no-animations-on-touch'),
            noAnimationsOnTouch = true,
            elements = $('.edgtf-grow-in, .edgtf-fade-in-down, .edgtf-element-from-fade, .edgtf-element-from-left, .edgtf-element-from-right, .edgtf-element-from-top, .edgtf-element-from-bottom, .edgtf-flip-in, .edgtf-x-rotate, .edgtf-z-rotate, .edgtf-y-translate, .edgtf-fade-in, .edgtf-fade-in-left-x-rotate'),
            clasess,
            animationClass,
            animationData;

        if (touchClass.length) {
            noAnimationsOnTouch = false;
        }

        if(elements.length > 0 && noAnimationsOnTouch){
            elements.each(function(){
				$(this).appear(function() {
					animationData = $(this).data('animation');
					if(typeof animationData !== 'undefined' && animationData !== '') {
						animationClass = animationData;
						$(this).addClass(animationClass+'-on');
					}
                },{accX: 0, accY: edgtfGlobalVars.vars.edgtfElementAppearAmount});
            });
        }

    }


/*
 **	Sections with parallax background image
 */
	function edgtfInitParallax(){

		if($('.edgtf-parallax-section-holder').length){
			$('.edgtf-parallax-section-holder').each(function() {

				var parallaxElement = $(this);
				if(parallaxElement.hasClass('edgtf-full-screen-height-parallax')){
                    parallaxElement.css('height', '100vh');
					parallaxElement.find('.edgtf-parallax-content-outer').css('padding',0);
				}
                var speed = parallaxElement.data('edgtf-parallax-speed')*0.4;
                setTimeout(function() {
                        parallaxElement.parallax("50%", speed);
                    },200
                );
			});
		}
	}

/*
 **	Anchor functionality
 */
var edgtfInitAnchor = edgtf.modules.common.edgtfInitAnchor = function() {

    /**
     * Set active state on clicked anchor
     * @param anchor, clicked anchor
     */
    var setActiveState = function(anchor){

        $('.edgtf-main-menu .edgtf-active-item, .edgtf-mobile-nav .edgtf-active-item, .edgtf-vertical-menu .edgtf-active-item, .edgtf-fullscreen-menu .edgtf-active-item').removeClass('edgtf-active-item');
        anchor.parent().addClass('edgtf-active-item');

        $('.edgtf-main-menu a, .edgtf-mobile-nav a, .edgtf-vertical-menu a, .edgtf-fullscreen-menu a').removeClass('current');
        anchor.addClass('current');
    };

    /**
     * Check anchor active state on scroll
     */
    var checkActiveStateOnScroll = function(){

        $('[data-edgtf-anchor]').waypoint( function(direction) {
            if(direction === 'down') {
                setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("edgtf-anchor")+"']"));
            }
        }, { offset: '50%' });

        $('[data-edgtf-anchor]').waypoint( function(direction) {
            if(direction === 'up') {
                setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("edgtf-anchor")+"']"));
            }
        }, { offset: function(){
            return -($(this.element).outerHeight() - 150);
        } });

    };

    /**
     * Check anchor active state on load
     */
    var checkActiveStateOnLoad = function(){
        var hash = window.location.hash.split('#')[1];

        if(hash !== "" && $('[data-edgtf-anchor="'+hash+'"]').length > 0){
            //triggers click which is handled in 'anchorClick' function
            var linkURL = window.location.href.split('#')[0]+"#"+hash;
            if($("a[href='"+linkURL+"']").length){ //if there is a link on page with such href
                $("a[href='"+linkURL+"']").trigger( "click" );
            }else{ //than create a fake link and click it
                var link = $('<a/>').attr({'href':linkURL,'class':'edgtf-anchor'}).appendTo('body');
                link.trigger('click');
            }
        }
    };

    /**
     * Calculate header height to be substract from scroll amount
     * @param anchoredElementOffset, anchorded element offest
     */
    var headerHeihtToSubtract = function(anchoredElementOffset){

        if(edgtf.modules.header.behaviour == 'edgtf-sticky-header-on-scroll-down-up') {
            (anchoredElementOffset > edgtf.modules.header.stickyAppearAmount) ? edgtf.modules.header.isStickyVisible = true : edgtf.modules.header.isStickyVisible = false;
        }

        if(edgtf.modules.header.behaviour == 'edgtf-sticky-header-on-scroll-up') {
            (anchoredElementOffset > edgtf.scroll) ? edgtf.modules.header.isStickyVisible = false : '';
        }

        var headerHeight = edgtf.modules.header.isStickyVisible ? edgtfGlobalVars.vars.edgtfStickyHeaderTransparencyHeight : edgtfPerPageVars.vars.edgtfHeaderTransparencyHeight;

        return headerHeight;
    };

    /**
     * Handle anchor click
     */
    var anchorClick = function() {
        edgtf.document.on("click", ".edgtf-main-menu a, .edgtf-vertical-menu a, .edgtf-fullscreen-menu a, .edgtf-btn, .edgtf-anchor, .edgtf-mobile-nav a", function() {
            var scrollAmount;
            var anchor = $(this);
            var hash = anchor.prop("hash").split('#')[1];

            if(hash !== "" && $('[data-edgtf-anchor="' + hash + '"]').length > 0 /*&& anchor.attr('href').split('#')[0] == window.location.href.split('#')[0]*/) {

                var anchoredElementOffset = $('[data-edgtf-anchor="' + hash + '"]').offset().top;
                scrollAmount = $('[data-edgtf-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset);

                setActiveState(anchor);

                edgtf.html.stop().animate({
                    scrollTop: Math.round(scrollAmount)
                }, 1000, function() {
                    //change hash tag in url
                    if(history.pushState) { history.pushState(null, null, '#'+hash); }
                });
                return false;
            }
        });
    };

    return {
        init: function() {
            if($('[data-edgtf-anchor]').length) {
                anchorClick();
                checkActiveStateOnScroll();
                $(window).load(function() { checkActiveStateOnLoad(); });
            }
        }
    };

};

/*
 **	Video background initialization
 */
function edgtfInitVideoBackground(){

    $('.edgtf-section .edgtf-video-wrap .edgtf-video').mediaelementplayer({
        enableKeyboard: false,
        iPadUseNativeControls: false,
        pauseOtherPlayers: false,
        // force iPhone's native controls
        iPhoneUseNativeControls: false,
        // force Android's native controls
        AndroidUseNativeControls: false
    });

    //mobile check
    if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
        edgtfInitVideoBackgroundSize();
        $('.edgtf-section .edgtf-mobile-video-image').show();
        $('.edgtf-section .edgtf-video-wrap').remove();
    }
}

    /*
     **	Calculate video background size
     */
    function edgtfInitVideoBackgroundSize(){

        $('.edgtf-section .edgtf-video-wrap').each(function(){

            var element = $(this);
            var sectionWidth = element.closest('.edgtf-section').outerWidth();
            element.width(sectionWidth);

            var sectionHeight = element.closest('.edgtf-section').outerHeight();
            edgtf.minVideoWidth = edgtf.videoRatio * (sectionHeight+20);
            element.height(sectionHeight);

            var scaleH = sectionWidth / edgtf.videoWidthOriginal;
            var scaleV = sectionHeight / edgtf.videoHeightOriginal;
            var scale =  scaleV;
            if (scaleH > scaleV)
                scale =  scaleH;
            if (scale * edgtf.videoWidthOriginal < edgtf.minVideoWidth) {scale = edgtf.minVideoWidth / edgtf.videoWidthOriginal;}

            element.find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * edgtf.videoWidthOriginal +2));
            element.find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * edgtf.videoHeightOriginal +2));
            element.scrollLeft((element.find('video').width() - sectionWidth) / 2);
            element.find('.mejs-overlay, .mejs-poster').scrollTop((element.find('video').height() - (sectionHeight)) / 2);
            element.scrollTop((element.find('video').height() - sectionHeight) / 2);
        });

    }

    /*
     **	Set content bottom margin because of the uncovering footer
     */
    function edgtfSetContentBottomMargin(){
        var uncoverFooter = $('.edgtf-footer-uncover');

        if(uncoverFooter.length){
            $('.edgtf-content').css('margin-bottom', $('.edgtf-footer-inner').height());
        }
    }

	/*
	** Initiate Smooth Scroll
	*/
	//function edgtfSmoothScroll(){
	//
	//	if(edgtf.body.hasClass('edgtf-smooth-scroll')){
	//
	//		var scrollTime = 0.4;			//Scroll time
	//		var scrollDistance = 300;		//Distance. Use smaller value for shorter scroll and greater value for longer scroll
	//
	//		var mobile_ie = -1 !== navigator.userAgent.indexOf("IEMobile");
	//
	//		var smoothScrollListener = function(event){
	//			event.preventDefault();
	//
	//			var delta = event.wheelDelta / 120 || -event.detail / 3;
	//			var scrollTop = edgtf.window.scrollTop();
	//			var finalScroll = scrollTop - parseInt(delta * scrollDistance);
	//
	//			TweenLite.to(edgtf.window, scrollTime, {
	//				scrollTo: {
	//					y: finalScroll, autoKill: !0
	//				},
	//				ease: Power1.easeOut,
	//				autoKill: !0,
	//				overwrite: 5
	//			});
	//		};
	//
	//		if (!$('html').hasClass('touch') && !mobile_ie) {
	//			if (window.addEventListener) {
	//				window.addEventListener('mousewheel', smoothScrollListener, false);
	//				window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
	//			}
	//		}
	//	}
	//}

    function edgtfDisableScroll() {

        if (window.addEventListener) {
            window.addEventListener('DOMMouseScroll', edgtfWheel, false);
        }
        window.onmousewheel = document.onmousewheel = edgtfWheel;
        document.onkeydown = edgtfKeydown;

        if(edgtf.body.hasClass('edgtf-smooth-scroll')){
            window.removeEventListener('mousewheel', smoothScrollListener, false);
            window.removeEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function edgtfEnableScroll() {
        if (window.removeEventListener) {
            window.removeEventListener('DOMMouseScroll', edgtfWheel, false);
        }
        window.onmousewheel = document.onmousewheel = document.onkeydown = null;

        if(edgtf.body.hasClass('edgtf-smooth-scroll')){
            window.addEventListener('mousewheel', smoothScrollListener, false);
            window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function edgtfWheel(e) {
        edgtfPreventDefaultValue(e);
    }

    function edgtfKeydown(e) {
        var keys = [37, 38, 39, 40];

        for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
                edgtfPreventDefaultValue(e);
                return;
            }
        }
    }

    function edgtfPreventDefaultValue(e) {
        e = e || window.event;
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.returnValue = false;
    }

    function edgtfInitSelfHostedVideoPlayer() {

        var players = $('.edgtf-self-hosted-video');
            players.mediaelementplayer({
                audioWidth: '100%'
            });
    }

	function edgtfSelfHostedVideoSize(){

		$('.edgtf-self-hosted-video-holder .edgtf-video-wrap').each(function(){
			var thisVideo = $(this);

			var videoWidth = thisVideo.closest('.edgtf-self-hosted-video-holder').outerWidth();
			var videoHeight = videoWidth / edgtf.videoRatio;

			if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
				thisVideo.parent().width(videoWidth);
				thisVideo.parent().height(videoHeight);
			}

			thisVideo.width(videoWidth);
			thisVideo.height(videoHeight);

			thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
			thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
		});
	}

    function edgtfToTopButton(a) {

        var b = $("#edgtf-back-to-top");
        b.removeClass('off on');
        if (a === 'on') { b.addClass('on'); } else { b.addClass('off'); }
    }

    function edgtfBackButtonShowHide(){
        edgtf.window.scroll(function () {
            var b = $(this).scrollTop();
            var c = $(this).height();
            var d;
            if (b > 0) { d = b + c / 2; } else { d = 1; }
            if (d < 1e3) { edgtfToTopButton('off'); } else { edgtfToTopButton('on'); }
        });
    }

    function edgtfInitBackToTop(){
        var backToTopButton = $('#edgtf-back-to-top');

        backToTopButton.on('click',function(e){
            e.preventDefault();
            edgtf.html.animate({scrollTop: 0}, edgtf.window.scrollTop()/3, 'easeInOutQuint');
        });
    }

    function edgtfBackToTopSkin(){
        var btt = $('#edgtf-back-to-top'),
            skinElements = $('footer:not(.edgtf-disable-footer), .edgtf-btt-light-skin'),
            skinSet = false,
            skinTrigger = new Array();

        var bttSkin = function() {
            if (skinElements.length) {
                skinElements.each(function(i){
                    var skinElement = $(this);

                    if (edgtf.scroll + btt.position().top >= skinElement.offset().top && edgtf.scroll + btt.position().top <= skinElement.offset().top + skinElement.outerHeight()) {
                        skinTrigger[i] = true;
                    } else {
                        skinTrigger[i] = false;
                    }
                });

                if (jQuery.inArray(true, skinTrigger) != -1) {
                    if (!skinSet) {
                        btt.addClass('edgtf-light');
                        skinSet = true;
                    }
                } else {
                    if (skinSet) {
                        btt.removeClass('edgtf-light');
                        skinSet = false;
                    }
                }
            }
        }

        $(window).scroll(function() {
            if (btt.length && skinElements.length) {
                bttSkin();
            }
        });
    }

    function edgtfSmoothTransition() {
        var loader = $('body > .edgtf-smooth-transition-loader.edgtf-mimic-ajax');
        if (loader.length) {
            var coyoteLoader = loader.find('.edgtf-coyote-spinner'),
                delay = 0;

            if (coyoteLoader.length) {
                delay = 1600;
            }

            var removeLoader = function() {
                setTimeout(function(){
                    if (coyoteLoader.length) {
                        coyoteLoader.addClass('edgtf-loaded');
                        setTimeout(function(){
                            coyoteLoader.parent().animate({opacity: 0}, 400, 'easeInOutQuint');
                            loader.slideUp(800, 'easeInOutQuint');
                            setTimeout(function(){
                                $(document).trigger('edgtf-spinner-removed');
                                edgtf.body.addClass('edgtf-spinner-removed');
                            }, 600);
                        }, delay);
                    } else {
                        loader.fadeOut(500);
                    }
                }, delay);
            }

            removeLoader();
            $(window).bind("pageshow", function(event) {
                if (event.originalEvent.persisted) {
                    removeLoader();
                }
            });

            $('a').click(function(e) {
                var a = $(this);
                if (
                    e.which == 1 && // check if the left mouse button has been pressed
                    a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
					(typeof a.data('rel') === 'undefined') && //Not pretty photo link
                    (typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                    !a.hasClass('edgtf-like') && //Not like link
                    !a.parent().hasClass('edgtf-blog-load-more-button') && //Not load more
                    (typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
                    (a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
                ) {
                    e.preventDefault();
                    loader.addClass('edgtf-hide-spinner');
                    loader.fadeIn(500, function() {
                        window.location = a.attr('href');
                    });
                }
            });
        }
    }

    function edgtfShuffleChars() {
        var items = $('.edgtf-portfolio-filter-holder-inner > ul > li > span, .edgtf-shop-filter-holder-inner > ul > li > span');

        items.each(function(){
            var item = $(this), 
                hovered = false;

            item.attr('data-lang','en');

            item.css({
                'width': item.outerWidth(),
                'white-space': 'nowrap'
            });

            item.chaffle({
                speed: 40,
                time: 70
            });
        });
    }

})(jQuery);


