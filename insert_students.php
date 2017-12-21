<?PHP 
INCLUDE_ONCE 'db_config.php'; 
$data = $_POST['data'];
foreach ($data as $key) 
    {
        $sql = "insert into code_mapping (code,survey_id,created_on,stu_name,stu_class,stu_section,stu_mob) values('".$key['code']."','".$key['survey_id']."',now(),'".$key['name']."','".$key['class']."','".$key['section']."','".$key['mobile']."');";
        echo $sql;
        //$sql = mysql_query("INSERT INTO code_mapping (id,code,stu_name) values(1,'".$key['class']."','".$key['name']."'))" or die(mysql_error());
        if (!mysqli_query($conn,$sql))
            {
                echo("Error description: " . mysqli_error($conn));
            }  

    }
    
?>

