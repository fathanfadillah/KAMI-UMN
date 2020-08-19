<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_profiles_add_col_photo_path extends CI_Migration {

    public function up()
    {
        $fields = array(
            'photo_path' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => TRUE,
            ),
        );

        $this->dbforge->add_column('profiles', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('profiles', 'photo_path');
    }
}
