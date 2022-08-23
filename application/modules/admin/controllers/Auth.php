<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    /**
     *  Admin Controller
     *
     * @package		Admin
     * @category    Admin
     * @author		Dharmendra Pal
     * @website		http://www.thealternativeaccount.com
     * @company     thealternativeaccount Inc
     * @since		Version 1.0
     */

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_mod');
    }

    /* End of constructor */

    /**
     *index
     *
     * This function dispaly login page
     * 
     * @access	public
     * @return	html data
     */
    public function index()

    {
        redirect(base_url() . 'auth/login');
    }

    public function login()
    {
        if (isPostBack()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required');
            if ($this->form_validation->run()) {
                $remember   =   $this->input->post('remember', true);
                $email      =   $this->input->post('email', true);
                $password   =   $this->input->post('password', true);
                $rs_data    =   $this->Auth_mod->login_authorize();
                if ($rs_data['status'] == "success") {
                    $this->session->set_userdata("userinfo", $rs_data['result']);
                    $this->session->set_userdata("isLogin", 'yes');
                    $this->session->set_userdata("user_type", $rs_data['result']->user_type);

                    $email_enc   =   custom_encryption($email, 'ak!@#s$on!', 'encrypt');
                    $password_enc   =   custom_encryption($password, 'ak!@#s$on!', 'encrypt');
                    if ($remember) // set remember username and password in cookie 
                    {
                        setcookie('fs_email', $email_enc, time() + (86400 * 30), "/");
                        setcookie('fs_password', $password_enc, time() + (86400 * 30), "/");
                        setcookie('fs_remember', $remember, time() + (86400 * 30), "/");
                    } else {
                        setcookie('fs_email', '', time() + (86400 * 30), "/");
                        setcookie('fs_password', '', time() + (86400 * 30), "/");
                        setcookie('fs_remember', $remember, time() + (86400 * 30), "/");
                    }
                    redirect(base_url('admin/dashboard'), 'refresh');
                }
            }
        }
        $data['title'] = WEBSITE_NAME . ' | Login';
        $data['page_title'] = 'User Login';
        $this->load->view('auth/login', $data);
    }
    /*End of Function*/
}
