
var height = 0;

$('.element-item').each(function(){
    if( $(this).height() > height ){
        height = $(this).height();
    }
});

$('.element-item').each(function(){
    $(this).css('height', height)
});

var itemSelector = '.element-item';

var $grid = $('.blog').isotope({
    itemSelector: itemSelector,
    layoutMode: 'fitRows',
    percentPosition: true,
    fitRows: {
        gutter: 30,
        columnWidth: '.element-item',
    }
});

// $.ajax({
//         url: '/blog',
//         type: 'GET',
//         datatype: 'html',
//         data: {
//         }                        },
//     success: function (result) {
//     //var $items = result;
//     // $('#lastPhotoId').remove();
//     //$('.main_isotop').append(result);
//     $grid.isotope('insert', results);
//     // grid.append(result)
//         // add and lay out newly appended elements
//         // .isotope('appended', result);
//     processing = false;
// },
// error: function (result) {
//     alert("Failed");
// }
// });

// updates grid after all images are loaded.
$grid.imagesLoaded( function() {
    $grid.isotope('layout');
});

var itemsPerPage = 9;
var currentNumberPages = 1;
var currentPage = 1;
var currentFilter = '*';
var filterAtribute = 'data-filter';
var pageAtribute = 'data-page';
var pagerClass = 'isotope-pager';

function getHashFilter() {
    var hash = location.hash;
    var matches = location.hash.match( /filter=([^&]+)/i );
    var hashFilter = matches && matches[1];

    return hashFilter && decodeURIComponent( hashFilter );
}

function changeFilter(selector) {
    $grid.isotope({
        filter: selector
    });
}

function goToPage(n) {
    currentPage = n;

    $('.isotope-pager a').removeClass('active');
    $('.isotope-pager a').attr('aria-current','false');
    $('.isotope-pager a:nth-child(' + currentPage + ')').attr('aria-current','true');
    $('.isotope-pager a:nth-child(' + currentPage + ')').addClass('active');

    var selector = itemSelector;
    selector += ( currentFilter != '*' ) ? currentFilter : '';
    selector += '['+pageAtribute+'="'+currentPage+'"]';

    changeFilter(selector);

    var matchesFilter = location.hash.match( /filter=([^&]+)/i );

    if ( n != 1 ) {
        if ( matchesFilter ) {
            window.location.hash = matchesFilter[0] + '&page=' + n;
        } else {
            window.location.hash = 'page=' + n;
        }
    } else {
        if ( matchesFilter ) {
            window.location.hash = matchesFilter[0];
        } else {
            history.pushState("", document.title, window.location.pathname);
        }
    }


}

function setPagination() {

    var SettingsPagesOnItems = function(){

        var itemsLength = $grid.children(itemSelector).length;

        var pages = Math.ceil(itemsLength / itemsPerPage);
        var item = 1;
        var page = 1;
        var selector = itemSelector;
        selector += ( currentFilter != '*' ) ? currentFilter : '';

        $(selector).each(function(){

            if( item > itemsPerPage ) {
                page++;
                item = 1;
            }
            $(this).attr(pageAtribute, page);
            item++;
        });

        currentNumberPages = page;
    }();

    var CreatePagers = function() {

        var $isotopePager = ( $('.'+pagerClass).length == 0 ) ? $('<div class="'+pagerClass+'"></div>') : $('.'+pagerClass);

        $isotopePager.html('');

        for( var i = 0; i < currentNumberPages; i++ ) {
            var $pager = $('<a href="javascript:void(0);" class="pager" '+pageAtribute+'="'+(i+1)+'"></a>');
            $pager.html(i+1);

            $pager.click(function(){
                var page = $(this).eq(0).attr(pageAtribute);

                $('html,body').animate({
                    scrollTop: $('.blog.row').offset().top - 140 + 'px'
                }, 800);


                goToPage(page);
            });

            $pager.appendTo($isotopePager);
        }

        $grid.after($isotopePager);

    }();
}

$('.filters li').click(function(){
    var filter = $(this).attr(filterAtribute);
    currentFilter = filter;
    location.hash = 'filter=' + encodeURIComponent( filter );

    $(this).addClass('active');
    $(this).siblings().removeClass('active');
    $(this).siblings().attr('aria-current','false');
    $(this).attr('aria-current','true');

    setPagination();
    goToPage(1);
});

$('.filters li').on({
    'keydown': function() {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            var filter = $(this).attr(filterAtribute);
            currentFilter = filter;
            location.hash = 'filter=' + encodeURIComponent( filter );

            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            $(this).siblings().attr('aria-current','false');
            $(this).attr('aria-current','true');

            setPagination();
            goToPage(1);
        }
    },
});

function locationHash(){
    var hashFilter = getHashFilter();
    var matchesFilter = location.hash.match( /page=([^&]+)/i );

    if ( hashFilter ) {
        currentFilter = hashFilter;

        $('.filters').find('.active').removeClass('active');
        $('.filters').find('[data-filter="' + hashFilter + '"]').addClass('active');

        setPagination();
    }

    if ( matchesFilter ) {
        currentPage = matchesFilter[1];
        goToPage(matchesFilter[1]);
    } else {
        goToPage(1);
    }

    if( !hashFilter && !matchesFilter ){
        location.reload();
    }
}

if(window.location.hash) {
    locationHash();
}

setPagination();
goToPage(currentPage);


$(window).on('popstate', function(event) {
    if( location.href == 'http://localhost/schokoladenseite/blog'){
        history.back();
    } else {
        locationHash();
    }
});