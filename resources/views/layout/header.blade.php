<header class="header-section ths header-shadow header-sticky header-slide-up equal-tablet-header-items equal-mobile-header-items ">
    <?php use Illuminate\Support\Facades\Auth;  ?>
    <div class="header-content">
        <div class="ui container-fluid header-top">
            <div class="ui container header-box">
                <div class="top-1">Bizi Takip Edin : <img src="{{asset('view/images/facebook.svg')}}">
                    <img src="{{asset('view/images/instagram.svg')}}">
                    <img src="{{asset('view/images/twitter.svg')}}"></div>
                <div class="top-2"><img src="{{asset('view/images/clock.svg')}}" style="margin-right: 20px;">
                    <img src="{{asset('view/images/phone.svg')}}"></div>
                <div class="top-3">
                <!--<a href="{{route('add_listing')}}" class="button-sq-top">Evini Kirala  <i class="icon icon-add-wishlist"></i></a>-->
                </div>
            </div>
        </div>
        <div class="ui container-fluid grid header-bg">
            <div class="ui container grid ">
                <div class="header-item header-left flex-order-tablet-second flex-order-mobile-second flex-grow-tablet-true flex-grow-mobile-true">
                    <a href="/" class="logo item">
                        <img src="{{Storage::url('global/1640775312_sahil-logo2-3png.png')}}"
                             srcset="{{Storage::url('global/1640775312_sahil-logo2-3png.png')}} 1x, {{Storage::url('global/1640775312_sahil-logo2-3png.png')}} 2x"
                             alt="mybnb logo" class="logo-transparent">
                        <img src="{{Storage::url('global/1640775312_sahil-logo2-3png.png')}}"
                             srcset="{{Storage::url('global/1640775312_sahil-logo2-3png.png')}} 1x, {{Storage::url('global/1640775312_sahil-logo2-3png.png')}} 2x"
                             alt="mybnb logo">
                    </a>
                </div>
                <div class="header-item header-center flex-align-left flex-order-tablet-first flex-order-mobile-first flex-grow-large-desktop-true flex-grow-desktop-true flex-grow-tablet-false flex-grow-mobile-false">
                </div>
                <div class="header-item header-right flex-order-tablet-third flex-order-mobile-third flex-shrink-true flex-align-right">
                    <!-- Sidemenu Trigger -->
                    <a class="sidemenu-trigger close-sq hamburger hamburger-spin item hidden-desktop hidden-large-desktop"
                       data-trigger-for="menu01">

                    <span class="hamburger-box">
                      <span class="hamburger-inner"></span>
                    </span>
                    </a>

                    <!-- Include Menu -->

                    <!-- Header Menu-->

                    <div class="item menu-default burger-mobile-sidemenu burger-tablet-sidemenu sidemenu-open-right icons-left profile-priority slide-out-sq dimmed flexMenu dropdown-open-right"
                         data-burger="menu01">

                        <ul class="main-menu">

                            <li><a href="/" class="item">
                                    <span>Anasayfa</span>
                                </a>
                            </li>


                            <li><a href="{{url('blog')}}" class="item">
                                    <span>Blog</span>
                                </a>
                            </li>
                            <li><a href="{{url('page/about')}}" class="item">
                                    <span>Kurumsal</span>
                                </a>
                            </li>
                            <li class="has-submenu">
                                <a href="#" class="item"><span>Bölgeler</span></a>
                                <ul class="submenu transition" style="display:block;width:600px;max-width: 600px;min-width:600px">
                                    <li class="submenutop ui six wide tablet four wide computer column">
                                        <ul>
                                            <li class="dropdown-header">Software</li>
                                            <li><a href="#">Desktop</a></li>
                                            <li class="disabled"><a href="#">Mobile</a></li>
                                            <li><a href="#">Tablet</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-header">Hardware</li>
                                            <li><a href="#">Arduino</a></li>
                                            <li><a href="#">Raspberry PI</a></li>
                                            <li><a href="#">VoCore</a></li>
                                            <li><a href="#">Banana PI</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenutop ui six wide tablet four wide computer column">
                                        <ul>
                                            <li class="dropdown-header">Nano-Tech</li>
                                            <li><a href="#">AFM</a></li>
                                            <li><a href="#">STM</a></li>
                                            <li><a href="#">Nano-Tubes</a></li>
                                            <li><a href="#">Nano-Wires</a></li>
                                            <li><a href="#">Materials</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-header">A.I.</li>
                                            <li><a href="#">Artificial Intelligence</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenutop ui six wide tablet four wide computer column">
                                        <ul>
                                            <li class="dropdown-header">SaaS</li>
                                            <li><a href="#">On-Demand</a></li>
                                            <li><a href="#">No Software</a></li>
                                            <li><a href="#">Cloud Computing</a></li>
                                            <li class="divider"></li>
                                            <li class="dropdown-header">On-Premise</li>
                                            <li><a href="#">Data Center</a></li>
                                            <li><a href="#">Hosting Environment</a></li>
                                            <li><a href="#">Internal IT</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenutop ui six wide tablet four wide computer column">
                                        <ul>
                                            <li class="dropdown-header">Server-Side</li>
                                            <li><a href="#">PHP</a></li>
                                            <li><a href="#">Java</a></li>
                                            <li><a href="#">Python</a></li>
                                            <li><a href="#">Ruby</a></li>
                                            <li><a href="#">ColdFusion</a></li>
                                            <li><a href="#">ASP.NET</a></li>
                                            <li><a href="#">GO</a></li>
                                            <li><a href="#">Perl</a></li>
                                            <li><a href="#">Lasso</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#" class="item"><span>Kategoriler</span></a>
                                <ul class="submenu transition hidden">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{url('category/'.$category['lang']->where('lang_id',$lang_id)->first()->slug)}}"
                                               class="item"><span>{{$category['lang']->where('lang_id',$lang_id)->first()->name}}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{url('contact')}}" class="item">
                                    <span>İletişim</span>
                                </a>
                            </li>
                            @if(!\Illuminate\Support\Facades\Auth::guard('web-user')->check())
                                <li><a href="{{url('register')}}" class="item">
                                        <span>Üye Ol</span>
                                    </a>
                                </li>

                                <li><a href="{{url('login')}}" class="item">
                                        <span>Üye Girişi</span>
                                    </a>
                                </li>
                            @else
                                <li><a href="{{url('/customer/account')}}" class="item">
                                        <span>Hesabım</span>
                                    </a>
                                </li>
                                <li><a href="{{url('logout')}}" class="item">
                                        <span>Çıkış</span>
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .menu-default>ul li.submenutop{
        float:left;
    }

</style>
