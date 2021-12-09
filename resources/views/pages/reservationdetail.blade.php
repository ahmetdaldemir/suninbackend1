@extends('view_layout')
@section('title', 'Rezervasyon Bilgileri | Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="ui layout" style="margin: 185px 0;">
    <!-- grid -->
    <div class="ui grid container">
        <div class="row">
            <div class="ui twelve wide tablet three wide computer three wide widescreen three wide large screen column">
                <div class="sticky-element sticky-desktop sticky-large-desktop under-ths">
                    <div class="dashboard-sticky">
                        <div class="dashboard-sticky-inner">
                            <div class="dashboard-menu has-submenu">
                                villa detay
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui twelve wide tablet nine wide computer nine wide widescreen nine wide large screen column">
                <div class="typo-header-sq">
                    <div class="ui grid">
                        <div class="row">
                            <div class="ui twelve wide computer column">
                                <h2> Rezervasyon Bilgileri</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{url('register/action')}}" method="POST">
                <div class="ui grid">
                    <div class="row">
                        <div class="ui twelve wide tablet six wide computer six wide widescreen six wide large screen column">
                            <div class="div-c">
                                <div class="divided-column">
                                    <label>Ad Soyad</label>
                                    <input type="text" name="fullname" placeholder="Ad Soyad" value="">
                                </div>
                                <div class="divided-column">
                                    <label>Telefon Numarası</label>
                                    <input type="text" name="phone" placeholder="Phone Number" value="">
                                    <input type="text" placeholder="" value="Cruz">
                                </div>
                                <div class="divided-column">
                                    <label>E-posta Adres</label>
                                    <input type="text" name="username" placeholder="Kullanıcı Adı/e-posta" value="">
                                </div>
                            </div>

                            <br>
                        </div>

                        <div class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                            <hr class="margin-null-sq">
                            <br>
                        </div>

                        <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                            <div class="div-c">
                                <div class="divided-column">
                                    <label>Location</label>
                                    <input type="text" placeholder="" value="Bucharest, Romania">
                                </div>
                            </div>
                        </div>

                        <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                            <div class="div-c">
                                <div class="divided-column">
                                    <label>Phone</label>
                                    <input type="text" placeholder="" value="07*****721">
                                </div>
                            </div>
                        </div>

                        <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                            <div class="div-c inline-3 one-label">
                                <label>Birthday</label>
                                <div class="divided-column">
                                    <select class="dropdown">
                                        <option value="0">01</option>
                                    </select>
                                </div>

                                <div class="divided-column">
                                    <select class="dropdown">
                                        <option value="0">Jan</option>
                                    </select>
                                </div>

                                <div class="divided-column">
                                    <select class="dropdown">
                                        <option value="0">2001</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                            <div class="div-c">
                                <div class="divided-column">
                                    <label>Gender</label>
                                    <select name="dropdown" class="dropdown">
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                            <div class="div-c">
                                <div class="divided-column">
                                    <label>Main Language</label>
                                    <select data-placeholder="Choose a Language..." class="dropdown">
                                        <option value="AF">Afrikanns</option>
                                        <option value="SQ">Albanian</option>
                                        <option value="AR">Arabic</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                            <div class="div-c">
                                <div class="divided-column">
                                    <label>Preferred Currency</label>
                                    <select class="dropdown">
                                        <option value="0">USD</option>
                                        <option value="1">EUR</option>
                                        <option value="2">GBP</option>
                                        <option value="2">RON</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                            <br>
                            <hr>
                            <br>
                        </div>

                        <div class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                            <strong>Optional</strong>
                            <br>
                            <br>

                            <div class="div-c">
                                <div class="divided-column">
                                    <label>Studies</label>
                                    <input type="text" placeholder="" value="Enter your studies">
                                </div>
                            </div>

                            <div class="div-c">
                                <div class="divided-column">
                                    <label>Work</label>
                                    <input type="text" placeholder="" value="Where do you work?">
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


</div>
@endsection
