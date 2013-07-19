<!DOCTYPE html>
<!--[if IE 8]>               <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Thais &amp; Jon</title>
        <meta name="description" content="Thais and Jon are getting married!!!">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link href="favicon.ico" rel="shortcut icon">

        <link href='http://fonts.googleapis.com/css?family=Lato:300,400|Tangerine:700|Petit+Formal+Script' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="/css/app.css" />

        <script src="/js/vendor/custom.modernizr.js"></script>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <p id="wedding-date">Saturday, September 7, 2013</p>

        <header id="header" class="row">
            <a class="logo large-2 small-4 small-centered columns" href="/"><img src="/images/logo.png" alt="Thais and Jon are getting married" /></a>
            
            <nav class="site-nav ribbon">
                <div class="ribbon-content">
                    <div id="nav">
                        <ul class="nav">
                            <li class="large-2 small-4 columns"><a href="/story">story</a></li>
                            <li class="large-3 small-4 small-offset-4 large-offset-0 columns"><a href="/location">location</a></li>
                            <li class="large-3 small-4 large-offset-2 columns"><a href="/schedule">schedule</a></li>
                            <li class="large-2 small-4 columns"><a href="/rsvp">rsvp</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div id="main" class="row content">

            @if (Session::has('message'))
                <div class="error-panel flash-error">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
            
            @yield('content')

        </div>

        <footer id="footer" class="row">
            <div class="ribbon ribbon-reverse footer">
                <div class="ribbon-reverse-content">
                    <p class="signature">Thais <img src="/images/icons/hearts.png" alt="<3" /> Jon</p>
                </div>
            </div>
        </footer>

        @yield('script')

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-20653212-2', 'thaisandjon.com');
            ga('send', 'pageview');
        </script>
    </body>
</html>