@extends('rent.layouts.light.master')
@section('title', 'Modüller - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Modüller<span> </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Modül Listesi</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Modüller</h5>
                    </div>
                    <div class="table-responsive">
                        <table id="villa" class="table table-border-horizontal">
                            <thead>
                            <tr>
                                <th scope="col">Modül Adı</th>
                                <th scope="col">Durum</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($extension)
                                @foreach($extension as $result)
                                    <tr>
                                        <td>{{@$result['name']}}</td>
                                        <td>
                                            @if(@$result['module']['status']==1)
                                                <span class='badge badge-success'>Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Pasif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <?php //dd($result['module'])?>
                                        @if(empty($result['module']['module_id']))
                                            <a href="{{'/crm/module/store/'.@$result['id']}}" class="btn btn-shadow-primary">Aktifleştir</a>
                                        @else
                                            <a href="{{'/crm/module/edit/'.@$result['module']['id']}}" class="btn btn-shadow-success">Düzenle</a>
                                            <a href="{{'/crm/module/delete/'.@$result['module']['id']}}" class="btn btn-shadow-danger delete" data-id="{{@$result['module']['id']}}">Kaldır</a>
                                        @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="2">Modül Bulunamadı!</td>
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