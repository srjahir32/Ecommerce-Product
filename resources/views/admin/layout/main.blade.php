<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{ url('admin/css/ripple.css') }} " type="text/css">
    <link href="{{ url('admin/css/dropzone.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin/css/cropper.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('admin/css/selectize.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/sidebar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/media.css') }}" />
</head>

<body>

    <div class="page-wrapper chiller-theme toggled">

        @include('admin.include.sidebar')
        <main class="page-content">

            @yield('content')

        </main>
        <div class="profile_setting_txt">
            <div class=""><a class="profile_setting_button ripple_btn" id="profile_setting"><img
                        src="admin/assets/img/main/apps-icon.svg"></a></div>
            <div class="profile_setting_box">

                <div class="profile_setting_inner_top">
                    <p class="whitelabel_txt" id="superbolt_text" data-toggle="modal" data-target="#superboltsModal">
                        <img class="white_label_img" src="admin/assets/img/main/spb-logo-square-white.svg"><span>NEW!
                            Superbolts: re-sell sanalpos.co whitelabel</span></p>
                    <img class="profile_setting_close_btn" src="admin/assets/img/main/icon-close.svg" alt="">
                </div>
                <div class="profile_setting_inner_btm">
                    <div id="edit_profile" class="edit_profile_text" data-toggle="modal"
                        data-target="#editProfileModal">
                        <img class="edit_profile_img" src="admin/assets/img/main/no-avatar.svg" alt="">
                        <div class="edit_profile_inner">
                            <p class="ellipsis_text profile-name mb-0"><b>puja ponkiy</b></p>
                            <p class="mb-0">Edit Profile</p>
                        </div>
                    </div>
                    <div class="logout_profile_text ripple_btn">
                        <img src="admin/assets/img/main/logout.svg" alt="">
                        <p class="mb-0" p>Logout</p>
                    </div>
                    <div id="support_profile" class="support_profile_text ripple_btn" data-toggle="modal"
                        data-target="#supportModal">
                        <img src="admin/assets/img/main/live-help.svg" alt="">
                        <p class="mb-0">Support</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- edit profile model -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog"
            aria-labelledby="editProfileModalLabel">
            <div class="modal-dialog modal_width_500" role="document">
                <div class="modal-content">
                    <div class="modal-body editProfileModal_body">
                        <div class="row">
                            <div class="col-md-12 back_btn_txt">
                                <a class="back_btn_link" href=" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="">
                                    <span>Back</span></a>

                                <!-- <div class="dropdown product_view_droupdown"> -->
                                <a class="dropdown-toggle droupdown_menu_toggleicon" id="productDropdownMenu"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="droupdown_menu_img" src="admin/assets/img/main/menu-icon.svg"
                                        alt=""></a>
                                <div class="dropdown-menu" aria-labelledby="productDropdownMenu">
                                    <a class="dropdown-item" href="">Duplicate</a>
                                    <a class="dropdown-item text-danger" data-toggle="modal"
                                        data-target="#deleteAccountModal">Remove</a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="editProfilet_details text-center">
                            <h3 class="modal_title">Edit Profile</h3>
                            <p class="modal_subtitle mb-4">One profile, multiple business accounts.</p>
                            <div class="editProfilet_img">
                                <img src="admin/assets/img/main/no-avatar.png" alt="">
                            </div>
                        </div>
                        <form class="editProfil_form" id="editProfil_form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email">Login Email Address<span>*</span></label>
                                        <input type="text" class="form-control form_field"
                                            placeholder="Enter Email Address" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name<span>*</span></label>
                                        <input type="text" class="form-control form_field" name="first_name"
                                            id="first_name" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Order Limit</label>
                                        <input type="text" class="form-control form_field" name="last_name"
                                            id="last_name" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="profile_save_btn">
                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0">save</button>
                            </div>
                        </form>
                        <div class="consents_table_text">
                            <p class="consents_table_title">consents</p>
                            <table class="table variations_table consents_table" id=consents_table">
                                <thead>
                                    <tr>
                                        <th>Consent Description</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            I consent and agree on how my data is handled according to the Data Privacy
                                            Addendum
                                        </td>
                                        <td>Tue May 05 2020 17:15:56 GMT+0530 (India Standard Time)</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            I consent and agree to sanalpos.co's Terms of Use
                                        </td>
                                        <td>Tue May 05 2020 17:15:56 GMT+0530 (India Standard Time)</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            I want to receive platform updates and occasional promotional emails.
                                        </td>
                                        <td>Tue May 05 2020 17:15:56 GMT+0530 (India Standard Time)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- edit profile model end-->

        <!-- Delete Account Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog"
            aria-labelledby="deleteAccountModalLabel">
            <div class="modal-dialog modal_width_500" role="document">
                <div class="modal-content">
                    <div class="modal-body deleteAccountModal_body">
                        <div class="row">
                            <div class="col-md-12 back_btn_txt">
                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="">
                                    <span>Back</span></a>
                            </div>
                        </div>
                        <div class="delete_product_details approve_order_details ">
                            <div class="text-center">
                                <div class="approve_order_img request_data_img">
                                    <img src="admin/assets/img/main/moreicon.svg" alt="">
                                </div>
                                <h3>Delete Account</h3>
                                <p class="big">Are you sure you want us to remove your account? All your plugs, clients,
                                    products and attached payment methods will be permanetly erased.</p>
                            </div>

                            <div class="mark_paid_btn">
                                <button class="theme_btn ripple_btn dark_btn w-100 ml-0">Yes, delete account</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!-- Delete Account Modal end-->

        <!-- support Modal -->
        <div class="modal fade" id="supportModal" tabindex="-1" role="dialog" aria-labelledby="supportModalLabel">
            <div class="modal-dialog modal_width_1155" role="document">
                <div class="modal-content">
                    <div class="modal-body supportModal_body">
                        <div class="row">
                            <div class="col-md-2 back_btn_txt">
                                <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                        class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="">
                                    <span>Back</span></a>
                            </div>
                            <div class="col-md-8">
                                <div class="text-center">
                                    <h3 class="modal_title mb-5">Helpdesk</h3>
                                </div>
                                <div class="add_product_form">
                                    <form class="support_form" id="support_form">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="subject">Subject</label>
                                                    <input type="text" class="form-control form_field"
                                                        placeholder="What is this about?" id="subject" name="subject">
                                                </div>

                                                <div class="form-group">
                                                    <label for="Details">Details</label>
                                                    <textarea class="form-control form_field" name="details" rows="10"
                                                        id="details"
                                                        plceholser="Detailed explanation of your issue. If it's about a bug, please tell us the steps you followed before it happened. Uploading screenshots helps."></textarea>
                                                </div>

                                                <label class="">Screenshot(s)</label>
                                                <div class="form_images_upload">
                                                    <p class="big">In most cases, uploading a screenshot helps us solve
                                                        your
                                                        ticket faster.</p>
                                                </div>
                                                <span class="upload_image_area"></span>
                                                <div class="dropzone" id="myDropzone"></div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-5">

                                            <button
                                                class="theme_btn ripple_btn dark_btn product_submit_btn w-100 ml-0">Submit
                                                Ticket</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!-- support Modal end-->

        <!-- superbolts Modal -->
        <div class="modal fade" id="superboltsModal" tabindex="-1" role="dialog" aria-labelledby="superboltsModalLabel">
            <div class="modal-dialog modal_width_1155" role="document">
                <div class="modal-content">
                    <div class="modal-body superboltsModal_body">
                        <div class="superbolts_top_txt back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="admin/assets/img/dashboard/back-arrow.svg" alt="">
                                <span>Back</span></a>

                            <img class="superbolts_logo text-center" src="admin/assets/img/main/spb-logo-wide.svg"
                                alt="">
                        </div>
                        <div class="superbolts_text">
                            <div class="translation_missing_txt">
                                <h2 class="translation_missing_title">Whitelabel Reseller Solution</h2>
                                <p>Superbolts is a system that allows you to increase your recurring revenue by branding
                                    sanalpos.co as yours and selling it to your clients and visitors. Everything except
                                    support is managed automatically by our system. You just need to worry about helping
                                    your clients set up their checkout flows.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 superbolts_list_left">
                                <h5>Get started right now, and get:</h5>
                                <ul class="superbolts_list pl-0">
                                    <li><i class="fa fa-check"></i>Client seats in bulk</li>
                                    <li><i class="fa fa-check"></i>Hosted Signup Page</li>
                                    <li><i class="fa fa-check"></i>Automated Billing Plans (Stripe required)</li>
                                    <li><i class="fa fa-check"></i>Clients Management</li>
                                    <li><i class="fa fa-check"></i>Embed your own support widget or URL</li>
                                    <li><i class="fa fa-check"></i>Completely Whitelabel, clients log into their admin
                                        panel on your domain</li>
                                    <li><i class="fa fa-check"></i>Use Webhooks to integrate your other systems</li>
                                    <li><i class="fa fa-check"></i>Use client seats for your other businesses</li>
                                    <li><i class="fa fa-check"></i>Manage multiple accounts with a single login</li>
                                </ul>
                            </div>
                            <div class="col-md-4 superbolt_setting">
                                <div class="text-center">
                                    <h5>Just click the button below to start setting up your
                                        Superbolt!</h5>
                                    <div class="superbolt_setting_box">
                                        <img src="admin/assets/img/main/spb-logo-square-blue.svg" alt="">
                                        <h5 class="mb-1">Superbolts</h5>
                                        <p>10 seats for 50</p>
                                        <p>50 seats for 199</p>
                                        <p>100 seats for 299</p>
                                        <p>1000 seats for 1999</p>
                                        <div class="superbolt_get_started_btn">
                                            <button class="theme_btn dark_btn">Get Started</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="superbolt_note_txt">
                            <h5 class="mb-0">Notes:</h5>
                            <p>translation missing: en.whitelabel-note</p>
                        </div>
                    </div>
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!-- superbolts Modal end-->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js">
    </script>
    <script src="{{ url('admin/js/apexcharts.min.js') }}"></script>
    <script src="{{ url('admin/js/dropzone.js') }}" />
    </script>
    <script src="{{ url('admin/js/cropper.js') }}" />
    </script>
    <script src="{{ url('admin/js/jqueryui.js') }}"></script>
    <script src="{{ url('admin/js/selectize.js') }}"></script>
    <script src="{{ url('admin/js/jqueryui.js') }}"></script>
    <script src="{{ url('admin/js/ripple.js') }}"></script>

    <script src="{{ url('admin/assets/js/sidebar.js') }}" />
    </script>
    <script src="{{ url('admin/assets/js/imgecroper.js') }}" />
    </script>


    @yield('scripts')
    <script>
        $("#profile_setting").click(function () {
            $(".profile_setting_box").show();
            $("#profile_setting").hide();
        })

        $(".profile_setting_close_btn, #edit_profile, #support_profile, #superbolt_text").click(function () {
            $(".profile_setting_box").hide();
            $("#profile_setting").show();
        })
    </script>
    <script>
        $(document).on('click', '[href="#"]', function (e) {
            e.preventDefault();
        })
        window.rippler = $.ripple('.ripple_btn', {
            debug: true,
            multi: true
        });
    </script>
</body>

</html>