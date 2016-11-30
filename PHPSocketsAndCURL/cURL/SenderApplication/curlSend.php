<?php
	function randomStatusHandle()
	{
		$request = curl_init('http://localhost/RecieverApplication/curlRecieve.php');
		curl_setopt($request, CURLOPT_POST, true);
		curl_setopt($request,CURLOPT_POSTFIELDS,"randomHandle=".$_POST['randomHandle']);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
		$status = curl_exec($request);
		echo $status;
		curl_close($request);
	}
	function fileUpload()
	{
		switch($_FILES['file']['error'])
		{
			case 0:
				$file_type = $_FILES['file']['type'];
				$allowed = array("image/jpeg","image/png","image/gif", "application/pdf","text/plain");
				if(!in_array($file_type, $allowed)) 
				{
  					echo 'Only jpg, png, gif, text and pdf files are allowed.';
  				}
  				else
  				{
					$request = curl_init('http://localhost/RecieverApplication/curlRecieve.php');
					curl_setopt($request, CURLOPT_POST, true);
					curl_setopt($request,CURLOPT_POSTFIELDS,
				    array(
				      'file' =>
				          '@' .$_FILES["file"]['tmp_name']
				          . ';filename=' .$_FILES["file"]['name']
				    ));
					curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
					echo curl_exec($request);
					curl_close($request);
				}
				break;
			case 1:
				echo "The uploaded file exceeds the upload_max_file_size directive in php.ini";
				break;
			case 2:
				echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
				break;
			case 3:
				echo "The uploaded file was only partially uploaded";
				break;
			case 4:
				echo "No file was uploaded";
				break;
			case 6:
				echo "Missing a temporary folder";
				break;
			case 7:
				echo "Failed to write file to disk.";
				break;
			case 8:
				echo "A PHP extension stopped the file upload.";
				break;	
		}
	}


	if(isset($_POST['randomHandle']))
	{
		randomStatusHandle();
	}
	elseif(isset($_POST['submit']))
	{
		fileUpload();
	}
		
	

?>