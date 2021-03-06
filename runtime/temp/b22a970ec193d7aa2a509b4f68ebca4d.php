<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/wechat/view/keys.form.html";i:1592984880;s:87:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.content.html";i:1592984880;}*/ ?>
<div class="ibox">
    
<style>
    .layui-box .control-label {margin:0;padding-left:0;padding-right:0;}
    .layui-box textarea {width: 95%}
</style>

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
        

<!-- 效果预览区域 开始 -->
<div class='mobile-preview pull-left'>
    <div class='mobile-header'>公众号</div>
    <div class='mobile-body'>
        <iframe id="phone-preview" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
</div>
<!-- 效果预览区域 结束 -->

<div class="row" style="min-width:800px">
    <div class='col-xs-6' style="margin-left:15px">
        <form class="form-horizontal" role="form" data-auto="true" action="__SELF__" method="post">
            <fieldset class="layui-elem-field layui-box" style="height:580px;position:absolute;width:535px">
                <legend><?php echo $title; ?></legend>
                <div>
                    <?php if(!isset($vo['keys']) or ($vo['keys'] != 'default' and $vo['keys'] != 'subscribe')): ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label layui-form-label ">关 键 字</label>
                        <div class="col-md-9">
                            <input required="required" title='请输入关键字' maxlength='20' name='keys' class="layui-input" value='<?php echo (isset($vo['keys']) && ($vo['keys'] !== '')?$vo['keys']:""); ?>'>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label layui-form-label label-required">规则状态</label>
                        <div class="col-md-9">
                            <div class="mt-radio-inline" style='padding-bottom:0'>
                                <?php if(!isset($vo['status']) or $vo['status'] != 0): ?>
                                <label class="layui-form-label">
                                    <input data-none-auto type="radio" checked name="status" value="1"> 启用
                                </label>
                                <label class="layui-form-label">
                                    <input data-none-auto type="radio" name="status" value="0"> 禁用
                                </label>
                                <?php else: ?>
                                <label class="layui-form-label">
                                    <input data-none-auto type="radio" name="status" value="1"> 启用
                                </label>
                                <label class="layui-form-label">
                                    <input data-none-auto type="radio" checked name="status" value="0"> 禁用
                                </label>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label class="col-md-2 control-label layui-form-label label-required">消息类型</label>
                        <div class="col-md-9">
                            <select name='type' class='layui-input'>

                                <!--<?php if(!isset($vo['type']) or $vo['type'] == 'text'): ?>-->
                                <option value='text' selected>文字</option>
                                <!--<?php else: ?>-->
                                <option value='text'>文字</option>
                                <!--<?php endif; ?>-->

                                <!--<?php if(isset($vo['type']) and $vo['type'] == 'news'): ?>-->
                                <option value='news' selected>图文</option>
                                <!--<?php else: ?>-->
                                <option value='news'>图文</option>
                                <!--<?php endif; ?>-->

                                <!--<?php if(isset($vo['type']) and $vo['type'] == 'image'): ?>-->
                                <option value='image' selected>图片</option>
                                <!--<?php else: ?>-->
                                <option value='image'>图片</option>
                                <!--<?php endif; ?>-->

                                <!--<?php if(isset($vo['type']) and $vo['type'] == 'voice'): ?>-->
                                <!--<option value='voice' selected>语音</option>-->
                                <!--<?php else: ?>-->
                                <!--<option value='voice'>语音</option>-->
                                <!--<?php endif; ?>-->

                                <!--<?php if(isset($vo['type']) and $vo['type'] == 'music'): ?>-->
                                <option value='music' selected>音乐</option>
                                <!--<?php else: ?>-->
                                <option value='music'>音乐</option>
                                <!--<?php endif; ?>-->

                                <!--<?php if(isset($vo['type']) and $vo['type'] == 'video'): ?>-->
                                <option value='video' selected>视频</option>
                                <!--<?php else: ?>-->
                                <option value='video'>视频</option>
                                <!--<?php endif; ?>-->

                            </select>
                        </div>
                    </div>

                    <div class="form-group" data-keys-type='text'>
                        <label class="col-md-2 control-label layui-form-label label-required">规则内容</label>
                        <div class="col-md-9">
                            <textarea name="content" maxlength="10000" class="form-control" style="height:100px"><?php echo (isset($vo['content']) && ($vo['content'] !== '')?$vo['content']:'说点什么吧'); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group" data-keys-type='news'>
                        <label class="col-md-2 control-label layui-form-label">选取图文</label>
                        <div class="col-md-9">
                            <a class="btn btn-link" data-iframe="<?php echo url('wechat/news/select'); ?>?field=<?php echo encode('news_id'); ?>">选择图文</a>
                            <input type="hidden" class='layui-input' value="<?php echo (isset($vo['news_id']) && ($vo['news_id'] !== '')?$vo['news_id']:0); ?>" name="news_id"/>
                        </div>
                    </div>

                    <div class="form-group" data-keys-type='image'>
                        <label class="col-md-2 control-label layui-form-label label-required">图片地址</label>
                        <div class="col-md-9">
                            <input type="text" class="layui-input" onchange="$(this).nextAll('img').attr('src', this.value);"
                                   value="<?php echo (isset($vo['image_url']) && ($vo['image_url'] !== '')?$vo['image_url']:'__PUBLIC__/static/theme/default/img/image.png'); ?>"
                                   name="image_url" required="required" title="请上传图片或输入图片URL地址"/>
                            <p class="help-block">文件最大2Mb，支持bmp/png/jpeg/jpg/gif格式</p>
                            <img style="width:112px;height:auto;" data-tips-image src='<?php echo (isset($vo['image_url']) && ($vo['image_url'] !== '')?$vo['image_url']:"__PUBLIC__/static/theme/default/img/image.png"); ?>'/>
                            <a data-file="one" data-type="bmp,png,jpeg,jpg,gif" data-field="image_url" class='btn btn-link'>上传图片</a>
                        </div>
                    </div>

                    <div class="form-group" data-keys-type='voice'>
                        <label class="col-md-2 control-label layui-form-label label-required">上传语音</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input class='layui-input' type="text" value="<?php echo (isset($vo['voice_url']) && ($vo['voice_url'] !== '')?$vo['voice_url']:''); ?>" name="voice_url" required="required" title="请上传语音文件或输入语音URL地址　　"/>
                                <a data-file="one" data-type="mp3,wma,wav,amr" data-field="voice_url" class="input-group-addon"><i class="fa fa-file"></i></a>
                            </div>
                            <p class="help-block">文件最大2Mb，播放长度不超过60s，mp3/wma/wav/amr格式</p>
                        </div>
                    </div>

                    <div class="form-group" data-keys-type='music'>
                        <label class="col-md-2 control-label layui-form-label">音乐标题</label>
                        <div class="col-md-9">
                            <input class='layui-input' value="<?php echo (isset($vo['music_title']) && ($vo['music_title'] !== '')?$vo['music_title']:'音乐标题'); ?>" name="music_title" required="required" title="请输入音乐标题"/>
                        </div>
                    </div>
                    <div class="form-group" data-keys-type='music'>
                        <label class="col-md-2 control-label layui-form-label label-required">上传音乐</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input class='layui-input' type="text" value="<?php echo (isset($vo['music_url']) && ($vo['music_url'] !== '')?$vo['music_url']:''); ?>" name="music_url" required="required" title="请上传音乐文件或输入音乐URL地址　　"/>
                                <a data-file="one" data-type="mp3,wma,wav,amr" data-field="music_url" class="input-group-addon"><i class="fa fa-file"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-keys-type='music'>
                        <label class="col-md-2 control-label layui-form-label">音乐描述</label>
                        <div class="col-md-9">
                            <input name="music_desc" class="layui-input" value="<?php echo (isset($vo['music_desc']) && ($vo['music_desc'] !== '')?$vo['music_desc']:'音乐描述'); ?>"/>
                        </div>
                    </div>
                    <div class="form-group" data-keys-type='music'>
                        <label class="col-md-2 control-label layui-form-label">音乐图片</label>
                        <div class="col-md-9">

                            <input onchange="$(this).nextAll('img').attr('src', this.value);" type="text" class="layui-input"
                                   value="<?php echo (isset($vo['music_image']) && ($vo['music_image'] !== '')?$vo['music_image']:'__PUBLIC__/static/theme/default/img/image.png'); ?>"
                                   name="music_image" required="required" title="请上传音乐图片或输入音乐图片URL地址　　"/>
                            <p class="help-block">文件最大64KB，只支持JPG格式</p>
                            <img style="width:112px;height:auto;" data-tips-image src='<?php echo (isset($vo['music_image']) && ($vo['music_image'] !== '')?$vo['music_image']:"__PUBLIC__/static/theme/default/img/image.png"); ?>'/>
                            <a data-file="one" data-type="jpg" data-field="music_image" class='btn btn-link'>上传图片</a>
                        </div>
                    </div>

                    <div class="form-group" data-keys-type='video'>
                        <label class="col-md-2 control-label layui-form-label">视频标题</label>
                        <div class="col-md-9">
                            <input class='layui-input' value="<?php echo (isset($vo['video_title']) && ($vo['video_title'] !== '')?$vo['video_title']:'视频标题'); ?>" name="video_title" required="required" title="请输入视频标题"/>
                        </div>
                    </div>

                    <div class="form-group" data-keys-type='video'>
                        <label class="col-md-2 control-label layui-form-label label-required">上传视频</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input class='layui-input' type="text" value="<?php echo (isset($vo['video_url']) && ($vo['video_url'] !== '')?$vo['video_url']:''); ?>" name="video_url" required="required" title="请上传音乐视频或输入音乐视频URL地址　　"/>
                                <a data-file="one" data-type="mp4" data-field="video_url" class="input-group-addon"><i class="fa fa-file"></i></a>
                            </div>
                            <p class="help-block">文件最大10MB，只支持MP4格式</p>
                        </div>
                    </div>

                    <div class="form-group" data-keys-type='video'>
                        <label class="col-md-2 control-label layui-form-label">视频描述</label>
                        <div class="col-md-9">
                            <textarea name="video_desc" maxlength="50" class="form-control" style="height:100px"><?php echo (isset($vo['video_desc']) && ($vo['video_desc'] !== '')?$vo['video_desc']:'视频描述'); ?></textarea>
                        </div>
                    </div>

                    <div class="text-center" style="position:absolute;bottom:20px;width:100%;">
                        <div class="hr-line-dashed"></div>
                        <button class="layui-btn menu-submit">保存数据</button>
                        <?php if(!isset($vo['keys']) || !in_array($vo['keys'],['default','subscribe'])): ?>
                        <button data-cancel-edit class="layui-btn layui-btn-danger" type='button'>取消编辑</button>
                        <?php endif; ?>
                    </div>

                    <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo $vo['id']; ?>' name='id'/><?php endif; ?>
                </div>
            </fieldset>
        </form>
    </div>
</div>

    </div>
    
<script>

    $(function () {

        /*! 取消编辑 */
        $('[data-cancel-edit]').on('click', function () {
            $.msg.confirm('确定取消编辑吗？', function () {
                history.back();
            });
        });

        /*! 默认类型事件 */
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
            $('#phone-preview').attr('src', '<?php echo url("@wechat/review"); ?>?' + $.param(params || {}));
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
    });
</script>

</div>