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
     * This function dispaly login page
     * 
     * @access	public
     * @return	html data
     */
    public function index()

    {
        $data['breadcum'] = array("dashboard/" => 'Dashboard', '' => 'State Listing');
        $data['title'] = WEBSITE_NAME . ' | State';
        $data['page_title'] = 'State';
        $page = 'state/listing';
        $data['page'] = $page;
        _layout($data);
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
        // pr($citydata);die;       
        $data   =   array();
        if (count($citydata) > 0) {
            $j = $requestData['start'];
            for ($i = 0; $i < count($citydata); $i++) {
                $j++;
                $row    =   (array)$citydata[$i];
                $nestedData     =   array();
                //$nestedData[]   =   "<input type='checkbox'  class='deleteRow' value='".$row['id']."'  />";
                $nestedData[]   =   $j;

                // $nestedData[]   =   $row["city_name"];
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

    /*End of Function*/
}
