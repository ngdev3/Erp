<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
 */
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', true);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
 */
defined('FILE_READ_MODE') or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
 */
defined('FOPEN_READ') or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
 */
defined('EXIT_SUCCESS') or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*custom constants define*/
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'kyi');
define('DB_PASSWORD', 'kyi@kyi');
define('DB_DATABASE', 'kyi'); //centralized


/*Pay u money credentials*/
define('MERCHANT_KEY', 'nlaV0GRj');
define('SALT', 'qOnD5DJSze');
define('PAYU_BASE_URL', 'https://test.payu.in');


/*Google translate Api Credentials*/
define('GOOGLE_API_KEY', 'AIzaSyAPBpFTngYs7TxsTR-DH0XHi3QXmEx1Gik');

/*SMS gateway credentials*/
define('USERNAME', '');
define('PASSWORD', '');
define('SENDERID', '');


define('ADMIN_EMAIL', "tekshapers.rajat@gmail.com");
define('ADMIN_NAME', "Admin");
define('API_KEY', 'A4646gth5674');


/*social media urls*/
define('FB_URL', '');
define('TW_URL', '');
define('LI_URL', '');
define('GP_URL', '');


/*Contact number*/
define('SUPPORT_HELPLINE', '');
define('SUPPORT_HELPLINE_USA', '');
define('SITE_URL_ORI', '');


/* Website Name */
define('WEBSITE_NAME', 'C R Industries');
define('EmailID', 'info@thecrindustries.com');
define('From_Name', 'C R Industries');


/**
 * Master Breadcrumb State
 */
define('Master_State', 'admin/dashboard/');
define('Master_State_Name', 'State');

/**
 * Master Breadcrumb City
 */
define('Master_City', 'admin/dashboard/');
define('Master_NameCity', 'City');

/**
 * Master Breadcrumb TaxSlab
 */
define('Master_TaxSlab', 'admin/dashboard/');
define('Master_NameTaxSlab', 'Tax Slab');
/**
 * Master Breadcrumb Center
 */
define('Master_CenterLink', 'admin/dashboard/');
define('Master_NameCenter', 'Center');

/**
 * Master Breadcrumb Account
 */
define('Master_Account', 'admin/dashboard/');
define('Master_NameAccount', 'Account');

