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
    <?php include('header.php');?>


    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            待审核社团列表
                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                    <tr>
                                        <th>社团编号</th>
                                        <th>社团名称</th>
                                        <th>社团简介</th>
                                        <th>社团主席</th>
                                        <th>主席学号</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($clubs as $row){?>
                                        <tr class="gradeX">
                                            <td><?php echo $row->club_id;?></td>
                                            <input type="hidden" id="club-id" value="<?php echo $row->club_id?>">
                                            <td><?php echo $row->club_name;?></td>
                                            <td><?php echo $row->club_intro;?></td>
                                            <td><?php echo $row->user_name;?></td>
                                            <td><?php echo $row->user_num;?></td>
                                                <td><div class="tpl-table-black-operation">
                                                        <a href="javascript:;" class="tpl-table-black-operation-del pass">
                                                            <i class="am-icon-trash"></i> <span>通过</span>
                                                        </a>
                                                        <a href="javascript:;" class="tpl-table-black-operation-del refuse">
                                                            <i class="am-icon-trash"></i> <span>回绝</span>
                                                        </a>
                                                    </div></td>
                                        </tr>
                                    <?php }?>
                                    <!-- more data -->
                                    </tbody>
                                </table>
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

</body>
<script>
    $(".pass").click(function() {
        var clubId = $(this).parents('tr').find('input').val();
        console.log(clubId);
        var that = this;
        $.get('admin/pass_club', {
            club_id: clubId
        }, function (data) {
            if (data == 'success') {

                alert('审核通过！');
                $(that).find('span').html('审核成功');
                $('.refuse').remove();
            }else {
                alert('审核失败')
            }
        }, 'text');

    });
    $(".refuse").click(function() {
        var clubId = $(this).parents('tr').find('input').val();
        console.log(clubId);
        var that = this;
        $.get('admin/refuse_club', {
            club_id: clubId
        }, function (data) {
            if (data == 'success') {

                alert('回绝成功！');
                $(that).find('span').html('已回绝');
            }else {
                alert('回绝失败')
            }
        }, 'text');

    });


</script>

</html>
