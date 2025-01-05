@extends('layout.master')


@section('content')

@include('sections.mainPosts')

<section id="contentbody">
    <div class="row">

        @include('sections.recentPosts')

        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
            <div class="row">
                <div class="middle_bar">

                    @include('sections.latestPosts')

                    @include('sections.categoryPosts')


                </div>
            </div>
        </div>

        @include('sections.popularPosts')

    </div>
</section>
@endsection