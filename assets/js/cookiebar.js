/*
 * Cookie Helper
 */
function setCookie(key, value, expiry) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString()+';path=/';
}
function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}
function eraseCookie(key) {
	document.cookie = key + '=; Path=/; Domain=.schokoladenseite.net; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	
    //var keyValue = getCookie(key);
    //setCookie(key, keyValue, '-1');
}

/**
 *  Google Analytics Code
 */
var statisticAnalyticsDisableStr = null;
var statisticAnalyticsDisabledMsg = null;
var statisticAnalyticsNotActivatedMsg = null;
function gaOptout() {
    if(statisticAnalyticsDisableStr!=null) {
        document.cookie = statisticAnalyticsDisableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
        window[statisticAnalyticsDisableStr] = true;
        alert(statisticAnalyticsDisabledMsg);
    } else {
        alert(statisticAnalyticsNotActivatedMsg);
    }
}


/**
 * Block or Load Scripts (with external conection) by cookie info
 */
function initScripts(config) {
    var cookies = getCookie('cookies')!=null?getCookie('cookies'):"";

    if(config.cookieGroups.hasOwnProperty('statistic')  && config.cookieGroups.statistic.hasOwnProperty('cookies')) {

        if (config.cookieGroups.statistic.cookies.hasOwnProperty('matomo')) {

            if (config.cookieGroups.statistic.cookies.matomo.url !== false && config.cookieGroups.statistic.cookies.matomo.id !== false && cookies.indexOf('statistic') >= 0) {

                (function () {
                    var u = config.cookieGroups.statistic.cookies.matomo.url;
                    _paq.push(['setTrackerUrl', u + 'piwik.php']);
                    _paq.push(['setSiteId', config.cookieGroups.statistic.cookies.matomo.id]);
                    var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
                    g.type = 'text/javascript';
                    g.async = true;
                    g.defer = true;
                    g.src = u + 'piwik.js';
                    s.parentNode.insertBefore(g, s);
                })();
            }
        }

        if (config.cookieGroups.statistic.cookies.hasOwnProperty('analytics')) {

            //Set some global variable for analyitcs optout function (page data protection)
            statisticAnalyticsNotActivatedMsg = config.cookieGroups.statistic.cookies.analytics.notActivatedInfo;

            if (config.cookieGroups.statistic.cookies.analytics.gaProperty !== false) {
				if (cookies.indexOf('statistic') >= 0) {

					//Set some global variable for analyitcs optout function (page data protection)
					statisticAnalyticsDisableStr = 'ga-disable-' + config.cookieGroups.statistic.cookies.analytics.gaProperty;
					statisticAnalyticsDisabledMsg = config.cookieGroups.statistic.cookies.analytics.deactivateInfo;

					if (document.cookie.indexOf(statisticAnalyticsDisableStr + '=true') > -1) {
						window[statisticAnalyticsDisableStr] = true;
					}
					
					$.getScript("https://www.googletagmanager.com/gtag/js?id="+config.cookieGroups.statistic.cookies.analytics.gaProperty, function () {

						window.dataLayer = window.dataLayer || [];
						function gtag(){dataLayer.push(arguments);}
						gtag("js", new Date());

						gtag("config", config.cookieGroups.statistic.cookies.analytics.gaProperty, { "anonymize_ip": true });
		
						$('#submit').click(function(){
							var category = $(this).data('category');
							var url = $(this).data('url');
							gtag('event', 'submit', {'event_category': category, 'event_label': url});
						});
					});
				} else {
					if (getCookie('_ga_EY7JDSPRNQ')){
						eraseCookie('_ga_EY7JDSPRNQ');
					}
				}
            }
        } 
    }

    if(config.cookieGroups.hasOwnProperty('media')  && config.cookieGroups.media.hasOwnProperty('cookies')) {
        //Matomo tracking snippet
        if (config.cookieGroups.media.cookies.hasOwnProperty('storeLocator')) {

            $(config.cookieGroups.media.cookies.storeLocator.form).addClass('init-storelocator');

            if (!(cookies.indexOf('media') >= 0)) {
                $(config.cookieGroups.media.cookies.storeLocator.form).append('<label class="use-external-media"><input type="checkbox" name="useGoogleMaps" value="yes" required> ' + config.cookieGroups.media.cookies.storeLocator.activateText + '</label>');
            }
            $(config.cookieGroups.media.cookies.storeLocator.form).submit(function () {

                if ($(this).hasClass('init-storelocator')) {
                    $(this).removeClass('init-storelocator');

                    $.getScript("fileadmin/Resources/Public/js/storeLocator/handlebars.min.js", function () {
                        $.getScript("https://maps.google.com/maps/api/js?key=AIzaSyCcC2NhvQQGLDOVJoJaX50VZPibeEupoFw&sensor=false", function () {
                            $.getScript("fileadmin/Resources/Public/js/storeLocator/jquery.storelocator.min.js", function () {
                                $.getScript("fileadmin/Resources/Public/js/storeLocator/de/storelocator.min.js", function () {

                                    setTimeout(function () {
                                        $(config.cookieGroups.media.cookies.storeLocator.form).submit();
                                    }, 500);
                                });
                            });
                        });
                    });
                    return false;
                }
            });
        }
    }
}

