<?php
session_start();
include 'tracker_help_files/control.php';

if(($_POST["action"]=='show_state')) {
	

	
		if(!empty($_POST["countryval"])) {
			
		
		$Country_id = $_POST['countryval'];
		$current_id = $_POST['state_id'];
		
		
         
		$all_data = db_query("SELECT * FROM states WHERE country_id='" . $Country_id . "'");
		
		
		$html = '<option value="">State</option>';			
		while($singleData = mysqli_fetch_array($all_data)){
		//$url = $this->create_url($singleData['Title']);
		if($current_id==$singleData['id']){ $class= 'selected'; } else{  $class= '';  }
		$html .='<option value="'.$singleData['id'].'" '.$class.'>'.$singleData['name'].'</option>';


		}
		

		echo json_encode($html);
		
				
			
		}
}
		
		
		
if(($_POST["action"]=='show_city')) {
	

	
		if(!empty($_POST["state"])) {
			
		$state_id = $_POST['state'];
		$current_id = $_POST['city_id'];

		$all_data = db_query("SELECT * FROM cities WHERE state_id='" . $state_id . "'");
		$html = '<option value="">City</option>';
		if(count($all_data) > 0){
					
		while($singleData = mysqli_fetch_array($all_data)){
		//$url = $this->create_url($singleData['Title']);
		if($current_id==$singleData['id']){ $class= 'selected'; } else{  $class= '';  }
		$html .='<option value="'.$singleData['id'].'" '.$class.'>'.$singleData['name'].'</option>';


		}
		}

		echo json_encode($html);
		
				
			
		}
}
	 
?>