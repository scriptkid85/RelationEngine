<?php
  require_once("Java.inc");

	
	$json = java_context()->getServlet()->hello(3);
  // $obj = json_decode(java_context()->getServlet()->hello(3));
  // print $obj->{'arg2'};
  // // foreach ($obj->{'arg2s'} as $arg2):
  // // 	print $arg2;
  // // endforeach;
	$test;
	$data = json_decode($json, TRUE);
	print count($data['arg2s']);
	print "\n";

	foreach ($data['arg2s'] as $arg2):
        $test[$arg2.'Docs'] = $data[$arg2.'Docs'];
    	foreach ($data[$arg2.'Docs'] as $docs):
    		echo $docs;
    	endforeach;
    endforeach;
	foreach ($data['arg2s'] as $arg2):
		echo $arg2;
		echo "\n";
	endforeach;


	// $jsonIterator = new RecursiveIteratorIterator(
 //    new RecursiveArrayIterator(json_decode($json, TRUE)),
 //    RecursiveIteratorIterator::SELF_FIRST);

	// foreach ($jsonIterator as $key => $val) {
	//     if(is_array($val)) {
	//         echo "$key:\n";
	//     } else {
	//         echo "$key => $val\n";
	//     }
	// }
?>