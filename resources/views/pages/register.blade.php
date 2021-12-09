@extends('view_layout')
@section('title', 'Üye Kayıt | Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="ui layout" style="margin: 185px 0;">
    <div class="ui centered grid container">
        <div class="row">
            <div class="ui six wide computer twelve wide tablet column">
                <h3 class="text-align-center-sq block-sq title-sq">Kayıt Ol</h3>
                <br>
                <form action="{{url('register/action')}}" method="POST">
                <div class="div-c">
                    <div class="divided-column">
                        <input type="text" name="fullname" placeholder="Ad Soyad" value="">
                    </div>

                    <div class="divided-column">
                        <input type="text" name="phone" placeholder="Phone Number" value="">
                    </div>
                    <div class="divided-column">
                        <input type="text" name="username" placeholder="Kullanıcı Adı/e-posta" value="">
                    </div>

                    <div class="divided-column">
                        <input type="password" name="password" placeholder="*********" value="">
                    </div>
                </div>
                <hr>
                <br>
                @csrf
                <button type="submit" class="button-sq fullwidth-sq">Kaydol</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
