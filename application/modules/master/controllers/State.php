<?php
defined('BASEPATH') or exit('No direct script access allowed');

class State extends CI_Controller
{

    var $UpperCaseModuleName = 'State';
    var $LowerCaseModuleName = 'state';
    var $DefaultRedirection = '/master/state';
    var $DefaultRedirectionWithHypan = 'master/state';




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
        $data['breadcum'] = array(Master_State => 'Dashboard', '' => Master_State_Name.' Listing');
        $data['title'] = WEBSITE_NAME . ' | '.Master_State_Name;
        $data['page_title'] = Master_State_Name.' Management';
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
            $this->form_validation->set_rules('add_name', Master_State_Name.' Name',  'trim|required|is_unique[states.name]');
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
                $title = '<b>' . ucfirst($_POST['add_name']) . '</b> ' . $this->UpperCaseModuleName . ' added';
                $action = $this->DefaultRedirectionWithHypan . '/view/' . ID_encode($this->db->insert_id());
                
                $data =  array(
                    "action" => $action,
                    "type" => "New",
                    "module_title"=>$_POST['add_name'],
                    "module_name"=>$this->UpperCaseModuleName,
                    "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                );
                notificationData($data,'added');
                set_flashdata('success', $flash_message);
                redirect('/master/state');
            }
        }
        $data['breadcum'] = array(Master_State => 'Dashboard', '' => 'Add '.Master_State_Name);
        $data['title'] = WEBSITE_NAME . ' | '.Master_State_Name;
        $data['page_title'] = 'Add '.Master_State_Name;
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
            $this->form_validation->set_rules('add_name', Master_State_Name.' Name',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() == FALSE) {
            } else {
                /*check name for pre existance*/
                $city_name        =   $this->input->post('add_name');
                $check_data         =   $this->state_mod->check_preexistance($state_id, $city_name);
                /*End of this*/
                if ($check_data) {
                    set_flashdata('error', Master_State_Name.' name already exist.');
                    redirect("/master/state/edit/$id");
                } else {
                    $this->state_mod->edit($state_id);
                    $action = $this->DefaultRedirectionWithHypan . '/view/' . $id;
                    $data =  array(
                        "action" => $action,
                        "type" => "",
                        "module_title"=>$_POST['add_name'],
                        "module_name"=>$this->UpperCaseModuleName,
                        "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                    );
                    notificationData($data,'Updated');
                    set_flashdata('success', Master_State_Name.' name updated successfully');
                    redirect('/master/state');
                }
            }
        }
        $data['result'] = $this->state_mod->view($state_id);
        $data['breadcum'] = array(Master_State => 'Dashboard', '' => 'Update '.Master_State_Name);
        $data['title'] = WEBSITE_NAME . ' | '.Master_State_Name;
        $data['page_title'] = 'Update '.Master_State_Name;
        $page = 'state/add';
        $data['page'] = $page;
        _layout($data);
    }


    /**
     * view function 
     */
    public function view($id = "", $click = null)
    {

        $state_id = ID_decode($id);
        if (!empty($state_id)) {
            if(!empty($click)){
                $data['is_seen'] = 1;
                $data['status'] = 'Inactive';
                $this->db->where('id', $click);
                $this->db->update('notification', $data);
            }
            $data['result'] = $this->state_mod->view(@$state_id);
            $data['breadcum'] = array(Master_State => 'Dashboard', '' => 'View '.Master_State_Name);
            $data['title'] = WEBSITE_NAME . ' | '.Master_State_Name;
            $data['page_title'] = 'View '.Master_State_Name;
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
                set_flashdata('success', Master_State_Name.' deleted successfully');
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
                set_flashdata('success', Master_State_Name.' Restored successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }

    /*End of Function*/
}
