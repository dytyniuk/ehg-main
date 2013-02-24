<?php

class m121109_123112_myCategoryModule extends CDbMigration
{
	public function up()
	{
		$this->createTable('Category', array(
            'id' => 'pk',

            'title_en'=>'string',
            'meta_description_en' => 'text',
            'short_description_en' => 'text',
            'description_en' => 'text',
            'meta_keywords_en'=>'string',
            'keywords_en'=>'string',
            'published_en' => 'boolean NOT NULL',

            'title_ru'=>'string',
            'meta_description_ru' => 'text',
            'short_description_ru' => 'text',
            'description_ru' => 'text',
            'meta_keywords_ru'=>'string',
            'keywords_ru'=>'string',
            'published_ru' => 'boolean NOT NULL',

            'title_uk'=>'string',
            'meta_description_uk' => 'text',
            'short_description_uk' => 'text',
            'description_uk' => 'text',
            'meta_keywords_uk'=>'string',
            'keywords_uk'=>'string',
            'published_uk' => 'boolean NOT NULL',
            
            'date_created' => 'datetime NOT NULL',
            'date_modified' => 'datetime NOT NULL',
            'author_id'=>'int',
            'special_tag' => 'string',
            'undeleted' => 'boolean NOT NULL',
            'parent_category_id'=>'int',
        ));

        $this->createTable('Material', array(
            'id' => 'pk',
            
            'title_en'=>'string',
            'meta_description_en' => 'text',
            'description_en' => 'text',
            'short_description_en' => 'text',
            'meta_keywords_en'=>'string',
            'keywords_en'=>'string',
            'published_en' => 'boolean NOT NULL',

            'title_ru'=>'string',
            'meta_description_ru' => 'text',
            'description_ru' => 'text',
            'short_description_ru' => 'text',
            'meta_keywords_ru'=>'string',
            'keywords_ru'=>'string',
            'published_ru' => 'boolean NOT NULL',

            'title_uk'=>'string',
            'meta_description_uk' => 'text',
            'description_uk' => 'text',
            'short_description_uk' => 'text',
            'meta_keywords_uk'=>'string',
            'keywords_uk'=>'string',
            'published_uk' => 'boolean NOT NULL',

            'date_created' => 'datetime NOT NULL',
            'date_modified' => 'datetime NOT NULL',
            'author_id'=>'int',

            'special_tag' => 'string',
            'undeleted' => 'boolean NOT NULL',
            
            'category_id'=>'int',
        ));
      
            $this->createTable('UserMaterial', array(
                  'id' => 'pk',
                  'material_id'=>'int',
                  'user_id'=>'int',
            ));

            $this->createTable('UserCategory', array(
                  'id' => 'pk',
                  'category_id'=>'int',
                  'user_id'=>'int',
            ));
	}

	public function down()
	{
		$this->dropTable('Category');
		$this->dropTable('Material');
            $this->dropTable('UserMaterial');
            $this->dropTable('UserCategory');
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