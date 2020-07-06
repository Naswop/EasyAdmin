<?php


namespace app\admin\controller\mall;


use app\admin\model\MallKinds;
use app\admin\traits\Curd;
use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * Class Kinds
 * @package app\admin\controller\system
 * @ControllerAnnotation(title="设备分类管理")
 */
class Kinds extends AdminController
{

    use Curd;

    public function __construct(App $app)
    {
        parent::__construct($app);
        $this->model = new MallKinds();
    }

}