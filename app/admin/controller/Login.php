<?php
/**
 * Created by YanHe.
 * QQ : 853020189
 * Date: 2018/9/30 20:42
 * Description:
 */

namespace app\admin\controller;
use think\Controller;
class Login extends Controller
{
    public function index(){
        if($this->request->isPost()){

        }else{
            $this->view->engine->layout(false);
            return $this->fetch();
        }
    }
}