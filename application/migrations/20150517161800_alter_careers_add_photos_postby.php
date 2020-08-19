<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_careers_add_photos_postby extends CI_Migration {

    public function up()
    {
        $fields = array(
            'photo_1_path' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'unique' => TRUE,
                'null' => TRUE,
            ),
            'photo_2_path' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'unique' => TRUE,
                'null' => TRUE,
            ),
            'photo_3_path' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'unique' => TRUE,
                'null' => TRUE,
            ),
        );

        $this->dbforge->add_column('careers', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('careers', 'photo_1_path');
        $this->dbforge->drop_column('careers', 'photo_2_path');
        $this->dbforge->drop_column('careers', 'photo_3_path');
    }
}
