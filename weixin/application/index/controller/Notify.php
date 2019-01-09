<?php
namespace app\index\controller;

class Notify
{
    public function index()
    {
    	require_once APP_PATH.'common/WxpayAPI/lib/WxPay.Api.php';
    	$msg = '';
    	\WxPayApi::notify(function($result){
    		// 签名校验通过
    		// 查询订单号，如果不存在，return;
    		// 如果订单已存在，且订单已经被处理过，return;
    		// 如果订单没有被处理，处理订单

    	},$msg);
    }
}