@extends('view_layout')
@section('title', 'Sunin Turkey')


@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.16.1/daterangepicker.min.css"/>
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
                                        <span class="price-sq">{{$villa['price']}}<!--&euro;--></span>
                                        <span class="per-sq" data-text-mobile="/ " data-text=" ">Gecelik Fiyat</span>
                                    </div>

                                    <div class="button-sq font-weight-extrabold-sq mobile-fixed-trigger hidden-desktop hidden-large-desktop hidden-tablet modal-trigger"
                                         data-trigger-for="menu04">Instant Booking
                                    </div>

                                    <div class="mobile-fixed-section">
                                        <div class="sticky-box-content">
                                            <form id="villaReservation">
                                                <div class="main-infos inline-check-in">
                                                    <div class="check-in calendar-sq" id="rangestart">
                                                        <label class="placeholder" data-placeholder="Giriş"></label>

                                                        <div class="relative">
                                                            <input name="checkin" type="text" class="filter" value=""
                                                                   required placeholder="{{__('Giriş')}}"
                                                                   autocomplete="off">
                                                            <i class="icon icon-little-arrow filters-arrow"></i>
                                                        </div>

                                                    </div>

                                                    <div class="check-out calendar-sq" id="rangeend">

                                                        <label class="placeholder" data-placeholder="Çıkış"></label>

                                                        <input name="checkout" type="text" class="filter" value=""
                                                               required placeholder="{{__('Çıkış')}}"
                                                               autocomplete="off">

                                                    </div>

                                                    <div class="guests">
                                                        <label class="placeholder" data-placeholder="Kişi"></label>

                                                        <select name="guest" size="12" class="dropdown" required>
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
                                                <!--<div class="calc-row">
                                                        <div class="calc-column"><p class="desc">Hasar Depozitosu</p></div>
                                                        <div class="calc-column"><p class="price-sq">{{$villa['villa']->service}}</p></div>
                                                    </div>-->

                                                    <div class="calc-row">
                                                        <div class="calc-column"><p class="desc">Temizlik Ücreti</p>
                                                        </div>
                                                        <div class="calc-column"><p
                                                                    class="price-sq">{{$villa['villa']->cleaning}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="calc-row">
                                                        <div class="calc-column"><p class="desc">{{__('Toplam')}}</p>
                                                        </div>
                                                        <div class="calc-column"><p class="price-sq">&euro;657</p></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="villa_id" value="{{$villa['villa']->id}}"/>

                                                <button type="button"
                                                        class="button-sq fullwidth-sq font-weight-extrabold-sq villacheck">
                                                    Rezervasyon Yap
                                                </button>

                                            </form>
                                        </div>

                                        <div class="sticky-box-wishlist">
                                            <div class="wishlist-sq">
                                                <a href=""><i class="icon icon-filter-heart"></i>Favorilere Ekle</a>
                                            </div>
                                            <div class="aux-info-sq">
                                                <p>-</p>
                                            </div>
                                            <div class="share-sq">
                                                <a href=""><i class="icon icon-share"></i>Paylaş</a>
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
                            @if(!empty($villa_service))
                                <div class="twelve wide mobile six wide tablet six wide computer column">
                                    <ul class="description-list">
                                        @foreach($services as $service)
                                            @if(in_array($service['id'],$villa_service))
                                                <li>
                                                    <div>
                                                        <p>{{@$service['lang']->where('lang_id',$lang_id)->first()->title}}</p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                            @if(!empty($villa_property))
                                <div class="twelve wide mobile six wide tablet six wide computer">
                                    <ul class="description-list">
                                        @foreach($properties as $property)
                                            @if(in_array($property['id'],$villa_property))
                                                <li style="width: 30%;">
                                                    <i class="icon icon-pin2"></i>
                                                    <div>
                                                        <p>{{$property['lang']->where('lang_id',$lang_id)->first()->title}}</p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="typo-section-sq bottom-default">
                        <h5>Kiralama Şartları</h5>
                        <div class="ui grid moved">
                            @if(!empty($villa_regulation))
                                <div class="twelve wide column">
                                    <ul class="description-list">
                                        @foreach($regulations as $regulation)
                                            @if(in_array($regulation['id'],$villa_regulation))
                                                <li style="width: 30%;">
                                                    <div>
                                                        <p>{{@$regulation['lang']->where('lang_id',$lang_id)->first()->title}}</p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                        <h3>Takvim</h3>
                    </div>
                </div>
                <div class="ui column side-column"></div>
            </div>
        </div>
        <div class="ui grid container stackable app layout right side">
            <div class="row">
                <div class="ui twelve wide computer twelve wide tablet column">
                    <input type="hidden" id="date-range12" size="40" value="">
                    <div id="date-range12-container" style="width:100%;"></div>
                    <input type="hidden" name="villa_id" value="{{$villa['villa']->id}}"/>
                    <button type="button" class="button-sq fullwidth-sq font-weight-extrabold-sq villacheck">Rezervasyon
                        Yap
                    </button>
                </div>
            </div>
        </div>

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
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.16.1/jquery.daterangepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $('#villaReservation').on('click', '.villacheck', function () {
                let data = $('#villaReservation').serialize()
                $.ajax({
                    url: '/villaCheck',
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        if (data.url) {
                            window.location.replace(data.url);
                        } else {
                            alert('Belitilen günlerde müsaitlik bulunmuyor');
                        }
                    }
                });
            });
        });
        var highlightdates = [moment('22.12.2017', 'DD.MM.YYYY'), moment('24.01.2018', 'DD.MM.YYYY')]

        $(document).ready(function () {

            $('#date-range12').dateRangePicker(
                {
                    inline: true,
                    container: '#date-range12-container',
                    alwaysOpen: true,
                    format: 'DD.MM.YYYY',
                    separator: ' to ',
                    language: 'tr',
                    showTopbar: false,
                    showWeekNumbers: false,
                    extraClass: 'date-range-picker19',
                    monthSelect: true,
                    yearSelect: true,
                    customArrowPrevSymbol: '<a href="#" class="fa-blok fa fa-arrow-circle-left"></a>',
                    customArrowNextSymbol: '<a href="#" class="fa-blok fa fa-arrow-circle-right"></a>',
                    //maxDays: 7,
                    minDays: 3,
                    startDate: moment(),
                    startOfWeek: 'monday',
                    customTopBar: 'Tarih Aralığı Seçiniz',
                    showDateFilter: function (time, date) {
                        var doHighlight = highlightdates.some(function (item) {
                            //alert(item.isSame(moment(time), 'day'))
                            return (item.isSame(moment(time), 'day') && item.isSame(moment(time), 'month') && item.isSame(moment(time), 'year'))
                        })
                        return '<div ' + (doHighlight ? 'class="highlight"' : '') + ' style="padding:0 5px;">' +
                            '<span style="font-weight:bold">' + date + '</span>' +
                            '<div style="opacity:0.3;">$' + Math.round(Math.random() * 999) + '</div>' +
                            '</div>';
                    }

                })
        });
    </script>
@endsection
