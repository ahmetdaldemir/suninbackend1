@extends('rent.layouts.light.master')
@section('title', 'Bloglar - Sunin Turkey')

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
<h2>Bloglar<span>Listesi </span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Yönetim</li>
<li class="breadcrumb-item active">Blog Listesi</li>
@endsection
  
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{!$update ? 'Blog Ekle':'Blog Düzenle'}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{!$update ? route('blog/store'):route('blog/update')}}" method="POST" enctype="multipart/form-data">
                        @if($update)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Blog Resmi</label>
                                    <img src="{{Storage::url('app/public/blog/' . $blog[0]['image'])}}" width="200"/>
                                    <input name="image" type="hidden" value="{{$blog[0]['image']}}" />
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Blog Resmi</label>
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
                                        <label class="control-label">Blog Başlık ({{$lang['code']}})</label>
                                        <input name="title[{{$lang['id']}}]" class="form-control" type="text" value="{{@$blog[0]['lang'][$key]['title']}}" placeholder="Blog Başlık" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Açıklama ({{$lang['code']}})</label>
                                        <textarea name="description[{{$lang['id']}}]" class="form-control editor" id="desc_{{$lang['code']}}">{{@$blog[0]['lang'][$key]['description']}}</textarea>
                                    </div>
                                </div>
                                <?php $i++?>
                            @endforeach
                            @csrf
                            @if($update)
                                <input name="blog_id" type="hidden" value="{{$blog[0]['id']}}" />
                            @endif
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="submit">{{!$update ? 'Kaydet':'Güncelle'}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Tüm Bloglar</h5>
                </div>
                <div class="table-responsive">
                    <table id="villa" class="table table-border-horizontal">
                        <thead>
                            <tr>
                                <th scope="col">Blog Başlık</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($blogs)
                            @foreach($blogs as $result)
                            <tr>
                                <td>{{@$result['lang'][0]->title}}</td>
                                <td>
                                    <a href="{{'/blog'.'/'.$result['id']}}" class="btn btn-shadow-primary">Düzenle</a>
                                    <a href="{{'/blog/delete/'.$result['id']}}" class="btn btn-shadow-warning delete" data-id="{{$result['id']}}">Sil</a>
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