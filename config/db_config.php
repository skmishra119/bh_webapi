<?php

//var $api_server="http://localhost/binlab_backend/";  

//var $lab_id = '';

class db {
	/*private $dbhost = 'localhost';
	private $dbuser = 'root';
	private $dbpass = 'Bintech@123';
	private $dbname = 'u793955241_labms';

	public function connect(){
		$my_con_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
		$dbCon = new PDO($my_con_str, $this->dbuser, $this->dbpass);
		$dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbCon;
	}*/
}

class uuid_config {
	public function generate() {
    	return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        	// 32 bits for "time_low"
        	mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        	// 16 bits for "time_mid"
        	mt_rand( 0, 0xffff ),

        	// 16 bits for "time_hi_and_version",
        	// four most significant bits holds version number 4
        	mt_rand( 0, 0x0fff ) | 0x4000,

        	// 16 bits, 8 bits for "clk_seq_hi_res",
        	// 8 bits for "clk_seq_low",
        	// two most significant bits holds zero and one for variant DCE1.1
        	mt_rand( 0, 0x3fff ) | 0x8000,

        	// 48 bits for "node"
        	mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    	);
	}
}

class pdfDocs{
	public function createOrderPDF($pdfid,$html){
		$pdfFile = 'docs/'.$pdfid.'.pdf';
		$mpdf = new \Mpdf\Mpdf();
		$stylesheet = '*, body, html { font-size: 12px; color: #000; }
    			p { margin: 10px 5px; }
    			.tip { font-size: 10px; }
    			table { margin: 10px 5px; }
    			div { margin: 10px 5px; }
    			.tab_hdr { font-weight: bold; backgrond: #A2A2A2; font-weight:bold; }
    			td { line-height: 15px; }
    			.cval { text-align: right;}
    			.order { font-weight:  bold; }
    			.dat { text-align: right; font-weight: bold; }
    			.observe { margin: 20px 5px; text-align: justify; }
    			h3 { text-align: center; border-bottom: 1px solid #CCC; }
    			.mis { font-weight: bold; color: #F00; }
    			.foot_dr { margin: 10px 5px; }
    			.sdiv { float: right; width: 200px; text-align: left; }
    			.sig { max-width:200px; text-align: right;}';
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFile,'F');
		
	}
}
