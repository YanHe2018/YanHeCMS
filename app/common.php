<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用公共文件
error_reporting(E_ERROR | E_WARNING | E_PARSE);//定义报错级别
/**
 * @param $code //传过来的验证码
 * @param string $id //标识符
 * @return bool
 */
function check_verify($code, $id = ''){
    $captcha = new \think\captcha\Captcha();
    return $captcha->check($code, $id);
}
/**
 * @param $str //要加密的字符串
 * @return string
 */
function get_md5_encrypt($str){ //全局加密函数
    return md5('www.yanhenet.com'.$str.'www.yanhenet.com');
}
/**
 * @param $str //加密的字符串
 * @return string
 */
function get_admin_md5_encrypt($str){ //后台字段加密
    return md5('http://www.yanhenet.com'.$str.'http://www.yanhenet.com');
}
/**
 * @param $mobile //传入的手机号
 * @return bool //返回布尔值 ,true是手机号,false非手机号
 */
function is_mobile($mobile) { //
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,1,3,6,7,8]{1}\d{8}$|^166[\d]{8}$|^19[8,9]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
}

/**
 * @param $banknumber //传入的银行卡号
 * @return string
 */
function get_bank_encrypt($banknumber){ //银行卡加*号遮盖
    if(empty($banknumber)){
        return '';
    }else{
        return substr($banknumber,0,6).'****'.substr($banknumber,-4);
    }
}

/**
 * @param $alipay //传入的支付宝账号 传入邮箱则遮盖邮箱, 传入手机号则遮盖手机号
 * @return string
 */
function get_alipay_encrypt($alipay){ //支付宝的加*号遮盖
    if(empty($alipay)){
        return '';
    }
    if(filter_var($alipay,FILTER_VALIDATE_EMAIL)){
        return  substr($alipay,0,3).'****'.strstr($alipay,'@');
    }else{
        return substr($alipay,0,3).'****'.substr($alipay,-4);
    }
}

/**
 * @param $listArr //传入分页数组
 *     protected 'currentPage' => int 2
protected 'lastPage' => int 67
protected 'total' => int 998
protected 'listRows' => int 15
 * @return string
 */
function get_page_list_info($listArr){
    $currentPage=$listArr['current_page'];//当前页
    $lastPage=$listArr['last_page'];//最后一页也就是总页数
    $total=$listArr['total'];//共有多少条
    $listRows=$listArr['per_page'];//每 页多少 条
    //共 14 条 当前第 1 页  共 1 页 25条/页
    if($listRows>0){
        return '<div class="info">共 <span class="span">'.$total.'</span> 条 当前第 <span class="currentspan">'.$currentPage.'</span> 页  共 <span class="span">'.$lastPage.'</span> 页 <span class="span">'.$listRows.'</span> 条/页 </div>';
    }else{
        return '';
    }
}