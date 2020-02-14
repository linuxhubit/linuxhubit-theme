<?php $view->script('posts', 'blog:app/bundle/posts.js', 'vue') ?>
<?php include('tags.php') ?>



<div>
    <?php foreach ($posts as $post) : ?>
    <article itemscope itemtype="http://schema.org/NewsArticle">
        <meta itemprop="image" content="images/cover.png" hidden />
        <h2 itemprop="headline"><?= $post->title ?></h2>
        <span>
            <i itemprop="publisher" itemscope itemtype="http://schema.org/Organization" hidden>
                <span itemprop="name">linux/hub</span>
                <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                    <meta itemprop="url" content="https://linuxhub.it/storage/brand.png" />
                </span>
            </i>
            Scritto da 
            <i itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?= $post->user->name ?></span></i> il 
            <i itemprop="datePublished" content="<?= $post->date->format(\DateTime::W3C) ?>"><?= __('<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}') ?></i>
        </span>
        <p>Ruby on Rails è uno dei framework web più utilizzati nel mondo dei siti internet. Con esso è
            possibile creare, utilizzando il linguaggio di programmazione Ruby, applicazioni web con un database
            ed …</p>
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
                        print('<div '.$r.'class="tag '.$t.'">'.$t.'</div>');
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
            <img class="icon" src="packages/linuxhub/v3/images/zondicons/arrow-thin-right.svg" />
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