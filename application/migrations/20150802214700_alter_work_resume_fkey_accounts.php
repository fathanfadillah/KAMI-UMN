<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_alter_work_resume_fkey_accounts extends CI_Migration {

    public function up()
    {
        $fields = array(
            'account_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE
            ),
        );

        $this->dbforge->add_column('work_resume', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('work_resume', 'account_id');
    }
}