/**
 *
 */
function resizeIframe(obj) {
    obj.style.height = (obj.contentWindow.document.body.scrollHeight+20) + 'px';
}

/**
 * Replace a element with a iframe
 */
function setIframe(element, src, type, subtype, classes, withoutWrapper) {
    element.replaceWith((withoutWrapper?'':'<div class="iframe-wrapper">')+'<iframe '+(subtype==='matomo'?'id="matomoiframe"':'')+' class="iframe-'+type+' iframe-'+subtype+' ' + classes + '" frameborder="0" width="100%" name=' + subtype + ' title=' + subtype + '" src="' + src + '" allowfullscreen="allowfullscreen"></iframe>'+(withoutWrapper?'':'</div>'));

    if(subtype==='matomo') {
        document.getElementById('matomoiframe').onload = function () {
            resizeIframe(document.getElementById('matomoiframe'));
        }
        window.addEventListener('resize', function (event) {
            resizeIframe(document.getElementById('matomoiframe'));
        });
    }
}

/**
 * Replace a element with a inactive ifame
 */
function setInactiveIframe(element, src, type, subtype, classes, btnLabel, infotext) {
    element.replaceWith('<div class="iframe-wrapper"><div class="iframe-inactive iframe-bg-'+type+'-'+subtype+'" name=' + subtype + ' title=' + subtype + '><button class="btn btn-activate-iframe" data-type="'+type+'" data-subtype="'+subtype+'" data-classes="'+classes+'" data-iframesrc="' + src + '">'+btnLabel+'</button><p class="text-activate-iframe">'+infotext+'</p></div></div>');
}

/**
 * Create iframes or inactive iframes for special links like maps/youtube/matomo
 */
