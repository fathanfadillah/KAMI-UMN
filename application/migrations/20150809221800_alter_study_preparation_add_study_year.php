<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_study_preparation_add_study_year extends CI_Migration {

        public function up()
        {
            $fields = array(
                    'study_year' => array(
                            'type' => 'INT',
                            'constraint' => 4,
                            'unsigned' => TRUE,
                    ),
            );
            $this->dbforge->add_column('study_preparation', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('study_preparation', 'study_year');
        }
}
