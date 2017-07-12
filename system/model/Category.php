<?php namespace system\model;
use houdunwang\model\Model;
use houdunwang\arr\Arr;

class Category extends Model{
	//数据表
	protected $table = "category";

	//允许填充字段
	protected $allowFill = ['*'];

	//禁止填充字段
	protected $denyFill = [ ];

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
		['catname','required','栏目名称不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
		['catname','maxlen:20','栏目名称不得超过20个字符',self::MUST_VALIDATE,self::MODEL_BOTH]
	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
	];

	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=true;

	/**
	 * 获取树状结果的栏目数据
	 * @return array
	 */
	public static function getTreeData(){
		$data = self::orderBy('orderby','ASC')->get();
		$data = $data ? Arr::tree( $data->toArray(), 'catname', 'cid', 'pid' ) : [];
		return $data;
	}

	/**
	 * 获取没有自己和自己的子栏目
	 */
	public static function getNoMine($cid){
		$data = self::getTreeData();
		foreach ($data as $k => $v){
//			$data[$k]['_selected'] =
			//如果是子栏目，那么也不可选
			if(Arr::isChild($data, $v['cid'], $cid)){
				$data[$k]['_disabled'] = 'disabled';
			}else{
				//自己不可选
				$data[$k]['_disabled'] = ($v['cid'] == $cid) ? 'disabled' : '';
			}


		}
		return $data;
	}















}