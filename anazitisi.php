<?php
//an den patithike to submit button, dimiourgia arxikis formas anazitisis
if (!isset($_POST["submitButton"])) 
{
	$html='<!DOCTYPE html PUBLIC "-//W3C//DTT XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title> Forma </title></head>';
	$html.='<BODY>';
	$html.='<div id="myform">' ;
	$html.='<h4 id="h4style"> ΣΥΝΘΕΤΗ ΑΝΑΖΗΤΗΣΗ ΣΥΓΡΑΜΜΑΤΩΝ </h4>';
	//forma anazitisis, kalei to idio script example5.php
	$html.='<FORM METHOD="POST" ACTION="anazitisi.php">';
	
	$html.='<label for="titlelesson">Τίτλος Μαθήματος:</label>';
	$html.='<input type="text" size="29" name="title" /> ';
	
	$html.='<label for="subtitle">Υπότιτλος:</label>' ;
	$html.='<input type="text" size="29" name="subtitle" />' ;
	
	$html.=' <label for="id">Κωδικός Βιβλίου:</label> ';
	$html.='<input type="text" size="29" name="id" /> ' ;
	
	$html.='<p><label for="author">Συγγραφείς:</label>';
	$html.='<input type="text" size="29" name="author /></p> ';
	
	$html.='<label for="versionnum">Αριθμός Έκδοσης:</label>';
	$html.='<input type="text" size="29" name="versionnum" /> ';
	
	$html.='<label for="versionyear">Έτος Τόμου:</label>';
	$html.='<input type="text" size="29" name="versionyear" /> ';
	
	$html.='<p><label for="title">Τίτλος Τόμου:</label>';
	$html.='<input type="text" size="29" name="title" /></p>';
	
	$html.='<label for="number">Αριθμός Τόμου:</label>';
	$html.='<input type="text" size="29" name="number" /> ';
	
	$html.='<label for="isbn">ISBN:</label>';
	$html.='<input type="text" size="29" name="isbn" /> ';
	
	$html.='<p><label for="publisher">Εκδότης:</label>';
	$html.='<input type="text" size="29" name="publisher" /></p> ';
	
	$html.='<label for="company">Εκδόσεις:</label>';
	$html.='<input type="text" size="29" name="company /> ';
	
	$html.='<label for="type">Τύπος Συγγράμματος:</label>';
	$html.='<input type="text" size="29" name="type" /> ';
	
	$html.='<p><label for="keyword">Λέξεις Κλειδιά:</label>';
	$html.='<input type="text" size="29" name="keyword" /></p> ';
	$html.='<input type="submit" name="submitButton" value="Αναζήτηση" />';
	//pliktro submit
	
	$html.='</div></FORM></BODY></HTML>';
	print $html;
}

else
{
   $db_hostname="localhost" ;    //database server (use localhost or 127.0.0.1 if this is the same machine the web server runs on)
   $db_name = "university";		// database
   $db_user = "root";			// database username
   $db_pass = "reapanos1992";			// database password
   $link=mysqli_connect($db_hostname, $db_user, $db_pass, $db_name) or die ("Unable to connect to database");
	//sximatismos tou query
   $query="SELECT titlelesson,subtitle,id,author,versionnum,versionyear,title,number,keyword,isbn,publisher,company,type FROM book WHERE titlelesson=".$_POST["titlelesson"]." AND subtitle=".$_POST["subtitle"]." AND id=".$_POST["id"]." AND author=".$_POST["author"]." AND versionnum=".$_POST["versionnum"]." AND versionyear=".$_POST["versionyear"]." AND title=".$_POST["title"]." AND number=".$_POST["number"]." AND keyword=".$_POST["keyword"]." AND isbn=".$_POST["isbn"]." AND publisher=".$_POST["publisher"]." AND company=".$_POST["company"]." AND type=".$_POST["type"]." " ;

   	
	//ektelesi tou query
	$results = mysqli_query($link,$query) or die ("Query failed");
	
	//dimiourgia html selidas
	$html='<HTML><HEAD><TITLE>erwtima 1 after submit</TITLE></HEAD>';
	$html.='<BODY>';
   
   //an epistrafikan apotelesmata
	if (mysqli_num_rows($results) > 0) 
	{   $html.= '<a href="erotima1.php" > Epistrofh sthn arxikh selida </a>' ;
		$html.='<p>Apotelesmata: <p/>';
		$html.='<TABLE cellpadding="0" cellspacing="0" border="1" width="400">';
		$html.='<TR><TD>emp_id</TD><TD>first_name</TD><TD>last_name</TD><TD>dept_name</TD><TD>hire_date</TD></TR>';
		//pairnw ena-ena ta apotelesmata
		while ($row = mysqli_fetch_object($results))
		{
			//typwnw id, onoma, epwnymo
			$html.='<TR><TD>'.$row->titlelesson.'</TD><TD>'.$row->subtitle.'</TD><TD>'.$row->id.'</TD><TD>'.$row->author.'</TD><TD>'.$row->versionnum.'</TD><TD>'.$row->versionyear.'</TD><TD>'.$row->title.'</TD><TD>'.$row->number.'</TD><TD>'.$row->isbn.'</TD><TD>'.$row->publisher.'</TD><TD>'.$row->company.'</TD><TD>'.$row->type.'</TD></TR>';
		}
		$html.='</TABLE>';
	}
	//alliws, an den epistrafikan apotelesmata
	else
	{
		$html.='Den brethikan apotelesmata';
		$html.= '<a href="erotima1.php" > Epistrofh sthn arxikh selida </a>' ;
	}
	$html.='</BODY></HTML>';
	print $html;
	mysqli_close($link);
}

?>