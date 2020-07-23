<!DOCTYPE html>

<html lang="en">



<head>

    <title>Ecommerce Product | Reset Password</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{url('admin/assets/img/fav.png')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link

        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&display=swap"

        rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" type="text/css" href="{{url('admin/assets/css/style.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{url('admin/assets/css/media.css')}}" />

</head>



<body>

    <section class="signup_section align-items-center">

        <div class="login_section_left">

            <div class="login-gradient"></div>

            <div class="login_txt">

                <p class="mb-0">Candy? No Problem.</p>

                <p class="mb-0">Sell anything like a pro!</p>

            </div>

        </div>

        <div class="login_section_right">

            <div class="login_user_right_inner">

                <div class="login_user_text text-center">

                    <img class="login_form_logo" src="{{ url('admin/assets/img/logo.png') }}">

                    <h4>Reset Password</h4>

                    <!-- <p class="modal_subtitle pb-4">Enter your email address below and we’ll send you an email with the

                        access code.</p> -->

                </div>

                <div class="user_login_form">

                    <form class="signup_form" id="reset_password_form" autocomplete="off">

                       

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="form-group">

                                    <label>New Password<span>*</span></span>

                                    </label>

                                    <input type="password" class="form-control form_field" id="new_password" name="new_password"

                                        placeholder="Password">

                                </div>

                            </div>

                            <div class="col-sm-12">

                                <div class="form-group">

                                    <label>Confrim New Password<span>*</span></span>

                                    </label>

                                    <input type="password" class="form-control form_field" id="confirm_new_password"

                                        name="password" placeholder="Confrim Password">

                                </div>

                            </div>

                        </div>

                        <div class="login_form_btn"><button type="submit" id="reset_password_form_submit"

                                name="reset_password_form_submit" class="theme_btn dark_btn ml-0 w-100">Continue</button>

                        </div>

                        <span id="form_status" class="text-center"></span>

                        <p><a href="{{ url('login') }}" class="login_form_btm_txt themecolor">Already have an account?

                                Login!</a></p>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>

        $('#reset_password_form').on('submit', function(event) {

            event.preventDefault();

            

            new_password = $('#new_password').val();

            confirm_new_password = $('#confirm_new_password').val();

            $("#reset_password_form_submit").html("Processing...");

            $.ajax({

                    headers: {



                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')



                    },

                    url: "{{ url('resetpassword_data') }}",

                    type: "POST",

                    data: {                       

                        token: "{{$token}}",

                        new_password: new_password,

                        confirm_new_password: confirm_new_password,

                    },

                    success: function(res) {

                        $("#reset_password_form_submit").html("Continue");

                        console.log(res);

                        if (!$.isEmptyObject(res.data.error)) {

                            printErrorMsg(res.data.error);

                    } else {

                       if(res['data']['status'] == "0"){

                        $("#form_status").after('<p class="error text-center mt-4"><b> '+res.data.message+'</b></p>');



                       }

                       else{

                        $("#reset_password_form")[0].reset();

                        window.location.href = "{{ url('login') }}";

                       }

                    }

                },

            });

        });



        function printErrorMsg(msg) {

            $(".error").remove();

           

            if (msg.new_password) {

                $("#new_password").after('<span class="error">' + msg.new_password + '</span>');

            }

            if (msg.confirm_new_password) {

                $("#confirm_new_password").after('<span class="error">' + msg.confirm_new_password + '</span>');

            }



        }

    </script>

</body>



</html>