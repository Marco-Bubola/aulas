<?php
echo "  <h1>Gerador de QR Code</h1>";
include_once('./vendor/autoload.php');
if (isset($_POST['qr'])) {
  $url = $_POST['qr'];
  $qrcode = (new \chillerlan\QRCode\QRCode())->render($url);

  echo "<img src='$qrcode'>";
} else {
  echo "Insira um texto ou URL para gerar o QR Code.";
}
echo "<br><a href='index.php'>Voltar</a>";
