<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>社团管理</title>
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <?php $user = $this->session->userdata('user'); ?>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<body data-type="index">
<script src="assets/js/theme.js"></script>
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
                    <?php if(isset($user)){?>
                        您好，
                    <li class="am-text-sm tpl-header-navbar-welcome">
                        <a href="">欢迎你, <span> <?php echo $user->user_name;?></span> </a>
                        <a href="user/logout" class="link-gray">退出</a>

                    </li>
                    <?php }
                    else {?>
                    <li class="am-text-sm">
                        <a href="welcome/admin_login">[ 管理员登录 ]</a>
                        ，
                        <a href="welcome/login">[ 学生登录 ]</a>

                        ，<a href="welcome/reg">[ 注册有惊喜 ]</a>
                    </li>
                    <?php }?>

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
                    <?php if(isset($user)) {
                        echo $user->user_name;?>
                        </span>
                <a href="user/change" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
                <ul class="sidebar-nav">
                    <li class="sidebar-nav-link">
                        <a href="Welcome/index" class="active">
                            <i class="am-icon-home sidebar-nav-link-logo"></i>社团首页
                        </a>
                    </li>


                    <li class="sidebar-nav-link">
                        <a href="notice/notice_history">
                            <i class="am-icon-wpforms sidebar-nav-link-logo"></i>公告历史
                        </a>
                    </li>
                    <?php if($user->flag == 0|| $user->flag == 1){?>
                    <li class="sidebar-nav-link">
                        <a href="user/all_club">
                            <i class="am-icon-wpforms sidebar-nav-link-logo"></i>社团列表
                        </a>
                    </li>
                    <?php }?>
                    <?php if(isset($user->club_id)&&$user->club_id!=0){?>
                        <li class="sidebar-nav-link">
                            <a href="user/my_club?club_id=<?php echo $user->club_id?>">
                                <i class="am-icon-wpforms sidebar-nav-link-logo"></i>我的社团
                            </a>
                        </li>
                    <?php }else{?>
                        <li class="sidebar-nav-link">
                            <a href="welcome/add_club">
                                <i class="am-icon-wpforms sidebar-nav-link-logo"></i>创建社团
                            </a>
                        </li>
                    <?php }?>

                    <li class="sidebar-nav-link">
                        <a href="javascript:;" class="sidebar-nav-sub-title">
                            <i class="am-icon-table sidebar-nav-link-logo"></i>
                            消息操作
                            <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                        </a>
                        <ul class="sidebar-nav sidebar-nav-sub">
                            <li class="sidebar-nav-link">
                                <a href="message/message_history">
                                    <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 消息列表
                                </a>
                            </li>

                            <li class="sidebar-nav-link">
                                <a href="Welcome/post_message">
                                    <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 发送消息
                                </a>
                            </li>
                            <?php if($user->flag == 2){?>
                                <li class="sidebar-nav-link">
                                    <a href="welcome/add_notice">
                                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 发送新公告
                                    </a>
                                </li>

                                <li class="sidebar-nav-link">
                                    <a href="welcome/add_active">
                                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 创建活动
                                    </a>
                                </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li class="sidebar-nav-link">
                    <?php if($user->flag == 1){?>
                            <a href="javascript:;" class="sidebar-nav-sub-title">
                                <i class="am-icon-table sidebar-nav-link-logo"></i>
                                审核
                                <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                            </a>
                            <ul class="sidebar-nav sidebar-nav-sub">
                                <li class="sidebar-nav-link">
                                    <a href="welcome/check_club">
                                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 社团审核
                                    </a>
                                </li>

                                <li class="sidebar-nav-link">
                                    <a href="welcome/check_active">
                                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 活动审核
                                    </a>
                                </li>
                                <li class="sidebar-nav-link">
                                    <a href="welcome/check_notice">
                                        <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 公告审核
                                    </a>
                                </li>
                            </ul>
                        <?php }?>
                    </li>


                    <?php
                    $user_flag = $this->session->userdata('user_flag');
                    if($user_flag==5){

                    }
                    ?>
                    <?php }else{
                        echo '<a href="welcome/login">游客您好请点此登录</a>';
                    }?>

            </div>
        </div>

        <!-- 菜单 -->

    </div>
</div>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/amazeui.datatables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/app.js"></script>
