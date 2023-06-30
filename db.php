<?php 
// $BASEDIR=$_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['REQUEST_URI']);
// if(strlen($BASEDIR)-stripos($BASEDIR,'api')==3){
//     $BASEDIR=str_replace('/api','',$BASEDIR);
// }
// include_once $BASEDIR."/Controller/DB.php";
include_once "./Controller/DB.php";

date_default_timezone_set("Asia/Taipei");

session_start();

$msg=[
    1=>"本調查為會員限定，請登入後再進行投票",
    2=>"本調查已結束，請進行其它調查"
];



function q($sql){
    $dsn="mysql:host=localhost;charset=utf8;dbname=vote";
    $pdo=new PDO($dsn,'root','');

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


function to($url){
    header("location:".$url);
}



$Topic=new DB('topics');
$Option=new DB('options');
$Log=new DB('logs');
$User=new DB('members');
?>