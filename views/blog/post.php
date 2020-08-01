<?php $view->script('post', 'blog:app/bundle/post.js', 'vue') ?>
<?php include('tags.php') ?>
<?php include('months.php') ?>

<aside>
    <span>Indice</span>
    <ul>
        <li>Caricamento..</li>
    </ul>
    <?php
        $r = number_format(str_word_count(strip_tags($post->content)) / 197);
        print('<span>'.$r.' minuti circa di lettura</span>');
    ?>
</aside>
<article itemscope itemtype="https://schema.org/NewsArticle" class="hasSummary">
    <meta itemprop="image" content="images/cover.png" hidden />
    <h1 itemprop="headline"><?= $post->title ?></h1>
    <span>
        <em itemprop="publisher" itemscope itemtype="https://schema.org/Organization" hidden>
            <span itemprop="name">linux/hub</span>
            <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                <meta itemprop="url" content="https://linuxhub.it/storage/brand.png" />
            </span>
        </em>
        Scritto da
        <em itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?= $post->user->name ?></span></em> il
        <em itemprop="datePublished" content="<?= $post->date->format(\DateTime::W3C) ?>">
            <?php $d = date_parse_from_format("Y-n-j", $post->date->format(\DateTime::W3C)); ?>
            <?= __('<time datetime="'.$post->date->format(\DateTime::W3C).'">'.$d["day"]." ".$months[(int)$d["month"]]." ".$d["year"].'</time> ') ?>
        </em>
    </span>
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
    <div><?= $post->content ?></div>
</article>

<section related>
    <h4>Leggi anche</h4>
    <div>Caricamento..</div>
</section>

<?php $view->script('highlight', 'theme:js/highlight.min.js') ?>
<?php $view->script('post', 'theme:js/post.min.js', ['highlight'], ['defer' => true, 'async' => true]) ?>