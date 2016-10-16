<?php
require_one("mailer/mail.php");
/* Check all form inputs using check_input function */
if ($_POST["submit"]) {

    $TeamNaam = $_POST['TeamNaam'];
    $AantalDeelnemers = $_POST['AantalDeelnemers'];
    $Vertrekuur = $_POST['Vertrekuur'];
    $email = $_POST['Email'];

    $subject = "Inschrijving avondwandeling";
$headers = 'From: ' . $email . "\r\n";

    $body = "

Er is een inschrijving ontvangen voor de avondwandeling via de website:

	    \nTeamnaam: " . $TeamNaam .
            "\nAantal deelnemers:  " . $AantalDeelnemers .
            "\nGewenst vertrekuur:  " . $Vertrekuur.
            "\nEmail: " . $email


    ;
    $body2 = wordwrap($body, 70, "\r\n");
    /* Send the message using mail() function */
    mailTo('eenheidsleiding@dekangoeroes.be', 'Inschrijving via website', $body2, $headers);


    /* Redirect visitor to the thank you page */
    header('Location: http://dekangoeroes.be/html/bevestigingInschrijvingAvondwandeling.html');
    exit();
}
