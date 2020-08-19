<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_news_add_published_date extends CI_Migration {

    public function up()
    {
        $fields = array(
            'published_date' => array(
                'type' => 'DATE'
            ),
        );
        $this->dbforge->add_column('news', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('news', 'published_date');
    }
}
