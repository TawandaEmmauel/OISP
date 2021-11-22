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
							
						<!DOCTYPE html>
							<html>
							
							<head>
								<title>Image Upload</title>
								
							</head>
							
							<body>
								<div id="content">
							
									<form method="POST"
										action=""
										enctype="multipart/form-data">
										<input type="file"
											name="uploadfile"
											value="" />
							
										<div>
											<button type="submit"
													name="upload">
											UPLOAD
											</button>
										</div>
									</form>
								</div>
							</body>
							
							</html>
	
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