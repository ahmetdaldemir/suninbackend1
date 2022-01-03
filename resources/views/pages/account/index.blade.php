@extends('view_layout')
@section('title', 'Sunin Turkey')
@section('css')
@endsection

@section('style')
@endsection
@section('content')
    <div class="ui layout" style="    margin: 100px 0;">

        <!-- grid -->
        <div class="ui grid container">

            <div class="row">

                 @include('pages.account.menu')

                <div class="ui twelve wide tablet nine wide computer nine wide widescreen nine wide large screen column">

                    <div class="typo-header-sq">
                        <div class="ui grid">
                            <div class="row">
                                <div class="ui twelve wide computer column">
                                    <h2>My
                                        Profile </h2>
                                </div>



                            </div>

                        </div>
                    </div>

                    <div class="ui grid">
                        <div class="row">

                            <div class="ui twelve wide tablet  wide computer  wide widescreen  wide large screen column">

                                <div class="div-c">
                                    <div class="divided-column">
                                        <label>İsim Soyisim</label>
                                        <input type="text" name="fullName" value="{{\Illuminate\Support\Facades\Auth::guard('web-user')->user()->fullName}}">
                                    </div>
                                </div>
                                <br>
                                <div class="div-c">
                                    <div class="divided-column">
                                        <label>Adres</label>
                                        <input type="text" name="address" value="{{\Illuminate\Support\Facades\Auth::guard('web-user')->user()->address}}">
                                    </div>
                                </div>

                            </div>

                            <div class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                                <hr class="margin-null-sq">
                                <br>
                            </div>

                            <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                <div class="div-c">
                                    <div class="divided-column">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{\Illuminate\Support\Facades\Auth::guard('web-user')->user()->email}}">
                                    </div>
                                </div>
                            </div>

                            <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                <div class="div-c">
                                    <div class="divided-column">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="{{\Illuminate\Support\Facades\Auth::guard('web-user')->user()->phone}}">
                                    </div>
                                </div>
                            </div>


                            <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                                <div class="div-c">
                                    <div class="divided-column">
                                        <label>Vergi Dairesi</label>
                                        <input type="text" name="phone" value="{{\Illuminate\Support\Facades\Auth::guard('web-user')->user()->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">

                            <div class="div-c">
                                    <div class="divided-column">
                                        <label>Vergi No</label>
                                        <input type="text" name="phone" value="{{\Illuminate\Support\Facades\Auth::guard('web-user')->user()->phone}}">
                                    </div>
                                </div>
                                <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">

                                <div class="div-c">
                                    <div class="divided-column">
                                        <label>Başlık</label>
                                        <input type="text" name="phone" value="{{\Illuminate\Support\Facades\Auth::guard('web-user')->user()->phone}}">
                                    </div>
                                </div></div>
                                    <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">

                                    <div class="div-c">
                                    <div class="divided-column">
                                        <label>İl </label>
                                        <input type="text" name="phone" value="{{\Illuminate\Support\Facades\Auth::guard('web-user')->user()->phone}}">
                                    </div>
                                </div>
                                    </div>
                                        <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">

                                        <div class="div-c">
                                    <div class="divided-column">
                                        <label>İlçe</label>
                                        <input type="text" name="phone" value="{{\Illuminate\Support\Facades\Auth::guard('web-user')->user()->phone}}">
                                    </div>
                                </div>
                                        </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection