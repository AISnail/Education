<?php
namespace app\api\validate;

class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'IDS 必须是已逗号分隔的正整数'
    ];

    protected function checkIDs($values)
    {
        $values = explode(',', $values);
        if(empty($values)){
            return false;
        }
        foreach ($values as $id) {
            if(true !== $this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}