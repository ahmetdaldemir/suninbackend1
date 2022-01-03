@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<?php //dd($blogs)?>

    <div class="ui layout">
    <div class="ui grid container">
        <div class="row">

            <div class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                <div class="ui grid">
                    <div class="row">

                        <div class="ui twelve wide computer column">
                            <div class="ui grid">
                                <div class="row">

                                    <div class="ui twelve wide computer column">
                                        <div class="typo-header-sq">
                                            <h2>Bloglar</h2>
                                        </div>

                                        <div class="magic-grid article-sq hover-scale">
                                            @foreach($blogs as $blog)
                                                <div class="item">
                                                        <div class="item-inner">
                                                            <a class="image-sq" href="{{url('blog-detail/'.$blog['lang']->where('language_id',$lang_id)->first()->slug)}}">
                                                        <span class="image-wrapper">
                                                            <span class="image-inner">
                                                                <img class="image-sq" src="{{Storage::url($blog['blog']->image)}}" alt="">
                                                            </span>
                                                        </span>
                                                            </a>
                                                            <div class="typo-sq">
                                                                <p class="typo-title-sq">{{@$blog['lang']->where('language_id',$lang_id)->first()->title}}</p>
                                                                <a href="{{url('blog-detail/'.@$blog['lang']->where('language_id',$lang_id)->first()->slug)}}" class="read-more-sq">Devamı.. <i class="icon icon-arrow-right-122"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">

                                        <ul class="list-default-sq pagination-simple-sq right-sq">
                                            <li class="active"><a href="">1</a></li>
                                            <li><a href="">2</a></li>
                                            <li><a href="">3</a></li>
                                        </ul>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
