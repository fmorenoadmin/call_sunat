<?php
	session_start();

	if (isset($_POST['ruc'])) {

		echo json_encode($_s->search($_POST['ruc']));
	}
	if (isset($_REQUEST['ruc'])) {

		$url  = 'https://api.sunat.cloud/ruc/'.$_REQUEST['ruc'];

		$data = fopen($url, "r");
		$outfile = "xtracomponents.html";
		file_put_contents($outfile, $data); 
		$res = file_get_contents($outfile);
		$inf = json_decode($res, true);

		echo json_encode($inf);
	}
?>