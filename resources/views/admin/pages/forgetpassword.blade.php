<!DOCTYPE html>

<html lang="en">



<head>

    <title>Ecommerce Product | Forget Password</title>

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

                    <h4>Forget Your Password?</h4>

                    <p class="modal_subtitle pb-4">Enter your email address and we'll send you link to reset your password</p>

                </div>

                <div class="user_login_form">

                    <form class="login_form" id="forget_password_form" autocomplete="off">

                        <div class="form-group">

                            <label>Email Address<span>*</span></span>

                            </label>

                            <input type="text" class="form-control form_field" id="email" name="email" placeholder="Email Address">

                        </div>

                        

                        <div class="login_form_btn"><button type="submit" id="forget_password_form_submit"

                                class="theme_btn dark_btn ml-0 w-100">Reset Password</button>

                        </div>

                    <!-- <span id="form_error" class="text-center"></span> -->

                    <span id="form_status" class="text-center"></span>



                        <p><a href="{{ url('signup') }}" class="login_form_btm_txt themecolor">Create an Account!</a>

                        </p>



                    </form>

                </div>

            </div>

        </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>

    $('#forget_password_form').on('submit', function(event) {

        event.preventDefault();



        email = $('#email').val();

        password = $('#password').val();

        $("#forget_password_form_submit").html("Processing...");

        $.ajax({

            headers: {



                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')



            },

            url: "{{ url('forgetpassword_data') }}",

            type: "POST",

            data: {

                email: email

            },

            success: function(res) {

                $("#forget_password_form_submit").html("Continue");

                console.log(res);

                if (!$.isEmptyObject(res.data.error)) {

                    printErrorMsg(res.data.error);



                } else {

                    // console.log(res.data.data);

                    if (res.data.status == "0") {

                        $(".error").remove();

                        $("#form_status").after('<p class="error text-center mt-4"><b> '+res.data.message+'</b></p>');

                    } else {

                        $(".error").remove();                       

                        $("#forget_password_form")[0].reset();

                        $("#form_status").after('<p class="text-center text-success mt-4">Reset pasword link sent in your email.</p>');

                        // window.location.href = "{{ url('dashboard') }}";

                    }

                }

            },

        });

    });



    function printErrorMsg(msg) {

        $(".error").remove();

        if (msg.email) {

            $("#email").after('<span class="error">' + msg.email + '</span>');

        }

    }

    </script>

    </script>

</body>



</html>