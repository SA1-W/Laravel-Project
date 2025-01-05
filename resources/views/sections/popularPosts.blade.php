<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="row">
        <div class="right_bar">
            <div class="single_leftbar wow fadeInDown">
                <h2><span>@lang('words.popular')</span></h2>
                <div class="singleleft_inner">
                    <ul class="catg3_snav ppost_nav wow fadeInDown">
                        @foreach($popularPosts as $post)
                        <li>
                            <div class="media">
                                <a href="{{ route('postDetail', $post->slug) }}" class="media-left">
                                    <img alt="" src="{{ asset('temp/img/' . $post->image) }}">
                                </a>
                                <div class="media-body">
                                    <a href="{{ route('postDetail', $post->slug) }}" class="catg_title">
                                        {{ $post['title_' . \App::getLocale()] }}
                                    </a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @foreach ($ads as $ad)
            <div class="single_leftbar wow fadeInDown">
                <h2><span>@lang('words.ads')</span></h2>
                <div class="singleleft_inner">
                    <a href="{{ $ad->url_1 }}">
                        <img alt="" src="{{ asset('temp/ad/' . $ad->image_1) }}">
                    </a>
                </div>
            </div>
            @endforeach

            <div class="single_leftbar wow fadeInDown">
                <ul class="nav nav-tabs custom-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('words.popular')</a>
                    </li>
                    <li role="presentation">
                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">@lang('words.recent')</a>
                    </li>
                    <li role="presentation">
                        <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">@lang('words.ads')</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <ul class="catg3_snav ppost_nav wow fadeInDown">
                            @foreach($rightPopularPosts as $post)
                            <li>
                                <div class="media">
                                    <a class="media-left" href="{{ route('postDetail', $post->slug) }}">
                                        <img src="{{ asset('temp/img/' . $post->image) }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a class="catg_title" href="{{ route('postDetail', $post->slug) }}">
                                            {{ $post['title_' . \App::getLocale()] }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="profile">
                        <ul class="catg3_snav ppost_nav wow fadeInDown">
                            @foreach($rightRecentPosts as $post)
                            <li>
                                <div class="media">
                                    <a class="media-left" href="{{ route('postDetail', $post->slug) }}">
                                        <img src="{{ asset('temp/img/' . $post->image) }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a class="catg_title" href="{{ route('postDetail', $post->slug) }}">
                                            {{ $post['title_' . \App::getLocale()] }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="messages">
                        <ul class="catg3_snav ppost_nav wow fadeInDown">
                            @foreach($rightAds_posts as $post)
                            <li>
                                <div class="media">
                                    <a class="media-left" href="{{ route('postDetail', $post->slug) }}">
                                        <img src="{{ asset('temp/img/' . $post->image) }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a class="catg_title" href="{{ route('postDetail', $post->slug) }}">
                                            {{ $post['title_' . \App::getLocale()] }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="single_leftbar wow fadeInDown">
                <h2><span>@lang('words.tag')</span></h2>
                <div class="singleleft_inner">
                    <ul class="label_nav">
                        @foreach($tags as $tag)
                        <li><a href="{{ route('tagPosts', $tag->slug) }}">{{ $tag['tag_' . \App::getLocale()] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>