@extends('view_layout')
@section('title', 'Sunin Turkey')


@section('style')
    <link rel="stylesheet" href="{{asset("view/custom/font-awesome.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("view/custom/daterangepicker.min.css")}}"/>
@endsection

@section('content')
    <div class="property-section-default">
        <div class="image-wrapper" style="opacity: 1;">
            <div class="image-inner">
                <div class="foto-goster">
                    <span><i class="fa-solid fa-images"></i>Fotoğrafları Görüntüle</span>
                </div>
                <img class="image-sq slick-img"
                     src="{{Storage::url($villa['villa']->image)}}" alt="" data-gallery="gallery"
                     data-caption="Cover Photo"
                     style="width: 1349px; height: 955px; margin-top: -477px; margin-left: 0px; top: 50%; left: 0px;">
                --&gt;
            </div>
        </div>

        <div class="property-main-content">
            <div class="container-xl stackable app layout right side">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <div class="property-genel">
                            <h1 class="title-sq">{{$villa['lang'][0]->title}}</h1>
                            <div class="icons-row">
                                <div class="icons-column1">
                                    <i class="icon icon-location-pin-2"></i> Kaş
                                </div>
                                <div class="icons-column1">
                                    <i class="icon icon-account-group-5"></i>
                                    {{$villa['villa']->capacity}} Guests
                                </div>
                                <div class="icons-column1">
                                    <i class="fa-solid fa-water-ladder"></i>
                                    Özel Havuzlu
                                </div>
                                <div class="icons-column1">
                                    <i class="icon icon-bed-double"></i>
                                    {{$villa['villa']->bedrooms}} Bedrooms
                                </div>
                                <div class="icons-column1">
                                    <i class="icon icon-bath-tub"></i>
                                    {{$villa['villa']->bathrooms}} Baths
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="property-sticky-box-wrapper">
                            <div class="sticky-element sticky-desktop sticky-large-desktop under-ths burger-mobile-modal search-visible ths-is-sticky reverse"
                                 data-burger="menu04" style="height: 0px;">
                                <a href=""
                                   class="modal-trigger close-sq hamburger hamburger-spin item hidden-tablet hidden-desktop hidden-large-desktop"
                                   data-trigger-for="menu04">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
                                </a>

                                <div class="property-sticky-box">
                                    <div class="price-tag-sq">
                                        <span class="price-sq">{{$villa['price']}}<i
                                                    class="fa-solid fa-turkish-lira-sign"></i></span>
                                        <span class="per-sq" data-text-mobile="/ " data-text="">Gecelik</span>
                                    </div>

                                    <div class="button-sq font-weight-extrabold-sq mobile-fixed-trigger hidden-desktop hidden-large-desktop hidden-tablet modal-trigger"
                                         data-trigger-for="menu04">
                                        Rezervasyon Yap
                                    </div>

                                    <div class="mobile-fixed-section">
                                        <div class="sticky-box-content">
                                            <form action="{{url('reservation_detail')}}">
                                                <div class="main-infos inline-check-in">
                                                    <div class="check-in calendar-sq" id="sticky-box-rangestart">
                                                        <label class="placeholder" data-placeholder="Giriş"></label>
                                                        <div class="relative">
                                                            <div class="ui popup calendar-sq">
                                                                <table class="ui celled center aligned unstackable table seven column day">
                                                                    <thead>
                                                                    <tr>
                                                                        <th colspan="7"><span
                                                                            class="link">Mart 2022</span><span
                                                                            class="prev link"><i
                                                                                class="icon icon-arrow-left-122"></i></span><span
                                                                            class="next link"><i
                                                                                class="icon icon-arrow-right-122"></i></span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>P</th>
                                                                        <th>S</th>
                                                                        <th>Ç</th>
                                                                        <th>P</th>
                                                                        <th>C</th>
                                                                        <th>C</th>
                                                                        <th>P</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="link disabled">27</td>
                                                                        <td class="link disabled">28</td>
                                                                        <td class="link">1</td>
                                                                        <td class="link">2</td>
                                                                        <td class="link">3</td>
                                                                        <td class="link">4</td>
                                                                        <td class="link">5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="link today focus">6</td>
                                                                        <td class="link">7</td>
                                                                        <td class="link">8</td>
                                                                        <td class="link">9</td>
                                                                        <td class="link">10</td>
                                                                        <td class="link">11</td>
                                                                        <td class="link">12</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="link">13</td>
                                                                        <td class="link">14</td>
                                                                        <td class="link">15</td>
                                                                        <td class="link">16</td>
                                                                        <td class="link">17</td>
                                                                        <td class="link">18</td>
                                                                        <td class="link">19</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="link">20</td>
                                                                        <td class="link">21</td>
                                                                        <td class="link">22</td>
                                                                        <td class="link">23</td>
                                                                        <td class="link">24</td>
                                                                        <td class="link">25</td>
                                                                        <td class="link">26</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="link">27</td>
                                                                        <td class="link">28</td>
                                                                        <td class="link">29</td>
                                                                        <td class="link">30</td>
                                                                        <td class="link">31</td>
                                                                        <td class="link disabled">1</td>
                                                                        <td class="link disabled">2</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="link disabled">3</td>
                                                                        <td class="link disabled">4</td>
                                                                        <td class="link disabled">5</td>
                                                                        <td class="link disabled">6</td>
                                                                        <td class="link disabled">7</td>
                                                                        <td class="link disabled">8</td>
                                                                        <td class="link disabled">9</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <input type="text" class="filter" name="checkin" value="" required=""
                                                                   placeholder="Tarih">
                                                            <i class="icon1 icon-little-arrow filters-arrow"></i>
                                                        </div>
                                                    </div>

                                                    <div class="check-out calendar-sq" id="sticky-box-rangeend">
                                                        <div class="ui popup calendar-sq">
                                                            <table class="ui celled center aligned unstackable table seven column day">
                                                                <thead>
                                                                <tr>
                                                                    <th colspan="7"><span
                                                                        class="link">Mart 2022</span><span
                                                                        class="prev link"><i
                                                                            class="icon icon-arrow-left-122"></i></span><span
                                                                        class="next link"><i
                                                                            class="icon icon-arrow-right-122"></i></span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>P</th>
                                                                    <th>S</th>
                                                                    <th>Ç</th>
                                                                    <th>P</th>
                                                                    <th>C</th>
                                                                    <th>C</th>
                                                                    <th>P</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="link disabled">27</td>
                                                                    <td class="link disabled">28</td>
                                                                    <td class="link">1</td>
                                                                    <td class="link">2</td>
                                                                    <td class="link">3</td>
                                                                    <td class="link">4</td>
                                                                    <td class="link">5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="link today focus">6</td>
                                                                    <td class="link">7</td>
                                                                    <td class="link">8</td>
                                                                    <td class="link">9</td>
                                                                    <td class="link">10</td>
                                                                    <td class="link">11</td>
                                                                    <td class="link">12</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="link">13</td>
                                                                    <td class="link">14</td>
                                                                    <td class="link">15</td>
                                                                    <td class="link">16</td>
                                                                    <td class="link">17</td>
                                                                    <td class="link">18</td>
                                                                    <td class="link">19</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="link">20</td>
                                                                    <td class="link">21</td>
                                                                    <td class="link">22</td>
                                                                    <td class="link">23</td>
                                                                    <td class="link">24</td>
                                                                    <td class="link">25</td>
                                                                    <td class="link">26</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="link">27</td>
                                                                    <td class="link">28</td>
                                                                    <td class="link">29</td>
                                                                    <td class="link">30</td>
                                                                    <td class="link">31</td>
                                                                    <td class="link disabled">1</td>
                                                                    <td class="link disabled">2</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="link disabled">3</td>
                                                                    <td class="link disabled">4</td>
                                                                    <td class="link disabled">5</td>
                                                                    <td class="link disabled">6</td>
                                                                    <td class="link disabled">7</td>
                                                                    <td class="link disabled">8</td>
                                                                    <td class="link disabled">9</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <label class="placeholder" data-placeholder="Çıkış"></label>

                                                        <input type="text" class="filter" name="checkout" value="" required=""
                                                               placeholder="Tarih">
                                                    </div>

                                                    <div class="guests">
                                                        <label class="placeholder" data-placeholder="Kişi Sayısı"></label>
                                                        <div class="dropdown selection ui" tabindex="0">
                                                            <select name="guest" size="12" required="">
                                                                <option value="1" selected="">1</option>
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
                                                            </select><i class="dropdown icon"></i>
                                                            <div class="text">1</div>
                                                            <div class="menu" tabindex="-1">
                                                                <div class="item active selected" data-value="1">1</div>
                                                                <div class="item" data-value="2">2</div>
                                                                <div class="item" data-value="3">3</div>
                                                                <div class="item" data-value="4">4</div>
                                                                <div class="item" data-value="5">5</div>
                                                                <div class="item" data-value="6">6</div>
                                                                <div class="item" data-value="7">7</div>
                                                                <div class="item" data-value="8">8</div>
                                                                <div class="item" data-value="9">9</div>
                                                                <div class="item" data-value="10">10</div>
                                                                <div class="item" data-value="11">11</div>
                                                                <div class="item" data-value="12">12</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="calculations">
                                                    <div class="calc-row">
                                                        <div class="calc-column">
                                                            <p class="desc">Ön Ödeme</p>
                                                        </div>
                                                        <div class="calc-column">
                                                            <p class="price-sq">
                                                                <i class="fa-solid fa-turkish-lira-sign"></i>657
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="calc-row">
                                                        <div class="calc-column">
                                                            <p class="desc">Toplam Ödeme</p>
                                                        </div>
                                                        <div class="calc-column">
                                                            <p class="price-sq">
                                                                <i class="fa-solid fa-turkish-lira-sign"></i>657
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="button-sq1 fullwidth-sq font-weight-extrabold-sq" type="submit">Rezervasyon Yap</button>
                                                <a href="{{url('reservation_detail')}}"
                                                   class="button-sq1 fullwidth-sq font-weight-extrabold-sq">
                                                    Rezervasyon Yap
                                                </a>
                                            </form>
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
    <div class="container stackable app layout right side">
        <div class="row">
            <div class="col-lg-9" role="main">
                <div class="genel-box">
                    <div class="section-container" id="section-01">
                        <div class="typo-section-sq top-default bottom-default gnl-margin-top">
                            <h3>{{$villa['lang'][0]->title}}</h3>
                            {!! $villa['lang'][0]->description !!}
                            <p class="pool-property">
                                <span>Havuz Ölçüleri:</span>Uzunluk: 8mt. En: 3.5 mt.
                                Derinlik: 155 cm.
                            </p>
                        </div>

                        <div class="typo-section-sq bottom-default">
                            <div class="typo-section-sq">
                                <h3>Genel Özellikler</h3>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <?php $idx = 0?>
                                    @for($i=0;$i < 3;$i++)
                                        <div class="col-md-4 col-sm-6 col-12">
                                            <ul class="description-list">
                                                @for($j=0;$j < 5;$j++)
                                                    <li>
                                                        <i class="fa-solid fa-thumbtack"></i>
                                                        <div>
                                                            <p>{{$properties[$idx]['lang']->where('lang_id',$villa['lang'][0]['id'])->first()->title ?? NULL}}</p>
                                                        </div>
                                                    </li>
                                                    <?php $idx++?>
                                                @endfor
                                            </ul>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="typo-section-sq bottom-default">
                            <div class="typo-section-sq" id="section-05">
                                <h3>Mesafeler</h3>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="mesafe">
                                            <i class="fa-solid fa-plane-departure"></i>
                                            <span>Dalaman Havalimanı</span>
                                            <span>{{$villa['villa']['airport_distance']}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="mesafe">
                                            <i class="fa-solid fa-globe"></i>
                                            <span>Merkez</span>
                                            <span>{{$villa['villa']['central_distance']}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="mesafe">
                                            <i class="fa-solid fa-umbrella-beach"></i>
                                            <span>Kalkan Halk Plajı</span>
                                            <span>{{$villa['villa']['plaj_distance']}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="mesafe">
                                            <i class="fa-solid fa-basket-shopping"></i>
                                            <span>Market</span>
                                            <span>{{$villa['villa']['market_distance']}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="mesafe">
                                            <i class="fa-solid fa-hospital"></i>
                                            <span>Kalkan Sağlık Ocağı</span>
                                            <span>{{$villa['villa']['hospital_distance']}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="mesafe">
                                            <i class="fa-solid fa-utensils"></i>
                                            <span>Restaurant</span>
                                            <span>{{$villa['villa']['restaurant_distance']}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="typo-section-sq bottom-default">
                            <div class="typo-section-sq" id="section-04">
                                <h3>Müsaitlik Takvimi</h3>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 takvim" id="examplecalendar1">
                                            <div class="calendar-sq" tabindex="0">
                                                <table class="ui celled center aligned unstackable table seven column day">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="7">
                                                            <span class="link">Mart 2022</span><span class="prev link">
                                                                <i class="icon icon-arrow-left-122"></i>
                                                            </span>
                                                            <span  class="next link">
                                                                <i class="icon icon-arrow-right-122"></i>
                                                            </span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>P</th>
                                                        <th>S</th>
                                                        <th>Ç</th>
                                                        <th>P</th>
                                                        <th>C</th>
                                                        <th>C</th>
                                                        <th>P</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="link disabled">27</td>
                                                        <td class="link disabled">28</td>
                                                        <td class="link">1</td>
                                                        <td class="link">2</td>
                                                        <td class="link">3</td>
                                                        <td class="link">4</td>
                                                        <td class="link">5</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="link today focus">6</td>
                                                        <td class="link">7</td>
                                                        <td class="link">8</td>
                                                        <td class="link">9</td>
                                                        <td class="link">10</td>
                                                        <td class="link">11</td>
                                                        <td class="link">12</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="link">13</td>
                                                        <td class="link">14</td>
                                                        <td class="link">15</td>
                                                        <td class="link">16</td>
                                                        <td class="link">17</td>
                                                        <td class="link">18</td>
                                                        <td class="link">19</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="link">20</td>
                                                        <td class="link">21</td>
                                                        <td class="link">22</td>
                                                        <td class="link">23</td>
                                                        <td class="link">24</td>
                                                        <td class="link">25</td>
                                                        <td class="link">26</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="link">27</td>
                                                        <td class="link">28</td>
                                                        <td class="link">29</td>
                                                        <td class="link">30</td>
                                                        <td class="link">31</td>
                                                        <td class="link disabled">1</td>
                                                        <td class="link disabled">2</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="link disabled">3</td>
                                                        <td class="link disabled">4</td>
                                                        <td class="link disabled">5</td>
                                                        <td class="link disabled">6</td>
                                                        <td class="link disabled">7</td>
                                                        <td class="link disabled">8</td>
                                                        <td class="link disabled">9</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-12 alt-info-bar">
                                            <ul>
                                                <li>
                                                    <i class="fa-solid fa-square"></i>Boş Günler
                                                </li>
                                                <li><i class="fa-solid fa-square"></i>Dolu</li>
                                                <li><i class="fa-solid fa-square"></i>Rezerve</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="typo-section-sq" id="section-05">
                                <h3>Fiyatlar</h3>
                                <div class="container">
                                    <div class="row">
                                        <div class="villa-fiyat-info">
                                            <div class="row">
                                                <div class="col-sm-9 col-12">
                                                    <div class="konaklama">
                                                        1 Nisan 2022 - 30 Nisan 2022
                                                    </div>
                                                    <div class="min-konak">
                                                        Minimum Kiralama:<span> 5 Gece</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-12 fiyat">
                                                    <div class="konaklama">4.800 TL</div>
                                                    <div class="min-konak">
                                                        <span>Haftalık</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="villa-fiyat-info">
                                            <div class="row">
                                                <div class="col-sm-9 col-12">
                                                    <div class="konaklama">
                                                        1 Nisan 2022 - 30 Nisan 2022
                                                    </div>
                                                    <div class="min-konak">
                                                        Minimum Kiralama:<span> 5 Gece</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-12 fiyat">
                                                    <div class="konaklama">4.800 TL</div>
                                                    <div class="min-konak">
                                                        <span>Haftalık</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="villa-fiyat-info">
                                            <div class="row">
                                                <div class="col-sm-9 col-12">
                                                    <div class="konaklama">
                                                        1 Nisan 2022 - 30 Nisan 2022
                                                    </div>
                                                    <div class="min-konak">
                                                        Minimum Kiralama:<span> 5 Gece</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-12 fiyat">
                                                    <div class="konaklama">4.800 TL</div>
                                                    <div class="min-konak">
                                                        <span>Haftalık</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="villa-fiyat-info">
                                            <div class="row">
                                                <div class="col-sm-9 col-12">
                                                    <div class="konaklama">
                                                        1 Nisan 2022 - 30 Nisan 2022
                                                    </div>
                                                    <div class="min-konak">
                                                        Minimum Kiralama:<span> 5 Gece</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-12 fiyat">
                                                    <div class="konaklama">4.800 TL</div>
                                                    <div class="min-konak">
                                                        <span>Haftalık</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="villa-fiyat-info">
                                            <div class="row">
                                                <div class="col-sm-9 col-12">
                                                    <div class="konaklama">
                                                        1 Nisan 2022 - 30 Nisan 2022
                                                    </div>
                                                    <div class="min-konak">
                                                        Minimum Kiralama:<span> 5 Gece</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-12 fiyat">
                                                    <div class="konaklama">4.800 TL</div>
                                                    <div class="min-konak">
                                                        <span>Haftalık</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="villa-fiyat-info">
                                            <div class="row">
                                                <div class="col-sm-9 col-12">
                                                    <div class="konaklama">
                                                        1 Nisan 2022 - 30 Nisan 2022
                                                    </div>
                                                    <div class="min-konak">
                                                        Minimum Kiralama:<span> 5 Gece</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-12 fiyat">
                                                    <div class="konaklama">4.800 TL</div>
                                                    <div class="min-konak">
                                                        <span>Haftalık</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-container" id="section-02">
                        <div class="typo-section-sq bottom-default">
                            <h3>Fotoğraflar</h3>
                            <div class="photo-grid ui grid-5">
                                <!-- stilleri dinamik olarak düzenlenecek -->

                                <div class="photo-item">
                                    <div class="image-wrapper" style="opacity: 1;">
                                        <img class="image-sq slick-img" src="{{Storage::url($villa['images'][0]->image)}}"
                                             alt="" data-gallery="gallery" data-caption="Photo 02"
                                             style="width: 513px; height: 384px; margin-top: -192px; margin-left: 0px; top: 50%; left: 0px;">
                                    </div>
                                </div>
                                <div class="photo-item">
                                    <div class="image-wrapper" style="opacity: 1;">
                                        <img class="image-sq slick-img" src="{{Storage::url($villa['images'][1]->image)}}"
                                             alt="" data-gallery="gallery" data-caption="Photo 03"
                                             style="width: 513px; height: 384px; margin-top: -192px; margin-left: 0px; top: 50%; left: 0px;">
                                    </div>
                                </div>
                                <div class="photo-item">
                                    <div class="image-wrapper" style="opacity: 1;">
                                        <a data-items="Fotoğrafları Göster(12)">
                                            <img class="image-sq slick-img"
                                                 src="{{Storage::url($villa['images'][2]->image)}}"
                                                 alt="" data-gallery="gallery" data-caption="Photo 04"
                                                 style="width: 342px; height: 257px; margin-top: 0px; margin-left: -171px; top: 0px; left: 50%;">
                                        </a>
                                    </div>
                                </div>
                                <div class="photo-item">
                                    <div class="image-wrapper" style="opacity: 1;">
                                        <img class="image-sq slick-img" src="assets/images/property/property_big_05.jpg"
                                             alt="" data-gallery="gallery" data-caption="Photo 05"
                                             style="width: 684px; height: 513px; margin-top: 0px; margin-left: -342px; top: 0px; left: 50%;">
                                    </div>
                                </div>
                                <div class="photo-item d-none">
                                    <div class="image-wrapper" style="opacity: 1;">
                                        <img class="image-sq slick-img" src="assets/images/property/property_big_05.jpg"
                                             alt="" data-gallery="gallery" data-caption="Photo 06"
                                             style="height: 100px; margin-top: 0px; top: 50%; left: 0px; width: 100px; margin-left: 0px;">
                                    </div>
                                </div>
                                <div class="photo-item d-none">
                                    <div class="image-wrapper" style="opacity: 1;">
                                        <img class="image-sq slick-img" src="assets/images/property/property_big_05.jpg"
                                             alt="" data-gallery="gallery" data-caption="Photo 07"
                                             style="height: 100px; margin-top: 0px; top: 50%; left: 0px; width: 100px; margin-left: 0px;">
                                    </div>
                                </div>
                                <div class="photo-item d-none">
                                    <div class="image-wrapper" style="opacity: 1;">
                                        <img class="image-sq slick-img" src="assets/images/property/property_big_05.jpg"
                                             alt="" data-gallery="gallery" data-caption="Photo 08"
                                             style="height: 100px; margin-top: 0px; top: 50%; left: 0px; width: 100px; margin-left: 0px;">
                                    </div>
                                </div>
                                <!-- stilleri dinamik olarak düzenlenecek -->
                            </div>
                        </div>
                    </div>

                    <div class="section-container" id="section-03">
                        <div class="typo-section-sq">
                            <h3>Konum</h3>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10820.651879292811!2d29.4119601434745!3d36.26380198283328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c02cd0df202115%3A0x75fbdb7bfae9cdf8!2sKalkan%2C%2007580%20Ka%C5%9F%2FAntalya!5e0!3m2!1str!2str!4v1645374380374!5m2!1str!2str"
                                        width="1300" height="400" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @dump($villa)
@endsection