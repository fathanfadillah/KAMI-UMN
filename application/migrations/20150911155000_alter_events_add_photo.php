<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_events_add_photo extends CI_Migration {

        public function up()
        {
            $fields = array(
                    'photo' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '80',
                            'unsigned' => TRUE,
                    ),
            );
            $this->dbforge->add_column('events', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('events', 'photo');
        }
}
