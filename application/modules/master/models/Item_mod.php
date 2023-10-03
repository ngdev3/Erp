<?php

class Item_mod extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    //THIS FUNCTION ADD
    public function add($data)
    {
        if ($this->db->insert("item", $data)) {
            return true;
        }
    }

    function count_data()
    {
        $this->db->select('*');
        return $query = $this->db->get('item');
    }

    function get_data()
    {

        $this->db->select('item.*, gsts.tax_slab_name, gsts.id as tax_slab_id, utype.unit_name as unit_name');
        $this->db->join("gstslab as gsts", 'item.gst_slab_id = gsts.id', 'left');
        $this->db->join("unit_type as utype", 'item.unit_id = utype.id', 'left');
        $this->db->from('item');
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
        $this->db->update('item', $data);
        return true;
    }

    function restoreData($id)
    {
        $data['status'] = 'Active';
        $this->db->where('id', $id);
        $this->db->update('item', $data);
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
        $this->db->where('item_name ', $city_name);
        $query = $this->db->get('item');
        //  echo $this->db->last_query();
        return $query->num_rows();
        //die();
    }

    //  THIS FUNCTION EDIT city DATA
    function edit($id)
    {
        $postdata = array(
            'item_name'              => $_POST['item_name'],
            'hsn_code'               => $_POST['hsn_code'],
            'gst_slab_id'           => $_POST['gst_slab_id'],
            'unit_id'               => $_POST['unit_id'],
            'bharti'                => $_POST['bharti'],
            'short_name'            => $_POST['short_name'],
            'status'                => $_POST['status'],
            'updated_date'            => date('Y-m-d H:i:s'),
            'user_id'               => currentuserinfo()->id,
        );
        $this->db->where('id', $id);
        $this->db->update('item', $postdata);
    }

    //  THIS FUNCTION VIEW city DATA
    function view($id)
    {
        $this->db->select('item.*, item.id as i_id, gsts.tax_slab_name, gsts.id as tax_slab_id');
        $this->db->join("gstslab as gsts", 'item.gst_slab_id = gsts.id', 'left');
        $this->db->where('item.id', $id);
        $this->db->from('item');

        return $this->db->get()->row();
    }


    /* End of function */
}
