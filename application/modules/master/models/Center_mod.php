<?php

class Center_mod extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    //THIS FUNCTION ADD
    public function add($data)
    {
        if ($this->db->insert("center", $data)) {
            return true;
        }
    }

    function count_data()
    {
        $this->db->select('*');
        return $query = $this->db->get('center');
    }

    function get_data()
    {

        $this->db->select('*');
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
        $this->db->update('center', $data);
        return true;
    }

    function restoreData($id)
    {
        $data['status'] = 'Active';
        $this->db->where('id', $id);
        $this->db->update('center', $data);
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
            'id'             => $id,
            'center_name'             => $_POST['center_name'],
            'igst'                      => $_POST['igst'],
            'cgst'                      => $_POST['cgst'],
            'sgst'                      => $_POST['sgst'],
            'cess'                      => $_POST['cess'],
            'calculated_tax_on_mrp'     => $_POST['calculated_tax_on_mrp'],
            'zero_tax_type'             => $_POST['zero_tax_type'],
            'status'                    => $_POST['status'],
            'updated_date'                => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $id);
        $this->db->update('center', $postdata);
    }

    //  THIS FUNCTION VIEW city DATA
    function view($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        return $query = $this->db->get("center")->row();
    }

    
    /* End of function */
}
