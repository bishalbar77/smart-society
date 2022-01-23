<?php
$pincode1=$_POST['pincode1'];
$data=file_get_contents('http://postalpincode.in/api/pincode/'.$pincode1);
$data=json_decode($data);
if(isset($data->PostOffice['0'])){
	$arr['city1']=$data->PostOffice['0']->Taluk;
	$arr['state1']=$data->PostOffice['0']->State;
	$arr['district1']=$data->PostOffice['0']->District;
	$arr['country1']=$data->PostOffice['0']->Country;
	echo json_encode($arr);
}else{
	echo 'no';
}
?>