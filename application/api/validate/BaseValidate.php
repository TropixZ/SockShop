<?php
namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
	public function goCheck(){
	    //获取传递过来的参数
	    $request=Request::instance();
        $params=$request->param();

        $result=$this->batch()->check($params);

        if(!$result){
            $e=new ParameterException([
                'msg'=>$this->error,
            ]);

            throw $e;
        }else{
            return true;
        }
    }

    protected function isPositiveInteger($value,$rule='',$data='',$field=''){
        if(is_numeric($value)&&is_int($value+0)&& ($value+0)>0){
            return true;
        }else{
            return false;
        }
    }

}