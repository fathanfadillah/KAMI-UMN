<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_pages_add_col_slug extends CI_Migration {

        public function up()
        {
                $fields = array(
                    'slug' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '40',
                        'unique' => TRUE
                    )
                );

                $this->dbforge->add_column('pages', $fields);
        }

        public function down()
        {
                $this->dbforge->drop_column('pages', 'slug');
        }
}
