<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_study_preparation_fkey_account_id extends CI_Migration {

        public function up()
        {
            $fields = array(
                    'account_id' => array(
                            'type' => 'INT',
                            'constraint' => 5,
                            'unsigned' => TRUE,
                    ),
            );
            $this->dbforge->add_column('study_preparation', $fields);
        }

        public function down()
        {
            $this->dbforge->drop_column('study_preparation', 'account_id');
        }
}
