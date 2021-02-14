<?php
/**
 * Created by YanHe.
 * QQ : 853020189
 * Date: 2018/9/30 21:25
 * Description:
 */

namespace app\home\controller;
use think\captcha\Captcha;
use think\Controller;

class Verify extends Controller
{
    public function index(){
        $config =    [
            'useImgBg' => false,
            // 使用背景图片
            'fontSize' => 14,
            // 验证码字体大小(px)
            'useCurve' => false,
            // 是否画混淆曲线
            'useNoise' => true,
            // 是否添加杂点
            'imageH'   => 44,
            // 验证码图片高度
            'imageW'   => 100,
            // 验证码图片宽度
            'length'   => 4,
            // 验证码位数
            'fontttf'  => '4.ttf',
            // 验证码字体，不设置随机获取
            'bg'       => [243, 251, 254],
            // 背景颜色
            'reset'    => true,
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }
}