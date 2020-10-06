<?php

include "connect.php";

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

function compressedImage($source, $path, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $path, $quality);

}

if(isset($_FILES['images']['name']))
{
    $track_no   = $_POST['track_no'];
    $user_id =$_POST['user_id'];
    $adtype =$_POST['adtype'];
    $imagetable =$_POST['imagetable'];

    $ad_id = "";

    if(isset($_POST['ad_id'])){
        $ad_id = $_POST['ad_id'];
    }
    else {
        # code...
    $sql_query = "SELECT * FROM `$adtype` WHERE `user_id`= $user_id AND `trackno` = $track_no ORDER BY `ad_id` DESC LIMIT 1";
    $result = mysqli_query($connect,$sql_query);
    $row = mysqli_fetch_row($result);
    
    if ($result = mysqli_query($connect,$sql_query))
    {
    while ($row=mysqli_fetch_row($result))
    {
        $ad_id =  $row[0];
    }
    }
    else
    {
      echo "Ad not found \n";
      exit();
    }
    }
    

    
  
    //SELECT `ad_id` FROM `student_acc` WHERE `user_id`='.$user_id.' ORDER BY `ad_id` DESC LIMIT 1;
    $file_ary = reArrayFiles($_FILES['images']);

    foreach ($file_ary as $file) {
        print 'File Name: ' . $file['name'];
        print 'File Type: ' . $file['type'];
        print 'File Size: ' . $file['size'];
    }

    $output_dir = "upload/";

    $fileCount = count($_FILES["images"]['name']);

    for($i=0; $i < $fileCount; $i++)
		
    {
        $ImageName      = str_replace(' ','-',strtolower($_FILES['images']['name'][$i]));
        $ImageType      = $_FILES['images']['type'][$i]; /*"image/png", image/jpeg etc.*/

     
        $ImageExt =     substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt       = str_replace('.','',$ImageExt);
        $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);


        $NewImageName = $ImageName.'-'.$track_no.'.'.$ImageExt;

        $ret[$NewImageName]= $output_dir.$NewImageName;

        
        /* Try to create the directory if it does not exist 
        if (!file_exists($output_dir . $last_id))
        {
            @mkdir($output_dir . $last_id, 0777);
        }
        */
        $upload_file = $output_dir.$NewImageName;

        compressedImage($_FILES['images']['tmp_name'][$i], $output_dir.$NewImageName, 80);          
     /*move_uploaded_file($_FILES["images"]["tmp_name"][$i],$output_dir.$NewImageName );*/   
        
        $sql = "insert into $imagetable (image, track_no, user_id, ad_id) values ('$upload_file','.$track_no.','.$user_id.','.$ad_id.')";

        if ($connect->query($sql) === TRUE) {
            echo "Image Submitted succesfully";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
        }

  $connect->close();
    
}

?>
