<?php
namespace app\admin\controller;
use think\Controller;
class Admin extends Controller
{
   public function add()
   {	
   		if(request()->isPost()){
   			$data = input("post.");
   			$valiate = validate("AdminUser");
            if(!$valiate->check($data)){
                $this->error($valiate->getError());
            }
            $data['password'] = md5($data['password']."_strig");
            $data['status'] = 1;
            try{
              $id =  model("AdminUser")->add($data);
            }catch (\Exception $e){
                $this->error($e->getMessage());
            }
            if($id){
                $this->success("新增用户id:".$id);
            }else{
                $this->error("新增用户失败");
            }

   		}else{
   			return $this->fetch();
   		}
       
   }
}