<!DOCTYPE html>
<html>

<head>
    <title>GalaxySphere - Navigate the Galaxy of Tech Wonders</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/li-scroller.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">

    <!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <div class="box_wrapper">
            <header id="header">
                @if (session('send'))
                <div class="alert alert-success">
                    {{ session('send') }}
                </div>
                @endif
                <div class="header_top">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav custom_nav">
                                    <li><a href="{{ route('index')}}">@lang('words.home')</a></li>
                                    <li><a href="/lang/en">@lang('words.en')</a></li>
                                    <li><a href="/lang/uz">@lang('words.uz')</a></li>
                                    <li><a href="/lang/ru">@lang('words.ru')</a></li>


                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="header_search">
                        <button id="searchIcon"><i class="fa fa-search"></i></button>
                        <div id="shide">
                            <div id="search-hide">
                                <form action="{{ route('search')}}" method="GET">
                                    <input name="q" type="search" size="40" placeholder="Search here ...">
                                </form>
                                <button class="remove"><span><i class="fa fa-times"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header_bottom">
                    <div class="logo_area"><a class="logo" href="{{route('index')}}"><b style="color: #414a4c;">Galaxy</b><b style="color:#596567;">Sphere</b><span>Navigate the Galaxy of Tech Wonders!</span></a></div>
                    <div class="top_addarea"><a href="#"><img src="{{ asset ('assets/images/addbanner_728x90_V1.jpg')}}" alt=""></a></div>
                </div>
                @if (session('send'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </header>
            <div class="latest_newsarea"> <span>@lang('words.category')</span>
                <ul class="news_sticker" style="display: flex;">

                    @foreach ($categories as $category)
                    <li><a href="{{route('categoryPosts',$category->slug)}}">{{$category['category_' . \App::getLocale()]}}</a></li>

                    @endforeach





                </ul>
            </div>

            @yield('content')


            <footer id="footer">
                <div class="footer_top">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_footer_top wow fadeInLeft">
                            <h2>@lang('words.follow')</h2>
                            <div class="subscribe_area">
                                <p>"@lang('words.followinf')"</p>
                                <form action="{{ route('sendMail')}}" method="POST">
                                    @csrf
                                    <div class="subscribe_mail">
                                        <input name="email" class="form-control" type="email" placeholder="Email Address">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <button type="submit" class="submit_btn">@lang('words.btn')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_footer_top wow fadeInLeft">
                            <h2>@lang('words.popular')</h2>
                            <ul class="catg3_snav ppost_nav">

                                @foreach ($popularPosts as $post)
                                <li>
                                    <div class="media"> <a class="media-left" href="{{ route('postDetail', $post->slug)}}"> <img src="{{ asset ('temp/img/' . $post->image)}}" alt=""> </a>
                                        <div class="media-body"> <a class="catg_title" href="{{ route('postDetail', $post->slug)}}"> {{$post['title_' . \App::getLocale()]}}</a></div>
                                    </div>
                                </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_footer_top wow fadeInRight">
                            <h2>@lang('words.tag')</h2>
                            <ul class="footer_labels">

                                @foreach ($tags as $tag)
                                <li><a href="{{ route('tagPosts', $tag->slug)}}">{{$tag['tag_' . \App::getLocale()]}}</a></li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_footer_top wow fadeInRight">
                            <h2>@lang('words.contact')</h2>
                            <form action="{{ route('admin.mail.store')}}" method="POST" class="contact_form">
                                @csrf
                                <label>@lang('words.name')</label>
                                <input name="name" class="form-control" type="text">
                                <label>@lang('words.email')</label>
                                <input name="email" class="form-control" type="email">
                                <label>@lang('words.message')</label>
                                <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
                                <button type="submit" class="send_btn">@lang('words.btn')</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom">
                    <div class="footer_bottom_left">
                        <p>All Rights Reserved &copy; 2024</p>
                    </div>
                    <div class="footer_bottom_right">
                        <ul>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Googel+" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a class="tootlip" data-toggle="tooltip" data-placement="top" title="Rss" href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset ('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset ('assets/js/wow.min.js')}}"></script>
    <script src="{{ asset ('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('assets/js/slick.min.js')}}"></script>
    <script src="{{ asset ('assets/js/jquery.li-scroller.1.0.js')}}"></script>
    <script src="{{ asset ('assets/js/custom.js')}}"></script>
</body>

</html>