function initIframes(config) {

    var cookies = getCookie('cookies')!=null?getCookie('cookies'):"";

    // Find in .rte-containers all links with a youtube or google-maps link
    $("main a").each(function (index) {

        // Nice urls
        var href = $(this).attr('href')
            .replace("youtube.com/embed/", "youtube-nocookie.com/embed/")
            .replace("http://www.", "//")
            .replace("https://www.", "//")
            .replace("http://", "//")
            .replace("https://", "//")
            .replace("//www.", "//")
            .replace("//", "https://www.")
            .replace("https://www.maps.", "https://maps.");

        //get classes in links to set in iframes to modify the view
        var classes = $(this).is('[class]') ? $(this).attr('class') : '';

        if(config.hasOwnProperty('cookieGroups')) {

            if(config.cookieGroups.hasOwnProperty('media') && config.cookieGroups.media.hasOwnProperty('cookies')) {

                //Youtube links/iframes detect by link url
                if (config.cookieGroups.media.cookies.hasOwnProperty('youtube')) {
                    if (href.indexOf('https://www.youtube-nocookie.com/embed/') == 0) {

                        if (cookies.indexOf('media') >= 0) {
                            setIframe($(this), href, 'media', 'youtube', classes, false);
                        } else {
                            setInactiveIframe($(this), href, 'media', 'youtube', classes, config.cookieGroups.media.cookies.youtube.activateLabel, config.cookieGroups.media.cookies.youtube.activateText);
                        }
                    }
                }

                //Maps links/iframes detect by link url
                if (config.cookieGroups.media.cookies.hasOwnProperty('googleMaps')) {
                    if ((href.indexOf('https://maps.google.') == 0 && href.indexOf('/maps?') >= 0 )
                        || (href.indexOf('https://www.google.') >= 0 && href.indexOf('/maps/embed?') >= 0)) {

                        if (cookies.indexOf('media') >= 0) {
                            setIframe($(this), href, 'media', 'googleMaps', classes, false);
                        } else {
                            setInactiveIframe($(this), href, 'media', 'googleMaps', classes, config.cookieGroups.media.cookies.googleMaps.activateLabel, config.cookieGroups.media.cookies.googleMaps.activateText)
                        }
                    }
                }
            }

            if(config.cookieGroups.hasOwnProperty('statistic')  && config.cookieGroups.statistic.hasOwnProperty('cookies')) {
                if (config.cookieGroups.statistic.cookies.hasOwnProperty('matomo')) {

                    //Matomo links/iframes detect by link class
                    if ($(this).hasClass('iframe-matomo')) {
                        if (cookies.indexOf('statistic') >= 0) {
                            setIframe($(this), href, 'statistic', 'matomo', classes, true);
                        } else {
                            if(cookies==="") {

                                $(this).replaceWith('<p class="info-activate-iframe" data-type="statistic" data-subtype="matomo" data-classes="'+$(this).attr('class')+'" data-iframesrc="'+$(this).attr('href')+'"><strong>' + config.cookieGroups.statistic.cookies.matomo.activateText + '</strong></p>');

                            } else {
                                resetWithMatomoActivateLink($(this),$(this).attr('class'),$(this).attr('href'),config);
                            }
                        }
                    }
                }
            }
        }

        //@todo extend for other iframes
    });

    //Inactive Iframe event - Activate a selected iframe by clicking the btn
    $('.btn-activate-iframe').click(function() {
        var wrapper = $(this).parent('.iframe-inactive').parent('.iframe-wrapper');
        setIframe(wrapper, $(this).data('iframesrc'), $(this).data('type'), $(this).data('subtype'), $(this).data('classes'), false);
    });
}

function resetWithMatomoActivateLink(element, classes, iframesrc, config) {
    element.replaceWith('<p class="info-activate-iframe" data-type="statistic" data-subtype="matomo" data-classes="'+$(this).attr('class')+'" data-iframesrc="'+$(this).attr('href')+'"><strong>' + config.cookieGroups.statistic.cookies.matomo.activateText + '</strong></p>');

    $(".cookie-statistic-checkbox").click(function() {

        var currentCookies = getCookie('cookies')!==null?getCookie('cookies'):"";
        var allCookies = "";
        var updadedCurrentCookies = "";

        //Lisit all available cookies
        for (var group in config.cookieGroups) {
            allCookies = allCookies + (allCookies === "" ? group : "," + group);
        }

        //@todo replace with iframe
        $(this).html('Show iframe');
        updadedCurrentCookies = currentCookies + ',statistic';

        var cookieLifetime = allCookiesSelectet(allCookies.split(','), updadedCurrentCookies.split(',')) ? 360 : 7;

        setCookie('cookies', updadedCurrentCookies, cookieLifetime);

        //var wrapper = $(this).parent('.iframe-inactive').parent('.iframe-wrapper');
        setIframe($(this), $(this).data('iframesrc'), $(this).data('type'), $(this).data('subtype'), $(this).data('classes'), true);

        initScripts(config);

    });
}

