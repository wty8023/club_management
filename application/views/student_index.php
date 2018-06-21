
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>社团管理</title>
    <base href="<?php echo site_url();?>">
    <script src="assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<body data-type="index">
<script src="assets/js/theme.js"></script>
<div class="am-g tpl-g">
    <div class="am-g tpl-g">
        <!-- 头部 -->
        <header>
            <!-- logo -->
            <div class="am-fl tpl-header-logo">
                <a href="javascript:;">社团联合会管理系统</a>
            </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">

                <!-- 其它功能-->
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">
                            <?php if(isset($user)){?>
                                您好，
                                <a href="">欢迎你, <span> <?php echo $this->session->userdata('user_name');?></span> </a>
                                <a href="welcome/logout" class="link-gray">退出</a>
                            <?php }else {?>
                                <a href="welcome/admin_login" class="link-gray">[ 管理员登录 ]</a>
                                ，
                                <a href="welcome/login" class="link-gray">[ 登录 ]</a>

                                ，<a href="user/reg" class="link-gray">[ 注册有惊喜 ]</a>
                            <?php }?>
                        </li>


                        <!-- 退出 -->
                        <li class="am-text-sm">
                            <a href="user/logout">
                                <span class="am-icon-sign-out"></span> 退出
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </header>
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>
        <!-- 侧边导航栏 -->
        <div class="left-sidebar">
            <!-- 用户信息 -->
            <div class="tpl-sidebar-user-panel">
                <div class="tpl-user-panel-slide-toggleable">
                    <div class="tpl-user-panel-profile-picture">
                        <img src="assets/img/user04.png" alt="">
                    </div>
                    <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
                    www          </span>
                    <a href="user/change" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
                </div>
            </div>

            <!-- 菜单 -->
            <ul class="sidebar-nav">
                <li class="sidebar-nav-link">
                    <a href="Welcome/std_index" class="active">
                        <i class="am-icon-home sidebar-nav-link-logo"></i>社团首页
                    </a>
                </li>
                <?php if(isset($user)){?>
                <li class="sidebar-nav-link">
                    <a href="Welcome/reg">
                        <i class="am-icon-clone sidebar-nav-link-logo"></i> 注册
                        <!--                    <span class="am-badge am-badge-secondary sidebar-nav-link-logo-ico am-round am-fr am-margin-right-sm">6</span>-->
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="Welcome/login">
                        <i class="am-icon-key sidebar-nav-link-logo"></i> 登录
                    </a>
                </li>
                <?php }else {?>
                <li class="sidebar-nav-link">
                    <a href="user/change">
                        <span class="am-icon-pencil"> <?php echo $this->session->userdata('user_name');?></span>
                    </a>
                </li>

                <?php }?>


            </ul>
        </div>
    </div>
</div>
</div>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/amazeui.datatables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/app.js"></script>

</body>

</html>

<!-- 内容区域 -->
<div class="tpl-content-wrapper">

    <div class="container-fluid am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 首页</div>
                <p class="page-header-description">黑龙江大学社团联合会授权制作。</p>
            </div>
        </div>

    </div>

    <div class="row-content am-cf">
        <div class="row  am-cf">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">社团公告</div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog"></a>
                        </div>
                    </div>
                    <div class="widget-body am-fr">
                        <div class="am-fl">
                            <div class="widget-fluctuation-period-text" id="notice">


                        </div>

                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
</div>

</body>

</html>