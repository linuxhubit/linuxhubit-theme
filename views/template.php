<!DOCTYPE html>
<html lang="<?= $intl->getLocaleTag() ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="https://linuxhub.it/" />
    <?php $view->style('theme', 'theme:css/theme-min.css') ?>
    <?= $view->render('head') ?>
</head>

<body>
    <header>
        <!--
        <nav>
            <?= $view->menu('main', 'menu-navbar.php') ?>
        </nav>
        -->
        <div itemscope itemtype="https://schema.org/WebSite">
            <a href="/">
                <img src="/storage/brand.svg" alt="linux/hub" />
                <img src="/storage/logo-lh-icon.svg" alt="linux/hub" style="display:none" />
            </a>
            <meta itemprop="url" content="https://linuxhub.it/"/>
            <form method="GET" action="search" autocomplete="off" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
                <meta itemprop="target" content="https://linuxhub.it/search?q={searchword}" />
                <input itemprop="query-input" type="search" autocomplete="off" name="searchword" placeholder="Cerca .." />
                <img class="icon" src="packages/linuxhub/v3/images/zondicons/search.svg" alt="cerca" />
                <input type="submit" name="submit" hidden>
                <div></div>
            </form>
            <?= $view->menu('top', 'top-navbar.php') ?>
        </div>
    </header>

    <main>
        <?= $view->render('content') ?>
    </main>

    <footer>
        <div>
            <div>
                <a href="#">
                    <img src="https://linuxhub.it/storage/brand.svg" alt="linux/hub" />
                </a>
                <small>We ❤ Open source.</small>
                <small>Tutto il materiale dei nostri autori, salvo apposita segnalazione, é di proprietá degli autori linux/hub.</small>
                <small>Questa opera è distribuita con Licenza <a rel="license" href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed.it"><b>Creative Commons Attribuzione - Non commerciale - Non opere derivate 4.0 Internazionale</b></a></small>
                <ul>
                    <li><span></span></li>
                    <li>
                        <a href="https://linuxhub.it/privacy-policy/"><img class="icon" src="packages/linuxhub/v3/images/zondicons/lock-closed.svg" alt="Privacy Policy" /> Privacy Policy</a>
                    </li>
                    <li>
                        <a href="mailto:amministrazione@linuxhub.it"><img class="icon" src="packages/linuxhub/v3/images/zondicons/user.svg" alt="Richiedi i tuoi dati" /> Richiedi i tuoi dati</a>
                    </li>
                    <li><span></span></li>
                    <li>
                        <a href="https://news.google.com/publications/CAAqBwgKMOma_Qow9v6JAw?hl=it&gl=IT&ceid=IT:it"><img class="icon" src="packages/linuxhub/v3/images/zondicons/bookmark-outline-add.svg" alt="Google News" /> Aggiungi a Google News</a>
                    </li>
                    <li>
                        <a href="articles/feed"><img class="icon" src="packages/linuxhub/v3/images/zondicons/news-paper.svg" alt="Feed RSS" /> Feeds RSS</a>
                    </li>
                    <li>
                        <a href="mailto:amministrazione@linuxhub.it"><img class="icon" src="packages/linuxhub/v3/images/zondicons/conversation.svg" alt="Feedback" /> Invia feedback</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3>Link utili</h3>
                <ul>
                    <li>
                        <a target="_blank" href="https://t.me/linuxhub">Canale Telegram</a>
                    </li>
                    <li>
                        <a target="_blank" href="https://t.me/linuxpeople">Gruppo Telegram</a>
                    </li>
                    <li>
                        <a href="https://linuxhub.it/i-nostri-canali">Tutti i nostri canali</a>
                    </li>
                    <li>
                        <a href="mailto:amministrazione@linuxhub.it">Proponi notizie ed il tuo progetto</a>
                    </li>
                    <li>
                        <a href="mailto:amministrazione@linuxhub.it">Segnala abuso</a>
                    </li>
                    <li>
                        <a href="mailto:amministrazione@linuxhub.it">Richiedi analitche</a>
                    </li>
                    <li>
                        <a href="https://linuxhub.it/staff">Il nostro Team</a>
                    </li>
                    <li>
                        <a href="https://github.com/linuxhubit">GitHub</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3>Sitemap</h3>
                <ul>
                    <li>
                        <a href="https://linuxhub.it/index.php/comunita-gruppi-linux-italiani">Comunità italiane</a>
                    </li>
                    <li>
                        <a href="https://linuxhub.it/libri">Libri - Biblioteca</a>
                    </li>
                    <li>
                        <a target="_blank" href="https://linuxpeople.org/">linuxpeople.org</a>
                    </li>
                    <li>
                        <a href="https://linuxhub.it/index.php/info">Su di noi</a>
                    </li>
                    <li>
                        <a href="https://linuxhub.it/index.php/search?searchword=howto&amp;ordering=newest&amp;searchphrase=all">#howto</a>
                    </li>
                    <li>
                        <a href="https://linuxhub.it/index.php/search?searchword=pausacaffe&amp;ordering=newest&amp;searchphrase=all">#pausacaffè</a>
                    </li>
                    <li>
                        <a href="https://www.gnome.org/friends/"> <img src="https://static.gnome.org/friends/banners/fog-88x32.png" alt="Become a Friend of GNOME" /></a>
                    </li>
                    <li>
                        <a rel="license" href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed.it"> <img alt="Licenza Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png"></a>
                    </li>
                </ul>
            </div>
            <div>
                <h3>Disclaimer</h3>
                <small>linux/hub e linuxpeople, sono progetti non a scopo di lucro, creati a favore dell'Open source.</small>
                <small>Per informazioni, collegamenti legali e altri, riferirsi a Mirko Brombin tramite <a href="mailto:amministrazione@linuxhub.it">E-mail</a></small>
                <small>Facciamo uso di <b>Cookie</b> e raccogliamo dati sulla navigazione a scopo puramente statistico, leggi maggiori informazioni <a href="https://linuxhub.it/privacy-policy">qui</a>.</small>
                <small>Questo portale non rappresenta una testata giornalistica, in quanto viene aggiornato senza alcuna periodicità.
                    <br>L'oggetto principalmente trattato sono le guide pratiche. Non può, pertanto, considerarsi un prodotto editoriale, ai sensi della legge
                    <a href="https://www.camera.it/parlam/leggi/01062l.htm" target="_blank">n. 62 del 7/03/2001.</small></a>
                    <a target="_blank" href="https://biskuit.org/"><small>developed with</small> Biskuit</a>
            </div>
        </div>
    </footer>

    <!-- Matomo -->
    <script type="text/javascript" async> var _paq = window._paq || []; /* tracker methods like "setCustomDimension" should be called before "trackPageView" */ _paq.push(['trackPageView']); _paq.push(['enableLinkTracking']); (function() { var u="https://data.mirko.pm/"; _paq.push(['setTrackerUrl', u+'matomo.php']); _paq.push(['setSiteId', '1']); var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s); })(); </script> <noscript><p><img src="//data.mirko.pm/matomo.php?idsite=1&rec=1" style="border:0;" alt="" /></p></noscript>
    <!-- end of Matomo-->

    <?= $view->render('footer') ?>
    <script>
        body = document.getElementsByTagName("body")[0];
        
        function load(dom, url, source_dom=false) {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    content = xmlHttp.responseText;
                    if(source_dom) {
                        try {
                            document.getElementById("content_process").remove();
                        } catch {
                            console.debug("No content process found.")
                        }
                        content_process = document.createElement("div"),
                        content_process.innerHTML = content,
                        content_process.id = "content_process",
                        content_process.style.display = "none",
                        body.appendChild(content_process),
                        content = document.querySelector("#content_process " + source_dom).outerHTML
                    }
                    dom.innerHTML = content;
                }
            };
            start = new Date().getTime();
            xmlHttp.open("GET", url, true);
            xmlHttp.send(null);
        }

        search_field = document.querySelector("header input[type='search']"),
        search_results = document.querySelector("header form > div"),
        search_result = document.querySelector("header form > div > div article"),
        search_field.addEventListener("keyup", search),
        search_keywords = "";

        function search() {
            window.scrollTo(0,0);
            search_keywords = search_field.value.replace(/ /g,"+"),
            search_url = 'search?searchword=' + search_keywords + '&limit=12&areas[0]=blog',
            load(search_results, search_url, '.tm-main.tm-content.uk-width-medium-1-1'),
            search_results.style.display = "block",
            body.style.overflow = "hidden"
        }

        window.addEventListener('mouseup', e => {
            if(e.target.tagName != "ARTICLE" & e.target.tagName != "INPUT") {
                console.log(e.target.tagName),
                search_results.style.display = "none",
                body.style.overflow = "auto",
                search_field.value  = ""
            }
        });
    </script>
</body>

</html>