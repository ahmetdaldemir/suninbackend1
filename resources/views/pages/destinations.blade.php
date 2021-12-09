@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
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
                                            <h2>Bölgeler</h2>
                                        </div>
                                        <div class="magic-grid article-sq hover-scale">
                                            <!-- item-->
                                            @foreach($destinations as $result)
                                                <div class="item">
                                                    <div class="item-inner">
                                                        <a class="image-sq" href="{{url('destination-detail/'.@$result['lang']->where('lang_id',$lang_id)->first()->slug)}}">
                                                        <span class="image-wrapper">
                                                            <span class="image-inner">
                                                                <img class="image-sq" src="{{Storage::url(@$result['destination']->image)}}" alt="">
                                                            </span>
                                                        </span>
                                                        </a>

                                                        <!-- typography container-->
                                                        <div class="typo-sq">
                                                            <p class="typo-label-sq" data-label-before="Blog" data-label-after="Book a home in"></p>
                                                            <p class="typo-title-sq">{{@$result['lang']->where('lang_id',$lang_id)->first()->name}}</p>
                                                            <p class="typo-desc-sq">{{@$result['lang']->where('lang_id',$lang_id)->first()->name}}</p>

                                                            <a href="{{url('destination-detail/'.@$result['lang']->where('lang_id',$lang_id)->first()->slug)}}" class="read-more-sq">Devamı.. <i class="icon icon-arrow-right-122"></i></a>
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
