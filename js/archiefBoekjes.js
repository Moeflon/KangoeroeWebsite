//
//Eigenschappen van een boekje
function Boekje(editie, titel, scoutsjaar, filenaam, isHuidigBoekje) {
    this.editie = editie;
    this.titel = titel;
    this.scoutsjaar = scoutsjaar;
    this.filenaam = filenaam;
    this.isHuidigBoekje = isHuidigBoekje;
}
//Verzameling van alle boekjes
function BoekjeRepository()
 {
    this.boekjes = [
	new Boekje(1, "oktober - november 2014", "2014 - 2015", "scoutsboekje okt - nov 2014foto.pdf", false),
	new Boekje(2, "december - februari 2014/2015", "2014 - 2015", "scoutsboekje dec - feb 2015foto.pdf", false),
	new Boekje(3, "maart - mei 2015", "2014 - 2015", "scoutsboekje maart - mei 2015foto.pdf", false),
	new Boekje(4, "Zomerkamp 2015", "2014 - 2015", "zomerkamp2015.pdf", false),
	new Boekje(5, "Infobrochure 2015 - 2016", "2015 - 2016", "infobrochure1516.pdf", false),
	new Boekje(6, "oktober - november 2015", "2015 - 2016", "boekjeOktoberNovember.pdf", false),
	new Boekje(7, "december - januari - februari 2015/2016", "2015-2016", "boekjeDecemberJanuariFebruari.pdf", false),
        new Boekje(8, "maart - april - mei 2016","2015-2016","boekjeMaartAprilMei.pdf",false),
             new Boekje(9, "Kampboekje 2016","2015-2016","zomerkamp2016.pdf",false),
        new Boekje(10, "oktober - november 2016","2016-2017","boekjeOktoberNovember.pdf",true)
    ];

}


//Weergave van de boekjes
var boekjesView = {
    boekjesRepo: null,
    init: function ()
    {
	this.boekjesRepo = new BoekjeRepository();

	//Opvullen van select met alle boekjes
	this.keuzeToHTML();
	//Uitvoeren van toHTML voor het gekozen boekje in het select element
	document.getElementById("boekjeKeuze").onchange = function () //Boekje wordt opgezocht wanneer gebruiker een boekje aanklikt in de <select>
	{

	    var keuze = document.getElementById("boekjeKeuze").value; //Value ophalen van het gekozen boekje.


	    boekjesView.boekjeToHTML(keuze);
	}; //Einde onchange
    }//Einde init
    ,
    boekjeToHTML: function (keuze)
    {
	var huidigBoekje;
	for (var i = 0; i < this.boekjesRepo.boekjes.length; i++)
	{
	    //Vastleggen url huidig boekje en toekennen aan <option> huidig boekje
	    if (this.boekjesRepo.boekjes[i].isHuidigBoekje === true)
	    {
		huidigBoekje = boekjesView.boekjesRepo.boekjes[i].titel;
		$("#huidig").attr("value", huidigBoekje); //Huidig boekje toekennen aan de huidig <option>
	    }//Einde if
	    //Juiste boekje weergeven
	    if (this.boekjesRepo.boekjes[i].titel === keuze)
	    {
		$("#boekje").empty(); //Object dat aanwezig is verwijderen
		$("#boekje").append("<object id=\"geselecteerdBoekje\">"); //Nieuw object aanmaken
		$("#geselecteerdBoekje").attr("data", "../boekjes/" + this.boekjesRepo.boekjes[i].filenaam).attr("type", "application/pdf").attr("class", "col-md-8 boekje"); //Juiste attributen aan nieuw object geven.

		//----DEPRECATED---- Werkt niet meer. Venster wordt niet vernieuwd.
		//$("#boekjeObject").attr("data", "../boekjes/" + this.boekjesRepo.boekjes[i].filenaam);
	    }//Einde if
	}//Einde for-lus
    }//Einde boekjeToHTML
    ,
    //Functie die titels van alle boekjes naar html omzet in <select>
    keuzeToHTML: function ()
    {
	var lengte = this.boekjesRepo.boekjes.length - 1;

	for (var i = lengte; i >= 0; i--)
	{
	    var j = 0;
	    var nieuweOption = document.createElement("option");
	    nieuweOption.setAttribute("id", j + 1);
	    var nieuweOptionText = document.createTextNode(this.boekjesRepo.boekjes[i].titel);
	    nieuweOption.setAttribute("value", this.boekjesRepo.boekjes[i].titel);
	    nieuweOption.appendChild(nieuweOptionText);
	    document.getElementById("boekjeKeuze").appendChild(nieuweOption);
	    j++;
	}//Einde for-lus
    }//Einde keuzeToHTML
};//Einde boekjesView
//Script wordt uitgevoerd als de volledige pagina geladen is
window.onload = function ()
{
    boekjesView.init();
};
