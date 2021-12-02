@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')

    <div class="property-section-default">

        <div class="image-wrapper">
            <div class="image-inner">
                <img class="image-sq slick-img" src="{{Storage::url($villa['villa']->image)}}" alt=""
                     data-gallery="gallery"
                     data-caption="Cover Photo">
            </div>
        </div>

        <div class="property-main-content">
            <div class="ui grid container stackable app layout right side">
                <div class="row">
                    <div class="ui column main-column">
                        <h1 class="title-sq">{{$villa['lang'][0]->title}}</h1>

                        <div class="rating-sq">
                            <span>9.4</span>
                            <i class="icon icon-heart-line"></i>
                        </div>

                        <div class="location-sq">
                            <i class="icon icon-location-pin-2"></i>
                            Romania, Bucuresti
                        </div>

                        <div class="icons-row">
                            <div class="icons-column">
                                <i class="icon icon-account-group-5"></i>
                                {{$villa['villa']->capacity}} Guests
                            </div>
                            <div class="icons-column">
                                <i class="icon icon-door-simple"></i>
                                {{$villa['villa']->bedrooms}} Bedrooms
                            </div>
                            <div class="icons-column">
                                <i class="icon icon-bed-double"></i>
                                {{$villa['villa']->rooms}} Beds
                            </div>
                            <div class="icons-column">
                                <i class="icon icon-bath-tub"></i>
                                {{$villa['villa']->bathrooms}} Baths
                            </div>
                            <div class="icons-column">
                                <i class="icon icon-bath-tub"></i>
                                {{$villa['villa']->central_distance}} Central
                            </div>
                            <div class="icons-column">
                                <i class="icon icon-bath-tub"></i>
                                {{$villa['villa']->plaj_distance}} Plaj
                            </div>
                            <div class="icons-column">
                                <i class="icon icon-bath-tub"></i>
                                {{$villa['villa']->hospital_distance}} Plaj
                            </div>
                            <div class="icons-column">
                                <i class="icon icon-air-conditioner"></i>
                                {{$villa['villa']->airport_distance}} Plaj
                            </div>
                        </div>

                    </div>

                    <div class="ui column side-column">

                        <div class="property-sticky-box-wrapper">

                            <div class="sticky-element sticky-desktop sticky-large-desktop under-ths burger-mobile-modal search-visible"
                                 data-burger="menu04">

                                <a href=""
                                   class="modal-trigger close-sq hamburger hamburger-spin item hidden-tablet hidden-desktop hidden-large-desktop"
                                   data-trigger-for="menu04">
                                        <span class="hamburger-box">
                                          <span class="hamburger-inner"></span>
                                        </span>
                                </a>

                                <div class="property-sticky-box">
                                    <div class="price-tag-sq">
                                        <span class="price-sq">214&euro;</span>
                                        <span class="per-sq" data-text-mobile="/ " data-text="per ">night</span>
                                    </div>

                                    <div class="button-sq font-weight-extrabold-sq mobile-fixed-trigger hidden-desktop hidden-large-desktop hidden-tablet modal-trigger"
                                         data-trigger-for="menu04">Instant Booking
                                    </div>

                                    <div class="mobile-fixed-section">
                                        <div class="sticky-box-content">
                                            <form action="checkout_page.html">
                                                <div class="main-infos inline-check-in">
                                                    <div class="check-in calendar-sq" id="sticky-box-rangestart">
                                                        <label class="placeholder" data-placeholder="Check In"></label>

                                                        <div class="relative">
                                                            <input type="text" class="filter" value="" required
                                                                   placeholder="date">
                                                            <i class="icon icon-little-arrow filters-arrow"></i>
                                                        </div>

                                                    </div>

                                                    <div class="check-out calendar-sq" id="sticky-box-rangeend">

                                                        <label class="placeholder" data-placeholder="Check Out"></label>

                                                        <input type="text" class="filter" value="" required
                                                               placeholder="date">

                                                    </div>

                                                    <div class="guests">
                                                        <label class="placeholder" data-placeholder="Guests"></label>

                                                        <select name="dropdown" size="12" class="dropdown" required>
                                                            <option value="1" selected>1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="calculations">
                                                    <div class="calc-row">
                                                        <div class="calc-column"><p class="desc">Service fee</p></div>
                                                        <div class="calc-column"><p class="price-sq">&euro;24</p></div>
                                                    </div>

                                                    <div class="calc-row">
                                                        <div class="calc-column"><p class="desc">Cleaning fee</p></div>
                                                        <div class="calc-column"><p class="price-sq">&euro;16</p></div>
                                                    </div>

                                                    <div class="calc-row">
                                                        <div class="calc-column"><p class="desc">Total</p></div>
                                                        <div class="calc-column"><p class="price-sq">&euro;657</p></div>
                                                    </div>
                                                </div>

                                                <button class="button-sq fullwidth-sq font-weight-extrabold-sq">Instant
                                                    Booking
                                                </button>

                                            </form>
                                        </div>

                                        <div class="sticky-box-wishlist">
                                            <div class="wishlist-sq">
                                                <a href=""><i class="icon icon-filter-heart"></i>Save Property</a>
                                            </div>
                                            <div class="aux-info-sq">
                                                <p>1060 travelers saved this place</p>
                                            </div>
                                            <div class="share-sq">
                                                <a href=""><i class="icon icon-share"></i>Share</a>
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

    </div>

    <!-- grid -->
    <div class="ui grid container stackable app layout right side">

        <div class="row">

            <div class="ui column main-column" role="main">

                <div class="section-container" id="section-02">
                    <div class="typo-section-sq bottom-default">
                        <h3>Photos</h3>

                        <div class="photo-grid grid-5">
                            <?php foreach($villa['images'] as $image){ ?>
                            <div class="photo-item">
                                <div class="image-wrapper">
                                    <img class="image-sq slick-img" src="{{Storage::url($image->image)}}" alt=""
                                         data-gallery="gallery" data-caption="Photo 01">
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                    </div>


                </div>

                <div class="section-container" id="section-01">

                    <div class="typo-section-sq top-default bottom-default">
                        <h3>Villa Hakkında</h3>

                        {{$villa['lang'][0]->description}}
                        <hr/>
                        <div class="button-sq small-sq see-through-sq modal-ui-trigger" data-trigger-for="contact">
                            Mesaj Gönder
                        </div>

                        <div class="button-sq link-sq small-sq float-right-sq">
                            <i class="icon icon-share"></i>
                            Paylaş
                        </div>

                    </div>

                    <div class="typo-section-sq bottom-default">
                        <h5>Bilinmesi Gerekenler</h5>
                        <div class="ui grid moved">
                            <div class="twelve wide mobile six wide tablet six wide computer column">
                                <ul class="description-list">
                                    <li>
                                        <i class="icon icon-account-group-5"></i>
                                        <div>
                                            <p>Kişi Sayısı:</p>
                                            <strong>{{$villa['villa']->capacity}}</strong>
                                        </div>
                                    </li>

                                    <li>
                                        <i class="icon icon-bath-tub"></i>
                                        <div>
                                            <p>Banyo Sayısı:</p>
                                            <strong>{{$villa['villa']->bathrooms}}</strong>
                                        </div>
                                    </li>

                                    <li>
                                        <i class="icon icon-bed-double"></i>
                                        <div><p>Yatak Sayısı:</p>
                                            <strong>{{$villa['villa']->bedrooms}}</strong>
                                        </div>
                                    </li>
                                </ul>


                            </div>

                            <div class="twelve wide mobile six wide tablet six wide computer column">
                                <ul class="description-list">
                                    <li>
                                        <i class="icon icon-building-7"></i>
                                        <div>
                                            <p>Villa Tipi:</p>
                                            <strong>{{$villa['villa']->type}}</strong>
                                        </div>
                                    </li>

                                    <li>
                                        <i class="icon icon-door-simple"></i>
                                        <div>
                                            <p>Oda Sayısı:</p>
                                            <strong>{{$villa['villa']->rooms}}</strong>

                                        </div>
                                    </li>

                                    <li>
                                        <i class="icon icon-house"></i>
                                        <div><p>Giriş Çıkış / Saati:</p>
                                            <strong>14:00</strong> / <strong>11:00</strong></div>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="typo-section-sq bottom-default">
                        <h5>Özellikler</h5>
                        <div class="ui grid moved">
                            <div class="ui column">
                                <div class="ui accordion more-sq">
                                    <div class="title">
                                        <div class="ui grid">
                                            <a class="accordion-trigger more-trigger" data-more="More" data-less="Less">
                                                <i class="icon icon-arrow-down-122"></i>
                                            </a>

                                            <div class="twelve wide mobile six wide tablet twelve wide computer column">
                                                <ul class="description-list">
                                                <?php foreach($villa['propertys'] as $property){  ?>
                                                    <li>
                                                         <i class="icon icon-wifi-modem-2"></i>
                                                         <div><p><pre>{{  print_r($property->get_data())}}</pre></div>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="content">
                                        <div class="ui grid">
                                            <div class="twelve wide mobile six wide tablet four wide computer column">
                                                <ul class="description-list">
                                                    <li>
                                                        <i class="icon icon-teddy-bear"></i>
                                                        <div><p>Playground</p></div>
                                                    </li>

                                                    <li>
                                                        <i class="icon icon-house"></i>
                                                        <div><p>Iron</p></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="twelve wide mobile six wide tablet four wide computer column">
                                                <ul class="description-list">
                                                    <li>
                                                        <i class="icon icon-fire-extinguisher"></i>
                                                        <div><p>Fire Extinguisher</p></div>
                                                    </li>
                                                    <li>
                                                        <i class="icon icon-cc-camera-2"></i>
                                                        <div><p>Camera</p></div>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="twelve wide mobile six wide tablet four wide computer column">
                                                <ul class="description-list">
                                                    <li>
                                                        <i class="icon icon-air-conditioner"></i>
                                                        <div><p>A.C.</p></div>
                                                    </li>
                                                    <li>
                                                        <i class="icon icon-safe-1"></i>
                                                        <div><p>Big Safe</p></div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="typo-section-sq bottom-default">
                        <h5>Kiralama Şartları</h5>
                        <div class="ui grid moved">
                            <div class="twelve wide column">
                                <ul class="description-list">
                                    <li>
                                        <div>
                                            <p>Extra people:</p>
                                            <strong>$10 / night after 2 guests</strong>
                                        </div>
                                    </li>

                                    <li>
                                        <div><p>Cleaning Fee:</p>
                                            <strong>$29</strong></div>
                                    </li>

                                    <li>
                                        <div><p>Security Deposit:</p>
                                            <strong>$234</strong></div>
                                    </li>

                                    <li>
                                        <div><p>Weekly discount:</p>
                                            <strong>5%</strong></div>
                                    </li>
                                    <li>
                                        <div><p>Monthly discount:</p>
                                            <strong>5%</strong></div>
                                    </li>
                                    <li>
                                        <div><p>Cancellation</p>
                                            <strong class="accent-color">Moderate</strong></div>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="ui column side-column"></div>
        </div>
    </div>

    <div class="section-container" id="section-03">
        <div class="ui grid container stackable app layout right side">
            <div class="stretched row">
                <div class="ui column main-column" role="main">
                    <div class="typo-section-sq">
                        <h3>Location</h3>
                    </div>
                </div>
                <div class="ui column side-column"></div>
            </div>
        </div>

        <div class="ui grid xfluid">
            <div class="row">
                <div class="ui twelve wide computer twelve wide tablet column">
                    <div class="map-wrapper">
                        {!! $villa['villa']->map !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="ui grid container stackable app layout right side">
        <div class="stretched row">
            <div class="ui column main-column" role="main">
                <div class="section-container" id="section-04">

                    <div class="typo-section-sq top-default bottom-default">
                        <h3>Yorum & Puanlama</h3>
                        <div class="reviews-header">
                            <div class="rating-big">
                                <div class="rating-badge">
                                    <span>9.2</span>
                                    <i class="icon icon-heart"></i>
                                </div>
                                <div class="rating-info">
                                    <p>More than <strong>95%</strong> of guests recommend this place</p>
                                </div>
                            </div>
                            <form action="#" class="" style="width: 100%;">
                                <input id="reviews-search" type="text" placeholder="Search reviews" value="" required=""
                                       style="width: 90%;float:left">
                                <button style="width: 9%;float:right;    height: 50px;"><label><i
                                                style="    color: #fff;font-weight: 900;" class="icon icon-search"></i></label>
                                </button>
                            </form>
                        </div>


                        <div class="reviews-feed">
                            @foreach($villa['comments'] as $comment)
                                <div class="reviews-row">

                                    <div class="review-meta">
                                        <a class="avatar-sq verified-sq" href="vendor_details.html">
                                            <img src="{{asset('view/images/avatar/avatar_01.jpg')}}" alt="">
                                        </a>
                                        <a class="name-sq" href="#>{{$comment->fullname}}</a>
                                    </div>

                                    <div class=" comment-sq">
                                        <span class="date-sq"><?php $x = new DateTime($comment->created_at); $x->format('d-m-Y'); ?></span>
                                        {{$comment->description}}
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>

            <div class="ui column side-column"></div>
        </div>
    </div>


    <div class="ui modal small" data-for="contact">
        <i class="icon icon-close close-modal"></i>
        <div class="header center">
            <h3>Contact Form</h3>
        </div>

        <div class="content">
            <p>Donec non quam vitae justo mattis vestibulum a nec nisi. Morbi mi felis, ultrices vitae risus
                consectetur, porta ultrices sapien.</p>
            <div class="div-c inline-2">
                <div class="divided-column">
                    <label>Name</label>
                    <input type="text" placeholder=" ">
                </div>

                <div class="divided-column">
                    <label>Title</label>
                    <input type="text" placeholder=" ">
                </div>
            </div>

            <div class="div-c">
                <label>Message</label>
                <textarea cols="30" rows="10" placeholder=" "></textarea>
            </div>
        </div>

        <div class="actions">
            <div class="div-c inline-2">
                <div class="divided-column">
                    <div class="button-sq cancel-sq fullwidth-sq">Cancel</div>
                </div>

                <div class="divided-column">
                    <div class="button-sq fullwidth-sq">Send</div>
                </div>
            </div>

        </div>
    </div>

@endsection
