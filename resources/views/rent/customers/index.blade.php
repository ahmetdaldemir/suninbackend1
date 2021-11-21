@extends('rent.layouts.light.master')
@section('title', 'Müşteriler - Sunin Turkey')

@section('css')
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/datatables.css')}}">
@endsection

@section('breadcrumb-title')
    <h2>Müşteriler<span> </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Müşteriler</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Müşteriler</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-4">
                                <thead>
                                <tr>
                                    <th>Ad Soyad</th>
                                    <th>Eposta</th>
                                    <th>Telefon</th>
                                    <th>Durum</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($customers)
                                @foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->fullName}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->is_status}}</td>
                                    <td>
                                        <a href="{{'/customers/edit/'.$customer['id']}}" class="btn btn-shadow-primary">Düzenle</a>
                                        <a href="{{'/customers/delete/'.$customer['id']}}" class="btn btn-shadow-warning delete" data-id="{{$customer['id']}}">Sil</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Müşteri Bulunamadı</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('script')
    <!-- Plugins JS start-->
    <script src="{{asset('rent/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('rent/js/datatable/datatables/datatable.custom.js')}}"></script>
    <!-- Plugins JS Ends-->
    <script src="{{asset('rent/js/typeahead/handlebars.js')}}"></script>
    <script src="{{asset('rent/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{asset('rent/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{asset('rent/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('rent/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('rent/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('rent/js/MessageApp.js')}}"></script>
@endsection