@extends('rent.layouts.light.master')
@section('title', 'Sayfa Düzenle - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Sayfa<span>Düzenle </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Sayfa Düzenle</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{$main_page['name']}} <span>(Sayfa Düzenle)</span></h5>
                        <?php //dd($main_page['name'])?>
                    </div>
                    <div class="card-body">
                        <form action="{{route('crm/page/update')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col-md-12"><label class="control-label">Sayfa Resmi Seç</label></div>
                                        <div class="col-md-12"><input class="form-control" type="file" name="photos"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row form-group">
                                        <div class="col-md-12"><label class="control-label">Mevcut Resim</label></div>
                                        <div class="col-md-12"><img class="img-thumbnail" src="{{!empty($page['image']) ? Storage::url($page['image']):Storage::url('noimage-small.jpg')}}" width="120"/></div>
                                        <input name="image" type="hidden" value="{{!empty($page['image']) ? $page['image']:'noimage-small.jpg'}}" />
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
                                            <label class="control-label">Sayfa Adı ({{$lang['code']}})</label>
                                            <input name="title[{{$lang['id']}}]" class="form-control" type="text" value="{{@$page['lang'][$key]['name']}}" placeholder="Sayfa Adı" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Açıklama ({{$lang['code']}})</label>
                                            <textarea name="description[{{$lang['id']}}]" class="form-control editor" id="desc_{{$lang['code']}}">{{@$page['lang'][$key]['description']}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Meta Açıklama ({{$lang['code']}})</label>
                                            <input name="meta[{{$lang['id']}}]" class="form-control" type="text" value="{{@$page['lang'][$key]['meta']}}" placeholder="Meta Açıklama" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Etiketler ({{$lang['code']}})</label>
                                            <input name="tags[{{$lang['id']}}]" class="form-control" type="text" value="{{@$page['lang'][$key]['tags']}}" placeholder="Etiketler" required="required">
                                        </div>
                                    </div>
                                    <?php $i++?>
                                @endforeach
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Durum</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1"{{@$page['status']==1 ? ' selected':null}}>Aktif</option>
                                                <option value="0"{{@$page['status']==0 ? ' selected':null}}>Pasif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <input name="page_id" type="hidden" value="{{$page['id']}}" />
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="submit">Güncelle</button>
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