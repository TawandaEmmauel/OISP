<?php 
	
	$sql = "select * from users where userid = :userid limit 1";
	$id = $_SESSION['userid'];
	$data = $DB->read($sql,['userid'=>$id]);

	$mydata = "";

if(is_array($data)){

	$data = $data[0];

	//check if image exists
	$image = ($data->gender == "Male") ? "ui/images/user_male.jpg" : "ui/images/user_female.jpg";
	if(file_exists($data->image)){
		$image = $data->image;
	}

	$gender_male = "";
	$gender_female = "";

	if($data->gender == "Male"){
		$gender_male = "checked";
	}else{
		$gender_female = "checked";
	}

	$mydata ='
 
		<style type="text/css">
		 
	 		@keyframes appear{

				0%{opacity:0;transform: translateY(50px) rotate(5deg);transform-origin:100% 100%;}
				100%{opacity:1;transform: translateY(0px) rotate(0deg);transform-origin:100% 100%;}
	 		}

 			form{
				text-align: left;
				margin: auto;
				padding: 10px;
				width:100%;
				max-width: 400px;
			}

			input[type=text],input[type=password],input[type=button]{

				padding:10px;
				margin: 10px;
				width:200px;
				border-radius: 5px;
				border:solid 1px grey;
			}

			input[type=button]{

				width: 220px;
		 		cursor: pointer;
				background-color: #2b5488;
				color: white;
			}

			input[type=radio]{

				transform: scale(1.2);
				cursor: pointer;
			}
		 
			#error{

				text-align: center;
				padding: 0.5em;
				background-color: #ecaf91;
				color: white;
				display: none;
			}

			.dragging{
				border: dashed 2px #aaa;
			}

		</style>
		 
		   
		
  
  
	';

	$info->message = $mydata;
	$info->data_type = "gallery";
	echo json_encode($info);

}else{

	$info->message = "No gallery was found";
	$info->data_type = "error";
	echo json_encode($info);
}

?>