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
                                    <span>{{$guest}} Kişi</span>
                                </p>
                                <p class="product-from">
                                    <span>Giriş Tarihi : </span>{{$checkin}}
                                </p>
                                <p class="product-to">
                                    <span>Çıkış Tarihi : </span>{{$checkout}}
                                </p>
                            </div>

                            <div class="product-extra">
                                <div class="extra-row">
                                    <p class="extra-title">Konaklama Ücreti x {{$day}} Gün</p>
                                    <p class="extra-price">
                                        {{$price}} {{$villa['symbol']}}
                                    </p>
                                </div>
                                <!--
                                <div class="extra-row">
                                    <p class="extra-title">Hasar Depozitosu</p>
                                    <p class="extra-price">
                                        {{$villa['villa']->service}} {{$villa['symbol']}}
                                    </p>
                                </div>-->
                                <div class="extra-row">
                                    <p class="extra-title">Temizlik Ücreti</p>
                                    <p class="extra-price">
                                        {{$villa['villa']->cleaning}} {{$villa['symbol']}}
                                    </p>
                                </div>
                                @if($villa['discount']>0)
                                    <div class="extra-row link-sq">
                                        @if($villa['discount_type']=='static')
                                            <p class="extra-title ">İndirim</p>
                                            <p class="extra-price">-{{@$discount}} {{$villa['symbol']}}</p>
                                        @else
                                            <p class="extra-title ">İndirim - {{$percent}}%</p>
                                            <p class="extra-price">-{{@$discount}} {{$villa['symbol']}}</p>
                                        @endif
                                    </div>
                                @endif
                                <div class="extra-row total-sq">
                                    <p class="extra-title">Ön Ödeme</p>
                                    <p class="extra-price">
                                        {{$prepaid}} {{$villa['symbol']}}
                                    </p>
                                </div>
                                <div class="extra-row total-sq">
                                    <p class="extra-title">Toplam Bedel</p>
                                    <p class="extra-price">
                                        {{$total_price}} {{$villa['symbol']}}
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
                                <h2> Rezervasyon Bilgileri</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{url('reservation/action')}}" method="POST">
                    <div class="ui">
                        <div class="white-section">
                            <h5>Kişisel Bilgiler</h5>
                            <div class="div-c inline-2">
                                <div class="divided-column">
                                    <label>Adınız Soyadınız</label>
                                    <input name="fullname" type="text" placeholder="">
                                </div>

                                <div class="divided-column">
                                    <label>TC Kimlik / Pasaport no</label>
                                    <input name="tc" type="text" placeholder=" ">
                                </div>
                            </div>
                            <div class="div-c inline-2">
                                <div class="divided-column">
                                    <label>E-mail</label>
                                    <input name="email" type="text" placeholder=" ">
                                </div>

                                <div class="divided-column">
                                    <label>Telefon</label>
                                    <input name="phone" type="text" placeholder=" ">
                                </div>
                            </div>
                            <div class="div-c">
                                <label>Adres</label>
                                <input name="address" type="text" placeholder=" ">
                            </div>

                            <div class="div-c inline-2">
                                <div class="divided-column">
                                    <label>Ülke</label>
                                    <select name="country" class="country" required>
                                        @foreach($country as $result)
                                        <option value="{{$result['country_code']}}"{{$result['country_code']=='TR' ? ' selected':null}}>{{$result['country_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="divided-column">
                                    <label>Şehir</label>
                                    <input name="city" type="text" placeholder=" ">
                                </div>
                            </div>
                            @for($i=1;$i<$day;$i++)
                            <div class="div-c">
                                <label>{{$i}}. Misafir Adı Soyadı</label>
                                <input name="guests[]" type="text" placeholder=" ">
                            </div>
                            @endfor
                            <div class="div-c">
                                <label>Notunuz</label>
                                <textarea name="note" cols="30" rows="10" placeholder=" "></textarea>
                            </div><br>
                            <div class="div-c">
                                <input name="newuser" type="checkbox" id="checkbox1" value="1">
                                <label for="checkbox1">Yeni Üyelik Oluştur</label>
                            </div>
                            <br>
                            <div class="div-c">
                                <label style="margin-right:15px;"><a href="">Kiralama şartları ve sözleşmesi</a> ve <a href="">Gizlilik Politikasını</a> okudum, kabul ediyorum.</label>
                                <input name="confirm" type="checkbox" id="checkbox2" value="1">
                                <label for="checkbox2">Kabul Ediyorum</label>
                            </div>
                            @csrf
                            <input type="hidden" name="villa_id" value="{{$villa['id']}}">
                            <input type="hidden" name="checkin" value="{{$checkin}}">
                            <input type="hidden" name="checkout" value="{{$checkout}}">
                            <input type="hidden" name="days" value="{{$day}}">
                            <input type="hidden" name="guest" value="{{$guest}}">
                        </div>
                    </div>
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="submit" id="nextBtn">Rezervasyonu Tamamla</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
@endsection
