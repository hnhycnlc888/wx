<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/admin/view/node.index.html";i:1592984880;s:87:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.content.html";i:1592984880;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title">
        <h5><?php echo $title; ?></h5>
        
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
        
<table class="table table-hover">
    <thead>
        <tr>
            <th style="width:20px"></th>
            <th class='text-left'>系统节点结构</th>
            <th class='text-left'></th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($nodes as $key=>$vo): ?>
        <tr>
            <td style="width:20px"></td>
            <td class='text-left nowrap'>
                <?php echo $vo['spl']; ?><?php echo $vo['node']; if(auth("$classuri/save")): ?>
                &nbsp;<input class='layui-input layui-input-inline title-input' style='height:28px;line-height:28px;width:auto' name='title.<?php echo $vo['node']; ?>' value="<?php echo $vo['title']; ?>"/>
                <?php endif; ?>
            </td>
            <td class='text-left nowrap'>
                <?php if(auth("$classuri/save")): ?>
                <label>
                    <?php if(substr_count($vo['node'],'/')==2): if(!(empty($vo['is_auth']) || (($vo['is_auth'] instanceof \think\Collection || $vo['is_auth'] instanceof \think\Paginator ) && $vo['is_auth']->isEmpty()))): ?>
                    <input name='is_auth.<?php echo $vo['node']; ?>' checked='checked' class="check-box" type='checkbox' value='1'/>
                    <?php else: ?>
                    <input name='is_auth.<?php echo $vo['node']; ?>' class="check-box" type='checkbox' value='1'/>
                    <?php endif; ?>
                    加入权限控制
                    <?php endif; ?>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    <?php if(substr_count($vo['node'],'/')==2): if(!(empty($vo['is_menu']) || (($vo['is_menu'] instanceof \think\Collection || $vo['is_menu'] instanceof \think\Paginator ) && $vo['is_menu']->isEmpty()))): ?>
                    <input name='is_menu.<?php echo $vo['node']; ?>' checked='checked' class='check-box' type='checkbox' value='1'/>
                    <?php else: ?>
                    <input name='is_menu.<?php echo $vo['node']; ?>' class='check-box' type='checkbox' value='1'/>
                    <?php endif; ?>
                    可设为菜单
                    <?php endif; ?>
                </label>
                <?php endif; ?>
            </td>
            <td style="width:100%"></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if(auth("$classuri/save")): ?>
<script>
    $(function () {
        $('input.title-input').on('blur', function () {
            $.form.load('<?php echo url("save"); ?>', {name: this.name, value: this.value}, 'POST', function (ret) {
                return false;
            });
        });
        $('input.check-box').on('click', function () {
            $.form.load('<?php echo url("save"); ?>', {name: this.name, value: this.checked ? 1 : 0}, 'POST', function (ret) {
                return false;
            });
        });
    });
</script>
<?php endif; ?>

    </div>
    
</div>