<?php

class m121030_222844_initialMyUsersModuleMigration extends CDbMigration
{
	public function up()
	{
		$this->createTable('User', array(
            'id' => 'pk',
            'login' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'username' => 'string NOT NULL',
            'passwd' => 'string NOT NULL',
            'unique_number' => 'string NOT NULL',
            'verification_code' => 'string NOT NULL',
            'enabled' => 'boolean NOT NULL',
            'role' => 'string NOT NULL',
            'date_created' => 'datetime NOT NULL',
            'date_modified' => 'datetime NOT NULL',
            'country'=> 'string',
            'city'=> 'string',
        ));
	}

	public function down()
	{
		$this->dropTable('User');
	}
	
}

