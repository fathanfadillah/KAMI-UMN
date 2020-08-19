<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_pages_add_photo extends CI_Migration {

        public function up()
        {
                $fields = array(
                    'photo' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '80',
                        'unique' => FALSE
                    )
                );

                $this->dbforge->add_column('pages', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('pages', 'photo');
        }
}
