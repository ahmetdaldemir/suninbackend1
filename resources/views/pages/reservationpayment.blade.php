@extends('view_layout')
@section('title', 'Rezervasyon Bilgileri | Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="ui layout" style="margin: 185px 0;">
    <!-- grid -->
    <div class="ui grid container">
        <div class="row">
            <div class="ui twelve wide tablet three wide computer three wide widescreen three wide large screen column">
                <div class="row">
                    <div class="ui twelve wide computer column">
                        <h5>{{$villa['lang'][0]->title}}</h5>
                        <div class="product-payment-item">

                            <div class="product-details">
                                <img class="product-image" src="{{Storage::url($villa['image'])}}" alt="{{$villa['image']}}">

                                <p class="product-title">
                                    {{$villa['lang'][0]->title}}
                                </p>
                            </div>

                            <div class="product-dates">
                                <p class="product-from">
                                    <span>Giriş Tarihi : </span>{{$checkin}}
                                </p>
                                <p class="product-to">
                                    <span>Çıkış Tarihi : </span>{{$checkout}}
                                </p>
                            </div>

                            <div class="product-extra">
                                <div class="extra-row">
                                    <p class="extra-title">Konaklama Ücreti x {{$days}} Gün</p>
                                    <p class="extra-price">
                                        {{$price_day*$days}} {{$villa['symbol']}}
                                    </p>
                                </div>
                                <div class="extra-row">
                                    <p class="extra-title">Temizlik Depozitosu</p>
                                    <p class="extra-price">
                                        {{$cleaning}} {{$villa['symbol']}}
                                    </p>
                                </div>
                                @if($discount>0)
                                    <div class="extra-row link-sq">
                                        <p class="extra-title ">İndirim</p>
                                        <p class="extra-price">-{{@$discount}} {{$villa['symbol']}}</p>
                                    </div>
                                @endif
                                <div class="extra-row total-sq">
                                    <p class="extra-title">Ödenecek Tutar</p>
                                    <p class="extra-price">
                                        {{$deposit}} {{$villa['symbol']}}
                                    </p>
                                </div>
                                <div class="extra-row total-sq">
                                    <p class="extra-title">Kalan Ödeme</p>
                                    <p class="extra-price">
                                        {{$total_price-$deposit}} {{$villa['symbol']}}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="ui twelve wide tablet nine wide computer nine wide widescreen nine wide large screen column">
                <div class="typo-header-sq">
                    <div class="ui grid">
                        <div class="row">
                            <div class="ui twelve wide computer column">
                                <h2> Ödeme Bilgileri</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui accordion fluid styled">
                    <div class="title accordion-trigger active">
                        <i class="icon arrow-sq"></i>Kredi Kartı/Banka Kartı ile Ödeme
                    </div>
                    <div class="content active">
                        <form action="#" method="POST">
                            <div class="ui">
                                <div class="white-section">
                                    <div class="white-section">
                                        <h5>Kart Bilgileri</h5>
                                        <div class="div-c inline-2">
                                            <div class="divided-column">
                                                <label>Kartın Üzerindeki İsim</label>
                                                <input type="text" placeholder="">
                                            </div>

                                            <div class="divided-column">
                                                <label>Kart Numarası</label>
                                                <input type="text" placeholder=" ">
                                            </div>
                                        </div>

                                        <div class="div-c inline-2">
                                            <div class="divided-column">
                                                <label>Son Kullanma Tarihi</label>
                                                <select>
                                                    <option value="">Ay</option>
                                                    <option value="">01</option>
                                                    <option value="">02</option>
                                                </select>
                                            </div>

                                            <div class="divided-column">
                                                <label>&nbsp;</label>
                                                <select>
                                                    <option value="">Yıl</option>
                                                    <option value="">2022</option>
                                                    <option value="">2023</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="div-c inline-2">
                                            <div class="divided-column">
                                                <img src="/storage/visamaster.png">
                                            </div>

                                            <div class="divided-column">
                                                <label>Güvenlik Kodu</label>
                                                <input type="text" placeholder=" ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="div-c">
                                        <label style="margin-right:15px;"><a href="">Satış sözleşmesi</a>ni anladım, okudum, kabul ediyorum.</label>
                                        <input name="confirm" type="checkbox" id="checkbox2" value="1">
                                        <label for="checkbox2">Kabul Ediyorum</label>
                                    </div>
                                </div>
                            </div>
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="submit" id="nextBtn">Ödeme Yap</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="title accordion-trigger">
                        <i class="icon arrow-sq"></i>Havale/Eft ile Ödeme
                    </div>
                    <div class="content">
                        <p>Ödeme Bilgileri - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. Donec non quam vitae justo mattis vestibulum a nec nisi. Morbi mi felis, ultrices vitae risus consectetur, porta ultrices sapien</p>
                    </div>

                    <div class="title accordion-trigger">
                        <i class="icon arrow-sq"></i>Diğer
                    </div>
                    <div class="content">
                        <p>Diğer Ödeme Seçeneği - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. Donec non quam vitae justo mattis vestibulum a nec nisi. Morbi mi felis, ultrices vitae risus consectetur, porta ultrices sapien</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
