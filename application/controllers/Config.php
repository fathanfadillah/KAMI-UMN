<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

    public function language($language)
    {
        switch ($language)
        {
            case 'english': $this->session->language = 'english'; break;
            case 'indonesia': $this->session->language = 'indonesia'; break;
        }

        redirect(base_url());
    }
}
