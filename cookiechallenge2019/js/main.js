var sounds = [
    {id:"eat1", src:"eat1.mp3"},
    {id:"eat2", src:"eat2.mp3"},
    {id:"eat3", src:"eat3.mp3"},
    {id:"bg", src:"bg.mp3"},
    {id:"bg-2", src:"bg-2.mp3"},
    {id:"bg-3", src:"bg-3.mp3"},
    {id:"bg-4", src:"bg-4.mp3"},
    {id:"death", src:"death.mp3"},
    {id:"intro", src:"intro.mp3"},
    {id:"bug", src:"bug.mp3"},
    {id:"invader", src:"invader.mp3"}
];

function loadSound() {
    if (!createjs.Sound.initializeDefaultPlugins()) {
        return;
    }
    //createjs.Sound.alternateExtensions = ["ogg"];
    createjs.Sound.registerSounds(sounds, "sound/");
}

function playSound(id) {
    createjs.Sound.play(id);
}

loadSound();



/*
 * Helpers
 */

function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/*
 *
 * @param {int} number - the number to transform
 * @param {String} - the symbol shown in the unary-string
 * @returns {String} - the number as String in the unary-numeral-system  (e.g. 3 => XXX)
 */
function toUnaryString(number, symbol) {
    var unary = "";
    for(var i=0; i<number; i++) {
        unary = unary+symbol;
    }
    return unary;
}

/*
 * Game Variables
 */

var uid = $('body').attr('data-uid');
var controlReversed = false;    //Bug Effect

var lines = 5;                  //number of the vertical lines where the packages fall down
var lineWalker = 2;             //current linenumber of the the linewalker to collect the packages

var steps = 9;                  //number of the steps the packages fall down
var collectStep = 7;            //number ot he steps, where the linewalker collect the packages

var moveTime = 500;             //time for each step (in ms)
var newItemTime = moveTime*3;   //time between to packages (in ms)

var speedUpdateCondition = 10;  //number of packages activate a speed update
var speedUpdateValue = 25;      //in ms

//Counters
var selectedPackageCounter = 0;
var liveCounter = 3;
var givenPackages = 0;

/*
calc((100% - 100px) + ((100% - 100px) / 9 ))



((100%+100px)/100*90)-100px
calc( ( ( 100% + 100px ) / 100 * 90 ) - 100px )

 * - Put the Packages in the defined time to the Gametable
 * - Breaks, if livesCounter=0
 * @returns {undefined}
 */
function givePackages() {
    if(liveCounter>0) {
        setTimeout(function() {
            givenPackages++;

            //Put a new package the gametable and start moving
            var line = rand(0,lines-1);
            var id = 'package-'+givenPackages;

            var type = rand(1,7);

            $('.lines .game-line-'+line).append('<div class="package step-0 '+id+' '+(type===1?'bug':'')+' '+(type===2?'space-invader':'')+'"></div>');
            movePackage('.'+id, 0);

            //maybe upade the game-speed
            if(givenPackages%speedUpdateCondition===0) {
                if(moveTime>0) {
                    moveTime=moveTime-speedUpdateValue;
                }
            }

            //give the next package to the gametable
            givePackages();
        }, newItemTime);
    }
}

