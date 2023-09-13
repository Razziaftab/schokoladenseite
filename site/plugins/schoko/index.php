<?php

	Kirby::plugin('schoko/own-blocks', [
		'blueprints' => [
			'blocks/headerbild' => 'site/blueprints/blocks/headerbild.yml',
			'blocks/accordion' => 'site/blueprints/blocks/accordion.yml',
			'blocks/text' => 'site/blueprints/blocks/text.yml',
			'blocks/button' => 'site/blueprints/blocks/button.yml',
			'blocks/video' => 'site/blueprints/blocks/video.yml',
		],
		'snippets' => [
			'blocks/headerbild' => 'site/snippets/blocks/headerbild.php',
			'blocks/accordion' => 'site/snippets/blocks/accordion.php',
			'blocks/text' => 'site/snippets/blocks/text.php',
			'blocks/button' => 'site/snippets/blocks/button.php',
			'blocks/video' => 'site/snippets/blocks/video.php',
		]
	]);
	
