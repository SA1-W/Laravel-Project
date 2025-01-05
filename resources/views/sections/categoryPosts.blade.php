@foreach ($categories as $index => $category)
@if ($index == 0)
<div class="single_category wow fadeInDown">
    <div class="category_title"> <a href="pages/category-archive.html">{{ $category['category_' . \App::getLocale()] }}</a></div>
    <div class="single_category_inner">
        <ul class="catg_nav">

            @foreach ($category->posts as $post)


            <li>
                <div class="catgimg_container">
                    <a class="catg1_img" href="{{route('postDetail', $post->slug)}}">
                        <img src="{{asset('temp/img/'. $post->image)}}" alt="">
                    </a>
                </div>
                <a class="catg_title" href="{{route('postDetail', $post->slug)}}">{{$post['title_' . \App::getLocale()]}}</a>
                <div class="sing_commentbox">
                    <p><i class="fa fa-calendar"></i>{{ $post->created_at->format('d M Y, H:i') }}</p>
                    <a href="#"><i class="fa fa-eye"></i>{{$post->views}}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@elseif ($index == 1)
<div class="single_category  wow fadeInDown">
    <div class="category_title"> <a href="pages/category-archive.html">{{ $category['category_' . \App::getLocale()] }}</a></div>
    <div class="single_category_inner">
        <ul class="catg_nav catg_nav2">

            @foreach ($category->posts as $post)
            <li>
                <div class="catgimg_container">
                    <a class="catg1_img" href="{{route('postDetail', $post->slug)}}">
                        <img src="{{asset('temp/img/' . $post->image)}}" alt="">
                    </a>
                </div>
                <a class="catg_title" href="{{route('postDetail', $post->slug)}}">{{$post['title_' . \App::getLocale()]}}</a>
                <div class="sing_commentbox">
                    <p><i class="fa fa-calendar"></i>{{ $post->created_at->format('d M Y, H:i') }}</p>
                    <a href="#"><i class="fa fa-eye"></i>{{$post->views}}</a>
                </div>
                <p class="post-summary"></p>
            </li>

            @endforeach

        </ul>
    </div>
</div>
@elseif ($index == 2)
<div class="category_three_fourarea wow fadeInDown">
    <div class="category_three">
        <div class="single_category">
            <div class="category_title">
                <a href="pages/single_page.html">{{ $category['category_' . \App::getLocale()] }}</a>
            </div>
            <div class="single_category_inner">
                <ul class="catg_nav catg_nav3">
                    @foreach ($category->posts->take(1) as $post)
                    <li>
                        <div class="catgimg_container">
                            <a class="catg1_img" href="{{ route('postDetail', $post->slug) }}">
                                <img src="{{ asset('temp/img/' . $post->image) }}" alt="">
                            </a>
                        </div>
                        <a class="catg_title" href="{{ route('postDetail', $post->slug) }}">
                            {{ $post['title_' . \App::getLocale()] }}
                        </a>
                        <div class="sing_commentbox">
                            <p><i class="fa fa-calendar"></i>{{ $post->created_at->format('d M Y, H:i') }}</p>
                            <a href="#"><i class="fa fa-eye"></i>{{ $post->views }}</a>
                        </div>
                        <p class="post-summary">{{ Str::limit($post['content_' . \App::getLocale()], 150) }}</p>
                    </li>
                    @endforeach
                </ul>
                <div class="catg3_bottompost wow fadeInDown">
                    <ul class="catg3_snav">
                        @foreach ($category->posts->skip(1) as $post)
                        <li>
                            <div class="media">
                                <a class="media-left" href="{{ route('postDetail', $post->slug) }}">
                                    <img src="{{ asset('temp/img/' . $post->image) }}" alt="">
                                </a>
                                <div class="media-body">
                                    <a class="catg_title" href="{{ route('postDetail', $post->slug) }}">
                                        {{ $post['title_' . \App::getLocale()] }}
                                    </a>
                                    <div class="sing_commentbox">
                                        <p><i class="fa fa-calendar"></i>{{ $post->created_at->format('d M Y, H:i') }}</p>
                                        <a href="#"><i class="fa fa-eye"></i>{{ $post->views }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @elseif($index == 3)
    <div class="category_four wow fadeInDown">
        <div class="single_category">
            <div class="category_title"> <a href="#">{{ $category['category_' . \App::getLocale()] }}</a></div>
            <div class="single_category_inner">
                <ul class="catg_nav catg_nav3">

                    @foreach ($category->posts->take(1) as $post)
                    <li>
                        <div class="catgimg_container">
                            <a class="catg1_img" href="{{route('postDetail', $post->slug)}}">
                                <img src="{{ asset ('temp/img/' . $post->image)}}" alt="">
                            </a>
                        </div>
                        <a class="catg_title" href="{{route('postDetail', $post->slug)}}">{{$post['title_' . \App::getLocale()]}}</a>
                        <div class="sing_commentbox">
                            <p><i class="fa fa-calendar"></i>{{ $post->created_at->format('d M Y, H:i') }}</p>
                            <a href="#"><i class="fa fa-eye"></i>{{$post->views}}</a>
                        </div>
                        <p class="post-summary"></p>
                    </li>
                    @endforeach

                </ul>
                <div class="catg3_bottompost wow fadeInDown">
                    <ul class="catg3_snav">
                        @foreach ($category->posts->skip(1) as $post)
                        <li>
                            <div class="media">
                                <a class="media-left" href="{{ route('postDetail', $post->slug) }}">
                                    <img src="{{ asset('temp/img/' . $post->image) }}" alt="">
                                </a>
                                <div class="media-body">
                                    <a class="catg_title" href="{{ route('postDetail', $post->slug) }}">
                                        {{ $post['title_' . \App::getLocale()] }}
                                    </a>
                                    <div class="sing_commentbox">
                                        <p><i class="fa fa-calendar"></i>{{ $post->created_at->format('d M Y, H:i') }}</p>
                                        <a href="#"><i class="fa fa-eye"></i>{{ $post->views }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif ($index == 4)
<div class="single_category wow fadeInDown">
    <div class="category_title"> <a href="#">{{ $category['category_' . \App::getLocale()] }}</a></div>
    <div class="single_category_inner">
        <ul class="catg3_snav catg5_nav">
            @foreach ($category->posts as $post)
            <li>
                <div class="media">
                    <a href="{{route('postDetail', $post->slug)}}" class="media-left">
                        <img alt="" src="{{asset('temp/img/'. $post->image)}}">
                    </a>
                    <div class="media-body">
                        <a href="{{route('postDetail', $post->slug)}}" class="catg_title">{{$post['title_' . \App::getLocale()]}}</a>
                        <div class="sing_commentbox">
                            <p><i class="fa fa-calendar"></i>{{ $post->created_at->format('d M Y, H:i') }}</p>
                            <a href="#"><i class="fa fa-eye"></i>{{$post->views}}</a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endif
@endforeach