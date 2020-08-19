<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_events extends CI_Migration {

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
                    'description' => array(
                            'type' => 'TEXT'
                    ),
                    'start_date' => array(
                            'type' => 'DATETIME',
                    ),
                    'end_date' => array(
                            'type' => 'DATETIME',
                    ),
                    'last_update' => array(
                            'type' => 'DATE'
                    ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('events');
        }

        public function down()
        {
            $this->dbforge->drop_table('events');
        }
}
