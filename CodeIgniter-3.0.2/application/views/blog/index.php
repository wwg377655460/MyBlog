<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
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
            <li class="active"><a href="index">主页</a></li>
            <li><a href="lists">博客列表</a></li>
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
            <?php if(isset($_SESSION['username'])){?>
            <li><a href="#">欢迎,<?php echo $this->session->userdata('username')?></a></li>
            <?php }?>
        </ul>
    </div>
</nav>
<?php if(isset($_SESSION['msg'])){?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <p align="center"><?php echo $_SESSION['msg']?></p>
    </div>
<?php }?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
            </p>
            <div class="jumbotron">
                <h1>Hello, world!</h1>
                <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
            </div>
            <div class="row">
                <?php include_once('string.php') ?>
            <?php foreach ($blogs as $blogs_item):?>
                <div class="col-xs-6 col-lg-4">
                    <h2><?php echo $blogs_item['name']?></h2>
                    <p><?php echo cut_str($blogs_item['desctext'],9)?></p>
                    <p><a class="btn btn-secondary" href="contents/<?php echo $blogs_item['id']; ?>" role="button">View details &raquo;</a></p>
                </div><!--/span-->
            <?php endforeach;?>

            </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="lists" class="list-group-item active">最新博客</a>
                <?php foreach ($blogs_new as $blogs_new_item):?>
                <a href="contents/<?php echo $blogs_new_item['id']; ?>" class="list-group-item"><?php echo cut_str($blogs_new_item['name'],12)?></a>
                <?php endforeach;?>
            </div>
        </div><!--/span-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; Company 2014</p>
    </footer>

</div><!--/.container-->


</body>
</html>