<?php $view->script('post', 'blog:app/bundle/post.js', 'vue') ?>
<?php include('tags.php') ?>

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
        <em itemprop="datePublished" content="<?= $post->date->format(\DateTime::W3C) ?>"><?= __('<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}</time> ') ?></em>
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

<script src="/packages/linuxhub/v4/js/highlight.min.js"></script>
<script>
    // highlight.js
    document.querySelectorAll("pre").forEach(t => {
        hljs.highlightBlock(t)
    }),
    // summary
    headings = document.querySelectorAll("main>article>div h2,main>article>div h3,main>article>div h4"),
    summary = document.querySelector("aside>ul"),
    document.querySelector("aside>ul>li:first-child").remove(),
    url = window.location.href,
    i=0,
    headings.forEach(t => {
        tt = 'title' + i.toString(),
        t.setAttribute('id', tt),
        li = document.createElement("li"),
        a = document.createElement("a"),
        a.classList.add(tt, t.tagName.toUpperCase()), a.setAttribute("href", url + '#' + tt), a.innerText = t.innerText
        li.appendChild(a),
        summary.appendChild(li),
        ++i
    }),
    // on scroll active summary item
    window.addEventListener('scroll', function(e) {
        headings.forEach(t => {
            if(window.scrollY >= (t.offsetTop - 50) & window.scrollY <= (t.offsetTop + 50)) {
                try {
                    document.querySelector("aside>ul>li>a.active").classList.remove("active")
                } catch (error) {
                    console.debug("No selected summary item found.")
                }
                document.querySelector('aside>ul>li>a.' + t.getAttribute("id")).classList.add("active")
            }
        })
    });
    setTimeout(() => {
        $(document).ready(function () {
            searchresults = $('section[related] > div'),
            tag = $("main>article>span+div .tag:first-child").text();
            keyword = tag ? tag : "nginx";
            searchresults.load('search?searchword='+keyword+'&limit=6&areas[0]=blog .tm-main.tm-content.uk-width-medium-1-1');
            searchresults.show();
        });
    }, 180);
    /*
    setTimeout(() => {
        $.fn.scrollStopped = function (t) {
            var e = this,
                i = $(e);
            i.scroll(function (a) {
                clearTimeout(i.data("scrollTimeout")), i.data("scrollTimeout", setTimeout(t.bind(e), 250, a))
            })
        },
        $(document).ready(function () {
            searchresults = $('section[related] > div'),
            tag = $("main>article>span+div .tag:first-child").text();
            keyword = tag ? tag : "nginx";
            searchresults.load('search?searchword='+keyword+'&limit=6&areas[0]=blog .tm-main.tm-content.uk-width-medium-1-1');
            searchresults.show();
            var t = "main>article>div",
                e = "main>aside>ul",
                a = e+">li:first-child a",
                i = $(t + " h1," + t + " h2," + t + " h3," + t + " h4"),
                searchresults = $('section[related] > div'),
                tag = $("main>article>span+div .tag:first-child").text();
                keyword = tag ? tag : "nginx";
            $(e).empty(), i.each(function (t) {
                var i = $(this);
                i.attr("id", "title" + t), $(e).append("<li><a id='link" + t + "' href='" + window.location.href + "#title" + t + "' class='" + i.prop("nodeName") + "' title='" + i.attr("tagName") + "'>" + i.html() + "</a></li>")
            }), $(a).addClass("active"),
            $(e + " li").length < 1 && $(e).parent().remove(), $(document).scrollStopped(function () {
                $("h2, h3, h4, h5").each(function (t) {
                    var e = $(this),
                        i = e.attr("id"),
                        a = e.offset().top,
                        o = $(window);
                    o.scroll(function () {
                        o.scrollTop() >= a && ($("main>aside>ul a").removeClass("active"), $('main>aside>ul a[href="' + window.location.href + "#" + i + '"]').addClass("active"))
                    })
                });
            }),
            /* Related articles
                searchresults.load('search?searchword='+keyword+'&limit=6&areas[0]=blog .tm-main.tm-content.uk-width-medium-1-1');
                searchresults.show();
        }, 180);
    });
        */
</script>