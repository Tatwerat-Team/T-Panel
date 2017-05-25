/*----------( Abdo Hamoud FrameWork )---------*/
//-> AH_JS (jQuery.javascript) FrameWork
function runUploader(img_id, title, value, multiple) {
    if (multiple == true) {
        multiple = true;
    } else {
        multiple = false;
    }
    //e.preventDefault();
    var custom_uploader;
    //console.log(img_id);
    //If the uploader object has already been created, reopen the dialog
    if (custom_uploader) {
        custom_uploader.open();
        return;
    }
    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
        title: title,
        button: {
            text: value
        },
        //type: 'image', //audio, video, application/pdf, ... etc
        multiple: multiple
    });
    //When a file is selected, grab the URL and set it as the text field's value
    custom_uploader.on('select', function () {
        if (multiple == true) {
            var img = '';
            var photos = [];
            var attachment = custom_uploader.state().get('selection').toJSON();
            jQuery.each(attachment, function (i, data) {
                photos.push(data.url);
            });
            //console.log(photos);
            jQuery.each(photos, function (i, data) {
                img += '<img src="' + data + '" alt="">';
            });
            jQuery(img_id).next().next('.panel-photos').html(img);
            jQuery(img_id).parent().find('a.img-remove').show();
            jQuery(img_id).val(photos);
        } else {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery(img_id).val(attachment.url).focus().blur();
        }
    });
    //Open the uploader dialog
    custom_uploader.open();
}
function AH_JS() {
    this.centerBlock = function (minVal, elm) {
        jQuery(elm).each(function () {
            var width = window.innerWidth;
            var height = window.innerHeight;
            jQuery(this).css({
                "left": width / 2 - minVal + "px",
                "top": height / 2 - minVal + "px",
                "display": "block"
            });
        });
    };
    this.removeClass = function (elm, attr) {
        jQuery(elm).removeClass(attr);
    };
    this.tispy = function () {
        jQuery('.s_title').tipsy({gravity: 's', fade: false});
        jQuery('.n_title').tipsy({gravity: 'n', fade: false});
        jQuery('.e_title').tipsy({gravity: 'e', fade: false});
        jQuery('.o_title').tipsy({gravity: 'o', fade: false});
    };
    this.customUI = function () {
        //jQuery('.video_player a.play').venobox();

        function isArabic(elm) {
            var arregex = /[\u0600-\u06FF]/;
            if (arregex.test(jQuery(elm).html())) {
                jQuery(elm).css({"font-family": "Droid Kufi", "font-size": "16px"});
            }
        }
        //isArabic('.video_player .info p,.getPlaylist h3');

        // upload button
        jQuery('.panel-upload.single button').on('click', function () {
            runUploader(jQuery(this).attr('data-id'), jQuery(this).attr('data-title'), jQuery(this).attr('data-value'), false);
        });
        jQuery('.panel-upload.multiple button').on('click', function () {
            runUploader(jQuery(this).attr('data-id'), jQuery(this).attr('data-title'), jQuery(this).attr('data-value'), true);
        });

        // slider
        jQuery('.panel-slider .slider').each(function () {
            var imput = jQuery(this).attr('data-id');
            var minVal = parseInt(jQuery(imput).attr('data-min'));
            var maxVal = parseInt(jQuery(imput).attr('data-max'));
            var stepVal = parseInt(jQuery(imput).attr('data-step'));
            jQuery(this).slider({
                range: false,
                min: minVal,
                max: maxVal,
                step: stepVal,
                values: [jQuery(imput).val()],
                slide: function (event, ui) {
                    //jQuery( "#amount" ).val( "jQuery" + ui.values[ 0 ] + " - jQuery" + ui.values[ 1 ] );
                    jQuery(imput).val(ui.values[0]);
                    //jQuery('.panel-slider input').val(ui.values[1]);
                }
            });
        });

        // spinner
        jQuery(".T-Content .spinner").each(function () {
            jQuery(this).spinner({
                min: parseInt(jQuery(this).attr('data-min')),
                max: parseInt(jQuery(this).attr('data-max')),
                step: parseInt(jQuery(this).attr('data-step')),
                start: 1000,
                numberFormat: "C"
            });
        });

        // block toggle
        jQuery('.panel-tab').each(function (index, element) {
            //console.log(element);
            jQuery(element).find('.panel-block:first .block-head i.fa').removeClass('fa-sort-down').addClass('fa-sort-up');
            jQuery(element).find('.panel-block:first .block-body').show();
        });
        jQuery('.panel-block .block-head').on('click', function () {
            jQuery(this).parents('.panel-tab').find('.block-head i.fa').removeClass('fa-sort-up').addClass('fa-sort-down');
            jQuery(this).find('i.fa').removeClass('fa-sort-down').addClass('fa-sort-up');
            jQuery(this).parents('.panel-tab').find('.block-body').hide();
            jQuery(this).next().fadeIn(500);
            return false;
        });

        // sidebar height
        //jQuery('#T-Panel .T-Side').css({"height": jQuery('#T-Panel .T-Content').height() + 21 + "px"});

        // checkbox
        jQuery('.panel-checkbox input[value="true"]').parent().addClass('checked');
        jQuery('.panel-checkbox').click(function () {
            var value = jQuery(this).find('input').val();
            if (value === 'false') {
                jQuery(this).addClass('checked').find('input').val('true');
            } else {
                jQuery(this).removeClass('checked').find('input').val('false');
            }
        });

        // radiobox
        jQuery('.panel-radio input:checked').parent().addClass('checked');
        jQuery('.panel-radio input').click(function () {
            var name = jQuery(this).attr('name');
            jQuery('.panel-radio input[name="' + name + '"]').parent().removeClass('checked');
            if (jQuery(this).is(':checked')) {
                jQuery(this).parent().addClass('checked');
            }
        });

        // panel-color
        jQuery('.panel-color').each(function () {
            var color = jQuery(this).find('input').val();
            jQuery(this).find("a[data-color='" + color + "']").addClass('active');
            jQuery('a', this).on('click', function () {
                var myColor = jQuery(this).attr('data-color');
                jQuery(this).parent().find('input').val(myColor);
                jQuery('.panel-color a').removeClass('active');
                jQuery(this).addClass('active');
            }).each(function () {
                var myColor = jQuery(this).attr('data-color');
                jQuery(this).css({"background": myColor});
            });
        });

        // panel tab
        jQuery('.T-Side ul li:first').addClass('active');
        jQuery('.T-Content .panel-tab:first').show();
        //jQuery('#T-Panel .T-Side').css({"height": jQuery('#T-Panel .T-Content').height() + 20 + "px"});
        jQuery('.T-Side ul > li > a').on('click', function () {
            var tab = jQuery(this).attr('data-tab');
            jQuery('.T-Side ul li').removeClass('active');
            jQuery(this).parent().addClass('active');
            if (jQuery(window).scrollTop() > 10) {
                jQuery('html,body').animate({scrollTop: 0}, 500);
            }
            if (tab) {
                jQuery('.T-Content .panel-tab').hide();
                jQuery('.T-Content .panel-tab#' + tab).fadeIn();
                //jQuery('#T-Panel .T-Side').css({"height": jQuery('#T-Panel .T-Content').height() + 80 + "px"});
            }
            return false;
        });

        jQuery('.T-Side ul li:has(ul)').each(function () {
            jQuery('> ul > li a', this).on('click', function () {
                //jQuery(this).parents('ul').show();
                jQuery(this).parent().parent().parent().addClass('active');
            });

        });

        // upload remove btn
        jQuery('.panel-upload.single input').on('focus', function () {
            var value = jQuery(this).val();
            if (value == '') {
                jQuery(this).parent().find('img').fadeOut(300);
                jQuery(this).parent().find('a.img-remove').fadeOut(250);
            } else {
                jQuery(this).parent().find('img').fadeIn(300).attr('src', value);
                jQuery(this).parent().find('a.img-remove').fadeIn(250);
            }
        });
        jQuery('.panel-upload.single input').on('blur', function () {
            var value = jQuery(this).val();
            if (value == '') {
                jQuery(this).parent().find('img').fadeOut(300);
                jQuery(this).parent().find('a.img-remove').fadeOut(250);
            } else {
                jQuery(this).parent().find('img').fadeIn(300).attr('src', value);
                jQuery(this).parent().find('a.img-remove').fadeIn(250);
            }
        });
        jQuery('.panel-upload a.img-remove').on('click', function () {
            jQuery(this).parent().find('input').val('').focus().blur();
            jQuery(this).parent().find('.panel-photos').html('');
            jQuery(this).hide();
            return false;
        });
        jQuery('.panel-upload.multiple input').each(function () {
            var value = jQuery(this).val();
            var img = '';
            var photos = value.split(',');
            //console.log(photos);
            jQuery.each(photos, function (i, data) {
                img += '<img src="' + data + '" alt="">';
            });
            jQuery(this).next().next('.panel-photos').html(img);
        });

        // mini colors
        jQuery('.T-Content input.minicolors').minicolors();

        // header types
        jQuery('#haeder_bg_1, #haeder_bg_2, #haeder_bg_3').hide();
        jQuery('#' + jQuery('#header_bg_types input:checked').val()).show();
        jQuery('#header_bg_types input').click(function () {
            jQuery('#haeder_bg_1, #haeder_bg_2, #haeder_bg_3').hide();
            jQuery('#' + jQuery(this).val()).fadeIn();
        });

        // chose icons
        jQuery('.panel-icons button').on('click', function () {
            if (jQuery(this).next('div').is(':hidden')) {
                jQuery(this).next('div').fadeIn(250);
                jQuery(this).find('i').removeClass('fa-sort-down');
                jQuery(this).find('i').addClass('fa-times');
            } else {
                jQuery(this).next('div').fadeOut(250);
                jQuery(this).find('i').addClass('fa-sort-down');
                jQuery(this).find('i').removeClass('fa-times');
            }
        });
        jQuery('.panel-icons ul > li').on('click', function () {
            var type = jQuery(this).data('type');
            var icon_class = jQuery('i', this).attr('class');
            var panel = jQuery(this).parents('.panel-icons');
            panel.find('input:text').val(icon_class);
            panel.find('span').removeClass().addClass(icon_class);
            panel.find('div').fadeOut(250);
            panel.find('button i').addClass('fa-sort-down');
            panel.find('button i').removeClass('fa-times');
        });
        jQuery('.panel-icons').each(function () {
            var icon = jQuery('input:text', this).val();
            icon = icon.replace(" ", ".");
            if (icon) {
                jQuery('ul li > i.' + icon, this).parent().addClass('active');
            }
        });

        // ajax form
        jQuery('.T-Content form.formOptions').on('submit', function () {
            var form = jQuery(this);
            form.find('.form-loading').show();
            jQuery.post('', form.serialize(), function () {
                form.find('.form-loading').hide();
                form.find('.form-success').show().delay(3000).fadeOut(500);
            });
            return false;
        });

        // resset options
        jQuery('.btn-reset').on('click', function () {
            var btn = jQuery(this);
            var msg = confirm("Restore Panel Options ?");
            if (msg == true) {
                jQuery('.T-Content form.formOptions').find('.form-loading').show();
                jQuery.post('', {tpanel_reset: 'true'}, function () {
                    window.location.href = btn.attr('data-href');
                });
            }
            return false;
        });
        // categories checkbox list
        jQuery('.categories-checkbox-list h4 a.checked-all').on('click', function () {
            jQuery(this).parent().parent().find('input:checkbox').prop('checked', true);
        });

        jQuery('#T-Panel #cities_blocks_num').on('change', function () {
            var count = jQuery(this).val();
            jQuery('#T-Panel .tbale_blocks.cities').hide();
            for (var x = 0; x < count; x++) {
                jQuery('#T-Panel .tbale_blocks.cities:eq(' + x + ')').show();
            }
        });
        jQuery('#T-Panel #cities_blocks_num').change();
        
        jQuery('#T-Panel #partner_num').on('change', function () {
            var count = jQuery(this).val();
            jQuery('#T-Panel .tbale_blocks.partners').hide();
            for (var x = 0; x < count; x++) {
                jQuery('#T-Panel .tbale_blocks.partners:eq(' + x + ')').show();
            }
        });
        jQuery('#T-Panel #partner_num').change();


    };
    this.AH_ui = function () {
        return this.customUI(), this.tispy();
    };
    this.showWrapper = function () {
        jQuery('#T-Panel').css({"visibility": "visible"}).animate({opacity: "1"}, 500);
    };
}

jQuery(document).ready(function () {
    var runAH_JS = new AH_JS();
    runAH_JS.AH_ui();
    runAH_JS.showWrapper();
    // fixed nav
    jQuery(this).scroll(function () {
        var y = jQuery(this).scrollTop();
        //console.log(y + ' - ' + top);
        if (y > 30) {
            jQuery('.contentNav').addClass('fixed');
            jQuery('.sidenav').addClass('fixed');
            jQuery('.T-Content').css({"padding-top": "60px"});
        } else {
            jQuery('.contentNav').removeClass('fixed');
            jQuery('.sidenav').removeClass('fixed');
            jQuery('.T-Content').css({"padding-top": "0px"});
        }
    });
});
/*----------( End Abdo Hamoud FrameWork )---------*/