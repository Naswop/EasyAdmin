<?php


namespace app\admin\controller\mall;


use app\admin\model\MallDevices;
use app\admin\traits\Curd;
use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;

/**
 * Class Devices
 * @package app\admin\controller\mall
 * @ControllerAnnotation(title="设备管理")
 */
class Devices extends AdminController
{

    use Curd;

    protected $relationSerach = true;

    public function __construct(App $app)
    {
        parent::__construct($app);
        $this->model = new MallDevices();
    }

    /**
     * @NodeAnotation(title="列表")
     */
    public function index()
    {
        if ($this->request->isAjax()) {
            if (input('selectFieds')) {
                return $this->selectList();
            }
            list($page, $limit, $where) = $this->buildTableParames();
            $groups_id = session('admin.groups_id');
            $count = $this->model
                ->withJoin('kind', 'LEFT')
                ->where($where)
                ->where('groups_id', $groups_id)
                ->count();
            $list = $this->model
                ->withJoin('kind', 'LEFT')
                ->where($where)
                ->where('groups_id', $groups_id)
                ->page($page, $limit)
                ->order($this->sort)
                ->select();
            $data = [
                'code'  => 0,
                'msg'   => '',
                'count' => $count,
                'data'  => $list,
            ];
            return json($data);
        }
        return $this->fetch();
    }
}
