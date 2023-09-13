<?php
$page = $page ?? null;
$redirects = $page ? $page->redirects()->yaml() : [];

?>

<form method="post" action="<?= $page->url() ?>">
    <fieldset>
        <legend>Redirects</legend>
        <table>
            <thead>
            <tr>
                <th>From</th>
                <th>To</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($redirects as $redirect): ?>
                <tr>
                    <td><input type="text" name="redirects[<?= $loop->index ?>][from]" value="<?= $redirect['from'] ?>" /></td>
                    <td><input type="text" name="redirects[<?= $loop->index ?>][to]" value="<?= $redirect['to'] ?>" /></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </fieldset>
    <button type="submit">Save</button>
</form>