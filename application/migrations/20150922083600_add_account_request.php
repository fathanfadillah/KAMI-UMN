<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_account_request extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'fname' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'lname' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'gender' => array(
                'type' => 'CHAR',
                'constraint' => '1'
            ),
            'faculty' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'subject_area' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'student_id' => array(
                'type' => 'CHAR',
                'constraint' => '11',
                'unique' => TRUE
            ),
            'year_enroll' => array(
                'type' => 'INT',
                'constraint' => '4',
                'unsigned' => TRUE
            ),
            'year_graduate' => array(
                'type' => 'INT',
                'contraint' => '4',
                'unsigned' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint' => '160'
            ),
            'city' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'state' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'phone_home' => array(
                'type' => 'CHAR',
                'constraint' => '13'
            ),
            'phone_mobile1' => array(
                'type' => 'CHAR',
                'constraint' => '13'
            ),
            'phone_mobile2' => array(
                'type' => 'CHAR',
                'constraint' => '13',
                'null' => TRUE
            ),
            'is_active' => array(
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => TRUE
            ),
            'last_update' => array(
                'type' => 'DATE'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('account_requests');
    }

    public function down()
    {
        $this->dbforge->drop_table('account_requests');
    }
}