/**
 * Creates a Cookie Consentbar for the given Cookie-List
 * cookieid1;Cookie Title 1,cookieid2;Cookie Title 2,...
 * if cookieid = 'system' => The Cookie is the default system cookie
 */
function createCookieConsentBar(config, open=false) {

    if (getCookie('cookies') == null) {

        var allCookies = "";
        var defaultCookies = "";
		
		create();
		
    } else if (open == true) {
		
		var allowedCookies = getCookie('cookies');

		create();
	}
	
	function create(){
		$('html body').prepend('<div id="cookieChoiceInfo"></div>');
		$('#cookieChoiceInfo').append('<div class="row"></div>');
		$('#cookieChoiceInfo .row').append('<div class="row-intro"></div>');
		$('#cookieChoiceInfo .row').append('<div class="row-selection"></div>');
		$('#cookieChoiceInfo .row').append('<div class="row-links"></div>');

		$('#cookieChoiceInfo .row-intro').append('<div class="desktop-grid-100"><span>'+config.cookiebar.title+'</span><p>'+config.cookiebar.description+'</p></div>');

		$('#cookieChoiceInfo .row-selection').append('<div class="col-checkboxes"></div>');
		$('#cookieChoiceInfo .row-selection').append('<div class="col-buttons"></div>');
		$('#cookieChoiceInfo .row-selection .col-buttons').append('<div class="col-btn-all"></div>');
		$('#cookieChoiceInfo .row-selection .col-buttons').append('<div class="col-btn-save"></div>');
		$('#cookieChoiceInfo .row-selection .col-buttons').append('<div class="col-btn-close"></div>');

		//Create Checkboxes for Cookie Groups
		for (var group in config.cookieGroups) {

			var checkboxClass = "icon-checkbox";
			if (group === "system") {
				defaultCookies = "system";
				checkboxClass = "icon-checkbox icon-checkbox-selected icon-checkbox-disabled";
			}
			if (allowedCookies && allowedCookies.indexOf(group) >= 0 && !(group === "system")) {
				checkboxClass = "icon-checkbox icon-checkbox-selected";
			}
			allCookies = allCookies + (allCookies === "" ? group : "," + group);

			$('#cookieChoiceInfo .row-selection .col-checkboxes').append('<span class="cookie-checkbox "><i role="checkbox" aria-checked="false" aria-label="' + config.cookieGroups[group].title+'" tabindex="0" class="' + checkboxClass + '" data-cookieselection="' + group + '"></i> ' + config.cookieGroups[group].title+'</span>');
		}

		$('#cookieChoiceInfo .row-selection .col-buttons .col-btn-all').append('<a href="#" class="btn -primary cookie-btn cookie-btn-all" data-cookieselection="' + allCookies + '">' + config.cookiebar.allBtn + '</a>');
		$('#cookieChoiceInfo .row-selection .col-buttons .col-btn-save').append('<a href="#" class="btn -primary cookie-btn cookie-btn-save" data-cookieselection="' + defaultCookies + '">' + config.cookiebar.saveBtn + '</a>');
		$('#cookieChoiceInfo .row-selection .col-buttons .col-btn-close').append('<a href="#" class="btn -primary cookie-btn cookie-btn-close" data-cookieselection="' + defaultCookies + '">' + config.cookiebar.closeBtn + '</a>');
		$('#cookieChoiceInfo .row-links').append('<div class="mobile-grid-100 text-center"><p></p></div>');
	}
	
	var links = "";
	for (var name in config.cookiebar.links) {
		links = links + (links===""?"":" | ") + config.cookiebar.links[name];
	}
	$('#cookieChoiceInfo .row-links p').append(links);


    /*
    Events for the Cookiebar
     */

    // Checkbox Event - Modify data field with selected cookies in save-btn and modify class of checkbox (selected/not-selected)
    $(".cookie-checkbox").on('keydown', function() {
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13' || keycode == '32'){
			selectCheckbox(this);
		}
	});  

	$(".cookie-checkbox").click(function() {
		selectCheckbox(this);
	});
	
	function selectCheckbox(that) {
        var theCheckbox = $(that).children('.icon-checkbox');

        if(!theCheckbox.hasClass('icon-checkbox-disabled')) {

            var selectedCookies = $(".cookie-btn-save").attr('data-cookieselection');
            var clickedCookie = theCheckbox.attr('data-cookieselection');

            if(theCheckbox.hasClass('icon-checkbox-selected')) {
                //selected => deselect
                theCheckbox.removeClass('icon-checkbox-selected');
                theCheckbox.attr('aria-checked','false');
                selectedCookies = selectedCookies.replace(','+clickedCookie, "");
            }
            else {
                //select
                theCheckbox.addClass('icon-checkbox-selected');
                theCheckbox.attr('aria-checked','true');
                if(selectedCookies.indexOf(clickedCookie)==-1) {
                    selectedCookies = selectedCookies+","+clickedCookie;
                }
            }

            $(".cookie-btn-save").attr('data-cookieselection', selectedCookies);
        }
    };

    // Btn Even - Click to save selection or all
    $('.cookie-btn').click(function() {
		
        //selected by checkoxes
        var selectedCookies = $(this).attr('data-cookieselection');
        //all available cookies
        var allCookies = $(".cookie-btn-all").attr('data-cookieselection');
        // lifetime 360 Days, if all cookies selected, otherwise to 7 Days
        var cookieLifetime = allCookiesSelectet(allCookies.split(','), selectedCookies.split(',')) ? 360 : 7;

		if (!(selectedCookies.indexOf('statistic') >= 0)) {
			eraseCookie('_ga');
			eraseCookie('_gid');
			eraseCookie('_gat');
			eraseCookie('_gat_gtag_UA_2661545_22');
			eraseCookie('_ga_EY7JDSPRNQ');
		}
		
		$(".icon-checkbox").each(function(){
			if($(this).data("cookieselection") == "statistic"){
				if (!(selectedCookies.indexOf('statistic') >= 0)) {
					$(this).removeClass('icon-checkbox-selected');
				} else {
					$(this).addClass('icon-checkbox-selected');
				}
			}
			if($(this).data("cookieselection") == "media"){
				if (!(selectedCookies.indexOf('media') >= 0)) {
					$(this).removeClass('icon-checkbox-selected');
				} else {
					$(this).addClass('icon-checkbox-selected');
				}
			}
			if($(this).data("cookieselection") == "system"){
				$(this).addClass('icon-checkbox-selected  icon-checkbox-disabled');
			}
		});

        setCookie('cookies', selectedCookies, cookieLifetime);

        //load all selected scripts by cookie
        initScripts(config);

        $(".btn-activate-iframe").each(function (index) {
            if (selectedCookies.indexOf($(this).data('type')) >= 0) {
                var wrapper = $(this).parent('.iframe-inactive').parent('.iframe-wrapper');
                setIframe(wrapper, $(this).data('iframesrc'), $(this).data('type'), $(this).data('subtype'), $(this).data('classes'), false);
            }

            //@todo activate matomo iframe also
        });

        $(".info-activate-iframe").each(function (index) {
            if (selectedCookies.indexOf($(this).data('type')) >= 0) {
                //var wrapper = $(this).parent('.iframe-inactive').parent('.iframe-wrapper');
                setIframe($(this), $(this).data('iframesrc'), $(this).data('type'), $(this).data('subtype'), $(this).data('classes'), true);
            } else {
                resetWithMatomoActivateLink($(this),$(this).data('classes'),$(this).data('iframesrc'),config);
            }

        });
		
		$('#cookieChoiceInfo').hide();
		$('#cookiebannerstart').attr('aria-expanded', 'false');

		return false;
    });

    initIframes(config);
    initScripts(config);
}

