@extends('rent.layouts.light.master')
@section('title', 'Kontratlar - Sunin Turkey')

@section('css')
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <style>
        td {
            width: 200px;
        }

        .row-template {
            display: none;
        }

        .row-new, .dynamic {
            width: 250px;
        }

        .row-actions {
            width: 10px;
        }

        .space-column {
            width: auto;
        }
    </style>
@endsection

@section('breadcrumb-title')
    <h2>Kontratlar<span> </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Kontratlar Listesi</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped periods-table">
                                <input type="hidden" name="villa_id" value="{{$villa[0]['id']}}"/>
                                <tbody>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td></td>
                                    <td class="row-template">
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-sm save-period"><i
                                                        class="fa fa-save fa-fw"></i> Kaydet
                                            </button>
                                            <button class="btn btn-warning btn-sm copy-period" title="Kopyala"><i
                                                        class="fa fa-copy fa-fw"></i></button>
                                            <button class="btn btn-danger btn-sm delete-period" title="Sil"><i
                                                        class="fa fa-trash-o fa-fw"></i></button>
                                        </div>
                                    </td>
                                    <td class="row-new">
                                        <button class="btn btn-primary btn-sm bold create-period"><i
                                                    class="fa fa-plus fa-fw"></i> Ekle
                                        </button>
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">Aktif</td>
                                    <td class="row-template">
                                        <select class="form-control" name="is_active">
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </td>
                                    <td class="row-new">
                                        <select class="form-control" name="is_active">
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">Başlangıç Tarihi</td>
                                    <td class="row-template">
                                        <div>
                                            <input name="startDate" type="text"
                                                   class="form-control date-picker max-width-200">
                                        </div>
                                    </td>
                                    <td class="row-new">
                                        <div>
                                            <input name="startDate" type="text"
                                                   class="form-control date-picker max-width-200">
                                        </div>
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">Bitiş Tarihi</td>
                                    <td class="row-template">
                                        <div>
                                            <input name="finishDate" type="text"
                                                   class="form-control date-picker max-width-200">
                                        </div>
                                    </td>
                                    <td class="row-new">
                                        <div>
                                            <input name="finishDate" type="text"
                                                   class="form-control date-picker max-width-200">
                                        </div>
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">Para Birimi</td>
                                    <td class="row-template">
                                        <select name="currency" class="form-control max-width-200" id="currency"
                                                aria-label="Default select example">
                                            @foreach($currencies as $currency)
                                                <option value="{{$currency['id']}}">{{$currency['name']}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="row-new">
                                        <select name="currency" class="form-control max-width-200" id="currency"
                                                aria-label="Default select example">
                                            @foreach($currencies as $currency)
                                                <option value="{{$currency['id']}}">{{$currency['name']}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">Fiyat</td>
                                    <td class="row-template">
                                        <input name="price" type="text" class="form-control max-width-200 price"
                                               id="price">
                                    </td>
                                    <td class="row-new">
                                        <input name="price" type="text" class="form-control max-width-200 price"
                                               id="price" value="0">
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">Komisyon (Sabit Fiyat)</td>
                                    <td class="row-template">
                                        <input name="commission" type="text" class="form-control max-width-200 komisyon"
                                               id="commission" value="0">
                                    </td>
                                    <td class="row-new">
                                        <input name="commission" type="text" class="form-control max-width-200 komisyon"
                                               id="commission" value="0">
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">Depozito Oranı (%)</td>
                                    <td class="row-template">
                                        <input name="deposit" type="text" class="form-control max-width-200 deposit"
                                               id="deposit" value="0">
                                    </td>
                                    <td class="row-new">
                                        <input name="deposit" type="text" class="form-control max-width-200 deposit"
                                               id="deposit" value="0">
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">İndirim Türü</td>
                                    <td class="row-template">
                                        <select name="discount_type" class="form-control max-width-200"
                                                id="discount_type" aria-label="Default select example">
                                            <option value="static">Sabit Fiyat</option>
                                            <option value="percent">Yüzde</option>
                                        </select>
                                    </td>
                                    <td class="row-new">
                                        <select name="discount_type" class="form-control max-width-200"
                                                id="discount_type" aria-label="Default select example">
                                            <option value="static">Sabit Fiyat</option>
                                            <option value="percent">Yüzde</option>
                                        </select>
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">İndirim</td>
                                    <td class="row-template">
                                        <input name="discount" type="text" class="form-control max-width-200"
                                               id="discount" value="0">
                                    </td>
                                    <td class="row-new">
                                        <input name="discount" type="text" class="form-control max-width-200"
                                               id="discount" value="0">
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td scope="row">Min. Gece</td>
                                    <td class="row-template">
                                        <input name="minday" type="text" class="form-control max-width-200" id="minday"
                                               value="1">
                                    </td>
                                    <td class="row-new">
                                        <input name="minday" type="text" class="form-control max-width-200" id="minday"
                                               value="1">
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
                                <tr>
                                    <td class="row-actions"></td>
                                    <td></td>
                                    <td class="row-template">
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-sm bold save-period"><i
                                                        class="fa fa-save fa-fw"></i> Kaydet
                                            </button>
                                            <button class="btn btn-warning btn-sm bold copy-period"
                                                    data-toggle="tooltip" title="Kopyala"><i
                                                        class="fa fa-copy fa-fw"></i></button>
                                            <button class="btn btn-danger btn-sm bold delete-period"
                                                    data-toggle="tooltip" title="Sil"><i
                                                        class="fa fa-trash-o fa-fw"></i></button>
                                        </div>
                                    </td>
                                    <td class=" row-new">
                                        <button class="btn btn-primary btn-sm bold create-period"><i
                                                    class="fa fa-plus fa-fw"></i> Ekle
                                        </button>
                                    </td>
                                    <td class="space-column"></td>
                                </tr>
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
    <script src="/rent/js/datepicker/date-time-picker/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{url('/rent/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('rent/js/contractApp.js')}}"></script>
    <script>
        $(document).ready(function () {
            contract.general();
            contract.periodView('{{$villa[0]['id']}}');
        });
    </script>
@endsection
