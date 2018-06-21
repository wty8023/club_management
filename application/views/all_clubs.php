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
                            <div class="widget-title  am-cf">社团列表</div>
                            <?php if($user->flag != 1){?>
                                <p style="color: red">注意每人只能申请一个社团！</p>
                                <p style="color: red">多次申请将只保留最后一次申请！</p>
                            <?php }?>

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
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                    <tr>
                                        <th>社团编号</th>
                                        <th>社团名称</th>
                                        <th>社团简介</th>
                                        <th>社团主席</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<!--                                    --><?php //var_dump($result);die();?>
                                    <?php foreach($result as $row){?>
                                        <tr class="gradeX">
                                            <td><?php echo $row->club_id;?></td>
                                            <input type="hidden" id="club-id" value="<?php echo $row->club_id?>">
                                            <td><?php echo $row->club_name;?></td>
                                            <td><?php echo $row->club_intro;?></td>
                                            <td><?php echo $row->user_name;?></td>
                                            <?php if($user->flag != 1){?>
                                            <td><div class="tpl-table-black-operation">
                                                    <a href="javascript:;" class="tpl-table-black-operation-del join">
                                                        <i class="am-icon-trash"></i> <span>加入</span>
                                                    </a>
                                                </div></td>
                                            <?php }else{?>
                                                <td><div class="tpl-table-black-operation">
                                                        <a href="admin/club_detail?club_id=<?php echo $row->club_id?>" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-trash"></i> 查看
                                                        </a>
                                                        <a href="admin/del_club?club_id=<?php echo $row->club_id?>" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-trash"></i> 解散
                                                        </a>
                                                    </div></td>
                                            <?php }?>
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
    var clubId = $("#club-id").val();
    $(".join").click(function() {
        var clubId = $(this).parents('tr').find('input').val();
        console.log(clubId);
        var that = this;
        $.get('user/join_in', {
            club_id: clubId
        }, function (data) {
            if (data == 'success') {

                alert('申请成功,等待社团主席审核！');
                $(that).find('span').html('待审核');
            }else {
                alert('删除失败')
            }
        }, 'text');

    });


</script>

</html>
