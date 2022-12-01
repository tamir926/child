<?php
$query = mysqli_query($conn,"select *from student_family where student_id = $id and person_type = 1") or die (mysqli_error());
$data3 = mysqli_fetch_array($query);
$person_type1 = $data3['person_type'];
$person1 = $data3['person'];
$birthday1 = $data3['birthday'];
$age1 = $data3['age'];
$family_count1 = $data3['family_count'];
$range1 = $data3['range1'];
$email1 = $data3['email'];
$facebook1 = $data3['facebook'];
$address1 = $data3['address'];
$km1 = $data3['km'];
$job1 = $data3['job'];
$job_pro1 = $data3['job_pro'];
$salary1 = $data3['salary'];
$phone1 = $data3['phone'];
$note1 = $data3['note'];

$query1 = mysqli_query($conn,"select *from student_family where student_id = $id and person_type = 2") or die (mysqli_error());
$data4 = mysqli_fetch_array($query1);
$person_type2 = $data4['person_type'];
$person2 = $data4['person'];
$birthday2 = $data4['birthday'];
$age2 = $data4['age'];
$family_count2 = $data4['family_count'];
$range2 = $data4['range1'];
$email2 = $data4['email'];
$facebook2 = $data4['facebook'];
$address2 = $data4['address'];
$km2 = $data4['km'];
$job2 = $data4['job'];
$job_pro2 = $data4['job_pro'];
$salary2 = $data4['salary'];
$phone2 = $data4['phone'];
$note2 = $data4['note'];


?>
<table class="table table-bordered" style="width:95%; margin-left:auto; margin-right:auto;">
  <tr>
    <td colspan="4"><center>Гэр бүлийн мэдээлэл</center></td>
  </tr>
  <tr>
    <td>Дугаар</td><td>Мэдээлэл</td><td>Эцгийн мэдээлэл</td><td>Эхийн мэдээлэл</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Овог Нэр</td>
    <td><input type="textbox" name="person1" value="<?=$person1?>" class="form-control" disabled></td>
    <td><input type="textbox" name="person2" value="<?=$person2?>" class="form-control" disabled></td>
  </tr>
  <tr>
    <td>2</td>
    <td>Төрсөн он</td>
    <td><input type="text" class="form-control" value="<?=$birthday1?>" name="birthday1" disabled></td>
    <td><input type="text" class="form-control" value="<?=$birthday2?>" name="birthday2" disabled></td>
  </tr>
  <tr>
    <td>3</td>
    <td>Нас</td>
    <td><input type="text" class="form-control" value="<?=$age1?>" name="age1" disabled></td>
    <td><input type="text" class="form-control" value="<?=$age2?>" name="age2" disabled></td>
  </tr>
  <tr>
    <td>4</td>
    <td>Ам бүл</td>
    <td colspan="2"><input type="text" class="form-control" value="<?=$family_count1?>" name="family_count" disabled></td>
  </tr>
  <tr>
    <td>5</td>
    <td>6аас доош насны хүүхдийн тоо</td>
    <td colspan="2"><input type="text" class="form-control" value="<?=$range1?>" name="range1" disabled></td>
  </tr>
  <tr>
    <td>6</td>
    <td>Имэйл хаяг</td>
    <td><input type="text" class="form-control" value="<?=$email1?>" name="email1" disabled></td>
    <td><input type="text" class="form-control" value="<?=$email2?>" name="email2" disabled></td>
  </tr>
  <tr>
    <td>7</td>
    <td>Facebook хаяг</td>
    <td><input type="text" class="form-control" value="<?=$facebook1?>" name="facebook1" disabled></td>
    <td><input type="text" class="form-control" value="<?=$facebook2?>" name="facebook2" disabled></td>
  </tr>
  <tr>
    <td>8</td>
    <td>Одоо амьдарч байгаа хаяг</td>
    <td colspan=2><input type="text" class="form-control" value="<?=$address1?>" name="address" disabled></td>
  </tr>
  <tr>
    <td>9</td>
    <td>Гэрээс цэцэрлэг хүртэлх зай /км/</td>
    <td colspan="2"><input type="text" class="form-control" value="<?=$km1?>" name="km" disabled></td>
  </tr>
  <tr>
    <td>10</td>
    <td>Ажлын газрын нэр</td>
    <td><input type="text" class="form-control" value="<?=$job1?>" name="job1" disabled></td>
    <td><input type="text" class="form-control" value="<?=$job2?>" name="job2" disabled></td>
  </tr>
  <tr>
    <td>11</td>
    <td>Албан тушаал</td>
    <td><input type="text" class="form-control" value="<?=$job_pro1?>" name="job_pro1" disabled></td>
    <td><input type="text" class="form-control" value="<?=$job_pro2?>" name="job_pro2" disabled></td>
  </tr>
  <tr>
    <td>12</td>
    <td>Өрхийн орлого</td>
    <td colspan="2"><input type="text" class="form-control" value="<?=$salary1?>" name="salary" disabled></td>
  </tr>
  <tr>
    <td>13</td>
    <td>Утасны дугаар</td>
    <td><input type="text" class="form-control" value="<?=$phone1?>" name="phone1" disabled></td>
    <td><input type="text" class="form-control" value="<?=$phone2?>" name="phone2" disabled></td>
  </tr>
  <tr>
    <td>14</td>
    <td>Холбоо барих ойрын 2 хүний мэдээлэл</td>
    <td><input type="text" class="form-control" name="note1" value="<?=$note1?>" disabled></td>
    <td><input type="text" class="form-control" name="note2" value="<?=$note2?>" disabled></td>
  </tr>
</table>
