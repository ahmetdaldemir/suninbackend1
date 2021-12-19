@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.16.1/daterangepicker.min.css" />

    <style>
    .highlight {
        background-color: red;
    }
    .date-picker {
        width: 170px;
        height: 25px;
        padding: 0;
        border: 0;
        line-height: 25px;
        padding-left: 10px;
        font-size: 12px;
        font-family: Arial, sans-serif;
        font-weight: 700;
        cursor: pointer;
        color: #303030;
        position: relative;
        z-index: 2
    }

    .date-picker-wrapper {
        position: absolute;
        z-index: 1;
    //border: 1px solid #bfbfbf;
        background-color: #efefef;
    //padding: 5px 12px;
        font-size: 12px;
        line-height: 20px;
        color: #aaa;
        font-family: Arial, sans-serif;
        -webkit-box-shadow: 3px 3px 10px rgba(0, 0, 0, .5);
        box-shadow: 3px 3px 10px rgba(0, 0, 0, .5);
        -webkit-box-sizing: initial;
        box-sizing: initial
    }

    .dp-clearfix {
        clear: both;
        height: 0;
        font-size: 0
    }

    .date-picker-wrapper.inline-wrapper {
        position: relative;
        -webkit-box-shadow: none;
        box-shadow: none;
        display: inline-block
    }

    .date-picker-wrapper.single-date {
        width: auto
    }

    .date-picker-wrapper.no-shortcuts {
    //padding-bottom: 12px
    }

    .date-picker-wrapper.no-topbar {
    //padding-top: 12px
    }

    .date-picker-wrapper .footer {
        font-size: 11px;
    //padding-top: 3px
    }

    .date-picker-wrapper b {
        color: #666;
        font-weight: 700
    }

    .date-picker-wrapper a {
        color: #6bb4d6;
        text-decoration: underline
    }

    .date-picker-wrapper .month-name {
        text-transform: uppercase
    }

    .date-picker-wrapper .select-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        vertical-align: middle
    }

    .date-picker-wrapper .select-wrapper:hover {
        text-decoration: underline
    }

    .date-picker-wrapper .month-element {
        display: inline-block;
        vertical-align: middle
    }

    .date-picker-wrapper .select-wrapper select {
        position: absolute;
        margin: 0;
        padding: 0;
        left: 0;
        top: -1px;
        font-size: inherit;
        font-style: inherit;
        font-weight: inherit;
        text-transform: inherit;
        color: inherit;
        cursor: pointer;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: 0 0;
        border: 0;
        outline: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=1)";
        filter: alpha(opacity=1);
        opacity: .01
    }

    .date-picker-wrapper .month-wrapper {
        border: 1px solid #bfbfbf;
    //border-radius: 3px;
    //background-color: #fff;
        background-color: #d0d5de;
        padding: 12px 12px 40px 12px;
        cursor: default;
        position: relative;
        _overflow: hidden;
        width:100% !important;
    }

    .date-picker-wrapper .month-wrapper table {
        width: 190px;
        float: left;
        margin-right:20px;;
    }

    .date-picker-wrapper .month-wrapper table.month2 {
        width: 190px;
        float: left
    }

    .date-picker-wrapper .month-wrapper table td,
    .date-picker-wrapper .month-wrapper table th {
        vertical-align: middle;
        text-align: center;
        line-height: 14px;
        margin: 0;
        padding: 0;
        color:#FFF;
        font-weight: normal;
        font-size: 14px;
    }

    .date-picker-wrapper .month-wrapper table .day {
    //padding: 5px 0;
    //line-height: 1;
    //font-size: 12px;
    //margin-bottom: 1px;
    //color: #ccc;
    //cursor: default;
        line-height: 1;
        font-size: 12px;
        color: #ccc;
        cursor: not-allowed;
        padding: 15px;
        border: 1px solid #eee;
        background: #f0f0f0;
    }

    .date-picker-wrapper .month-wrapper table div.day.lastMonth,
    .date-picker-wrapper .month-wrapper table div.day.nextMonth {
        color: #999;
        cursor: default
    }


    .date-picker-wrapper .month-wrapper table .week-name {
        height: 40px;
        line-height: 20px;
        font-weight: 100;
        text-transform: uppercase;
    }

    .date-picker-wrapper .month-wrapper table .day.has-tooltip {
        cursor: help!important
    }

    .date-picker-wrapper .month-wrapper table .day.has-tooltip .tooltip {
        white-space: nowrap
    }

    .date-picker-wrapper .time label {
        white-space: nowrap;
    }

    .date-picker-wrapper .month-wrapper table .day.toMonth.valid {
        color: #333;
        cursor: pointer;
        padding: 15px;
        border: 1px solid #eee;
        background: #FFF;
    }


    .date-picker-wrapper .month-wrapper table .day.lastMonth,
    .date-picker-wrapper .month-wrapper table .day.nextMonth {
        display: none
    }

    .date-picker-wrapper .month-wrapper table .day.real-today {
        background-color: #ffe684
    }

    .date-picker-wrapper .month-wrapper table .day.real-today.checked,
    .date-picker-wrapper .month-wrapper table .day.real-today.hovering {
        background-color: #70ccd5
    }

    .date-picker-wrapper table .caption {
        height: 40px;
        background-color: #4d5567;
        color: #CBCDD0;
        padding: 13px 0px;
        font-size: 15px;
        text-align: center;
    }

    .date-picker-wrapper table .caption>th:first-of-type,
    .date-picker-wrapper table .caption>th:last-of-type {
        width: 27px;
    }
    .date-picker-wrapper table .caption .next,
    .date-picker-wrapper table .caption .prev {
        width:50px;
        height:40px;
        line-height:40px;
        vertical-align: middle;
        display:block;
        cursor: pointer;
        background:#667493;
    }
    .caption .next{
        float:right;
    }
    .date-picker-wrapper table .caption .next:hover,
    .date-picker-wrapper table .caption .prev:hover {
        background-color: #ccc;
        color: #fff
    }

    .date-picker-wrapper .gap {
        position: relative;
        z-index: 1;
        width: 15px;
        height: 100%;
        background-color: red;
        font-size: 0;
        line-height: 0;
        float: left;
        top: -5px;
        margin: 0 10px -10px;
        visibility: hidden;
        height: 0;
        display:none;
    }

    .date-picker-wrapper .gap .gap-lines {
        height: 100%;
        overflow: hidden
    }

    .date-picker-wrapper .gap .gap-line {
        height: 15px;
        width: 15px;
        position: relative
    }

    .date-picker-wrapper .gap .gap-line .gap-1 {
        z-index: 1;
        height: 0;
        border-left: 8px solid #fff;
        border-top: 8px solid #eee;
        border-bottom: 8px solid #eee
    }

    .date-picker-wrapper .gap .gap-line .gap-2 {
        position: absolute;
        right: 0;
        top: 0;
        z-index: 2;
        height: 0;
        border-left: 8px solid transparent;
        border-top: 8px solid #fff
    }

    .date-picker-wrapper .gap .gap-line .gap-3 {
        position: absolute;
        right: 0;
        top: 8px;
        z-index: 2;
        height: 0;
        border-left: 8px solid transparent;
        border-bottom: 8px solid #fff
    }

    .date-picker-wrapper .gap .gap-top-mask {
        width: 6px;
        height: 1px;
        position: absolute;
        top: -1px;
        left: 1px;
        background-color: #eee;
        z-index: 3
    }

    .date-picker-wrapper .gap .gap-bottom-mask {
        width: 6px;
        height: 1px;
        position: absolute;
        bottom: -1px;
        left: 7px;
        background-color: #eee;
        z-index: 3
    }

    .date-picker-wrapper .selected-days {
        display: none
    }

    .date-picker-wrapper .drp_top-bar {
        line-height: 1.4;
        position: relative;
        padding: 10px 40px 10px 0
    }

    .date-picker-wrapper .drp_top-bar .error-top,
    .date-picker-wrapper .drp_top-bar .normal-top {
        display: none
    }

    .date-picker-wrapper .drp_top-bar .default-top {
        display: block
    }

    .date-picker-wrapper .drp_top-bar.error .default-top {
        display: none
    }

    .date-picker-wrapper .drp_top-bar.error .error-top {
        display: block;
        color: red
    }

    .date-picker-wrapper .drp_top-bar.normal .default-top {
        display: none
    }

    .date-picker-wrapper .drp_top-bar.normal .normal-top {
        display: block
    }

    .date-picker-wrapper .drp_top-bar.normal .normal-top .selection-top {
        color: #333
    }

    .date-picker-wrapper .drp_top-bar .apply-btn {
        position: absolute;
        right: 0;
        top: 6px;
        padding: 3px 5px;
        margin: 0;
        font-size: 12px;
        border-radius: 4px;
        cursor: pointer;
        color: #d9eef7;
        border: solid 1px #0076a3;
        background: #0095cd;
        background: -moz-linear-gradient(top, #00adee, #0078a5);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00adee', endColorstr='#0078a5');
        color: #fff;
        line-height: initial
    }

    .date-picker-wrapper .drp_top-bar .apply-btn.disabled {
        cursor: pointer;
        color: #606060;
        border: solid 1px #b7b7b7;
        background: #fff;
        background: -moz-linear-gradient(top, #fff, #ededed);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed')
    }

    .date-picker-wrapper .time {
        position: relative
    }

    .date-picker-wrapper.single-month .time {
        display: block
    }

    .date-picker-wrapper .time input[type=range] {
        vertical-align: middle;
        width: 129px;
        padding: 0;
        margin: 0;
        height: 20px
    }

    .date-picker-wrapper .time1 {
        width: 180px;
        padding: 0 5px;
        text-align: center
    }

    .time2 {
        width: 180px;
        padding: 0 5px;
        text-align: center
    }

    .date-picker-wrapper .time1 {
        float: left
    }

    .date-picker-wrapper .time2 {
        float: right
    }

    .date-picker-wrapper .hour {
        text-align: right
    }

    .minute {
        text-align: right
    }

    .date-picker-wrapper .hide {
        display: none
    }


    .date-picker-wrapper .date-range-length-tip {
        position: absolute;
        margin-top: -4px;
        margin-left: -8px;
        -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .3);
        box-shadow: 0 0 3px rgba(0, 0, 0, .3);
        display: none;
        background-color: #ff0;
        padding: 0 6px;
        border-radius: 2px;
        font-size: 12px;
        line-height: 16px;
        -webkit-filter: drop-shadow(0 0 3px rgba(0, 0, 0, .3));
        -moz-filter: drop-shadow(0 0 3px rgba(0, 0, 0, .3));
        -ms-filter: drop-shadow(0 0 3px rgba(0, 0, 0, .3));
        -o-filter: drop-shadow(0 0 3px rgba(0, 0, 0, .3));
        filter: drop-shadow(0 0 3px rgba(0, 0, 0, .3))
    }

    .date-picker-wrapper .date-range-length-tip:after {
        content: '';
        position: absolute;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid #ff0;
        left: 50%;
        margin-left: -4px;
        bottom: -4px
    }

    .date-picker-wrapper.two-months.no-gap .month1 .next,
    .date-picker-wrapper.two-months.no-gap .month2 .prev {
        display: none
    }

    .date-picker-wrapper .week-number {
        padding: 5px 0;
        line-height: 1;
        font-size: 12px;
        margin-bottom: 1px;
        color: #999;
        cursor: pointer;
        display:none;
    }
    .day.toMonth.valid div[style="padding:0 5px;"]{
        padding:-1px !important;
    }
    .date-picker-wrapper .week-number.week-number-selected {
        color: #49e;
        font-weight: 700
    }

    .day.toMonth.valid div span,.day.toMonth.invalid div span {
        font-weight: normal !important;
        display: block;
        margin-bottom: 12px;
        font-size: 15px;
    }
    .day.toMonth.valid div span+div {
        background: #4D5567;
        color: #FFF;
        opacity: 1 !important;
        padding:7px 5px;
    }
    .day.toMonth.invalid div span{
        opacity: 1 !important;
        padding:7px 5px;
    }
    .week-name th:first-child{
        color:transparent !important;
    }


    .day.toMonth.valid:hover {
        background-color:#4499EE !important;
        color: #fff !important
    }
    .date-picker-wrapper .month-wrapper table .checked {
        background-color: #9cdbf7 !important;
    }
    .date-picker-wrapper.date-range-picker19 .day.first-date-selected { background-color: #4499EE !important;color:#FFF !important; }
    .date-picker-wrapper.date-range-picker19 .day.last-date-selected { background-color: #4499EE !important; color:#FFF !important;}
    .fa-blok{
        display:inline;
        color:#FFF !important;
        text-decoration: none !important;
    }
    @media screen and (max-width: 660px) {

        .date-picker-wrapper .month-wrapper table .day.toMonth.valid,.date-picker-wrapper .month-wrapper table .day.toMonth.invalid{
            padding:8px;
        }
        .month1{
            margin-bottom: 0px;
        }
        .date-picker-wrapper .month-wrapper table{
            width:100%;
            margin-right: 0;
            float:none;
        }
        .date-picker-wrapper .month-wrapper table td, .date-picker-wrapper .month-wrapper table th{
            font-size: 12px;
        }
    }
    @media screen and (max-width: 490px) {

        .day.toMonth.valid div span, .day.toMonth.invalid div span{
            font-size: 12px;
            margin-bottom: 7px;
        }
        .day.toMonth.valid div span+div{
            padding:3px 2px;
        }
        .date-picker-wrapper .month-wrapper{
            padding:0;
        }
    }
    @media screen and (max-width: 446px) {

        .day.toMonth.valid div span+div{
            padding:3px 0;
        }
        .day.toMonth.valid div span, .day.toMonth.invalid div span{
            font-size: 11px;
        }
    }
    @media screen and (max-width: 400px) {
        .date-picker-wrapper .month-wrapper table .day.toMonth.valid, .date-picker-wrapper .month-wrapper table .day.toMonth.invalid{
            padding:5px 5px;
        }
    }
    @media screen and (max-width: 320px) {
        .day.toMonth.valid div span, .day.toMonth.invalid div span{
            font-size: 10px;
            margin-bottom: 12px;
        }

        .date-picker-wrapper .month-wrapper table .day.toMonth.valid, .date-picker-wrapper .month-wrapper table .day.toMonth.invalid{
            padding:2px 0;
        }
        .day.toMonth.valid div span+div{
            font-size: 11px;
        }
    }
    .reserved{
        position: relative;
        overflow: hidden;
    }
    .reserved:before{
        content: "";
        display: block;
        position: absolute;
        z-index: 10;
        background: #551A62;
        opacity: 0.7;
        width: 100%;
        height: 56%;
        top: -4px;
        transform: rotate(116deg);
        overflow: hidden;
        left: -43px;
    }</style>
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
                                                            <input name="checkin" type="text" class="filter" value="" required placeholder="{{__('Giriş')}}" autocomplete="off">
                                                            <i class="icon icon-little-arrow filters-arrow"></i>
                                                        </div>

                                                    </div>

                                                    <div class="check-out calendar-sq" id="rangeend">

                                                        <label class="placeholder" data-placeholder="Çıkış"></label>

                                                        <input name="checkout" type="text" class="filter" value="" required placeholder="{{__('Çıkış')}}" autocomplete="off">

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
                                                <input type="hidden" name="villa_id" value="{{$villa['villa']->id}}" />

                                                <div class="calculations">
                                                    <!--<div class="calc-row">
                                                        <div class="calc-column"><p class="desc">Hasar Depozitosu</p></div>
                                                        <div class="calc-column"><p class="price-sq">{{$villa['villa']->service}}</p></div>
                                                    </div>-->

                                                    <div class="calc-row">
                                                        <div class="calc-column"><p class="desc">Temizlik Ücreti</p></div>
                                                        <div class="calc-column"><p class="price-sq">{{$villa['villa']->cleaning}}</p></div>
                                                    </div>

                                                    <div class="calc-row">
                                                        <div class="calc-column"><p class="desc">Total</p></div>
                                                        <div class="calc-column"><p class="price-sq">&euro;657</p></div>
                                                    </div>
                                                </div>

                                                <button type="button" class="button-sq fullwidth-sq font-weight-extrabold-sq villacheck">Rezervasyon Yap</button>

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
                                    @foreach($services as $service)
                                        @if(in_array($service['id'],$villa_service))
                                            <li>
                                                <div><p>{{@$service['lang']->where('lang_id',$lang_id)->first()->title}}</p></div>
                                            </li>
                                        @endif
                                    @endforeach
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
                            <div class="twelve wide mobile six wide tablet six wide computer">
                                <ul class="description-list">
                                @foreach($properties as $property)
                                    @if(in_array($property['id'],$villa_property))
                                    <li style="width: 30%;">
                                        <i class="icon icon-pin2"></i>
                                        <div><p>{{$property['lang']->where('lang_id',$lang_id)->first()->title}}</p></div>
                                    </li>
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="typo-section-sq bottom-default">
                        <h5>Kiralama Şartları</h5>
                        <div class="ui grid moved">
                            <div class="twelve wide column">
                                <ul class="description-list">
                                    @foreach($regulations as $regulation)
                                    @if(in_array($regulation['id'],$villa_regulation))
                                            <li style="width: 30%;">
                                                <div><p>{{@$regulation['lang']->where('lang_id',$lang_id)->first()->title}}</p></div>
                                            </li>
                                        @endif
                                    @endforeach
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
                        <h3>Takvim</h3>
                    </div>
                </div>
                <div class="ui column side-column"></div>
            </div>
        </div>
        <div class="ui grid xfluid">
            <div class="row">
                <div class="ui twelve wide computer twelve wide tablet column">
                    <input type="hidden" id="date-range12" size="40" value="">
                    <div id="date-range12-container" style="width:100%;"></div>
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
    $(document).ready(function(){
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $('#villaReservation').on('click', '.villacheck', function () {
            let data = $('#villaReservation').serialize()
            $.ajax({
                url: '/villaCheck',
                type: 'POST',
                data: data,
                success: function (data) {
                    if(data.url) {
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
                    var doHighlight = highlightdates.some(function(item) {
                        return (item.isSame(moment(time), 'day') && item.isSame(moment(time), 'month') && item.isSame(moment(time), 'year'))
                    })
                    return '<div ' + (doHighlight ? 'class="highlight"' : '') + ' style="padding:0 5px;">'+
                					'<span style="font-weight:bold">'+ date + '</span>'+
                					'<div style="opacity:0.3;">$'+ Math.round(Math.random() * 999) + '</div>'+
                				'</div>';
                }

            })
    });
</script>
@endsection
