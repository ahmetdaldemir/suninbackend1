@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <!-- login page start-->
    <div class="hero-search-full-page next-sq" style="margin-top: 10px;">
        <!-- Hero Search -->
        <!-- .thin .animate .shadow .colored -->
        <div class="h-search-h thin-sq  animate-sq colored-sq h-search-top">
            <form action="{{route('listing')}}" class="hero-search-form">
                <div class="search-item">
                    <div class="fltp">
                        <select name="category" size="13" class="dropdown" required >
                            <option value="0" selected>Kategoriler</option>
                            @foreach($categories as $category)
                            <option value="{{$category['id']}}">{{$category['lang']->where('lang_id',$lang_id)->first()->name}}</option>
                            @endforeach
                        </select>
                        <label class="placeholder">Kategori Seçiniz</label>
                    </div>
                </div>
                <div class="search-item">
                    <div class="fltp calendar-sq" id="rangestart">
                        <input name="checkin" type="text" class="filter" autocomplete="off" value="" required placeholder="enter date">
                        <label class="placeholder" data-big-placeholder="Giriş Tarihi"
                               data-little-placeholder="Giriş"></label>
                    </div>

                    <i class="icon icon-little-arrow"></i>

                    <div class="fltp calendar-sq" id="rangeend">
                        <input name="checkout" type="text" class="filter" autocomplete="off" value="" required placeholder="enter date">
                        <label class="placeholder" data-big-placeholder="Çıkış Tarihi"
                               data-little-placeholder="Çıkış"></label>
                    </div>
                </div>
                <div class="search-item">
                    <div class="fltp">
                        <select name="adult" size="13" class="dropdown" required>
                            <option value="0" selected>Kişi Sayısı</option>
                            <option value="1">1</option>
                            <option value="2" selected>2</option>
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
                <div class="search-item">
                    <button class="button-sq hero-search-button">
                        <i class="icon icon-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <!-- Hero Big - Slick -->
        <div class="sq-slick hero-big slide-up-sq" data-mobile-arrows="false" data-tablet-arrows="false"
             data-mobile-dots="true" data-tablet-dots="true" data-fade="true" data-speed="500" data-ease="linear">
            <!-- .slide-up .fade .top .bottom -->
            @foreach($sliders as $slider)
                <div class="">
                    @if($slider['lang'] != NULL)
                    <div class="caption-content" style="margin-top: 150px;">
                        <h1 class="font-weight-extrabold-sq">{{$slider['lang']->where('language_id',$lang_id)->first()->title ?? NULL}}</h1>
                    </div>
                    @endif
                    <div class="caption-outside">
                        <a class="button anchor-sq" href="#top">
                            <i class="icon big icon-compass"></i>
                            <span>Devam</span>
                        </a>
                    </div>

                    <div class="image-wrapper">
                        <div class="image-inner">
                            <img class="image-sq" src="{{Storage::url($slider['slider']->image)}}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="ui grid container-fluid mar-con">
        <div class="row">
            <div class="ui column">

                <div class="typo-section-sq bottom-big">
                    <div class="typo-section-header-sq">
                        <h2 class="text-align-center-sq">Fırsat Villalar</h2>
                        <p class="text-align-center-sq">Hemen rezervasyon yaptırın inirimlerden sizde faydalanın...</p>
                    </div>

                    <div class="ui grid ">
                        <div class="v-ic container-fluid">
                            @foreach($categories as $category)
                                    <?php //dd($category)?>
                                    <div class="v-icon"><a href="{{url('category-detail/'.$category['lang']->where('lang_id',$lang_id)->first()->slug)}}">
                                            <img src="{{Storage::url($category['category']->image)}}" class="img"
                                                 alt="{{$category['lang']->where('lang_id',$lang_id)->first()->name}}">
                                            <p>{{$category['lang']->where('lang_id',$lang_id)->first()->name}}</p></a>
                                    </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="ui grid">
                        <?php $i=0?>
                        @foreach($villas as $villa)
                            @if(isset($villa['lang']))
                             <?php
                                 $title = $villa['lang']->where('lang_id',$lang_id)->first()->title ?? "bulunamadı";
                                 $slug  = $villa['lang']->where('lang_id',$lang_id)->first()->slug ?? "bulunamadı";
                                 $sub  = $villa['lang']->where('lang_id',$lang_id)->first()->sub ?? 0;
                                ?>
                            @endif

                            <div class="twelve wide mobile four wide tablet four wide computer column">
                                <div class="property-item">
                                    <div class="property-item-inner">
                                        @if($sub!=null)
                                        <div class="price-tag-sq">{{$sub}}</div>
                                        @endif
                                        <a class="add-wishlist wishlist_{{$i}} modal-ui-trigger" onclick="favorite('{{$villa['id']}}','{{$auth_id}}','.wishlist_{{$i}}')" data-trigger-for="wishlist">
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
                                                <div class="icons-column" onclick="like('{{$villa['id']}}','{{$auth_id}}','.like_{{$i}}')">
                                                    <i class="icon icon-heart"></i> 0
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
                                            <p><i class="icon icon-pin2"></i> {{@$villa['destination']}}</p>
                                            @if(@$villa['price'])
                                                @if(@$villa['discount']>0)
                                                    @if(@$villa['discount_type']=='static')
                                                    <p><i style="text-decoration:line-through;color:red;">{{$villa['price']}} {{@$villa['symbol']}}</i><span style="font-size: 21px;">{{$villa['price']-$villa['discount']}} {{@$villa['symbol']}}</span></p>
                                                    @else
                                                        <?php
                                                        $price = $villa['price']-($villa['price']*$villa['discount']/100);
                                                        ?>
                                                    <p><i style="text-decoration:line-through;color:red;">{{$villa['price']}} {{@$villa['symbol']}}</i><span style="font-size: 21px;">{{@$price}} {{@$villa['symbol']}}</span></p>
                                                    @endif
                                                @else
                                                <p><span style="font-size: 21px;">{{@$villa['price']}}</span></p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++?>
                        @endforeach
                    </div>

                    <a href="{{route('all_villa')}}" class="more-trigger" data-more="Tümünü Görüntüle">
                        <i class="icon icon-arrow-down-122"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="promo-section">

        <!-- content -->
        <div class="ui container grid centered">
            <div class="row">
                <div class="ui twelve wide mobile ten wide tablet eight wide computer six wide large screen six wide widescreen column">
                    <div class="promo-content style-01">
                        <h2>Villanızı Kiraya Verin</h2>
                        <p>Spectacular natural wonders and astonishing man-made structures. The list of great landmarks
                            are often limited to seven, but the world is filled with wonders.</p>

                        <a href="{{route('listing')}}" class="button-sq "> Hemen Kirala </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- picture -->
        <div class="image-wrapper">
            <div class="image-inner">
                <img class="image-sq" src="{{asset('view/images/promo_section/33.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <div class="ui layout" id="top">
        <div class="ui grid container-fluid" style="margin: 50px;">
            <div class="row">
                <div class="ui twelve wide computer column">
                    <div class="typo-section-sq bottom-big">

                        <div class="typo-section-header-sq">
                            <h2 class="text-align-center-sq">Populer Villa Kiralama Bölgeleri</h2>
                            <p class="text-align-center-sq">Sizler için bölgelerin en güzel villalarını bir araya getirdilk</p>
                        </div>

                        <div class="magic-grid photo-sq hover-default hover-center">
                            @foreach ($destinations as $destination)
                                <div class="item">
                                    <div class="item-inner">
                                        <div class="image-sq">
                                            <div class="image-wrapper">
                                                <div class="image-inner">
                                                    <img class="image-sq"
                                                         src="{{Storage::url($destination['destination']->image)}}"
                                                         alt="{{@$destination['lang']->where('lang_id',$lang_id)->first()->title}}">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{url('destination-detail/'.@$destination['lang']->where('lang_id',$lang_id)->first()->slug.'')}}"
                                           class="typo-sq">
                                            <span class="typo-whitespace"></span>
                                            <p class="typo-label-sq"
                                               data-label-before="{{@$destination['lang']->where('lang_id',$lang_id)->first()->title}}"
                                               data-label-after="{{@$destination['lang']->where('lang_id',$lang_id)->first()->title}}"></p>
                                            <p class="typo-title-sq">{{@$destination['lang']->where('lang_id',$lang_id)->first()->title}}</p>
                                        </a>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a class="more-trigger" data-more="Hepsini Görüntüle" href="{{route('destinations')}}">
                            <i class="icon icon-arrow-down-122"></i>
                        </a>
                    </div>

                </div>


            </div>
        </div>


        <div class="promo-section">

            <!-- content -->
            <div class="ui container grid centered">
                <div class="row">
                    <div class="ui twelve wide mobile ten wide tablet eight wide computer six wide large screen six wide widescreen column">
                        <div class="promo-content style-02">
                            <h2>Villanızı Kiraya Verin</h2>
                            <p>Villanızın bilgilerini bizimle paylaşın, Villanızı portföyümüze ekleyelim ve
                                kiralayalım. </p>

                            <a href="{{route('listing')}}" class="button-sq see-through-sq"> Detaylı Bilgi </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- picture -->
            <div class="image-wrapper">
                <div class="image-inner">
                    <img class="image-sq" src="{{asset('view/images/promo_section/22.jpg')}}" alt="">
                </div>
            </div>
        </div>

        <div class="ui grid container">
            <div class="row">
                <div class="ui column">
                    <div class="typo-section-sq bottom-big">

                        <div class="typo-section-header-sq">
                            <h2 class="text-align-center-sq">Villa Tipleri</h2>
                            <p class="text-align-center-sq">Villalarımızı sizler için tipine göre özenle ayırdık. İstediğiniz villayı tip seçimi yaparak bulabilirsiniz.</p>
                        </div>

                        <div class="magic-grid category-sq special-sq hover-scale">
                            <div class="item">
                                <div class="item-inner">
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_category_special_01.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="article_listing.html" class="typo-sq">
                                        <p class="typo-title-sq">Deniz Manzaralı</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="typo-section-sq bottom-big">
                        <div class="typo-section-header-sq">
                            <h2 class="text-align-center-sq">Blog</h2>
                            <p class="text-align-center-sq"> Nunc sit amet velit nibh. Proin consectetur, ante quis
                                tristique mattis, massa massa condimentum enim.</p>
                        </div>


                        <div class="magic-grid article-sq hover-scale">


                            @foreach($blogs as $blog)
                                <div class="item">
                                    <div class="item-inner">
                                        <a class="image-sq" href="{{url('blog-detail/'.@$blog['lang']->where('language_id',$lang_id)->first()->slug.'')}}">
                    	                <span class="image-wrapper">
                    	                    <span class="image-inner">
                    	                        <img class="image-sq"
                                                     src="{{Storage::url($blog['blog']->image)}}"
                                                     alt="{{$blog['lang']->where('language_id',$lang_id)->first()->title}}">
                    	                    </span>
                    	                </span>
                                        </a>

                                        <div class="typo-sq">
                                            <p class="typo-title-sq">{{$blog['lang']->where('language_id',$lang_id)->first()->title}}</p>
                                            <a href="{{url('blog-detail/'.@$blog['lang']->where('language_id',$lang_id)->first()->slug.'')}}" class="read-more-sq">Devamını Oku... <i  class="icon icon-arrow-right-122"></i></a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach


                        </div>

                        <a href="article_listing.html" class="more-trigger" data-more="View More">
                            <i class="icon icon-arrow-down-122"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- Modals -->
    <!-- Sign Up -->
    <div class="ui full modal" data-for="modal01">
        <div class="modal-full-background">
            <img src="{{asset('view/images/modal/modal_background_001.jpg')}}" alt="">
        </div>

        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            Sign Up Now
        </div>

        <div class="content">
            <a href="" class="button-sq fullwidth-sq modal-ui-trigger" data-trigger-for="modal03">
                <i class="icon icon-email-2"></i>
                <span>Sign Up with Email</span>
            </a>

            <a href="" class="button-sq fullwidth-sq facebook-button">
                <i class="icon icon-logo-facebook2"></i>
                <span>Sign Up with Facebook</span>
            </a>

            <a href="" class="button-sq fullwidth-sq google-button">
                <img src="{{asset('view/images/icon-google-plus.svg')}}" alt="">
                <span>Sign Up with Google</span>
            </a>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in
                pharetra justo pulvinar. </p>
        </div>

        <div class="actions">
            <div class="border-container">
                <div class="button-sq link-sq modal-ui-trigger" data-trigger-for="modal02">Already a member?</div>

                <div class="button-sq link-sq login-sq modal-ui-trigger" data-trigger-for="modal02">
                    Log In
                    <i class="icon icon-person-lock-2"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Log In -->
    <div class="ui full modal" data-for="modal02">
        <div class="modal-full-background">
            <img src="{{asset('view/images/modal/modal_background_001.jpg')}}" alt="">
        </div>

        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            Üye Girişi
        </div>

        <div class="content">
            <div class="div-c">
                <div class="divided-column">
                    <input type="text" placeholder="E-mail Adress">
                </div>
                <div class="divided-column">
                    <input type="text" placeholder="Password">
                </div>
            </div>

            <div class="button-sq fullwidth-sq">Üye Girişi</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in
                pharetra justo pulvinar. </p>
        </div>

        <div class="actions">
            <div class="border-container">
                <div class="button-sq link-sq modal-ui-trigger" data-trigger-for="modal01">Don’t have an account?</div>

                <div class="button-sq link-sq login-sq modal-ui-trigger" data-trigger-for="modal01">
                    Üye Ol
                    <i class="icon icon-person-add-1"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up with mail -->
    <div class="ui full modal" data-for="modal03">
        <div class="modal-full-background">
            <img src="{{asset('view/images/modal/modal_background_001.jpg')}}" alt="">
        </div>

        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            Hemen Üye Ol
        </div>

        <div class="content">

            <div class="div-c inline-2">
                <div class="divided-column">
                    <input type="text" placeholder="First Name">
                </div>
                <div class="divided-column">
                    <input type="text" placeholder="Last Name">
                </div>
            </div>

            <div class="div-c">
                <div class="divided-column">
                    <input type="text" placeholder="E-mail Adress">
                </div>
                <div class="divided-column">
                    <input type="text" placeholder="Password">
                </div>
            </div>

            <div class="div-c inline-3 one-label">
                <label>Birthday</label>
                <div class="divided-column">
                    <select name="dropdown" class="dropdown">
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">...</option>
                    </select>
                </div>
                <div class="divided-column">
                    <select name="dropdown" class="dropdown">
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">...</option>
                    </select>
                </div>
                <div class="divided-column">
                    <select name="dropdown" class="dropdown">
                        <option value="1">1985</option>
                        <option value="2">1986</option>
                        <option value="3">1987</option>
                        <option value="4">1988</option>
                        <option value="5">1989</option>
                        <option value="6">...</option>
                    </select>
                </div>
            </div>

            <div class="button-sq fullwidth-sq">Sign Up</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in
                pharetra justo pulvinar. </p>

        </div>

        <div class="actions">
            <div class="border-container">
                <div class="button-sq link-sq"></div>

                <div class="button-sq link-sq login-sq modal-ui-trigger" data-trigger-for="modal01">
                    Üye Girişi
                    <i class="icon icon-person-lock-2"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist --/>
    <div class="ui modal small" data-for="wishlist">
        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            <h4>Favorilerim</h4>
        </div>

        <div class="content">
            <p>Mauris malesuada leo libero, vitae tempor ante sagittis vitae. Suspendisse consectetur facilisis
                enim.</p>
            <br>
            <input type="checkbox" id="c01">
            <label for="c01">Beautiful Places</label>
            <input type="checkbox" id="c02">
            <label for="c02">For Summer</label>
            <input type="checkbox" id="c03">
            <label for="c03">Dream Houses</label>
        </div>

        <div class="actions">
            <div class="div-c inline-2">
                <div class="divided-column">
                    <div class="button-sq cancel-sq fullwidth-sq">İptal</div>
                </div>

                <div class="divided-column">
                    <div class="button-sq fullwidth-sq">Ekle</div>
                </div>
            </div>
        </div>

    </div>-->
@endsection

@section('javascript')
<script>
function favorite(w,c,i){
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
    if(w == null || c == ''){
        alert("Beğeni ve Favorilere Ekleme yapmak için Lütfen Kullanıcı Girişi yapınız!")
    }else{
        $.ajax({
            type: "POST",
            url: "account/fav",
            data:'w='+w+'&c='+c,
            success: function(data){
                if(data.confirm==1){
                    $(i).html('<i class="icon icon-check-22"></i>');
                }else{
                    $(i).html('<i class="icon icon-add-wishlist"></i>');
                }
            }
        });
    }
}
function like(w,c,i){
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
    if(w == null || c == ''){
        alert("Beğeni ve Favorilere Ekleme yapmak için Lütfen Kullanıcı Girişi yapınız!")
    }else{
        $.ajax({
            type: "POST",
            url: "account/like",
            data:'w='+w+'&c='+c,
            success: function(data){
                if(data.confirm==1){
                    $(i).html('<i class="icon icon-heart"></i> '+ data.count);
                }
            }
        });
    }
}
/**/
</script>
@endsection
