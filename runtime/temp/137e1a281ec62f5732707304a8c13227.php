<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:85:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/admin/view/index.index.html";i:1592984880;s:84:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.main.html";i:1592984880;s:88:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.main.top.html";i:1592984880;s:89:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.main.left.html";i:1592984880;}*/ ?>
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
        <script>window.ROOT_URL = '__PUBLIC__';</script>
        <script src="__PUBLIC__/static/plugs/require/require.js?ver=<?php echo date('ymd'); ?>"></script>
        <script src="__PUBLIC__/static/admin/app.js?ver=<?php echo date('ymd'); ?>"></script>
    </head>
    
    <body>
        
<div class="framework-topbar">
    <div class="console-topbar">
        <div class="topbar-wrap topbar-clearfix">
            <div class="topbar-head topbar-left">
                <a href="<?php echo url('@admin'); ?>" class="topbar-logo topbar-left">
                    <span class="icon-logo"><?php echo sysconf('app_name'); ?> <sup><?php echo sysconf('app_version'); ?></sup></span>
                </a>
            </div>
            <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pmenu): $mod = ($i % 2 );++$i;if(empty($pmenu['sub']) || (($pmenu['sub'] instanceof \think\Collection || $pmenu['sub'] instanceof \think\Paginator ) && $pmenu['sub']->isEmpty())): ?>
            <a data-menu-node='m-<?php echo $pmenu['id']; ?>' data-open="<?php echo $pmenu['url']; ?>"
               class="topbar-home-link topbar-btn topbar-left">
                <span><?php if(!(empty($pmenu['icon']) || (($pmenu['icon'] instanceof \think\Collection || $pmenu['icon'] instanceof \think\Paginator ) && $pmenu['icon']->isEmpty()))): ?><i class="<?php echo $pmenu['icon']; ?>"></i><?php endif; ?> <?php echo $pmenu['title']; ?></span>
            </a>
            <?php else: ?>
            <a data-menu-target='m-<?php echo $pmenu['id']; ?>' class="topbar-home-link topbar-btn topbar-left">
                <span><?php if(!(empty($pmenu['icon']) || (($pmenu['icon'] instanceof \think\Collection || $pmenu['icon'] instanceof \think\Paginator ) && $pmenu['icon']->isEmpty()))): ?><i class="<?php echo $pmenu['icon']; ?>"></i><?php endif; ?> <?php echo $pmenu['title']; ?></span>
            </a>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>

            <div class="topbar-info topbar-right">
                <a data-reload data-tips-text='刷新'
                   class=" topbar-btn topbar-left topbar-info-item text-center"
                   style='width:50px;'>
                    <span class='glyphicon glyphicon-refresh'></span>
                </a>
                <script>
                    require(['jquery'], function () {
                        $('[data-reload]').hover(function () {
                            $(this).find('.glyphicon').addClass('fa-spin');
                        }, function () {
                            $(this).find('.glyphicon').removeClass('fa-spin');
                        });
                    });
                </script>
                <div class="topbar-left topbar-user">
                    <div class="dropdown topbar-info-item">
                        <a href="#" class="dropdown-toggle topbar-btn text-center" data-toggle="dropdown">
                            <span class='glyphicon glyphicon-user'></span> <?php echo session('user.username'); ?> </span>
                            <span class="glyphicon glyphicon-menu-up transition" style="font-size:12px"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="topbar-info-btn">
                                <a data-modal="<?php echo url('admin/index/pass'); ?>?id=<?php echo session('user.id'); ?>">
                                    <span><i class='glyphicon glyphicon-lock'></i> 修改密码</span>
                                </a>
                            </li>
                            <li class="topbar-info-btn">
                                <a data-modal="<?php echo url('admin/index/info'); ?>?id=<?php echo session('user.id'); ?>">
                                    <span><i class='glyphicon glyphicon-edit'></i> 修改资料</span>
                                </a>
                            </li>
                            <li class="topbar-info-btn">
                                <a data-load="<?php echo url('admin/login/out'); ?>" data-confirm='确定要退出登录吗？'>
                                    <span><i class="glyphicon glyphicon-log-out"></i> 退出登录</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="framework-body framework-sidebar-mini">
    <div class="framework-sidebar">
    <div class="sidebar-content">
        <div class="sidebar-inner">
            <div class="sidebar-fold">
                <span class="glyphicon glyphicon-option-vertical transition"></span>
            </div>
            <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pmenu): $mod = ($i % 2 );++$i;if(!(empty($pmenu['sub']) || (($pmenu['sub'] instanceof \think\Collection || $pmenu['sub'] instanceof \think\Paginator ) && $pmenu['sub']->isEmpty()))): ?>
            <div data-menu-box="m-<?php echo $pmenu['id']; ?>">
                <?php if(is_array($pmenu['sub']) || $pmenu['sub'] instanceof \think\Collection || $pmenu['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $pmenu['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                <div class="sidebar-nav main-nav">
                    <?php if(empty($menu['sub']) || (($menu['sub'] instanceof \think\Collection || $menu['sub'] instanceof \think\Paginator ) && $menu['sub']->isEmpty())): ?>
                    <ul class="sidebar-trans">
                        <li class="nav-item">
                            <a data-menu-node='m-<?php echo $pmenu['id']; ?>-<?php echo $menu['id']; ?>' data-open="<?php echo $menu['url']; ?>"
                               class="sidebar-trans">
                                <div class="nav-icon sidebar-trans">
                                    <span class="<?php echo (isset($menu['icon']) && ($menu['icon'] !== '')?$menu['icon']:'fa fa-link'); ?> transition"></span>
                                </div>
                                <span class="nav-title"><?php echo $menu['title']; ?></span>
                            </a>
                        </li>
                    </ul>
                    <?php else: ?>
                    <div class="sidebar-title">
                        <div class="sidebar-title-inner">
                            <span class="sidebar-title-icon fa fa-caret-right transition"></span>
                            <span class="sidebar-title-text"><?php echo $menu['title']; ?></span>
                        </div>
                    </div>
                    <ul class="sidebar-trans" style="display:none" data-menu-node='m-<?php echo $pmenu['id']; ?>-<?php echo $menu['id']; ?>'>
                        <?php if(is_array($menu['sub']) || $menu['sub'] instanceof \think\Collection || $menu['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $menu['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$submenu): $mod = ($i % 2 );++$i;?>
                        <li class="nav-item">
                            <a data-menu-node='m-<?php echo $pmenu['id']; ?>-<?php echo $submenu['id']; ?>' data-open="<?php echo $submenu['url']; ?>"
                               class="sidebar-trans">
                                <div class="nav-icon sidebar-trans">
                                    <span class="<?php echo (isset($submenu['icon']) && ($submenu['icon'] !== '')?$submenu['icon']:'fa fa-link'); ?> transition"></span>
                                </div>
                                <span class="nav-title"><?php echo $submenu['title']; ?></span>
                            </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
    <div class="framework-container layer-main-container"></div>
</div>

        
    </body>
    
</html>