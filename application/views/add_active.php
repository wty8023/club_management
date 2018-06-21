<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>申请</title>
    <base href="<?php echo site_url();?>">
    <script src="assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/money_apply.css">
</head>

<body data-type="widgets">
<script src="assets/js/theme.js"></script>
<div class="am-g tpl-g">
    <?php include('header.php');?>
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row">

            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">创建活动</div>
                    </div>
                    <div class="widget-body am-fr">
                        <div class="am-form tpl-form-border-form tpl-form-border-br" action="" method="post">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">活动名称：</label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="title" placeholder="活动名称">

                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-u-sm-3 am-form-label">报名截止时间：</label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="am-form-field tpl-form-no-bg" id="time" placeholder="截止时间" data-am-datepicker="" readonly="">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">活动地点：</label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="room" placeholder="活动地点">

                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-intro" class="am-u-sm-3 am-form-label">注意事项：</label>
                                <div class="am-u-sm-9">
                                    <textarea class="" rows="10" name="details" id="note" placeholder="注意事项"></textarea>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button  id="sub" type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">创建活动</button>
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
    $('#sub').on('click',function () {
        var title = $('#title').val();
        var time = $('#time').val();
        var room = $('#room').val();
        var note = $('#note').val();
        $.get('user/add_active', {
            'title': title,
            'time': time,
            'room': room,
            'note': note
        },function (data) {
            if(data == 'success'){
                alert('创建活动成功,等待管理员审核后将公布到活动页！');
                location.href= 'welcome/index';
            }else{
                alert('创建活动失败');
            }
        },'text');
    });




</script>

</html>