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
      
        $data['breadcum'] = array("admin/dashboard/" => 'Dashboard');
        $data['title'] = WEBSITE_NAME . ' | Dashboard';
        $data['page_title'] = 'Dashboard';
        $page = 'dashboard';
        $data['page'] = $page;
        _layout($data);
            
	}
        
         /*End of Function*/
}
