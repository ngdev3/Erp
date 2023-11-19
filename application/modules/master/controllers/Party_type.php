<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Party_type extends CI_Controller
{

    var $UpperCaseModuleName = 'Party Type';
    var $LowerCaseModuleName = 'party type';
    var $DefaultRedirection = '/master/party_type';
    var $DefaultRedirectionWithHypan = 'master/party_type';



    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('partytype_mod');
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
        $data['breadcum'] = array("admin/dashboard/" => 'Dashboard', '' => 'Party Type Listing');
        $data['title'] = WEBSITE_NAME . ' | Party Type';
        $data['page_title'] = 'Party Type Management';
        $page = 'party_type/listing';
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
         // pr($_POST);die;
            $this->form_validation->set_rules('party_type_name', 'Party Type Name',  'trim|required|is_unique[party_type.party_name]');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                $postdata = array(
                    'party_name'            => $_POST['party_type_name'],
                    'status'                => $_POST['status'],
                    'added_date'            => date('Y-m-d H:i:s'),
                    'user_id'               => currentuserinfo()->id,
                );
                $this->partytype_mod->add($postdata);
                $action = 'master/party_type/view/' . ID_encode($this->db->insert_id());
                $data =  array(
                    "action" => $action,
                    "type" => "New",
                    "module_title"=>$_POST['party_type_name'],
                    "module_name"=>$this->UpperCaseModuleName,
                    "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                );
                notificationData($data,'added');
                set_flashdata('success', $flash_message);

                redirect('/master/party_type');
            }
        }
        $data['breadcum'] = array("admin/dashboard/" => 'Dashboard', '' => 'Add Party Type');
        $data['title'] = WEBSITE_NAME . ' | Party Type';
        $data['page_title'] = 'Add Party Type';
        $data['gstslabs'] = getGST();
        $data['getUnitType'] = getUnitType();
        $page = 'party_type/add';
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
        $Item_id = ID_decode($id);
        if (isPostBack()) {
            $Item_id = ID_decode($id);
            $this->form_validation->set_rules('party_type_name', 'Party Type Name',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                /*check name for pre existance*/
                $city_name        =   $this->input->post('party_type_name');
                $check_data         =   $this->partytype_mod->check_preexistance($Item_id, $city_name);
                /*End of this*/
                if ($check_data) {
                    set_flashdata('error', 'Party Type name already exist.');
                    redirect("/master/party_type/edit/$id");
                } else {
                    $action = $this->DefaultRedirectionWithHypan . '/view/' . $id;
                   
                    $data =  array(
                        "action" => $action,
                        "type" => "",
                        "module_title"=>$_POST['party_type_name'],
                        "module_name"=>$this->UpperCaseModuleName,
                        "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                    );
                    notificationData($data,'Updated');
                    set_flashdata('success', Master_NameTaxSlab.' name updated successfully');

                    $this->partytype_mod->edit($Item_id);
                    set_flashdata('success', 'Party Type name updated successfully');
                    redirect('/master/party_type');
                }
            }
        }
        $data['result'] = $this->partytype_mod->view($Item_id);
        $data['breadcum'] = array("admin/dashboard/" => 'Dashboard', '' => 'Update Party Type');
        $data['title'] = WEBSITE_NAME . ' | Party Type';
        $data['page_title'] = 'Update Party Type';
        $page = 'party_type/add';
        $data['page'] = $page;
        _layout($data);
    }


    /**
     * view function 
     */
    public function view($id = "", $click = null)
    {

        $Item_id = ID_decode($id);
        if (!empty($Item_id)) {
            if (!empty($click)) {
                $data['is_seen'] = 1;
                $data['status'] = 'Inactive';
                $this->db->where('id', $click);
                $this->db->update('notification', $data);
            }
            $data['result'] = $this->partytype_mod->view(@$Item_id);
            $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'View Party Type');
            $data['title'] = WEBSITE_NAME . ' | Party Type';
            $data['page_title'] = 'View Party Type';
            $page = 'party_type/view';
            $data['page'] = $page;
            _layout($data);
        }
    }


    public function view_all()
    {
        $requestData    = 0; //$this->input->post(null, true);
        /*Counting warehouse data*/
        $query          =   $this->partytype_mod->count_data();
        $totalData      =   $query->num_rows();
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        $citydata = $this->partytype_mod->get_data();
        $data   =   array();
        if (!empty($citydata) && count($citydata) > 0) {
            $j = $requestData['start'];
            for ($i = 0; $i < count($citydata); $i++) {
                $j++;
                $row    =   (array)$citydata[$i];
                $nestedData     =   array();
                $nestedData[]   =   $j;
                $nestedData[]   =   '<a href="'.base_url('/master/party_type/view/').ID_encode($row["id"]).'">'.$row["party_name"].'</a>';
                $nestedData[]   =   $row["status"];
                $Item_id        =   $row['id'];
                $nestedData[]   =   $this->load->view("party_type/_action", array("row" => $row), true);
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
            if ($this->partytype_mod->deletedata($post)) {
                set_flashdata('success', 'Party Type deleted successfully');
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
            if ($this->partytype_mod->restoreData($post)) {
                set_flashdata('success', 'Party Type Restored successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }

    /*End of Function*/
}
