@extends('rent.layouts.light.master')
@section('title', 'Villalar - Sunin Turkey')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Villalar<span>Villa Ekle </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item">Villa</li>
    <li class="breadcrumb-item active">Villa Ekle</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Wizard And Validation</h5><span>Validation Step Form Wizard</span>
                    </div>
                    <div class="card-body">
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step"><a class="btn btn-primary" href="#step-1">1</a>
                                    <p>Adım 1</p>
                                </div>
                                <div class="stepwizard-step"><a class="btn btn-light" href="#step-2">2</a>
                                    <p>Adım 2</p>
                                </div>
                                <div class="stepwizard-step"><a class="btn btn-light" href="#step-3">3</a>
                                    <p>Adım 3</p>
                                </div>
                                <div class="stepwizard-step"><a class="btn btn-light" href="#step-4">4</a>
                                    <p>Adım 4</p>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('villa/store')}}" method="POST">
                            <div class="setup-content" id="step-1">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="categories" class="control-label">Kategori</label>
                                                    <select name="categories[]" class="form-control digits category-multiple col-sm-12" multiple="multiple" id="categories">
                                                        @foreach($categories as $category)
                                                            <option value="{{$category['id']}}">{{$category['lang'][0]->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Villa Sahibi</label>
                                                    <select name="owner_id" class="form-control digits" id="exampleFormControlSelect9">
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Type</label>
                                                    <select name="type" class="form-control digits" id="exampleFormControlSelect9">
                                                        <option value="VILLA">VILLA</option>
                                                        <option value="APART">APART</option>
                                                        <option value="HOME">HOME</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Kapasite(kişi)</label>
                                                    <input name="capacity" class="form-control" type="number" placeholder="Kapasite(kişi)" required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Yatak Odası Sayısı</label>
                                                    <input name="bedrooms" class="form-control" type="number" placeholder="Yatak Odası Sayısı" required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Banyo Sayısı</label>
                                                    <input name="bathrooms" class="form-control" type="number" placeholder="Banyo Sayısı" required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Havuz Tipi</label>
                                                    <select name="pool" class="form-control digits" id="">
                                                        <option value="NO_POOL">NO_POOL</option>
                                                        <option value="PRIVATE">PRIVATE</option>
                                                        <option value="KIDS_POOL">KIDS_POOL</option>
                                                        <option value="DETACHED_POOl">DETACHED_POOl</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                                            <?php $i=0?>
                                            @foreach($languages as $lang)
                                                <li class="nav-item"><a class="nav-link {{$i==0? 'active show':null}}" id="lang-{{$lang['code']}}" data-toggle="tab" href="#lang-{{$lang['id']}}" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-ui-home"></i>{{$lang['title'].' ('.$lang['code'].')'}}</a></li>
                                                <?php $i++?>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content" id="icon-tabContent">
                                            <?php $i=0?>
                                            @foreach($languages as $lang)
                                                <div class="tab-pane fade {{$i==0? 'active show':null}}" id="lang-{{$lang['id']}}" role="tabpanel" aria-labelledby="lang-{{$lang['code']}}">
                                                    <div class="form-group">
                                                        <label class="control-label">Villa Adı ({{$lang['code']}})</label>
                                                        <input name="title[{{$lang['id']}}]" class="form-control" type="text" placeholder="Villa Adı" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Açıklama ({{$lang['code']}})</label>
                                                        <textarea name="description[{{$lang['id']}}]" class="form-control" id=""></textarea>
                                                    </div>
                                                </div>
                                                <?php $i++?>
                                            @endforeach
                                        </div>
                                        <button class="btn btn-primary nextBtn pull-right" type="button">İleri</button>
                                    </div>
                                </div>
                            </div>
                            <div class="setup-content" id="step-2">
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Adres / Özellik Bilgileri</h4>
                                            <div class="form-group">
                                                <label class="control-label">Bölge</label>
                                                <select name="destination_id" class="form-control digits" id="exampleFormControlSelect9">
                                                    @foreach($destinations as $destination)
                                                        <option value="{{$destination['id']}}">{{$destination['title']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Adres</label>
                                                <input name="address" class="form-control" type="text" placeholder="Adres" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Harita Linki</label>
                                                <input name="map" class="form-control" type="text" placeholder="Harita Linki" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Merkeze Uzaklık</label>
                                                <input name="central_distance" class="form-control" type="text" placeholder="Merkeze Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Restaurantlara Uzaklık</label>
                                                <input name="restaurant_distance" class="form-control" type="text" placeholder="Restaurantlara Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Plaja Uzaklık</label>
                                                <input name="plaj_distance" class="form-control" type="text" placeholder="Plaja Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Hastaneye Uzaklık</label>
                                                <input name="hospital_distance" class="form-control" type="text" placeholder="Hastaneye Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Marketlere Uzaklık</label>
                                                <input name="market_distance" class="form-control" type="text" placeholder="Marketlere Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Otobüs Duraklarına Uzaklık</label>
                                                <input name="bus_station_distance" class="form-control" type="text" placeholder="Otobüs Duraklarına Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Havaalanına Uzaklık</label>
                                                <input name="airport_distance" class="form-control" type="text" placeholder="Havaalanına Uzaklık" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Özellikler</label>
                                            <div class="row checkbox checkbox-solid-success">
                                                @foreach($properties as $property)
                                                    <div class="col-4 col-md-3 col-sm-6">
                                                        <input name="properties[]" id="atribute-{{$property['id']}}" type="checkbox" value="{{$property['id']}}">
                                                        <label for="atribute-{{$property['id']}}">{{$property['lang'][0]->title}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Servisler</label>
                                            <div class="row checkbox checkbox-solid-success">
                                                @foreach($services as $service)
                                                    <div class="col-4 col-md-3 col-sm-6">
                                                        <input name="services[]" id="service-{{$service['id']}}" type="checkbox" value="{{$service['id']}}">
                                                        <label for="service-{{$service['id']}}">{{@json_decode($service['lang'],TRUE)[0]['title']}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group m-t-15">
                                            <label class="control-label">Kurallar</label>
                                            <div class="row checkbox checkbox-solid-success">
                                                @foreach($regulations as $regulation)
                                                    <?php //dd(json_decode($regulation['lang'],TRUE)[0]['title']);?>
                                                    <div class="col-4 col-md-3 col-sm-6">
                                                        <input name="regulation[]" id="rules-{{$regulation['id']}}" type="checkbox" value="{{$regulation['id']}}">
                                                        <label for="rules-{{$regulation['id']}}">{{@json_decode($regulation['lang'],TRUE)[0]['title']}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary nextBtn pull-right" type="button">İleri</button>
                                </div>
                            </div>
                            <div class="setup-content" id="step-3">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Resimler</label>
                                            <input name="photos" class="form-control" type="file" multiple>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Videolar</label>
                                            <input name="videos" class="form-control" type="file" multiple>
                                        </div>
                                        <button class="btn btn-primary nextBtn pull-right" type="button">İleri</button>
                                    </div>
                                </div>
                            </div>
                            <div class="setup-content" id="step-4">
                                @csrf
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <button class="btn btn-success pull-right" type="submit">Kaydı Tamamla!</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')
    <script src="{{asset('rent/js/typeahead/handlebars.js')}}"></script>
    <script src="{{asset('rent/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{asset('rent/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{asset('rent/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('rent/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('rent/js/prism/prism.min.js')}}"></script>
    <script src="{{asset('rent/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('rent/js/counter/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('rent/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('rent/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('rent/js/custom-card/custom-card.js')}}"></script>
    <script src="{{asset('rent/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('rent/js/notify/index.js')}}"></script>
    <script src="{{asset('rent/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('rent/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('rent/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('rent/js/form-wizard/form-wizard-two.js')}}"></script>
    <script src="{{asset('rent/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('rent/js/select2/select2-custom.js')}}"></script>
@endsection