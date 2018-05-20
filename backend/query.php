<?php
    include 'connect.php';
    if (!empty($_POST['submit'])){
        $table = $_POST['table'];
        $action = $_POST['action'];
        
        switch($action){
            case "Insert":
                        
                if (!empty($_POST)){
                    foreach ($_POST as $key => $value){
                        if($key != 'submit' && $key != 'table' && !empty($value) && $key != 'action'){
                            $keyArr[] = "`".$key."`";
                            $textColumns = implode(" , ",$keyArr);
                            $valueArr[] = "'".test_input($value)."'";
                            $textColumnValues = implode(" , ",$valueArr);
                            }
                    }
                    
                }
                if(!empty($_FILES)){
                    foreach ($_FILES as $keyFile => $valueFile){
                        if($keyFile != 'submit' && $keyFile != 'table' && !empty($valueFile) && $keyFile != 'action'){
                            $keyFileArr[] = "`".$keyFile."`";
                            $fileColumns = implode(" , ",$keyFileArr);
                            $valueFileArr[] = "'".$valueFile['name']."'";
                            echo $fileColumnValues = implode(" , ",$valueFileArr);
                        }
                    }
                }
                
                if(!empty($textColumns) && !empty($fileColumns)){
                    $totalColumns = $textColumns ." , ". $fileColumns;
                } else if(empty($textColumns)){
                    $totalColumns = $fileColumns;
                } else if(empty($fileColumns)){
                    $totalColumns = $textColumns;
                }
                
                if(!empty($textColumnValues) && !empty($fileColumnValues)){
                    $totalValues = $textColumnValues." , ".$fileColumnValues;
                } else if(empty($textColumnValues)){
                    $totalValues = $fileColumnValues;
                } else if(empty($fileColumnValues)){
                    $totalValues = $textColumnValues;
                }
                if (!empty($_FILES['p_image'])){
                    $dir = "..\images\\";
                    $tmpName = $_FILES['p_image']['tmp_name'];
                    $orgName = $_FILES['p_image']['name'];
                    
                    $extArr = explode(".",$orgName);
                    $ext = $extArr[1];
                    $fileName = $_POST['p_name'].".".$ext;
                    if(move_uploaded_file($tmpName,$dir.$orgName)){
                        //echo "Moved";
                    }
                }
                
                 echo $sql = "INSERT INTO `$table`($totalColumns) VALUES ($totalValues)";
                break;
            case "Update":
               
                if (!empty($_POST)){
                    foreach ($_POST as $key => $value){
                        if($key != 'submit' && $key != 'table' && !empty($value) && $key != 'action' && $key != "p_id"){
                            if($key == "c_password"){
                                $value = sha1($value);
                            }
                            $setArr[] = "`".$key."`='".test_input(addslashes($value))."'";
                            $set = implode(" , ",$setArr);
                        }
                    }
                }
                if (!empty($_FILES['p_image'])){
                    $dir = "..\images\\";
                    $tmpName = $_FILES['p_image']['tmp_name'];
                    $orgName = $_FILES['p_image']['name'];
                    
                    $extArr = explode(".",$orgName);
                    $ext = $extArr[1];
                    $fileName = $_POST['p_name'].".".$ext;
                    if(move_uploaded_file($tmpName,$dir.$orgName)){
                        //echo "Moved";
                        $set = $set.",p_image='".$orgName."'";
                    }
                }
                if(!empty($_POST['p_id'])){
                    $id = $_POST['p_id'];
                echo $sql = "UPDATE `$table` SET $set WHERE p_id = '$id'";
                } else {
                    $id = $_POST['c_email'];
                    $sql = "UPDATE `$table` SET $set WHERE c_email = '$id'";
                    
                }
                
                break;
            case "Delete":
                $id = $_POST['p_id'];
                echo $sql = "delete from $table where p_id = '$id'";
                break;
        }
        
    $result = mysqli_query($conn,$sql);

                
    if($result){
        if ($action == "Insert"){
            echo "<h1>Successfully Saved New Item.</h1>";
            echo "<h3><a href = '../operations.php'>Add a New item</a></h3>";
        } else if ($action == "Update"){
            if(!empty($_POST['c_email'])){
                header("Location:../my-account.php");
            } else {
                echo "<h1>Successfully Updated Item.</h1>";
                echo "<h3><a href = '../operations.php'>Update a new item? Click here</a></h3>";
            }
            
        } else if ($action == "Delete"){
            echo "<h1>Successfully Deleted Item.</h1>";
            echo "<h3><a href = '../delete-operation.php'>Delete another new item? Click here</a></h3>";
        }
    } else {
        echo mysqli_error($conn);
    }
        
    }else {
        echo "Product ID is empty !! ";
    }
mysqli_close($conn);

function test_input($value){
    $finalValue = trim($value);
    $finalValue = stripslashes($value);
    $finalValue = htmlspecialchars($value);
    $finalValue = addslashes($value);
    return $finalValue;
}
?>
