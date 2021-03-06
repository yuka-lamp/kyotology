<?php
ini_set('display_errors', 'off');
session_start();
session_regenerate_id(true);

require './vendor/autoload.php';
require './setting.php';

$checkToken = checkToken();

if (isset($_POST['shimei'])) {
$shimei = $_POST['shimei'];
} else {
$shimei = '';
}
if (isset($_POST['furi'])) {
$furi = $_POST['furi'];
} else {
$furi = '';
}
if (isset($_POST['mail'])) {
$mail = $_POST['mail'];
} else {
$mail = '';
}
if (isset($_POST['tel'])) {
$tel = $_POST['tel'];
} else {
$tel = '';
}
if (isset($_POST['content'])) {
$content = $_POST['content'];
} else {
$content = '';
}
$form = [
'shimei' => $shimei,
'furi' => $furi,
'mail' => $mail,
'tel' => $tel,
'content' => $content
];

// メール送信
if ($checkToken) {
$sentMail = sendMail($form['mail'], $form);
$sentMail = sendAdminMail($form);
unset($_SESSION['token']);
}

function sendAdminMail($form = [])
{
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = MAIL_HOST;
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->SMTPSecure = MAIL_ENCRPT;
$mail->Port = SMTP_PORT;

// メール内容設定
$mail->CharSet = "UTF-8";
$mail->Encoding = "base64";
$mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
$mail->addAddress(MAIL_FROM);
$mail->addReplyTo($form['mail'], $form['shimei']);
$mail->Subject = MAIL_SUBJECT_ADMIN;
$body = "
以下の内容でお問い合わせがありました。
■お問い合わせ内容
------------------------
お名前：{$form['shimei']}
フリガナ：{$form['furi']}
メールアドレス：{$form['mail']}
お電話番号：{$form['tel']}
お問い合わせ内容：{$form['content']}
------------------------
";
$mail->Body = $body;

// メール送信の実行
if (!$mail->send()) {
return 'Mailer Error: '.$mail->ErrorInfo;
} else {
return 'ok';
}
}

function sendMail($toMail, $form = [])
{
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = MAIL_HOST;
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->SMTPSecure = MAIL_ENCRPT;
$mail->Port = SMTP_PORT;

// メール内容設定
$mail->CharSet = "UTF-8";
$mail->Encoding = "base64";
$mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
$mail->addAddress($toMail);
$mail->addReplyTo(MAIL_FROM, MAIL_FROM_NAME);
$mail->Subject = MAIL_SUBJECT;
$body = "
この度は、お問い合わせいただき誠にありがとうございます。

以下の内容でお問い合わせを承りました。
■お問い合わせ内容
------------------------
お名前：{$form['shimei']}
フリガナ：{$form['furi']}
メールアドレス：{$form['mail']}
お電話番号：{$form['tel']}
お問い合わせ内容：{$form['content']}
------------------------

内容を確認させていただき、担当者から改めてご連絡させていただきます。

※このメールにお心当たりの無い場合は、恐れ入りますが、下記までお問合せください。
お問合せ先：info@kyotology.com

HOTEL KYOTOLOGY
〒605-0963
京都市東山区大仏南門通大和大路東入三丁目本瓦町672番6
TEL: +81 50 3204 4328
MAIL: info@kyotology.com
URL: kyotology.com";
$mail->Body = $body;

// メール送信の実行
if (!$mail->send()) {
return 'Mailer Error: '.$mail->ErrorInfo;
} else {
return 'ok';
}
}

