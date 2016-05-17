<?
if (!empty($_FILES['file']['name'])){			//
$file = file($_FILES['file']['name']);			//
	for ($i=0;$i<count($file);$i++){			//
		$element=explode(' ',$file[$i]);		//Формирование массива данных из файла 
		for ($j=0;$j<count($element);$j++){	 	
			if (isset ($element[$j]))			
				$a[$i][$j]=(int)$element[$j];	
		}
	}
}
else 
$file=0;

	
$k=0;$j1=0;$m=0;

for ($i=0;$i<count($file);$i++)					//Массив поиска оптимального пути по треугольнику 
{

		if (isset ($a[$i][$j1]))
		{
			$m=$m+$a[$i][$j1];
			$k2=$j1;
				$i2=$i+1;
				if (!isset ($a[$i2][0]))
			{	
				break;
			}	

			for ($j2=$k2-1;$j2<=$k2+1;$j2++)
			{	
				if (isset ($a[$i2][$j2]))
				{
					$m2[$j2]=$m+$a[$i2][$j2];
					
					$k3=$j2;
					
						$i3=$i2+1;
						
						for ($j3=$k3-1;$j3<=$k3+1;$j3++)
						{	
							if (isset ($a[$i3][$j3]))
							{
								$m3[$j2][$j3]=$m2[$j2]+$a[$i3][$j3];
								$k4=$j3;
								
									$i4=$i3+1;
						
									for ($j4=$k4-1;$j4<=$k4+1;$j4++)
									{	
										if (isset ($a[$i4][$j4]))
										{
											$m4[$j3][$j4]=$m3[$j2][$j3]+$a[$i4][$j4];
												
												
										}
										
									}
									if (isset ($a[$i4][0]))
									{									
										$max3[$j3]=max($m4[$j3]);
										$m4=array();
										
										
									}
							}
						}
						if (!isset ($a[$i4][0]))
						{
							if (isset ($m3[$j2]))
							$max3=$m3[$j2];
						}
					
						if (isset ($a[$i3][0]))
						{
							$max2[$j2]=max($max3);
							
							$max3=array();
							$m3=array();
						}
						else
						$max2=$m2;
						
				}
				
			}
			$key=array_search(max($max2),$max2);
			$max2=array();
			$m2=array();
			$j1=$key;	
			
		}
}
 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>
<form action="task1.php" method="POST" name="form1" enctype="multipart/form-data">
<p>Выберите файл для определения максимальной суммы пути от вершины до основания треугольника:</p>
<p><input type="file" name="file" /></p>
<p><input type="submit" value="Отправить"/></p>
<p>Максимальная сумма пути:</p>
<?=$m;?>


</form>
</body>
</html>

