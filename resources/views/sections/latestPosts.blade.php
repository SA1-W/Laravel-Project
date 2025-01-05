<div class="featured_sliderarea">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($latestPosts as $index => $post)
            <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($latestPosts as $index => $post)
            <div class="item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset('temp/img/'.$post->image) }}" alt="">
                <div class="carousel-caption">
                    <h1><a href="{{ route('postDetail', $post->slug)}}">{{ $post['title_' . \App::getLocale()] }}</a></h1>
                </div>
            </div>
            @endforeach
        </div>
        <a class="left left_slide" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="right right_slide" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
</div>