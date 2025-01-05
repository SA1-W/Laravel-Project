@extends('layout.master')

@section('content')
<section id="contentbody">
    <div class="row">
        @include('sections.recentPosts')
        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
            <div class="row">
                <div class="wrapper" style="margin: 20px 0;"></div>
                <div class="middle_bar">
                    <div class="category_archive_area">
                        @if($noResults)
                        <div class="alert alert-warning" role="alert">
                            @lang('words.no_results_found')
                        </div>
                        @else
                        @foreach($posts as $post)
                        <div class="single_archive wow fadeInDown">
                            <a href="{{ route('postDetail', $post->slug) }}">
                                <img src="{{ asset('temp/img/' . $post->image) }}" alt="{{ $post['title_' . \App::getLocale()] }}">
                            </a>
                            <a href="{{ route('postDetail', $post->slug) }}" class="read_more">
                                @lang('words.read') <i class="fa fa-angle-double-right"></i>
                            </a>
                            <div class="singlearcive_article">
                                <h2>
                                    <a href="{{ route('postDetail', $post->slug) }}">
                                        {{ $post['title_' . \App::getLocale()] }}
                                    </a>
                                </h2>
                                <a class="author_name" href="#"><i class="fa fa-user"></i> </a>
                                <a class="post_date">
                                    <i class="fa fa-clock-o"></i>
                                    {{ $post->created_at->format('l, F d, Y') }}
                                </a>
                                <a class="author_name">
                                    <i class="fa-solid fa-eye"></i> Views: {{ $post->views }}
                                </a>
                                <p>{!! Str::limit($post['body_' . \App::getLocale()], 150) !!}</p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('sections.popularPosts')
    </div>
</section>
@endsection