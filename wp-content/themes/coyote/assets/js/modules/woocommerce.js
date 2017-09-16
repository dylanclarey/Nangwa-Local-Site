(function($) {
    'use strict';

    var woocommerce = {};
    edgtf.modules.woocommerce = woocommerce;

    woocommerce.edgtfInitQuantityButtons = edgtfInitQuantityButtons;
    woocommerce.edgtfInitSelect2 = edgtfInitSelect2;

    woocommerce.edgtfOnDocumentReady = edgtfOnDocumentReady;
    woocommerce.edgtfOnWindowLoad = edgtfOnWindowLoad;
    woocommerce.edgtfOnWindowResize = edgtfOnWindowResize;
    woocommerce.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitQuantityButtons();
        edgtfInitButtonLoading();
        edgtfInitSelect2();
        edgtfInitSingleProductImageSwitch();
        edgtfInitRelatedProducts();
        edgtfQuickViewGallery().init();
        edgtfAddedToCartButton();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {

    }
    

    function edgtfInitQuantityButtons() {

        $(document).on('click', '.edgtf-quantity-minus, .edgtf-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.edgtf-quantity-input'),
                step = parseFloat(inputField.data('step')),
                max = parseFloat(inputField.data('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('edgtf-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(0);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }
            inputField.trigger('change');

        });

    }

    function edgtfInitButtonLoading() {

        $(".add_to_cart_button").click(function(){
            $(this).children(".edgtf-btn-text").text(edgtfGlobalVars.vars.edgtfAddingToCart);
        });

    }

    function edgtfInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length || $('#calc_shipping_country').length ||  $('#calc_shipping_state').length) {

            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: Infinity
            });

            $('#calc_shipping_country, .dropdown_product_cat, .dropdown_layered_nav_color, #calc_shipping_state').select2();

        }

    }

    /*
    ** Init switch image logic for thumbnail and featured images on product single page
    */
    function edgtfInitSingleProductImageSwitch() {
            
        var thumbnailImage = $('.edgtf-single-product-wrapper-top .images .thumbnails a'),
            mainImage = $('.edgtf-single-product-wrapper-top .images .woocommerce-main-image');

        if(mainImage.length) {
            mainImage.on('click', function(e) {
                e.preventDefault();
                if(mainImage.children('.edgtf-fake-featured-image').length){
                    $('.edgtf-fake-featured-image').stop().animate({'opacity': '0'}, 100, function() {
                        $(this).remove();
                    });
                    mainImage.find('a img').css('opacity', '1');
                }             
            });
        }

        if(thumbnailImage.length) {
            thumbnailImage.each(function(){
                var thisThumbnailImage = $(this),
                    thisThumbnailImageSrc = thisThumbnailImage.attr('href');                    

                thisThumbnailImage.on('click', function(e) {
                    e.preventDefault();
                    if(thisThumbnailImageSrc !== '' && mainImage !== '') {
                        mainImage.append('<img itemprop="image" class="edgtf-fake-featured-image" src="'+thisThumbnailImageSrc+'" />');
                        if(mainImage.children('.edgtf-fake-featured-image').length > 1){
                            $('.edgtf-fake-featured-image').first().remove();
                        }
                        mainImage.find('a img').css('opacity', '0');
                    }
                });
            });
        }
    }

	function edgtfInitRelatedProducts() {
		var relatedProducts = $('.related.products');

		if (relatedProducts.length){
			var productList = relatedProducts.find('ul.products'),
				prevArrow = relatedProducts.find('.edgtf-related-prev'),
				nextArrow = relatedProducts.find('.edgtf-related-next'),
				prevSlick, nextSlick;

			var responsive = [
				{
					breakpoint: 1025,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: true
					}
				},
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: true
					}
				},
				{
					breakpoint: 601,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			];

			productList.slick({
				infinite: true,
				slidesToShow : 4,
				arrows: true,
				dots: false,
				dotsClass: 'edgtf-slick-dots',
				adaptiveHeight: true,
				prevArrow: '<span class="edgtf-slick-prev edgtf-prev-icon"></span>',
				nextArrow: '<span class="edgtf-slick-next edgtf-next-icon"></span>',
				responsive: responsive
			});

			prevSlick = relatedProducts.find('.edgtf-slick-prev');
			nextSlick = relatedProducts.find('.edgtf-slick-next');


			prevArrow.click(function(){
				prevSlick.trigger("click");
			});

			nextArrow.click(function(){
				nextSlick.trigger("click");
			});
		}
	}

    function edgtfQuickViewGallery() {

        return {
            init: function () {
                $('.yith-wcqv-button').on('click', function(){
                    $(this).addClass('edgtf-blink');
                });
                //trigger defined in yith-woocommerce-quick-view\assets\js\frontend.js
                $(document).on('qv_loader_stop',function(){

                	var gallery = $('.edgtf-quick-view-gallery-inner');

                	gallery.waitForImages(function(){
                        setTimeout(function(){
                            $('.yith-wcqv-button').removeClass('edgtf-blink');
                            gallery.css('visibility', 'visible');
                            edgtf.modules.common.edgtfSlickSlider();
                        }, 1000);
                	});

                    $('.yith-wcqv-wrapper').css('top', edgtf.scroll+20); //positioning popup on screens smaller than ipad portrait
                });
            }
        }
    }

    function edgtfAddedToCartButton(){
        $('body').on("wc_fragments_loaded", function( data ) {

            var btn = $('a.added_to_cart:not(.edgtf-btn)');
            btn.wrapInner('<span class="edgtf-btn-text"></span>');
        });
    }

})(jQuery);