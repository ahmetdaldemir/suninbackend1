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
                        <input type="text" value="" required>
                        <label class="placeholder" data-big-placeholder="Bölge Seçiniz"
                               data-little-placeholder="Bölge"></label>
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
                    <div class="caption-content" style="margin-top: 150px;">
                        <h1 class="font-weight-extrabold-sq">{{$slider['lang']->where('language_id',$lang_id)->first()->title}}</h1>
                    </div>
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
                                @if($category['category']->is_view == 1)
                                    <div class="v-icon"><a href="">
                                            <img src="{{Storage::url($category['category']->image)}}" class="img"
                                                 alt="{{$category['lang']->where('lang_id',$lang_id)->first()->title}}">
                                            <p>{{$category['lang']->where('lang_id',$lang_id)->first()->title}}</p></a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="ui grid">

                        @foreach($villas as $villa)
                            <div class="twelve wide mobile four wide tablet four wide computer column">
                                <div class="property-item">
                                    <div class="property-item-inner">

                                        <div class="price-tag-sq">Jakuzi</div>
                                        <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                            <i class="icon icon-add-wishlist"></i>
                                        </a>


                                        <a class="image-sq" href="{{route('detail')}}">
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
                                                <a href="{{route('detail')}}"
                                                   class="title-sq">{{$villa['lang']->where('lang_id',$lang_id)->first()->title}}</a>
                                                <a href="{{route('detail')}}" class="button-sq-top">
                                                    Hemen İncele
                                                </a>
                                            </div>

                                        </div>
                                        <div class="property-fl">
                                            <p><i class="icon icon-pin2"></i> {{$villa['villa']->destination->title}}
                                            </p>
                                            <p><span> Haftalık Fiyat Aralığı : 1000 - 1500 TL</span></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{route('listing')}}" class="more-trigger" data-more="Tümünü Görüntüle">
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
                            <p class="text-align-center-sq">Discover awesome experiences around the world.</p>
                        </div>

                        <div class="magic-grid photo-sq hover-default hover-center">

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/fethiye.jpeg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="{{route('listing')}}" class="typo-sq">
                                        <span class="typo-whitespace"></span>
                                        <p class="typo-label-sq" data-label-before="Fethiye"
                                           data-label-after="Tüm Villalar"></p>
                                        <p class="typo-title-sq">Göcek</p>
                                    </a>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/kas.jpeg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="{{route('listing')}}" class="typo-sq">
                                        <span class="typo-whitespace"></span>
                                        <p class="typo-label-sq" data-label-before="Antalya"
                                           data-label-after="Tüm Villalar"></p>
                                        <p class="typo-title-sq">Kaş</p>
                                    </a>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/marmaris.jpeg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="{{route('listing')}}" class="typo-sq">
                                        <span class="typo-whitespace"></span>
                                        <p class="typo-label-sq" data-label-before="Muğla"
                                           data-label-after="Tüm Villalar"></p>
                                        <p class="typo-title-sq">Marmaris</p>
                                    </a>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/kemer.jpeg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="{{route('listing')}}" class="typo-sq">
                                        <span class="typo-whitespace"></span>
                                        <p class="typo-label-sq" data-label-before="Antalya"
                                           data-label-after="Tüm Villalar"></p>
                                        <p class="typo-title-sq">Kemer</p>
                                    </a>

                                </div>
                            </div>

                        </div>

                        <a class="more-trigger" data-more="Hepsini Görüntüle" href="{{route('listing')}}">
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
                            <p class="text-align-center-sq">In hac habitasse platea dictumst. Integer quis tortor enim.
                                Integer et elit nec magna ultricies convallis. <br> In venenatis eu erat et facilisis.
                                Vestibulum congue enim nisl.</p>
                        </div>

                        <div class="magic-grid category-sq special-sq hover-scale">
                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/magic_grid_category_special_01.png')}}"
                                                     alt="">

                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="article_listing.html" class="typo-sq">
                                        <p class="typo-title-sq">Deniz Manzaralı</p>
                                    </a>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/magic_grid_category_special_02.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="article_listing.html" class="typo-sq">
                                        <p class="typo-title-sq">Orman Manzaralı</p>
                                    </a>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/magic_grid_category_special_03.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="article_listing.html" class="typo-sq">
                                        <p class="typo-title-sq">Sahil</p>
                                    </a>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/magic_grid_category_special_04.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="article_listing.html" class="typo-sq">
                                        <p class="typo-title-sq">Çocuklar için Uygun</p>
                                    </a>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/magic_grid_category_special_05.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="article_listing.html" class="typo-sq">
                                        <p class="typo-title-sq">Evcil Hayvan Kabul</p>
                                    </a>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/magic_grid_category_special_06.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="article_listing.html" class="typo-sq">
                                        <p class="typo-title-sq">Güvenlikli</p>
                                    </a>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq"
                                                     src="{{asset('view/images/magic_grid/magic_grid_category_special_07.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="article_listing.html" class="typo-sq">
                                        <p class="typo-title-sq">Tarihi Villa</p>
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

                                        <a class="image-sq" href="article.html">
                    	                <span class="image-wrapper">
                    	                    <span class="image-inner">
                    	                        <img class="image-sq"
                                                     src="{{Storage::url($blog['blog']->image)}}"
                                                     alt="{{$blog['lang']->where('language_id',$lang_id)->first()->title}}">
                    	                    </span>
                    	                </span>
                                        </a>

                                        <div class="typo-sq">
                                            <p class="typo-label-sq" data-label-before="Beauty"
                                               data-label-after="Book a home in"></p>
                                            <p class="typo-title-sq">{{$blog['lang']->where('language_id',$lang_id)->first()->title}}</p>
                                            <p class="typo-desc-sq">{{$blog['lang']->where('language_id',$lang_id)->first()->description}}</p>

                                            <a href="" class="read-more-sq">Devamını Oku... <i class="icon icon-arrow-right-122"></i></a>
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

    <!-- Wishlist -->
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

    </div>

@endsection
