<?php
	require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php');
	spl_autoload_register('DOMPDF_autoload'); 
	$dompdf = new DOMPDF(); 
	$dompdf->set_paper('A4', 'portrait');
	$dompdf->load_html($content_for_layout, Configure::read('App.encoding'));
	$dompdf->render();
	$dompdf->stream("Relatório.pdf");
?>