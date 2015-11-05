<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>My Blog</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>

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
            <li><a href="<?php echo base_url() ?>index.php/blog/index">主页</a></li>
            <li class="active"><a href="lists">博客列表</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    关于 <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url() ?>index.php/blog/login">登录</a></li>
                    <li><a href="#">注册</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/blog/logout">注销</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url() ?>index.php/blog/manage">管理文章</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/blog/toupload">添加文章</a></li>
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
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <div id='content' class='row-fluid'>
                <div class='span9 main'>
                    <h2><?php echo $blog['name'] ?></h2>
                </div>
                <div class='span3 sidebar'>
                    <h5>&nbsp;&nbsp;&nbsp;<i>描述:<?php echo $blog['desctext'] ?></i></h5>
                    <p><?php echo $blog['contents'] ?></p>
                </div>
            </div>
        </div>




        <?php include_once('string.php') ?>

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="lists" class="list-group-item active">最新博客</a>
                <?php foreach($blogs_new as $blogs_new_item):?>
                <a href="contents/<?php echo $blogs_new_item['id']; ?>" class="list-group-item"><?php echo cut_str($blogs_new_item['name'], 12)?></a>
                <?php endforeach;?>

            </div>
        </div>


    </div>

    <div class="list-group">
        <a href="<?php echo base_url() ?>index.php/comment/toComment/<?php echo $blog['id']?>" class="list-group-item active">
            <h4 class="list-group-item-heading">
                评论
            </h4>
        </a>
        <?php include_once('time.php') ?>
        <?php foreach($comments as $comment):?>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">
                <?php echo time_tran($comment['date'])?>
            </h4>
            <p class="list-group-item-text">
                <?php echo $comment['contents']?>
            </p>
        </a>
        <?php endforeach;?>

    </div>
    <!--/span-->
</div>



<!--/row-->


<hr>

<footer>
    <p>&copy; Company 2014</p>
</footer>

</div><!--/.container-->


</body>
</html>










