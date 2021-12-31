@extends('rent.layouts.light.master')
@section('title', 'Kategoriler - Sunin Turkey')

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
    <li class="breadcrumb-item active">Kategoriler</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Kategoriler</h5>
                        <a href="{{'/category/create'}}">Yeni Kategori Ekle</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-4">
                                <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($categories)
                                    @foreach($categories as $result)
                                        <?php dd($result)?>
                                        <tr>
                                            <td>{{@$result['lang'][0]['title']}}</td>
                                            <td></td>
                                            <td>
                                                <a href="{{'/result/edit/'.$result['id']}}" class="btn btn-shadow-primary">Düzenle</a>
                                                <a href="{{'/result/delete/'.$result['id']}}" class="btn btn-shadow-warning delete" data-id="{{$result['id']}}">Sil</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">kategori Bulunamadı</td>
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
