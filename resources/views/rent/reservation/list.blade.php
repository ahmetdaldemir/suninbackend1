@extends('rent.layouts.light.master')
@section('title', 'Rezervasyonlar - Sunin Turkey')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
@endsection

@section('style')
<style>
</style>
@endsection

@section('breadcrumb-title')
    <h2>Rezervasyonlar<span>Listesi </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Rezervasyonlar Listesi</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Rezervasyonlar</h5><span>Tüm <code>Rezervasyonlar</code> </span>
                    </div>
                    <div class="table-responsive product-table">
                        <table id="villa" class="table table-border-horizontal">
                            <thead>
                            <tr>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">villa_id</th>
                                <th scope="col">Gün</th>
                                <th scope="col">Giriş - Çıkış</th>
                                <th scope="col">Deposit</th>
                                <th scope="col">Ücret</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $result)
                                <tr>
                                    <td>{{$result['fullname']}}</td>
                                    <td>{{$result['villa_id']}}</td>
                                    <td>{{$result['days']}}</td>
                                    <td>{{$result['checkin'] . ' - ' . $result['checkout']}}</td>
                                    <td>{{$result['deposit']}}</td>
                                    <td class="font-success">{{$result['price']}}</td>
                                    <td>
                                        <a href="{{'reservation/payment/'.$result['id']}}" class="btn btn-success">Ödeme Yap</a>
                                        <a href="{{'reservation/'.$result['id']}}" class="btn btn-primary">Düzenle</a>
                                        <a class="btn btn-warning delete" data-id="{{$result['id']}}">Sil</a>
                                        <!--<button class="btn btn-success btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>-->
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
    <script src="{{asset('rent/js/villaApp.js')}}"></script>
@endsection