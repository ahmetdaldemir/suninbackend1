@extends('rent.layouts.light.master')
@section('title', 'Editörün Seçimi Modülü - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Editörün Seçimi Modülü<span>Ayarları </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Editörün Seçimi Modülü</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Editörün Seçimi Modülü Ayarlar<span></span></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('crm/module/update')}}" method="POST" enctype="multipart/form-data">
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
                                            <label class="control-label">Modül Başlık ({{$lang['code']}})</label>
                                            <input name="title[{{$lang['id']}}]" class="form-control" type="text" value="{{@$module['lang'][$key]['name']}}" placeholder="Modül Başlık" required="required">
                                        </div>
                                    </div>
                                    <?php $i++?>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Görüntülenecek Villalar</label>
                                        <div class="row checkbox checkbox-solid-success">
                                            @foreach($villas as $key => $villa)
                                                <div class="col-4 col-md-3 col-sm-6">
                                                    <input name="module[villa][]" value="{{$villa['id']}}" id="inline-{{$key}}" type="checkbox"{{in_array($villa['id'],$content->villa) ? ' checked':null}}>
                                                    <label for="inline-{{$key}}">{{$villa['lang'][0]['title']}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Kaç Adet Gözükecek</label>
                                        <input class="form-control" type="text" name="module[quantity]" value="{{@$content->quantity}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Durum</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1"{{@$module['status']==1 ? ' selected':null}}>Aktif</option>
                                            <option value="0"{{@$module['status']==0 ? ' selected':null}}>Pasif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            <input type="hidden" name="id" value="{{$module['id']}}">
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