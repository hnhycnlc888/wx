<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/admin/view/user.index.html";i:1592984880;s:87:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.content.html";i:1592984880;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title">
        <h5><?php echo $title; ?></h5>
        
<div class="nowrap pull-right" style="margin-top:10px">
    <button data-modal='<?php echo url("$classuri/add"); ?>' data-title="添加用户" class='layui-btn layui-btn-small'><i
            class='fa fa-plus'></i> 添加用户
    </button>
    <button data-update data-field='delete' data-action='<?php echo url("$classuri/del"); ?>'
            class='layui-btn layui-btn-small layui-btn-danger'><i class='fa fa-remove'></i> 删除用户
    </button>
</div>

    </div>
    <?php endif; ?>
    <div class="ibox-content fadeInUp animated">
        <?php if(isset($alert)): ?>
        <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissible" role="alert" style="border-radius:0">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php if(isset($alert['title'])): ?><p style="font-size:18px;padding-bottom:10px"><?php echo $alert['title']; ?></p><?php endif; if(isset($alert['content'])): ?><p style="font-size:14px"><?php echo $alert['content']; ?></p><?php endif; ?>
        </div>
        <?php endif; ?>
        

<!-- 表单搜索 开始 -->
<form class="animated form-search" action="__SELF__" onsubmit="return false" method="get">

    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <input type="text" name="username" value="<?php echo (\think\Request::instance()->get('username') ?: ''); ?>" placeholder="用户名" class="input-sm form-control">
            </div>
        </div>

        <div class="col-xs-3">
            <div class="form-group">
                <input type="text" name="phone" value="<?php echo (\think\Request::instance()->get('phone') ?: ''); ?>" placeholder="手机号" class="input-sm form-control">
            </div>
        </div>

        <div class="col-xs-1">
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-white"><i class="fa fa-search"></i> 搜索</button>
            </div>
        </div>
    </div>
</form>
<!-- 表单搜索 结束 -->

<form onsubmit="return false;" data-auto="" method="POST">
    <input type="hidden" value="resort" name="action"/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class='list-table-check-td'>
                    <input data-none-auto="" data-check-target='.list-check-box' type='checkbox'/>
                </th>
                <th class='text-center'>用户账号</th>
                <th class='text-center'>手机号</th>
                <th class='text-center'>电子邮箱</th>
                <th class='text-center'>登录次数</th>
                <th class='text-center'>最后登录</th>
                <th class='text-center'>状态</th>
                <th class='text-center'>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $key=>$vo): ?>
            <tr>
                <td class='list-table-check-td'>
                    <input class="list-check-box" value='<?php echo $vo['id']; ?>' type='checkbox'/>
                </td>
                <td class='text-center'><?php echo $vo['username']; ?></td>
                <td class='text-center'><?php echo (isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:"<span style='color:#ccc'>还没有设置手机号</span>"); ?></td>
                <td class='text-center'><?php echo (isset($vo['mail']) && ($vo['mail'] !== '')?$vo['mail']:"<span style='color:#ccc'>还没有设置邮箱</span>"); ?></td>
                <td class='text-center'><?php echo (isset($vo['login_num']) && ($vo['login_num'] !== '')?$vo['login_num']:"<span style='color:#ccc'>从未登录</span>"); ?></td>
                <td class='text-center'><?php echo (isset($vo['login_at']) && ($vo['login_at'] !== '')?$vo['login_at']:"<span style='color:#ccc'>从未登录</span>"); ?></td>
                <td class='text-center'>
                    <?php if($vo['status'] == 0): ?>
                    <span>已禁用</span>
                    <?php elseif($vo['status'] == 1): ?>
                    <span style="color:#090">使用中</span>
                    <?php endif; ?>
                </td>
                <td class='text-center nowrap'>
                    <?php if(auth("$classuri/edit")): ?>
                    <span class="text-explode">|</span>
                    <a data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo $vo['id']; ?>' href="javascript:void(0)">编辑</a>
                    <?php endif; if(auth("$classuri/auth")): ?>
                    <span class="text-explode">|</span>
                    <a data-modal='<?php echo url("$classuri/auth"); ?>?id=<?php echo $vo['id']; ?>' href="javascript:void(0)">授权</a>
                    <?php endif; if(auth("$classuri/pass")): ?>
                    <span class="text-explode">|</span>
                    <a data-modal='<?php echo url("$classuri/pass"); ?>?id=<?php echo $vo['id']; ?>' href="javascript:void(0)">密码</a>
                    <?php endif; if($vo['status'] == 1 and auth("$classuri/forbid")): ?>
                    <span class="text-explode">|</span>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='status' data-value='0' data-action='<?php echo url("$classuri/forbid"); ?>'
                       href="javascript:void(0)">禁用</a>
                    <?php elseif(auth("$classuri/resume")): ?>
                    <span class="text-explode">|</span>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='status' data-value='1' data-action='<?php echo url("$classuri/resume"); ?>'
                       href="javascript:void(0)">启用</a>
                    <?php endif; if(auth("$classuri/del")): ?>
                    <span class="text-explode">|</span>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='delete' data-action='<?php echo url("$classuri/del"); ?>'
                       href="javascript:void(0)">删除</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>
</form>

    </div>
    
</div>