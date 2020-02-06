<?php
	function tgl_db($tgl){
			$tgl		= date_create($tgl);
			$tanggal	= date_format($tgl,"Y-m-d");
			return $tanggal;		 
	}
	
	function tgl_indo($tgl){
			$tgl		= date_create($tgl);
			$tanggal	= date_format($tgl,"d-m-Y");
			return $tanggal;		 
	}

?>