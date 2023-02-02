<?php
if(isset($_FILES['file'])) {
  $errors = array();
  $file_name = $_FILES['file']['name'];
  $file_size = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];
  $file_type = $_FILES['file']['type'];

  // Generate a random 5 letter folder name
  $folder_name = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
  $file_destination = "uploads/".$folder_name."/".$file_name;
  
  // Create the folder if it doesn't exist
  if(!is_dir("uploads/".$folder_name)) {
    mkdir("uploads/".$folder_name);
  }
  
  if(empty($errors) == true) {
    move_uploaded_file($file_tmp, $file_destination);
    echo "Successfully uploaded the file to ".$file_destination;
  }else{
    print_r($errors);
  }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="file" />
  <input type="submit"/>
</form>
