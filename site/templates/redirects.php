<?php
// site/templates/redirects.php
//$redirects = page('redirects')->children();
//$redirects = page('redirects');
//print_r($page->from());
//print_r($page->text());
//echo "abc";
//print_r($redirects);
//die();
//
//foreach ($redirects as $redirect) {
//    echo $redirect->from() . ' -> ' . $redirect->to() . '<br>';
//}

echo snippet('redirects-form', ['page' => $page]);
?>