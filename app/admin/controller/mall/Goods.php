<?php


namespace app\admin\controller\mall;


use app\admin\model\MallGoods;
use app\admin\traits\Curd;
use app\common\controller\AdminController;
use EasyAdmin\annotation\ControllerAnnotation;
use EasyAdmin\annotation\NodeAnotation;
use think\App;
use think\console\output\descriptor\Console;

/**
 * Class Goods
 * @package app\admin\controller\mall
 * @ControllerAnnotation(title="商城商品管理")
 */
class Goods extends AdminController
{

    use Curd;

    protected $relationSerach = true;

    public function __construct(App $app)
    {
        parent::__construct($app);
        $this->model = new MallGoods();
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
            //管理员班组
            if ($groups_id == 0) {
                $count = $this->model
                    ->withJoin('cate', 'LEFT')
                    ->where($where)
                    ->count();
                $list = $this->model
                    ->withJoin('cate', 'LEFT')
                    ->where($where)
                    ->page($page, $limit)
                    ->order($this->sort)
                    ->select();
            }
            $count = $this->model
                ->withJoin('cate', 'LEFT')
                ->where($where)
                ->where('groups_id', $groups_id)
                ->count();
            $list = $this->model
                ->withJoin('cate', 'LEFT')
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
