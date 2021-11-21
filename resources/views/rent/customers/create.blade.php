@extends('rent.layouts.light.master')
@section('title', 'Müşteri Ekle - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Müşteri Ekle<span> </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Müşteri Ekle</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Müşteri Ekle</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('customers/store')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Adı Soyadı</label>
                                        <input class="form-control" type="text" name="fullName">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Eposta</label>
                                        <input class="form-control" type="text" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Telefon</label>
                                        <input class="form-control" type="text" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Firma Adı</label>
                                        <input class="form-control" type="text" name="taxTitle">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Vergi Dairesi</label>
                                        <input class="form-control" type="text" name="tax">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                        <label for="is_status" class="control-label">Durum</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control digits" name="is_status" id="is_status">
                                            <option value="1">Aktif</option>
                                            <option value="2">Pasif</option>
                                        </select>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            <button class="btn btn-primary nextBtn pull-right" type="submit">Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('script')
    <script src="{{asset('rent/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{asset('rent/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{asset('rent/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('rent/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('rent/js/notify/bootstrap-notify.min.js')}}"></script>
@endsection