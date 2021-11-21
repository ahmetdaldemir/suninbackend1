@extends('rent.layouts.light.master')
@section('title', 'Müşteri Düzenle - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Müşteri Düzenle<span> </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Müşteri Düzenle</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Müşteri Düzenle</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('customers/update')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Adı Soyadı</label>
                                        <input class="form-control" type="text" name="fullName" value="{{$customer->fullName}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Eposta</label>
                                        <input class="form-control" type="text" name="email" value="{{$customer->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Telefon</label>
                                        <input class="form-control" type="text" name="phone" value="{{$customer->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Firma Adı</label>
                                        <input class="form-control" type="text" name="taxTitle" value="{{$customer->taxTitle}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Vergi Dairesi</label>
                                        <input class="form-control" type="text" name="tax" value="{{$customer->tax}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Vergi Numarası</label>
                                        <input class="form-control" type="text" name="taxNumber" value="{{$customer->taxAddress}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Vergi Adresi</label>
                                        <input class="form-control" type="text" name="taxAddress" value="{{$customer->taxAddress}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Adres</label>
                                        <input class="form-control" type="text" name="address" value="{{$customer->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="is_einvoice" class="control-label">E Fatura</label>
                                        <select class="form-control digits" name="is_einvoice" id="is_einvoice">
                                            <option value="1"{{$customer->is_einvoice==1 ? ' selected':null}}>Evet</option>
                                            <option value="0"{{$customer->is_einvoice==0 ? ' selected':null}}>Hayır</option>
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
                                                    <option value="1"{{$customer->is_status==1 ? ' selected':null}}>Aktif</option>
                                                    <option value="0"{{$customer->is_status==0 ? ' selected':null}}>Pasif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input value="{{$customer->id}}" type="hidden" name="id">
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