<?php

use Phinx\Migration\AbstractMigration;

class InitialDb extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
     public function up()
    {

        $this->table('users')
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->save();
            
              $this->table('bookmarks')
             ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'null' => false,
            ])
             ->addColumn('url', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex('title', ['unique' => true])
            ->save();
            
            $this->table('bookmarks')
            ->addForeignKey('user_id', 'users', 'id')
            ->save();

            $this->table('tags')
            ->addColumn ('title','string',[
                'default'=>null,
                'limit'=>255,
                'null'=>false,
                ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex('title', ['unique' => true])
            ->save();

           

            $this->table('bookmarks_tags', ['id' => false, 'primary_key' => ['bookmark_id', 'tag_id']])
            ->addColumn('bookmark_id', 'integer')
            ->addColumn('tag_id', 'integer')
            ->addForeignKey('tag_id', 'tags', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('bookmark_id', 'bookmarks', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addIndex(['tag_id', 'bookmark_id'])
            ->save();  



    }

    public function down()
    {
        
       

        $this->dropTable('bookmarks_tags');
         
      
          $this->table('bookmarks_tags')           
            ->dropForeignKey('tag_id'); 
       
        $this->table('bookmarks_tags')           
            ->dropForeignKey('bookmark_id');

             $this->dropTable('bookmarks');
        $this->table('bookmarks')           
            ->dropForeignKey('users_id');
              $this->dropTable('users');
            $this->dropTable('tags');
             
        
    }
}
