<?php
//1定义命名空间与本文件所在目录层级相同
//2因为composer自动载入类的需要
namespace system\model;
//1引入Model类用于User类的继承
//2用于User类调用where方法经过Model类最终去Base类中查找相应的方法
use houdunwang\model\Model;
//1定义查询文章数据库的类
//2继承父类Model（最终去Base查找相应的方法）
class User extends Model {

}