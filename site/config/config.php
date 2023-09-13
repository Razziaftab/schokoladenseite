<?php

return [
	'panel' =>[
		'install' => true,
	],
	'languages' => true,
	'scssNestedCheck' => true,
	'debug'  => true,
	'routes' => [
		[
//			'pattern' => 'sitemap.xml',
//			'action'  => function() {
//				$pages = site()->pages()->index();
//				$ignore = kirby()->option('sitemap.ignore', ['error']);
//				$kirby = kirby()->url();
//				$content = snippet('sitemap', compact('pages', 'ignore', 'kirby'), true);
//				return new Kirby\Cms\Response($content, 'application/xml');
//			}
            'pattern' => 'redirects',
            'action'  => function () {
                return page('redirects');
            }
        ],
        [
            'pattern' => '(:any)',
            'action'  => function ($slug) {
                // Check for a redirect with the 'from' value equal to $slug
                $redirect = page('redirects')->children()->findBy('from', $slug);
                if ($redirect) {
                    go(site()->url().$redirect->to());
                } else {
                    return site()->visit($slug);
                }
            }
		],
    ],
    'afbora.kirby-minify-html.enabled' => true,
    'afbora.kirby-minify-html.options' => [
        'doOptimizeViaHtmlDomParser'     => true,
        'doRemoveComments'     => true,
    ],
	'date.handler' => 'intl',
	/*'locale' => [
		LC_ALL      => 'de_DE.utf-8',
		LC_COLLATE  => 'de_DE.utf-8',
		LC_MONETARY => 'de_DE.utf-8',
		LC_NUMERIC  => 'de_DE.utf-8',
		LC_TIME     => 'de_DE.utf-8',
		LC_MESSAGES => 'de_DE.utf-8',
		LC_CTYPE    => 'de_DE.utf-8'
	]*/
];

