<?php

class Partytype_mod extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    //THIS FUNCTION ADD
    public function add($data)
    {
        if ($this->db->insert("party_type", $data)) {
            return true;
        }
    }

    function count_data()
    {
        $this->db->select('*');
        return $query = $this->db->get('party_type');
    }

    function get_data()
    {

        $this->db->select('*');
        $this->db->from('party_type');
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    //  THIS FUNCTION DELETE city DATA
    function deletedata($id)
    {
        $data['status'] = 'Delete';
        $this->db->where('id', $id);
        $this->db->update('party_type', $data);
        return true;
    }

    function restoreData($id)
    {
        $data['status'] = 'Active';
        $this->db->where('id', $id);
        $this->db->update('party_type', $data);
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
        $this->db->where('party_name ', $city_name);
        $query = $this->db->get('party_type');
        return $query->num_rows();
    }

    //  THIS FUNCTION EDIT city DATA
    function edit($id)
    {
        $postdata = array(
            'party_name'       => $_POST['party_type_name'],
            'status'                => $_POST['status'],
            'updated_date'          => date('Y-m-d H:i:s'),
            'user_id'               => currentuserinfo()->id,
        );
        $this->db->where('id', $id);
        $this->db->update('party_type', $postdata);
    }

    //  THIS FUNCTION VIEW city DATA
    function view($id)
    {
        $this->db->select('*');
        $this->db->where('party_type.id', $id);
        $this->db->from('party_type');

        return $this->db->get()->row();
    }


    /* End of function */
}
