@extends('rent.layouts.light.master')
@section('title', 'Kur Yönetimi - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Para<span>Birimleri </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Para Birimleri</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{!$update ? 'Para Birimi Ekle':'Para Birimi Düzenle'}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{!$update ? route('currency/store'):route('currency/update')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Durum</label>
                                        <select class="form-control digits" name="status" id="status">
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            <button class="btn btn-primary nextBtn pull-right" type="submit">{{!$update ? 'Kaydet':'Güncelle'}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Para Birimleri</h5>
                    </div>
                    <div class="table-responsive">
                        <table id="villa" class="table table-border-horizontal">
                            <thead>
                            <tr>
                                <th scope="col">Birim</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($currencies)
                                @foreach($currencies as $result)
                                    <tr>
                                        <td>{{@$result[0]->title}}</td>
                                        <td>
                                            <a href="{{'/currency/'.$result['id']}}" class="btn btn-shadow-primary">Düzenle</a>
                                            <a href="{{'/currency/delete/'.$result['id']}}" class="btn btn-shadow-warning delete" data-id="{{$result['id']}}">Sil</a>
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
@endsection