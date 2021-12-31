@extends('rent.layouts.light.master')
@section('title', 'Villa Düzenle - Sunin Turkey')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/select2.css')}}">
@endsection

@section('style')
    <style>
        .select2 {width: 100%!important;}
    </style>
@endsection

@section('breadcrumb-title')
    <h2>Villalar<span>Villa Düzenle </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item">Villa</li>
    <li class="breadcrumb-item active">Villa Düzenle</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid"><?php //dd($villa[0])?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Villa Düzenle</h5><span>...</span>
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
                            </div>
                        </div>
                        <form action="{{route('villa/update')}}" method="POST">
                            <div class="setup-content" id="step-1">
                                <input name="villa_id" type="hidden" value="{{$villa[0]['id']}}">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="categories" class="control-label">Kategori</label>
                                                    <select name="categories[]" class="form-control digits category-multiple col-sm-12" multiple="multiple" id="categories">
                                                        @foreach($categories as $category)
                                                            <option value="{{$category['id']}}"{{in_array($category['id'],$villa_category) ? ' selected':null}}>{{$category['lang'][0]->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Villa Sahibi</label>
                                                    <select name="tenant_id" class="form-control digits" id="exampleFormControlSelect9" required>
                                                        <option>Seçiniz</option>
                                                        @foreach($tenants as $tenant)
                                                            <option value="{{$tenant['id']}}"{{$villa[0]['tenant_id'] == $tenant['id'] ? ' selected':null}}><?=$tenant['title']?></option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Type</label>
                                                    <select name="type" class="form-control digits" id="exampleFormControlSelect9">
                                                        <option value="VILLA"{{$villa[0]['type'] == 'VILLA' ? ' selected':null}}>VILLA</option>
                                                        <option value="APART"{{$villa[0]['type'] == 'APART' ? ' selected':null}}>APART</option>
                                                        <option value="HOME"{{$villa[0]['type'] == 'HOME' ? ' selected':null}}>HOME</option>
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
                                            @foreach($languages as $key => $lang)
                                                <div class="tab-pane fade {{$i==0? 'active show':null}}" id="lang-{{$lang['id']}}" role="tabpanel" aria-labelledby="lang-{{$lang['code']}}">
                                                    <div class="form-group">
                                                        <label class="control-label">Villa Adı ({{$lang['code']}})</label>
                                                        <input name="title[{{$lang['id']}}]" class="form-control" type="text" value="{{$villa[0]['lang'][$key]['title']}}" placeholder="Villa Adı" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Villa Ek Yazı ({{$lang['code']}})</label>
                                                        <input name="sub[{{$lang['id']}}]" class="form-control" type="text" value="{{$villa[0]['lang'][$key]['sub']}}" placeholder="Villa Ek Yazı" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Açıklama ({{$lang['code']}})</label>
                                                        <textarea name="description[{{$lang['id']}}]" class="form-control editor" id="desc_{{$lang['id']}}">{{$villa[0]['lang'][$key]['description']}}</textarea>
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
                                    <h4>Adres Bilgileri</h4>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Şehir</label>
                                                <select name="destination_id[city]" class="form-control digits" id="country_select" data-id="{{@$villa[0]['destination_id']->city}}">
                                                    @foreach($destinations as $destination)
                                                        <option value="{{$destination['id']}}"{{@$villa[0]['destination_id']->city == $destination['id'] ? ' selected':null}}>{{$destination['title']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">İlçe</label>
                                                <select name="destination_id[state]" class="form-control digits" id="city_select" data-id="{{@$villa[0]['destination_id']->state}}" disabled>
                                                    <option>Şehir Seçiniz</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Semt</label>
                                                <select name="destination_id[semt]" class="form-control digits" id="state_select" data-id="{{@$villa[0]['destination_id']->semt}}" disabled>
                                                    <option>İlçe Seçiniz</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Bölge</label>
                                                <select name="destination_id[region]" class="form-control digits" id="semt_select" data-id="{{@$villa[0]['destination_id']->region}}" disabled>
                                                    <option>Semt Seçiniz</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Adres</label>
                                                <input name="address" class="form-control" type="text" value="{{$villa[0]['address']}}" placeholder="Adres" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Harita Linki</label>
                                                <input name="map" class="form-control" type="text" value="{{$villa[0]['map']}}" placeholder="Harita Linki" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <h4>Ücretler</h4>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Depozito Ücreti</label>
                                                <input name="deposit" class="form-control" type="text" value="{{$villa[0]['deposit']}}" placeholder="Depozito">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Temizlik Ücreti</label>
                                                <input name="cleaning" class="form-control" type="text" value="{{$villa[0]['cleaning']}}" placeholder="Depozito">
                                            </div>
                                        </div>
                                    </div>
                                    <h4>Villa Bilgileri</h4>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Oda Sayısı</label>
                                                <input name="rooms" class="form-control" type="number" value="{{$villa[0]['rooms']}}" placeholder="Oda Sayısı" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Kapasite(kişi)</label>
                                                <input name="capacity" class="form-control" type="number" value="{{$villa[0]['capacity']}}" placeholder="Kapasite(kişi)" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Yatak Odası Sayısı</label>
                                                <input name="bedrooms" class="form-control" type="number" value="{{$villa[0]['bedrooms']}}" placeholder="Yatak Odası Sayısı" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Banyo Sayısı</label>
                                                <input name="bathrooms" class="form-control" type="number" value="{{$villa[0]['bathrooms']}}" placeholder="Banyo Sayısı" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Merkeze Uzaklık</label>
                                                <input name="central_distance" class="form-control" value="{{$villa[0]['central_distance']}}" type="number" placeholder="Merkeze Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Restaurantlara Uzaklık</label>
                                                <input name="restaurant_distance" class="form-control" value="{{$villa[0]['restaurant_distance']}}" type="number" placeholder="Restaurantlara Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Plaja Uzaklık</label>
                                                <input name="plaj_distance" class="form-control" value="{{$villa[0]['plaj_distance']}}" type="number" placeholder="Plaja Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Hastaneye Uzaklık</label>
                                                <input name="hospital_distance" class="form-control" value="{{$villa[0]['hospital_distance']}}" type="number" placeholder="Hastaneye Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Marketlere Uzaklık</label>
                                                <input name="market_distance" class="form-control" value="{{$villa[0]['market_distance']}}" type="number" placeholder="Marketlere Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Otobüs Duraklarına Uzaklık</label>
                                                <input name="bus_station_distance" class="form-control" value="{{$villa[0]['bus_station_distance']}}" type="number" placeholder="Otobüs Duraklarına Uzaklık" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Havaalanına Uzaklık</label>
                                                <input name="airport_distance" class="form-control" value="{{$villa[0]['airport_distance']}}" type="number" placeholder="Havaalanına Uzaklık" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Video Link</label>
                                                <input name="videos" class="form-control" type="text" value="{{$villa[0]['videos']}}" placeholder="Video Linki">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Havuz Tipi</label>
                                                <select name="pool[]" class="form-control digits category-multiple col-sm-12" multiple="multiple" id="pool">
                                                    <option value="NO_POOL"{{in_array('NO_POOL',@$villa[0]['pool']) ? ' selected':null}}>NO_POOL</option>
                                                    <option value="PRIVATE"{{in_array('PRIVATE',@$villa[0]['pool']) ? ' selected':null}}>PRIVATE</option>
                                                    <option value="KIDS_POOL"{{in_array('KIDS_POOL',@$villa[0]['pool']) ? ' selected':null}}>KIDS_POOL</option>
                                                    <option value="DETACHED_POOl"{{in_array('DETACHED_POOl',@$villa[0]['pool']) ? ' selected':null}}>DETACHED_POOl</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary nextBtn pull-right" type="button">İleri</button>
                            </div>
                            <div class="setup-content" id="step-3">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Özellikler</label>
                                            <div class="row checkbox checkbox-solid-success">
                                                @foreach($properties as $property)
                                                    <div class="col-4 col-md-3 col-sm-6">
                                                        <input name="properties[]" id="atribute-{{$property['id']}}" type="checkbox" value="{{$property['id']}}"{{in_array($property['id'],@$villa_property) ? ' checked':null}}>
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
                                                        <input name="services[]" id="service-{{$service['id']}}" type="checkbox" value="{{$service['id']}}"{{in_array($service['id'],@$villa_service) ? ' checked':null}}>
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
                                                        <input name="regulation[]" id="rules-{{$regulation['id']}}" type="checkbox" value="{{$regulation['id']}}"{{in_array($regulation['id'],@$villa_regulation) ? ' checked':null}}>
                                                        <label for="rules-{{$regulation['id']}}">{{@json_decode($regulation['lang'],TRUE)[0]['title']}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <button class="btn btn-success pull-right" type="submit">Kaydı Tamamla!</button>
                                    </div>
                                </div>
                                @csrf
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
<script src="{{asset('rent/js/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('rent/js/editor/ckeditor/styles.js')}}"></script>
<script src="{{asset('rent/js/editor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('rent/js/customCity.js')}}"></script>
<script>
        country.trigger("change");
        city.trigger("change");
        state.trigger("change");

        $(".editor").each(function () {
            let id = $(this).attr('id');
            CKEDITOR.replace(id, {
                toolbar: [{
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                    {
                        name: 'styles',
                        items: ['Styles', 'Format']
                    },
                    {
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
                    },
                    {
                        name: 'paragraph',
                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                    },
                    {
                        name: 'links',
                        items: ['Link', 'Unlink']
                    },
                    {
                        name: 'tools',
                        items: ['Maximize']
                    },
                    {
                        name: 'editing',
                        items: ['Scayt']
                    }
                ],
            });
        });
    </script>
@endsection
