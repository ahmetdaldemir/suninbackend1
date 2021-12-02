@extends('rent.layouts.light.master')
@section('title', 'Yorumlar - Sunin Turkey')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
@endsection
@section('style')
<style>
</style>
@endsection
@section('breadcrumb-title')
    <h2>Yorumlar<span>Listesi </span></h2>
@endsection
@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Yorum Listesi</li>
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid"><?php //dd($villa[0]['image'])?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Villa Yorumları <span class="digits">{{$villa[0]['lang'][0]['title']}}</span></h5>
                        <span>...</span>
                    </div>
                    <div class="table-responsive">
                        <table id="villa" class="table table-border-horizontal">
                            <thead>
                                <tr>
                                    <th scope="col">Ad Soyad</th>
                                    <th scope="col">Yorum</th>
                                    <th scope="col">Durum</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($comments)
                                @foreach($comments as $result)
                                <tr>
                                    <td>{{@$result['fullname']}}</td>
                                    <td>{{@$result['description']}}</td>
                                    <td>
                                        @if(@$result['is_status']==1)
                                            <a href="{{'/comment'.'/'.$result['id']}}"><span class='badge badge-success'>Açık</span></a>
                                        @else
                                            <a href="{{'/comment'.'/'.$result['id']}}"><span class="badge badge-danger">Kapalı</span></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{'/comment/delete/'.$result['id']}}" class="btn btn-shadow-warning delete" data-id="{{$result['id']}}">Sil</a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="2">Kayıt Bulunamadı!</td>
                                </tr>
                            @endif
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
    <script src="{{asset('rent/js/jquery.ui.min.js')}}"></script>
    <script src="{{asset('rent/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('rent/js/dragable/sortable.js')}}"></script>
    <script src="{{asset('rent/js/dragable/sortable-custom.js')}}"></script>
    <script src="{{asset('rent/js/CommentsApp.js')}}"></script>
@endsection