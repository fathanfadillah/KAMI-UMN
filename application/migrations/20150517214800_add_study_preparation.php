<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_study_preparation extends CI_Migration {

        public function up()
        {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'overseas_type' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '160',
                    ),
                    'type' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '160',
                    ),
                    'institute_name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '160',
                    ),
                    'subject_area' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '160',
                    ),
                    'last_update' => array(
                            'type' => 'DATE'
                    ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('study_preparation');
        }

        public function down()
        {
            $this->dbforge->drop_table('study_preparation');
        }
}
