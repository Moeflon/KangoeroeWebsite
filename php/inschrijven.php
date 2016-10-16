<?php
require_one("mailer/mail.php");
/* Check all form inputs using check_input function */
if ($_POST["submit"]) {

    $VoornaamKind = $_POST['VoornaamKind'];
    $AchternaamKind = $_POST['AchternaamKind'];
    $GeboortedatumKind = $_POST['GeboortedatumKind'];


    $VoornaamOuder = $_POST['VoornaamOuder'];
    $AchternaamOuder = $_POST['AchternaamOuder'];
    $email = $_POST['email'];
    $gsm = $_POST['gsm'];
    $adres = $_POST['straat'] . " " . $_POST['nummer'] . "\r\n" . $_POST['postcode'] . " " . $_POST['gemeente'];
    $broertZus = $_POST['broertjeZusje'];


    if (isset($_POST['isOudLeiding'])) {

	// Checkbox is selected
	$isOudLeiding = true;
    } else {
	$isOudLeiding = false;
	// Alternate code
    }
    $bericht = $_POST['message'];
    $bericht2 = wordwrap($bericht, 70, "\r\n");
    $subject = "Inschrijving via website";
    $headers = 'From: ' . $email . "\r\n";
    $headers2 = "From: eenheidsleiding@dekangoeroes.be\r\n";
    $body = "

Er is een inschrijving ontvangen via de website:
\nGEGEVENS KIND
	    \nVoornaam Kind: " . $VoornaamKind .
	    "\nAchternaam Kind:  " . $AchternaamKind .
	    "\nGeboortedatum Kind:  " . $GeboortedatumKind .
	    " \n\nGEGEVENS OUDER" .
	    "\nVoornaam ouder: " . $VoornaamOuder .
	    "\nAchternaam ouder: " . $AchternaamOuder .
	    "\n Oud-Leiding: " . $isOudLeiding .
	    "\nEmail ouder: " . $email .
	    "\n gsm Ouder:" . $gsm .
	    "\nAdres: " . $adres .
	    "\n\nAlgemeen" .
	    "\nBroer of zus: " . $broertZus .
	    "\nBericht:\n" . $bericht2



    ;
    $bodyOuder = "Beste
U heeft uw kind net ingeschreven via onze website. Hieronder vindt u de gegevens die u invulde.
Wij nemen contact met u op van zodra wij uw inschrijving ontvangen hebben.
\nGEGEVENS KIND
	    \nVoornaam Kind: " . $VoornaamKind .
	    "\nAchternaam kind:  " . $AchternaamKind .
	    "\nGeboortedatum kind:  " . $GeboortedatumKind .
	    " \n\nGEGEVENS OUDER" .
	    "\nVoornaam ouder: " . $VoornaamOuder .
	    "\nAchternaam ouder: " . $AchternaamOuder .
	    "\nEmail ouder: " . $email .
	    "\nGsm ouder: " . $gsm .
	    "\nAdres: " . $adres .
	    "\n\nALGEMEEN
	    \nBericht:\n" . $bericht2 .
	    "\r\n\r\nAarzel bij vragen niet om ons te contacteren op eenheidsleiding@dekangoeroes.be" .
	    "\r\nMet scoutsvriendelijke groeten\r\n"
	    . "Eenheidsleiding 152e FOS De Kangoeroes"



    ;
    $body2 = wordwrap($body, 70, "\r\n");
    /* Send the message using mail() function */
    mailTo('eenheidsleiding@dekangoeroes.be', 'Inschrijving via website', $body2, $headers);
    mailTo($email, "Bevestiging inschrijving 152e FOS De Kangoeroes", $bodyOuder, $headers2);

    /* Redirect visitor to the thank you page */
    header('Location: http://dekangoeroes.be/html/bevestigingInschrijving.html');
    exit();
}




