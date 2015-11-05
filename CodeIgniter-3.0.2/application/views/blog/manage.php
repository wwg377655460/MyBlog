<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/css/style.css" rel="stylesheet">
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
            <li><a href="index">主页</a></li>
            <li><a href="lists">博客列表</a></li>
            <li class="dropdown active">
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
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">
    <?php foreach($blogs as $blogs_item):?>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge"><a href="delete/<?php echo $blogs_item['id'] ?>">删除</a></span>
            <?php echo $blogs_item['name'] ?>
        </li>

    </ul>
    <?php endforeach;?>

    <div class="page" align="center">
        <div id="pagelist" align="center">
    <span><?php echo $page_links; ?>
    </span>
        </div>
    </div>


    <hr>

    <footer>
        <p>&copy; Company 2014</p>
    </footer>

</div><!--/.container-->


</body>
</html>