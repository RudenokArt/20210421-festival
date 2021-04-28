<?php
/**
 * Отправка почты через PHP (SMTP)
 * Сделано в Live-code.ru
 * Автор: Mowshon
 * Дата: 11.11.11
 */

// Подключаем SMTP класс для работы с почтой
include_once('km_smtp_class.php');

// Конфигурационный массив
$SenderConfig = array(
  "SMTP_server"   =>  "smtp.yandex.ru",
  "SMTP_port"     =>  "465",
  "SMTP_email"    =>  "miramarfestival@yandex.ru",
  "SMTP_pass"     =>  "mira2021",
  "SMTP_type"     =>  "SSL"
);

// Email получателя/Получателей
//$Receiver = "rudenokart@yandex.ru";
// Тема сообщения
//$Subject = "subject";

// Текст сообщения (в HTML)
// $Text = "Привет!<br />
// Сообщение отправлено из скрипта <strong>Mowshon</strong><br />
// Сайт: http://live-code.ru";

//$Text = $_POST['data'];


// Вложение в письме - адрес к файлу
$Attachment = '';

/* $mail = new KM_Mailer(сервер, порт, пользователь, пароль, тип); */
/* Тип может быть: null, tls или ssl */
$mail = new KM_Mailer($SenderConfig['SMTP_server'], $SenderConfig['SMTP_port'], $SenderConfig['SMTP_email'], $SenderConfig['SMTP_pass'], $SenderConfig['SMTP_type']);
if($mail->isLogin) {


    // Прикрепить файл
  if($Attachment) {$mail->addAttachment($Attachment);}

    // Добавить ещё получателей
    // $mail->addRecipient('user@mail.ru');
    // $mail->addRecipient('user@yandex.ru');
  

  /* $mail->send(От, Для, Тема, Текст, Заголовок = опционально) */
  $SendMail = $mail->send($SenderConfig['SMTP_email'], $Receiver, $Subject, $Text);



    // Очищаем список получателей
  $mail->clearRecipients();
  $mail->clearCC();
  $mail->clearBCC();
  $mail->clearAttachments();
}
else {
  echo "Возникла ошибка во время подключения к SMTP-серверу<br />";
}

echo " !";

?>