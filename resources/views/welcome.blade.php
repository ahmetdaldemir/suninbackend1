@extends('view_layout')
@section('title', 'Sahil Villam')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="hero-search-full-page next-sq" style="margin-top: 10px;">

        <!-- Hero Search -->
        <!-- .thin .animate .shadow .colored -->
        <div class="h-search-h thin-sq  animate-sq colored-sq h-search-top" >
            <form action="listing_page.html" class="hero-search-form">
                <div class="search-item">
                    <div class="fltp">
                        <select name="dropdown" size="13" class="dropdown" required>
                            <option value="0" selected>Villa Türü</option>
                            <option value="1">Balayı Villaları</option>
                            <option value="2">Muhafazakar Villalar</option>
                            <option value="3">Aile Villaları</option>
                            <option value="4">Lüks Villalar</option>
                            <option value="5">2022 Vilaları</option>
                            <option value="5">Ekonomik Vilalar</option>

                        </select>
                        <label class="placeholder">Villa Türü</label>
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

                <div class="search-item btn-padding-none">
                    <button class="button-sq hero-search-button">
                        <i class="icon icon-search"></i>
                    </button>
                </div>

            </form>
        </div>




        <!-- Hero Big - Slick -->
        <div class="menu-gizle-mobil  sq-slick hero-big slide-up-sq" data-mobile-arrows="false" data-tablet-arrows="false" data-mobile-dots="true" data-tablet-dots="true" data-fade="true" data-speed="500" data-ease="linear">
            <!-- .slide-up .fade .top .bottom -->

            <!--Slide 01-->
            <div class="" >
                <div class="caption-content" style="margin-top: 150px;">
                    <h1 class="font-weight-extrabold-sq">Size Özgün Villalar</h1>
                </div>


                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="image-sq" src="{{asset('view/images/hero/hero_big_30.jpg')}}" alt="">
                    </div>
                </div>
            </div>

            <!--Slide 02-->
            <div>
                <div class="caption-content">
                    <h1 class="font-weight-extrabold-sq">Yeni Balayı Villaları</h1>
                </div>



                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="image-sq" src="{{asset('view/images/hero/hero_big_29.jpg')}}'" alt="">
                    </div>
                </div>
            </div>

            <!--Slide 03-->
            <div>
                <div class="caption-content">
                    <h1 class="font-weight-extrabold-sq">Lüks Villalar</h1>
                </div>


                <div class="image-wrapper">
                    <div class="image-inner">
                        <img class="image-sq" src="{{asset('view/images/hero/hero_big_30.jpg')}}" alt="">
                    </div>
                </div>
            </div>

            <!--Slide 04-->
            <!-- <div>
                <div class="caption-content">
                   <h1 class="font-weight-extrabold-sq">Yeni Yerler</h1>
                </div>
                 <div class="caption-outside">
                    <a class="button anchor-sq" href="#top">
                        <i class="icon big icon-arrow-down2"></i>
                        <span>View</span>
                    </a>
                </div> -->

        <!-- <div class="image-wrapper">
                <div class="image-inner">
                    <img class="image-sq" src="{{asset('view/images/hero/hero_big_31.jpg')}}" alt="">
                </div>
            </div>
        </div>
