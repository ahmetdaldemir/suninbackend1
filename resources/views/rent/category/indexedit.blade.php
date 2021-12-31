@extends('rent.layouts.light.master')
@section('title', 'Bölge Düzenle - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Bölge Düzenle<span> </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Bölge Düzenle</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Bölge Düzenle</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('destination/update')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Üst Bölge</label>
                                        <select name="parent_id" class="form-control digits" id="destination_parent" data-id="{{@$result['parent_id']}}">
                                            <option value="0">Ana Bölge</option>
                                            @foreach($destinations as $destination)
                                                <option value="{{$destination->id}}"{{@$result['parent_id'] == $destination->id ? ' selected':null}}>{{$destination->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Bölge Adı</label>
                                                <input class="form-control" type="text" name="title" value="{{$result['title']}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input value="{{$result->id}}" type="hidden" name="id">
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
    <script src="{{asset('rent/js/customCity.js')}}"></script>
@endsection
