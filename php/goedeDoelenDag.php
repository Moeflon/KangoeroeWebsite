<?php

/* Check all form inputs using check_input function */
if ($_POST["submit"]) {
//Ophalen info van het formulier
    $naam = $_POST['name'];
    $naamOuder = $_POST['nameOuder'];
    $email = $_POST['email'];
    $bedrag = $_POST['amount'];

    //Headers
    $headers = 'From: ' . $email . "\r\n";
    $headers2 = "From: eenheidsleiding@dekangoeroes.be\r\n";

    //Body voor EL mail
    $body = "Er is een nieuwe sponsoring binnengekomen:
	\r\nNaam :" . $naam .
	    "\r\nGaat volgend kind sponsoren:" . $naamOuder .
	    "\r\nEmail: " . $email .
	    "\r\nBedrag: " . $bedrag;

    //Bevestigingsmail
    $bodyOuder = "Beste"
	    . "\r\nU heeft net iemand gesponsord via onze website."
	    . "\r\nHieronder vindt u de gegevens die u aan ons doorgaf."
	    . "\r\nNa afloop van de wandeltocht sturen wij u een bericht met het aantal gestapte kilometers en het over te maken bedrag."
	    . "\r\nVoor verdere informatie kan u terecht op onze website of kan u mailen naar eenheidsleiding@dekangoeroes.be"
	    . "\r\nNaam :" . $naam .
	    "\r\nGaat volgend kind sponsoren:" . $naamOuder .
	    "\r\nEmail: " . $email .
	    "\r\nBedrag: " . $bedrag . ""
	    . "\r\nMet scoutsvriendelijke groeten"
	    . "\r\nEenheidsleiding 152e FOS de Kangoeroes";

    /* Send the message using mail() function */
    mail('eenheidsleiding@dekangoeroes.be', 'Sponsoring via website', $body, $headers);
    mail($email, "Bevestiging sponsoring Goede doelendag 152e FOS De Kangoeroes", $bodyOuder, $headers2);

    /* Redirect visitor to the thank you page */
    header('Location: http://dekangoeroes.be/html/bevestigingSponsoring.html');
    exit();
}




