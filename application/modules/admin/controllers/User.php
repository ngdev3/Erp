<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    var $UpperCaseModuleName = 'User';
    var $LowerCaseModuleName = 'user';
    var $DefaultRedirection = '/admin/user';
    var $DefaultRedirectionWithHypan = 'admin/user';

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_mod');
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
            // pr($_POST);
            // die;
            $this->form_validation->set_rules('first_name', 'First Name',  'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name',  'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile Number',  'trim|required');
            $this->form_validation->set_rules('password', 'Password',  'trim|required');
            $this->form_validation->set_rules('pan_number', 'Pan Number',  'trim|required');
            $this->form_validation->set_rules('aadhar_number', 'Aadhar Card number',  'trim|required');
            $this->form_validation->set_rules('designation', 'Designation',  'trim|required');
            $this->form_validation->set_rules('address', 'Address',  'trim|required');
            $this->form_validation->set_rules('group_id', 'group_id',  'trim|required');
            $this->form_validation->set_rules('user_type', 'user_type',  'trim|required');
            $this->form_validation->set_rules('email', 'Email Id',  'trim|required|is_unique[users.email]');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                $postdata = array(

                    'first_name'                => $_POST['first_name'],
                    'last_name'                 => $_POST['last_name'],
                    'email'                     => $_POST['email'],
                    'mobile_no'                 => $_POST['mobile_no'],
                    'password'                  => md5($_POST['password']),
                    'pan_number'                => $_POST['pan_number'],
                    'aadhar_number'             => $_POST['aadhar_number'],
                    'designation'               => $_POST['designation'],
                    'address'                   => $_POST['address'],
                    'group_id'                  => $_POST['group_id'],
                    'user_type'                 => $_POST['user_type'],
                    'status'                    => $_POST['status'],
                    'added_date'                => date('Y-m-d H:i:s'),
                );
                $this->user_mod->add($postdata);
                $flash_message = 'New ' . $this->UpperCaseModuleName . ' added';
                $title = '<b>' . ucfirst($_POST['first_name']) . '</b> ' . $this->UpperCaseModuleName . ' added';
                $action = $this->DefaultRedirectionWithHypan . '/view/' . ID_encode($this->db->insert_id());
                $data =  array(
                    "title" => $title,
                    "action" => $action,
                    "flash_message" => $flash_message
                );
                $this->sendEmail($_POST['email'], $postdata);
                notificationData($data);
                set_flashdata('success', $flash_message);
                redirect($this->DefaultRedirection);
            }
        }
        $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'Add ' . $this->UpperCaseModuleName);
        $data['title'] = WEBSITE_NAME . ' | ' . $this->UpperCaseModuleName;
        $data['page_title'] = 'Add ' . $this->UpperCaseModuleName;
        $page = $this->LowerCaseModuleName . '/add';
        $data['page'] = $page;
        _layout($data);
    }

    public function sendEmail($email, $rs_data)
    {
        $email_data['to']           =   $email;
        $email_data['from']         =   ADMIN_EMAIL;
        $email_data['sender_name']  =  WEBSITE_NAME;
        $email_data['subject']      =     "Account Created !!! Hurray";
        $email_data['message']      =   'Hello <strong style="font-weight: bolder;font-size: 14px;">' . ucfirst($rs_data['first_name'] . ' ' . $rs_data['last_name']) . ', </strong>
                                                     <br/><br><a href="' . base_url() . '"> Log In </a> Your Account is Activated Successfully, Password For Your Account is: ' . $_POST['password'] . '.<br><br>Regards,<br/> ' . WEBSITE_NAME;
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
            $state_id = ID_decode($id);
            $this->form_validation->set_rules('add_name', 'State Name',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');

            if ($this->form_validation->run() == FALSE) {
            } else {
                /*check name for pre existance*/
                $city_name        =   $this->input->post('add_name');
                $check_data         =   $this->user_mod->check_preexistance($state_id, $city_name);
                /*End of this*/
                if ($check_data) {
                    set_flashdata('error', $this->UpperCaseModuleName . ' name already exist.');
                    redirect($this->DefaultRedirection . "/edit/$id");
                } else {
                    $this->user_mod->edit($state_id);
                    set_flashdata('success', $this->UpperCaseModuleName . ' name updated successfully');
                    redirect($this->DefaultRedirection);
                }
            }
        }
        $data['result'] = $this->user_mod->view($state_id);
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
            $data['result'] = $this->user_mod->view(@$state_id);
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
        $query          =   $this->user_mod->count_data();
        $totalData      =   $query->num_rows();
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        $citydata = $this->user_mod->get_data();
        $data   =   array();
        if (!empty($citydata) && count($citydata) > 0) {
            $j = $requestData['start'];
            for ($i = 0; $i < count($citydata); $i++) {
                $j++;
                $row    =   (array)$citydata[$i];
                $nestedData     =   array();
                $nestedData[]   =   $j;
                $nestedData[]   =   $row["first_name"] . ' ' . $row["last_name"];
                $nestedData[]   =   $row["email"];
                $nestedData[]   =   $row["mobile_no"];
                $nestedData[]   =   $row["designation"];
                $nestedData[]   =   $row["status"];
                $state_id        =   $row['id'];
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
            if ($this->user_mod->deletedata($post)) {
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
            if ($this->user_mod->restoreData($post)) {
                set_flashdata('success', $this->UpperCaseModuleName . ' Restored successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }

    /*End of Function*/
}
