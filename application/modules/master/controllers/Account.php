<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{

    var $UpperCaseModuleName = 'Account';
    var $LowerCaseModuleName = 'account';
    var $DefaultRedirection = '/master/account';
    var $DefaultRedirectionWithHypan = 'master/account';




    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('account_mod');
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
        $data['breadcum'] = array(Master_Account  => 'Dashboard', '' => Master_NameAccount.' Listing');
        $data['title'] = WEBSITE_NAME . ' | '.Master_NameAccount;
        $data['page_title'] = Master_NameAccount.' Management';
        $page = 'account/listing';
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
            $this->form_validation->set_rules('account_name', Master_NameAccount.' Name',  'trim|required');
            $this->form_validation->set_rules('igst', ' IGST',  'trim|required');
            $this->form_validation->set_rules('cgst', ' CGST',  'trim|required');
            $this->form_validation->set_rules('sgst', ' SGST',  'trim|required');
            $this->form_validation->set_rules('cess', ' CESS',  'trim|required');
            $this->form_validation->set_rules('calculated_tax_on_mrp', ' Calculated Tax On MRP',  'trim|required');
            $this->form_validation->set_rules('zero_tax_type', ' Zero Tax Type',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                $postdata = array(
                    'account_name'             => $_POST['account_name'],
                    'igst'                      => $_POST['igst'],
                    'cgst'                      => $_POST['cgst'],
                    'sgst'                      => $_POST['sgst'],
                    'cess'                      => $_POST['cess'],
                    'calculated_tax_on_mrp'     => $_POST['calculated_tax_on_mrp'],
                    'zero_tax_type'             => $_POST['zero_tax_type'],
                    'status'                    => $_POST['status'],
                    'added_date'                => date('Y-m-d H:i:s'),
                    'user_id'                   => currentuserinfo()->id,
                );
                $this->account_mod->add($postdata);
                $title = '<b>' . ucfirst($_POST['account_name']) . '</b> ' . $this->UpperCaseModuleName . ' added';
                $action = $this->DefaultRedirectionWithHypan . '/view/' . ID_encode($this->db->insert_id());
                
                $data =  array(
                    "action" => $action,
                    "type" => "New",
                    "module_title"=>$_POST['account_name'],
                    "module_name"=>$this->UpperCaseModuleName,
                    "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                );
                notificationData($data,'added');
                set_flashdata('success', $flash_message);
                redirect('/master/account');
            }
        }
        $data['breadcum'] = array(Master_Account  => 'Dashboard', '' => 'Add '.Master_NameAccount);
        $data['title'] = WEBSITE_NAME . ' | '.Master_NameAccount;
        $data['page_title'] = 'Add '.Master_NameAccount;
        $page = 'account/add';
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
            $this->form_validation->set_rules('account_name', Master_NameAccount.' Name',  'trim|required');
            $this->form_validation->set_rules('igst', ' IGST',  'trim|required');
            $this->form_validation->set_rules('cgst', ' CGST',  'trim|required');
            $this->form_validation->set_rules('sgst', ' SGST',  'trim|required');
            $this->form_validation->set_rules('cess', ' CESS',  'trim|required');
            $this->form_validation->set_rules('calculated_tax_on_mrp', ' Calculated Tax On MRP',  'trim|required');
            $this->form_validation->set_rules('zero_tax_type', ' Zero Tax Type',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() == FALSE) {
            } else {
                /*check name for pre existance*/
                $city_name        =   $this->input->post('account_name');
                $check_data         =   $this->account_mod->check_preexistance($state_id, $city_name);
                /*End of this*/
                if ($check_data) {
                    set_flashdata('error', Master_NameAccount.' name already exist.');
                    redirect("/master/account/edit/$id");
                } else {
                    $this->account_mod->edit($state_id);
                    $action = $this->DefaultRedirectionWithHypan . '/view/' . $id;
                    $postdata = array(
                        'account_name'             => $_POST['account_name'],
                        'igst'                      => $_POST['igst'],
                        'cgst'                      => $_POST['cgst'],
                        'sgst'                      => $_POST['sgst'],
                        'cess'                      => $_POST['cess'],
                        'calculated_tax_on_mrp'     => $_POST['calculated_tax_on_mrp'],
                        'zero_tax_type'             => $_POST['zero_tax_type'],
                        'status'                    => $_POST['status'],
                        'added_date'                => date('Y-m-d H:i:s'),
                        'user_id'                   => currentuserinfo()->id,
                    );
                    $data =  array(
                        "action" => $action,
                        "type" => "",
                        "module_title"=>$_POST['account_name'],
                        "module_name"=>$this->UpperCaseModuleName,
                        "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                    );
                    notificationData($data,'Updated');
                    set_flashdata('success', Master_NameAccount.' name updated successfully');
                    redirect('/master/account');
                }
            }
        }
        $data['result'] = $this->account_mod->view($state_id);
        $data['breadcum'] = array(Master_Account  => 'Dashboard', '' => 'Update '.Master_NameAccount);
        $data['title'] = WEBSITE_NAME . ' | '.Master_NameAccount;
        $data['page_title'] = 'Update '.Master_NameAccount;
        $page = 'account/add';
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
            $data['result'] = $this->account_mod->view(@$state_id);
            $data['breadcum'] = array(Master_Account  => 'Dashboard','master/account' => 'Tax Slab Listing', '' => 'View '.Master_NameAccount);
            $data['title'] = WEBSITE_NAME . ' | '.Master_NameAccount;
            $data['page_title'] = 'View '.Master_NameAccount;
            $page = 'account/view';
            $data['page'] = $page;
            _layout($data);
        }
    }


    public function view_all()
    {
        $requestData    = 0; //$this->input->post(null, true);
        /*Counting warehouse data*/
        $query          =   $this->account_mod->count_data();
        $totalData      =   $query->num_rows();
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        $citydata = $this->account_mod->get_data();
        $data   =   array();
        if (!empty($citydata) && count($citydata) > 0) {
            $j = $requestData['start'];
            for ($i = 0; $i < count($citydata); $i++) {
                $j++;
                $row    =   (array)$citydata[$i];
                $nestedData     =   array();
                $nestedData[]   =   $j;
                $nestedData[]   =   $row["account_name"];
                $nestedData[]   =   $row["igst"];
                $nestedData[]   =   $row["cgst"];
                $nestedData[]   =   $row["sgst"];
                $nestedData[]   =   $row["cess"];
                $nestedData[]   =   $row["calculated_tax_on_mrp"];
                $nestedData[]   =   $row["zero_tax_type"];
                $nestedData[]   =   $row["status"];
                $state_id        =   $row['id'];
                $nestedData[]   =   $this->load->view("account/_action", array("row" => $row), true);
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
            if ($this->account_mod->deletedata($post)) {
               
                $data =  array(
                    "action" => 'master/account',
                    "type" => "",
                    "module_title"=>$_POST['account_name'],
                    "module_name"=>$this->UpperCaseModuleName,
                    "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                );
                notificationData($data,'Updated');
                set_flashdata('success', Master_NameAccount.' deleted successfully');
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
            if ($this->account_mod->restoreData($post)) {
                set_flashdata('success', Master_NameAccount.' Restored successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }

    public function updateGstHit(){
        $resp  = getGSTAPIKey();
        echo json_encode($resp);

    }

    /*End of Function*/
}
