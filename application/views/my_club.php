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

        <div class="container-fluid am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                    <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 我的社团</div>

                </div>
            </div>

        </div>

        <div class="row-content am-cf">
            <div class="row  am-cf">

<!--                <div class="am-u-sm-12 am-u-md-12 am-u-lg-6">-->
<!--                    <div class="widget am-cf">-->
<!--                        --><?php //foreach ($member as $link){?>
<!--                        <span>活动时间: --><?php //echo $link->user_name?><!--</span>-->
<!--                        --><?php //}?>
<!--                    </div>-->
<!--                </div>-->
                <h3 class="page-header-description">社团成员</h3>
                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                    <thead>
                    <tr>
                        <th>成员学号</th>
                        <th>姓名</th>
                        <th>社团职务</th>
                        <th>联系方式</th>
                        <?php
                        if($user->flag == 2){
                            echo '<th>操作</th>';
                        }
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($member as $row){
                        if($row->flag != 0){?>
                        <tr class="gradeX">
                            <td><?php echo $row->user_num;?></td>
                            <td><?php echo $row->user_name;?></td>
                            <td><?php if ($row->flag == 2){echo '会长';}else{echo '会员';}?></td>
                            <td><?php echo $row->user_tel;?></td>
                            <?php
                            if($user->flag == 2){?>
                                <td><?php if ($row->user_id != $user->user_id){?>
                                    <div class="tpl-table-black-operation">
                                                    <a href="user/del_st?user_id='<?php echo $row->user_id?>'" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-trash"></i> 移除
                                                    </a>
                                                </div>
                                <?php }?></td>
                            <?php }?>
                        </tr>
                    <?php }}?>
                    <!-- more data -->
                    </tbody>
                </table>
                <br>
                <?php
                if($user->flag == 2){?>
                <h3 class="page-header-description">待审核成员</h3><table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                    <thead>
                    <tr>
                        <th>成员学号</th>
                        <th>姓名</th>
                        <th>联系方式</th>
                        <th>操作</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($member as $row){
                        if ($row->flag == 0){?>
                        <tr class="gradeX">
                            <td><?php echo $row->user_num;?></td>
                            <td><?php echo $row->user_name;?></td>
                            <td><?php echo $row->user_tel;?></td>
                                <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="user/pass_st?user_id='<?php echo $row->user_id?>'" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 审核通过
                                            </a>
                                            <a href="user/refuse_st?user_id='<?php echo $row->user_id?>'" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 拒绝申请
                                            </a>
                                        </div>
                                    </td>;
                            <?php }}?>
                        </tr>
                    <?php }?>
                    <!-- more data -->
                    </tbody>
                </table>
                <br><br>
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title am-fl">社团名称：<?php echo $club[0]->club_name?></div>
                            <div class="widget-function am-fr">
                                <a href="javascript:;" class="am-icon-cog"></a>
                            </div>
                        </div>
                        <div class="widget-body am-fr">
                            <div class="am-fl">
                                <div class="widget-fluctuation-period-text" id="notice">
                                    <?php echo $club[0]->club_intro;?>
                                    </br></br>

                                    <span>创建时间: <?php echo $club[0]->time?></span>
                                    </br></br>
                                    <?php foreach ($club as $row){
                                        if ($row->flag == 2){?>
                                            <span>创建人:<?php echo $row->user_name?></span>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($active as $val){?>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-6">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">活动名称：<?php echo $val->active_name?></div>
                                <div class="widget-function am-fr">
                                    活动内容：<?php echo $val->active_note?>
                                </div>
                            </div>
                            <div class="widget-body am-fr">
                                <div class="am-fl">
                                    <div class="widget-fluctuation-period-text" id="notice">活动地点:
                                        <?php echo $val->active_room;?>
                                        </br></br>

                                        <span>活动时间: <?php echo $val->active_date?></span>&nbsp;&nbsp;&nbsp;
                                        <span>报名截止时间: <?php echo $val->died_date?></span>
                                        </br></br>
                                        <span>创建人:<?php echo $val->user_name?></span>
                                        <span style="float: right">活动状态：<?php if ($val->active_status == 0){
                                                echo '审核中';
                                            }elseif($val->active_status == 1){
                                                echo "已通过审核";
                                            }?>
                                        </span>
                                    </div>
                                </div>
                                <?php if($val->active_status == 1 && $user->flag == 2){?>
                                <span style='padding-left: 100px'><a href="active/active_detail?active_id=<?php echo $val->active_id;?>">活动详情</a></span>
                                <?php }elseif($val->active_status == 1){?>
                                    <a href="javascript:;" id="join" val="<?php echo $val->active_id;?>" class="tpl-table-black-operation-del">
                                        报名
                                    </a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<script>
    $("#join").click(function() {
        var activeId = $(this).attr('val');
//        console.log(cId);
        $.get('active/join', {
            active_id: activeId
        }, function (data) {
            if (data == 'success') {
                alert("报名成功！");

            }else if(data == 'exist'){
                alert('您已报名！');
            }else{
                alert("报名失败！");
            }
        }, 'text');
    });


</script>
</body>

</html>