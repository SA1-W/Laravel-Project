@extends('layout.master')



@section('content')
<section id="contentbody">
    <div class="row">
        @include('sections.recentPosts')
        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
            <div class="row">
                <div class="middle_bar">
                    <div class="single_post_area">
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-home"></i>@lang('words.home')<i class="fa fa-angle-right"></i></a></li>
                            <li><a href="#">@lang('words.category')<i class="fa fa-angle-right"></i></a></li>
                            <li><a href="#">{{$category['category_' . \App::getLocale()]}}<i class="fa fa-angle-right"></i></a></li>
                        </ol>
                        <h2 class="post_title wow ">{{$post['title_' . \App::getLocale()]}} </h2>
                        @foreach ($users as $user)
                        <a href="#" class="author_name"><i class="fa fa-user"></i>{{$user->name}}</a> <a href="#" class="post_date"><i class="fa fa-clock-o"></i>{{ $post->created_at->format('d M Y, H:i') }}</a>
                        @endforeach
                        <div class="single_post_content">
                            <p>{!!$post['body_' . \App::getLocale()]!!}</p>

                        </div>

                        <div class="social_area wow fadeInLeft">
                            <ul>
                                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                            </ul>
                        </div>
                        <div class="related_post">
                            <h2 class="wow fadeInLeftBig">@lang('words.related') <i class="fa fa-thumbs-o-up"></i></h2>
                            <ul class="recentpost_nav relatedpost_nav wow fadeInDown animated">

                                @foreach ($relatedPosts as $post)
                                <li><a href="{{route('postDetail', $post->slug)}}"><img alt="" src="{{ asset ('temp/img/'. $post->image)}}"></a> <a href="{{route ('postDetail', $post->slug)}}" class="recent_title"> {{$post['title_' . \App::getLocale()]}}</a></li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('sections.popularPosts')
    </div>
</section>
@endsection