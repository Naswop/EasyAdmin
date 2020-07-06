<?php

// +----------------------------------------------------------------------
// | EasyAdmin
// +----------------------------------------------------------------------
// | PHP交流群: 763822524
// +----------------------------------------------------------------------
// | 开源协议  https://mit-license.org 
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zhongshaofa/EasyAdmin
// +----------------------------------------------------------------------

namespace app\admin\model;


use app\common\model\TimeModel;

class MallDevices extends TimeModel
{

    protected $table = "";

    protected $deleteTime = 'delete_time';

    public function kinds()
    {
        return $this->belongsTo('app\admin\model\MallKinds', 'kinds_id', 'id');
    }
    public function groups()
    {
        return $this->belongsTo('app\admin\model\MallAdmin', 'groups_id', 'id');
    }

}