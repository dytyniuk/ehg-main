<?php

class m121110_121732_photoAlbum extends CDbMigration
{
	public function up()
	{
		$this->createTable('Albums', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'description' => 'text',
            'date_created' => 'datetime',
            'path_on_hdd' =>'string',
            'special_tag' =>'string',
            'url' =>'string',
            'main_photo_id' => 'int',
            'author_id' => 'int',
            'entity_id' => 'int',
            'table_name' => 'string',

        ));

        $this->createTable('Photos', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'description' => 'text',
            'date_created' => 'datetime',
            'path_hdd_o' =>'string',
            'path_hdd_s' =>'string',
            'path_hdd_b' =>'string',
            'special_tag' =>'string',
            'x1' => 'int',
            'x2' => 'int',
            'y1' => 'int',
            'y2' => 'int',
            'width' => 'int',
            'height' => 'int',
            'url_o' =>'string',
            'url_s' =>'string',
            'url_b' =>'string',
            'alt' =>'string',
            'album_id' => 'int',
            'author_id' => 'int',
           
        ));
	}

	public function down()
	{
		$this->dropTable('Albums');
		$this->dropTable('Photos');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}