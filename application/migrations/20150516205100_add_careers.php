<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_careers extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'index' => TRUE,
            ),
            'post_by' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
            ),
            'header' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'company_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'description' => array(
                'type' => 'TEXT'
            ),
            'for_teknik_informatika' => array(
                'type' => 'BOOLEAN',
            ),
            'for_sistem_informasi' => array(
                'type' => 'BOOLEAN',
            ),
            'for_sistem_komputer' => array(
                'type' => 'BOOLEAN',
            ),
            'for_manajemen' => array(
                'type' => 'BOOLEAN',
            ),
            'for_akuntansi' => array(
                'type' => 'BOOLEAN',
            ),
            'for_ilmu_komunikasi' => array(
                'type' => 'BOOLEAN',
            ),
            'for_desain_komunikasi_visual' => array(
                'type' => 'BOOLEAN',
            ),
            'last_update' => array(
                'type' => 'DATE'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('careers');
    }

    public function down()
    {
        $this->dbforge->drop_table('careers');
    }
}
