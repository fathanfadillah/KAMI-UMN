<?php
//20150526082200
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_testimony extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'content' => array(
                            'type' => 'TEXT',
                            'constraint' => '160',
                    ),
                    'last_update' => array(
                            'type' => 'DATE'
                    ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('testimony');
        }

        public function down()
        {
            $this->dbforge->drop_table('testimony');
        }
}
