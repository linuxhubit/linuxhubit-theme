<!DOCTYPE html>
<html class="<?= $params['html_class'] ?>" lang="<?= $intl->getLocaleTag() ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Guide, informazioni e novitá su Linux e Open source.">
        <?= $view->render('head') ?>
        <?php $view->style('theme', 'theme:css/theme.css') ?>
        <?php $view->script('theme', 'theme:js/theme.js', ['uikit-sticky',  'uikit-lightbox',  'uikit-parallax']) ?>
    </head>
    <body>

        <?php if ($params['logo'] || $view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
        <div class="<?= $params['classes.navbar'] ?>" <?= $params['classes.sticky'] ?>>
            <div class="uk-container uk-container-center">

                <nav class="uk-navbar">

                    <a class="uk-navbar-brand" href="<?= $view->url()->get() ?>">
                        <?php if ($params['logo']) : ?>
                            <img class="tm-logo uk-responsive-height" src="<?= $this->escape($params['logo']) ?>" alt="">
                            <img class="tm-logo-contrast uk-responsive-height" src="<?= ($params['logo_contrast']) ? $this->escape($params['logo_contrast']) : $this->escape($params['logo']) ?>" alt="">
                        <?php else : ?>
                            <?= $params['title'] ?>
                        <?php endif ?>
                    </a>

                    <form class="uk-navbar-search" method="GET" action="search" autocomplete="off">
                        <i class="uk-icon-search"></i>
                        <input type="search" autcomplete="off" name="searchword" placeholder="Cerca .." />
                        <input type="submit" hidden />
                        <div class="uk-navbar-search-results"></div>
                    </form>

                    <script async>
                        var searchfield = $("form.uk-navbar-search input[type='search']");
                        var searchresults = $('.uk-navbar-search-results');
                        $(document).ready(function() {
                            searchfield.bind('change keyup', function() {
                            var searchkeywords = searchfield.val().replace(/ /g,"+");
                                searchresults.load('search?searchword='+searchkeywords+' .uk-search-page');                        
                            });
                        });       
                        $(document).mouseup(function(e) {
                            if(!searchresults.is(e.target) && searchresults.has(e.target).length === 0) {
                                searchresults.empty();
                                searchfield.val('');
                            }
                        });            
                    </script>

                    <div class="uk-navbar-top-menu">
                        <?= $view->menu('top', 'top-navbar.php') ?>
                    </div>

                    <?php if ($view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
                    <div class="uk-navbar-flip uk-hidden-small">
                        <?= $view->position('navbar', 'position-blank.php') ?>
                    </div>
                    <?php endif ?>

                    <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
                    <div class="uk-navbar-flip uk-visible-small">
                        <a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
                    </div>
                    <?php endif ?>

                </nav>

            </div>
        </div>
                
        <div class="uk-secondary-navbar">
            <div class="uk-container uk-container-center">
                <?= $view->menu('main', 'menu-navbar.php') ?>
            </div>
        </div>

        <!--
        <div class="uk-notices">
            	<div class="uk-container uk-container-center">
            		<div class="uk-notices--entry">
            			<p>Metti in mostra la tua personalizzazione Linux
            				<a href="https://gentedilinux.linuxhub.it/bestof" class="uk-action">
            				  <i class="uk-icon-info-circle"></i>Maggiori informazioni</a></p>
            		</div>
            		<div class="uk-notices--entry">
            			<p>linux/hub è molto più di quel che vedi!
            				<a href="https://linuxhub.it/linuxhub-360deg" class="uk-action">
            				  <i class="uk-icon-question-circle"></i>Leggi le intenzioni</a></p>
            		</div>
            	</div>
        </div>
        -->
        <?php endif ?>

        <?php if ($view->position()->exists('hero')) : ?>
        <div id="tm-hero" class="tm-hero uk-block uk-block-large uk-cover-background uk-flex uk-flex-middle <?= $params['classes.hero'] ?>" <?= $params['hero_image'] ? "style=\"background-image: url('{$view->url($params['hero_image'])}');\"" : '' ?> <?= $params['classes.parallax'] ?>>
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('hero', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif; ?>

        <?php if ($view->position()->exists('top')) : ?>
        <div id="tm-top" class="tm-top uk-block <?= $params['top_style'] ?>">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('top', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif; ?>

        <div id="tm-main" class="tm-main uk-block <?= $params['main_style'] ?>">
            <div class="uk-container uk-container-center">

                <div class="uk-grid" data-uk-grid-match data-uk-grid-margin>

                    <main class="<?= $view->position()->exists('sidebar') ? 'uk-width-medium-3-4' : 'uk-width-1-1'; ?>">
                        <?= $view->render('content') ?>
                    </main>

                    <?php if ($view->position()->exists('sidebar')) : ?>
                    <aside class="uk-width-medium-1-4 <?= $params['sidebar_first'] ? 'uk-flex-order-first-medium' : ''; ?>">
                        <?= $view->position('sidebar', 'position-panel.php') ?>
                    </aside>
                    <?php endif ?>

                </div>

            </div>
        </div>

        <?php if ($view->position()->exists('bottom')) : ?>
        <div id="tm-bottom" class="tm-bottom uk-block <?= $params['bottom_style'] ?>">
            <div class="uk-container uk-container-center">

                <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                    <?= $view->position('bottom', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif; ?>

        <footer class="uk-footer">
            	<div class="uk-container uk-container-center">
            		<!-- widgets -->
            		<div class="uk-widgets">
            			<!-- area -->
            			<div class="uk-widgets--area">
            				<div class="uk-brand lhb-brand--small"></div>
            				<p class="uk-opensource">We ❤ Open source.</p>
            			</div>
            			<!-- area -->
            			<div class="uk-widgets--area">
            				<div class="uk-copyright">
            					<p>Tutto il materiale dei nostri autori, salvo apposita segnalazione, é di proprietá degli autori linux/hub.</p>
            					<p>Ne è vietata la riproduzione anche parziale se non autorizzata dagli stessi. <a href="https://www.copyrighted.com/website/CWByZximjydJ86hy?url=https%3A%2F%2Flinuxhub.it%2F" target="_blank">(registered/protected)</a></p>
            				</div>
            			</div>
            		</div>
            		<!-- widgets -->
            		<div class="uk-widgets">
            			<!-- area -->
            			<div class="uk-widgets--area">
            				<div class="uk-sitemap">
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
            						<li class="uk-sitemap--divider"></li>
            						<li>
            							<a href="https://linuxhub.it/privacy-policy/"><i class="uk-icon-info-circle"></i> Privacy Policy</a>
            						</li>
            						<li>
            							<a href="mailto:amministrazione@linuxhub.it"><i class="uk-icon-user"></i> Richiedi i tuoi dati</a>
            						</li>
            						<li class="uk-sitemap--divider"></li>
            						<li>
            							<a href="#"><i class="uk-icon-rss"></i> Feeds RSS</a>
            						</li>
            						<li>
            							<a href="mailto:amministrazione@linuxhub.it"><i class="uk-icon-comment"></i> Invia feedback</a>
            						</li>
            						<li>
            							<a href="#" class="lhb-read"><i class="uk-icon-book"></i> Modalità lettura</a>
            						</li>
            					</ul>
            				</div>
            			</div>
            			<!-- area -->
            			<div class="uk-widgets--area">
            				<div class="uk-sitemap">
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
            							<a href="https://linuxhub.it/index.php/search?searchword=howto&ordering=newest&searchphrase=all">#howto</a>
            						</li>
            						<li>
            							<a href="https://linuxhub.it/index.php/search?searchword=pausacaffe&ordering=newest&searchphrase=all">#pausacaffè</a>
            						</li>
            					</ul>
            				</div>
            				<div class="uk-disclaimer">
            					<h3>Disclaimer</h3>
            					<p>linux/hub e gentedilinux, sono progetti non a scopo di lucro, creati a favore dell'Open source.</p>
            					<p>Nessuno dei nostri progetti genera introiti, lo staff viene retribuito con la passione nella divulgazione.</p>
            					<p>Per informazioni, collegamenti legali e altri, riferirsi a Mirko Brombin tramite i
            						<a href="https://linuxhub.it/invia-feedback/">Form di contatto</a>.</p>
            					<p>
            						Questo portale non rappresenta una testata giornalistica, in quanto viene aggiornato senza alcuna periodicità.
            						<br>L'oggetto principalmente trattato sono le guide pratiche. Non può, pertanto, considerarsi un prodotto editoriale, ai sensi della legge
            						<a href="http://www.camera.it/parlam/leggi/01062l.htm" target="_blank">n. 62 del 7/03/2001.</a>
            					</p>
            					<br>
            					<p><small>developed with</small> <a target="_blank" href="https://www.pagekit.com/">PageKit</a></p>
            				</div>
            			</div>
            		</div>
            	</div>
            </footer>

        <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">

                <?php if ($params['logo_offcanvas']) : ?>
                <div class="uk-panel uk-text-center">
                    <a href="<?= $view->url()->get() ?>">
                        <img src="<?= $this->escape($params['logo_offcanvas']) ?>" alt="">
                    </a>
                </div>
                <?php endif ?>

                <?php if ($view->menu()->exists('offcanvas')) : ?>
                    <?= $view->menu('offcanvas', ['class' => 'uk-nav-offcanvas']) ?>
                <?php endif ?>

                <?php if ($view->position()->exists('offcanvas')) : ?>
                    <?= $view->position('offcanvas', 'position-panel.php') ?>
                <?php endif ?>

            </div>
        </div>
        <?php endif ?>

        <?= $view->render('footer') ?>

    </body>
</html>