// チェックトークン
function checkToken()
{
if (empty($_SESSION['token']) || ($_SESSION['token'] !== $_POST['token'])) {
return false;
} else {
return true;
}
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta name="robots" content="noindex">
<meta charset="UTF-8">
<title>お問い合わせ完了｜KYOTOLOGY</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="./lib/css/header.css">
<link rel="stylesheet" href="./lib/css/footer.css">
<link rel="stylesheet" href="./lib/css/under.css">
<link rel="stylesheet" href="./lib/css/reset.css">
<link rel="stylesheet" href="./lib/css/slick.css">
<link rel="stylesheet" href="./lib/css/slick-theme.css">
<link rel="stylesheet" href="./lib/css/common.min.css">
<link rel="stylesheet" href="./lib/css/drawer.min.css">
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Noto+Sans+JP:400,500&display=swap" rel="stylesheet">
</head>

<body class="drawer drawer--left">
<!-- ローディングのアニメーション -->
<div id="is-loading">
<div id="loading">
<img src="./lib/images/common/loading.gif" alt="loadingなう" />
</div>
</div>
<div id="loading__wrapper">
<!-- ヘッダー -->
<header id="header">
<div class="sp-only">
<h1 id="sp-logo"><a href="./top.html"><img src="./lib/images/common/logo_fff.svg" alt="kyotologyロゴ"></a></h1>
</div>
<button type="button" class="drawer-toggle drawer-hamburger">
<span class="sr-only">toggle navigation</span>
<span class="drawer-hamburger-icon"></span>
</button>
<div class="dropdown top-only pc-only">
<input id="tg-01" class="dropInput-01" type="checkbox">
<label for="tg-01" class="dropLabel"><img src="./lib/images/common/icon_earth.svg" alt="地球のアイコン">JP</label>
<ul class="menu animation">
<!-- <li><a class="item" href="#">JP</a></li> -->
<li><a class="item" href="#">en</a></li>
</ul>
</div>
<div class="fixed-top flex pc-only">
<div class="dropdown">
<input id="tg-02" class="dropInput-02" type="checkbox">
<label for="tg-02" class="dropLabel"><img src="./lib/images/common/icon_earth.svg" alt="地球のアイコン">JP</label>
<ul class="menu animation">
<!-- <li><a class="item" href="#">JP</a></li> -->
<li><a class="item" href="#">en</a></li>
</ul>
</div>
<h1><a href="./top.html"><img src="./lib/images/common/logo_fff.svg" alt="kyotologyロゴ"></a></h1>
</div>
<div class="fixed-left pc-only">
<ul class="sns-link">
<li class="mb-1"><a href="#"><img src="./lib/images/common/icon_fb.svg" alt="Facebookのアイコン"></a></li>
<li><a href="#"><img src="./lib/images/common/icon_inst.svg" alt="Instagramのアイコン"></a></li>
</ul>
</div>
<div class="fixed-bottom">
<div class="booking-btn bg-gold"><a href="#">ご予約はこちら</a></div>
</div>
<a href="#about" class="scroll top-only fff">Scroll</a>
<a href="#" class="pagetop fff">TOP</a>
<nav class="drawer-nav">
<ul class="drawer-menu">
<li><a class="drawer-menu-item" href="./top.html">ホーム<span class="gold">home</span></a></li>
<li><a class="drawer-menu-item" href="./room.html">客室のご案内<span class="gold">Room information</span></a></li>
<li><a class="drawer-menu-item" href="./floor.html">館内のご案内<span class="gold">floor guide</span></a></li>
<li><a class="drawer-menu-item" href="./kyoto.html">京都観光情報<span class="gold">Room information</span></a></li>
<li>
<ul>
<li><a class="drawer-menu-item" href="./contact.html">お問い合わせ</a></li>
<li><a class="drawer-menu-item" href="./top.html#access">アクセス</a></li>
</ul>
</li>
<li class="booking-btn"><a class="drawer-menu-item strong bg-gold" href="#">ご予約はこちら</a></li>
</ul>
<div class="dropdown">
<input id="tg-03" class="dropInput-03" type="checkbox">
<label for="tg-03" class="dropLabel"><img src="./lib/images/common/icon_earth.svg" alt="地球のアイコン">JP</label>
<ul class="menu animation">
<!-- <li><a class="item" href="#">JP</a></li> -->
<li><a class="item" href="#">en</a></li>
</ul>
</div>
</nav>
</header>
<!-- ヘッダー終了 -->

<!-- メインコンテンツ -->
<main>
<section id="sub-mv" class="txt-c room">
<h2>お問い合わせ</h2>
<p class="eng">contact</p>
</section>

<section id="contact" class="sec">
<div class="wrap">
<?php if ($sentMail == 'ok'): ?>
<h2 class="txt-c">お問い合せ完了</h2>
<p class="txt-c">お問い合わせいただきありがとうございました。
<br>お問い合わせを受け付けました。
<br>
<br>折り返し、担当者よりご連絡いたしますので、
<br>恐れ入りますが、しばらくお待ちください。
<br>
<br><a href="./top.html" class="gold">トップへ戻る</a>
</p>
<?php else: ?>
<p>メール送信ができませんでした。</p>
<?php endif; ?>
</div>
</section>

<!-- フッター -->
<footer id="footer">
<div class="wrap">
<div class="">
<div class="">
<div class="images-wrap">
<img class="mb-2" src="./lib/images/common/logo_footer.svg" alt="kyotologyのロゴ">
</div>
<p>京都市東山区本瓦町672-6</p>
<p><span class="gold">tel :</span><a href="tel:+81-50-3204-4328"> +81 50 3204 4328</a><br><span class="gold">mail:</span><a href="mailto:info@kyotology.com"> info@kyotology.com</a></p>
</div>
<div class="pc-only">
<ul class="mt-1">
<li><a href="./top.html">ホーム</a></li>
<li><a href="./room.html">客室のご案内</a></li>
<li><a href="./floor.html">館内のご案内</a></li>
</ul>
<ul>
<li><a href="./kyoto.html">京都観光情報</a></li>
<li><a href="./top.html#access">アクセス</a></li>
<li><a href="./contact.html">お問い合わせ</a></li>
</ul>
</div>
<ul class="sns-link sp-only mb-1 mt-2">
<li class="mb-1"><a href="#"><img src="./lib/images/common/icon_fb.svg" alt="Facebookのアイコン"></a></li>
<li><a href="#"><img src="./lib/images/common/icon_inst.svg" alt="Instagramのアイコン"></a></li>
</ul>
</div>
<!-- facebook -->
</div>
<div class="footer-small">
<div class="wrap flex">
<ul>
<li><a href="./privacy-policy.html">プライバシーポリシー</a></li>
<li><a href="./terms.html">特定商取引法に基づく表示</a></li>
<li><a href="./sitemap.html">サイトマップ</a></li>
<li><small>© 2019 kyotology</small></li>
</ul>
</div>
</div>
</footer>
<!-- フッター終了 -->
</main>
<!-- メインコンテンツ終了 -->

<script type="text/javascript" src="./lib/js/jquery.min.js"></script>
<script type="text/javascript" src="./lib/js/iscroll.js"></script>
<script type="text/javascript" src="./lib/js/drawer.min.js"></script>
<script type="text/javascript" src="./lib/js/slick.min.js"></script>
<script type="text/javascript" src="./lib/js/app.js"></script>
<script type="text/javascript" src="./lib/js/jquery.bgswitcher.js"></script>

</body>

</html>