/**
 * Compares two array
 * @param all
 * @param selected
 * return bool / Return true if all elements of array all also in array selected
 */
function allCookiesSelectet(all, selected) {

    var result = true;

    $.each(all, function (aIndex, aValue) {

        var found = false;
        $.each(selected, function (sIndex, sValue) {

            if (sValue === aValue) {
                found = true;
            }
        });

        if (!found) {
            result = false;
        }
    });
    return result;
}


//--------------------------------------------------------------------



/**
 *
 * Call Funktion createCookieConsentbar if a the cookiebarConfig is set
 *
 */

/*
Vara for Matomo
 */
var _paq = window._paq || [];
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);

var cookiebarConfig = {
    cookiebar: {
        title: 'Wir verwenden Cookies für Ihr optimales Nutzererlebnis auf unseren Seiten.',
        description: 'Es gibt Cookies, die für den Betrieb der Seiten essenziell notwendig sind, und weitere zur anonymen Statistikerfassung. Außerdem gibt es Cookies, die Ihnen Services ermöglichen, die von externen Medien angeboten werden, wie z.B. YouTube oder Google Maps. Bitte beachten Sie, dass - abhängig von Ihren Einstellungen - einige Funktionen ggf. nicht zur Verfügung stehen. Weitere Details zu den verwendeten Cookies finden Sie in unserer <a href="/cookie-erklaerung">Cookie-Erklärung</a>.',
        allBtn: 'Alle akzeptieren',
        saveBtn: 'Speichern',
        closeBtn: 'Ablehnen',
        links: {
            protection: '<a href="/datenschutz">Datenschutz</a>',
            impressum: '<a href="/impressum">Impressum</a>',
            info: '<a href="/cookie-erklaerung">Cookie-Erklärung</a>'
        }
    },
    cookieGroups: {
        system: {
            title: 'Essenziell'
        },
        media: {
            title: 'Externe Medien',
            cookies: {
                googleMaps: {
                    activateLabel: 'Karte aktivieren!',
                    activateText: '*Indem Sie auf den Button klicken, aktivieren Sie die Karte. Durch das Aktivieren der Karte wird eine Verbindung zu Google hergestellt und personenbezogene Daten übermittelt. Außerdem werden Cookies gespeichert. Weitere Informationen in unserem <a href="datenschutz">Datenschutz</a>',
                },
				youtube: {
                    activateLabel: 'Video aktivieren!*',
                    activateText: '*Durch Anklicken aktivieren Sie das YouTube-Video. Dadurch können evtl. personenbezogene Daten an Google weitergeleitet werden. Außerdem werden Cookies gespeichert. Weitere Informationen finden Sie unter  <a href="datenschutz">Datenschutz</a>.',
                  },
            }
        },

        statistic: {
            title: 'Statistiken',
            cookies: {
              analytics: {
                 gaProperty: 'UA-2661545-22',
                 deactivateInfo: 'Das Tracking ist jetzt deaktiviert.',
                 notActivatedInfo: 'Das Tracking ist aktuell nicht aktiv, da Sie den Punkt Statistik über die Cookie-Auswahl nicht ausgewählt haben.'
               }
            }
        }
    }
}

jQuery( document ).ready(function( $ ) {
    if(typeof cookiebarConfig!=='undefined' && cookiebarConfig!=null) {
        createCookieConsentBar(cookiebarConfig);
		$('#cookiebannerstart').attr('aria-expanded', 'true');
    }
	
	$('#cookiebannerstart').on({
		'keydown': function(e) {
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){ 
				if ($('#cookieChoiceInfo').length > 0 ){
					$('#cookieChoiceInfo').show();	
					e.preventDefault();
					$('#cookieChoiceInfo').find('a').first().focus();
				} else {
					var open = true;
					createCookieConsentBar(cookiebarConfig, open);
					e.preventDefault();
					$('#cookieChoiceInfo').find('a').first().focus();
				}
				$(this).attr('aria-expanded', 'true');
			}
		},
		'click': function() {
			if ($('#cookieChoiceInfo').length > 0 ){
				$('#cookieChoiceInfo').show();	
			} else {
				var open = true;
				createCookieConsentBar(cookiebarConfig, open);
			}
			$(this).attr('aria-expanded', 'true');
		}
	});
});



