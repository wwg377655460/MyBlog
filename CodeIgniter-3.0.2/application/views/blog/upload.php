<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url()?>/ckeditor/ckeditor.js"></script>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <style type="text/css">
        .form-group {
            width: 100%; /*自动适应父布局宽度*/
            overflow: auto;
            word-break: break-all;
            /*在ie中解决断行问题(防止自动变为在一行显示，主要解决ie兼容问题，ie8中当设宽度为100%时，文本域类容超过一行时，
            当我们双击文本内容就会自动变为一行显示，所以只能用ie的专有断行属性“word-break或word-wrap”控制其断行)*/
        }
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



<form action="upload" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">名称</label>

        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="firstname"
                   placeholder="请输入名称">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">描述</label>

        <div class="col-sm-10">
            <input type="text" name="desctext" class="form-control" id="lastname"
                   placeholder="请输入文章描述">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">标签</label>

        <div class="col-sm-10">
            <?php foreach($tags as $tags_item):?>
            <label class="checkbox-inline">
                <input type="checkbox" name="tagname[]" id="inlineCheckbox1" value="<?php echo $tags_item['id']?>"> <?php echo $tags_item['name']?>
            </label>
            <?php endforeach;?>
        </div>


    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">图片上传</label>

        <div class="col-sm-10">
            <input type="file" name="upfile" class="form-control">
        </div>
    </div>


    <div class="form-group">
        <label for="name"  class="col-sm-2 control-label">文本框</label>
        <div class="col-sm-10">
            <p>
                <textarea id="editor1" name="contents">&lt;p&gt;请输入文章内容&lt;/p&gt;</textarea>
                <script type="text/javascript">
                    CKEDITOR.replace( 'editor1' );
                </script>
            </p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">上传</button>
        </div>
    </div>
</form>



</body>
</html>

</body>
</html>