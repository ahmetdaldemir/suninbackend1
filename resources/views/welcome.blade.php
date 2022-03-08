@extends('view_layout')
@section('title', 'Sahil Villam')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="hero-search-full-page next-sq" style="margin-top: 10px;">
        <div class="h-search-h thin-sq  animate-sq colored-sq h-search-top">
            <form action="listing_page.html" class="hero-search-form">
                <div class="search-item">
                    <div class="fltp">
                        <select name="dropdown" size="13" class="dropdown" required>
                            <option value="0" selected>Villa Türü</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">
                                    {{ $category['lang']->where('lang_id', $lang_id)->first()->name }}</option>
                            @endforeach
                        </select>
                        <label class="placeholder">Villa Türü</label>
                    </div>
                </div>
                <div class="search-item">
                    <div class="fltp calendar-sq" id="rangestart">
                        <input type="text" class="filter" value="" required placeholder="enter date">
                        <label class="placeholder" data-big-placeholder="Giriş Tarihi"
                            data-little-placeholder="Giriş"></label>
                    </div>
                    <i class="icon icon-little-arrow"></i>
                    <div class="fltp calendar-sq" id="rangeend">
                        <input type="text" class="filter" value="" required placeholder="enter date">
                        <label class="placeholder" data-big-placeholder="Çıkış Tarihi"
                            data-little-placeholder="Çıkış"></label>
                    </div>
                </div>
                <div class="search-item">
                    <div class="fltp">
                        <select name="dropdown" size="13" class="dropdown" required>
                            <option value="0" selected>Kişi Sayısı</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="5">6</option>
                            <option value="5">7</option>
                            <option value="5">8</option>
                            <option value="5">9</option>
                            <option value="5">10</option>
                            <option value="5">11</option>
                            <option value="5">12</option>
                        </select>
                        <label class="placeholder">Kişi Sayısı</label>
                    </div>
                </div>
                <div class="search-item btn-padding-none">
                    <button class="button-sq hero-search-button">
                        <i class="icon icon-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="menu-gizle-mobil  sq-slick hero-big slide-up-sq" data-mobile-arrows="false" data-tablet-arrows="false"
            data-mobile-dots="true" data-tablet-dots="true" data-fade="true" data-speed="500" data-ease="linear">
            @foreach($sliders as $slider)
            <div class="">
                @if($slider['lang'] != NULL)
                <div class="caption-content" style="margin-top: 150px;">
                    <h1 class="font-weight-extrabold-sq">{{$slider['lang']->where('language_id',$lang_id)->first()->title ?? NULL}}</h1>
                </div>
                @endif
                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="image-sq" src="{{Storage::url($slider['category']->image)}}" alt="">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container-xl">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-xl-2  col-md-4 col-6">
                <div class="v-icon">
                    <a href="{{url('category/'.$category['lang']->where('lang_id',$lang_id)->first()->slug)}}">
                        <img src="{{Storage::url($category['category']->image)}}" 
                            alt="{{$category['lang']->where('lang_id',$lang_id)->first()->name}}"
                            class="img" />
                        <p>{{$category['lang']->where('lang_id',$lang_id)->first()->name}}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="typo-section-header-sq">
            <h2 class="text-align-center-sq m-tb-20">Sizin İçin Seçtiklerimiz</h2>
        </div>
        <div class="row">
            @foreach($villas as $villa)
                @if(isset($villa['lang']))
                <?php
                    $title = $villa['lang']->where('lang_id',$lang_id)->first()->title ?? "bulunamadı";
                    $slug  = $villa['lang']->where('lang_id',$lang_id)->first()->slug ?? "bulunamadı";
                    $sub  = $villa['lang']->where('lang_id',$lang_id)->first()->sub ?? 0;
                ?>
                @endif
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="{{url('villa-detail/'.$slug.'')}}" class="cards">
                    <div class="imgs">
                        <img src="{{Storage::url($villa['villa']->image)}}" class="w-100" alt="{{$title}}">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">{{$title}}</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>{{@$villa['destination']}}</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>{{$villa['villa']->capacity}} Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>{{$villa['villa']->rooms}} Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>
                        <div class="fiyat">
                            {{$villa['price']}} <i class="fa-solid fa-turkish-lira-sign"></i>
                            <span>Haftalık</span>
                        </div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <a href="{{route('all_villa')}}" class="more-trigger" data-more="Tüm Villalar">
            <i class="icon icon-arrow-down-122"></i>
        </a>
    </div>

    <!-- todo: villa tablosundan koşullu çekilecek -->
    <div class="promo-section">
        <div class="container-xl centered">
            <div class="typo-section-header-sq ">
                <h2 class="text-align-center-sq mb-20">Kısa Süreli Villalar</h2>
            </div>
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="months ">
                        <div class="title ">Nisan</div>
                        <ul>
                            <li><a href="">3 Gece Villalar<span>5</span></a></li>
                            <li><a href="">4 Gece Villalar<span>5</span></a></li>
                            <li><a href="">5 Gece Villalar<span>5</span></a></li>
                            <li><a href="">6 Gece Villalar<span>5</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="months ">
                        <div class="title ">Mayıs</div>
                        <ul>
                            <li><a href="">3 Gece Villalar<span>5</span></a></li>
                            <li><a href="">4 Gece Villalar<span>5</span></a></li>
                            <li><a href="">5 Gece Villalar<span>5</span></a></li>
                            <li><a href="">6 Gece Villalar<span>5</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="months ">
                        <div class="title ">Haziran</div>
                        <ul>
                            <li><a href="">3 Gece Villalar<span>5</span></a></li>
                            <li><a href="">4 Gece Villalar<span>5</span></a></li>
                            <li><a href="">5 Gece Villalar<span>5</span></a></li>
                            <li><a href="">6 Gece Villalar<span>5</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="months ">
                        <div class="title ">Temmuz</div>
                        <ul>
                            <li><a href="">3 Gece Villalar<span>5</span></a></li>
                            <li><a href="">4 Gece Villalar<span>5</span></a></li>
                            <li><a href="">5 Gece Villalar<span>5</span></a></li>
                            <li><a href="">6 Gece Villalar<span>5</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="months ">
                        <div class="title ">Ağustos</div>
                        <ul>
                            <li><a href="">3 Gece Villalar<span>5</span></a></li>
                            <li><a href="">4 Gece Villalar<span>5</span></a></li>
                            <li><a href="">5 Gece Villalar<span>5</span></a></li>
                            <li><a href="">6 Gece Villalar<span>5</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="months ">
                        <div class="title ">Eylül</div>
                        <ul>
                            <li><a href="">3 Gece Villalar<span>5</span></a></li>
                            <li><a href="">4 Gece Villalar<span>5</span></a></li>
                            <li><a href="">5 Gece Villalar<span>5</span></a></li>
                            <li><a href="">6 Gece Villalar<span>5</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
       </div>
    </div>
    <!-- todo: villa tablosundan koşullu çekilecek -->

    <!-- BÖLGELER -->
    <div class="container-xl ">
        <div class="row">
            <div class="six wide computer column">
                <div class="typo-section-sq bottom-big">
                    <div class="typo-section-header-sq">
                        <h2 class="text-align-center-sq">Hizmet Verdiğimiz Bölgeler</h2>
                        <p class="text-align-center-sq">Akdeniz'in Harika Noktalarından Size Özel Tatil Villaları</p>.</p>
                    </div>
                    <div class="magic-grid photo-sq hover-default hover-center">
                    @for($i=0; $i < 4; $i++)
                    <div class="item">
                            <div class="item-inner">
                                <div class="image-sq">
                                    <div class="image-wrapper">
                                        <div class="image-inner">
                                            <img class="image-sq"
                                                src="{{ asset('view/images/property/fethiye.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <a href="listing_page.html" class="typo-sq">
                                    <span class="typo-whitespace"></span>
                                    <p class="typo-label-sq" data-label-before="Muğla" data-label-after="Tüm Villalar">
                                    </p>
                                    <p class="typo-title-sq">Fethiye</p>
                                </a>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function favorite(w, c, i) {
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content)
                                if (w == null || c == '') {
                                    alert("Beğeni ve Favorilere Ekleme yapmak için Lütfen Kullanıcı Girişi yapınız!")
                                } else {
                                    $.ajax({
                                        type: "POST",
                                        url: "account/fav",
                                        data: 'w=' + w + '&c=' + c,
                                        success: function(data) {
                                            if (data.confirm == 1) {
                                                $(i).html('<i class="icon icon-check-22"></i>');
                                            } else {
                                                $(i).html('<i class="icon icon-add-wishlist"></i>');
                                            }
                                        }
                                    });
                                }
                            }
                            function like(w, c, i) {
                                $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content)
                                                    if (w == null || c == '') {
                                                        alert(
                                                            "Beğeni ve Favorilere Ekleme yapmak için Lütfen Kullanıcı Girişi yapınız!")
                                                    } else {
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "account/like",
                                                            data: 'w=' + w + '&c=' + c,
                                                            success: function(data) {
                                                                if (data.confirm == 1) {
                                                                    $(i).html(
                                                                        '<i class="icon icon-heart"></i> ' +
                                                                        data.count);
                                                                }
                                                            }
                                                        });
                                                    }
                                                }
                                                /**/
    </script>
@endsection
