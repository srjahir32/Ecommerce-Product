@extends('admin.layout.main')
@section('content')
<?php  ?>
<div class="container-fluid">
    <div class="top-bar">
        <div class="row align-items-center">
            <div class="col-sm-6 topbar_left pr-0">
                <h3 class="topbar_title mb-0"><img class="topbar_title_icon"
                        src="{{ asset('admin/assets/img/dashboard/icon-dashboard.svg') }}" alt=""><span>Dashboard</span>
                </h3>
            </div>
            <div class="col-sm-6 topbar_right">
                <div class="topbar_btn">
                    <button class="theme_btn ripple_btn dark_btn product_type" id="add_product_btn" data-toggle="modal" data-target="#addProductModal">Create Product</button>
                        
                </div>
            </div>
        </div>
    </div>
    <div class="recommend_box d-none">
        <p class="big">How likely are you to recommend this platform to other merchants?</p>
        <div id="starrate" class="starrate " data-val="" data-max="5" data-toggle="tooltip" data-placement="top"
            title="">
            <span class="ctrl"></span>
            <span class="cont m-1">
                <i class="far fa-fw fa-star"></i>
                <i class="far fa-fw fa-star"></i>
                <i class="far fa-fw fa-star"></i>
                <i class="far fa-fw fa-star"></i>
                <i class="far fa-fw fa-star"></i>
            </span>

        </div>
        <div id="test">
        </div>
        <div class="rating_area_inner">
            <p class="big">What changes should we make to receive a higher rating?</p>
            <div class="col-md-6 m-auto rating_area_box">
                <textarea name="rating_area" id="rating_area" class="rating_area" rows="4"></textarea>
            </div>
            <button class="theme_btn ripple_btn dark_btn">Submit</button>
        </div>
    </div>
    <div class="follow_setup_steps">
        <p class="follow_setup_step_title">Follow these easy steps to complete your setup</p>
        <div class="row ">
            <div class="col-sm-12 dashboard_setup_step equal_row">
                <div class="dashboard_setup_box mr-0 business_settings_box done_setup_box" id="done_business_settings_box" style="display:none;">
                    <div class="dashboard_setup_done_icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block publish_sale_icon"
                        src="{{ asset('admin/assets/img/dashboard/Setup_Business_Settings_done.svg') }}">
                    <p class="dashboard_setup_box_txt">Setup Business Settings</p>
                </div>
                <div class="dashboard_setup_box business_settings_box not_done_setup_box" data-toggle="modal"
                    data-target="#shopSettingsModal" id="notdone_business_settings_box">
                    <div class="dashboard_setup_done_icon">
                        <i class="far fa-stop"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block business_settings_icon"
                        src="{{ asset('admin/assets/img/dashboard/Setup_Business_Settings.svg') }}">
                    <p class="dashboard_setup_box_txt theme_color">Setup Business Settings</p>
                </div>

                <div class="dashboard_setup_box checkout_flow_box done_setup_box" id="done_checkout_flow_box" style="display:none;">
                    <div class="dashboard_setup_done_icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block checkout_flow_icon"
                        src="{{ asset('admin/assets/img/dashboard/Create_Checkout_Flow_done.svg') }}">
                    <p class="dashboard_setup_box_txt theme_color">Create Checkout Flow</p>
                </div>
                <div class="dashboard_setup_box checkout_flow_box not_done_setup_box" data-toggle="modal" data-target="#checkoutModal" id="not_done_checkout_flow_box">
                    <div class="dashboard_setup_done_icon">
                        <i class="far fa-stop"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block checkout_flow_icon"
                        src="{{ asset('admin/assets/img/dashboard/Create_Checkout_Flow.svg') }}">
                    <p class="dashboard_setup_box_txt theme_color">Create Checkout Flow</p>
                </div>

                <div class="dashboard_setup_box ml-0 done_setup_box" id="done_add_product_box" style="display:none;">
                    <div class="dashboard_setup_done_icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block product_service_icon"
                        src="{{ asset('admin/assets/img/dashboard/Add_Product_done.svg') }}">
                    <p class="dashboard_setup_box_txt">Add Product or Service</p>
                </div>
                
                <div class="dashboard_setup_box not_done_setup_box ml-0" data-toggle="modal"
                    data-target="#addProductModal" id="notdone_add_product_box">
                    <div class="dashboard_setup_done_icon">
                        <i class="far fa-stop"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block product_service_icon"
                        src="{{ asset('admin/assets/img/dashboard/Add_Product.svg') }}">
                    <p class="dashboard_setup_box_txt">Add Product or Service</p>
                </div>
              
                <div class="dashboard_setup_box mr-0">
                    <div class="dashboard_setup_done_icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <img class="dashboard_setup_box_img m-auto d-block publish_sale_icon"
                        src="{{ asset('admin/assets/img/dashboard/publish_sale_icon_done.svg') }}">
                    <p class="dashboard_setup_box_txt">Publish and Make a sale</p>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard_graph_tab">
        <!-- Start Tabs -->
        <div class="nav-tabs-wrapper">
            <ul class="nav nav-tabs dashboard_graph_list horizontal">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#day_tab">Last 7
                        days</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#month_tab">This month</a>
                </li>

            </ul>
        </div>
        <div class="dashboard_graph_tab_top_txt d-none">
            <div class="row">
                <div class="col-sm-4 total_revenue_txt">
                    <p class="graph_tab_top_title_txt">Total Revenue</p>
                    <p class="graph_tab_icon_txt"><span>₺</span>0</p>
                    <p class="graph_tab_btm_title_txt">New</p>
                </div>
                <div class="col-sm-4 active_customers_txt">
                    <p class="graph_tab_top_title_txt">Active Customers</p>
                    <p class="graph_tab_icon_txt"><i class="fa fa-user pnp-text-color5"></i>0</p>
                    <p class="graph_tab_btm_title_txt">New</p>
                </div>
                <div class="col-sm-4 products_sold_txt">
                    <p class="graph_tab_top_title_txt">Products Sold</p>
                    <p class="graph_tab_icon_txt"><img class="updown_arrow_img"
                            src="{{ asset('admin/assets/img/dashboard/products_sold.svg') }}">0</p>
                    <p class="graph_tab_btm_title_txt">New</p>
                </div>
            </div>
        </div>
        <div class="tab-content chart_container">
            <div class="tab-pane fade show active" id="day_tab">
                <div id="chart" class="d-none"></div>
                <div class="dashboard_graph_tab_top_txt">
                    <div class="row">
                        <div class="col-sm-4 total_revenue_txt">
                            <p class="graph_tab_top_title_txt">Total Revenue</p>
                            <p class="graph_tab_icon_txt"><span class="currency_icon">₺</span><span id="week_total_revenue">0</span></p>
                            <p class="graph_tab_btm_title_txt">New</p>
                        </div>
                        <div class="col-sm-4 active_customers_txt">
                            <p class="graph_tab_top_title_txt">Active Customers</p>
                            <p class="graph_tab_icon_txt"><i class="fa fa-user pnp-text-color5"></i><span id="week_active_customers">0</span></p>
                            <p class="graph_tab_btm_title_txt">New</p>
                        </div>
                        <div class="col-sm-4 products_sold_txt">
                            <p class="graph_tab_top_title_txt">Products Sold</p>
                            <p class="graph_tab_icon_txt"><img class="updown_arrow_img"
                                    src="{{ asset('admin/assets/img/dashboard/products_sold.svg') }}"><span id="week_products_sold">0</span></p>
                            <p class="graph_tab_btm_title_txt">New</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="month_tab">
                <div id="chart" class="d-none"></div>
                <div class="dashboard_graph_tab_top_txt">
                    <div class="row">
                        <div class="col-sm-4 total_revenue_txt">
                            <p class="graph_tab_top_title_txt">Total Revenue</p>
                            <p class="graph_tab_icon_txt"><span class="currency_icon">₺</span><span id="month_total_revenue">0</span></p>
                            <p class="graph_tab_btm_title_txt">New</p>
                        </div>
                        <div class="col-sm-4 active_customers_txt">
                            <p class="graph_tab_top_title_txt">Active Customers</p>
                            <p class="graph_tab_icon_txt"><i class="fa fa-user pnp-text-color5"></i><span id="month_active_customers">0</span></p>
                            <p class="graph_tab_btm_title_txt">New</p>
                        </div>
                        <div class="col-sm-4 products_sold_txt">
                            <p class="graph_tab_top_title_txt">Products Sold</p>
                            <p class="graph_tab_icon_txt"><img class="updown_arrow_img"
                                    src="{{ asset('admin/assets/img/dashboard/products_sold.svg') }}"><span id="month_products_sold">0</span></p>
                            <p class="graph_tab_btm_title_txt">New</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tabs -->
    </div>


    <!-- Shop Settings Modal -->
    <div class="modal fade" id="shopSettingsModal" tabindex="-1" role="dialog" aria-labelledby="shopSettingsModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body shopSettingsModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ asset('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-7">
                            <h3 class="modal_title text-center">Shop Settings</h3>
                        </div>
                        <div class="col-md-3 save_btn_txt text-right">
                            <input type="button" class="theme_btn ripple_btn dark_btn" value="Save Settings" id="save_business_setting">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="shopshetting_billinginformation">
                                <h4 class="mb-3">Billing Information</h4>
                                <p><b>Notes::</b> Your shop’s billing information is visible in the hosted
                                    page and
                                    invoices.</p>
                            </div>
                            <div class="add_product_form">
                                <form class="addproduct" id="business_setting_form" autocomplete="off">
                              
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="Shop Name">Shop Name</label>
                                                <input type="text" class="form-control form_field" placeholder=""
                                                    id="shop_name" name="shop_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <input type="text" class="form-control form_field" name="address"
                                                    id="address" placeholder="Enter your address">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="Postcode">Postcode</label>
                                                <input type="text" class="form-control form_field" name="postcode"
                                                    id="postcode" placeholder="Enter your postcode">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control form_field" name="city" id="city"
                                                    placeholder="Enter your state/city">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="country">Country</label>    
                                                <select class="form-control form_field country" name="country"
                                                    id="country_name">
                                                    <option value="Afghanistan" data-prefix="+93">Afghanistan</option>
                                                    <option value="Albania" data-prefix="+355">Albania</option>
                                                    <option value="Algeria" data-prefix="+213">Algeria</option>
                                                    <option value="American Samoa" data-prefix="+1 684">American Samoa</option>
                                                    <option value="Andorra" data-prefix="+376">Andorra</option>
                                                    <option value="Angola" data-prefix="+244">Angola</option>
                                                    <option value="Anguilla" data-prefix="+1 264">Anguilla</option>
                                                    <option value="Antarctica (Australian bases)" data-prefix="+6721">Antarctica (Australian bases)</option>
                                                    <option value="Antigua and Barbuda" data-prefix="+1 268">Antigua and Barbuda</option>
                                                    <option value="Argentina" data-prefix="+54">Argentina</option>
                                                    <option value="Armenia" data-prefix="+374">Armenia</option>
                                                    <option value="Aruba" data-prefix="+297">Aruba</option>
                                                    <option value="Ascension" data-prefix="+247">Ascension</option>
                                                    <option value="Australia" data-prefix="+61">Australia</option>
                                                    <option value="Austria" data-prefix="+43">Austria</option>
                                                    <option value="Azerbaijan" data-prefix="+994">Azerbaijan</option>
                                                    <option value="Bahamas" data-prefix="+1 242">Bahamas</option>
                                                    <option value="Bahrain" data-prefix="+973">Bahrain</option>
                                                    <option value="Bangladesh" data-prefix="+880">Bangladesh</option>
                                                    <option value="Barbados" data-prefix="+1 246">Barbados</option>
                                                    <option value="Belarus" data-prefix="+375">Belarus</option>
                                                    <option value="Belgium" data-prefix="+32">Belgium</option>
                                                    <option value="Belize" data-prefix="+501">Belize</option>
                                                    <option value="Benin" data-prefix="+229">Benin</option>
                                                    <option value="Bermuda" data-prefix="+1 441">Bermuda</option>
                                                    <option value="Bhutan" data-prefix="+975">Bhutan</option>
                                                    <option value="Bolivia" data-prefix="+591">Bolivia</option>
                                                    <option value="Bosnia and Herzegovina" data-prefix="+387">Bosnia and Herzegovina</option>
                                                    <option value="Botswana" data-prefix="+267">Botswana</option>
                                                    <option value="Brazil" data-prefix="+55">Brazil</option>
                                                    <option value="British Indian Ocean Territory" data-prefix="+246">British Indian Ocean Territory</option>
                                                    <option value="British Virgin Islands" data-prefix="+1 284">British Virgin Islands</option>
                                                    <option value="Brunei" data-prefix="+673">Brunei</option>
                                                    <option value="Bulgaria" data-prefix="+359">Bulgaria</option>
                                                    <option value="Burkina Faso" data-prefix="+226">Burkina Faso</option>
                                                    <option value="Burundi" data-prefix="+257">Burundi</option>
                                                    <option value="Cambodia" data-prefix="+855">Cambodia</option>
                                                    <option value="Cameroon" data-prefix="+237">Cameroon</option>
                                                    <option value="Canada" data-prefix="+1">Canada</option>
                                                    <option value="Cape Verde" data-prefix="+238">Cape Verde</option>
                                                    <option value="Cayman Islands" data-prefix="+1 345">Cayman Islands</option>
                                                    <option value="Central African Republic" data-prefix="+236">Central African Republic</option>
                                                    <option value="Chad" data-prefix="+235">Chad</option>
                                                    <option value="Chile" data-prefix="+56">Chile</option>
                                                    <option value="China" data-prefix="+86">China</option>
                                                    <option value="Colombia" data-prefix="+57">Colombia</option>
                                                    <option value="Comoros" data-prefix="+269">Comoros</option>
                                                    <option value="Congo, Democratic Republic of the" data-prefix="+243">Congo, Democratic Republic of the</option>
                                                    <option value="Congo, Republic of the" data-prefix="+242">Congo, Republic of the</option>
                                                    <option value="Cook Islands" data-prefix="+682">Cook Islands</option>
                                                    <option value="Costa Rica" data-prefix="+506">Costa Rica</option>
                                                    <option value="Cote d'Ivoire" data-prefix="+225">Cote d'Ivoire</option>
                                                    <option value="Croatia" data-prefix="+385">Croatia</option>
                                                    <option value="Cuba" data-prefix="+53">Cuba</option>
                                                    <option value="Curaçao" data-prefix="+599">Curaçao</option>
                                                    <option value="Cyprus" data-prefix="+357">Cyprus</option>
                                                    <option value="Czech Republic" data-prefix="+420">Czech Republic</option>
                                                    <option value="Denmark" data-prefix="+45">Denmark</option>
                                                    <option value="Djibouti" data-prefix="+253">Djibouti</option>
                                                    <option value="Dominica" data-prefix="+1 767">Dominica</option>
                                                    <option value="Dominican Republic" data-prefix="+1 809">Dominican Republic</option>
                                                    <option value="Ecuador" data-prefix="+593">Ecuador</option>
                                                    <option value="Egypt" data-prefix="+20">Egypt</option>
                                                    <option value="El Salvador" data-prefix="+503">El Salvador</option>
                                                    <option value="Equatorial Guinea" data-prefix="+240">Equatorial Guinea</option>
                                                    <option value="Eritrea" data-prefix="+291">Eritrea</option>
                                                    <option value="Estonia" data-prefix="+372">Estonia</option>
                                                    <option value="Eswatini" data-prefix="+268">Eswatini</option>
                                                    <option value="Ethiopia" data-prefix="+251">Ethiopia</option>
                                                    <option value="Falkland Islands" data-prefix="+500">Falkland Islands</option>
                                                    <option value="Faroe Islands" data-prefix="+298">Faroe Islands</option>
                                                    <option value="Fiji" data-prefix="+679">Fiji</option>
                                                    <option value="Finland" data-prefix="+358">Finland</option>
                                                    <option value="France" data-prefix="+33">France</option>
                                                    <option value="French Guiana" data-prefix="+594">French Guiana</option>
                                                    <option value="French Polynesia" data-prefix="+689">French Polynesia</option>
                                                    <option value="Gabon" data-prefix="+241">Gabon</option>
                                                    <option value="Gambia" data-prefix="+220">Gambia</option>
                                                    <option value="Gaza Strip" data-prefix="+970">Gaza Strip</option>
                                                    <option value="Georgia (and parts of breakaway regions Abkhazia as well as South Ossetia)" data-prefix="+995">Georgia (and parts of breakaway regions Abkhazia as well as South Ossetia)</option>
                                                    <option value="Germany" data-prefix="+49">Germany</option>
                                                    <option value="Ghana" data-prefix="+233">Ghana</option>
                                                    <option value="Gibraltar" data-prefix="+350">Gibraltar</option>
                                                    <option value="Greece" data-prefix="+30">Greece</option>
                                                    <option value="Greenland" data-prefix="+299">Greenland</option>
                                                    <option value="Grenada" data-prefix="+1 473">Grenada</option>
                                                    <option value="Guadeloupe" data-prefix="+590">Guadeloupe</option>
                                                    <option value="Guam" data-prefix="+1 671">Guam</option>
                                                    <option value="Guatemala" data-prefix="+502">Guatemala</option>
                                                    <option value="Guinea" data-prefix="+224">Guinea</option>
                                                    <option value="Guinea-Bissau" data-prefix="+245">Guinea-Bissau</option>
                                                    <option value="Guyana" data-prefix="+592">Guyana</option>
                                                    <option value="Haiti" data-prefix="+509">Haiti</option>
                                                    <option value="Honduras" data-prefix="+504">Honduras</option>
                                                    <option value="Hong Kong" data-prefix="+852">Hong Kong</option>
                                                    <option value="Hungary" data-prefix="+36">Hungary</option>
                                                    <option value="Iceland" data-prefix="+354">Iceland</option>
                                                    <option value="India" data-prefix="+91">India</option>
                                                    <option value="Indonesia" data-prefix="+62">Indonesia</option>
                                                    <option value="Iraq" data-prefix="+964">Iraq</option>
                                                    <option value="Iran" data-prefix="+98">Iran</option>
                                                    <option value="Ireland (Eire)" data-prefix="+353">Ireland (Eire)</option>
                                                    <option value="Israel" data-prefix="+972">Israel</option>
                                                    <option value="Italy" data-prefix="+39">Italy</option>
                                                    <option value="Jamaica 1 876," data-prefix="+1 658">Jamaica 1 876,</option>
                                                    <option value="Japan" data-prefix="+81">Japan</option>
                                                    <option value="Jordan" data-prefix="+962">Jordan</option>
                                                    <option value="Kazakhstan" data-prefix="+7">Kazakhstan</option>
                                                    <option value="Kenya" data-prefix="+254">Kenya</option>
                                                    <option value="Kiribati" data-prefix="+686">Kiribati</option>
                                                    <option value="Kosovo" data-prefix="+383">Kosovo</option>
                                                    <option value="Kuwait" data-prefix="+965">Kuwait</option>
                                                    <option value="Kyrgyzstan" data-prefix="+996">Kyrgyzstan</option>
                                                    <option value="Laos" data-prefix="+856">Laos</option>
                                                    <option value="Latvia" data-prefix="+371">Latvia</option>
                                                    <option value="Lebanon" data-prefix="+961">Lebanon</option>
                                                    <option value="Lesotho" data-prefix="+266">Lesotho</option>
                                                    <option value="Liberia" data-prefix="+231">Liberia</option>
                                                    <option value="Libya" data-prefix="+218">Libya</option>
                                                    <option value="Liechtenstein" data-prefix="+423">Liechtenstein</option>
                                                    <option value="Lithuania" data-prefix="+370">Lithuania</option>
                                                    <option value="Luxembourg" data-prefix="+352">Luxembourg</option>
                                                    <option value="Macau" data-prefix="+853">Macau</option>
                                                    <option value="Madagascar" data-prefix="+261">Madagascar</option>
                                                    <option value="Malawi" data-prefix="+265">Malawi</option>
                                                    <option value="Malaysia" data-prefix="+60">Malaysia</option>
                                                    <option value="Maldives" data-prefix="+960">Maldives</option>
                                                    <option value="Mali" data-prefix="+223">Mali</option>
                                                    <option value="Malta" data-prefix="+356">Malta</option>
                                                    <option value="Marshall Islands" data-prefix="+692">Marshall Islands</option>
                                                    <option value="Martinique" data-prefix="+596">Martinique</option>
                                                    <option value="Mauritania" data-prefix="+222">Mauritania</option>
                                                    <option value="Mauritius" data-prefix="+230">Mauritius</option>
                                                    <option value="Mayotte" data-prefix="+262">Mayotte</option>
                                                    <option value="Mexico" data-prefix="+52">Mexico</option>
                                                    <option value="Micronesia, Federated States of" data-prefix="+691">Micronesia, Federated States of</option>
                                                    <option value="Moldova (plus breakaway Pridnestrovie)" data-prefix="+373">Moldova (plus breakaway Pridnestrovie)</option>
                                                    <option value="Monaco" data-prefix="+377">Monaco</option>
                                                    <option value="Mongolia" data-prefix="+976">Mongolia</option>
                                                    <option value="Montenegro" data-prefix="+382">Montenegro</option>
                                                    <option value="Montserrat" data-prefix="+1 664">Montserrat</option>
                                                    <option value="Morocco" data-prefix="+212">Morocco</option>
                                                    <option value="Mozambique" data-prefix="+258">Mozambique</option>
                                                    <option value="Myanmar" data-prefix="+95">Myanmar</option>
                                                    <option value="Namibia" data-prefix="+264">Namibia</option>
                                                    <option value="Nauru" data-prefix="+674">Nauru</option>
                                                    <option value="Netherlands" data-prefix="+31">Netherlands</option>
                                                    <option value="Netherlands Antilles" data-prefix="+599">Netherlands Antilles</option>
                                                    <option value="Nepal" data-prefix="+977">Nepal</option>
                                                    <option value="New Caledonia" data-prefix="+687">New Caledonia</option>
                                                    <option value="New Zealand" data-prefix="+64">New Zealand</option>
                                                    <option value="Nicaragua" data-prefix="+505">Nicaragua</option>
                                                    <option value="Niger" data-prefix="+227">Niger</option>
                                                    <option value="Nigeria" data-prefix="+234">Nigeria</option>
                                                    <option value="Niue" data-prefix="+683">Niue</option>
                                                    <option value="Norfolk Island" data-prefix="+6723">Norfolk Island</option>
                                                    <option value="North Korea" data-prefix="+850">North Korea</option>
                                                    <option value="North Macedonia" data-prefix="+389">North Macedonia</option>
                                                    <option value="Northern Ireland 44" data-prefix="+28">Northern Ireland 44</option>
                                                    <option value="Northern Mariana Islands" data-prefix="+1 670">Northern Mariana Islands</option>
                                                    <option value="Norway" data-prefix="+47">Norway</option>
                                                    <option value="Oman" data-prefix="+968">Oman</option>
                                                    <option value="Pakistan" data-prefix="+92">Pakistan</option>
                                                    <option value="Palau" data-prefix="+680">Palau</option>
                                                    <option value="Panama" data-prefix="+507">Panama</option>
                                                    <option value="Papua New Guinea" data-prefix="+675">Papua New Guinea</option>
                                                    <option value="Paraguay" data-prefix="+595">Paraguay</option>
                                                    <option value="Peru" data-prefix="+51">Peru</option>
                                                    <option value="Philippines" data-prefix="+63">Philippines</option>
                                                    <option value="Poland" data-prefix="+48">Poland</option>
                                                    <option value="Portugal" data-prefix="+351">Portugal</option>
                                                    <option value="Puerto Rico 1 787 and" data-prefix="+1 939">Puerto Rico 1 787 and</option>
                                                    <option value="Qatar" data-prefix="+974">Qatar</option>
                                                    <option value="Reunion" data-prefix="+262">Reunion</option>
                                                    <option value="Romania" data-prefix="+40">Romania</option>
                                                    <option value="Russia" data-prefix="+7">Russia</option>
                                                    <option value="Rwanda" data-prefix="+250">Rwanda</option>
                                                    <option value="Saint-Barthélemy" data-prefix="+590">Saint-Barthélemy</option>
                                                    <option value="Saint Helena and Tristan da Cunha" data-prefix="+290">Saint Helena and Tristan da Cunha</option>
                                                    <option value="Saint Kitts and Nevis" data-prefix="+1 869">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia" data-prefix="+1 758">Saint Lucia</option>
                                                    <option value="Saint Martin (French side)" data-prefix="+590">Saint Martin (French side)</option>
                                                    <option value="Saint Pierre and Miquelon" data-prefix="+508">Saint Pierre and Miquelon</option>
                                                    <option value="Saint Vincent and the Grenadines" data-prefix="+1 784">Saint Vincent and the Grenadines</option>
                                                    <option value="Samoa" data-prefix="+685">Samoa</option>
                                                    <option value="Sao Tome and Principe" data-prefix="+239">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia" data-prefix="+966">Saudi Arabia</option>
                                                    <option value="Senegal" data-prefix="+221">Senegal</option>
                                                    <option value="Serbia" data-prefix="+381">Serbia</option>
                                                    <option value="Seychelles" data-prefix="+248">Seychelles</option>
                                                    <option value="Sierra Leone" data-prefix="+232">Sierra Leone</option>
                                                    <option value="Sint Maarten (Dutch side)" data-prefix="+1 721">Sint Maarten (Dutch side)</option>
                                                    <option value="Singapore" data-prefix="+65">Singapore</option>
                                                    <option value="Slovakia" data-prefix="+421">Slovakia</option>
                                                    <option value="Slovenia" data-prefix="+386">Slovenia</option>
                                                    <option value="Solomon Islands" data-prefix="+677">Solomon Islands</option>
                                                    <option value="Somalia" data-prefix="+252">Somalia</option>
                                                    <option value="South Africa" data-prefix="+27">South Africa</option>
                                                    <option value="South Korea" data-prefix="+82">South Korea</option>
                                                    <option value="South Sudan" data-prefix="+211">South Sudan</option>
                                                    <option value="Spain" data-prefix="+34">Spain</option>
                                                    <option value="Sri Lanka" data-prefix="+94">Sri Lanka</option>
                                                    <option value="Sudan" data-prefix="+249">Sudan</option>
                                                    <option value="Suriname" data-prefix="+597">Suriname</option>
                                                    <option value="Sweden" data-prefix="+46">Sweden</option>
                                                    <option value="Switzerland" data-prefix="+41">Switzerland</option>
                                                    <option value="Syria" data-prefix="+963">Syria</option>
                                                    <option value="Taiwan" data-prefix="+886">Taiwan</option>
                                                    <option value="Tajikistan" data-prefix="+992">Tajikistan</option>
                                                    <option value="Tanzania" data-prefix="+255">Tanzania</option>
                                                    <option value="Thailand" data-prefix="+66">Thailand</option>
                                                    <option value="Timor-Leste" data-prefix="+670">Timor-Leste</option>
                                                    <option value="Togo" data-prefix="+228">Togo</option>
                                                    <option value="Tokelau" data-prefix="+690">Tokelau</option>
                                                    <option value="Tonga" data-prefix="+676">Tonga</option>
                                                    <option value="Trinidad and Tobago" data-prefix="+1 868">Trinidad and Tobago</option>
                                                    <option value="Tunisia" data-prefix="+216">Tunisia</option>
                                                    <option value="Turkey" data-prefix="+90" selected="selected">Turkey</option>
                                                    <option value="Turkmenistan" data-prefix="+993">Turkmenistan</option>
                                                    <option value="Turks and Caicos Islands" data-prefix="+1 649">Turks and Caicos Islands</option>
                                                    <option value="Tuvalu" data-prefix="+688">Tuvalu</option>
                                                    <option value="Uganda" data-prefix="+256">Uganda</option>
                                                    <option value="Ukraine" data-prefix="+380">Ukraine</option>
                                                    <option value="United Arab Emirates" data-prefix="+971">United Arab Emirates</option>
                                                    <option value="United Kingdom" data-prefix="+44">United Kingdom</option>
                                                    <option value="United States of America" data-prefix="+1">United States of America</option>
                                                    <option value="Uruguay" data-prefix="+598">Uruguay</option>
                                                    <option value="Uzbekistan" data-prefix="+998">Uzbekistan</option>
                                                    <option value="Vanuatu" data-prefix="+678">Vanuatu</option>
                                                    <option value="Venezuela" data-prefix="+58">Venezuela</option>
                                                    <option value="Vietnam" data-prefix="+84">Vietnam</option>
                                                    <option value="U.S. Virgin Islands" data-prefix="+1 340">U.S. Virgin Islands</option>
                                                    <option value="Wallis and Futuna" data-prefix="+681">Wallis and Futuna</option>
                                                    <option value="West Bank" data-prefix="+970">West Bank</option>
                                                    <option value="Yemen" data-prefix="+967">Yemen</option>
                                                    <option value="Zambia" data-prefix="+260">Zambia</option>
                                                    <option value="Zimbabwe" data-prefix="+263">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control form_field" name="state"
                                                    id="state">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Email address">Email address</label>
                                                <input type="text" class="form-control form_field" name="email"
                                                    id="email" placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="title">Telephone</label>
                                                <div class="input-group input_group_field" id="telephone_number">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="prefix_number">
                                                            +90</span>
                                                    </div>
                                                    <input type="text" name="telephone" id="telephone"
                                                        class="form-control form_field"
                                                        placeholder="Enter your phone number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="country">Timezone</label>
                                                <select type="text" class="form-control form_field" name="timezone"
                                                    id="timezone">
                                                    <option value="">Select Timezone</option>
                                                    <option value="Pacific/Midway">Midway Island, Samoa (GMT-11:00)</option>
                                                    <option value="America/Adak">Hawaii-Aleutian (GMT-10:00)</option>
                                                    <option value="Etc/GMT+10">Hawaii (GMT-10:00)</option>
                                                    <option value="Pacific/Marquesas">Marquesas Islands (GMT-09:30)</option>
                                                    <option value="Pacific/Gambier">Gambier Islands (GMT-09:00)</option>
                                                    <option value="America/Anchorage">Alaska (GMT-09:00)</option>
                                                    <option value="America/Ensenada">Tijuana, Baja California (GMT-08:00)</option>
                                                    <option value="Etc/GMT+8">Pitcairn Islands (GMT-08:00)</option>
                                                    <option value="America/Los_Angeles">Pacific Time (US & Canada) (GMT-08:00)</option>
                                                    <option value="America/Denver">Mountain Time (US & Canada) (GMT-07:00)</option>
                                                    <option value="America/Chihuahua">Chihuahua, La Paz, Mazatlan (GMT-07:00)</option>
                                                    <option value="America/Dawson_Creek">Arizona (GMT-07:00)</option>
                                                    <option value="America/Belize">Saskatchewan, Central America (GMT-06:00)</option>
                                                    <option value="America/Cancun">Guadalajara, Mexico City, Monterrey (GMT-06:00)</option>
                                                    <option value="Chile/EasterIsland">Easter Island (GMT-06:00)</option>
                                                    <option value="America/Chicago">Central Time (US & Canada) (GMT-06:00)</option>
                                                    <option value="America/New_York">Eastern Time (US & Canada) (GMT-05:00)</option>
                                                    <option value="America/Havana">Cuba (GMT-05:00)</option>
                                                    <option value="America/Bogota">Bogota, Lima, Quito, Rio Branco (GMT-05:00)</option>
                                                    <option value="America/Caracas">Caracas (GMT-04:30)</option>
                                                    <option value="America/Santiago">Santiago (GMT-04:00)</option>
                                                    <option value="America/La_Paz">La Paz (GMT-04:00)</option>
                                                    <option value="Atlantic/Stanley">Faukland Islands (GMT-04:00)</option>
                                                    <option value="America/Campo_Grande">Brazil (GMT-04:00)</option>
                                                    <option value="America/Goose_Bay">Atlantic Time (Goose Bay) (GMT-04:00)</option>
                                                    <option value="America/Glace_Bay">Atlantic Time (Canada) (GMT-04:00)</option>
                                                    <option value="America/St_Johns">Newfoundland (GMT-03:30)</option>
                                                    <option value="America/Araguaina">UTC-3 (GMT-03:00)</option>
                                                    <option value="America/Montevideo">Montevideo (GMT-03:00)</option>
                                                    <option value="America/Miquelon">Miquelon, St. Pierre (GMT-03:00)</option>
                                                    <option value="America/Godthab">Greenland (GMT-03:00)</option>
                                                    <option value="America/Argentina/Buenos_Aires">Buenos Aires (GMT-03:00)</option>
                                                    <option value="America/Sao_Paulo">Brasilia (GMT-03:00)</option>
                                                    <option value="America/Noronha">Mid-Atlantic (GMT-02:00)</option>
                                                    <option value="Atlantic/Cape_Verde">Cape Verde Is. (GMT-01:00)</option>
                                                    <option value="Atlantic/Azores">Azores (GMT-01:00)</option>
                                                    <option value="Europe/Belfast">Greenwich Mean Time : Belfast (GMT)</option>
                                                    <option value="Europe/Dublin">Greenwich Mean Time : Dublin (GMT)</option>
                                                    <option value="Europe/Lisbon">Greenwich Mean Time : Lisbon (GMT)</option>
                                                    <option value="Europe/London">Greenwich Mean Time : London (GMT)</option>
                                                    <option value="Africa/Abidjan">Monrovia, Reykjavik (GMT)</option>
                                                    <option value="Europe/Amsterdam">Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna (GMT+01:00)</option>
                                                    <option value="Europe/Belgrade">Belgrade, Bratislava, Budapest, Ljubljana, Prague (GMT+01:00)</option>
                                                    <option value="Europe/Brussels">Brussels, Copenhagen, Madrid, Paris (GMT+01:00)</option>
                                                    <option value="Africa/Algiers">West Central Africa (GMT+01:00)</option>
                                                    <option value="Africa/Windhoek">Windhoek (GMT+01:00)</option>
                                                    <option value="Asia/Beirut">Beirut (GMT+02:00)</option>
                                                    <option value="Africa/Cairo">Cairo (GMT+02:00)</option>
                                                    <option value="Asia/Gaza">Gaza (GMT+02:00)</option>
                                                    <option value="Africa/Blantyre">Harare, Pretoria (GMT+02:00)</option>
                                                    <option value="Asia/Jerusalem">Jerusalem (GMT+02:00)</option>
                                                    <option value="Europe/Minsk">Minsk (GMT+02:00)</option>
                                                    <option value="Asia/Damascus">Syria (GMT+02:00)</option>
                                                    <option value="Europe/Moscow">Moscow, St. Petersburg, Volgograd (GMT+03:00)</option>
                                                    <option value="Africa/Addis_Ababa">Nairobi (GMT+03:00)</option>
                                                    <option value="Asia/Tehran">Tehran (GMT+03:30)</option>
                                                    <option value="Asia/Dubai">Abu Dhabi, Muscat (GMT+04:00)</option>
                                                    <option value="Asia/Yerevan">Yerevan (GMT+04:00)</option>
                                                    <option value="Asia/Kabul">Kabul (GMT+04:30)</option>
                                                    <option value="Asia/Yekaterinburg">Ekaterinburg (GMT+05:00)</option>
                                                    <option value="Asia/Tashkent">Tashkent (GMT+05:00)</option>
                                                    <option value="Asia/Kolkata">Chennai, Kolkata, Mumbai, New Delhi (GMT+05:30)</option>
                                                    <option value="Asia/Katmandu">Kathmandu (GMT+05:45)</option>
                                                    <option value="Asia/Dhaka">Astana, Dhaka (GMT+06:00)</option>
                                                    <option value="Asia/Novosibirsk">Novosibirsk (GMT+06:00)</option>
                                                    <option value="Asia/Rangoon">Yangon (Rangoon) (GMT+06:30)</option>
                                                    <option value="Asia/Bangkok">Bangkok, Hanoi, Jakarta (GMT+07:00)</option>
                                                    <option value="Asia/Krasnoyarsk">Krasnoyarsk (GMT+07:00)</option>
                                                    <option value="Asia/Hong_Kong">Beijing, Chongqing, Hong Kong, Urumqi (GMT+08:00)</option>
                                                    <option value="Asia/Irkutsk">Irkutsk, Ulaan Bataar (GMT+08:00)</option>
                                                    <option value="Australia/Perth">Perth (GMT+08:00)</option>
                                                    <option value="Australia/Eucla">Eucla (GMT+08:45)</option>
                                                    <option value="Asia/Tokyo">Osaka, Sapporo, Tokyo (GMT+09:00)</option>
                                                    <option value="Asia/Seoul">Seoul (GMT+09:00)</option>
                                                    <option value="Asia/Yakutsk">Yakutsk (GMT+09:00)</option>
                                                    <option value="Australia/Adelaide">Adelaide (GMT+09:30)</option>
                                                    <option value="Australia/Darwin">Darwin (GMT+09:30)</option>
                                                    <option value="Australia/Brisbane">Brisbane (GMT+10:00)</option>
                                                    <option value="Australia/Hobart">Hobart (GMT+10:00)</option>
                                                    <option value="Asia/Vladivostok">Vladivostok (GMT+10:00)</option>
                                                    <option value="Australia/Lord_Howe">Lord Howe Island (GMT+10:30)</option>
                                                    <option value="Etc/GMT-11">Solomon Is., New Caledonia (GMT+11:00)</option>
                                                    <option value="Asia/Magadan">Magadan (GMT+11:00)</option>
                                                    <option value="Pacific/Norfolk">Norfolk Island (GMT+11:30)</option>
                                                    <option value="Asia/Anadyr">Anadyr, Kamchatka (GMT+12:00)</option>
                                                    <option value="Pacific/Auckland">Auckland, Wellington (GMT+12:00)</option>
                                                    <option value="Etc/GMT-12">Fiji, Kamchatka, Marshall Is. (GMT+12:00)</option>
                                                    <option value="Pacific/Chatham">Chatham Islands (GMT+12:45)</option>
                                                    <option value="Pacific/Tongatapu">Nuku'alofa (GMT+13:00)</option>
                                                    <option value="Pacific/Kiritimati">Kiritimati (GMT+14:00)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="state">Hide address from checkout</label>
                                                <select type="text" class="form-control form_field" name=""
                                                    id="">
                                                    <option selected="selected" value="Show">Show
                                                    </option>
                                                    <option value="Hide">Hide</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="shopshetting_billinginformation d-none">
                                <h4 class="mb-3">Other Shop Settings</h4>
                                <div class="row other_shop_settings">
                                    <div class="col-sm-5 equal_row">
                                        <div class="other_shop_setting_box" data-toggle="modal"
                                            data-target="#stockmanagementModal">
                                            <div class="other_shop_setting_title">
                                                <h5>Stock Management</h5>
                                                <img class="other_shop_setting_icon"
                                                    src="{{ asset('admin/assets/img/dashboard/stockmanagement.svg') }}" alt="">
                                            </div>
                                            <p>Setup stock management for your tangible goods and services
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 equal_row">
                                        <div class="other_shop_setting_box" data-toggle="modal"
                                            data-target="#currencyWhitelisttModal">
                                            <div class="other_shop_setting_title">
                                                <h5>Currency & Whitelist</h5>
                                                <img class="other_shop_setting_icon"
                                                    src="{{ asset('admin/assets/img/dashboard/currencywhitelist.svg') }}" alt="">
                                            </div>
                                            <p>Setup your currency, country whitelist and default rounding
                                                method</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Shop Settings Modal end-->

    <!-- Stock Management model -->
    <div class="modal fade" id="stockmanagementModal" tabindex="-1" role="dialog"
        aria-labelledby="stockmanagementModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body stockmanagementModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt mb-3">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ asset('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="editProfilet_details text-center">
                        <h3 class="modal_title">Stock Management</h3>
                        <p class="modal_subtitle mb-4 stock_management_modal_subtitle">Setup stock
                            management for your
                            tangible goods and services</p>

                    </div>
                    <form class="stockmanagement_form" id="stockmanagement_form" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Inventory Stock Tracking</label>
                                    <select type="text" class="form-control form_field" id="stock_tracking"
                                        name="stock_tracking">
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled">Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <p class="stock_management_form_txt">Reserved stock is not relisted. Once a product
                            runs out of
                            stock, it will not be available for purchase.</p>
                        <div class="">
                            <input type="button" class="theme_btn ripple_btn dark_btn w-100 ml-0" value="save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal-content -->
    </div>
    <!-- Stock Management model end-->

    <!-- Currency & Whitelist model -->
    <div class="modal fade" id="currencyWhitelisttModal" tabindex="-1" role="dialog"
        aria-labelledby="currencyWhitelisttModalLabel">
        <div class="modal-dialog modal_width_500" role="document">
            <div class="modal-content">
                <div class="modal-body currencyWhitelisttModal_body">
                    <div class="row">
                        <div class="col-md-12 back_btn_txt mb-3">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ asset('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                    </div>
                    <div class="editProfilet_details text-center">
                        <h3 class="modal_title">Currency & Whitelist</h3>
                        <p class="modal_subtitle mb-4 stock_management_modal_subtitle">Setup your currency,
                            country
                            whitelist and default rounding method</p>

                    </div>
                    <form class="currency_whitelist_form" id="currency_whitelist_form" autocomplete="off">
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Currency">Currency</label>
                                    <select type="text" class="form-control form_field" id="currency" name="currency">
                                        <option value="EUR">EUR</option>
                                        <option value="GBP">GBP</option>
                                        <option value="USD">USD</option>
                                        <option value="AUD">AUD</option>
                                        <option value="CAD">CAD</option>
                                        <option value="SEK">SEK</option>
                                        <option value="BRL">BRL</option>
                                        <option value="CZK">CZK</option>
                                        <option value="DKK">DKK</option>
                                        <option value="HKD">HKD</option>
                                        <option value="ILS">ILS</option>
                                        <option value="MYR">MYR</option>
                                        <option value="MXN">MXN</option>
                                        <option value="NOK">NOK</option>
                                        <option value="NZD">NZD</option>
                                        <option value="PHP">PHP</option>
                                        <option value="PLN">PLN</option>
                                        <option value="RUB">RUB</option>
                                        <option value="SGD">SGD</option>
                                        <option value="CHF">CHF</option>
                                        <option value="CNY">CNY</option>
                                        <option value="ISK">ISK</option>
                                        <option value="THB">THB</option>
                                        <option value="HUF">HUF</option>
                                        <option value="BGN">BGN</option>
                                        <option value="RON">RON</option>
                                        <option value="HRK">HRK</option>
                                        <option value="KRW">KRW</option>
                                        <option value="ZAR">ZAR</option>
                                        <option value="PKR">PKR</option>
                                        <option value="XCD">XCD</option>
                                        <option value="IDR">IDR</option>
                                        <option value="INR" selected="selected">INR</option>
                                        <option value="TRY">TRY</option>
                                        <option value="JPY">JPY</option>
                                        <option value="VND">VND</option>
                                        <option value="TWD">TWD</option>
                                        <option value="COP">COP</option>
                                        <option value="PEN">PEN</option>
                                        <option value="AED">AED</option>
                                        <option value="SAR">SAR</option>
                                        <option value="BHD">BHD</option>
                                        <option value="NGN">NGN</option>
                                        <option value="TZS">TZS</option>
                                        <option value="GHS">GHS</option>
                                        <option value="NAD">NAD</option>
                                        <option value="BWP">BWP</option>
                                        <option value="QAR">QAR</option>
                                        <option value="BDT">BDT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Rounding Method">Rounding Method</label>
                                    <select type="text" class="form-control form_field" id="rounding_method"
                                        name="rounding_method">
                                        <option value="Default">Default</option>
                                        <option value="Up">Up</option>
                                        <option value="Down">Down</option>
                                        <option value="Nearest">Nearest</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Country Whitelist">Country Whitelist</label>
                                    <select type="text" class="form-control form_field" id="country_whitelist"
                                        name="country_whitelist">
                                        <option value="North America">North America</option>
                                        <option value="Europe">Europe</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina
                                        </option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="St. Vincent &amp; Grenadines">St. Vincent &amp;
                                            Grenadines
                                        </option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Vietnam">Vietnam</option>
                                    </select>
                                </div>
                                <div class="custom_checkbox_field">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="restrict_customers"
                                            id="restrict_customers">
                                        <label class="custom-control-label" for="restrict_customers">Restrict Customers
                                        </label> <i class="fal fa-question-circle" data-toggle="modal"
                                            data-target="#addingRestrictionModal"></i>
                                    </div>
                                </div>
                                <div class="custom_checkbox_field">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="blockpage"
                                            name="blockpage">
                                        <label class="custom-control-label" for="blockpage">Block Hosted
                                            Page </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="currency_whitelist_btn">
                            <input type="button" class="theme_btn ripple_btn dark_btn w-100 ml-0" value="save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal-content -->
    </div>
    <!-- Currency & Whitelist model end-->


    <!-- Add Restrictions Modal -->
    <div class="modal fade" id="addingRestrictionModal" tabindex="-1" role="dialog"
        aria-labelledby="addingRestrictionModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body addingRestrictionModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ asset('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="adding_restriction_title">Adding Restrictions on All your
                                    Shopping Carts</h3>
                            </div>

                        </div>
                    </div>
                    <div class="adding_restriction_content_inner">
                        <div class="adding_restriction_title_txt">
                            <h6><b>Automatically block your cart for visitors to whom you do not ship to</b>
                            </h6>
                            <p>If this option is selected, then your visitors will be able to access your
                                shopping cart(s) only if the products can be shipped to their country. The
                                country is determined by their IP location. This rule is available for
                                Physical
                                products that have shipping conditions specified (calculated or custom).</p>
                        </div>
                        <div class="adding_restriction_title_txt">
                            <h6><b>How to Enable It</b></h6>
                            <p>This option can be enabled for all your active shopping carts automatically
                                by visiting
                                your Settings page- Shop Settings and checking the "Restrict Buyers" option.
                                So, if you
                                cannot ship worldwide than you should check the field Restrict customers and
                                then add
                                all your countries where you can ship on your Whitelist. </p>
                        </div>
                        <img class="adding_restriction_top_img" src="{{ asset('admin/assets/img/dashboard/restrictions1.png') }}"
                            alt="">
                        <div class="adding_restriction_title_txt">
                            <p>Restricting buyers is also available for individual shopping carts and can be
                                activated
                                in the Dashboard while you create your shopping cart. </p>
                        </div>
                        <div class="adding_restriction_title_txt">
                            <h6><b>Checkout Country Whitelist</b></h6>
                            <p>This option allows you to specify a list of countries from which visitors are
                                allowed to
                                access your shopping cart(s). The visitor's country is determined by their
                                IP location.
                                This rule is available for all products.</p>
                        </div>
                        <div class="adding_restriction_title_txt">
                            <h6><b>How to Enable It</b></h6>
                            <p>This option can be enabled for all your active shopping carts automatically
                                by visiting
                                your Settings page by ticking the Checkout Country Whitelist option box
                                under the
                                General Settings section. Choose the countries you wish to include and hit
                                Save. </p>
                        </div>
                        <img class="adding_restriction_center_img" src="{{ asset('admin/assets/img/dashboard/restrictions2.png') }}"
                            alt="">
                        <div class="adding_restriction_title_txt">
                            <p>In those countries that aren't on your whitelist, this message will show up:
                            </p>
                        </div>
                        <img class="adding_restriction_btm_img" src="{{ asset('admin/assets/img/dashboard/restrictions3.png') }}"
                            alt="">
                        <div class="adding_restriction_title_txt">
                            <p>The Checkout Country Whitelist option is also available for individual
                                shopping carts and
                                can be activated in the Dashboard while you create your shopping cart. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- Add Restrictions Modal end-->


    <!-- checkout Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel">
        <div class="modal-dialog modal_width_1155" role="document">
            <div class="modal-content">
                <div class="modal-body checkoutModal_body">
                    <div class="row">
                        <div class="col-md-2 back_btn_txt">
                            <a class="back_btn_link" href="" data-dismiss="modal" aria-label="Close"><img
                                    class="back_btn_img" src="{{ asset('admin/assets/img/dashboard/back-arrow.svg') }}" alt="">
                                <span>Back</span></a>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h3 class="modal_title">How will customers pay?</h3>
                                <p class="modal_subtitle mb-5">Select payment options
                                </p>
                            </div>
                        </div>
                        <!-- <div class="col-md-2 save_btn_txt text-right">
                            <button class="theme_btn ripple_btn dark_btn ">Finish</button>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-4 product_type" data-toggle="modal" data-target="#payfullmethodModal">
                            <div class="product_type_inner text-center"> <img class="paymnet_getway_img"
                                    src="{{ asset('admin/assets/img/paymnetgetway/payfull.png')}}">
                                <p class="product_type_title">Payfull</p>
                                <p class="product_type_txt">Your bank account information is shown in the invoices for successful
                                    orders.</p> <a class="product_type_link themecolor">Active</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- checkout Modal end-->
</div>


@endsection
@section('scripts')

<script>
var options = {
    chart: {
        height: 380,
        width: 650,
        type: "line"
    },
    series: [{
            name: "Event",
            type: "column",
            data: [440, 671, 320]
        },

    ],
    stroke: {
        width: [0, 4],
        curve: 'smooth'
    },
    title: {
        text: "Products"
    },
    // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    labels: [

        "06 Jan 2001",
        "07 Jan 2001",
        "12 Jan 2001"
    ],
    xaxis: {
        type: "datetime"
    },
    yaxis: [{
            title: {
                text: "Event"
            }
        },
        {
            opposite: true,
            title: {
                text: "Sales"
            }
        }
    ]
};

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>
@endsection