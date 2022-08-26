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
        $this->db->join('states acn','acn.id = '.$this->tableName.'.state_id','left');
        $this->db->limit(500);
        return $query = $this->db->get($this->tableName);
    }

    function get_data()
    {

        $this->db->select($this->tableName.'.id as city_id, '.$this->tableName.'.status as city_status, '.$this->tableName.'.name as city_name, acn.name as state_name');
        $this->db->join('states acn','acn.id = '.$this->tableName.'.state_id','left');
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
        $this->db->where('name ', $city_name);
        $query = $this->db->get($this->tableName);
        //  echo $this->db->last_query();
        return $query->num_rows();
        //die();
    }

    //  THIS FUNCTION EDIT city DATA
    function edit($id)
    {
        $postdata = array(

            'name'                      => $_POST['city_name'],
            'state_id'                  => $_POST['state'],
            'status'                    => $_POST['status'],
            'updated_date'                => date('Y-m-d H:i:s'),
            'user_id'                   => currentuserinfo()->id,
        );
        $this->db->where('id', $id);
        $this->db->update($this->tableName, $postdata);
        
    }

    //  THIS FUNCTION VIEW city DATA
    function view($id) {
        $this->db->select('*');
        $this->db->select($this->tableName.'.id as id, '.$this->tableName.'.status as status, '.$this->tableName.'.name as name, acn.name as state_name, acn.id as state_id');
        $this->db->join('states acn','acn.id = '.$this->tableName.'.state_id','left');
        $this->db->where($this->tableName.'.id', $id);
        return $query = $this->db->get($this->tableName)->row();
    }

    
    /* End of function */
}