-->



        </div>

    </div>

    <div class="container-xl" >
        <div class="row">
            <div class="col-xl-2  col-md-4 col-6">
                <div class="v-icon">
                    <a href=""><img src="{{asset('view/images/honeymoon.svg')}}" class="img"><p>Balayı Villaları</p></a></div>
            </div>
            <div class="col-xl-2  col-md-4 col-6">
                <div class="v-icon">
                    <a href=""><img src="{{asset('view/images/kids.svg')}}" class="img"><p>Çocuk Havuzlu</p></a></div>
            </div>
            <div class="col-xl-2  col-md-4 col-6">
                <div class="v-icon">
                    <a href=""><img src="{{asset('view/images/sea.svg')}}" class="img"><p>Deniz Manzaralı</p></a></div>
            </div>
            <div class="col-xl-2  col-md-4 col-6">
                <div class="v-icon">
                    <a href=""><img src="{{asset('view/images/villa.svg')}}" class="img"><p>Lüks Villalar</p></a></div>
            </div>

            <div class=" col-xl-2 col-md-4 col-6">
                <div class="v-icon">
                    <a href=""><img src="{{asset('view/images/securty.svg')}}" class="img"><p>Korunaklı Villalar</p></a></div></div>
            <div class=" col-xl-2 col-md-4 col-6">
                <div class="v-icon svg">
                    <a href=""><img src="{{asset('view/images/apart.svg')}}" class="img"><p>Kiralık Apartlar</p></a></div></div>


        </div>


        <div class="typo-section-header-sq">
            <h2 class="text-align-center-sq m-tb-20">Sizin İçin Seçtiklerimiz</h2>

        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">

                <a href="villa_sayfasi.html" class="cards">
                    <div class="imgs">
                        <img src="{{asset('view/images/property/1.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">Villa Feel</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>Kalkan</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>4 Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>2 Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>


                        <div class="fiyat">3500<i class="fa-solid fa-turkish-lira-sign"></i> - 15000<i class="fa-solid fa-turkish-lira-sign"></i><span>Haftalık</span></div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                        <!-- <span href="" class="buton-dty">Hemen İncele</span> -->
                    </div>

                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <a href="villa_sayfasi.html" class="cards">
                    <div class="imgs">
                        <img src="{{asset('view/images/property/1.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">Villa Feel</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>Kalkan</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>4 Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>2 Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>


                        <div class="fiyat">3500<i class="fa-solid fa-turkish-lira-sign"></i> - 15000<i class="fa-solid fa-turkish-lira-sign"></i><span> / Haftalık</span></div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                        <!-- <span href="" class="buton-dty">Hemen İncele</span> -->
                    </div>

                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <a href="villa_sayfasi.html" class="cards">
                    <div class="imgs">
                        <img src="{{asset('view/images/property/1.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">Villa Feel</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>Kalkan</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>4 Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>2 Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>


                        <div class="fiyat">3500<i class="fa-solid fa-turkish-lira-sign"></i> - 15000<i class="fa-solid fa-turkish-lira-sign"></i><span> / Haftalık</span></div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                        <!-- <span href="" class="buton-dty">Hemen İncele</span> -->
                    </div>

                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <a href="villa_sayfasi.html" class="cards">
                    <div class="imgs">
                        <img src="{{asset('view/images/property/1.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">Villa Feel</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>Kalkan</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>4 Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>2 Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>


                        <div class="fiyat">3500<i class="fa-solid fa-turkish-lira-sign"></i> - 15000<i class="fa-solid fa-turkish-lira-sign"></i><span> / Haftalık</span></div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                        <!-- <span href="" class="buton-dty">Hemen İncele</span> -->
                    </div>

                </a>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-12">

                <a href="villa_sayfasi.html" class="cards">
                    <div class="imgs">
                        <img src="{{asset('view/images/property/1.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">Villa Feel</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>Kalkan</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>4 Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>2 Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>


                        <div class="fiyat">3500<i class="fa-solid fa-turkish-lira-sign"></i> - 15000<i class="fa-solid fa-turkish-lira-sign"></i><span> / Haftalık</span></div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                        <!-- <span href="" class="buton-dty">Hemen İncele</span> -->
                    </div>

                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <a href="villa_sayfasi.html" class="cards">
                    <div class="imgs">
                        <img src="{{asset('view/images/property/1.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">Villa Feel</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>Kalkan</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>4 Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>2 Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>


                        <div class="fiyat">3500<i class="fa-solid fa-turkish-lira-sign"></i> - 15000<i class="fa-solid fa-turkish-lira-sign"></i><span> / Haftalık</span></div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                        <!-- <span href="" class="buton-dty">Hemen İncele</span> -->
                    </div>

                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <a href="villa_sayfasi.html" class="cards">
                    <div class="imgs">
                        <img src="{{asset('view/images/property/1.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">Villa Feel</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>Kalkan</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>4 Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>2 Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>


                        <div class="fiyat">3500<i class="fa-solid fa-turkish-lira-sign"></i> - 15000<i class="fa-solid fa-turkish-lira-sign"></i><span> / Haftalık</span></div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                        <!-- <span href="" class="buton-dty">Hemen İncele</span> -->
                    </div>

                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">

                <a href="villa_sayfasi.html" class="cards">
                    <div class="imgs">
                        <img src="{{asset('view/images/property/1.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">Villa Feel</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>Kalkan</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>4 Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>2 Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>


                        <div class="fiyat">3500<i class="fa-solid fa-turkish-lira-sign"></i> - 15000<i class="fa-solid fa-turkish-lira-sign"></i><span> / Haftalık</span></div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                        <!-- <span href="" class="buton-dty">Hemen İncele</span> -->
                    </div>

                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">

                <a href="villa_sayfasi.html" class="cards">
                    <div class="imgs">
                        <img src="{{asset('view/images/property/1.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="info">Ekonomik Villa</div>
                    <span href="#" class="musait"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-details">
                        <div class="villaname">Villa Feel</div>
                        <span class="local"><i class="fa-solid fa-location-dot"></i>Kalkan</span>
                        <div class="info-bottom">
                            <div class="person"><i class="fa-solid fa-users"></i>4 Kişilik</div>
                            <div class="person"><i class="fa-solid fa-bed"></i>2 Yatak Odası</div>
                            <div class="person"><i class="fa-solid fa-sink"></i>2 Banyo</div>
                        </div>


                        <div class="fiyat">3500<i class="fa-solid fa-turkish-lira-sign"></i> - 15000<i class="fa-solid fa-turkish-lira-sign"></i><span> / Haftalık</span></div>
                        <div class="btn-dty">HEMEN İNCELE</div>
                        <!-- <span href="" class="buton-dty">Hemen İncele</span> -->
                    </div>

                </a>
            </div>







        </div>

        <a href="listing_page.html" class="more-trigger" data-more="Tüm Villalar">
            <i class="icon icon-arrow-down-122"></i>
        </a>



    </div>

    <div class="promo-section">

        <!-- content -->
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
    <!-- BÖLGELER -->
    <div class="container-xl " >
        <div class="row">
            <div class="six wide computer column">
                <div class="typo-section-sq bottom-big">

                    <div class="typo-section-header-sq">
                        <h2 class="text-align-center-sq">Hizmet Verdiğimiz Bölgeler</h2>
                        <p class="text-align-center-sq">Akdeniz'in Harika Noktalarından Size Özel Tatil Villaları</p>.</p>
                    </div>

                    <div class="magic-grid photo-sq hover-default hover-center">

                        <!-- item-->
                        <div class="item">
                            <div class="item-inner">

                                <!-- image container -->
                                <div class="image-sq">
                                    <div class="image-wrapper">
                                        <div class="image-inner">
                                            <img class="image-sq" src="{{asset('view/images/property/fethiye.jpeg')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <!-- typography container-->
                                <a href="listing_page.html" class="typo-sq">
                                    <span class="typo-whitespace"></span>
                                    <p class="typo-label-sq" data-label-before="Muğla" data-label-after="Tüm Villalar"></p>
                                    <p class="typo-title-sq">Fethiye</p>
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
                                            <img class="image-sq" src="{{asset('view/images/property/kas.jpeg')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <!-- typography container-->
                                <a href="listing_page.html" class="typo-sq">
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
                                            <img class="image-sq" src="{{asset('view/images/property/patara.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <!-- typography container-->
                                <a href="listing_page.html" class="typo-sq">
                                    <span class="typo-whitespace"></span>
                                    <p class="typo-label-sq" data-label-before="Antalya" data-label-after="Tüm Villalar"></p>
                                    <p class="typo-title-sq">Patara</p>
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
                                            <img class="image-sq" src="{{asset('view/images/property/kalkan.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <!-- typography container-->
                                <a href="listing_page.html" class="typo-sq">
                                    <span class="typo-whitespace"></span>
                                    <p class="typo-label-sq" data-label-before="Antalya" data-label-after="Tüm Villalar"></p>
                                    <p class="typo-title-sq">Kalkan</p>
                                </a>

                            </div>
                        </div>

                    </div>


                </div>

            </div>



        </div>
    </div>

@endsection

@section('javascript')
<script>
function favorite(w,c,i){
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content)
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
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content)
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
