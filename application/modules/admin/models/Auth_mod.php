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
    /* End of function */
}
