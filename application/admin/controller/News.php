<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;
class News extends Base
{

    public function index()
    {
        $data = input('param.');
        $query = http_build_query($data);
        $where = [];
        if(!empty($data['catid'])){
            $where['catid'] = $data['catid'];
        }
        if(!empty($data['start_time']) && !empty($data['end_time']) && $data['start_time'] < $data['end_time']){
            $where['create_time'] = [
                ['gt', strtotime($data['start_time'])], ['lt', strtotime($data['end_time'])]
            ];
        }
        if(!empty($data['title'])) {
            $where['title'] = [
                'like', '%' . $data['title'] . '%'
            ];
        }
        $cat = config('cat.list');
        $this->getPageSize($data);
        $resut = model('News') -> getNewsByContion($where, $this->from, $this->size);
        $count = model('News') -> getCount($where);
        $pageTotal = ceil($count/$this->size);
        return $this->fetch('', [
            'query' => $query,
            'pageTotal' => $pageTotal,
            'cat' => $cat,
            'data' => $resut,
            'curr' => $this->page,
            'start_time' => !empty($data['start_time'])?$data['start_time']:'',
            'end_time' => !empty($data['end_time'])?$data['end_time']:'',
            'title' => !empty($data['title'])?$data['title']:'',
            'catid' => !empty($data['catid'])?$data['catid']:'',
            ]);

    }
    public function add()
    {

        if(request()->isPost()){
            $data = input('post.');
            try{
               $id = model('News')->add($data);
            }catch (\Exception $e){
                return $this -> result('', 0, '新增失败');
            }
            if(!$id){
                return $this -> result('', 0, '新增失败');
            }

            return $this -> result(['url' => url('news/index')], 1, '新增成功');
        }
        return $this->fetch('', ['list' => config('cat.list')]);


    }

}