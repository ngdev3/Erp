<?php

class Auth_mod extends CI_Model
{

    var $user_table = "users";
    function __construct()
    {
        parent::__construct();
    }

    function login_authorize()
    {
        $email = $this->security->xss_clean($this->input->post('email', true));
        $password = $this->security->xss_clean($this->input->post('password', true));
        $this->db->where("u.email", $email);
        $query = $this->db->get("$this->user_table as u");
        if ($query->num_rows() > 0) {
            $password = md5($password);
            $row = $query->row();
            if ($password == $row->password) {
                $user_info = $row;
                unset($user_info->password);
                switch ($user_info->status) {
                    case 'Inactive':
                        $data['error_msg'] = "Your account has been inactive";
                        $data['status'] = 'error';
                        return $data;
                        break;
                    case 'Delete':
                        $data['error_msg'] = "Your account has been deleted ! Contact Admin";
                        $data['status'] = 'error';
                        return $data;
                        break;

                    default:
                        //------update last login date time------
                        $login_time = date("Y-m-d h:i:s");
                        $up['last_login'] = $login_time;
                        $this->db->where('id', $user_info->id);
                        $this->db->update($this->user_table, $up);
                        $data['status'] = 'success';
                        $data['result'] = $user_info;
                        return $data;
                        break;
                }
            }
        }
        $data['error_msg'] = "Invalid login credentials";
        $data['status'] = 'error';
        return $data;
    }

    /**
     * forget
     *
     * This function set password and send verification mail
     * 
     * @access	public
     * @return	mixed Array 
     */
    function forgot($token)
    {
        $this->form_validation->set_rules('email', "Email Id", 'trim|required|valid_email');
        $email  =   $this->input->post('email', true);
        if ($this->form_validation->run() === false) {
            $return['error_msg']    =   validation_errors();
            $return['valid']        =    false;
            return $return;
        }
        $this->db->where("email", $email);
        $this->db->where("status", 'Active');
        $result    = $this->db->get($this->user_table);
        if ($result->num_rows() > 0) {

            $userData       =    $result->row();
            if ($userData->user_type != 1 || $userData->user_type != 2) {
                $name           =    $userData->first_name . ' ' . $userData->last_name;
                //------------- secure encryption-------------------
                $updateData            =    array(
                    'password' => '',
                    'token'  =>  $token,
                    'token_valid' => date('Y-m-d')
                );
                $this->db->where('id', $userData->id);
                $this->db->update($this->user_table, $updateData);

                $return['valid']        =   true;
                $return['name']             =   $name;
                return $return;
            } else {
                $return['valid']        =    false;
                $return['name']         =   "Invalid credentials!";
                return $return;
            }
        } else {

            $return['valid']        =    false;
            return $return;
        }
    }

    public function tokenVerification($token, $email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('token', $token);
        $this->db->from('users');
        $query = $this->db->get();

        $date_diff = date_diff(date_create($query->row()->token_valid), date_create(date('Y-m-d')));
        $ValidAt    =   $date_diff->format("%a");

        if ($ValidAt <= 2) {
            if ($query->num_rows() == 1) {
                $return['uid']        =   $query->row()->id;
                $return['valid']        =   true;
                return $return;
            } else {
                $return['msg']        =  'Invalid Token';
                $return['valid']        =   false;
                return $return;
            }
        } else {
            $return['valid']        =   false;
            $return['msg']        =  'Link Expired';
            return $return;
        }
    }


    public function updatedpassword($uid)
    {
        $data   =   array(
            'password' => md5($_POST['new_password']),
            'token' =>  '',
            'token_valid' => '',
            'updated_date' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $uid); //which row want to upgrade  
        $this->db->update('users', $data);
        if ($this->db->affected_rows() > 0) {
            $return['valid']        =   true;
            return $return;
        } else {
            $return['valid']        =   false;
            return $return;
        }
    }


    /* End of function */
}
