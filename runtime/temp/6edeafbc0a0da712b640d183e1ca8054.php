<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/admin/view/login.index.html";i:1592984880;s:84:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.main.html";i:1592984880;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="shortcut icon" href="<?php echo sysconf('browser_icon'); ?>" />
        <title><?php echo (isset($title) && ($title !== '')?$title:''); ?>&nbsp;<?php if(!empty($title)): ?>·<?php endif; ?>&nbsp;<?php echo sysconf('site_name'); ?></title>
        <link rel="stylesheet" href="__PUBLIC__/static/plugs/bootstrap/css/bootstrap.min.css?ver=<?php echo date('ymd'); ?>"/>
        <link rel="stylesheet" href="__PUBLIC__/static/plugs/layui/css/layui.css?ver=<?php echo date('ymd'); ?>"/>
        <link rel="stylesheet" href="__PUBLIC__/static/theme/default/css/console.css?ver=<?php echo date('ymd'); ?>">
        <link rel="stylesheet" href="__PUBLIC__/static/theme/default/css/animate.css?ver=<?php echo date('ymd'); ?>">
<link rel="stylesheet" href="__PUBLIC__/static/theme/default/css/login.css">

        <script>window.ROOT_URL = '__PUBLIC__';</script>
        <script src="__PUBLIC__/static/plugs/require/require.js?ver=<?php echo date('ymd'); ?>"></script>
        <script src="__PUBLIC__/static/admin/app.js?ver=<?php echo date('ymd'); ?>"></script>
    </head>
    
    <body>
        
<div class="login-container" style="height:100%">

    <!-- 动态云层动画 开始 -->
    <div class="clouds clouds-footer"></div>
    <div class="clouds"></div>
    <div class="clouds clouds-fast"></div>
    <!-- 动态云层动画 结束 -->

    <!-- 顶部导航条 开始 -->
    <div class="header">
        <span>欢迎登录后台管理界面平台</span>
        <ul>
            <li><a href="<?php echo url('@'); ?>">回首页</a></li>
            <li>
                <a href="javascript:void(0)" target="_blank"><b style="color:#fff">帮助</b></a>
            </li>
            <li>
                <a href="http://sw.bos.baidu.com/sw-search-sp/software/4bcf5e4f1835b/ChromeStandalone_54.0.2840.99_Setup.exe" target="_blank">
                    <b style="color:#fff">推荐谷歌浏览器</b>
                </a>
            </li>
            <li><a target="_blank" href="http://www.cuci.cc">楚才官网</a></li>
        </ul>
    </div>
    <!-- 顶部导航条 结束 -->

    <!-- 页面表单主体 开始 -->
    <div class="container" style="top:50%;margin-top:-300px">

        <form onsubmit="return false;" data-time="0.001" data-auto="true" method="post" class="content layui-form">
            <div class="people">
                <div class="tou"></div>
                <div id="left-hander" class="initial_left_hand transition"></div>
                <div id="right-hander" class="initial_right_hand transition"></div>
            </div>
            <ul>
                <li>
                    <input name='username' style='display:none'/>
                    <input required="required"
                           pattern="^\S{4,}$"
                           title="请输入4位及以上的字符"
                           type="text"
                           name="username"
                           value="admin"
                           autocomplete="off"
                           autofocus="autofocus"
                           class="login-input username"
                           placeholder="请输入用户名/手机号码"/>
                </li>
                <li>
                    <input name='password' style='display:none'/>
                    <input required="required"
                           pattern="^\S{4,}$"
                           title="请输入4位及以上的字符"
                           type="password"
                           name="password"
                           value="admin"
                           autocomplete="off"
                           class="login-input password"
                           placeholder="请输入密码"/>
                </li>
                <li class="text-center">
                    <button type="submit" class="layui-btn layui-disabled" data-form-loaded="立 即 登 入">正 在 载 入</button>
                    <a style="position:absolute;display:block;right:0" href="javascript:void(0)">忘记密码？</a>
                </li>
            </ul>
        </form>
    </div>
    <!-- 页面表单主体 结束 -->

    <!-- 底部版权信息 开始 -->
    <?php if(sysconf('site_copy')): ?>
    <div class="footer"><?php echo sysconf('site_copy'); ?></div>
    <?php endif; ?>
    <!-- 底部版本信息 结束 -->

</div>

        
<script>
    if (window.location.href.indexOf('#') > -1) {
        window.location.href = window.location.href.split('#')[0];
    }
    require(['jquery'], function ($) {
        $('[name="password"]').on('focus', function () {
            $('#left-hander').removeClass('initial_left_hand').addClass('left_hand');
            $('#right-hander').removeClass('initial_right_hand').addClass('right_hand')
        }).on('blur', function () {
            $('#left-hander').addClass('initial_left_hand').removeClass('left_hand');
            $('#right-hander').addClass('initial_right_hand').removeClass('right_hand')
        });
    });
</script>

    </body>
    
</html>