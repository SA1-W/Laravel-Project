<div class="thumbnail_slider_area">
    <div class="owl-carousel">

        @foreach($ads_posts as $ads_post)
        <div class="signle_iteam"> <img src="{{ asset ('temp/img/' . $ads_post->image)}}" alt="">
            <div class="sing_commentbox slider_comntbox">
                <p><i class="fa fa-calendar"></i>{{$ads_post->created_at}}</p>
                <a href="#"><i class="fa fa-eye"></i>{{$ads_post->views}}</a>
            </div>
            <a class="slider_tittle" href="{{ route('postDetail' , $ads_post->slug)}}">{{$ads_post['title_' . \App::getLocale()]}}</a>
        </div>
        @endforeach
    </div>
</div>