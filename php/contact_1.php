<?php
require_one("mailer/mail.php");
if ($_POST["submit"]) {
    $naam = $_POST['name'];
    $email = $_POST['email'];
    $onderwerp = $_POST['onderwerp'];
    $bericht = $_POST['message'];
    $bericht2 = wordwrap($bericht, 70, "\r\n");


    $from = 'Demo Contact Form';
    $to = 'dekangoeroes@gmail.com';
    $headers = 'From: ' . $email . "\r\n" . phpversion();
    $mailOnderwerp = 'Bericht via website: ' . $onderwerp;
    $body = "Naam: " . $naam
	    . "\nEmail: " . $email . "\n\nOnderwerp: " . $onderwerp . "\n\n\nBericht: " . $bericht2;
    mailTo('eenheidsleiding@dekangoeroes.be', $mailOnderwerp, $body, $headers);

    header('Location: http://dekangoeroes.be/html/bevestigingBericht.html');
    //exit();
} else {
    header('Location: http://dekangoeroes.be/html/contact.html');
}
