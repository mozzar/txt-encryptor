<?php
/**
 * Created by PhpStorm.
 * User: ./moZZar
 * Date: 15.09.19
 * Time: 03:41
 */


//print_r($_FILES['file']);
if(isset($_FILES['file']) && isset($_POST['encrypt'])){
   // echo "e";
    $errors= array();
    $file_name = $_FILES['file']['name'];
    $file_size =$_FILES['file']['size'];
    $file_tmp =$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

    $extensions= array("txt");

    if(in_array($file_ext,$extensions)=== false){
        $errors[]="Rozszerzenie nie obsługiwane, możliwy import pliku jedynie o rozszerzeniu .txt";
    }

    if($file_size > 2097152){
        $errors[]='Plik maksymalnie może mieć wielkość 2MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"file/".$file_name);
        //$handle = fopen("file/". $file_name, 'r') or die('Cannot open file:  '.$file_name);
        //$data = fread($handle,filesize($file_name));
        $nfd = 'file/'.$file_name;
        $nfe = 'file/encoded-'.$file_name;
        $file = file_get_contents($nfd, FILE_USE_INCLUDE_PATH);
        $piece = explode(" ", $file);
        $numb = count($piece);
        echo $numb;
        $encrypted_file = "";
        for($a=0; $a< $numb; $a++){
            //echo "(".$piece[$a] . ")<br>";
            include_once 'api/Crypt.php';
            $crypt = new Crypt();
            $encrypted_word = $crypt->encrypt($piece[$a]);
            $encrypted_file = $encrypted_file." ".$encrypted_word;

        }
       // echo $encrypted_file;
        file_put_contents($nfe, $encrypted_file);
        $file_download = basename('encoded-'.$file_name);
        $file_download = 'file/'.$file_download;

        if(!file_exists($file_download)){ // file does not exist
            die('file not found');
        } else {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file_download");
            header("Content-Type: application/txt");
            header("Content-Transfer-Encoding: binary");

            // read the file from disk
            echo $file_download . "<<eeee ";
            readfile($file_download);
        }

        echo "<br>Success";
    }else{
        print_r($errors);
    }
}

?>


