<?php $view->script('posts', 'blog:app/bundle/posts.js', 'vue') ?>
<?php include('tags.php') ?>



<div>
    <?php foreach ($posts as $post) : ?>
    <article itemscope itemtype="http://schema.org/NewsArticle">
        <?php if ($image = $post->get('image.src')): ?>
            <div>
                <a class="uk-display-block" href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>">
                    <img src="<?= $image ?>" alt="<?= $post->get('image.alt') ?>" itemprop="image" content="<?= $image ?>" />
                </a>
            </div>
        <?php else: ?>
        <meta itemprop="image" content="images/cover.png" hidden />
        <?php endif ?>
        <h2 itemprop="headline"><?= $post->title ?></h2>
        <span>
            <em itemprop="publisher" itemscope itemtype="http://schema.org/Organization" hidden>
                <span itemprop="name">linux/hub</span>
                <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                    <meta itemprop="url" content="https://linuxhub.it/storage/brand.png" />
                </span>
            </em>
            Scritto da 
            <em itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?= $post->user->name ?></span></em> il 
            <em itemprop="datePublished" content="<?= $post->date->format(\DateTime::W3C) ?>"><?= __('<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}</time>') ?></em>
        </span>
        <p><?= substr(strip_tags ($post->excerpt), 0, 200) ?: substr(strip_tags ($post->content), 0, 200) ?>…</p>
        <div>
            <?php 
                $i=0;
                foreach($taglist as $t) {
                    $i=$i+1;
                    if($i==1) {
                        $r='itemprop="articleSection"';
                    } else {
                        $r="";
                    }
                    if (stripos(strtolower($post->content), $t) !== false) {             
                        print('<div '.$r.' class="tag '.$t.'">'.$t.'</div>');
                    }
                }
            ?>
        </div>
        <?php
            $r = number_format(str_word_count(strip_tags($post->content)) / 197);
            print('<span>'.$r.' minuti circa di lettura</span>');
        ?>
        <a itemprop="url" href="<?= $view->url('@blog/id', ['id' => $post->id]) ?>">
            <?= __('Read more') ?>
            <img class="icon" src="packages/linuxhub/v3/images/zondicons/arrow-thin-right.svg" alt="Leggi articolo" />
        </a>
    </article>
    <?php endforeach ?>

    <?php

        $range     = 3;
        $total     = intval($total);
        $page      = intval($page);
        $pageIndex = $page - 1;

    ?>

    <?php if ($total > 1) : ?>
    <ol>
        <?php for($i=1;$i<=$total;$i++): ?>
            <?php if ($i <= ($pageIndex+$range) && $i >= ($pageIndex-$range)): ?>
                <?php if ($i == $page): ?>
                    <li class="selected"><span><?=$i?></span></li>
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


    </ol>
    <?php endif ?>
</div>