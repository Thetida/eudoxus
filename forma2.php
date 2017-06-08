<?php
//an den patithike to submit button, dimiourgia arxikis formas anazitisis
if (!isset($_POST["submitButton"])) 
{
	$html='<!DOCTYPE html PUBLIC "-//W3C//DTT XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title> Forma </title><link rel="stylesheet" href="style.css" media="screen" /></head>';
	$html.='<BODY>';
	$html.='<div id="myform">' ;
	$html.='<h4 id="h4style"> ΣΤΟΙΧΕΙΑ ΛΟΓΑΡΙΑΣΜΟΥ ΧΡΗΣΤΗ </h4>';
	//forma anazitisis, kalei to idio script example5.php
	$html.='<FORM METHOD="POST" ACTION="forma2.php">';
	$html.=' <p> <label for="name">Ονοματεπώνυμο:</label>';
	$html.='<input type="text" size="29" name="name" /> </p> ';
	//pedio keimenou
	$html.='<p> <label for="nameUser">Όνομα Χρήστη:</label>' ;
	$html.='<input type="text" size="29" name="nameUser" /> </p>' ;
	$html.='<p> <label for="pass">Κωδικός Πρόσβασης:</label> ';
	$html.='<input type="password" size="29" name="pass" /> </p>' ;
	
	$html.='<p> <label for="password2">Επιβεβαίωση Κωδικού Πρόσβασης:</label>' ;
	$html.='<input type="password2" size="29" name="password2" /> </p>' ;
	
	$html.=' <p> <label for="email">Email:</label>';
	$html.='<input type="text" size="29" name="email" /> </p>';
	
	$html.='<p> <label for="phone">Τηλέφωνο Επικοινωνίας:</label>';
	$html.='<input type="text" size="29" name="phone" /> </p>';
	
	$html.='<p> <label for="address">Διεύθυνση/Τ.Κ:</label>';
	$html.='<input type="text" size="29" name="address" /> </p>';
	
	$html.=' <p> <label for="city">Πόλη/Νομός:</label>';
	$html.='<input type="text" size="29" name="city" /> </p>';
	
	$html.=' <p> <label for="university">Ίδρυμα:</label>';
	$html.='<input type="text" size="29" name="university" /> </p>';
	
	$html.=' <p> <label for="sxoli">Σχολή:</label>';
	$html.='<input type="text" size="29" name="sxoli" /> </p>';
	
	$html.=' <p> <label for="dept">Τμήμα:</label>';
	$html.='<input type="text" size="29" name="dept" /> </p>';
	
	$html.=' <p> <label for="ex">Εξάμηνο Σπουδών:</label>';
	$html.='<input type="text" size="29" name="ex" /> </p>';
	
	$html.='<input type="submit" name="submit" value="Δημιουργία Λογαριασμού" />';
	//pliktro submit
	
	$html.='</div></FORM></BODY></HTML>';
	print $html;
}
//an patithike to submit button, ektelesi query kai emfanisi apotelesmatwn
else
{
	$db_hostname = "localhost";		//database server (use localhost or 127.0.0.1 if this is the same machine the web server runs on)
	$db_name = "mycompany";		// database
	$db_user = "root";			// database username
	$db_pass = "";			// database password
	$link=mysqli_connect($db_hostname, $db_user, $db_pass, $db_name) or die ("Unable to connect to database");
	//sximatismos tou query
	$query = 'SELECT emp_id, first_name, last_name, hire_date FROM employee WHERE hire_date >"'.$_POST["searchDate"].'"';
		
	//ektelesi tou query
	$results = mysqli_query($link,$query) or die ("Query failed");
	
	//dimiourgia html selidas
	$html='<HTML><HEAD><TITLE>example 5 after submit</TITLE></HEAD>';
	$html.='<BODY>';
	$html.= '<a href="./forma2.php">asdcasdasfasd </a>' ;

	//an epistrafikan apotelesmata
	if (mysqli_num_rows($results) > 0) 
	{
		$html.='Apotelesmata:';
		$html.='<TABLE cellpadding="0" cellspacing="0" border="1" width="400">';
		$html.='<TR><TD>id</TD><TD>onoma</TD><TD>epwnymo</TD><TD>hire date</TD></TR>';
		//pairnw ena-ena ta apotelesmata
		while ($row = mysqli_fetch_object($results))
		{
			//typwnw id, onoma, epwnymo
			$html.='<TR><TD>'.$row->emp_id.'</TD><TD>'.$row->first_name.'</TD><TD>'.$row->last_name.'</TD><TD>'.$row->hire_date.'</TD></TR>';
		}
		$html.='</TABLE>';
	}
	//alliws, an den epistrafikan apotelesmata
	else
	{
		$html.='Den brethikan apotelesmata';
	}
	$html.='</BODY></HTML>';
	print $html;
	mysqli_close($link);
}

?>