function movePackage(mypackage,step) {

    //game is not over
    if(liveCounter>0) {

        //move the package a step down
        $(mypackage).removeClass('step-'+(step-1)).addClass('step-'+step);

        //if package not at the end of the gametable
        if(step<steps) {

            //if package at the collecting step (santas hat)
            if(step===collectStep) {
                //if santa is on the right line, collect the package
                if($(mypackage).parent().hasClass('game-line-'+lineWalker)) {

                    if($(mypackage).hasClass('space-invader')) {
                        playSound('invader');
                        setTimeout(function() {
                            playSound('invader');
                            setTimeout(function() {
                                playSound('invader');
                            },100);
                        },100);
                        selectedPackageCounter = selectedPackageCounter-3;
                        if(selectedPackageCounter<0) { selectedPackageCounter=0 }
                    } else if($(mypackage).hasClass('bug')) {
                        playSound('bug');
                        $(".line-walker-bag").toggleClass("bug");
                        if(controlReversed) { controlReversed=false } else { controlReversed=true; }
                    } else {
                        playSound('eat'+rand(1,3));
                        selectedPackageCounter++;
                    }

                    $('.selected-package-counter').html(selectedPackageCounter);
                    $(mypackage).remove();
                }
                //otherwise the package fall to the end of the gametable
                else {
                    setTimeout(function() {
                        movePackage(mypackage, step+1);
                    }, moveTime);
                }
            }
            //otherwise, the package fall a step down
            else {
                setTimeout(function() {
                    movePackage(mypackage, step+1);
                }, moveTime);
            }
        }
        //otherwise the package leave the gametable without collecting by santa
        else {
            var isCookie = false;

            //to remove a live for space-invadors and bugs
            if(!($(mypackage).hasClass('space-invader') || $(mypackage).hasClass('bug')))  {
                isCookie = true;
                playSound('death');
                liveCounter--;
            }

            $('.live-counter').html(toUnaryString(liveCounter, '<img src="img/schokodrop.png" class="live-img">'));
            $(mypackage).remove();

            //if santa has no more lives => GAME OVER
            if(liveCounter<=0) {
                $('.finish .points').html(selectedPackageCounter);
                $('.container').removeClass('play');
                $('.finish').show();
                $('.info-site').show();

                updateScore();
                $('.highscore-form-msgs').html("");
                if(selectedPackageCounter>0) {
                    $('#highscore-form').show();
                } else {
                    $('#highscore-form').hide();
                }

                setTimeout(function() {
                    createjs.Sound.stop();
                }, 2000);
            }
            //otherwise => PLAY
            else {
                if(isCookie) {
                    $('.live-lost').show();
                    setTimeout(function () {
                        $('.live-lost').hide();
                    }, 50);
                }
            }
        }
    }
    //otherwise (GAME OVER) => remove the package from gametable
    else {
        $(mypackage).remove();
    }
}

/*
 *
 * Sets the lineWalker to the given lind
 *
 * @param {int} newLine
 */
function walk(newLine) {
    if(newLine >= 0 && newLine < lines) {
        $('.line-walker').removeClass('game-line-'+lineWalker).addClass('game-line-'+newLine);
        lineWalker = newLine;
    }
}

/*
 * Click/Touch Events
 */

/* Go left */
//prevent zoom-in / zoom-out by fast clicking the control
$('.control-left').bind("touchstart", function (event) {
    event.preventDefault();
    if(controlReversed) {
        //Bug
        walk(lineWalker + 1);
    } else {
        walk(lineWalker - 1);
    }
});
//click event for devices without touch
if (!Modernizr.touch) {
    $('.control-left').on("click", function () {
        if(controlReversed) {
            //Bug
            walk(lineWalker + 1);
        } else {
            walk(lineWalker - 1);
        }
    });
}
$( "body" ).on( "keydown", function( event ) {
    if(event.which==37) {
        if(controlReversed) {
            //Bug
            walk(lineWalker + 1);
        } else {
            walk(lineWalker - 1);
        }
    }
});

/* Go right */
//prevent zoom-in / zoom-out by fast clicking the control
$('.control-right').bind("touchstart", function (event) {
    event.preventDefault();
    if(controlReversed) {
        //Bug
        walk(lineWalker - 1);
    } else {
        walk(lineWalker + 1);
    }
});
//click event for devices without touch
if (!Modernizr.touch) {
    $('.control-right').on("click", function () {
        if(controlReversed) {
            //Bug
            walk(lineWalker - 1);
        } else {
            walk(lineWalker + 1);
        }
    });
}
$( "body" ).on( "keydown", function( event ) {
    if(event.which==39) {
        if(controlReversed) {
            //Bug
            walk(lineWalker - 1);
        } else {
            walk(lineWalker + 1);
        }
    }
});

/* Click Start/Restart the Game */
$('.play-btn-game').click(function() {

    $(".line-walker-bag").removeClass("bug");
    $('.info-site').hide();
    $('.info-site .start').hide();
    $('.container').addClass('play');

    controlReversed = false
    liveCounter = 3;
    selectedPackageCounter = 0;
    moveTime = 500;
    givenPackages = 0;

    $('.live-counter').html(toUnaryString(liveCounter, '<img src="img/schokodrop.png" class="live-img">'));
    $('.selected-package-counter').html(selectedPackageCounter);

    walk(2);

    playSound('intro');
    setTimeout(function() {
        var bgprops = new createjs.PlayPropsConfig().set({loop: -1})
        createjs.Sound.play('bg', bgprops);
        givePackages();
    }, 3000);

});

