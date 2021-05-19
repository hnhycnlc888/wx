<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/wechat/view/config.pay.html";i:1592984880;s:87:"/www/admin/wx.zhinengyingjian.work_80/wwwroot/application/extra/view/admin.content.html";i:1592984880;}*/ ?>
<div class="ibox">
    
<style>
    .pay-qrc-test {height: 248px;width: 248px;background: url('__PUBLIC__/static/plugs/layui/css/modules/layer/default/loading-2.gif') no-repeat center center}
    .refund-qrc-test{text-align: center;padding: 8px}
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
        
<form onsubmit="return false;" action="__SELF__" data-auto="true" method="post" class='form-horizontal' style='padding-top:20px'>

    <div class="form-group">
        <label class="col-sm-2 control-label">MCH_ID <span class="nowrap">(商户ID)</span></label>
        <div class='col-sm-8'>
            <input type='tel' placeholder="请输入10位商户MCH_ID（必填）" title='请输入10位数字商户MCH_ID' required="required" pattern="^\d{10}$" maxlength='10' name='wechat_mch_id' value='<?php echo sysconf("wechat_mch_id"); ?>' class='layui-input'/>
            <p class="help-block">
                注意：商户ID必需与微信接口配置公众号APPID对应，否则无法使用支付功能！
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">PartnerKey <span class="nowrap">(商户密钥)</span></label>
        <div class='col-sm-8'>
            <input type='password' placeholder="请输入32位商户支付密钥（必填）" required title='请输入32位商户支付密钥' pattern="^.{32}$" maxlength="32" name='wechat_partnerkey' value='<?php echo sysconf("wechat_partnerkey"); ?>' class='layui-input'/>
            <p class="help-block">
                微信支付商户密钥需要在商户平台配置，必需填写密钥之后才能正常使用微信支付功能。
            </p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Apiclient <span class="nowrap">(双向证书)</span></label>
        <div class="col-sm-8">
            <div class="nowrap">
                <input title="apiclient_key.pem" type="hidden" name="wechat_cert_key_md5">
                <input title="apiclient_cert.pem" type="hidden" name="wechat_cert_cert_md5">
                <button data-file="one" data-type="pem" data-field="wechat_cert_key_md5" data-uptype="local" type="button" class="layui-btn layui-btn-primary">
                    <?php if(file_exists(sysconf('wechat_cert_key'))): ?>
                    已上传 apiclient_key.pem
                    <?php else: ?>
                    请上传 apiclient_key.pem
                    <?php endif; ?>
                </button>
                <button data-file="one" data-type="pem" data-field="wechat_cert_cert_md5" data-uptype="local" type="button" class="layui-btn layui-btn-primary">
                    <?php if(file_exists(sysconf('wechat_cert_cert'))): ?>
                    已上传 apiclient_cert.pem
                    <?php else: ?>
                    请上传 apiclient_cert.pem
                    <?php endif; ?>
                </button>
            </div>
            <p class="help-block">
                企业打款、企业红包、订单退款等操作需要使用双向证书，可在<a href="https://pay.weixin.qq.com" target="_blank">微信商户平台</a>下载证书！
            </p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2 text-center">
            <button type="submit" class="layui-btn">保存配置</button>
            <button type="button" data-pay-test class="layui-btn layui-btn-primary">支付测试</button>
        </div>
    </div>

</form>

    </div>
    
<script>
    $(function () {

        /*！ 证书上传动作 */
        $('[name="wechat_cert_key_md5"],[name="wechat_cert_cert_md5"]').on('change', function () {
            this.value = $(this).attr('data-md5');
            $('[data-field="' + this.name + '"]').html('已选择 ' + this.title);
        });

        var isShow = false;
        var timer = null;
        var layIndex = 0;
        /*! 支付测试动作 */
        function payTest() {
            $.form.load('<?php echo url("pay"); ?>?action=payqrc', {}, 'get', function (ret) {
                if (ret.code === 1 || ret.code === 2) {
                    if (ret.code === 2) {
                        ret.url = '__PUBLIC__/static/theme/default/img/wechat/qrc_payed.jpg';
                        timer && window.clearInterval(timer), timer = null;
                    }
                    if (isShow) {
                        $('.pay-qrc-test').attr('src', ret.url)
                    } else {
                        layer.open({
                            type: 1, title: false, closeBtn: 1, shadeClose: true,
                            content: '<img class="pay-qrc-test" src="' + ret.url + '"/>'
                                    + '<p style="text-align:center">请用微信扫码测试支付!</p>'
                                    + '<p class="refund-qrc-test"><a class="btn btn-xs btn-warning">退款测试</a></p>',
                            end: function () {
                                timer && window.clearInterval(timer), timer = null;
                                isShow = false;
                            },
                            success: function (layero, index) {
                                isShow = true;
                                layIndex = index;
                                timer = setInterval(payTest, 3000);
                            }});
                    }
                }
                return false;
            }, !isShow);
        }

        $('[data-pay-test]').on('click', payTest);

        /*! 发起退款操作 */
        $('body').on('click', '.refund-qrc-test a', function () {
            $.form.load('<?php echo url("pay"); ?>?action=refund', {}, 'get', function (ret) {
                if (ret.code === 1) {
                    timer && window.clearInterval(timer), timer = null;
                    return $.msg.success(ret.msg, 3, function () {
                        layer.close(layIndex);
                    }), false;
                }
            });
        });
    });

</script>

</div>