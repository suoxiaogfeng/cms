<?php namespace system\database\migrations;
use houdunwang\database\build\Migration;
use houdunwang\database\build\Blueprint;
use houdunwang\database\Schema;
class CreateSlideTable extends Migration {
    //执行
	public function up() {
		Schema::create( 'slide', function ( Blueprint $table ) {
			$table->increments( 'id' );
//			title,url,displayorder,thumb
			$table->string( 'title' )->comment('幻灯片标题');
			$table->string( 'url' );
			$table->string( 'thumb' );
			$table->smallint( 'displayorder' );
            $table->timestamps();
        });
    }

    //回滚
    public function down() {
        Schema::drop( 'slide' );
    }
}