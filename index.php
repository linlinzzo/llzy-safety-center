<?php
header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: DENY");
header("Referrer-Policy: no-referrer-when-downgrade");
if (isset($_GET["url"])) {
    $tourl = $_GET["url"];
$tourl = trim($tourl);
    $tourl = strip_tags($tourl);  
    $tourl = htmlspecialchars($tourl);
    $tourl = addslashes($tourl);
$tempu = parse_url($tourl);  
$domain = $tempu['host'];  
$myfile = fopen("blacklist.txt", "r");
$var = explode("\n",fread($myfile,filesize("blacklist.txt")));
fclose($myfile);
if(in_array($domain,$var)){
    header('Location: https://www.linlinzzo.top/safety/banned.html');
exit;
}
if(strpos($tourl,'https://') !== false){} else{
 echo '传入的目标网址不包含https协议头，请对协议进行补全。'; 
exit;
}
}
if (isset($_GET["token"])) {
if($_GET["token"]==1234567890) {
header('Location:'. $tourl);
}
}
?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Security-Policy" content="default-src 'none'; script-src 'self' https://static.cloudflareinsights.com; style-src 'self'; connect-src 'self'; img-src 'self';">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link rel="stylesheet" type="text/css" href="https://www.linlinzzo.top/safety/main.css" />
<title>林林杂语 - 安全中心</title>

</head>
<body>
<div class="wrapper">
<div class="content">
<h1>你将跳转到一个新网页</h1>
<p class="info">您即将离开原先的网页，现在你在林林杂语安全中心，我们正在确定你的跳转意图。在点击“继续访问”时，请确定你没有被脚本恶意跳转。另外，请注意您的帐号和财产安全。</p>
<p class="link"><?php if (isset($tourl)) {echo $tourl;} ?></p>
</div>
<div class="actions">
<a class="button" href="<?php if (isset($_GET["url"])) {echo $tourl;} ?>">继续访问</a>
</div>
</div> 
</body>
</html>
