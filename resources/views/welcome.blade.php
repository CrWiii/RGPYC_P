<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Philbert I Next Level Admin template</title>
        <meta name="description" content="Philbert is a responsive HTML5 admin template by hencework." />
        <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Philbert Admin, Philbertadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
        <meta name="author" content="hencework"/>
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- vector map CSS -->
        <link href="vendors/bower_components/jquery-wizard.js/css/wizard.css" rel="stylesheet" type="text/css"/>
        
        <!-- jquery-steps css -->
        <link rel="stylesheet" href="vendors/bower_components/jquery.steps/demo/css/jquery.steps.css">
        
        <!-- Data table CSS -->
        <link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        
        <!-- bootstrap-touchspin CSS -->
        <link href="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
        
        <!-- Custom CSS -->
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            .page-wrapper {
                margin-left: 0px !important;
            }
            .navbar.navbar-inverse.navbar-fixed-top .nav-header {
                width: 105px !important;
            }
        </style>
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->
        <div class="wrapper theme-1-active pimary-color-green">
        
            <!-- Top Menu Items -->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="mobile-only-brand pull-left">
                    <div class="nav-header pull-left">
                        <div class="logo-wrap">
                            <a href="/">
                                <!-- <img class="brand-img" src="dist/img/logo.png" alt="brand"/> -->
                                <span class="brand-text">SR2</span>
                            </a>
                        </div>
                    </div>  
                    <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                    <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
                    <form id="search_form" role="search" class="top-nav-search collapse pull-left">
                        <div class="input-group">
                            <input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                            <button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                    <ul class="nav navbar-right top-nav pull-right">
                        <li>
                            <a id="open_right_sidebar" href="#"><i class="zmdi zmdi-settings top-nav-icon"></i></a>
                        </li>
                        <li class="dropdown app-drp">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-apps top-nav-icon"></i></a>
                            <ul class="dropdown-menu app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
                                <li>
                                    <div class="app-nicescroll-bar">
                                        <ul class="app-icon-wrap pa-10">
                                            <li>
                                                <a href="weather.html" class="connection-item">
                                                <i class="zmdi zmdi-cloud-outline txt-info"></i>
                                                <span class="block">weather</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inbox.html" class="connection-item">
                                                <i class="zmdi zmdi-email-open txt-success"></i>
                                                <span class="block">e-mail</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="calendar.html" class="connection-item">
                                                <i class="zmdi zmdi-calendar-check txt-primary"></i>
                                                <span class="block">calendar</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="vector-map.html" class="connection-item">
                                                <i class="zmdi zmdi-map txt-danger"></i>
                                                <span class="block">map</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="chats.html" class="connection-item">
                                                <i class="zmdi zmdi-comment-outline txt-warning"></i>
                                                <span class="block">chat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="contact-card.html" class="connection-item">
                                                <i class="zmdi zmdi-assignment-account"></i>
                                                <span class="block">contact</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>  
                                </li>
                                <li>
                                    <div class="app-box-bottom-wrap">
                                        <hr class="light-grey-hr ma-0"/>
                                        <a class="block text-center read-all" href="javascript:void(0)"> more </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown full-width-drp">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more-vert top-nav-icon"></i></a>
                            <ul class="dropdown-menu mega-menu pa-0" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li class="product-nicescroll-bar row">
                                    <ul class="pa-20">
                                        <li class="col-md-3 col-xs-6 col-menu-list">
                                            <a href="javascript:void(0);"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                            <hr class="light-grey-hr ma-0"/>
                                            <ul>
                                                <li>
                                                    <a href="index.html">Analytical</a>
                                                </li>
                                                <li>
                                                    <a href="index2.html">Demographic</a>
                                                </li>
                                                <li>
                                                    <a href="index3.html">Project</a>
                                                </li>
                                                <li>
                                                    <a href="index4.html">Hospital</a>
                                                </li>
                                                <li>
                                                    <a href="index5.html">HRM</a>
                                                </li>
                                                <li>
                                                    <a href="index6.html">Real Estate</a>
                                                </li>
                                                <li>
                                                    <a href="profile.html">profile</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="col-md-3 col-xs-6 col-menu-list">
                                            <a href="javascript:void(0);">
                                                <div class="pull-left">
                                                    <i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">E-Commerce</span>
                                                </div>  
                                                <div class="pull-right"><span class="label label-success">hot</span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </a>
                                            <hr class="light-grey-hr ma-0"/>
                                            <ul>
                                                <li>
                                                    <a href="e-commerce.html">Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="product.html">Products</a>
                                                </li>
                                                <li>
                                                    <a href="product-detail.html">Product Detail</a>
                                                </li>
                                                <li>
                                                    <a href="add-products.html">Add Product</a>
                                                </li>
                                                <li>
                                                    <a href="product-orders.html">Orders</a>
                                                </li>
                                                <li>
                                                    <a href="product-cart.html">Cart</a>
                                                </li>
                                                <li>
                                                    <a href="product-checkout.html">Checkout</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="col-md-6 col-xs-12 preview-carousel">
                                            <a href="javascript:void(0);"><div class="pull-left"><span class="right-nav-text">latest products</span></div><div class="clearfix"></div></a>
                                            <hr class="light-grey-hr ma-0"/>
                                            <div class="product-carousel owl-carousel owl-theme text-center">
                                                <a href="#">
                                                    <img src="dist/img/chair.jpg" alt="chair">
                                                    <span>Circle chair</span>
                                                </a>
                                                <a href="#">
                                                    <img src="dist/img/chair2.jpg" alt="chair">
                                                    <span>square chair</span>
                                                </a>
                                                <a href="#">
                                                    <img src="dist/img/chair3.jpg" alt="chair">
                                                    <span>semi circle chair</span>
                                                </a>
                                                <a href="#">
                                                    <img src="dist/img/chair4.jpg" alt="chair">
                                                    <span>wooden chair</span>
                                                </a>
                                                <a href="#">
                                                    <img src="dist/img/chair2.jpg" alt="chair">
                                                    <span>square chair</span>
                                                </a>                                
                                            </div>
                                        </li>
                                    </ul>
                                </li>   
                            </ul>
                        </li>
                        <li class="dropdown alert-drp">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
                            <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
                                <li>
                                    <div class="notification-box-head-wrap">
                                        <span class="notification-box-head pull-left inline-block">notifications</span>
                                        <a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
                                        <div class="clearfix"></div>
                                        <hr class="light-grey-hr ma-0"/>
                                    </div>
                                </li>
                                <li>
                                    <div class="streamline message-nicescroll-bar">
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon bg-green">
                                                    <i class="zmdi zmdi-flag"></i>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">
                                                    New subscription created</span>
                                                    <span class="inline-block font-11  pull-right notifications-time">2pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
                                                </div>
                                            </a>    
                                        </div>
                                        <hr class="light-grey-hr ma-0"/>
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon bg-yellow">
                                                    <i class="zmdi zmdi-trending-down"></i>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server #2 not responding</span>
                                                    <span class="inline-block font-11 pull-right notifications-time">1pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">Some technical error occurred needs to be resolved.</p>
                                                </div>
                                            </a>    
                                        </div>
                                        <hr class="light-grey-hr ma-0"/>
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon bg-blue">
                                                    <i class="zmdi zmdi-email"></i>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">2 new messages</span>
                                                    <span class="inline-block font-11  pull-right notifications-time">4pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate"> The last payment for your G Suite Basic subscription failed.</p>
                                                </div>
                                            </a>    
                                        </div>
                                        <hr class="light-grey-hr ma-0"/>
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="sl-avatar">
                                                    <img class="img-responsive" src="dist/img/avatar.jpg" alt="avatar"/>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy Doe</span>
                                                    <span class="inline-block font-11  pull-right notifications-time">1pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                </div>
                                            </a>    
                                        </div>
                                        <hr class="light-grey-hr ma-0"/>
                                        <div class="sl-item">
                                            <a href="javascript:void(0)">
                                                <div class="icon bg-red">
                                                    <i class="zmdi zmdi-storage"></i>
                                                </div>
                                                <div class="sl-content">
                                                    <span class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99% server space occupied.</span>
                                                    <span class="inline-block font-11  pull-right notifications-time">1pm</span>
                                                    <div class="clearfix"></div>
                                                    <p class="truncate">consectetur, adipisci velit.</p>
                                                </div>
                                            </a>    
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="notification-box-bottom-wrap">
                                        <hr class="light-grey-hr ma-0"/>
                                        <a class="block text-center read-all" href="javascript:void(0)"> read all </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown auth-drp">
                            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                                <li>
                                    <a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="zmdi zmdi-card"></i><span>my balance</span></a>
                                </li>
                                <li>
                                    <a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
                                </li>
                                <li class="divider"></li>
                                <li class="sub-menu show-on-hover">
                                    <a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-check text-success"></i> available</a>
                                    <ul class="dropdown-menu open-left-side">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-check text-success"></i><span>available</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle-o text-warning"></i><span>busy</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>offline</span></a>
                                        </li>
                                    </ul>   
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>  
            </nav>
            <!-- /Top Menu Items -->
            
            <!-- Left Sidebar Menu -->
            
            <!-- /Left Sidebar Menu -->
            
            <!-- Right Sidebar Menu -->
            <div class="fixed-sidebar-right">
                <ul class="right-sidebar">
                    <li>
                        <div  class="tab-struct custom-tab-1">
                            <ul role="tablist" class="nav nav-tabs" id="right_sidebar_tab">
                                <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="chat_tab_btn" href="#chat_tab">chat</a></li>
                                <li role="presentation" class=""><a  data-toggle="tab" id="messages_tab_btn" role="tab" href="#messages_tab" aria-expanded="false">messages</a></li>
                                <li role="presentation" class=""><a  data-toggle="tab" id="todo_tab_btn" role="tab" href="#todo_tab" aria-expanded="false">todo</a></li>
                            </ul>
                            <div class="tab-content" id="right_sidebar_content">
                                <div  id="chat_tab" class="tab-pane fade active in" role="tabpanel">
                                    <div class="chat-cmplt-wrap">
                                        <div class="chat-box-wrap">
                                            <div class="add-friend">
                                                <a href="javascript:void(0)" class="inline-block txt-grey">
                                                    <i class="zmdi zmdi-more"></i>
                                                </a>    
                                                <span class="inline-block txt-dark">users</span>
                                                <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <form role="search" class="chat-search pl-15 pr-15 pb-15">
                                                <div class="input-group">
                                                    <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                            <div id="chat_list_scroll">
                                                <div class="nicescroll-bar">
                                                    <ul class="chat-list-wrap">
                                                        <li class="chat-list">
                                                            <div class="chat-body">
                                                                <a href="javascript:void(0)">
                                                                    <div class="chat-data">
                                                                        <img class="user-img img-circle"  src="dist/img/user.png" alt="user"/>
                                                                        <div class="user-data">
                                                                            <span class="name block capitalize-font">Clay Masse</span>
                                                                            <span class="time block truncate txt-grey">No one saves us but ourselves.</span>
                                                                        </div>
                                                                        <div class="status away"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <div class="chat-data">
                                                                        <img class="user-img img-circle"  src="dist/img/user1.png" alt="user"/>
                                                                        <div class="user-data">
                                                                            <span class="name block capitalize-font">Evie Ono</span>
                                                                            <span class="time block truncate txt-grey">Unity is strength</span>
                                                                        </div>
                                                                        <div class="status offline"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <div class="chat-data">
                                                                        <img class="user-img img-circle"  src="dist/img/user2.png" alt="user"/>
                                                                        <div class="user-data">
                                                                            <span class="name block capitalize-font">Madalyn Rascon</span>
                                                                            <span class="time block truncate txt-grey">Respect yourself if you would have others respect you.</span>
                                                                        </div>
                                                                        <div class="status online"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <div class="chat-data">
                                                                        <img class="user-img img-circle"  src="dist/img/user3.png" alt="user"/>
                                                                        <div class="user-data">
                                                                            <span class="name block capitalize-font">Mitsuko Heid</span>
                                                                            <span class="time block truncate txt-grey">I’m thankful.</span>
                                                                        </div>
                                                                        <div class="status online"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <div class="chat-data">
                                                                        <img class="user-img img-circle"  src="dist/img/user.png" alt="user"/>
                                                                        <div class="user-data">
                                                                            <span class="name block capitalize-font">Ezequiel Merideth</span>
                                                                            <span class="time block truncate txt-grey">Patience is bitter.</span>
                                                                        </div>
                                                                        <div class="status offline"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <div class="chat-data">
                                                                        <img class="user-img img-circle"  src="dist/img/user1.png" alt="user"/>
                                                                        <div class="user-data">
                                                                            <span class="name block capitalize-font">Jonnie Metoyer</span>
                                                                            <span class="time block truncate txt-grey">Genius is eternal patience.</span>
                                                                        </div>
                                                                        <div class="status online"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <div class="chat-data">
                                                                        <img class="user-img img-circle"  src="dist/img/user2.png" alt="user"/>
                                                                        <div class="user-data">
                                                                            <span class="name block capitalize-font">Angelic Lauver</span>
                                                                            <span class="time block truncate txt-grey">Every burden is a blessing.</span>
                                                                        </div>
                                                                        <div class="status away"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <div class="chat-data">
                                                                        <img class="user-img img-circle"  src="dist/img/user3.png" alt="user"/>
                                                                        <div class="user-data">
                                                                            <span class="name block capitalize-font">Priscila Shy</span>
                                                                            <span class="time block truncate txt-grey">Wise to resolve, and patient to perform.</span>
                                                                        </div>
                                                                        <div class="status online"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)">
                                                                    <div class="chat-data">
                                                                        <img class="user-img img-circle"  src="dist/img/user4.png" alt="user"/>
                                                                        <div class="user-data">
                                                                            <span class="name block capitalize-font">Linda Stack</span>
                                                                            <span class="time block truncate txt-grey">Our patience will achieve more than our force.</span>
                                                                        </div>
                                                                        <div class="status away"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="recent-chat-box-wrap">
                                            <div class="recent-chat-wrap">
                                                <div class="panel-heading ma-0">
                                                    <div class="goto-back">
                                                        <a  id="goto_back" href="javascript:void(0)" class="inline-block txt-grey">
                                                            <i class="zmdi zmdi-chevron-left"></i>
                                                        </a>    
                                                        <span class="inline-block txt-dark">ryan</span>
                                                        <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-more"></i></a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body pa-0">
                                                        <div class="chat-content">
                                                            <ul class="nicescroll-bar pt-20">
                                                                <li class="friend">
                                                                    <div class="friend-msg-wrap">
                                                                        <img class="user-img img-circle block pull-left"  src="dist/img/user.png" alt="user"/>
                                                                        <div class="msg pull-left">
                                                                            <p>Hello Jason, how are you, it's been a long time since we last met?</p>
                                                                            <div class="msg-per-detail text-right">
                                                                                <span class="msg-time txt-grey">2:30 PM</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>  
                                                                </li>
                                                                <li class="self mb-10">
                                                                    <div class="self-msg-wrap">
                                                                        <div class="msg block pull-right"> Oh, hi Sarah I'm have got a new job now and is going great.
                                                                            <div class="msg-per-detail text-right">
                                                                                <span class="msg-time txt-grey">2:31 pm</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>  
                                                                </li>
                                                                <li class="self">
                                                                    <div class="self-msg-wrap">
                                                                        <div class="msg block pull-right">  How about you?
                                                                            <div class="msg-per-detail text-right">
                                                                                <span class="msg-time txt-grey">2:31 pm</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>  
                                                                </li>
                                                                <li class="friend">
                                                                    <div class="friend-msg-wrap">
                                                                        <img class="user-img img-circle block pull-left"  src="dist/img/user.png" alt="user"/>
                                                                        <div class="msg pull-left"> 
                                                                            <p>Not too bad.</p>
                                                                            <div class="msg-per-detail  text-right">
                                                                                <span class="msg-time txt-grey">2:35 pm</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>  
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="text" id="input_msg_send" name="send-msg" class="input-msg-send form-control" placeholder="Type something">
                                                            <div class="input-group-btn emojis">
                                                                <div class="dropup">
                                                                    <button type="button" class="btn  btn-default  dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-mood"></i></button>
                                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                                        <li><a href="javascript:void(0)">Action</a></li>
                                                                        <li><a href="javascript:void(0)">Another action</a></li>
                                                                        <li class="divider"></li>
                                                                        <li><a href="javascript:void(0)">Separated link</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="input-group-btn attachment">
                                                                <div class="fileupload btn  btn-default"><i class="zmdi zmdi-attachment-alt"></i>
                                                                    <input type="file" class="upload">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div id="messages_tab" class="tab-pane fade" role="tabpanel">
                                    <div class="message-box-wrap">
                                        <div class="msg-search">
                                            <a href="javascript:void(0)" class="inline-block txt-grey">
                                                <i class="zmdi zmdi-more"></i>
                                            </a>    
                                            <span class="inline-block txt-dark">messages</span>
                                            <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-search"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="set-height-wrap">
                                            <div class="streamline message-box nicescroll-bar">
                                                <a href="javascript:void(0)">
                                                    <div class="sl-item unread-message">
                                                        <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                            <img class="img-responsive img-circle" src="dist/img/user.png" alt="avatar"/>
                                                        </div>
                                                        <div class="sl-content">
                                                            <span class="inline-block capitalize-font   pull-left message-per">Clay Masse</span>
                                                            <span class="inline-block font-11  pull-right message-time">12:28 AM</span>
                                                            <div class="clearfix"></div>
                                                            <span class=" truncate message-subject">Themeforest message sent via your envato market profile</span>
                                                            <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsu messm quia dolor sit amet, consectetur, adipisci velit</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="sl-item">
                                                        <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                            <img class="img-responsive img-circle" src="dist/img/user1.png" alt="avatar"/>
                                                        </div>
                                                        <div class="sl-content">
                                                            <span class="inline-block capitalize-font   pull-left message-per">Evie Ono</span>
                                                            <span class="inline-block font-11  pull-right message-time">1 Feb</span>
                                                            <div class="clearfix"></div>
                                                            <span class=" truncate message-subject">Pogody theme support</span>
                                                            <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="sl-item">
                                                        <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                            <img class="img-responsive img-circle" src="dist/img/user2.png" alt="avatar"/>
                                                        </div>
                                                        <div class="sl-content">
                                                            <span class="inline-block capitalize-font   pull-left message-per">Madalyn Rascon</span>
                                                            <span class="inline-block font-11  pull-right message-time">31 Jan</span>
                                                            <div class="clearfix"></div>
                                                            <span class=" truncate message-subject">Congratulations from design nominees</span>
                                                            <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="sl-item unread-message">
                                                        <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                            <img class="img-responsive img-circle" src="dist/img/user3.png" alt="avatar"/>
                                                        </div>
                                                        <div class="sl-content">
                                                            <span class="inline-block capitalize-font   pull-left message-per">Ezequiel Merideth</span>
                                                            <span class="inline-block font-11  pull-right message-time">29 Jan</span>
                                                            <div class="clearfix"></div>
                                                            <span class=" truncate message-subject">Themeforest item support message</span>
                                                            <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="sl-item unread-message">
                                                        <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                            <img class="img-responsive img-circle" src="dist/img/user4.png" alt="avatar"/>
                                                        </div>
                                                        <div class="sl-content">
                                                            <span class="inline-block capitalize-font   pull-left message-per">Jonnie Metoyer</span>
                                                            <span class="inline-block font-11  pull-right message-time">27 Jan</span>
                                                            <div class="clearfix"></div>
                                                            <span class=" truncate message-subject">Help with beavis contact form</span>
                                                            <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="sl-item">
                                                        <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                            <img class="img-responsive img-circle" src="dist/img/user.png" alt="avatar"/>
                                                        </div>
                                                        <div class="sl-content">
                                                            <span class="inline-block capitalize-font   pull-left message-per">Priscila Shy</span>
                                                            <span class="inline-block font-11  pull-right message-time">19 Jan</span>
                                                            <div class="clearfix"></div>
                                                            <span class=" truncate message-subject">Your uploaded theme is been selected</span>
                                                            <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="sl-item">
                                                        <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                            <img class="img-responsive img-circle" src="dist/img/user1.png" alt="avatar"/>
                                                        </div>
                                                        <div class="sl-content">
                                                            <span class="inline-block capitalize-font   pull-left message-per">Linda Stack</span>
                                                            <span class="inline-block font-11  pull-right message-time">13 Jan</span>
                                                            <div class="clearfix"></div>
                                                            <span class=" truncate message-subject"> A new rating has been received</span>
                                                            <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div  id="todo_tab" class="tab-pane fade" role="tabpanel">
                                    <div class="todo-box-wrap">
                                        <div class="add-todo">
                                            <a href="javascript:void(0)" class="inline-block txt-grey">
                                                <i class="zmdi zmdi-more"></i>
                                            </a>    
                                            <span class="inline-block txt-dark">todo list</span>
                                            <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="set-height-wrap">
                                            <!-- Todo-List -->
                                            <ul class="todo-list nicescroll-bar">
                                                <li class="todo-item">
                                                    <div class="checkbox checkbox-default">
                                                        <input type="checkbox" id="checkbox01"/>
                                                        <label for="checkbox01">Record The First Episode</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <hr class="light-grey-hr"/>
                                                </li>
                                                <li class="todo-item">
                                                    <div class="checkbox checkbox-pink">
                                                        <input type="checkbox" id="checkbox02"/>
                                                        <label for="checkbox02">Prepare The Conference Schedule</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <hr class="light-grey-hr"/>
                                                </li>
                                                <li class="todo-item">
                                                    <div class="checkbox checkbox-warning">
                                                        <input type="checkbox" id="checkbox03" checked/>
                                                        <label for="checkbox03">Decide The Live Discussion Time</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <hr class="light-grey-hr"/>
                                                </li>
                                                <li class="todo-item">
                                                    <div class="checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox04" checked/>
                                                        <label for="checkbox04">Prepare For The Next Project</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <hr class="light-grey-hr"/>
                                                </li>
                                                <li class="todo-item">
                                                    <div class="checkbox checkbox-danger">
                                                        <input type="checkbox" id="checkbox05" checked/>
                                                        <label for="checkbox05">Finish Up AngularJs Tutorial</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <hr class="light-grey-hr"/>
                                                </li>
                                                <li class="todo-item">
                                                    <div class="checkbox checkbox-purple">
                                                        <input type="checkbox" id="checkbox06" checked/>
                                                        <label for="checkbox06">Finish Infinity Project</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <hr class="light-grey-hr"/>
                                                </li>
                                            </ul>
                                            <!-- /Todo-List -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /Right Sidebar Menu -->
            
            
            
            <!-- Right Sidebar Backdrop -->
            <div class="right-sidebar-backdrop"></div>
            <!-- /Right Sidebar Backdrop -->
            
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                          <h5 class="txt-dark">Registrar Caso</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                          <ol class="breadcrumb">
                            <li><a href="/">Lista de Casos</a></li>
                            <!-- <li><a href="#"><span>forms</span></a></li> -->
                            <li class="active"><span>Registrar Caso</span></li>
                          </ol>
                        </div>
                        <!-- /Breadcrumb -->
                    </div>
                    <!-- /Title -->
                    
                    <!-- Row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">Datos del Reclamo</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div id="example-basic">
                                            <h3><span class="head-font capitalize-font">Notificación</span></h3>
                                            <section>
                                                <div class="col-md-12 block_border">
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label"><strong>Quien Notificó: </strong><label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('notifier_type_id') ? ' has-error' : '' }}" id="notifier_type_id_block">
                                                                    <select class="form-control input-sm" name="notifier_type_id" id="notifier_type_id">
                                                                        <option value="0" @if (old('notifier_type_id') == '0') selected="selected" @endif >[ELIJA UNO]</option>
                                                                            @foreach($notifierType as $key => $value)
                                                                                <option value="{{$key}}" @if (old('notifier_type_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    @if($errors->has('notifier_type_id'))
                                                                        <span class="help-block la-red">
                                                                            <strong>{{ $errors->first('notifier_type_id') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        <label class="col-md-2 form-label"><strong>Nombre Notificante: </strong><label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group" id="notifier_name_block">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control input-sm" name="notifier_name" id="notifier_name" value="{{ old('notifier_name') }}" disabled="disabled">
                                                                         <input type="hidden" name="notifier_id" id="notifier_id" value="{{ old('notifier_id') }}">
                                                                         <span class="input-group-btn">
                                                                            <button id="searchPerson" data-id="1" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        <label class="col-md-2 form-label"><strong>Fecha y Hora: </strong><label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('notifier_date') ? ' has-error' : '' }}" id="notifier_date_block">
                                                                    <div class='input-group date'>
                                                                        <input type="text" class="form-control input-sm" id="notifier_date" name="notifier_date" value="{{ old('notifier_date') }}">
                                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                            @if ($errors->has('notifier_date'))
                                                                            <span class="help-block la-red">
                                                                                <strong>{{ $errors->first('notifier_date') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label">Medio de Notificación:<label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('notifier_mean_id') ? ' has-error' : '' }}" id="notifier_mean_id_block">
                                                                    <select class="form-control input-sm" name="notifier_mean_id" id="notifier_mean_id">
                                                                        <option value="0" @if (old('notifier_mean_id') == '0') selected="selected" @endif >[ELIJA UNO]</option>
                                                                            @foreach($mean as $key => $value)
                                                                                <option value="{{$key}}" @if (old('notifier_mean_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                             @endforeach
                                                                    </select>
                                                                    @if ($errors->has('notifier_mean_id'))
                                                                        <span class="help-block la-red">
                                                                            <strong>{{ $errors->first('notifier_mean_id') }}</strong>
                                                                        </span>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                        <div id="notificacion_tab">
                                                            <label  class="col-md-2 form-label">Quien Confirmó <!--(Aseguradora)--></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control input-sm" name="confirming_who_name" id="confirming_who_name" value="{{ old('confirming_who_name') }}" disabled="disabled">
                                                                        <input type="hidden" name="confirming_who_id" id="confirming_who_id" value="{{ old('confirming_who_id') }}">
                                                                            <span class="input-group-btn">
                                                                                <button id="searchPerson" data-id="2" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <label class="col-md-2 form-label">Fecha y Hora <label class="la-red">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('confirming_date') ? ' has-error' : '' }}">
                                                                        <div class='input-group date'>
                                                                            <input type="text" class="form-control input-sm" id="confirming_date" name="confirming_date" value="{{ old('confirming_date') }}"   >
                                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                                            @if ($errors->has('confirming_date'))
                                                                                <span class="help-block la-red">
                                                                                    <strong>{{ $errors->first('confirming_date') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </section>
                                            <h3><span class="head-font capitalize-font">Reclamo</span></h3>
                                            <section>
                                                <div class="col-md-12 block_border">
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                            <label  class="col-md-2 form-label"> Contratante <label style="color: #FF0000">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input" id="contratante_name_block">
                                                                <input type="text" class="form-control input-sm" name="contratante_name" id="contratante_name">
                                                                <input type="hidden" name="contratante_id" id="contratante_id">
                                                            </div>
                                                            <label  class="col-md-2 form-label">Asegurado <label style="color: #FF0000">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input" id="asegurado_name_block">
                                                                <input type="text" class="form-control input-sm" name="asegurado_name" id="asegurado_name">
                                                                <input type="hidden" name="asegurado_id" id="asegurado_id">
                                                            </div>
                                                            <label  class="col-md-2 form-label">Fecha Hora Siniestro <label style="color: #FF0000; font-size:0.9em;">(*)</label></label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('fecha_siniestro') ? ' has-error' : '' }}" id="fecha_siniestro_block">
                                                                <div class='input-group date'>
                                                                    <input type="text" class="form-control input-sm" id="fecha_siniestro" name="fecha_siniestro" value="{{ old('fecha_siniestro') }}">
                                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                    @if ($errors->has('fecha_siniestro'))
                                                                            <span class="help-block" style="color: #ff0000">
                                                                                <strong>{{ $errors->first('fecha_siniestro') }}</strong>
                                                                            </span>
                                                                    @endif
                                                                </div>
                                                                </div>
                                                            </div>
                                                    </div>      
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label">Lugar del Siniestro</label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                            <input type="text" class="form-control  input-sm" name="lugar_siniestro" id="lugar_siniestro">
                                                        </div>
                                                        <label  class="col-md-2 form-label">Distrito - Prov. - Dpto.</label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                            <input type="text" class="form-control input-sm" name="ubigeo_name" id="ubigeo_name">
                                                            <input type="hidden" name="ubigeo_id" id="ubigeo_id">
                                                        </div>
                                                        <label  class="col-md-2 form-label">Tipo de Poliza <label style="color: #FF0000">(*)</label></label>
                                                        <div class="col-md-2 fix-size-for-input" id="tipo_poliza_id_block">
                                                                <select class="form-control input-sm" name="tipo_poliza_id" id="tipo_poliza_id">
                                                                    <option value="0">[ELIJA UNO]</option>
                                                                    @foreach($polizas as $key => $value)
                                                                        <option value="{{$key}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>                                                                     
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label">Tipo de Siniestro | <label style="color: #FF0000">(*)</label></label>
                                                        <div class="col-sm-2 fix-size-for-input">
                                                            <div class="form-group{{ $errors->has('tipo_siniestro_id') ? ' has-error' : '' }}" id="tipo_siniestro_id_block">
                                                                <select class="form-control select2" name="tipo_siniestro_id" id="tipo_siniestro_id" style="width: 100%;" class="required">
                                                                        <option value="0" @if (old('tipo_siniestro_id') == '0') selected="selected" @endif>SELECCIONE UN TIPO DE SINIESTRO</option>
                                                                        @foreach($tipo_siniestro as $key => $value)
                                                                            <option value="{{$key}}" @if (old('tipo_siniestro_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                        @endforeach
                                                                </select class="form-control" >
                                                                @if($errors->has('tipo_siniestro_id'))
                                                                        <span class="help-block" style="color: #ff0000">
                                                                            <strong>{{ $errors->first('tipo_siniestro_id') }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <label  class="col-md-2 form-label">Giro de Negocio <!--/Ocupacion--><label style="color: #FF0000; font-size:0.9em;">(*)</label></label>
                                                        <div class="col-md-2 fix-size-for-input" id="giro_negocio_block">
                                                            <input type="text" class="form-control  input-sm" name="giro_negocio" id="giro_negocio">
                                                        </div>
                                                        <label  class="col-md-2 form-label">Ramo Afectado</label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                                <div class="form-group{{ $errors->has('ramo_id') ? ' has-error' : '' }}">
                                                                    <select class="form-control input-sm" name="ramo_id" id="ramo_id" class="required">
                                                                            <option value="0" @if (old('ramo_id') == '0') selected="selected" @endif >SELECCIONE UN RAMO</option>
                                                                            @foreach($ramo as $key => $value)
                                                                                <option value="{{$key}}" @if (old('ramo_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    @if($errors->has('ramo_id'))
                                                                        <span class="help-block" style="color: #ff0000">
                                                                            <strong>{{ $errors->first('ramo_id') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                        <label  class="col-md-2 form-label">Persona de Contacto </label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                            <div class="form-group{{ $errors->has('contact_contratante_name') ? ' has-error' : '' }}">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control input-sm" name="contact_contratante_name" id="contact_contratante_name" value="{{ old('contact_contratante_name') }}" disabled="disabled">
                                                                    <input type="hidden" name="contact_contratante_id" id="contact_contratante_id" value="{{ old('contact_contratante_id') }}">
                                                                    <span class="input-group-btn">
                                                                        <button id="searchPerson" data-id="6" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                </div>
                                                                @if($errors->has('contact_contratante_id'))
                                                                    <span class="help-block" style="color: #ff0000">
                                                                        <strong>{{ $errors->first('contact_contratante_id') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <label  class="col-md-2 form-label">Descripción Siniestro <label style="color: #FF0000; font-size:0.9em;">(*)</label></label>
                                                        <div class="col-md-6 fix-size-for-input">
                                                            <div class="form-group {{ $errors->has('descripcion_siniestro') ? 'has-error' : '' }}" id="descripcion_siniestro_block">
                                                            <textarea name="descripcion_siniestro" id="descripcion_siniestro" class="form-control" placeholder="">{{ old('descripcion_siniestro') }}</textarea>
                                                                @if($errors->has('descripcion_siniestro'))
                                                                    <span class="help-block" style="color: #FF0000">
                                                                        <strong>{{ $errors->first('descripcion_siniestro') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <h3><span class="head-font capitalize-font">Gestores</span></h3>
                                            <section>
                                                <div class="col-md-12 block_border">
                                                        <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                    <label  class="col-md-2 form-label">Aseguradora <label style="color: #FF0000;">(*)</label> </label>
                                                    <div class="col-sm-2 fix-size-for-input">
                                                        <div class="form-group{{ $errors->has('cia_id') ? ' has-error' : '' }}" id="cia_id_block" >
                                                            <select class="form-control input-sm" name="cia_id" id="cia_id">
                                                                    <option value="0" @if (old('cia_id') == '0') selected="selected" @endif>SELECCIONE UNA ASEGURADORA</option>
                                                                    @foreach($cia as $key => $value)
                                                                        <option value="{{$key}}" @if (old('cia_id') == $key) selected="selected" @endif>{{$value}}</option>
                                                                    @endforeach
                                                            </select>
                                                            @if ($errors->has('cia_id'))
                                                                    <span class="help-block" style="color: #ff0000">
                                                                        <strong>{{ $errors->first('cia_id') }}</strong>
                                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2 form-label">Broker </label>
                                                    <div class="col-md-2 fix-size-for-input" id="broker_id_block">                                              
                                                        <select class="form-control select2" name="broker_id" id="broker_id" style="width: 100%">
                                                            <option selected="selected" value="0" >SELECCIONE UN BROKER</option>
                                                            @foreach(@$Brokers as $broker)
                                                                <option value="{{$broker->id}}">{{$broker->description}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label class="col-md-2 form-label">Responsable</label>
                                                    <div class="col-md-2 fix-size-for-input" id="responsable_id_block">
                                                        <select class="form-control input-sm" name="responsable_id" id="responsable_id">
                                                            <option value="0">SELECCIONE UN RESPONSABLE</option>
                                                            @foreach($Responsables as $responsable)
                                                            <option value="{{$responsable->id}}">{{$responsable->search}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-md-12 form-group row fix-size-for-input">

                                                    <label  class="col-md-2 form-label">Responsable <label style="color: #ffffff;">(*)</label> </label>
                                                    <div class="col-md-2 fix-size-for-input" id="ejecutivo_aseguradora_name_block">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control input-sm" name="ejecutivo_aseguradora_name" id="ejecutivo_aseguradora_name" value="{{ old('ejecutivo_aseguradora_name') }}" disabled="disabled">
                                                                <input type="hidden" name="ejecutivo_aseguradora_id" id="ejecutivo_aseguradora_id" value="{{ old('ejecutivo_aseguradora_id') }}">
                                                                <span class="input-group-btn">
                                                                    <button id="searchPerson" data-id="3" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label  class="col-md-2 form-label">Responsable</label>
                                                    <div class="col-md-2 fix-size-for-input" id="ejecutivo_broker_name_block">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="ejecutivo_broker_name" id="ejecutivo_broker_name" value="{{ old('ejecutivo_broker_name') }}" disabled="disabled">
                                                            <input type="hidden" name="ejecutivo_broker_id" id="ejecutivo_broker_id" value="{{ old('ejecutivo_broker_id') }}" >
                                                            <span class="input-group-btn">
                                                                <button id="searchPerson" data-id="4" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <label class="col-md-2 form-label">Ajustador</label>
                                                    <div class="col-md-2 fix-size-for-input" id="ajustador_asignado_id_block">
                                                        <select class="form-control input-sm" name="ajustador_asignado_id" id="ajustador_asignado_id">
                                                                <option selected="selected" value="0" >SELECCIONE UN AJUSTADOR</option>
                                                            @foreach($ajustadores as $ajustador)
                                                                <option value="{{$ajustador->id}}">{{$ajustador->search}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>



                                                    </div>


                                                <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                    <label  class="col-md-2 form-label">N° de Siniestro  <label style="color: #ffffff;">(*)</label> </label>
                                                     <div class="col-md-2 fix-size-for-input"> 
                                                        <div class="form-group">
                                                            <input type="text"  class="form-control input-sm" name="num_siniestro_cia" id="num_siniestro_cia">
                                                        </div>
                                                    </div>
                                                    <label  class="col-md-2 form-label">N° de Siniestro Broker</label>
                                                    <div class="col-md-2 fix-size-for-input">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control input-sm" name="num_siniestro_broker" id="num_siniestro_broker">
                                                        </div>
                                                    </div>
                                                    <label  class="col-md-2 form-label">Equipo</label>
                                                    <div class="col-md-2 fix-size-for-input">
                                                        <div class='input-group date'>
                                                        <span class="input-group-addon" data-toggle="modal" data-target="#modal-equipo"><span class="glyphicon glyphicon-plus"></span></span>
                                                        <input type="text" class="form-control input-sm" id="equipo" name="equipo" disabled="disabled">
                                                        <span class="input-group-addon"><i data-toggle="tooltip" style="width: 100%;" data-html="true" id="post_title"><span class="glyphicon glyphicon-eye-open"></span></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-md-12 form-group row fix-size-for-input">
                                                    <label  class="col-md-2 form-label">N° de Póliza <label style="color: #FF0000; font-size:0.9em;"></label> </label>
                                                    <div class="col-md-2 fix-size-for-input" id="num_poliza_block">
                                                        <div class="form-group">
                                                            <input type="text"  class="form-control input-sm" name="num_poliza" id="num_poliza">
                                                        </div>
                                                    </div>                              
                                                </div>

                                                </div>
                                            </section>
                                            <h3><span class="head-font capitalize-font">Inspeccion</span></h3>
                                            <section>
                                                <div class="col-md-12 block_border">
                                                    <div class="col-md-12 col-md-12 form-group row fix-size-for-input" id="div_inspeccion">
                                                        <label  class="col-md-2 form-label"><!--Fecha y Hora en la que se--> Coordina la Inspección </label>
                                                        <div class="col-md-2 fix-size-for-input">
                                                            <div class='input-group date'>
                                                                <span class="input-group-addon" id="vitacora" data-toggle="modal" data-target="#modal-vitacora"><span class="glyphicon glyphicon-plus"></span></span>
                                                                <input type="text" class="form-control input-sm" id="fecha_coordinacion_inspeccion" name="fecha_coordinacion_inspeccion" disabled="disabled" >
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            </div>
                                                        </div>

                                                            <label class="col-md-2 form-label"><!--Fecha y Hora para la que se--> programa la Inspección</label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <div class='input-group date'>
                                                                    <input type="text" class="form-control input-sm" id="fecha_programada_inspeccion" name="fecha_programada_inspeccion">
                                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                                </div>
                                                            </div>

                                                            <label  class="col-md-2 form-label">Direccion de Inspección</label>
                                                            <div class="col-md-2">
                                                                <input type="text" class="form-control  input-sm" name="direccion_inspeccion" id="direccion_inspeccion">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-md-12 form-group row fix-size-for-input" style="margin-top: 5px !important">
                                                            <label  class="col-md-2 form-label">Referencia de Dirección </label>
                                                            <div class="col-md-2 fix-size-for-input">
                                                                <input type="text" class="form-control  input-sm" name="direccion_referencia" id="direccion_referencia">
                                                            </div>
                                                            <label  class="col-md-2 form-label">Persona de Contacto</label>
                                                            
                                                            <div class="col-md-2 fix-size-for-input" id="contact_inspeccion_block">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control input-sm" name="contact_inspeccion_name" id="contact_inspeccion_name" value="{{ old('contact_inspeccion_name') }}" disabled="disabled">
                                                                    <input type="hidden" name="contact_inspeccion_id" id="contact_inspeccion_id" value="{{ old('contact_inspeccion_id') }}">
                                                                    <span class="input-group-btn">
                                                                        <button id="searchPerson" data-id="8" type="button" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span>
                                                    <button id="boton_SinIns" type="button" class="btn btn-default btn-sm"  data-toggle="tooltip" title="Significa que no se a conseguido la informacion necesaria para coordinar con el asegurado"><input type="checkbox" id="checkBox_EnEsp"> En Espera </button>
                                                    <button id="boton_SinIns" type="button" class="btn btn-default btn-sm"  data-toggle="tooltip" title="Significa que el reclamo no amerita una inspeccion en el sitio"><input type="checkbox" id="checkBox_SinIns"> Sin inspeccion</button>
                                                </span>
                                            </section>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                    

                    
                </div>
                
            <!-- Footer -->
            <footer class="footer container-fluid pl-30 pr-30">
                <div class="row">
                    <div class="col-sm-12">
                        <p>2017 &copy; Philbert. Pampered by Hencework</p>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->
                
            </div>
            <!-- /Main Content -->
        </div>
        <!-- /#wrapper -->
        
        <!-- JavaScript -->
        
        <!-- jQuery -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>     
        <!-- Form Wizard JavaScript -->
        <script src="vendors/bower_components/jquery.steps/build/jquery.steps.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
        <!-- Form Wizard Data JavaScript -->
        <script src="dist/js/form-wizard-data.js"></script>
        <!-- Data table JavaScript -->
        <script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap Touchspin JavaScript -->
        <script src="vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
        <!-- Starrr JavaScript -->
        <script src="dist/js/starrr.js"></script>
        <!-- Slimscroll JavaScript -->
        <script src="dist/js/jquery.slimscroll.js"></script>
        <!-- Fancy Dropdown JS -->
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>
        <!-- Owl JavaScript -->
        <script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
        <!-- Switchery JavaScript -->
        <script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
        <!-- Init JavaScript -->
        <script src="dist/js/init.js"></script>
            
    </body>
</html>