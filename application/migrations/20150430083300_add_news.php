<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_news extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'slug' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '160',
                                'unique' => TRUE,
                                'index' => TRUE
                        ),
                        'header' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'sub_header' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '160',
                                'null' => TRUE
                        ),
                        'content' => array(
                                'type' => 'TEXT'
                        ),
                        'footer' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'author' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE
                        ),
                        'last_update' => array(
                                'type' => 'DATE'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('news');
        }

        public function down()
        {
                $this->dbforge->drop_table('news');
        }
}
