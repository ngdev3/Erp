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

        if (isset($_GET['status'])) {
            $this->db->where("status =", $_GET["status"]);
        } else {
            $this->db->where("status !=", 'Delete');
        }

        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value'];
            $this->db->where("(name  LIKE '%$search_val%' OR  status  LIKE '%$search_val%')");
        }
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
        } else {
            $this->db->where("wct.status !=", 'Delete');
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
        //echo $this->db->last_query(); die;
        if ($query->num_rows()) {
            return $query->result();
        } else {
            //return false;
        }
    }

    /* End of function */
}
