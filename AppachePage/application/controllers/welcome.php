<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ini_set('display_errors', 'On');
error_reporting(E_ALL); session_start();

define("JAVA_HOSTS", "localhost:8080");
define("JAVA_SERVLET", "/MyWebApp/Hello");
require_once("Java.inc");

$arg1;
$arg1Type;
$relation;
$numOfResult;

class Welcome extends CI_Controller{


	function Welcome(){
		parent::__construct();
		
	}

	function index(){
		redirect('welcome/view');
	}


	function servlet(){
		$this->load->view('servletTest');
	}
    function add(){   

    	if($_POST && $_POST['arg1'] != NULL) {

            
            $_SESSION['arg1'] = $_POST['arg1'];
            $_SESSION['arg1Type'] = $_POST['arg1Type'];
            $_SESSION['relation'] = $_POST['relation'];

            $json = java_context()->getServlet()->hello(json_encode($_SESSION));
            $returnData = json_decode($json, TRUE);
            $_SESSION['arg2s'] = $returnData['arg2s'];
            foreach ($returnData['arg2s'] as $arg2):
                $_SESSION[$arg2.'Docs'] = $returnData[$arg2.'Docs'];
            endforeach;
            //$this->Message_model->add($message);
        } else

        	//Error Page
        	$data['title'] = "My bad Title";
			$data['heading'] = "My bad Heading";
         	$this->load->view('success', $data);     
    }

    function view($type = NULL)
    {
        // get data from database
        //$data['messages'] = $this->Message_model->get();
        if ($type == "resultList") // load ajax view
            $this->load->view('ResultList', $_SESSION);
        else if ($type == "resultDocs") // load ajax view
            $this->load->view('ResultDocs', $_SESSION);
        //elseif ($type == "json") // json
        //    echo json_encode($data['messages']);
        else // load the default view
            $this->load->view('index.html', $_SESSION);
    }
}

?>
