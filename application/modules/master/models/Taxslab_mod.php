<?php

class Taxslab_mod extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    //THIS FUNCTION ADD
    public function add($data)
    {
        if ($this->db->insert("states", $data)) {
            return true;
        }
    }

    function count_data()
    {
        $this->db->select('*');
        return $query = $this->db->get('states');
    }

    function get_data()
    {

        $this->db->select('*');
        $this->db->from('states');
        $this->db->where('status!=', "Delete");
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
        $this->db->update('states', $data);
        return true;
    }

    function restoreData($id)
    {
        $data['status'] = 'Active';
        $this->db->where('id', $id);
        $this->db->update('states', $data);
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
        $this->db->where('name ', $city_name);
        $query = $this->db->get('states');
        //  echo $this->db->last_query();
        return $query->num_rows();
        //die();
    }

    //  THIS FUNCTION EDIT city DATA
    function edit($id)
    {
        $data['id'] = $id;
        $data['name'] = $this->input->post('add_name');
        $data['status'] = $this->input->post('status');
        $data['updated_date'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('states', $data);
    }

    //  THIS FUNCTION VIEW city DATA
    function view($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        return $query = $this->db->get("states")->row();
    }

    
    /* End of function */
}
