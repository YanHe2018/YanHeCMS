<?php
/**
 * Created by YanHe.
 * QQ : 853020189
 * Date: 2018/10/1 11:21
 * Description:
 */

namespace app\admin\widget;


use think\Controller;

class Widget extends Controller
{
    public function top(){
        $this->view->engine->layout(false);
        $this->assign('text','abcaejgda');
        return $this->fetch('widget/top');
    }
}