<?php $view->script('posts', 'blog:app/bundle/posts.js', 'vue') ?>
<?php include('tags.php') ?>

<div class="uk-container uk-articles">

    <?php foreach ($posts as $post) : ?>
    <article class="uk-article">

        <?php if ($image = $post->get('image.src')): ?>
        <a class="uk-display-block" href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>"><img src="<?= $image ?>"
                alt="<?= $post->get('image.alt') ?>"></a>
        <?php endif ?>

        <h1 class="uk-article-title">
            <a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>">
                <?= $post->title ?>
            </a>
        </h1>

        <p class="uk-article-meta">
            <?= __('Written by %name% on %date%', ['%name%' => $post->user->name, '%date%' => '<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}</time>' ]) ?>
        </p>

        <div class="uk-margin">
            <?= substr(strip_tags ($post->excerpt), 0, 200) ?: substr(strip_tags ($post->content), 0, 200) ?>…</div>

        <div class="uk-margin-large-top">
            <ul class="uk-subnav uk-margin-bottom-remove">
                <li>
                    <a href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>">
                        <?= __('Read more') ?><i class="uk-icon-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="uk-articles-categories">
            <?php 
                foreach($taglist as $t) {
		            if (stripos(strtolower($post->content), $t) !== false) {             
           		        print('<div class="uk-articles-category--'.$t.'">'.$t.'</div>');
                    }
                }
            ?>
        </div>

        <?php
            $r = number_format(str_word_count(strip_tags($post->content)) / 197);
            print('<div class="uk-articles-reading-time">'.$r.' minuti circa di lettura</div>');
        ?>

    </article>
    <?php endforeach ?>

    <?php

        $range     = 3;
        $total     = intval($total);
        $page      = intval($page);
        $pageIndex = $page - 1;

    ?>

    <?php if ($total > 1) : ?>
    <ul class="uk-pagination">


        <?php for($i=1;$i<=$total;$i++): ?>
        <?php if ($i <= ($pageIndex+$range) && $i >= ($pageIndex-$range)): ?>

        <?php if ($i == $page): ?>
        <li class="uk-active"><span><?=$i?></span></li>
        <?php else: ?>
        <li>
            <a href="<?= $view->url('@blog/page', ['page' => $i]) ?>"><?=$i?></a>
        <li>
            <?php endif; ?>

            <?php elseif($i==1): ?>

        <li>
            <a href="<?= $view->url('@blog/page', ['page' => 1]) ?>">1</a>
        </li>
        <li><span>...</span></li>

        <?php elseif($i==$total): ?>

        <li><span>...</span></li>
        <li>
            <a href="<?= $view->url('@blog/page', ['page' => $total]) ?>"><?=$total?></a>
        </li>

        <?php endif; ?>
        <?php endfor; ?>


    </ul>
    <?php endif ?>

</div>