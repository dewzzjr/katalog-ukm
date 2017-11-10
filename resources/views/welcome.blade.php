<!doctype html>
<html lang="id">

<head>
    <title>Selamat datang di Katalog UKM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Semantic CSS -->
    <link rel="icon" href="icon.png" title="Katalog UKM">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css" />
    <style type="text/css">
        .hidden.menu {
            display: none;
        }

        .masthead .background {  
            position: fixed;
            left: 0;
            right: 0;
            z-index: -10;
            display: block;
            min-height: inherit;
            width: inherit;
            background-image: url("background.jpg") !important;
            background-size: cover !important;

            -webkit-filter: grayscale(80%) blur(5px);
            -moz-filter: grayscale(80%) blur(5px);
            -o-filter: grayscale(80%) blur(5px);
            -ms-filter: grayscale(80%) blur(5px);
            filter: grayscale(80%) blur(5px);
        }
        
        .masthead.segment {
            min-height: 700px;
            padding: 1em 0em;
        }
        
        .masthead .logo.item img {
            margin-right: 1em;
        }
        
        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }
        
        .masthead h1.ui.header {
            margin-top: 3em;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }
        
        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }
        
        .ui.vertical.stripe {
            padding: 8em 0em;
        }
        
        .ui.vertical.stripe h3 {
            font-size: 2em;
        }
        
        .ui.vertical.stripe .button+h3,
        .ui.vertical.stripe p+h3 {
            margin-top: 3em;
        }
        
        .ui.vertical.stripe .floated.image {
            clear: both;
        }
        
        .ui.vertical.stripe p {
            font-size: 1.33em;
        }
        
        .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
        }
        
        .footer.segment {
            z-index: 10;
            padding: 5em 0em;
        }
        
        .secondary.pointing.menu .toc.item {
            display: none;
        }
        
        @media only screen and (max-width: 700px) {
            .ui.fixed.menu {
                display: none !important;
            }
            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }
            .secondary.pointing.menu .toc.item {
                display: block;
            }
            .masthead.segment {
                min-height: 350px;
            }
            .masthead h1.ui.header {
                font-size: 2em;
                margin-top: 1.5em;
            }
            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }

        textarea {
            margin-top: 0px; 
            margin-bottom: 0px; 
            height: 112px;
        }
    </style>
</head>

<body>

    <!-- Following Menu -->
    <div class="ui large top fixed hidden menu">
        <div class="ui container">
            <a class="item" href="{{ route('home') }}">Beranda</a>
            <a class="active item">Kontak Kami</a>
            <div class="right menu">
                <div class="item">
                    <a class="ui button" href="{{ route('login') }}">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="ui vertical inverted sidebar menu">
        <a class="item" href="{{ route('home') }}">Beranda</a>
        <a class="item" href="#contact">Kontak Kami</a>
        <a class="item" href="{{ route('login') }}">
            Login
        </a>
    </div>

    <!-- Page Contents -->
    <div class="pusher">
        <div id="home" class="ui vertical masthead center aligned segment">
        <div class="background"></div>
            <div class="ui container">
                <div class="ui large secondary pointing menu">
                    <a class="toc item">
                          <img class="ui avatar image"src="icon.png" alt="Logo Katalog UKM" />
                    </a>
                    <a class="active item" href="{{ route('home') }}">Beranda</a>
                    <a class="item" href="#contact">Kontak Kami</a>
                    <div class="right item">
                        <a class="ui button blue" href="{{ route('login') }}">
                            Login
                        </a>
                    </div>
                </div>
            </div>

            <div class="ui text container">
                <h1 class="ui header">
                    Selamat datang di Katalog UKM
                </h1>
                <h2>Memberikan informasi tentang Usaha Kecil Menengah beserta produk yang ditawarkan.</h2>
                <div class="ui center aligned basic segment">
                <form method="GET" action="{{ route('home') }}">
                    <div class="ui left icon action input">
                        <i class="search icon"></i>
                        <input name="query" type="text" placeholder="Kata Kunci">
                        <button class="ui blue submit button">Cari</button>
                    </div>
                </form>
                </div>
            </div>

        </div>

        <!-- Contact Form -->
        <div id="contact" class="ui vertical stripe segment">
            <div class="ui text container">
                <form class="ui form">
                    <p class="title">Kontak Kami</p>
                    <div class="two fields">
                        <div class="field">
                            <label>Nama</label>
                            <input name="name" placeholder="Nama lengkap" type="text">
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <input name="email" placeholder="Email aktif yang dapat dihubungi" type="email">
                        </div>
                    </div>
                    <div class="field">
                        <label>Pesan</label>
                        <textarea placeholder="Tuliskan pesan yang ingin anda sampaikan" rows="2"></textarea>
                    </div>
                    <div class="inline field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="terms">
                            <label>I agree to the terms and conditions</label>
                        </div>
                    </div>
                    <div class="ui primary submit button">Kirim</div>
                    <div class="ui error message"></div>
                </form>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="ui inverted vertical footer segment">
        <div class="ui text container">
            @copyright Dewangga Prasetya Praja 2017
        </div>
    </div>
    <!-- Semantic JavaScript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
    <script>
        $(document)
            .ready(function() {

                // fix menu when passed
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function() {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function() {
                            $('.fixed.menu').transition('fade out');
                        }
                    });

                // create sidebar and attach to menu open
                $('.ui.sidebar').sidebar('attach events', '.toc.item');
                // create dropdown
                $('.ui.dropdown').dropdown({
                    on: 'hover',
                });
            });
    </script>
</body>

</html>