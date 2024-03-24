<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	/**
     *  Admin Controller
     *
     * @package		Admin
     * @category    Admin
     * @author		Dharmendra Pal
     * @website		http://www.thealternativeaccount.com
     * @company     thealternativeaccount Inc
     * @since		Version 1.0
     */

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();  
     	
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
      
        // $asd = '{"flag":true,"message":"GSTIN  found.","data":{"ntcrbs":"MFT","adhrVFlag":"Yes","lgnm":"C.R.INDUSTRIES","stj":"State - Uttar Pradesh,Zone - Lucknow I,Range - Lucknow (A),Sector - Hardoi , Sector-4","dty":"Regular","cxdt":"","gstin":"09AAPFC4401L1Z9","nba":["Wholesale Business","Retail Business"],"ekycVFlag":"Not Applicable","cmpRt":"NA","rgdt":"26/07/2020","ctb":"Partnership","pradr":{"adr":"MOH. MAHMAND NEAR MAHUA TOLA CHUNGI, HARDOI SHAHJAHANPUR ROAD, SHAHABAD, Hardoi, Uttar Pradesh, 241124","addr":{"flno":"","lg":"","loc":" SHAHABAD","pncd":" 241124","bnm":"MOH. MAHMAND NEAR MAHUA TOLA CHUNGI","city":"","lt":"","stcd":" Uttar Pradesh","bno":"0","dst":" Hardoi","st":" HARDOI SHAHJAHANPUR ROAD"}},"sts":"Active","tradeNam":"C.R.INDUSTRIES","isFieldVisitConducted":"No","adhrVdt":"22/07/2022","ctj":"Commissionerate - LUCKNOW,Division - SITAPUR,Range - HARDOI RANGE (Jurisdictional Office)","einvoiceStatus":"Yes","lstupdt":"","adadr":[],"ctjCd":"","errorMsg":null,"stjCd":""}}';//getGSTData('04c31f8e9b721bd0c53521c40688cba6','09AAPFC4401L1Z9');
        // $gst_detail = json_decode($asd)->data;
        // $str = substr($gst_detail->gstin, 0, -13);
        // $state_code = $str;
        // $trade_name = $gst_detail->lgnm;
        // $address = $gst_detail->pradr->addr->bnm;
        // $pincode = $gst_detail->pradr->addr->pncd;
        // $state = $gst_detail->pradr->addr->stcd;
        // $dist = $gst_detail->pradr->addr->dst;
        // $gst_status = $gst_detail->sts;

        $data['breadcum'] = array("admin/dashboard/" => 'Dashboard');
        $data['title'] = WEBSITE_NAME . ' | Dashboard';
        $data['page_title'] = 'Dashboard';
        $page = 'dashboard';
        $data['page'] = $page;
        _layout($data);
            
	}


    
        
         /*End of Function*/
}
