<?php $view->script('post', 'blog:app/bundle/post.js', 'vue') ?>
<?php include('tags.php') ?>

<article itemscope itemtype="http://schema.org/NewsArticle" class="hasSummary">
    <meta itemprop="image" content="images/cover.png" hidden />
    <h1 itemprop="headline"><?= $post->title ?></h1>
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
    <div><?= $post->content ?></div>
</article>
<aside>
    <ul>
        <li>Caricamento..</li>
    </ul>
</aside>

<script async>
    $.fn.scrollStopped = function (callback) {
        var that = this,
            $this = $(that);
        $this.scroll(function (ev) {
            clearTimeout($this.data('scrollTimeout'));
            $this.data('scrollTimeout', setTimeout(callback.bind(that), 250, ev))
        })
    };
    $(document).ready(function () {
        var e = "main>article>div",
            t = "main>aside>ul",
            a = $(e + " h1," + e + " h2," + e + " h3," + e + " h4");
        $(t).empty(), a.each(function (e) {
            var a = $(this);
            a.attr("id", "title" + e), $(t).append("<li><a id='link" + e + "' href='#title" + e + "' class='" + a.prop('nodeName') + "' title='" + a.attr("tagName") + "'>" + a.html() + "</a></li>")
        }), $(t + " li").length < 1 && $(t).parent().remove();

        $(document).scrollStopped(function () {
            var tt = $('h2, h3, h4, h5');
            tt.each(function (e) {
                var t = $(this);
                var id = t.attr('id');
                var distance = t.offset().top,
                    $window = $(window);
                $window.scroll(function () {
                    if ($window.scrollTop() >= distance) {
                        $('main>aside>ul a').removeClass('active');
                        $('main>aside>ul a[href="#' + id + '"]').addClass('active')
                    }
                })
            })
        })
    });
</script>