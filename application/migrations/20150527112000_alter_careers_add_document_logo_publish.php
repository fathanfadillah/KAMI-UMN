<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_careers_add_document_logo_publish extends CI_Migration {

    public function up()
    {
        $fields = array(
            'document' => array(
                'type' => 'VARCHAR',
                'constraint' => '160',
                'null' => TRUE,
            ),
            'company_logo' => array(
                'type' => 'VARCHAR',
                'constraint' => '160',
                'null' => TRUE,
            ),
            'publish' => array(
                'type' => 'BOOLEAN',
                'default' => TRUE,
            ),
        );

        $this->dbforge->add_column('careers', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('careers', 'document');
        $this->dbforge->drop_column('careers', 'company_logo');
        $this->dbforge->drop_column('careers', 'publish');
    }
}
