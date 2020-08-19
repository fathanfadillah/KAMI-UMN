<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_careers_add_short_description_publication extends CI_Migration {

        public function up()
        {
                $fields = array(
                    'short_description' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '120',
                        'unique' => FALSE
                    ),
                    'published' => array(
                        'type' => 'INT',
                        'constraint' => 1,
                        'default' => 0
                    )
                );

                $this->dbforge->add_column('careers', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('careers', 'photo');
        }
}
