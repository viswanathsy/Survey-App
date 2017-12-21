<?PHP INCLUDE_ONCE 'db_config.php'; 
$class = $_POST['cl'];
$section = $_POST['sec'];
$sql = "select stu_slno,stu_name,class,section,mob_num,email_id from students where class =".$class."  and section = ".$section.";";
$result = $conn->query($sql);           
    $data = Array();
    if (!$result) 
    {
        echo (var_dump($result));
    }
    else
    {
        while($row = $result->fetch_assoc()) 
        {
            $data[] = $row;            
        }
        $result -> close();
        echo (json_encode($data));       
    }
?>