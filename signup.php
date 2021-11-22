<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Online Image Sharing Platform</title>

    <link rel="stylesheet" href="signup.css">
    
</head>


        

<body>

	<div id="wrapper">
 
 		<div id="header">
 			My Chat
 			<div style="font-size: 20px;font-family: myFont;">Signup</div>
 		</div>
 		<div id="error" style="">some text</div>
		<form id="myform">
			<input type="text" name="username" placeholder="Username"><br>
			<input type="text" name="email" placeholder="Email"><br>
			<div style="padding: 10px;">
				<br>Gender:<br>
				<input type="radio" value="Male" name="gender_male"> Male<br>
				<input type="radio" value="Female" name="gender_female"> Female<br>
			</div>
			<input type="password" name="password" placeholder="Password"><br>
			<input type="password" name="password2" placeholder="Retype Password"><br>
			<input type="button" value="Sign up" id="signup_button" ><br>

 			<br>
 			<a href="login.php" style="display: block;text-align: center;text-decoration: none">
 				Already have an Account? login here
 			</a>

		</form>
	</div>
</body>
</html>

<script type="text/javascript">

	function _(element){

		return document.getElementById(element);
	}

   	var signup_button = _("signup_button");
   	signup_button.addEventListener("click",collect_data);

   	function collect_data(){

   		signup_button.disabled = true;
   		signup_button.value = "Loading...Please wait..";

   		var myform = _("myform");
   		var inputs = myform.getElementsByTagName("INPUT");

   		var data = {};
   		for (var i = inputs.length - 1; i >= 0; i--) {

   			var key = inputs[i].name;

   			switch(key){

   				case "username":
   					data.username = inputs[i].value;
   					break;

   				case "email":
   					data.email = inputs[i].value;
   					break;

   				case "gender_male":
   				case "gender_female":
   					if(inputs[i].checked){
   						data.gender = inputs[i].value;
   					}
   					break;

   				case "password":
   					data.password = inputs[i].value;
   					break;

   				case "password2":
   					data.password2 = inputs[i].value;
   					break;

   			}
   		}

   		send_data(data,"signup");

   	}

   	function send_data(data,type){

   		var xml = new XMLHttpRequest();

   		xml.onload = function(){

   			if(xml.readyState == 4 || xml.status == 200){

   				handle_result(xml.responseText);
   				signup_button.disabled = false;
   				signup_button.value = "Signup";
   			}
   		}

		data.data_type = type;
		var data_string = JSON.stringify(data);

		xml.open("POST","api.php",true);
		xml.send(data_string);
   	}

   	function handle_result(result){

   		var data = JSON.parse(result);
   		if(data.data_type == "info"){

   			window.location = "index.php";
   		}else{

   			var error = _("error");
   			error.innerHTML = data.message;
   			error.style.display = "block";
 
   		}
   	}

</script>
