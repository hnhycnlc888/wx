<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/wechat/view/keys.index.html";i:1592984880;s:87:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.content.html";i:1592984880;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title">
        <h5><?php echo $title; ?></h5>
        
<div class="nowrap pull-right" style="margin-top:10px">
    <button data-open="<?php echo url('add'); ?>" class='layui-btn layui-btn-small'>添加规则</button>
    <button data-update data-field='delete' data-action='<?php echo url("$classuri/del"); ?>' class='layui-btn layui-btn-small layui-btn-danger'>删除规则</button>
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
        
<form onsubmit="return false;" data-auto="true" action="__SELF__" method="post">
    <input type="hidden" value="resort" name="action"/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class='list-table-check-td'>
                    <input data-none-auto="" data-check-target='.list-check-box' type='checkbox'/>
                </th>
                <th class='list-table-sort-td'>
                    <button type="submit" class="layui-btn layui-btn-normal layui-btn-mini">排 序</button>
                </th>
                <th class="text-center">关键字</th>
                <th class="text-center">回复类型</th>
                <th class="text-center">回复内容</th>
                <th class="text-center">更新时间</th>
                <th class="text-center">状态</th>
                <th class="text-center">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $key=>$vo): ?>
            <tr>
                <td class='list-table-check-td'>
                    <input class="list-check-box" value='<?php echo $vo['id']; ?>' type='checkbox'/>
                </td>
                <td class='list-table-sort-td'>
                    <input name="_<?php echo $vo['id']; ?>" value="<?php echo $vo['sort']; ?>" class="list-sort-input"/>
                </td>
                <td class="text-center"><?php echo $vo['keys']; ?></td>
                <td class="text-center"><?php echo $vo['type']; ?></td>
                <td class="text-center">
                    <?php if($vo['type'] == '音乐'): ?>
                    <a data-phone-view='<?php echo url("@wechat/review"); ?>?type=music&title=<?php echo urlencode($vo['music_title']); ?>&desc=<?php echo urlencode($vo['music_desc']); ?>'
                       class="btn btn-link"><i class="fa fa-eye"></i> 预览
                    </a>
                    <?php elseif($vo['type'] == '文字'): ?>
                    <a data-phone-view='<?php echo url("@wechat/review"); ?>?type=text&content=<?php echo urlencode($vo['content']); ?>'
                       class="btn btn-link"><i class="fa fa-eye"></i> 预览
                    </a>
                    <?php elseif($vo['type'] == '图片'): ?>
                    <a data-phone-view='<?php echo url("@wechat/review"); ?>?type=image&content=<?php echo urlencode($vo['image_url']); ?>'
                       class="btn btn-link"><i class="fa fa-eye"></i> 预览
                    </a>
                    <?php elseif($vo['type'] == '图文'): ?>
                    <a data-phone-view='<?php echo url("@wechat/review"); ?>?type=news&content=<?php echo $vo['news_id']; ?>'
                       class="btn btn-link"><i class="fa fa-eye"></i> 预览
                    </a>
                    <?php elseif($vo['type'] == '视频'): ?>
                    <a data-phone-view='<?php echo url("@wechat/review"); ?>?type=video&title=<?php echo urlencode($vo['video_title']); ?>&desc=<?php echo urlencode($vo['video_desc']); ?>&url=<?php echo urlencode($vo['video_url']); ?>'
                       class="btn btn-link"><i class="fa fa-eye"></i> 预览
                    </a>
                    <?php else: ?>
                    <?php echo $vo['content']; endif; ?>
                </td>
                <td class="text-center"><?php echo $vo['create_at']; ?></td>
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
                    <a data-open='<?php echo url("edit"); ?>?id=<?php echo $vo['id']; ?>'>编辑</a>
                    <?php endif; if($vo['status'] == 1 and auth("$classuri/forbid")): ?>
                    <span class="text-explode">|</span>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='status' data-value='0' data-action='<?php echo url("$classuri/forbid"); ?>' href="javascript:void(0)">禁用</a>
                    <?php elseif(auth("$classuri/resume")): ?>
                    <span class="text-explode">|</span>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='status' data-value='1' data-action='<?php echo url("$classuri/resume"); ?>'  href="javascript:void(0)">启用</a>
                    <?php endif; if(auth("$classuri/del")): ?>
                    <span class="text-explode">|</span>
                    <a data-update="<?php echo $vo['id']; ?>" data-field='delete' data-action='<?php echo url("del"); ?>' href="javascript:void(0)">删除</a>
                    <?php endif; ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(isset($page)): ?><p><?php echo $page; ?></p><?php endif; ?>
</form>


    </div>
    
<script>

    $(function () {
        /**
         * 默认类型事件
         * @type String
         */
        $('body').off('change', 'select[name=type]').on('change', 'select[name=type]', function () {
            var value = $(this).val(), $form = $(this).parents('form');
            var $current = $form.find('[data-keys-type="' + value + '"]').removeClass('hide');
            $form.find('[data-keys-type]').not($current).addClass('hide');
            switch (value) {
                case 'news':
                    return $('[name="news_id"]').trigger('change');
                case 'text':
                    return $('[name="content"]').trigger('change');
                case 'image':
                    return $('[name="image_url"]').trigger('change');
                case 'video':
                    return $('[name="video_url"]').trigger('change');
                case 'music':
                    return $('[name="music_url"]').trigger('change');
                case 'voice':
                    return $('[name="voice_url"]').trigger('change');
            }
        });

        function showReview(params) {
            params = params || {};
            $('#phone-preview').attr('src', '{"@wechat/review"|app_url}&' + $.param(params));
        }

        // 图文显示预览
        $('body').off('change', '[name="news_id"]').on('change', '[name="news_id"]', function () {
            showReview({type: 'news', content: this.value});
        });
        // 文字显示预览
        $('body').off('change', '[name="content"]').on('change', '[name="content"]', function () {
            showReview({type: 'text', content: this.value});
        });
        // 图片显示预览
        $('body').off('change', '[name="image_url"]').on('change', '[name="image_url"]', function () {
            showReview({type: 'image', content: this.value});
        });
        // 音乐显示预览
        var musicSelector = '[name="music_url"],[name="music_title"],[name="music_desc"],[name="music_image"]';
        $('body').off('change', musicSelector).on('change', musicSelector, function () {
            var params = {type: 'music'}, $parent = $(this).parents('form');
            params.title = $parent.find('[name="music_title"]').val();
            params.url = $parent.find('[name="music_url"]').val();
            params.image = $parent.find('[name="music_image"]').val();
            params.desc = $parent.find('[name="music_desc"]').val();
            showReview(params);
        });
        // 视频显示预览
        var videoSelector = '[name="video_title"],[name="video_url"],[name="video_desc"]';
        $('body').off('change', videoSelector).on('change', videoSelector, function () {
            var params = {type: 'video'}, $parent = $(this).parents('form');
            params.title = $parent.find('[name="video_title"]').val();
            params.url = $parent.find('[name="video_url"]').val();
            params.desc = $parent.find('[name="video_desc"]').val();
            showReview(params);
        });

        // 默认事件触发
        $('select[name=type]').map(function () {
            $(this).trigger('change');
        });

        /*! 删除关键字 */
        $('[data-delete]').on('click', function () {
            var id = this.getAttribute('data-delete');
            var url = this.getAttribute('data-action');
            $.msg.confirm('确定要删除这条记录吗？', function () {
                $.form.load(url, {id: id}, 'POST', function (ret) {
                    if (ret.code === "SUCCESS") {
                        window.location.reload();
                    }
                });
            })
        });
    });
</script>

</div>