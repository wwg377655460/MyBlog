<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/css/style.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <style>

    </style>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">My Blog</a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="index">主页</a></li>
            <li class="active"><a href="lists">博客列表</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    关于 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="login">登录</a></li>
                    <li><a href="#">注册</a></li>
                    <li><a href="logout">注销</a></li>
                    <li class="divider"></li>
                    <li><a href="manage">管理文章</a></li>
                    <li><a href="toupload">添加文章</a></li>
                    <li class="divider"></li>
                    <li><a href="#">关于</a></li>
                </ul>
            </li>
            <?php if (isset($_SESSION['username'])) { ?>
                <li><a href="#">欢迎,<?php echo $this->session->userdata('username') ?></a></li>
            <?php } ?>
        </ul>
    </div>
</nav>

<!--/stories-->
<?php include_once('time.php') ?>
<?php foreach ($blogs as $blogs_item): ?>
    <div class="row">
        <br>

        <div class="col-md-2 col-sm-3 text-center">
            <a class="story-img" href="#"><img src="<?php echo $blogs_item['imgurl']; ?>"
                                               style="width:100px;height:100px" class="img-circle"></a>
        </div>
        <div class="col-md-10 col-sm-9">
            <h3><?php echo $blogs_item['name']; ?></h3>

            <div class="row">
                <div class="col-xs-9">
                    <p><?php echo $blogs_item['desctext']; ?></p>

                    <p class="lead"><a href="contents/<?php echo $blogs_item['id']; ?>">
                            <button class="btn btn-default">Read More</button>
                        </a></p>
                    <p style="width: 200px;" class="pull-right">
                        <?php
                        if ($blogs_item["group_concat(blogs_tag_table.tag_id)"] != NULL) {
//                            echo $blogs_item["group_concat(blogs_tag_table.tag_id)"];
                            $arr = explode(",", $blogs_item["group_concat(blogs_tag_table.tag_id)"]);
                            foreach ($arr as $tag) {
                                ?>
                                <span class="label label-default">
                                    <?php echo $tags[intval($tag)-1]['name']?>
                                </span>

                                <?php
                            }
                        } ?>
                    </p>
                    <ul class="list-inline">
                        <li><a href="#"><?php echo time_tran($blogs_item['date']); ?></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-comment"></i> 4 Comments</a></li>
                        <li><a href="tozan/<?php echo $blogs_item['id']; ?>"><i
                                    class="glyphicon glyphicon-share"></i> <?php echo $blogs_item['zan']; ?> 赞</a></li>
                    </ul>
                </div>
                <div class="col-xs-3"></div>
            </div>
            <br><br>
        </div>
    </div>
<?php endforeach; ?>


</div><!--/.container-->


<div class="page" align="center">
    <div id="pagelist" align="center">
    <span><?php echo $page_links; ?>
    </span>
    </div>
</div>

<hr/>

</body>
</html>