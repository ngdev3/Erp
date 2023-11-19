<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Center extends CI_Controller
{

    var $UpperCaseModuleName = 'Center';
    var $LowerCaseModuleName = 'center';
    var $DefaultRedirection = '/master/center';
    var $DefaultRedirectionWithHypan = 'master/center';




    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('center_mod');
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
        $data['breadcum'] = array(Master_CenterLink  => 'Dashboard', '' => Master_NameCenter.' Listing');
        $data['title'] = WEBSITE_NAME . ' | '.Master_NameCenter;
        $data['page_title'] = Master_NameCenter.' Management';
        $page = 'center/listing';
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
        // pr($_POST);die;
        if (isPostBack()) {
            $this->form_validation->set_rules('center_name', Master_NameCenter.' Name',  'trim|required');
            $this->form_validation->set_rules('incharge_name', ' Incharge Name',  'trim|required');
            $this->form_validation->set_rules('incharge_mobile_no', ' Incharge Mobile Number',  'trim|required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('incharge_location', 'Incharge Center Location',  'trim|required');
            $this->form_validation->set_rules('target', 'Center Target',  'trim|required');
            $this->form_validation->set_rules('financial_year_id', ' Financial Year',  'trim|required');
            $this->form_validation->set_rules('crop_type_id', ' Crop Type',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                $postdata = array(
                    'center_name'                       => $_POST['center_name'],
                    'incharge_name'                     => $_POST['incharge_name'],
                    'incharge_mobile_no'                => $_POST['incharge_mobile_no'],
                    'incharge_location'                 => $_POST['incharge_location'],
                    'target'                            => $_POST['target'],
                    'financial_year_id'                 => $_POST['financial_year_id'],
                    'crop_type_id'                      => $_POST['crop_type_id'],
                    'status'                            => $_POST['status'],
                    'added_date'                        => date('Y-m-d H:i:s'),
                    'user_id'                           => currentuserinfo()->id,
                );
                $this->center_mod->add($postdata);
                $title = '<b>' . ucfirst($_POST['center_name']) . '</b> ' . $this->UpperCaseModuleName . ' added';
                $action = $this->DefaultRedirectionWithHypan . '/view/' . ID_encode($this->db->insert_id());
                
                $data =  array(
                    "action" => $action,
                    "type" => "New",
                    "module_title"=>$_POST['center_name'],
                    "module_name"=>$this->UpperCaseModuleName,
                    "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                );
                notificationData($data,'added');
                set_flashdata('success', $flash_message);
                redirect('/master/center');
            }
        }
        $data['breadcum'] = array(Master_CenterLink  => 'Dashboard', '' => 'Add '.Master_NameCenter);
        $data['gstFY'] = getFY();
        $data['getCrop'] = getCrop();
        $data['title'] = WEBSITE_NAME . ' | '.Master_NameCenter;
        $data['page_title'] = 'Add '.Master_NameCenter;
        $page = 'center/add';
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
        $state_id = ID_decode($id);
       // pr($_POST);die;
        if (isPostBack()) {
            $this->form_validation->set_rules('center_name', Master_NameCenter.' Name',  'trim|required');
            $this->form_validation->set_rules('incharge_name', ' Incharge Name',  'trim|required');
            $this->form_validation->set_rules('incharge_mobile_no', ' Incharge Mobile Number',  'trim|required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('incharge_location', 'Incharge Center Location',  'trim|required');
            $this->form_validation->set_rules('target', 'Center Target',  'trim|required');
            $this->form_validation->set_rules('financial_year_id', ' Financial Year',  'trim|required');
            $this->form_validation->set_rules('crop_type_id', ' Crop Type',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                /*check name for pre existance*/
                $city_name        =   $this->input->post('center_name');
                $check_data         =   $this->center_mod->check_preexistance($state_id, $city_name);
                /*End of this*/
                if ($check_data) {
                    set_flashdata('error', Master_NameCenter.' name already exist.');
                    redirect("/master/center/edit/$id");
                } else {
                    $this->center_mod->edit($state_id);
                    $action = $this->DefaultRedirectionWithHypan . '/view/' . $id;
                    $postdata = array(
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
                    $data =  array(
                        "action" => $action,
                        "type" => "",
                        "module_title"=>$_POST['center_name'],
                        "module_name"=>$this->UpperCaseModuleName,
                        "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                    );
                    notificationData($data,'Updated');
                    set_flashdata('success', Master_NameCenter.' name updated successfully');
                    redirect('/master/center');
                }
            }
        }
        $data['result'] = $this->center_mod->view($state_id);
        $data['breadcum'] = array(Master_CenterLink  => 'Dashboard', '' => 'Update '.Master_NameCenter);
        $data['title'] = WEBSITE_NAME . ' | '.Master_NameCenter;
        $data['page_title'] = 'Update '.Master_NameCenter;
        $data['gstFY'] = getFY();
        $data['getCrop'] = getCrop();
        $page = 'center/add';
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
            $data['result'] = $this->center_mod->view(@$state_id);
            $data['breadcum'] = array(Master_CenterLink  => 'Dashboard','master/center' => 'Center Listing', '' => 'View '.Master_NameCenter);
            $data['title'] = WEBSITE_NAME . ' | '.Master_NameCenter;
            $data['page_title'] = 'View '.Master_NameCenter;
            $page = 'center/view';
            $data['page'] = $page;
            _layout($data);
        }
    }


    public function view_all()
    {
        $requestData    = 0; //$this->input->post(null, true);
        /*Counting warehouse data*/
        $query          =   $this->center_mod->count_data();
        $totalData      =   $query->num_rows();
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        $citydata = $this->center_mod->get_data();
        $data   =   array();
        if (!empty($citydata) && count($citydata) > 0) {
            $j = $requestData['start'];
            for ($i = 0; $i < count($citydata); $i++) {
                $j++;
                $row    =   (array)$citydata[$i];
                $nestedData     =   array();
                $nestedData[]   =   $j;
                $nestedData[]   =   '<a href="'.base_url('/master/center/view/').ID_encode($row["center_id"]).'">'.$row["center_name"].'</a>';
                $nestedData[]   =   $row["target"];
                $nestedData[]   =   $row["financial_year"];
                $nestedData[]   =   $row["status"];
                $state_id        =   $row['center_id'];
                $nestedData[]   =   $this->load->view("center/_action", array("row" => $row), true);
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
            if ($this->center_mod->deletedata($post)) {
               
                $data =  array(
                    "action" => 'master/center',
                    "type" => "",
                    "module_title"=>$_POST['center_name'],
                    "module_name"=>$this->UpperCaseModuleName,
                    "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                );
                notificationData($data,'Updated');
                set_flashdata('success', Master_NameCenter.' deleted successfully');
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
            if ($this->center_mod->restoreData($post)) {
                set_flashdata('success', Master_NameCenter.' Restored successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }

    /*End of Function*/
}
