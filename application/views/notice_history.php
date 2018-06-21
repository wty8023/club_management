<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <base href="<?php echo site_url();?>">
    <script src="assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
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
                            <div class="widget-title  am-cf">公告列表</div>
                        </div>
                        <div class="widget-body  am-fr">
                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                    <tr>
                                        <th>公告标题</th>
                                        <th>内容</th>
                                        <th>发布时间</th>
                                        <th>社团名称</th>
                                        <?php if($user->flag == 1){
                                                echo '<th>操作</th>';
                                            }
                                        ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($result as $row){?>
                                        <tr class="gradeX">
                                            <td><?php echo $row->notice_title;?></td>
                                            <td><?php echo $row->notice_con;?></td>
                                            <td><?php echo $row->notice_time;?></td>
                                            <td><?php echo $row->club_name;?></td>
                                            <?php
                                                if($user->flag == 1){
                                                    echo '<td><div class="tpl-table-black-operation">
                                                    <a href="notice/del_id?notice_id='.$row->notice_id.'" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </a>
                                                </div></td>';
                                                }?>
                                        </tr>
                                    <?php }?>
                                    <!-- more data -->
                                    </tbody>
                                </table>
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

</html>