function updateScore() {

    var score = selectedPackageCounter;
    var url = 'score.php';

    // Send the data using post
    var posting = $.post(url, {uid: uid, score: score});

    // Put the results in a div
    posting.done(function (data) {

        if (data.state == 'success') {
            //update funding
            $('span.betrag').html(data.moneyGame);
            $('span.collected').html(data.moneyCollected);
            $('span.collected').addClass(data.collectedToMuch);
            $('.collected-percent').css('width', data.percentCollected + '%');
            $('.collected-percent').attr('aria-valuenow', data.percentCollected);
            $('#highscore-form').find( "input[name='uid']" ).val(uid);

            uid = data.newid;
        } else {
            $('#highscore-form').hide();
            $('.highscore-form-msgs').html('<p class="error">Leider ist ein Fehler aufgetreten.<br> Bitte lade deinen Browser neu.</p>');
        }
    });

    posting.fail(function (data) {
        $('#highscore-form').hide();
        $('.highscore-form-msgs').html('<p class="error">Leider ist ein Fehler aufgetreten.<br> Bitte lade deinen Browser neu.</p>');
    });
}

$( "#highscore-form" ).submit(function( event ) {
    // Stop form from submitting normally
    event.preventDefault();

    // Get some values from elements on the page:
    var $form = $( this ),
        formName = $form.find( "input[name='name']" ).val(),
        formUid = $form.find( "input[name='uid']" ).val(),
        formUrl = $form.attr( "action" );

    // Send the data using post
    var posting = $.post(formUrl, {uid: formUid, score: selectedPackageCounter, name:formName});

    // Put the results in a div
    posting.done(function (data) {

        if (data.state == 'success') {
            $(".highscore ul").empty();
            $.each(data.highscore, function(key, value) {
                $(".highscore ul").append('<li><div class="nickname">'+value.name+'</div> <div>Deine erspielte Spende <span class="hs-betrag">'+value.score+'</span> </div></li>');
            });

            $('html, body').animate({
                scrollTop: $(".highscore").offset().top
            }, 1000);

            $('#highscore-form').hide();
            $('.highscore-form-msgs').empty();
        }

        if (data.state == 'invalid_name') {
            $('.highscore-form-msgs').html('<p class="error">Bitte geben Sie einen gültigen Namen ein. Erlaubt sind Buchstaben und Zahlen sowie Bindestriche und Leerzeichen.</p>');
        }

        if (data.state == 'invalid_score' || data.state == 'invalid_combination') {
            $('.highscore-form-msgs').html('<p class="error">Leider ist ein Fehler aufgetreten.<br> Bitte lade deinen Browser neu.</p>');
        }

        if (data.state == 'duplicate_name') {
            $('.highscore-form-msgs').html('<p class="error">Der Nickname wird schon verwendet. Bitte gebe einen anderen Nicknamen ein.</p>');
        }
    });

    posting.fail(function (data) {
        //undefinded error
        $('#highscore-form').hide();
        $('.highscore-form-msgs').html('<p class="error">Leider ist ein Fehler aufgetreten.<br> Bitte lade deinen Browser neu.</p>');
    });
});



function PopupSharing(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'menubar=no, toolbar=no, resizable=yes, scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
      newWindow.focus();
    }
    // Disabled going to sharing site
    return false;
}

/**
 * Aufklapper
 */
$(document).ready(function() {
    $('.hidden-content-block').each(function() {

        var group = "";
        if(!$(this).prev().hasClass("hidden-content-block-wrapper")) {
            group = "first";
        }
        if (!$(this).next().hasClass("hidden-content-block")) {
            group += " last";
        }

        $(this).wrap('<div class="hidden-content-block-wrapper '+group+'"></div>');
        $(this).before('<div class="hide-content-block-toggle" id="'+$(this).data('anchor')+'"><a href="#" class="show-content-block">' + $(this).data('title') + '<i class="fa fa-chevron-down"aria-hidden="true"></i></a></div>');
    });

    $('body').on('click touch', 'a.show-content-block', function() {
        var link = $(this).children('i').first();
        var theParent = $(this).parent();

        link.toggleClass("rotated");
        theParent.next('.hidden-content-block').slideToggle(500, function() {
        });

        return false;
    });

    if(window.location.hash) {
        var anchor = window.location.hash;
        if($(anchor + ' a').length) {
            $(anchor + ' a').click();
            $('html, body').animate({
                scrollTop: $(anchor).offset().top
            }, 1000);
        }
    }

    $('.footer').on('click touch', 'a', function() {
        var target = $(this).attr('href');

        if(!($(target+" a i").hasClass('rotated'))) {
            $(target + ' a').click();
        }

        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 1000);
    });
});