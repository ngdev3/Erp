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
                    if ($remember) //Set remember username and password in cookies 
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
                if ($rs_data['error_msg'] != '') {
                    $this->session->set_flashdata("error", $rs_data['error_msg']);
                }
            }
        }

        $data['title'] = WEBSITE_NAME . ' | Login';
        $data['page_title'] = 'User Login';
        $this->load->view('auth/login', $data);
    }

    public function forgot()
    {
        $token   =   $this->getToken(50);
        if ($this->session->userdata('isLogin') == 'yes') {
            redirect(base_url('admin/dashboard'));
        } else {
            if (isPostBack()) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                if ($this->form_validation->run()) {
                    $arr        =   $this->input->post(null, true);
                    $email      =   $this->input->post('email', true);
                    $rs_data    =   $this->Auth_mod->forgot($token);

                    if ($rs_data['valid']) {
                        $email_data['to']           =   $email;
                        $email_data['from']         =   ADMIN_EMAIL;
                        $email_data['sender_name']  =  WEBSITE_NAME;
                        $email_data['subject']      =     "Password Reset";
                        $email_data['message']      =   'Hello <strong style="font-weight: bolder;font-size: 14px;">' . ucfirst($rs_data['name']) . ', </strong>
                                                     <br/><br><a href="' . base_url() . 'admin/auth/verifyToken/' . $token . "/" . email_encoded($email) . '"> Your Password Reset Link Click me to Reset the Password</a>.<br><br>Regards,<br/> ' . WEBSITE_NAME;

                        echo _sendMailPhpMailer($email_data);
                        die;
                        set_flashdata('success', 'Your Reset password link has been send to your Email Address.');
                        redirect(base_url() . 'admin/auth/login');
                    } else {
                        set_flashdata('error', 'Please enter correct Email Address.');
                        redirect(base_url() . 'admin/auth/forgot');
                    }
                }
            }

            $data['title'] = WEBSITE_NAME . ' | Forgot';
            $data['page_title'] = 'User Forgot';
            $this->load->view('auth/forgot', $data);
        }
    }

    /**
     *Forget
     *
     * This function send password to user mail in case forget
     * 
     * @access	public
     * @return	html data
     */
    function getToken($length)
    {
        $token = "";
        $codeAlphabet = "KJDASKFJSGLENWELFGYUZDKVAJFVGKUOQIWTEYWEBFSDNVMNMXCSIUFYKSDBFJSGHDFSFBJH";
        $codeAlphabet .= "abcdefghijklmnopqrstujfytfr8t98876gkjhgfuz";
        $codeAlphabet .= "441321165887954321452100215231";
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[rand(0, $max - 1)];
        }

        return $token;
    }

    /**
     * logout
     *
     * This function to logout user
     * 
     * @access	public
     * @return	html data
     */
    public function logout()
    {
        $this->session->sess_destroy();
        set_flashdata('success', 'Logout successfully !!!');
        redirect(base_url());
    }

    /*End of Function*/
}
