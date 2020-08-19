<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_work_resume extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'profile_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ),
            'company_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'business_area' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'department' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'phone_number' => array(
                'type' => 'CHAR',
                'constraint' => '13'
            ),
            'hire_date' => array(
                'type' => 'DATE',
            ),
            'yudisium_date' => array(
                'type' => 'DATE',
            ),
            'is_match_subject_area' => array(
                'type' => 'BOOLEAN',
            ),
            'first_salary_range' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
            ),
            'last_update' => array(
                'type' => 'DATE',
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('work_resume');
    }

    public function down()
    {
        $this->dbforge->drop_table('work_resume');
    }
}
