<?php

Kirby::plugin('schoko/gender-switch', [
    'fields' => [
        'markdown' => [
            'props' => [
                'api_key' => function () {
                    return option('deepl.config.api_key');
                },
                'api_url' => function () {
                    return option('deepl.config.api_url');
                }
            ]
        ]
    ],
	'tags' => [
        'gender' => [
			'attr' => [
				'x',
				'y',
				'xy',
				'class'
			],
            'html' => function($tag) {
				
				if(isset($_COOKIE["gender"])){
					$gender = $_COOKIE["gender"];
				} else {
					$gender = 'n';
				}
				
				if ($gender === 'x'){
					$return = $tag->x;
				}	
				elseif ($gender === 'y'){
					$return = $tag->y;
				}
				elseif ($gender === 'xy'){
					if(isset($tag->xy)){
						$return = $tag->x . ' ' . $tag->xy . ' ' . $tag->y;
					} else {
						$return = $tag->x . ' und ' . $tag->y;
					}
				}	
				elseif ($gender === 'ns'){
					$teile = $tag->value;
					$return = str_replace('_', '\*', $teile);
					$return = str_replace(':', '\*', $return);
				}	
				elseif ($gender === 'nu'){
					$teile = $tag->value;
					$return = str_replace('*', '_', $teile);
					$return = str_replace(':', '_', $return);
				} 
				else {	
					$teile = $tag->value;
					$return = str_replace('*', ':', $teile);
					$return = str_replace('_', ':', $return);
				}
				
				if ($tag->class != ''){
					return ('<span class="' . $tag->class . '">' . $return . '</span>');
				}
				else {
					return $return;
				}
            }
        ],
        'n' => [
			'attr' => [
				'x',
				'y',
				'xy',
				'class'
			],
            'html' => function($tag) {
				
				if(isset($_COOKIE["gender"])){
					$gender = $_COOKIE["gender"];
				} else {
					$gender = 'n';
				}
				
				if ($gender === 'x'){
					$return = $tag->x;
				}	
				elseif ($gender === 'y'){
					$return = $tag->y;
				}
				elseif ($gender === 'xy'){
					if(isset($tag->xy)){
						$return = $tag->x . ' ' . $tag->xy . ' ' . $tag->y;
					} else {
						$return = $tag->x . ' und ' . $tag->y;
					}
				}	
				elseif ($gender === 'ns'){
					$teile = $tag->value;
					$return = str_replace('_', '\*', $teile);
					$return = str_replace(':', '\*', $return);
				}	
				elseif ($gender === 'nu'){
					$teile = $tag->value;
					$return = str_replace('*', '_', $teile);
					$return = str_replace(':', '_', $return);
				} 
				else {	
					$teile = $tag->value;
					$return = str_replace('*', ':', $teile);
					$return = str_replace('_', ':', $return);
				}
				
				if ($tag->class != ''){
					return ('<span class="' . $tag->class . '">' . $return . '</span>');
				}
				else {
					return $return;
				}
            }
        ]
    ]
]);