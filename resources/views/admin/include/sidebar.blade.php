<a id="show-sidebar" class="sidebar_toggle" href="#">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">

            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="header_top">
            <div class="logo">
                <a href="{{url('/dashboard')}}"><img class="img-responsive logo_img " src="{{ url('admin/assets/img/logo.png') }}" alt="User picture"></a>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li class="nav_menu">
                    <a href="dashboard">
                        <i class="fas fa-chart-bar"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav_menu">
                    <a href="pending-orders">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Pending Orders</span>
                        <span class="badge badge-danger" id="pending_order_count"
                            style="display:none;">3</span>
                    </a>
                </li>
                <li class="nav_menu">
                    <a href="product">
                        <i class="far fa-gem"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav_menu invoice_droupdown">
                    <a href="invoices">
                        <i class="fas fa-dollar-sign"></i> <span>Invoices</span>
                    </a>
                    <ul class="submenu-list collapse list-unstyled" id="submenu1">
                        <li class="nav_menu">
                            <a href="allinvoices"><span>All Invoices</span></a>
                        </li>
                        <li class="nav_menu">
                            <a href="paidinvoices" id="paid_invoices"  style="display:none;"><span>Paid Invoices</span></a>
                        </li>
                        <li class="nav_menu">
                            <a href="unpaidinvoices"><span>Unpaid Invoices</span></a>
                        </li>
                    </ul>
                </li> 
                <li class="nav_menu">
                    <a href="customer">
                    <i class="fas fa-id-card-alt"></i>
                        <span>Customer</span>
                    </a>
                </li>
                <li class="nav_menu setting_droupdown">
                    <a href="orders">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="nav_menu">
                    <a class="dropdown-toggle" href="#submenu2" data-toggle="collapse" aria-expanded="true">
                    <i class="fas fa-cogs"></i> <span>Setting</span>
                    </a>
                    <ul class="submenu-list collapse list-unstyled" id="submenu2">
                        <li class="nav_menu">
                        <a class="" href="paymentgetway">Payment Gateways</a>
                        </li>
                        <li class="nav_menu">
                        <a href class="" style="display: none;" id="edit_shop_settings" data-toggle="modal" data-target=" #editshopSettingsModal" >Shop Information</a>
                        </li>
                    </ul>
                </li> 
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
</nav>