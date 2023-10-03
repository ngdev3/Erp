<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

    var $UpperCaseModuleName = 'Item';
    var $LowerCaseModuleName = 'item';
    var $DefaultRedirection = '/master/item';
    var $DefaultRedirectionWithHypan = 'master/item';



    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('item_mod');
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
        $data['breadcum'] = array("admin/dashboard/" => 'Dashboard', '' => 'Item Listing');
        $data['title'] = WEBSITE_NAME . ' | Item';
        $data['page_title'] = 'Item Management';
        $page = 'item/listing';
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
            $this->form_validation->set_rules('item_name', 'Item Name',  'trim|required|is_unique[item.item_name]');
            $this->form_validation->set_rules('hsn_code', 'HSN Code',  'trim|required');
            $this->form_validation->set_rules('gst_slab_id', 'GST Slab',  'trim|required');
            $this->form_validation->set_rules('unit_id', 'Unit Name',  'trim|required');
            $this->form_validation->set_rules('bharti', 'Bharti',  'trim|required');
            $this->form_validation->set_rules('short_name', 'Short Name',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                $postdata = array(
                    'item_name'              => $_POST['item_name'],
                    'hsn_code'               => $_POST['hsn_code'],
                    'gst_slab_id'           => $_POST['gst_slab_id'],
                    'unit_id'               => $_POST['unit_id'],
                    'bharti'                => $_POST['bharti'],
                    'short_name'            => $_POST['short_name'],
                    'status'                => $_POST['status'],
                    'added_date'            => date('Y-m-d H:i:s'),
                    'user_id'               => currentuserinfo()->id,
                );
              //  pr($_POST);die;
                $this->item_mod->add($postdata);
                $action = 'master/item/view/' . ID_encode($this->db->insert_id());


                $data =  array(
                    "action" => $action,
                    "type" => "New",
                    "module_title"=>$_POST['item_name'],
                    "module_name"=>$this->UpperCaseModuleName,
                    "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                );
                notificationData($data,'added');
                set_flashdata('success', $flash_message);

                redirect('/master/item');
            }
        }
        $data['breadcum'] = array("admin/dashboard/" => 'Dashboard', '' => 'Add Item');
        $data['title'] = WEBSITE_NAME . ' | Item';
        $data['page_title'] = 'Add Item';
        $data['gstslabs'] = getGST();
        $data['getUnitType'] = getUnitType();
        $page = 'Item/add';
        // pr($data); die;
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
            $this->form_validation->set_rules('item_name', 'Item Name',  'trim|required');
            $this->form_validation->set_rules('hsn_code', 'HSN Code',  'trim|required');
            $this->form_validation->set_rules('gst_slab_id', 'GST Slab',  'trim|required');
            $this->form_validation->set_rules('unit_id', 'Unit Name',  'trim|required');
            $this->form_validation->set_rules('bharti', 'Bharti',  'trim|required');
            $this->form_validation->set_rules('short_name', 'Short Name',  'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                /*check name for pre existance*/
                $city_name        =   $this->input->post('item_name');
                $check_data         =   $this->item_mod->check_preexistance($Item_id, $city_name);
                /*End of this*/
                if ($check_data) {
                    set_flashdata('error', 'Item name already exist.');
                    redirect("/master/Item/edit/$id");
                } else {
                    $action = $this->DefaultRedirectionWithHypan . '/view/' . $id;
                   
                    $data =  array(
                        "action" => $action,
                        "type" => "",
                        "module_title"=>$_POST['item_name'],
                        "module_name"=>$this->UpperCaseModuleName,
                        "user_name" => currentuserinfo()->first_name.' '.currentuserinfo()->last_name,
                    );
                    notificationData($data,'Updated');
                    set_flashdata('success', Master_NameTaxSlab.' name updated successfully');

                    $this->item_mod->edit($Item_id);
                    set_flashdata('success', 'Item name updated successfully');
                    redirect('/master/Item');
                }
            }
        }
        $data['result'] = $this->item_mod->view($Item_id);
        $data['breadcum'] = array("admin/dashboard/" => 'Dashboard', '' => 'Update Item');
        $data['title'] = WEBSITE_NAME . ' | Item';
        $data['page_title'] = 'Update Item';
        $data['gstslabs'] = getGST();
        $data['getUnitType'] = getUnitType();
        $page = 'Item/add';
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
            $data['result'] = $this->item_mod->view(@$Item_id);
            $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'View Item');
            $data['title'] = WEBSITE_NAME . ' | Item';
            $data['page_title'] = 'View Item';
            $page = 'Item/view';
            $data['page'] = $page;
            _layout($data);
        }
    }


    public function view_all()
    {
        $requestData    = 0; //$this->input->post(null, true);
        /*Counting warehouse data*/
        $query          =   $this->item_mod->count_data();
        $totalData      =   $query->num_rows();
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        $citydata = $this->item_mod->get_data();
        $data   =   array();
        if (!empty($citydata) && count($citydata) > 0) {
            $j = $requestData['start'];
            for ($i = 0; $i < count($citydata); $i++) {
                $j++;
                $row    =   (array)$citydata[$i];
                $nestedData     =   array();
                $nestedData[]   =   $j;
                $nestedData[]   =   $row["item_name"];
                $nestedData[]   =   '<a href="'.base_url('/master/tax_slab/view/').ID_encode($row["tax_slab_id"]).'">'.$row["tax_slab_name"].'</a>';
                $nestedData[]   =   $row["hsn_code"];
                $nestedData[]   =   $row["unit_name"];
                $nestedData[]   =   $row["bharti"];
                $nestedData[]   =   $row["status"];
                $Item_id        =   $row['id'];
                $nestedData[]   =   $this->load->view("Item/_action", array("row" => $row), true);
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
            if ($this->item_mod->deletedata($post)) {
                set_flashdata('success', 'Item deleted successfully');
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
            if ($this->item_mod->restoreData($post)) {
                set_flashdata('success', 'Item Restored successfully');
                //redirect('/city');
            } else {
                set_flashdata('success', 'Some error occured');
            }
        }
    }

    /*End of Function*/
}
