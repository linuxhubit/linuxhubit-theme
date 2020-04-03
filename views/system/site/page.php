<article class="isPage" <?= $node->theme['alignment'] ? ' uk-text-center' : '' ?>>

    <?php if (!$node->theme['title_hide']) : ?>
    <h1><?= $page->title ?></h1>
    <?php endif ?>

    <?= $page->content ?>

</article>
