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
            <li><a href="<?php echo base_url() ?>index.php/blog/index">主页</a></li>
            <li><a href="<?php echo base_url() ?>index.php/blog/lists">博客列表</a></li>
            <li class="dropdown active">
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

<form action="<?php echo base_url() ?>index.php/comment/set_comments" class="form-horizontal" method="post" role="form">

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">评论</label>
        <input type="text" hidden="hidden" name="blog_id" value="<?php echo $blog_id?>">
        <div class="col-sm-10">
            <textarea style="width: 50%;" name="contents" class="form-control"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">登录</button>
        </div>
    </div>
</form>

</body>
</html>