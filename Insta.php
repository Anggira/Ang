<!DOCTYPE HTML>
<html>
<head>
// < script type="text/javascript"> Change this code
var count= 1200;
var counter=setInterval(timer, 1000);
function timer(){
count=count-1;
if (count <= 0)
{
clearInterval(counter);
document.getElementById("timer")="Ready Submit!";
return;
}
document.getElementById("timer")=count + " Detik";
}
// </ script> Change this code
</head>
<title>Like Instagram by SiMUF a.k.a Inisial.k</title>
<div class="form-table">
<form method="POST" action="<?php $_SERVER; ?>" enctype="multipart/form-data">
<center>
<hr>
<h1>Auto Like Instagram v1.3</h1>
<hr>
<h1>Form Pengisian</h1>
<hr>
Link Foto :<br>
<input type="url" name="url" id="url" placeholder="https://www.instagram.com/p/Agas056qwg/" required="">
<br>
<br>
Socks :<br>
<input type="text" name="socks" id="socks" placeholder="192.154.1.256" required="">
<br>
<br>
Points :<br>
<input type="number" name="points" id="points" required="" value="95">
<br>
<br>
<input type="submit" name="submit" value="Submit">
<hr>
Login Your Instagram : <a href="https://www.instagram.com/" target="_blank">Here!</a> | List Socks : <a href="http://sockslist.net/" target="_blank">Here!</a> | Follow Me : <a href="https://www.instagram.com/" target="_blank">Here!</a>
<hr>
<br>
<br>
<br>
<!-- 0xMuf.s@gmail.com -->
<div id="footer"><p style="text-align:right">Copyright <?php echo $_SERVER ?> © 2016 - Script Developed by SiMUF a.k.a Inisial.k</p></div>


<?php 
if(isset($_POST) && isset($_POST) && isset($_POST)){
$likes = $_POST; 
$urlmedia = $_POST;
$socks = $_POST;
$points = $_POST;
$situs = $_SERVER;

if($_POST == "" || $_POST == "" || $_POST == "" ){
echo "<center style='color:red;'>Tolong semua form di isi semua ya!";
exit(); 
}

$s = file_get_contents("https://api.instagram.com/publicapi/oembed/?url=" . $_POST);
$data = json_decode($s, true);
$likeid = $data;
list($media, $user) = explode("_", $likeid);
$media = $media . "_" . rand(1234567890,9876543210);
$thumbnail = $data;
$account = $data;
$ser = str_replace("_", "", $likeid);

if(!is_numeric($ser)){
echo "<center><b style='color:red;'>Cek koneksimu mas, ada yang lagi nonton tuh di kamar sebelah!</b>";
exit(); 
}

if($_POST > "95")
{
echo "<center style='color:red;'>Jangan masukin jumlah like lebih dari 95!";
exit();
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,"http://www.metinogtem.com/Instagram/add.php?ID=".$likeid."&Link=".$thumbnail."&Points=".$points."&PushID=APA91bGtvG7kbkuCZmxzzOybiL81H0kK04vFSKrQtg2fPVOhRXIRiJNAnAuypa6MRHrg1_1wc_X2emm-ssf1kX7HHxpHcydib24305jU7DnQRbjL8NY-d1iG1klWu3mH3OphrH5BiYpa&Type=Android");


$headers = array();
$headers = 'User-Agent: Dalvik/1.6.0 (Linux; U; Android 4.3.0; Xperia Z4 Xtreme Build/JDQ39)';
$headers = 'Host: www.metinogtem.com';
$headers = 'Accept-Encoding: gzip';
$headers = 'Connection: close';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$out = curl_exec ($ch);
curl_close ($ch);
$s = json_decode($out, true);

if($s != 0){
echo "
<center><b style='color:green;'>Sukses Mas...<br>Silahkan tunggu likenya ya</b> <a href='$urlmedia' target='_blank'>$urlmedia</a><br><div id='form'><p>Next Submit:</p><i id='timer' name='timer'>1200 Detik</div></div>
";
} else {
echo "<center><b style='color:red;'>Gagal Mas!<br>Prikey dari server 0 atau Akun kamu dibanned dari server!</b>";
}
$file = "history.php";
$handle = fopen($file, 'a');
fwrite($handle, "
<tr>
<td><center>$situs</center></td>
<td><center>$urlmedia</center></td>
<td><center>$account</center></td>
<td><center>$likeid</center></td>
<td><center>$likes</center></td>
<td><center><span data-toggle='tooltip' title='Congrats, Proses Success!' class='label label-success'>Success <i class='fa fa-check-square-o'></i></span></center></td></i>
<hr></tr>");
fclose($handle);
}
?>
