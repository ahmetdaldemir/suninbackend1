@extends('rent.layouts.light.master')
@section('title', 'Villalar - Sunin Turkey')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
@endsection

@section('style')
<style>
.gallery img {width: 100%;}
</style>
@endsection

@section('breadcrumb-title')
    <h2>Vİllalar<span>Listesi </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Villa Listesi</li>
@endsection

@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Villa Resimleri <span class="digits">İşlemler</span></h5>
                </div>
                <div class="card-body">
                    <div class="row gallery my-gallery" id="aniimated-thumbnials10" itemscope="">
                        <form>
                            <div class="row ui-sortable" id="draggableMultiple">
                            @foreach($images as $image)
                            <figure class="col-md-2 col-3 img-hover hover-11" itemprop="associatedMedia" itemscope=""><a href="{{Storage::url($image['image'])}}" itemprop="contentUrl" data-size="1600x950">
                                <div><img src="{{Storage::url($image['image'])}}" itemprop="thumbnail" alt="Image description"></div></a>
                                <figcaption itemprop="caption description"></figcaption>
                                <input type='hidden' name='sort[]' value='{{$image['id']}}' />
                            </figure>
                            @endforeach
                            </div>
                        </form>
                        <button type="button" class="btn btn-success sort-save">Sıralamayı Kaydet</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@section('script')
    <script src="{{asset('rent/js/jquery.ui.min.js')}}"></script>
    <script src="{{asset('rent/js/dragable/sortable.js')}}"></script>
    <script src="{{asset('rent/js/dragable/sortable-custom.js')}}"></script>
    <script src="{{asset('rent/js/ImagesApp.js')}}"></script>
@endsection