@extends('rent.layouts.light.master')
@section('title', 'Villalar - Sunin Turkey')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
@endsection
@section('style')
<style>
.gallery img {width: 100%;}
.image-select {
position: absolute;
cursor:pointer;
right: 14px;
bottom: 0;
background: white;
padding: 3px 10px;
font-size: 24px;
border-radius: 15px 0;
}
.image-remove {position: absolute;cursor: pointer;right: 14px;top: 0;background: white;padding: 3px 7px 10px 15px;font-weight: bold;color: red;border-radius: 0 0 0 40px;}
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
<div class="container-fluid"><?php //dd($villa[0]['image'])?>
    <div class="row">
        <div class="col-3 col-sm-3 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5>Resim Yükle</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('villa/images/save')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Villa Resmi</label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                        </div>
                        @csrf
                        <input name="villa_id" type="hidden" value="{{$villa[0]['id']}}" />
                        <button class="btn btn-primary nextBtn pull-right" type="submit">Resmi Ekle</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    <h5>Villa Resimleri <span class="digits">{{$villa[0]['lang'][0]['title']}}</span></h5>
                    <span>Resimleri sürükle bırak yöntemi ile sıralama yapabilir, sağ üst köşeden (x) simgesine tıklayarak silebilir ve sağ alt köşedeki kutucuğu işaretleyerek ana resim belirleyebilirsiniz.</span>
                </div>
                <div class="card-body">
                    <div class="row gallery my-gallery" id="aniimated-thumbnials10" itemscope="">
                        <form>
                            <div class="row ui-sortable" id="draggableMultiple">
                            @foreach($images as $image)
                            <figure class="col-md-2 col-3 img-hover hover-11 img_{{$image['id']}}" itemprop="associatedMedia" itemscope=""><a href="{{Storage::url($image['image'])}}" itemprop="contentUrl" data-size="1600x950">
                                <div><img src="{{Storage::url($image['image'])}}" itemprop="thumbnail"></div></a>
                                <figcaption itemprop="caption description"></figcaption>
                                <div class="image-select main-image-select" data-id="{{$villa[0]['id']}}" data-image="{{$image['image']}}"><?php echo $villa[0]['image'] != $image['image'] ? "<i class='fa fa-square-o'></i>":"<i class='fa fa-check-square'></i>"?></div>
                                <div class="image-remove" data-id="{{$image['id']}}" data-image="{{$image['image']}}">x</div>
                                <input type='hidden' name='sort[]' value='{{$image['id']}}'/>
                            </figure>
                            @endforeach
                            </div>
                        </form>
                        <div class="col-12">
                            <button type="button" class="btn btn-success pull-right sort-save">Sıralamayı Kaydet</button>
                        </div>
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
    <script src="{{asset('rent/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('rent/js/dragable/sortable.js')}}"></script>
    <script src="{{asset('rent/js/dragable/sortable-custom.js')}}"></script>
    <script src="{{asset('rent/js/ImagesApp.js')}}"></script>
@endsection