<?php

class account_mod extends CI_Model
{

    var $tableName = 'center';
    function __construct()
    {
        parent::__construct();
    }

    //THIS FUNCTION ADD
    public function add($data)
    {
        if ($this->db->insert("account", $data)) {
            return true;
        }
    }

    function count_data()
    {
        $this->db->select('*');
        return $query = $this->db->get('account');
    }

    function get_data()
    {

        $this->db->select('center.*, fy.financial_year as financial_year');
        $this->db->join('financial_year fy','fy.id = '.$this->tableName.'.financial_year_id','left');
        $this->db->from('center');
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
        $this->db->update('account', $data);
        return true;
    }

    function restoreData($id)
    {
        $data['status'] = 'Active';
        $this->db->where('id', $id);
        $this->db->update('account', $data);
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
        $this->db->where('center_id !=', $id);
        $this->db->where('center_name ', $city_name);
        $query = $this->db->get('center');
        //  echo $this->db->last_query();
        return $query->num_rows();
        //die();
    }

    //  THIS FUNCTION EDIT city DATA
    function edit($id)
    {
       
        $postdata = array(
            'center_id'                                => $id,
            'center_name'                       => $_POST['center_name'],
            'incharge_name'                     => $_POST['incharge_name'],
            'incharge_mobile_no'                => $_POST['incharge_mobile_no'],
            'incharge_location'                 => $_POST['incharge_location'],
            'target'                            => $_POST['target'],
            'financial_year_id'                 => $_POST['financial_year_id'],
            'crop_type_id'                      => $_POST['crop_type_id'],
            'status'                            => $_POST['status'],
            'added_date'                => date('Y-m-d H:i:s'),
            'user_id'                   => currentuserinfo()->id,
        );


        $this->db->where('center_id', $id);
        $this->db->update('center', $postdata);
    }

    //  THIS FUNCTION VIEW city DATA
    function view($id) {
        $this->db->select('center.*, fy.financial_year as financial_year, p_type.crop_name');
        $this->db->join('financial_year fy','fy.id = '.$this->tableName.'.financial_year_id','left');
        $this->db->join('crop p_type','p_type.id = '.$this->tableName.'.crop_type_id','left');
        $this->db->where('center_id', $id);
        return $query = $this->db->get("center")->row();
    }

    
    /* End of function */
}
