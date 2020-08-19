<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_news_add_col_photo extends CI_Migration {

    public function up()
    {
        $fields = array(
            'main_photo_path' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'unique' => TRUE,
            ),
            'side_photo_1_path' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'unique' => TRUE,
            ),
            'side_photo_2_path' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'unique' => TRUE,
            ),
            'side_photo_3_path' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'unique' => TRUE,
            ),
        );

        $this->dbforge->add_column('news', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('news', 'main_photo_path');
        $this->dbforge->drop_column('news', 'side_photo_1_path');
        $this->dbforge->drop_column('news', 'side_photo_2_path');
        $this->dbforge->drop_column('news', 'side_photo_3_path');
    }
}
