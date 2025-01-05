<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
    <div class="row">
        <div class="left_bar">
            <div class="single_leftbar">
                <h2><span>@lang('words.recent')</span></h2>
                <div class="singleleft_inner">
                    <ul class="recentpost_nav wow fadeInDown">

                        @foreach ($recentPosts as $post)

                        <li><a href="{{ route('postDetail', $post->slug)}}"><img src="{{ asset('temp/img/' . $post->image)}}" alt=""></a> <a class="recent_title" href="{{ route('postDetail', $post->slug)}}"> {{$post['title_' . \App::getLocale()]}}</a></li>

                        @endforeach


                    </ul>
                </div>
            </div>

            @foreach ($ads as $ad)


            <div class="single_leftbar wow fadeInDown">
                <h2><span>@lang('words.ads')</span></h2>
                <div class="singleleft_inner"> <a href="{{$ad->url_2}}"><img src="{{ asset ('temp/ad/' . $ad->image_2)}}" alt=""></a></div>
            </div>

            @endforeach
        </div>
    </div>
</div>