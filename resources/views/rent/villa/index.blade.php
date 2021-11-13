@extends('rent.layouts.light.master')
@section('title', 'Villalar - Sunin Turkey')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h2>Vİllalar<span>Listesi </span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Yönetim</li>
<li class="breadcrumb-item active">Villa Listesi</li>
@endsection
  
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Villa Listesi</h5><span>Tüm <code>Villalar</code> </span>
                </div>
                <div class="table-responsive">
                    <table id="villa" class="table table-border-horizontal">
                        <thead>
                            <tr>
                                <th scope="col">Villa Tipi</th>
                                <th scope="col">Oda</th>
                                <th scope="col">Pool</th>
                                <th scope="col">Deposit</th>
                                <th scope="col">Ücret</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($villa as $result)

                            <tr>
                                <td>{{$result['type']}}</td>
                                <td>{{$result['rooms']}}</td>
                                <td>{{$result['pool']}}</td>
                                <td>{{$result['deposit']}}</td>
                                <td>{{$result['clean_price']}}</td>
                                <td>
                                    <a href="{{'villa/edit'.'/'.$result['id']}}" class="btn btn-shadow-primary">Düzenle</a>
                                    <a class="btn btn-shadow-warning delete" data-id="{{$result['id']}}">Sil</a>
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