<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreateArticleTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'article', function ( Blueprint $table ) {
			$table->increments( 'aid' );
			$table->char( 'title' )->comment('文章标题');
			$table->mediumint( 'click' )->comment('查看次数')->defaults(0);
			$table->string( 'description' )->comment('文章描述');
			$table->text( 'content' )->comment('文章内容');
			$table->string( 'source' )->comment('文章来源');
			$table->string( 'author' )->comment('文章作者');
			$table->smallint( 'orderby' )->comment('排序')->defaults(100);
			$table->string( 'linkurl' )->comment('跳转地址');
			$table->string( 'keywords' )->comment('关键字');
			$table->tinyInteger( 'iscommend' )->comment('是否推荐')->defaults(0);
			$table->tinyInteger( 'ishot' )->comment('是否热门')->defaults(0);
			$table->string( 'thumb' )->comment('缩略图');
			$table->tinyInteger( 'isrecycle' )->comment('是否在回收站')->defaults(0);
			$table->integer( 'category_cid' )->comment('所属栏目id');
            $table->timestamps();
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'article' );
    }
}