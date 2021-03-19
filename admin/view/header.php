<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/admin/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap Select Css -->  
    <link href="/admin/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/admin/assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/admin/assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="/admin/assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/admin/assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/admin/assets/css/themes/all-themes.css" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="/admin/assets/plugins/jquery/jquery.min.js"></script>

</head>

<body class="theme-orange">

    <div class="page-loader-wrapper" id="loading-page">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Vui lòng chờ...</p>
        </div>
    </div>



    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <?php if($_SERVER['REQUEST_URI'] == '/admin/') { ?>
                <a href="javascript:void(reload_analytic());" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapses" aria-expanded="false"></a>
                <?php } ?>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/admin">ADMIN PANEL</a>
            </div>
                <?php if($_SERVER['REQUEST_URI'] == '/admin/') { ?>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(reload_analytic());" class="js-right-sidebar" data-close="true"><i class="material-icons">refresh</i></a></li>
                </ul>
            </div>
                <?php } ?>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="/admin/assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user['name'];?></div>
                    <div class="email"><?php echo $user['email'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="/signout.html"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN MENU</li>
                    <li class="active">
                        <a href="/admin">
                            <i class="material-icons">home</i>
                            <span>Trang Chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/?modun=vongquay_kimcuong&act=index">
                            <i class="material-icons">layers</i>
                            <span>Vòng Quay FreeFire</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">pie_chart</i>
                            <span>Dịch Vụ FreeFire</span>
                        </a>
                        <ul class="ml-menu" style="display: none;">
                            <li>
                                <a href="/admin/?modun=sieucap&act=index">
                                    <i class="material-icons">layers</i>
                                    <span>Vòng Quay Giải Cứu Thế Giới</span>
                                </a>
                            </li>     
                            <li>
                                <a href="/admin/?modun=homthinhbian&act=index">
                                    <i class="material-icons">layers</i>
                                    <span>Hòm Thính Bí Ẩn</span>
                                </a>
                            </li>                    
                            <li>
                            <li>
                                <a href="/admin/?modun=bingo&act=index">
                                    <i class="material-icons">layers</i>
                                    <span>Vận May Bingo</span>
                                </a>
                            </li>  
                            <li>
                                <a href="/admin/?modun=latthe&act=index">
                                    <i class="material-icons">layers</i>
                                    <span>Lật Hình May Mắn</span>
                                </a>
                            </li>    
                            <li>
                                <a href="/admin/?modun=accff&act=index">
                                    <i class="material-icons">layers</i>
                                    <span>Bán Nick Freefire</span>
                                </a>
                            </li>


                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <i class="material-icons">layers</i>
                                    <span>Vòng Quay Code Súng</span>
                                </a>
                                <ul class="ml-menu" style="display: none;">
                                    <li>
                                        <a href="/admin/?modun=vongquaycodesung&act=index">
                                            <i class="material-icons">layers</i>
                                            <span>Cài Đặt Tỉ Lệ</span>
                                        </a>
                                    </li>     
                                    <li>
                                        <a href="/admin/?modun=vongquaycodesung&act=update_code">
                                            <i class="material-icons">layers</i>
                                            <span>Danh Sách Code</span>
                                        </a>
                                    </li>                    
                                    <li> 
                                </ul>
                            </li>


                        </ul>
                    </li>

  

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">pie_chart</i>
                            <span>Random FreeFire</span>
                        </a>
                        <ul class="ml-menu" style="display: none;">
                            <li>
                                <a href="/admin/?modun=random_freefire&act=add_nick">
                                    <i class="material-icons">layers</i>
                                    <span>Đăng Bán Random</span>
                                </a>
                            </li>     
                            <li>
                                <a href="/admin/?modun=random_freefire&act=index">
                                    <i class="material-icons">layers</i>
                                    <span>Danh Sách Gói Random</span>
                                </a>
                            </li>                    
                            <li> 
                        </ul>
                    </li>






                    <li>
                        <?php if(mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `status`='2'")) > 0) $new = '<span class="btn btn-danger btn-xs">'.mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `status`='2'")).'</span>'; ?>
                        <a href="/admin/?modun=rut_kim_cuong&act=index">
                            <i class="material-icons">layers</i>
                            <span>Duyệt Kim Cương<?=$new;?></span>
                        </a>
                    </li>
                    <li>
                        <?php if(mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `status`='2'")) > 0) $new = '<span class="btn btn-danger btn-xs">'.mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `status`='2'")).'</span>'; ?>
                        <a href="/admin/thenap">
                            <i class="material-icons">layers</i>
                            <span>Danh Sách Thẻ Nạp<?=$new;?></span>
                        </a>
                    </li>                
                    <li>
                        <a href="/admin/users">
                            <i class="material-icons">layers</i>
                            <span>Thành Viên</span>
                        </a>
                    </li>         
 
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">settings</i>
                            <span>Cài Đặt</span>
                        </a>
                        <ul class="ml-menu" style="display: none;">
                            <li>
                                <a href="/admin/?modun=web_setting&act=chung" class=" waves-effect waves-block">Cài Đặt Chung</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                    <span>Cài Đặt Hiển Thị</span>
                                </a>
                                <ul class="ml-menu" style="display: none;">
                                    <li>
                                        <a href="/admin/?modun=web_setting&act=danh_muc" class=" waves-effect waves-block">
                                            <span>Hiển Thị Danh Mục</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/?modun=web_setting&act=game_status" class=" waves-effect waves-block">
                                            <span>Hiển Thị Game</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/admin/?modun=web_setting&act=game_images" class=" waves-effect waves-block">Cài Đặt Ảnh Game</a>
                            </li>

                        </ul>
                    </li>


                </ul>
            </div>
            <!-- #Menu -->



            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 - 2020 <a href="javascript:void(0);">Admin Panel - Kunkeypr</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->


    </section>




        <section class="content">
        <div class="container-fluid">

            <!-- Body Copy -->
