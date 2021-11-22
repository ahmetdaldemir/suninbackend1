@extends('rent.layouts.light.master')
@section('title', 'Slider Yönetimi - Sunin Turkey')

@section('css')
@endsection

@section('style')
    <style>
        .detail {display: none;}
        .table.date td {
            border-top: 1px solid #f2f4ff;
            padding: 3px;
            width: 5px;
        }
        .detail b {
            padding-top: 12px;
        }
    </style>
@endsection

@section('breadcrumb-title')
    <h2>Slider<span>Listesi </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Slider Listesi</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{!$update ? 'Slider Ekle':'Slider Düzenle'}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{!$update ? route('slider/store'):route('slider/update')}}" method="POST" enctype="multipart/form-data">
                            @if($update)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Slider Resmi</label>
                                            <img src="{{Storage::url('app/public/blog/' . $slider[0]['image'])}}" width="200"/>
                                            <input name="image" type="hidden" value="{{$slider[0]['image']}}" />
                                        </div>
                                    </div>
                                </div>
                            @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Yüklü Resim</label>
                                            <input class="form-control" type="file" name="photos">
                                        </div>
                                    </div>
                                </div>
                            <ul class="nav nav-tabs nav-material" id="icon-tab" role="tablist">
                                <?php $i=0?>
                                @foreach($languages as $key => $lang)
                                    <li class="nav-item"><a class="nav-link {{$i==0? 'active show':null}}" id="lang-{{$lang['code']}}" data-toggle="tab" href="#lang-{{$lang['id']}}" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-ui-home"></i>{{$lang['title'].' ('.$lang['code'].')'}}</a><div class="material-border"></div></li>
                                    <?php $i++?>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="icon-tabContent">
                                <?php $i=0?>
                                @foreach($languages as $key => $lang)
                                    <div class="tab-pane fade {{$i==0? 'active show':null}}" id="lang-{{$lang['id']}}" role="tabpanel" aria-labelledby="lang-{{$lang['code']}}">
                                        <div class="form-group">
                                            <label class="control-label">Başlık ({{$lang['code']}})</label>
                                            <input name="title[{{$lang['id']}}]" class="form-control" type="text" value="{{@$slider[0]['lang'][$key]['title']}}" placeholder="Başlık" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Yazı 1 ({{$lang['code']}})</label>
                                            <input name="text1[{{$lang['id']}}]" class="form-control" type="text" value="{{@$slider[0]['lang'][$key]['text1']}}" placeholder="Yazı 1" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Yazı 2 ({{$lang['code']}})</label>
                                            <input name="text2[{{$lang['id']}}]" class="form-control" type="text" value="{{@$slider[0]['lang'][$key]['text2']}}" placeholder="Yazı 2" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Yazı 3 ({{$lang['code']}})</label>
                                            <input name="text3[{{$lang['id']}}]" class="form-control" type="text" value="{{@$slider[0]['lang'][$key]['text3']}}" placeholder="Yazı 3" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Seo ({{$lang['code']}})</label>
                                            <input name="seo[{{$lang['id']}}]" class="form-control" type="text" value="{{@$slider[0]['lang'][$key]['seo']}}" placeholder="Yazı 3" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Alt Başlık ({{$lang['code']}})</label>
                                            <textarea name="sub_title[{{$lang['id']}}]" class="form-control editor" id="desc_{{$lang['code']}}">{{@$slider[0]['lang'][$key]['sub_title']}}</textarea>
                                        </div>
                                    </div>
                                    <?php $i++?>
                                @endforeach
                                @csrf
                                @if($update)
                                    <input name="blog_id" type="hidden" value="{{$slider[0]['id']}}" />
                                @endif
                            </div>
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
                            <button class="btn btn-primary nextBtn pull-right" type="submit">{{!$update ? 'Kaydet':'Güncelle'}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Tüm Resimler</h5>
                    </div>
                    <div class="table-responsive">
                        <table id="villa" class="table table-border-horizontal">
                            <thead>
                            <tr>
                                <th scope="col">Resim Başlık</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($sliders)
                                @foreach($sliders as $result)
                                    <tr>
                                        <td>{{@$result['lang'][0]->title}}</td>
                                        <td>
                                            <a href="{{'/slider/'.$result['id']}}" class="btn btn-shadow-primary">Düzenle</a>
                                            <a href="{{'/slider/delete/'.$result['id']}}" class="btn btn-shadow-warning delete" data-id="{{$result['id']}}">Sil</a>
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
    <script src="{{asset('rent/js/typeahead/handlebars.js')}}"></script>
    <script src="{{asset('rent/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{asset('rent/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{asset('rent/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('rent/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('rent/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('rent/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('rent/js/editor/ckeditor/styles.js')}}"></script>
    <script src="{{asset('rent/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('rent/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
    <script src="{{asset('rent/js/sliderApp.js')}}"></script>
@endsection