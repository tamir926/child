<?php
include '../config.php';
if(isset($_POST['insert_sector']))
{
  $branch = $_POST['branch'];
  $sector_type = $_POST['sector_type'];
  $sector_name = $_POST['sector_name'];
  $main_teacher = $_POST['main_teacher'];
  $student_count = $_POST['student_count'];
  $sub_teacher = $_POST['sub_teacher'];
  $price = $_POST['price'];
  if(isset($_POST['active']))
    {
        $active = 1;
    }
    else
    {
        $active = 0;
    }
    if(strlen($sub_teacher)==0)
    {
        $sub_teacher = 0;
    }
    echo "insert into sector (name,main_teacher,sub_teacher,price,statuscode,branch,student_count,sector_type) values ('$sector_name',$main_teacher,$sub_teacher,'$price',$active,$branch,'$student_count','$sector_type')";
  mysqli_query($conn,"insert into sector (name,main_teacher,sub_teacher,price,statuscode,branch,student_count,sector_type) values ('$sector_name',$main_teacher,$sub_teacher,'$price',$active,$branch,'$student_count','$sector_type')") or die (mysqli_error());
  header("location:../sector?msg=Бичлэг амжилттай хадгалагдлаа");
}
if(isset($_POST['update_sector']))
{
  $sector_name = $_POST['sector_name'];
  $student_count = $_POST['student_count'];
  $main_teacher = $_POST['main_teacher'];
  $sub_teacher = $_POST['sub_teacher'];
  $sector_type = $_POST['sector_type'];
  $price = $_POST['price'];
  if(isset($_POST['active']))
    {
        $active = 1;
    }
    else
    {
        $active = 0;
    }
  $id = $_POST['id'];
  mysqli_query($conn,"update sector set name='$sector_name',student_count = '$student_count' , sector_type='$sector_type', main_teacher = $main_teacher , sub_teacher = $sub_teacher, price ='$price', statuscode=$active where id = $id") or die (mysqli_error());
  header("location:../sector?msg=Бичлэг амжилттай хадгалагдлаа");
}
if(isset($_GET['delete_sector']))
{
  // huuhed bgaa esehiig shalgana
  $id = $_GET['delete_sector'];
  $query = mysqli_query($conn,"select *from student where sector = $id") or die (mysqli_error());
  $num = mysqli_num_rows($query);
  if($num>0)
  {
     header("location:../sector?msg=Устгах боломжгүй. Бүртгэлтэй хүүхэд байна");
  }
  else 
  {
    mysqli_query($conn,"delete from sector where id = $id") or die (mysqli_error());
    header("location:../sector?msg=Бичлэг устлаа");      
  }
}
?>
