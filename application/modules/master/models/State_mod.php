<?php

class State_mod extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    function count_data()
    {
        $requestData = $this->input->post(null, true);
        $this->db->select('*');
        return $query = $this->db->get('states');
    }

    function get_data($parent_id = "")
    {
        $requestData = $this->input->post(null, true);
        $columns = array(
            1 => 'wct.name',
            2 => 'wcntry.name',
            3 => 'wct.status'
        );

        $this->db->select('*');
        $this->db->from('states as wct');
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value'];
            $this->db->where("(wct.name LIKE '%$search_val%' OR wcntry.name LIKE '%$search_val%' OR wct.status  LIKE '%$search_val%')");
        }
        if (isset($_GET['status'])) {

            $this->db->where("wct.status =", $_GET["status"]);
        } 
        if (@$requestData['order'][0]['column'] && @$requestData['order'][0]['dir']) {
            $order = @$requestData['order'][0]['dir'];
            $column_name = $columns[@$requestData['order'][0]['column']];
            $this->db->order_by("$column_name", "$order");
        } else {
            $this->db->order_by("wct.id", "desc");
        }
        if (@$requestData['length'] && $requestData['length'] != '-1') {
            $this->db->limit($requestData['length'], $requestData['start']);
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->result();
        }
    }

    //  THIS FUNCTION DELETE city DATA
    function delete_city($id)
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


    /* End of function */
}
