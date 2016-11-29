<?php
if(isset($_POST['randomHandle']))
{
	$status=["Successful","Error","Bad Request","Request not found"];
	$key=array_rand($status);
	echo $status[$key];
}
else
{
	switch($_FILES['file']['error'])
		{
			case 0:
				echo $_FILES['file']['name']." has been uploaded to the Server";
				move_uploaded_file($_FILES['file']['tmp_name'],"UploadedFiles/".$_FILES['file']['name']);
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

		
?>