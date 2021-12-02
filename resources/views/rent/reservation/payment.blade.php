@extends('rent.layouts.light.master')
@section('title', 'Ödeme - Sunin Turkey')

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
    <h2>Ödeme<span> Sayfası</span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Ödeme Sayfası</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-xl-8 box-col-12">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5>Kredi Kartı </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center"><img class="img-fluid" src="../assets/images/ecommerce/card.png" alt=""></div>
                            <div class="col-md-8">
                                <form class="theme-form mega-form">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Card number">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="date">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Full Name">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
            <!-- Debit Card Starts-->
            <div class="col-xl-4 col-lg-12 col-md-6 box-col-6 debit-card">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5>Debit card </h5>
                    </div>
                    <div class="card-body">
                        <form class="theme-form e-commerce-form row">
                            <div class="form-group col-6 p-r-0">
                                <input class="form-control" type="text" placeholder="Full name here">
                            </div>
                            <div class="form-group col-6">
                                <input class="form-control" type="text" placeholder="Card number">
                            </div>
                            <div class="form-group col-6 p-r-0">
                                <input class="form-control" type="text" placeholder="CVV number">
                            </div>
                            <div class="form-group col-6">
                                <input class="form-control" type="text" placeholder="CVC">
                            </div>
                            <div class="col-12">
                                <label class="col-form-label p-t-0">Expiration Date</label>
                            </div>
                            <div class="form-group col-6 p-r-0">
                                <select class="form-control" size="1">
                                    <option>Select Month</option>
                                    <option>Jan</option>
                                    <option>Fab</option>
                                    <option>March</option>
                                    <option>April</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <select class="form-control" size="1">
                                    <option>Select Year</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2021</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-info-gradien btn-block btn-pill" type="button" data-original-title="btn btn-info-gradien" title="">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Debit Card Ends-->
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