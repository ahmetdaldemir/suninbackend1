@extends('rent.layouts.light.master')
@section('title', 'Sayfalar - Sunin Turkey')

@section('css')
@endsection

@section('style')
    <style>
        .detail {display: none;}
        .table.date td {border-top: 1px solid #f2f4ff;padding: 3px;width: 5px;}
        .detail b {padding-top: 12px;}
    </style>
@endsection

@section('breadcrumb-title')
    <h2>Sayfalar<span>Listesi </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Sayfa Ekle</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Sayfa Ekle</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('page/store')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col-md-12"><label class="control-label">Sayfa Resmi Seç</label></div>
                                        <div class="col-md-12"><input class="form-control" type="file" name="photos"></div>
                                    </div>
                                </div>
                                @if($update)
                                    <div class="col-md-6">
                                        <div class="row form-group">
                                            <div class="col-md-12"><label class="control-label">Mevcut Resim</label></div>
                                            <div class="col-md-12"><img src="{{Storage::url($page[0]['image'])}}" width="120"/></div>
                                            <input name="image" type="hidden" value="{{$page[0]['image']}}" />
                                        </div>
                                    </div>
                                @endif
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
                                            <label class="control-label">Blog Başlık ({{$lang['code']}})</label>
                                            <input name="title[{{$lang['id']}}]" class="form-control" type="text" value="{{@$page[0]['lang'][$key]['title']}}" placeholder="Blog Başlık" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Açıklama ({{$lang['code']}})</label>
                                            <textarea name="description[{{$lang['id']}}]" class="form-control editor" id="desc_{{$lang['code']}}">{{@$page[0]['lang'][$key]['description']}}</textarea>
                                        </div>
                                    </div>
                                    <?php $i++?>
                                @endforeach
                                @csrf
                                @if($update)
                                    <input name="blog_id" type="hidden" value="{{$page[0]['id']}}" />
                                @endif
                            </div>
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
    <script src="{{asset('rent/js/blogApp.js')}}"></script>
    <script>
        $(".editor").each(function () {
            let id = $(this).attr('id');
            CKEDITOR.replace(id, {
                toolbar: [{
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                    {
                        name: 'styles',
                        items: ['Styles', 'Format']
                    },
                    {
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
                    },
                    {
                        name: 'paragraph',
                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                    },
                    {
                        name: 'links',
                        items: ['Link', 'Unlink']
                    },
                    {
                        name: 'tools',
                        items: ['Maximize']
                    },
                    {
                        name: 'editing',
                        items: ['Scayt']
                    }
                ],
            });
        });
    </script>
@endsection