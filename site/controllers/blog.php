<?php

return function ($site) {
    $query   = get('q');
    $category = param('categories');
    $limit = 9;

    $results = page('blog')->index()->listed()->search($query);

    $listeditems = page('blog')->children()->listed();
    if ($query) {
        $listeditems = $listeditems->search($query);
    }
    if($category && $category != 'All') {
        $listeditems = $listeditems->filterBy('categories', $category, ',');
    }
    $listeditems = $listeditems->sortBy("datetoday", "desc", 'date', 'desc');
    $listeditems = $listeditems->paginate($limit);
    $pagination = $listeditems->pagination();

	return [
        'query'   => $query,
        'results' => $results,
        'pagination' => $pagination,
        'limit' => $limit,
        'listeditems' => $listeditems,
        'filterBy' => $category
    ];

};