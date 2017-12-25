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
function getPage($obj)
{
    if(!$obj){
        return '';
    }
    $param = request()->param();
    return "<div class='imooc-app'>".$obj->appends($param)->render()."</div>";
}
function getCat($id)
{
    if($id){
       return config('cat.list')[$id];
    }
    return '';
}
function isYN($id)
{
    return !empty($id)?'是':'否';
}
function status($id, $status)
{
    $controller = request()->controller();
    $str = $status == 1?0:1;
    $url = url($controller.'/stutus',['id'=>$id, 'status'=>$str]);
    if($str == 1){
        return "<a title='修改状态' onclick='app_sta(this)' javascript:; url='".$url."'><span>待审</span></a>";
    }else{
        return "<a title='修改状态' onclick='app_sta(this)' javascript:; url='".$url."'><span>正常</span></a>";
    }
}
function show($code, $message, $data=[], $httpcode = 200)
{
    $result = [
        'code' => $code,
        'message' => $message,
        'data' => $data
    ];
    return json($result, $httpcode);
}