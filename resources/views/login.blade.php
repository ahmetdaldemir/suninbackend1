@extends('admin.layouts.app.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="authentication-main">
            <div class="row">
                <div class="col-md-12">
                    <div class="auth-innerright">
                        <div class="authentication-box">
                            <div class="card mt-4">
                                <div class="card-body p-0">
                                    <div class="cont text-center">
                                        <div>
                                            <form class="theme-form" id="login_form">
                                                <h4 style="    border-bottom: 1px solid #ccc;">GİRİŞ YAP</h4>
                                                <div class="form-group">
                                                    <label class="col-form-label pt-0">Email</label>
                                                    <input class="form-control" type="text" name='email' required="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Şifre</label>
                                                    <input class="form-control" type="password" name='password'
                                                        required="">
                                                </div>
                                                <div class="checkbox p-0">
                                                    <input id="checkbox1" type="checkbox">
                                                    <label for="checkbox1">Remember me</label>
                                                </div>
                                                <div class="form-group form-row mt-3 mb-0">
                                                    <button class="btn btn-primary btn-block" type="submit" id='submit'>LOGIN</button>
                                                </div>

                                                <!--
                          <div class="login-divider"></div>
                          <div class="social mt-3">
                            <div class="form-row btn-showcase">
                              <div class="col-md-4 col-sm-6">
                                <button class="btn social-btn btn-fb">Facebook</button>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                <button class="btn social-btn btn-twitter">Twitter</button>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                <button class="btn social-btn btn-google">Google + </button>
                              </div>
                            </div>
                          </div>
                    -->

                                            </form>
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
    <!-- login page end-->
@endsection

<style>
    .page-wrapper {
        background: url({{ asset('public/assets/images/other-images/login-bg.jpg') }});
        background-position: bottom;
        background-size: cover;
    }

    .card {
        margin: 0 auto;
        border: 0px;
        -webkit-transition: all 0.3s ease;oco/assets/js/sweet-alert/app.js
    }

    .cont {
        overflow: hidden;
        position: relative;
        max-width: 500px;
        margin: 0 auto 0;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
    }

    .authentication-main .auth-innerright .card-body .theme-form {
        width: 100% !important;
    }

</style>
@section('script')



    <script src="{{ asset('public/assets/js/login.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#login_form').submit(function(e) {
                e.preventDefault();
                $('#submit').addClass('disabled');
                $.ajax({
                    method: 'post',
                    url: '/api/login',
                    data: $(this).serialize(),
                    success: function(response) {
                        window.location.href = `http://${response.type}.sahilvillam.com?${response.axios}`;
                    },
                    error: function(error) {
                        $('#submit').removeClass('disabled');
                        Swal.fire(
                            'Good job!',
                            'You clicked the button!',
                            'success'
                        )
                        let res = error.responseJSON.errors;

                        let message = error.responseJSON.message;

                        if (message) {
                            if (message === 'User does not exist') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Boyle bir kullanici bulunamadi',
                                })
                            } else if ('Password mismatch') {
                              Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Dogru parola girdiginizden emin olun',
                                })
                            }

                        }
                        $.each(res, function(index, item) {
                            if (item === 'The email must be a valid email address.') {
                              Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Gecersiz mail adresi',
                                })
                            } else if (item ===
                                'The password must be at least 6 characters.') {
                                  Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Prolaniz en az 6 karakter olmalidir',
                                })
                            } else {
                              Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Bir hata olustu ! Lutfen daha sonra tekrar deneyiniz',
                                })
                            }
                        })

                    }
                })
            })
        });
    </script>
@endsection
