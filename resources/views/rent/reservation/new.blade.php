@extends('rent.layouts.light.master')
@section('title', 'Rezervasyon Ekle - Sunin Turkey')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
@endsection

@section('style')
<style>
.detail {display: none;}
.show {display: table-row;}
.table.date td {border-top: 1px solid #f2f4ff;padding: 3px;}
#villa img {width: 70px;}
.style2,.style3,.full{float: left;padding: 3px 7px;width: 35px;border: 1px solid #CCC;text-align: center;font-size: 12px;}
.style2:hover, .style3:hover {background: gray;cursor: pointer;}
.full {border-right: none;border-left: none;color: #ff9292;}
.full + .full{border-right:none;border-left:none;}
td.month {line-height: 30px;width: 115px;text-align: right;}
td.month b {display: block;text-align: right;}
td.space {width: 70px;}
.table.date tr:hover {background: #f9f9f9;}
</style>
@endsection

@section('breadcrumb-title')
    <h2>Rezervasyon<span>Ekle </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Rezervasyon Ekle</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <form action="{{url('reservation/search')}}" method="GET">
                    <div class="card shadow-0 border">
                        <div class="card-header">
                            <h5>Villa </h5><span>Ara <code>Rezervasyon Ekle</code> </span>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-xl-12">
                                    <label class="">Giriş Tarihi</label><div class="input-group">
                                        <input name="checkin" class="datepicker-here form-control digits" type="text" value="{{@$checkin}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xl-12">
                                    <label class="">Çıkış Tarihi</label><div class="input-group">
                                        <input name="checkout" class="datepicker-here form-control digits" type="text" value="{{@$checkout}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xl-12">
                                    <button style="display: block;width: 100%;" class="btn btn-square btn-primary" type="submit" data-original-title="btn btn-pill btn-success" title="">Villa Ara</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <h5>Rezervasyon Ekle</h5><span>Yeni <code>Rezervasyon Ekle</code> </span>
                    </div>
                    <div class="table-responsive product-table">
                        <table id="villa" class="table table-border-horizontal">
                            <thead>
                            <tr>
                                <th scope="col">Resim</th>
                                <th scope="col">Başlık(slug)</th>
                                <th scope="col">Ücret</th>
                                <th scope="col">Deposit</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($villa as $result)
                                <tr>
                                    <td><img width="100" src="{{Storage::url($result['image'])}}"></td>
                                    <td>
                                        <h6> {{@$result['lang'][0]['title']}} ({{@$result['lang'][0]['slug']}})</h6><span><b>Tipi: </b>{{$result['type']}}</span>
                                    </td>
                                    <td>{{$result['clean_price']}}</td>
                                    <td class="font-success">{{$result['rooms']}}</td>
                                    <td>
                                        <a class="btn btn-danger selected" data-id="villa_{{$result['id']}}">Seç</a>
                                    </td>
                                </tr>
                                <tr class="detail villa_{{$result['id']}}">
                                    <td colspan="8">
                                        <form id="InformationForm_{{$result['id']}}" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="villa_id" value="{{$result['id']}}">
                                            <input type="hidden" name="checkin" value="{{$checkin}}">
                                            <input type="hidden" name="checkout" value="{{$checkout}}">
                                            <input type="hidden" name="price" value="{{$price}}">
                                            <input type="hidden" name="deposit" value="{{$deposit}}">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Adı Soyadı</label>
                                                        <input class="form-control" type="text" name="fullName">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Eposta</label>
                                                        <input class="form-control" type="text" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Telefon</label>
                                                        <input class="form-control" type="text" name="phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Firma Adı</label>
                                                        <input class="form-control" type="text" name="taxTitle">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Vergi Dairesi</label>
                                                        <input class="form-control" type="text" name="tax">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Vergi Numarası</label>
                                                        <input class="form-control" type="text" name="taxNumber">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Vergi Adresi</label>
                                                        <input class="form-control" type="text" name="taxAddress">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Adres</label>
                                                        <input class="form-control" type="text" name="address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="is_einvoice" class="control-label">E Fatura</label>
                                                        <select class="form-control digits" name="is_einvoice" id="is_einvoice">
                                                            <option value="1">Evet</option>
                                                            <option value="2">Hayır</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            @csrf
                                            <button class="btn btn-primary nextBtn pull-right check" type="button" data-id="{{$result['id']}}">Kaydet</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
    <script src="{{asset('rent/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('rent/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('rent/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('rent/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('rent/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('rent/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('rent/js/PaymentApp.js')}}"></script>
@endsection