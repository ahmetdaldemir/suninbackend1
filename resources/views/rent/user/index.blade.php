@extends('rent.layouts.light.master')
@section('title', 'Kullanıcılar - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h2>Kullanıcı<span>Listesi </span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Yönetim</li>
<li class="breadcrumb-item active">Kullanıcı Listesi</li>
@endsection
  
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{!$update ? 'Kullanıcı Ekle':'Kullanıcı Düzenle'}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{!$update ? route('users/store'):route('users/update')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Kullanıcı Adı</label>
                                    <input class="form-control" type="text" name="name" value="{{@$user['name']}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Şifre</label>
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Eposta Adresi</label>
                                    <input class="form-control" type="text" name="email" value="{{@$user['email']}}">
                                </div>
                            </div>
                            @csrf
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="submit">{{!$update ? 'Kaydet':'Güncelle'}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tüm Bloglar</h5>
                </div>
                <div class="table-responsive">
                    <table id="villa" class="table table-border-horizontal">
                        <thead>
                            <tr>
                                <th scope="col">Kullanıcı Adı</th>
                                <th scope="col">Eposta</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($users)
                            @foreach($users as $result)
                            <tr>
                                <td>{{@$result['name']}}</td>
                                <td>{{@$result['email']}}</td>
                                <td>
                                    <a href="{{url('users/roles',['id' => $result['id']])}}" class="btn btn-shadow-primary">Role</a>
                                    <a href="{{'/users/'.$result['id']}}" class="btn btn-shadow-primary">Düzenle</a>
                                    <a href="{{'/user/delete/'.$result['id']}}" class="btn btn-shadow-warning delete" data-id="{{$result['id']}}">Sil</a>
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