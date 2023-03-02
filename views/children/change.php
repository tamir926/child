<?php 
echo '<table align="center" style="width:90%" class="table table-bordered table-striped">
<tr>
    <th>Дугаар</th>
    <th>Төрөл</th>
    <th>Өөрчилсөн огноо</th>
    <th>Хуучин утга</th>
    <th>Шинэ утга</th>
    <th>Өөрчлөлт оруулсан</th>
</tr>';
$i = 1;
$result1 = mysqli_query($conn,"select a.* , b.username , 
(select name from sector c where c.id = a.old_value and cate_id = 4) as value1 ,
(select name from sector c where c.id = a.new_value and cate_id = 4) as value2 ,
(select discount from discount c where c.id = a.old_value and cate_id = 5) as value3  ,
(select discount from discount c where c.id = a.new_value and cate_id = 5) as value4 
from student_change_log a , teacher b where a.change_user = b.name and student_id = $id") or die (mysqli_error());
while($result_row = mysqli_fetch_array($result1))
{
    switch ($result_row['cate_id']) 
    {
    case 1: $cate_id = 'Гэрээний эхлэх огноо'; break;
    case 2: $cate_id = 'Гэрээний дуусах огноо'; break;
    case 3: $cate_id = 'Төлөв'; break;
    case 4: $cate_id = 'Бүлэг'; break;
    case 5: $cate_id = 'Хөнгөлөлт'; break;
    }
    
    
    echo '<tr>
            <td>'.$i.'</td>
            <td>'.$cate_id.'</td>
            <td>'.$result_row['createdate'].'</td>
            <td>';
            if($result_row['cate_id']==4)
            {
                echo $result_row['value1'];
            }
            elseif($result_row['cate_id']==5)
            {
                echo $result_row['value3'];
            }
            elseif($result_row['cate_id']==3)
            {
                switch($result_row['old_value'])
                {
                case 0:	echo "Сонголт хийгээгүй"; break;
            	case 1:	echo "Хэвийн"; break;
            	case 2:	echo "Гарсан"; break;
            	case 3:	echo "Өвчтэй"; break;
            	case 4:	echo "Чөлөөтэй"; break;
            	case 5:	echo "Төгссөн"; break;
            	case 6:	echo "Сургуульд орсон"; break;
                }
            }
            else 
            {
                echo $result_row['old_value'];
            }
            echo '</td>
            <td>';
            if($result_row['cate_id']==4)
            {
                echo $result_row['value2'];
            }
            elseif($result_row['cate_id']==5)
            {
                echo $result_row['value4'];
            }
            elseif($result_row['cate_id']==3)
            {
                switch($result_row['new_value'])
                {
                case 0:	echo "Сонголт хийгээгүй"; break;
            	case 1:	echo "Хэвийн"; break;
            	case 2:	echo "Гарсан"; break;
            	case 3:	echo "Өвчтэй"; break;
            	case 4:	echo "Чөлөөтэй"; break;
            	case 5:	echo "Төгссөн"; break;
            	case 6:	echo "Сургуульд орсон"; break;
                }
            }
            else 
            {
                echo $result_row['new_value'];
            }
            echo '</td>
            <td>'.$result_row['username'].'</td>
        </tr>';
    $i++;
}
echo '</table>';
?>