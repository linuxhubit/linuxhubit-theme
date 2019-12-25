<?php $view->script('post', 'blog:app/bundle/post.js', 'vue') ?>
<?php include('tags.php') ?>

<article class="uk-article uk-article-page uk-article-with-summary uk-container">

    <div class="uk-article-body">
        <?php if ($image = $post->get('image.src')): ?>
        <img src="<?= $image ?>" alt="<?= $post->get('image.alt') ?>">
        <?php endif ?>
    
        <h1 class="uk-article-title"><?= $post->title ?></h1>
    
        <p class="uk-article-meta">
            <?= __('Written by %name% on %date%', ['%name%' => $post->user->name, '%date%' => '<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}</time>' ]) ?>
        </p>
    
        <div class="uk-articles-categories">
            <?php 
                foreach($taglist as $t) {
		    if (stripos(strtolower($post->content), $t) !== false) {
                        print('<div class="uk-articles-category--'.$t.'">'.$t.'</div>');
                    }
                }
            ?>
        </div>

        <div class="uk-margin uk-article-text"><?= $post->content ?></div>
    </div>

    <div class="uk-article-summary">
        <ul class="uk-article-summary-list">
            <li>..</li>
        </ul>
    </div>

    <script async>
      $(document).ready(function() {
        var e = ".uk-article-text",
            t = ".uk-article-summary-list",
            a = $(e + " h1," + e + " h2," + e + " h3," + e + " h4");
        $(t).empty(), a.each(function(e) {
          var a = $(this);
          a.attr("id", "title" + e), $(t).append("<li><a id='link" + e + "' href='#title" + e + "' class='" +a.prop('nodeName')+"' title='" + a.attr("tagName") + "'>" + a.html() + "</a></li>")
        }), $(t + " li").length < 1 && $(t).parent().remove()
      });
    </script>
</article>
