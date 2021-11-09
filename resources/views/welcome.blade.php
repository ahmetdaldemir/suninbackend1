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
        <div class="h-search-h thin-sq  animate-sq colored-sq h-search-top" >
            <form action="{{route('listing')}}" class="hero-search-form">
                <div class="search-item">
                    <div class="fltp">
                        <input type="text" value="" required>
                        <label class="placeholder" data-big-placeholder="Bölge Seçiniz" data-little-placeholder="Bölge"></label>
                    </div>
                </div>

                <div class="search-item">
                    <div class="fltp calendar-sq" id="rangestart">
                        <input type="text" class="filter" value="" required placeholder="enter date">
                        <label class="placeholder"  data-big-placeholder="Giriş Tarihi" data-little-placeholder="Giriş"></label>
                    </div>

                    <i class="icon icon-little-arrow"></i>

                    <div class="fltp calendar-sq" id="rangeend">
                        <input type="text" class="filter" value="" required placeholder="enter date">
                        <label class="placeholder"  data-big-placeholder="Çıkış Tarihi" data-little-placeholder="Çıkış"></label>
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
        <div class="sq-slick hero-big slide-up-sq" data-mobile-arrows="false" data-tablet-arrows="false" data-mobile-dots="true" data-tablet-dots="true" data-fade="true" data-speed="500" data-ease="linear">
            <!-- .slide-up .fade .top .bottom -->

            <!--Slide 01-->
            <div class="" >
                <div class="caption-content" style="margin-top: 150px;">
                    <h1 class="font-weight-extrabold-sq">Luxury Villa, Özel Hissedin...</h1>
                </div>
                <div class="caption-outside">
                    <a class="button anchor-sq" href="#top">
                        <i class="icon big icon-compass"></i>
                        <span>Devam</span>
                    </a>
                </div>

                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="image-sq" src="{{asset('view/images/hero/hero_big_28.jpg')}}" alt="">
                    </div>
                </div>
            </div>

            <!--Slide 02-->
            <div>
                <div class="caption-content">
                    <h1 class="font-weight-extrabold-sq">Yeni Maceralar</h1>
                </div>

                <div class="caption-outside">
                    <a class="button anchor-sq" href="#top">
                        <i class="icon big icon-compass"></i>
                        <span>Find</span>
                    </a>
                </div>

                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="image-sq" src="{{asset('view/images/hero/hero_big_29.jpg')}}" alt="">
                    </div>
                </div>
            </div>

            <!--Slide 03-->
            <div>
                <div class="caption-content">
                    <h1 class="font-weight-extrabold-sq">Yeni Hikayeler</h1>
                </div>

                <div class="caption-outside">
                    <a class="button anchor-sq" href="#top">
                        <i class="icon big icon-compass"></i>
                        <span>Read</span>
                    </a>
                </div>

                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="image-sq" src="{{asset('view/images/hero/hero_big_30.jpg')}}" alt="">
                    </div>
                </div>
            </div>

            <!--Slide 04-->
            <div>
                <div class="caption-content">
                    <h1 class="font-weight-extrabold-sq">Yeni Yerler</h1>
                </div>
                <div class="caption-outside">
                    <a class="button anchor-sq" href="#top">
                        <i class="icon big icon-arrow-down2"></i>
                        <span>View</span>
                    </a>
                </div>

                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="image-sq" src="{{asset('view/images/hero/hero_big_31.jpg')}}" alt="">
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="ui grid container-fluid mar-con" >
        <div class="row">
            <div class="ui column">

                <div class="typo-section-sq bottom-big">
                    <div class="typo-section-header-sq">
                        <h2 class="text-align-center-sq">Fırsat Villalar</h2>

                        <p class="text-align-center-sq">Hemen rezervasyon yaptırın inirimlerden sizde faydalanın...</p>
                    </div>

                    <div class="ui grid ">
                        <div class="v-ic container-fluid">
                            <div class="v-icon"><a href=""><img src="{{asset('view/images/honeymoon.svg')}}" class="img"><p>Balayı Villaları</p></a></div>
                            <div class="v-icon"><a href=""><img src="{{asset('view/images/kids.svg')}}" class="img"><p>Çocuk Havuzlu</p></a></div>
                            <div class="v-icon"><a href=""><img src="{{asset('view/images/sea.svg')}}" class="img"><p>Deniz Manzaralı</p></a></div>
                            <div class="v-icon"><a href=""><img src="{{asset('view/images/villa.svg')}}" class="img"><p>Özel Villalar</p></a></div>
                            <div class="v-icon"><a href=""><img src="{{asset('view/images/winter.svg')}}" class="img"><p>Kış Aylarına Uygun</p></a></div>
                            <div class="v-icon"><a href=""><img src="{{asset('view/images/pets.svg')}}" class="img"><p>Evcil Hayvan İzinli</p></a></div>
                            <div class="v-icon"><a href=""><img src="{{asset('view/images/securty.svg')}}" class="img"><p>Korunaklı Villalar</p></a></div>
                        </div>
                    </div>

                    <div class="ui grid">

                        <div class="twelve wide mobile four wide tablet four wide computer column">
                            <div class="property-item">
                                <div class="property-item-inner">

                                    <div class="price-tag-sq">Kapalı Isıtmalı Havuz </div>
                                    <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                        <i class="icon icon-add-wishlist"></i>
                                    </a>

                                    <a class="image-sq" href="{{route('detail')}}">
									<span class="image-wrapper">
										<span class="image-inner">
											<img src="{{asset('view/images/property/1.jpg')}}" alt="" class="responsive">
										</span>
									</span>
                                    </a>

                                    <div class="main-details">


                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <i class="icon icon-heart"></i> 8.6
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-account-group-5"></i> x 4 Kişi
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-door-simple"></i> x 6
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-bed-double"></i> x 2 Yatak
                                            </div>
                                        </div>

                                    </div>
                                    <div class="property-name">
                                        <div class="title-row">
                                            <a href="{{route('detail')}}" class="title-sq">Villa Kaş</a>
                                            <a href="{{route('detail')}}" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Kaş</p>
                                        <p><span>Haftalık Fiyat Aralığı : 1000 - 1500 TL</span> </p>
                                    </div>

                                </div>
                            </div>
                        </div>

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
												<img src="{{asset('view/images/property/2.jpg')}}" alt="" class="">
											</span>
										</span>
                                    </a>

                                    <div class="main-details">



                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <i class="icon icon-heart"></i> 7.8
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-account-group-5"></i> x 2 Kişi
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-door-simple"></i> x 3
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-bed-double"></i> x 2 Yatak
                                            </div>
                                        </div>

                                    </div>

                                    <div class="property-name">
                                        <div class="title-row">
                                            <a href="{{route('detail')}}" class="title-sq">Taş Ev</a>
                                            <a href="{{route('detail')}}" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Fethiye</p>
                                        <p><span> Haftalık Fiyat Aralığı : 1000 - 1500 TL</span></p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="twelve wide mobile four wide tablet four wide computer column">
                            <div class="property-item">
                                <div class="property-item-inner">

                                    <div class="price-tag-sq">Evcil Hayvan</div>
                                    <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                        <i class="icon icon-add-wishlist"></i>
                                    </a>

                                    <a class="image-sq" href="{{route('detail')}}">
									<span class="image-wrapper">
										<span class="image-inner">
											<img src="{{asset('view/images/property/3.jpg')}}" alt="" class="">
										</span>
									</span>
                                    </a>


                                    <div class="main-details">



                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <i class="icon icon-heart"></i> 7.5
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-account-group-5"></i> x 2 Kişi
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-door-simple"></i> x 1
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-bed-double"></i> x 3 Yatak
                                            </div>
                                        </div>

                                    </div>

                                    <div class="property-name">
                                        <div class="title-row">
                                            <a href="{{route('detail')}}" class="title-sq">Malikane</a>
                                            <a href="{{route('detail')}}" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Marmaris</p>
                                        <p><span>Haftalık Fiyat Aralığı : 1000 - 1500 TL</span></p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="twelve wide mobile four wide tablet four wide computer column">
                            <div class="property-item">
                                <div class="property-item-inner">

                                    <div class="price-tag-sq">Balayı</div>
                                    <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                        <i class="icon icon-add-wishlist"></i>
                                    </a>

                                    <a class="image-sq" href="{{route('detail')}}">
									<span class="image-wrapper">
										<span class="image-inner">
											<img src="{{asset('view/images/property/4.jpg')}}" alt="" class="">
										</span>
									</span>
                                    </a>


                                    <div class="main-details">

                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <i class="icon icon-heart"></i> 8.1
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-account-group-5"></i> x 2 Kişi
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-door-simple"></i> x 2
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-bed-double"></i> x 2 Yatak
                                            </div>
                                        </div>
                                    </div>

                                    <div class="property-name">
                                        <div class="title-row">
                                            <a href="{{route('detail')}}" class="title-sq">Beş Villa</a>
                                            <a href="{{route('detail')}}" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Datça</p>
                                        <p><span>Haftalık Fiyat Aralığı : 1000 - 1500 TL</span></p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="twelve wide mobile four wide tablet four wide computer column">
                            <div class="property-item">
                                <div class="property-item-inner">

                                    <div class="price-tag-sq">Çocuk Havuzu</div>
                                    <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                        <i class="icon icon-add-wishlist"></i>
                                    </a>

                                    <a class="image-sq" href="{{route('detail')}}">
									<span class="image-wrapper">
										<span class="image-inner">
											<img src="{{asset('view/images/property/3.jpg')}}" alt="" class="responsive">
										</span>
									</span>
                                    </a>

                                    <div class="main-details">

                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <i class="icon icon-heart"></i> 7.5
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-account-group-5"></i> x 4 Kişi
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-door-simple"></i> x 2
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-bed-double"></i> x 1 Yatak
                                            </div>
                                        </div>

                                    </div>

                                    <div class="property-name">
                                        <div class="title-row">
                                            <a href="{{route('detail')}}" class="title-sq">Beyaz Ev</a>
                                            <a href="{{route('detail')}}" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Patara</p>
                                        <p><span>Haftalık Fiyat Aralığı : 1000 - 1500 TL</span></p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="twelve wide mobile four wide tablet four wide computer column">
                            <div class="property-item">
                                <div class="property-item-inner">

                                    <div class="price-tag-sq">Güvenlik</div>
                                    <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                        <i class="icon icon-add-wishlist"></i>
                                    </a>


                                    <a class="image-sq" href="{{route('detail')}}">
									<span class="image-wrapper">
										<span class="image-inner">
											<img src="{{asset('view/images/property/2.jpg')}}" alt="" class="responsive">
										</span>
									</span>
                                    </a>

                                    <div class="main-details">

                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <i class="icon icon-heart"></i> 7.5
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-account-group-5"></i> x 7 Kişi
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-door-simple"></i> x 2
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-bed-double"></i> x 2 Yatak
                                            </div>
                                        </div>

                                    </div>

                                    <div class="property-name">
                                        <div class="title-row">
                                            <a href="{{route('detail')}}" class="title-sq">Modern</a>
                                            <a href="{{route('detail')}}" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Kemer</p>
                                        <p><span>Haftalık Fiyat Aralığı : 1000 - 1500 TL</span></p>
                                    </div>

                                </div>
                            </div>
                        </div>

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
                        <p>Spectacular natural wonders and astonishing man-made structures. The list of great landmarks are often limited to seven, but the world is filled with wonders.</p>

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
        <div class="ui grid container-fluid" style="margin: 50px;" >
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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/fethiye.jpeg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="{{route('listing')}}" class="typo-sq">
                                        <span class="typo-whitespace"></span>
                                        <p class="typo-label-sq" data-label-before="Fethiye" data-label-after="Tüm Villalar"></p>
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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/kas.jpeg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="{{route('listing')}}" class="typo-sq">
                                        <span class="typo-whitespace"></span>
                                        <p class="typo-label-sq" data-label-before="Antalya" data-label-after="Tüm Villalar"></p>
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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/marmaris.jpeg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="{{route('listing')}}" class="typo-sq">
                                        <span class="typo-whitespace"></span>
                                        <p class="typo-label-sq" data-label-before="Muğla" data-label-after="Tüm Villalar"></p>
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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/kemer.jpeg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- typography container-->
                                    <a href="{{route('listing')}}" class="typo-sq">
                                        <span class="typo-whitespace"></span>
                                        <p class="typo-label-sq" data-label-before="Antalya" data-label-after="Tüm Villalar"></p>
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
                            <p>Villanızın bilgilerini bizimle paylaşın, Villanızı portföyümüze ekleyelim ve kiralayalım. </p>

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
                            <p class="text-align-center-sq">In hac habitasse platea dictumst. Integer quis tortor enim. Integer et elit nec magna ultricies convallis. <br> In venenatis eu erat et facilisis. Vestibulum congue enim nisl.</p>
                        </div>

                        <div class="magic-grid category-sq special-sq hover-scale">
                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <div class="image-sq">
                                        <div class="image-wrapper">
                                            <div class="image-inner">
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_category_special_01.png')}}" alt="">

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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_category_special_02.jpg')}}" alt="">
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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_category_special_03.jpg')}}" alt="">
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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_category_special_04.jpg')}}" alt="">
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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_category_special_05.jpg')}}" alt="">
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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_category_special_06.jpg')}}" alt="">
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
                                                <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_category_special_07.jpg')}}" alt="">
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
                            <p class="text-align-center-sq"> Nunc sit amet velit nibh. Proin consectetur, ante quis tristique mattis, massa massa condimentum enim.</p>
                        </div>


                        <div class="magic-grid article-sq hover-scale">

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <a class="image-sq" href="article.html">
                    	                <span class="image-wrapper">
                    	                    <span class="image-inner">
                    	                        <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_article_01.jpg')}}" alt="">
                    	                    </span>
                    	                </span>
                                    </a>

                                    <!-- typography container-->
                                    <div class="typo-sq">
                                        <p class="typo-label-sq" data-label-before="Travel" data-label-after="Book a home in"></p>
                                        <p class="typo-title-sq">Getting Cheap Airfare For Last Minute Travel</p>
                                        <p class="typo-desc-sq">The city of southern California, san diego is locally known as ‘America’s Finest City’. It’s located on San Diego Bay, an inlet of the Pacific Ocean near the Mexican border. San Diego is the second largest city in</p>

                                        <a href="article.html" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <a class="image-sq" href="article.html">
                    	                <span class="image-wrapper">
                    	                    <span class="image-inner">
                    	                        <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_article_02.jpg')}}" alt="">
                    	                    </span>
                    	                </span>
                                    </a>

                                    <!-- typography container-->
                                    <div class="typo-sq">
                                        <p class="typo-label-sq" data-label-before="Beauty" data-label-after="Book a home in"></p>
                                        <p class="typo-title-sq">10 Steps To Look Younger</p>
                                        <p class="typo-desc-sq">Lots of people are unaware of the fact that adult acne exists and they seem not to know how to treat adult acne. People have this misconception that acne only happens during teenage years and gradually wears off as they age. For most people, this fact may be true but it is important to note that acne does not start during teenage years only. However, it is important to note that there are a significant number of adults that experience such condition.</p>

                                        <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                    </div>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <a class="image-sq" href="article.html">
                    	                <span class="image-wrapper">
                    	                    <span class="image-inner">
                    	                        <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_article_03.jpg')}}" alt="">
                    	                    </span>
                    	                </span>
                                    </a>

                                    <!-- typography container-->
                                    <div class="typo-sq">
                                        <p class="typo-label-sq" data-label-before="Cooking" data-label-after="Book a home in"></p>
                                        <p class="typo-title-sq">The Benefits And Drawbacks Of Buying Designer Kitchenware Products</p>
                                        <p class="typo-desc-sq">When it is time to bake cookies, we usually think that it is complicated, that it takes a lot of time. In one word : that it is not worthwhile ! We will show you hereunder that it is simply not true. Baking cookies is easy, fast and, most important, fun. Come and join all our readers who decided to give it a try and now,</p>


                                        <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                    </div>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <a class="image-sq" href="article.html">
                    	                <span class="image-wrapper">
                    	                    <span class="image-inner">
                    	                        <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_article_04.jpg')}}" alt="">
                    	                    </span>
                    	                </span>
                                    </a>

                                    <!-- typography container-->
                                    <div class="typo-sq">

                                        <p class="typo-label-sq" data-label-before="Advertising" data-label-after="Book a home in"></p>
                                        <p class="typo-title-sq">Enhance Your Brand Potential With Giant Advertising Blimps</p>
                                        <p class="typo-desc-sq">It is a small world after all. Globalization is that great process that started perhaps with Mr. Marco Polo, but has since regained its prestige after a short stint of protectionism following the great depression</p>

                                        <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                    </div>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <a class="image-sq" href="article.html">
                    	                <span class="image-wrapper">
                    	                    <span class="image-inner">
                    	                        <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_article_05.jpg')}}" alt="">
                    	                    </span>
                    	                </span>
                                    </a>

                                    <!-- typography container-->
                                    <div class="typo-sq">
                                        <p class="typo-label-sq" data-label-before="Motivation" data-label-after="Book a home in"></p>
                                        <p class="typo-title-sq">Counting Your Chicken Before They Hatch</p>
                                        <p class="typo-desc-sq">Be more concerned with your character than with your reputation. Your character is what you really are while your reputation is merely what others think you are.</p>

                                        <a href="" class="read-more-sq">Tüm Haberler <i class="icon icon-arrow-right-122"></i></a>
                                    </div>

                                </div>
                            </div>

                            <!-- item-->
                            <div class="item">
                                <div class="item-inner">

                                    <!-- image container -->
                                    <a class="image-sq" href="article.html">
                    	                <span class="image-wrapper">
                    	                    <span class="image-inner">
                    	                        <img class="image-sq" src="{{asset('view/images/magic_grid/magic_grid_article_06.jpg')}}" alt="">
                    	                    </span>
                    	                </span>
                                    </a>

                                    <!-- typography container-->
                                    <div class="typo-sq">
                                        <p class="typo-label-sq" data-label-before="Tech" data-label-after="Book a home in"></p>
                                        <p class="typo-title-sq">Download Anything Now A Days</p>
                                        <p class="typo-desc-sq">Do you want to download free song for ipod? If so, reading this article could save you from getting in to a lot of trouble! Downloading music to your Ipod has more than one pitfall associated with it, and this article will tell you the best way to download free song for Ipod.</p>

                                        <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                    </div>

                                </div>
                            </div>

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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. </p>
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. </p>
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
                    <select name="dropdown"  class="dropdown">
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">...</option>
                    </select>
                </div>
                <div class="divided-column">
                    <select name="dropdown"  class="dropdown">
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">...</option>
                    </select>
                </div>
                <div class="divided-column">
                    <select name="dropdown"  class="dropdown">
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. </p>

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
            <p>Mauris malesuada leo libero, vitae tempor ante sagittis vitae. Suspendisse consectetur facilisis enim.</p>
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
