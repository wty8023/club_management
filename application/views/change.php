<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <base href="<?php echo site_url();?>">
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <script src="assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/change.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<body data-type="widgets">
<script src="assets/js/theme.js"></script>
<div class="am-g tpl-g">
    <?php include('header.php');?>
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">账号设置</div>


                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                <div class="am-form-group tpl-table-list-select">
                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">

                                </div>
                            </div>

                            <div class="am-u-sm-12">
                                <form action="user/do_change" class="change_info" method="post" onsubmit="return check();">
                                    账号:<input type="text" name="" disabled="disabled" value="<?php echo $result->user_num;?>"><br><br>
                                    名称:<input type="text" name="" disabled="disabled" value="<?php echo $result->user_name;?>"><br><br>
                                    <?php if($user->club_id != 0){?>
                                    社团:<input type="text" name="" disabled="disabled" value="<?php echo $result->club_name;?>"><br><br>
                                    <?php }?>
                                    密码:<input type="text" name="user_pass" value="<?php echo $result->user_pass;?>"><br><br>
                                    性别:
                                    <select name="user_sex" id=""value=""style="width: 200px">
                                        <option value="男">男</option>
                                        <?php if($result->user_sex == '女'){?>
                                        <option value="女" selected="selected">女</option>
                                        <?php }else{?>
                                            <option value="女">女</option>
                                        <?php }?>
                                    </select><br><br>
                                    年龄:<input type="text" name="user_age" value="<?php echo $result->user_age;?>"><br><br>
                                    电话:<input type="text" name="user_tel" id="tel" value="<?php echo $result->user_tel;?>"><br><br>
                                    <input type="submit" value="修改" class="sb">

                                </form>
                            </div>
                            <div class="am-u-lg-12 am-cf">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>
<script>
    function check(){
        var tel = $('#tel').val();
        //手机号正则
        var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
        //电话
        var phone = $.trim(tel);
        console.log(phone);
        if (!phoneReg.test(phone)) {
            alert('请输入有效的手机号码！');
            return false;
        }else{
            return true;
        }
    }



</script>

</html>