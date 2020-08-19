<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_pages extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'header' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE
                        ),
                        'content' => array(
                                'type' => 'TEXT'
                        ),
                        'footer' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100'
                        ),
                        'last_update' => array(
                                'type' => 'DATE'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('pages');
        }

        public function down()
        {
                $this->dbforge->drop_table('pages');
        }
}
