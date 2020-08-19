<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_account extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'fname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'lname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE
                        ),
                        'is_active' => array(
                                'type' => 'INT',
                                'constraint' => 1,
                                'unsigned' => TRUE
                        ),
                        'access_level' => array(
                                'type' => 'INT',
                                'constraint' => 1,
                                'unsigned' => TRUE
                        ),
                        'hash' => array(
                                'type' => 'CHAR',
                                'constraint' => '160'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('accounts');
        }

        public function down()
        {
                $this->dbforge->drop_table('accounts');
        }
}
