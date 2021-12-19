@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="ui grid container-fluid mar-con">
    <div class="row">
        <div class="ui column">
            <div class="typo-header-sq">
                <h2>{{$category['lang']->where('lang_id',$lang_id)->first()->name}}</h2>
            </div>
            <div class="ui grid">
                @foreach($villas as $villa)
                        <?php //dd($villa['lang']['title']);
                        $title = $villa['lang']['title'] ?? "bulunamadı";
                        $slug  = $villa['lang']['slug'] ?? "bulunamadı";
                        $sub  = $villa['lang']['sub'] ?? 0;
                        ?>
                    <div class="twelve wide mobile four wide tablet four wide computer column">
                        <div class="property-item">
                            <div class="property-item-inner">
                                @if($sub!=0)
                                    <div class="price-tag-sq">{{$sub}}</div>
                                @endif
                                <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                    <i class="icon icon-add-wishlist"></i>
                                </a>


                                <a class="image-sq"
                                   href="{{url('villa-detail/'.$slug.'')}}">
                                            <span class="image-wrapper">
                                                <span class="image-inner">
                                                    <img src="{{Storage::url($villa['villa']->image)}}" alt="" class="">
                                                </span>
                                            </span>
                                </a>

                                <div class="main-details">
                                    <div class="icons-row">
                                        <div class="icons-column">
                                            <i class="icon icon-heart"></i> 7.8
                                        </div>
                                        <div class="icons-column">
                                            <i class="icon icon-account-group-5"></i>
                                            x {{$villa['villa']->capacity}} Kişi
                                        </div>
                                        <div class="icons-column">
                                            <i class="icon icon-door-simple"></i> x {{$villa['villa']->rooms}}
                                            Oda
                                        </div>
                                        <div class="icons-column">
                                            <i class="icon icon-bed-double"></i> x
                                            2 {{$villa['villa']->capacity}}
                                        </div>
                                    </div>

                                </div>

                                <div class="property-name">
                                    <div class="title-row">
                                        <a href="{{url('villa-detail/'.$slug.'')}}"
                                           class="title-sq"
                                           alt="{{$title}}">{{$title}}</a>
                                        <a href="{{url('villa-detail/'.$slug.'')}}"
                                           alt="{{$title}}"
                                           class="button-sq-top">
                                            Hemen İncele
                                        </a>
                                    </div>
                                </div>
                                <div class="property-fl">
                                    <p><i class="icon icon-pin2"></i> {{@$villa['destination']}}
                                    </p>
                                    <p><span>Fiyat: {{@$villa['price']}} <i> indirim {{@$villa['discount']}}</i></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
