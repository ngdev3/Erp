<?php
defined('BASEPATH') or exit('No direct script access allowed');

class State extends CI_Controller
{


    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('state_mod');
    }

    /* End of constructor */

    /**
     *index
     *
     * This function dispaly Data Management
     * 
     * @access	public
     * @return	html data
     */
    public function index()

    {
        $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'State Listing');
        $data['title'] = WEBSITE_NAME . ' | State';
        $data['page_title'] = 'State Management';
        $page = 'state/listing';
        $data['page'] = $page;
        _layout($data);
    }

    /**
     * Add
     *
     * function add new data
     * 
     * @access	public
     * @return	html data
     */
    public function add()
    {
        if (isPostBack()) {
            $this->form_validation->set_rules('add_name', 'State Name',  'trim|required|is_unique[states.name]');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                $postdata = array(
                    'name'              => $_POST['add_name'],
                    'status'            => $_POST['status'],
                    'country_id'        => 101,
                    'added_date'        => date('Y-m-d H:i:s'),
                    'user_id'           => currentuserinfo()->id,
                );
                $this->state_mod->add($postdata);
                set_flashdata('success', 'New State added successfully');
                redirect('/master/state');
            }
        }
        $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'Add State');
        $data['title'] = WEBSITE_NAME . ' | State';
        $data['page_title'] = 'Add State';
        $page = 'state/add';
        $data['page'] = $page;
        _layout($data);
    }

    /**
     * Edit
     *
     * this function update city
     * 
     * @access	public
     * @return	html data
     */
    public function edit($id = "")
    {
        // pr($_POST);die;
        $state_id = ID_decode($id);
        if (isPostBack()) {
            $state_id = ID_decode($id);
            $this->form_validation->set_rules('add_name', 'State Name',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() == FALSE) {
            } else {
                /*check name for pre existance*/
                $city_name        =   $this->input->post('add_name');
                $check_data         =   $this->state_mod->check_preexistance($state_id, $city_name);
                /*End of this*/
                if ($check_data) {
                    set_flashdata('error', 'State name already exist.');
                    redirect("/master/state/edit/$id");
                } else {
                    $this->state_mod->edit($state_id);
                    set_flashdata('success', 'State name updated successfully');
                    redirect('/master/state');
                }
            }
        }
        $data['result'] = $this->state_mod->view($state_id);
        $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'Update State');
        $data['title'] = WEBSITE_NAME . ' | State';
        $data['page_title'] = 'Update State';
        $page = 'state/add';
        $data['page'] = $page;
        _layout($data);
    }


    /**
     * view function 
     */
    public function view($id = "")
    {
        $state_id = ID_decode($id);
        if (!empty($state_id)) {
            $data['result'] = $this->state_mod->view(@$state_id);
            $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'View State');
            $data['title'] = WEBSITE_NAME . ' | State';
            $data['page_title'] = 'View State';
            $page = 'state/view';
            $data['page'] = $page;
            _layout($data);
        }
    }


    public function view_all()
    {
        $requestData    = 0; //$this->input->post(null, true);
        /*Counting warehouse data*/
        $query          =   $this->state_mod->count_data();
        $totalData      =   $query->num_rows();
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        $citydata = $this->state_mod->get_data();
        $data   =   array();
        if (!empty($citydata) && count($citydata) > 0) {
            $j = $requestData['start'];
            for ($i = 0; $i < count($citydata); $i++) {
                $j++;
                $row    =   (array)$citydata[$i];
                $nestedData     =   array();
                $nestedData[]   =   $j;
                $nestedData[]   =   $row["name"];
                $nestedData[]   =   $row["status"];
                $state_id        =   $row['id'];
                $nestedData[]   =   $this->load->view("state/_action", array("row" => $row), true);
                $data[]         =   $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval($totalData),  // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
        );

        echo json_encode($json_data);  // send data as json format
    }

    /**
     * deletecategories
     *
     * this function delete Data
     * 
     * @access	public
     * @return	html data
     */
    public function deletedata()
    {
        $post = $this->input->post('id');
        if (!empty($post)) {
            if ($this->state_mod->deletedata($post)) {
                set_flashdata('success', 'State deleted successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }
    /**
     * Restore categories
     *
     * this function Restore Data
     * 
     * @access	public
     * @return	html data
     */
    public function restoreData()
    {
        $post = $this->input->post('id');
        if (!empty($post)) {
            if ($this->state_mod->restoreData($post)) {
                set_flashdata('success', 'State Restored successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }

    /*End of Function*/
}
