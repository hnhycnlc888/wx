<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/admin/view/log.index.html";i:1592984880;s:87:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.content.html";i:1592984880;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title">
        <h5><?php echo $title; ?></h5>
        
<div class="nowrap pull-right" style="margin-top:10px">
    <?php if(auth("$classuri/del")): ?>
    <button data-update data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' class='layui-btn layui-btn-small layui-btn-danger'>
        <i class='fa fa-remove'></i> 删除日志
    </button>
    <?php endif; ?>
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
                <input type="text" name="username" value="<?php echo (\think\Request::instance()->get('username') ?: ''); ?>" placeholder="操作者" class="input-sm form-control">
            </div>
        </div>

        <div class="col-xs-3">
            <div class="form-group">
                <select name='action' class='input-sm form-control'>
                    <option value=''> - 行为 - </option>
                    <!--<?php foreach($actions as $action): ?>-->
                    <!--<?php if($action===\think\Request::instance()->get('action')): ?>-->
                    <option selected="selected" value='<?php echo $action; ?>'><?php echo $action; ?></option>
                    <!--<?php else: ?>-->
                    <option value='<?php echo $action; ?>'><?php echo $action; ?></option>
                    <!--<?php endif; ?>-->
                    <!--<?php endforeach; ?>-->
                </select>
            </div>
        </div>

        <div class="col-xs-3">
            <div class="form-group">
                <input type="text" name="content" value="<?php echo (\think\Request::instance()->get('content') ?: ''); ?>" placeholder="操作内容" class="input-sm form-control">
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
                <th class='text-center'>操作者</th>
                <th class='text-left'>节点</th>
                <th class='text-left'>行为</th>
                <th class='text-left'>操作内容</th>
                <th class='text-left'>操作位置</th>
                <th class='text-left'>操作时间</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $key=>$vo): ?>
            <tr>
                <td class='list-table-check-td'>
                    <input class="list-check-box" value='<?php echo $vo['id']; ?>' type='checkbox'/>
                </td>
                <td class='text-center'><?php echo $vo['username']; ?></td>
                <td class='text-left'><?php echo $vo['node']; ?></td>
                <td class='text-left'><?php echo $vo['action']; ?></td>
                <td class='text-left'><?php echo $vo['content']; ?></td>
                <td class='text-left'><?php echo (isset($vo['isp']) && ($vo['isp'] !== '')?$vo['isp']:$vo['ip']); ?></td>
                <td class='text-left'><?php echo $vo['create_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>
</form>

    </div>
    
</div>