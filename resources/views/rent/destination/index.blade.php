@extends('rent.layouts.light.master')
@section('title', 'Bölgeler - Sunin Turkey')

@section('css')
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/datatables.css')}}">
@endsection

@section('breadcrumb-title')
    <h2>Bölgeler<span> </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Bölgeler</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Bölgeler</h5>
                        <a href="{{'/destination/create'}}">Yeni Bölge Ekle</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-4">
                                <thead>
                                <tr>
                                    <th>Bölge</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($destinations)
                                    @foreach($destinations as $destination)
                                        <tr>
                                            <td>{{$destination->parent.' > '.$destination->title}}</td>
                                            <td></td>
                                            <td>
                                                <a href="{{'/destination/edit/'.$destination->id}}" class="btn btn-shadow-primary">Düzenle</a>
                                                <a href="{{'/destination/delete/'.$destination->id}}" class="btn btn-shadow-warning delete" data-id="{{$destination->id}}">Sil</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Bölge Bulunamadı</td>
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
