<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City extends CI_Controller
{

    var $UpperCaseModuleName = 'City';
    var $LowerCaseModuleName = 'city';
    var $DefaultRedirection = '/master/city';
    var $DefaultRedirectionWithHypan = 'master/city';

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('city_mod');
        $this->load->model('state_mod');
    }

    /* End of constructor */

    public function index()
    {
        $this->listing();
    }

    /**
     *index
     *
     * This function dispaly Data Management
     * 
     * @access	public
     * @return	html data
     */
    public function listing()

    {
        $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => $this->UpperCaseModuleName . ' Listing');
        $data['title'] = WEBSITE_NAME . ' | ' . $this->UpperCaseModuleName;
        $data['page_title'] = $this->UpperCaseModuleName . ' Management';
        $data['DefaultRedirectionWithHypan'] = $this->DefaultRedirectionWithHypan;
        $page = $this->LowerCaseModuleName . '/listing';
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

            $this->form_validation->set_rules('city_name', 'City Name',  'trim|required|is_unique[city.name]');
            $this->form_validation->set_rules('state', 'State Name',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                $postdata = array(

                    'name'                      => $_POST['city_name'],
                    'state_id'                  => $_POST['state'],
                    'status'                    => $_POST['status'],
                    'added_date'                => date('Y-m-d H:i:s'),
                    'user_id'                   => currentuserinfo()->id,
                );
                $this->city_mod->add($postdata);
                $title = '<b>' . ucfirst($_POST['city_name']) . '</b> ' . $this->UpperCaseModuleName . ' added';
                $action = $this->DefaultRedirectionWithHypan . '/view/' . ID_encode($this->db->insert_id());
                $data =  array(
                    "action" => $action,
                    "type" => "New",
                    "module_title"=>$_POST['city_name'],
                    "module_name"=>$this->UpperCaseModuleName,
                    "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                );
                notificationData($data);

                set_flashdata('success', $flash_message);
                redirect($this->DefaultRedirection);
            }
        }
        $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'Add ' . $this->UpperCaseModuleName);
        $data['title'] = WEBSITE_NAME . ' | ' . $this->UpperCaseModuleName;
        $data['page_title'] = 'Add ' . $this->UpperCaseModuleName;
        $data['state_list'] = $this->state_mod->get_data();
        $page = $this->LowerCaseModuleName . '/add';
        $data['page'] = $page;
        _layout($data);
    }

    public function sendEmail($email, $rs_data, $type)
    {
        if ($type == 2) {
            $email_data['to']           =   $email;
            $email_data['from']         =   ADMIN_EMAIL;
            $email_data['sender_name']  =  WEBSITE_NAME;
            $email_data['subject']      =     "Account Updated !!! Hurray";
            $email_data['message']      =   'Hello <strong style="font-weight: bolder;font-size: 14px;">' . ucfirst($rs_data['first_name'] . ' ' . $rs_data['last_name']) . ', </strong>
                                                         <br/><br><a href="' . base_url() . '"> Log In </a> ,  Your Account is Updated Successfully, New Password For Your Account is: ' . $_POST['password'] . '.<br><br>Regards,<br/> ' . WEBSITE_NAME;
            echo _sendMailPhpMailer($email_data);
            return;
        }
        $email_data['to']           =   $email;
        $email_data['from']         =   ADMIN_EMAIL;
        $email_data['sender_name']  =  WEBSITE_NAME;
        $email_data['subject']      =     "Account Created !!! Hurray";
        $email_data['message']      =   'Hello <strong style="font-weight: bolder;font-size: 14px;">' . ucfirst($rs_data['first_name'] . ' ' . $rs_data['last_name']) . ', </strong>
                                                     <br/><br><a href="' . base_url() . '"> Log In </a> ,  Your Account is Activated Successfully, Password For Your Account is: ' . $_POST['password'] . '.<br><br>Regards,<br/> ' . WEBSITE_NAME;
        echo _sendMailPhpMailer($email_data);
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
            $this->form_validation->set_rules('city_name', 'City Name',  'trim|required');
            $this->form_validation->set_rules('state', 'State Name',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {

                $city_name        =   $this->input->post('city_name');
                $check_data         =   $this->city_mod->check_preexistance($state_id, $city_name);
                /*End of this*/
                if ($check_data) {
                    set_flashdata('error', $this->UpperCaseModuleName . ' name already exist.');
                    redirect($this->DefaultRedirection . "/edit/$id");
                } else {
                   
                    $this->city_mod->edit($state_id);
                    set_flashdata('success', $this->UpperCaseModuleName . ' name updated successfully');
                    redirect($this->DefaultRedirection);
                }
            }
        }
        $data['result'] = $this->city_mod->view($state_id);
        $data['state_list'] = $this->state_mod->get_data();
        $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'Update ' . $this->UpperCaseModuleName);
        $data['title'] = WEBSITE_NAME . ' | ' . $this->UpperCaseModuleName;
        $data['page_title'] = 'Update ' . $this->UpperCaseModuleName;
        $page = $this->LowerCaseModuleName . '/add';
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
            if (!empty($click)) {
                $data['is_seen'] = 1;
                $data['status'] = 'Inactive';
                $this->db->where('id', $click);
                $this->db->update('notification', $data);
            }
            $data['result'] = $this->city_mod->view(@$state_id);
            $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'View ' . $this->UpperCaseModuleName);
            $data['title'] = WEBSITE_NAME . ' | ' . $this->UpperCaseModuleName;
            $data['page_title'] = 'View ' . $this->UpperCaseModuleName;
            $page = $this->LowerCaseModuleName . '/view';
            $data['page'] = $page;
            _layout($data);
        }
    }


    public function view_all()
    {
        $requestData    = 0; //$this->input->post(null, true);
        /*Counting warehouse data*/
        $query          =   $this->city_mod->count_data();
        $totalData      =   $query->num_rows();
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        $citydata = $this->city_mod->get_data();
        // pr($citydata); die;
        $data   =   array();
        if (!empty($citydata) && count($citydata) > 0) {
            $j = $requestData['start'];
            for ($i = 0; $i < count($citydata); $i++) {
                $j++;
                $row    =   (array)$citydata[$i];
                $nestedData     =   array();
                $nestedData[]   =   $j;
                $nestedData[]   =   $row["city_name"];
                $nestedData[]   =   $row['state_name'];
                $nestedData[]   =   $row["city_status"];
                $nestedData[]   =   $this->load->view($this->LowerCaseModuleName . "/_action", array("row" => $row, 'DefaultRedirectionWithHypan' => $this->DefaultRedirectionWithHypan), true);
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
            if ($this->city_mod->deletedata($post)) {
                set_flashdata('success', $this->UpperCaseModuleName . ' deleted successfully');
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
            if ($this->city_mod->restoreData($post)) {
                set_flashdata('success', $this->UpperCaseModuleName . ' Restored successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }

    /*End of Function*/
}
