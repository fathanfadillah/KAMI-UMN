<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_careers_add_col_end_date extends CI_Migration {

    public function up()
    {
        $fields = array(
            'end_date' => array(
                'type' => 'DATETIME',
            ),
            'main_photo' => array(
                'type' => 'VARCHAR',
                'constraint' => '160',
                'null' => TRUE,
            ),
            'side_photo' => array(
                'type' => 'VARCHAR',
                'constraint' => '160',
                'null' => TRUE,
            ),
        );

        $this->dbforge->add_column('careers', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('careers', 'end_date');
        $this->dbforge->drop_column('careers', 'main_photo');
        $this->dbforge->drop_column('careers', 'side_photo');
    }
}
