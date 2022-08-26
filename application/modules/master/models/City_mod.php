<?php

class City_mod extends CI_Model
{

    var $tableName = 'city';
    function __construct()
    {
        parent::__construct();
    }

    //THIS FUNCTION ADD
    public function add($data)
    {
        if ($this->db->insert($this->tableName, $data)) {
            return true;
        }
    }

    function count_data()
    {
        $this->db->select('*');
        $this->db->limit(500);
        return $query = $this->db->get($this->tableName);
    }

    function get_data()
    {

        $this->db->select('*');
        $this->db->limit(500);
        $this->db->from($this->tableName);
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->result();
        }else{
            return false;
        }
    }

    //  THIS FUNCTION DELETE city DATA
    function deletedata($id)
    {
        $data['status'] = 'Delete';
        $this->db->where('id', $id);
        $this->db->update($this->tableName, $data);
        return true;
    }

    function restoreData($id)
    {
        $data['status'] = 'Active';
        $this->db->where('id', $id);
        $this->db->update($this->tableName, $data);
        return true;
    }

    /**
     * check_preexistance
     *
     * function for check either color name pre exist
     * 
     * @access	public
     * @return	html data
     */
    function check_preexistance($id, $city_name)
    {
        $this->db->select('*');
        $this->db->where('id !=', $id);
        $this->db->where('email ', $city_name);
        $query = $this->db->get($this->tableName);
        //  echo $this->db->last_query();
        return $query->num_rows();
        //die();
    }

    //  THIS FUNCTION EDIT city DATA
    function edit($id)
    {
        $postdata = array(

            'first_name'                => $_POST['first_name'],
            'first_name'                => $_POST['first_name'],
            'last_name'                 => $_POST['last_name'],
            'email'                     => $_POST['email'],
            'mobile_no'                 => $_POST['mobile_no'],
            'password'                  => md5($_POST['password']),
            'pan_number'                => $_POST['pan_number'],
            'aadhar_number'             => $_POST['aadhar_number'],
            'designation'               => $_POST['designation'],
            'address'                   => $_POST['address'],
            'group_id'                  => $_POST['group_id'],
            'user_type'                 => $_POST['user_type'],
            'status'                    => $_POST['status'],
            'updated_date'                => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $id);
        $this->db->update($this->tableName, $postdata);
        
    }

    //  THIS FUNCTION VIEW city DATA
    function view($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        return $query = $this->db->get($this->tableName)->row();
    }

    
    /* End of function */
}
