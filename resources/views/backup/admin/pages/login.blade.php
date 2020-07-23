<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ecommerce Product | Login</title>
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
                    <h4>Login</h4>
                    <p class="modal_subtitle pb-4">Enter your email address below and we’ll send you an email with the
                        access code.</p>
                </div>
                <div class="user_login_form">
                    <form class="login_form" id="login_form">
                        <div class="form-group">
                            <label>Email Address<span>*</span></span>
                            </label>
                            <input type="text" class="form-control form_field" id="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label>Password<span>*</span></span>
                            </label>
                            <input type="password"  class="form-control form_field" id="password" name="password" placeholder="Password">
                        </div>
                        <p class="text-right"><a href="{{ url('forgetpassword') }}" class="forget_password_link">Forgot password?</a></p>
                        <div class="login_form_btn"><button type="submit" id="login_form_submit"
                                class="theme_btn dark_btn ml-0 w-100">Continue</button>
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
    $('#login_form').on('submit', function(event) {
        event.preventDefault();

        email = $('#email').val();
        password = $('#password').val();
        $("#login_form_submit").html("Processing...");
        $.ajax({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
            url: "{{ url('login_data') }}",
            type: "POST",
            data: {
                email: email,
                password: password,
            },
            success: function(res) {
                $("#login_form_submit").html("Continue");
                console.log(res);
                if (!$.isEmptyObject(res.data.error)) {
                    printErrorMsg(res.data.error);

                } else {
                    // console.log(res.data.data);
                    if (res.data.data) {
                        $(".error").remove();
                        $("#form_status").after('<p class="error text-center mt-4"><b> '+res.data.data+'</b></p>');
                    } else {
                        $(".error").remove();                       
                        $("#login_form")[0].reset();
                        // $("#form_status").remove();
                        window.location.href = "{{ url('dashboard') }}";
                    }
                }
            },
        });
    });

    function printErrorMsg(msg) {
        $(".error").remove();
        if (msg.first_name) {
            $("#first_name").after('<span class="error">' + msg.first_name + '</span>');
        }
        if (msg.last_name) {
            $("#last_name").after('<span class="error">' + msg.last_name + '</span>');
        }
        if (msg.email) {
            $("#email").after('<span class="error">' + msg.email + '</span>');
        }
        if (msg.password) {
            $("#password").after('<span class="error">' + msg.password + '</span>');
        }
        if (msg.c_password) {
            $("#c_password").after('<span class="error">' + msg.c_password + '</span>');
        }

        console.log(msg);
        // $(".print-error-msg").find("ul").html('');

        // $(".print-error-msg").css('display','block');
        // $.each( msg, function( key, value ) {

        //     $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

        // });

    }
    </script>
    </script>
</body>

</html>