<?php

//error_reporting(0);
//require(APPPATH . '/libraries/stripe-php/init.php');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        if (!$this->session->userdata('is_logged_in')) {
            redirect('admin');
        }
        $this->load->model('admin/Users_model');
        $this->load->library('Ajax_pagination');
        $this->perPage = 100;
    }
    
    function changePassword() {
        $data['page_title'] = 'Change Password' . " | " . ADMIN_TITLE;

        if (isset($_POST) && !empty($_POST)) {
            $params = array(
                'password' => sha1($this->input->post('password'))
            );

            $this->Users_model->updateAdminUser($this->session->userdata('id'), $params);

            redirect('admin');
        }

        $data['main_content'] = 'admin/users/changePassword';
        $this->load->view('includes/template', $data);
    }

}
