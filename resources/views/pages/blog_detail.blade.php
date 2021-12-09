@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')


    <div class="ui layout">
        <!-- grid -->
        <div class="ui grid container centered">
            <div class="row">
                <div class="ui twelve wide tablet ten wide computer eight wide widescreen eight wide large screen column">
                    <article class="post type-post format-standard hentry article-sq">
                        <div class="entry-content article-content-sq">
                            <div class="article-featured-image-sq">
                                <img  src="{{Storage::url($blog['blog']->image)}}" alt="{{$blog['lang']->where('language_id',$lang_id)->first()->title}}">
                            </div>
                            <h2>{{$blog['lang']->where('language_id',$lang_id)->first()->title}}</h2>
                            {!! $blog['lang']->where('language_id',$lang_id)->first()->description !!}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
