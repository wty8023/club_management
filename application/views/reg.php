<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>注册</title>
    <base href="<?php echo site_url();?>">
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<body data-type="login">
<script src="assets/js/theme.js"></script>
<div class="am-g tpl-g">
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
    <div class="tpl-login">
        <div class="tpl-login-content">
            <div class="tpl-login-title">注册用户</div>
            <span class="tpl-login-content-info">
                  创建一个新的用户
              </span>


            <form class="am-form tpl-form-line-form" action="" method="" onsubmit="return false;">
                <ul>
                    <li id="error_msg" class="clearfix log-number" style="text-align: center; color: red; display: block; font-size: 16px">
                    </li>
                </ul>
                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" name="num" id="user-num" placeholder="学号">

                </div>

                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" name="name" id="user-name" placeholder="学生姓名">
                </div>

                <div class="am-form-group">
                    <input type="text" class="tpl-form-input" name="name" id="user-tel" placeholder="联系方式">
                </div>

                <div class="am-form-group">性别：
                    <select name="" id="user-sex">
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" name="pass1" id="pwd1" placeholder="请输入密码">
                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" name="pass2" id="pwd2" placeholder="再次输入密码">
                </div>

                <div class="am-form-group tpl-login-remember-me">
                    <input id="remember-me" type="checkbox">
                    <label for="remember-me">

                        我已阅读并同意 <a href="javascript:;">《学生社团管理守则》</a>
                    </label>

                </div>

                <div class="am-form-group">

                    <a href="javascript:" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</a>

                </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script>

    $('.am-btn').on('click',function () {

        var tel = $('#user-tel').val();
        var num = $('#user-num').val();
        var name = $('#user-name').val();
        var sex = $('#user-sex').val();
        var pwd1 = $('#pwd1').val();
        var pwd2 = $('#pwd2').val();
        var rememberMe = $('#remember-me').prop('checked');
        //手机号正则
        var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
        //电话
        var phone = $.trim(tel);
        console.log(phone);
        if (!phoneReg.test(phone)){
            alert('请输入有效的手机号码！');
            $('#user-tel').val(null);
            $('#user-name').val(null);
            $('#pwd1').val(null);
            $('#pwd2').val(null);
            $('#user-num').val(null);
        }else if(!rememberMe){
            alert('请勾选已阅读《学生社团管理守则》！');
        }else{
            console.log(1111);
            $.get('user/add_user', {
                'tel': tel,
                'num': num,
                'pwd1': pwd1,
                'pwd2': pwd2,
                'name': name,
                'sex': sex
            }, function (data) {
                if (data == 'pwd-error') {
                    $('#error_msg').html("两次密码不一致").show("fast");
                }else if(data == 'num is exist'){
                    alert('学号已存在，请直接登陆，或联系管理员修改密码！');
                }else {
                    alert('注册成功,跳转到登录界面....');
                    location.href = 'welcome/login';
                }
            }, 'text');
        }
    })




</script>
</body>

</html>