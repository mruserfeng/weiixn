<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
 		require_once APP_PATH.'common/WxpayAPI/lib/WxPay.Api.php';
 		$input = new \WxPayUnifiedOrder();
 		// 设置商品描述
 		$input->SetBody('测试商品');
 		// 设置订单号 ---这里使用的时间，其实是自己生成的
 		$input->SetOut_trade_no(date('YmdHis'));
 		// 设置订单金额（单位：分）
 		$input->SetTotal_fee('1');
 		// 设置异步通知地址
 		$input->SetNotify_url('http://www.php.wx/index.php/index/Notify/index');
 		// 设置交易类型
 		$input->SetTrade_type('NATIVE');
 		// 设置商品ID
 		$input->SetProduct_id('123456780');
 		// 调用统一下单API
 		$result = \WxPayAPI::unifiedOrder($input);
 		// 生成二维码图片，在这里因为我们自己调试的需要修改配置common/lib/WxPay.Api.php的严格效验true修改为false
 		$code_url = $result['code_url'];
 		$img = '<img src=http://paysdk.weixin.qq.com/example/qrcode.php?data='.urlencode($code_url).' />';
 		echo $img;
    }
}
