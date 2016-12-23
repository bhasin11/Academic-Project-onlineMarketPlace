<?php
extract($_POST);


/*
rating1 = null;
if($answer == "rating_input_1"){
	$rating1="1";
}
elseif($answer == "rating_input_2"){
	$rating1="2";
}
elseif($answer == "rating_input_3"){
	$rating1="3";
}
elseif($answer == "rating_input_4"){
	$rating1="4";
}
elseif($answer == "rating_input_5"){
	$rating1="5";
}
*/


/*
lllllllllllll;
$rating1 = null;
if(isset($_POST['rating_input_1'])){
	$rating1="1";
}
elseif(isset($rating_input_2)){
	$rating1="2";
}
elseif(isset($rating_input_3)){
	$rating1="3";
}
elseif(isset($rating_input_4)){
	$rating1="4";
}
elseif(isset($rating_input_5)){
	$rating1="5";
}
print($rating1);
*/
// $rating1=$answer;
// print($rating1);
// $rating1="10";
// print($rating1);
// print('foooooooooooooooo!!!!!!');




/*
witch(strval($answer)){
	case "rating_input_1":
	        $rating1 = "1";
	break;
	case "rating_input_2":
	        $rating1 = "2";
	break;
	case "rating_input_3":
	        $rating1 = "3";
	break;
	case "rating_input_4":
	        $rating1 = "4";
	break;
	case "rating_input_5":
	        $rating1 = "5";
	break;
}
*/


print('Inside rating_curl.php<br/>');
print('<br/>');
print("Rating using new form: ".strval($q6_rating) );
// print_r($_POST('q6_rating'));
print('<br/>');

/*
rint("rating= ".$rating1);
print('<br/>');
print('hidden: '.strval($answer));
print('<br/>');
*/
 print("name of product = ".$prod_name);
$name = substr($prod_name, 0, strlen($prod_name)-1);
print('<br/>');
print('name to post: '.$name);
print('<br/>');
print('domain: '.$domain);
print('<br/>');
print("Review: ".$q7_review);
print('<br/>');
print("username: ".$username);
print('<br/>');
$ch = curl_init();
$post='name='.$name.'&rating='.$q6_rating.'&review='.$q7_review.'&username='.$username;

curl_setopt($ch, CURLOPT_URL, $domain.'/rating.php');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$contents = curl_exec ($ch);
print('<br/>Curl Results: <br/>');
print($contents);

// TODO: test for every domain. If doesn't work, get the redirect URL as input from single.php (which is an input from gurnoorproducts.php)'
$newURL = "/272";  // $_SERVER['HTTP_HOST']."/272";
if($domain == "http://gurnoors.com"){
	$newURL = $newURL."/gurnoorproducts.php";
}
elseif($domain == "http://www.myhelpinghandonline.com"){
	$newURL = $newURL."/virajproducts.php";
}
elseif($domain == "http://labheshdeshpande.com"){
	$newURL = $newURL."/labheshproducts.php";
}
elseif($domain == "http://robotsstore.co"){
	$newURL = $newURL."sidharthproducts.php";
}
elseif($domain == "http://arunkumarweb.com/"){
	$newURL = $newURL."/arunproducts.php";
}
print($newURL);
header('Location: '.$newURL);
die();


?>
