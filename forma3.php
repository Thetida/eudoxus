<?php
//an den patithike to submit button, dimiourgia arxikis formas anazitisis
if (!isset($_POST["submitButton"])) 
{
	$html='<!DOCTYPE html PUBLIC "-//W3C//DTT XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title> Forma </title><link rel="stylesheet" href="style.css" media="screen" /></head>';
	$html.='<BODY>';
	$html.='<div id="myform">' ;
	$html.='<h4 id="h4style"> ΕΙΣΟΔΟΣ </h4>';
	//forma anazitisis, kalei to idio script example5.php
	$html.='<FORM METHOD="POST" ACTION="forma3.php">';
	$html.='<p> <label for="nameUser">Όνομα Χρήστη:</label>' ;
	$html.='<input type="text" size="29" name="nameUser" /> </p>' ;
	$html.='<p> <label for="password">Κωδικός Πρόσβασης:</label> ';
	$html.='<input type="password" size="29" name="password" /> </p>' ;
	$html.='<input type="submit" name="submitButton" value="Είσοδος" />';
	$html.='<input type="reset" value="Ακύρωση" />';
	$html.='<p> <label for="nameUser">Δεν έχετε λογαριασμό;Εγγραφείτε</label>' ;
	$html.='<input type="submit" name="submitButton" value="Ξεχάσατε τον κωδικό σας;" />';
	
	//pliktro submit
	
	$html.='</div></FORM></BODY></HTML>';
	print $html;
}
//an patithike to submit button, ektelesi query kai emfanisi apotelesmatwn
else
{   
	$db_hostname = "localhost";		//database server (use localhost or 127.0.0.1 if this is the same machine the web server runs on)
	$db_name = "university";		// database
	$db_user = "root";			// database username
	$db_pass = "reapanos1992";			// database password
	$link=mysqli_connect($db_hostname, $db_user, $db_pass, $db_name) or die ("Unable to connect to database");
	//sximatismos tou query
	$query = "SELECT username,pass FROM students" ;
	
	//ektelesi tou query
	$results = mysqli_query($link,$query) or die ("Query failed");
	
	//dimiourgia html selidas
	$html='<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title> Forma </title>' ;
	$html.='<BODY>';
    $html.='Η ΕΙΣΟΔΟΣ ΣΑΣ ΠΕΤΥΧΕ!!!' ;
    $html.= '<a href="arxikh.php" > ΤΩΡΑ ΕΙΣΤΕ ΕΤΟΙΜΟΙ ΓΙΑ ΔΗΛΩΣΗ ΚΑΙ ΑΝΤΑΛΛΑΓΗ ΣΥΓΡΑΜΜΑΤΩΝ </a>' ;
	$html.='</BODY></HTML>';
	print $html;
	mysqli_close($link);
}

?>