@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')


    <div class="ui grid container-fluid mar-con">
        <div class="row">
            <div class="ui grid">

                <div class="typo-section-sq bottom-big">
                    <div class="typo-section-header-sq">
                        <h2 class="text-align-center-sq">Fırsat Villalar</h2>

                        <p class="text-align-center-sq">Hemen rezervasyon yaptırın inirimlerden sizde faydalanın...</p>
                    </div>

                    <div class="ui grid ">
                        <div class="v-ic container-fluid">
                            <div class="v-icon"><a href=""><img src="assets/images/honeymoon.svg" class="img">
                                    <p>Balayı Villaları</p></a></div>
                            <div class="v-icon"><a href=""><img src="assets/images/kids.svg" class="img">
                                    <p>Çocuk Havuzlu</p></a></div>
                            <div class="v-icon"><a href=""><img src="assets/images/sea.svg" class="img">
                                    <p>Deniz Manzaralı</p></a></div>
                            <div class="v-icon"><a href=""><img src="assets/images/villa.svg" class="img">
                                    <p>Özel Villalar</p></a></div>
                            <div class="v-icon"><a href=""><img src="assets/images/winter.svg" class="img">
                                    <p>Kış Aylarına Uygun</p></a></div>
                            <div class="v-icon"><a href=""><img src="assets/images/pets.svg" class="img">
                                    <p>Evcil Hayvan İzinli</p></a></div>
                            <div class="v-icon"><a href=""><img src="assets/images/securty.svg" class="img">
                                    <p>Korunaklı Villalar</p></a></div>
                        </div>
                    </div>

                    <div class="ui grid">

                        <div class="twelve wide mobile four wide tablet four wide computer column">
                            <div class="property-item">
                                <div class="property-item-inner">

                                    <div class="price-tag-sq">Kapalı Isıtmalı Havuz</div>
                                    <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                        <i class="icon icon-add-wishlist"></i>
                                    </a>

                                    <a class="image-sq" href="property_page.html">
                                            <span class="image-wrapper">
                                                <span class="image-inner">
                                                    <img src="assets/images/property/1.jpg" alt="" class="responsive">
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
                                            <a href="property_page.html" class="title-sq">Villa Kaş</a>
                                            <a href="vendor_details.html" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Kaş</p>
                                        <p>Haftalık Fiyat Aralığı : 1000 - 1500 TL</p>
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


                                    <a class="image-sq" href="property_page.html">
                                                <span class="image-wrapper">
                                                    <span class="image-inner">
                                                        <img src="assets/images/property/2.jpg" alt="" class="">
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
                                            <a href="property_page.html" class="title-sq">Taş Ev</a>
                                            <a href="vendor_details.html" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Fethiye</p>
                                        <p>Haftalık Fiyat Aralığı : 1000 - 1500 TL</p>
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

                                    <a class="image-sq" href="property_page.html">
                                            <span class="image-wrapper">
                                                <span class="image-inner">
                                                    <img src="assets/images/property/3.jpg" alt="" class="">
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
                                            <a href="property_page.html" class="title-sq">Malikane</a>
                                            <a href="vendor_details.html" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Marmaris</p>
                                        <p>Haftalık Fiyat Aralığı : 1000 - 1500 TL</p>
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

                                    <a class="image-sq" href="property_page.html">
                                            <span class="image-wrapper">
                                                <span class="image-inner">
                                                    <img src="assets/images/property/4.jpg" alt="" class="">
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
                                            <a href="property_page.html" class="title-sq">Beş Villa</a>
                                            <a href="vendor_details.html" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Datça</p>
                                        <p>Haftalık Fiyat Aralığı : 1000 - 1500 TL</p>
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

                                    <a class="image-sq" href="property_page.html">
                                            <span class="image-wrapper">
                                                <span class="image-inner">
                                                    <img src="assets/images/property/3.jpg" alt="" class="responsive">
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
                                            <a href="property_page.html" class="title-sq">Beyaz Ev</a>
                                            <a href="vendor_details.html" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Patara</p>
                                        <p>Haftalık Fiyat Aralığı : 1000 - 1500 TL</p>
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


                                    <a class="image-sq" href="property_page.html">
                                            <span class="image-wrapper">
                                                <span class="image-inner">
                                                    <img src="assets/images/property/2.jpg" alt="" class="responsive">
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
                                            <a href="property_page.html" class="title-sq">Modern</a>
                                            <a href="vendor_details.html" class="button-sq-top">
                                                Hemen İncele
                                            </a>
                                        </div>

                                    </div>
                                    <div class="property-fl">
                                        <p><i class="icon icon-pin2"></i> Kemer</p>
                                        <p>Haftalık Fiyat Aralığı : 1000 - 1500 TL</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <a href="listing_page.html" class="more-trigger" data-more="Tümünü Görüntüle">
                        <i class="icon icon-arrow-down-122"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="ui modal small" data-for="wishlist">
        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            <h4>Wishlist</h4>
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
                    <div class="button-sq cancel-sq fullwidth-sq">Cancel</div>
                </div>

                <div class="divided-column">
                    <div class="button-sq fullwidth-sq">OK</div>
                </div>
            </div>
        </div>
    </div>

@endsection
