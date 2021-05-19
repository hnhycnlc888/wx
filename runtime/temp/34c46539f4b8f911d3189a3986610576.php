<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/wechat/view/tags.index.html";i:1592984880;s:87:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.content.html";i:1592984880;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title">
        <h5><?php echo $title; ?></h5>
        
<div class="nowrap pull-right" style="margin-top:10px">
    <button data-modal="<?php echo url('add'); ?>" data-title="添加标签" class='layui-btn layui-btn-small'> 添加标签 </button>
    <button data-load="<?php echo url('sync'); ?>" class='layui-btn layui-btn-small'> 同步标签 </button>
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
                <input type="text" name="name" value="<?php echo (\think\Request::instance()->get('name') ?: ''); ?>" placeholder="标签" class="input-sm form-control">
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
                <th class='text-center'>ID</th>
                <th class='text-center'>标签</th>
                <th class='text-center'>类型</th>
                <th class='text-center'>粉丝数</th>
                <th class='text-center'>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $key=>$vo): ?>
            <tr>
                <td class='list-table-check-td'>
                    <input class="list-check-box" value='<?php echo $vo['id']; ?>' type='checkbox'/>
                </td>
                <td class='text-center'><?php echo (isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'0'); ?></td>
                <td class='text-center'><?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?></td>
                <td class='text-center'><?php echo $vo['id']<100?"系统标签" : "自定义标签"; ?></td>
                <td class='text-center'><?php echo (isset($vo['count']) && ($vo['count'] !== '')?$vo['count']:''); ?></td>
                <td class='text-center nowrap'>

                    <?php if(auth("$classuri/edit")): if($vo['id'] >= 100): ?>
                    <span class="text-explode">|</span>
                    <a data-modal='<?php echo url("$classuri/edit"); ?>?id=<?php echo $vo['id']; ?>' data-title="编辑标签" href="javascript:void(0)">编辑</a>
                    <?php else: ?>
                    <a href="javascript:void(0)" style="color:#999">编辑</a>
                    <?php endif; endif; if(auth("$classuri/del")): ?>
                    <span class="text-explode">|</span>
                    <?php if($vo['id'] >= 100): ?>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' href="javascript:void(0)">删除</a>
                    <?php else: ?>
                    <a href="javascript:void(0)" style="color:#999">删除</a>
                    <?php endif; endif; ?>

                </td>
            </tr>
            <?php endforeach; if(empty($list)): ?>
            <tr><td colspan="6" style="text-align:center">没 有 记 录 了 哦 !</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>
</form>

    </div>
    
</div>