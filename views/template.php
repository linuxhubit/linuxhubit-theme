<!DOCTYPE html>
<html lang="<?= $intl->getLocaleTag() ?>">

<head>
    <meta charset="utf-8">
    <title>linux/hub</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="https://linuxhub.it/" />
    <?php $view->style('theme', 'theme:css/theme-min.css') ?>
    <?= $view->render('head') ?>
</head>

<body>
    <header>
        <div itemscope itemtype="https://schema.org/WebSite">
            <a href="#">
                <img src="https://linuxhub.it/storage/brand.svg" />
            </a>
            <meta itemprop="url" content="https://linuxhub.it/"/>
            <form method="GET" action="search" autocomplete="off" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
                <meta itemprop="target" content="https://linuxhub.it/search?q={searchword}" />
                <input itemprop="query-input" type="search" autocomplete="off" name="searchword" placeholder="Cerca .." />
                <img class="icon" src="packages/linuxhub/v3/images/zondicons/search.svg" />
                <input type="submit" hidden>
            </form>
            <?= $view->menu('top', 'top-navbar.php') ?>
            <nav>
                <?= $view->menu('main', 'menu-navbar.php') ?>
            </nav>
        </div>
    </header>

    <main>
        <?= $view->render('content') ?>
    </main>

    <footer>
        <div>
            <div>
                <a href="#">
                    <img src="https://linuxhub.it/storage/brand.svg" />
                </a>
                <small>We ❤ Open source.</small>
                <h3>Link utili</h3>
                <ul>
                    <li>
                        <a target="_blank" href="https://t.me/linuxhub">Canale Telegram</a>
                    </li>
                    <li>
                        <a target="_blank" href="https://t.me/gentedilinux">Gruppo Telegram</a>
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
                        <a href="https://news.google.com/publications/CAAqBwgKMOma_Qow9v6JAw?hl=it&amp;gl=IT&amp;ceid=IT%3Ait">Aggiungi a Google News</a>
                    </li>
                    <li><span></span></li>
                    <li>
                        <a href="https://linuxhub.it/privacy-policy/"><img class="icon" src="packages/linuxhub/v3/images/zondicons/lock-closed.svg" /> Privacy Policy</a>
                    </li>
                    <li>
                        <a href="mailto:amministrazione@linuxhub.it"><img class="icon" src="packages/linuxhub/v3/images/zondicons/user.svg" /> Richiedi i tuoi dati</a>
                    </li>
                    <li><span></span></li>
                    <li>
                        <a href="#"><img class="icon" src="packages/linuxhub/v3/images/zondicons/news-paper.svg" /> Feeds RSS</a>
                    </li>
                    <li>
                        <a href="mailto:amministrazione@linuxhub.it"><img class="icon" src="packages/linuxhub/v3/images/zondicons/conversation.svg" /> Invia feedback</a>
                    </li>
                </ul>
            </div>
            <div>
                <small>Tutto il materiale dei nostri autori, salvo apposita segnalazione, é di proprietá degli autori linux/hub.</small>
                <small>Ne è vietata la riproduzione anche parziale se non autorizzata dagli stessi. <a href="https://www.copyrighted.com/website/CWByZximjydJ86hy?url=https%3A%2F%2Flinuxhub.it%2F" target="_blank">(registered/protected)</a></small>
                <h3>Sitemap</h3>
                <ul>
                    <li>
                        <a href="https://linuxhub.it/index.php/comunita-gruppi-linux-italiani">Comunità italiane</a>
                    </li>
                    <li>
                        <a href="https://linuxhub.it/libri">Libri - Biblioteca</a>
                    </li>
                    <li>
                        <a target="_blank" href="https://gentedilinux.linuxhub.it/">gentedilinux</a>
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
                </ul>
                <h3>Disclaimer</h3>
                <small>linux/hub e gentedilinux, sono progetti non a scopo di lucro, creati a favore dell'Open source.</small>
                <small>Nessuno dei nostri progetti genera introiti, lo staff viene retribuito con la passione nella divulgazione.</small>
                <small>Per informazioni, collegamenti legali e altri, riferirsi a Mirko Brombin tramite i <a href="https://linuxhub.it/invia-feedback/">Form di contatto</a></small>
                <small>Questo portale non rappresenta una testata giornalistica, in quanto viene aggiornato senza alcuna periodicità.
                    <br>L'oggetto principalmente trattato sono le guide pratiche. Non può, pertanto, considerarsi un prodotto editoriale, ai sensi della legge
                    <a href="http://www.camera.it/parlam/leggi/01062l.htm" target="_blank">n. 62 del 7/03/2001.</small>
                <small>developed with</small> <a target="_blank" href="https://biskuit.org/">Bis[ku]it</a>
            </div>
        </div>
    </footer>
</body>

</html>