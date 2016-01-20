<?php
require 'htm2pdfapi.php';

try {
	$pdf = new Htm2PdfApi (youruserid, 'yourapikey');  // replace youruserid and 'yourapikey' with your own data
	
	// basic usage example - this is how you convert Google to PDF and display the PDF to the user
	$pdf->CreateFromURL ('www.google.com');
	$pdf->Display();
	
	// for more advanced use cases , please explore all the functions below
	
	// general settings
	
	//$pdf->SetServer('europe');				// use this if you want to use a specific regional server or if you subscribed to a dedicated or unmetered server - shared servers are 'europe', 'asia' and 'usa'
	//$pdf->SetCurlTimeOut(30);					// your default Curl timeout is 10 seconds, if you convert large files or are on a slow network then please increase this

	// setting options
	
	//$pdf->SetPageSize('Letter');				// if you want to change the page size to 'Letter'
	//$pdf->SetPageOrientation('Portrait');		// if you want to change the orientation to Landscape or Portrait
	//$pdf->SetMargins(5,5,5,5,'mm');			// if you want to change the margins, the unit can be 'mm', 'pt' or 'in'
	//$pdf->SetGrayscale('off');				// if you want to enable ("on") or disable ("off") grayscale
	//$pdf->SetJavaScript('off');				// if you want to enable ("on") or disable ("off") JavaScript
	//$pdf->SetJavaScriptDelay(100);			// if you want to set the time to wait for JavaScript to complete to 100msec
	//$pdf->SetImages('on');					// if you want to enable ("on") or disable ("off") images
	//$pdf->SetBackground('off');				// if you want to enable ("on") or disable ("off") the background
	//$pdf->SetCssMediaType('print');			// if you want to use the ("print") instead of the default ("screen") CSS media type
	
	// header & footer settings
	
	//$pdf->SetHeader('<html>...</html>');		// if you want to set a custom header in HTML
	//$pdf->SetFooter('<html>...</html>');		// if you want to set a custom footer in HTML
	//$pdf->SetPageOffset(1);					// if you want to add a number (in this case 1) to the page numbers, which you can use in your header or footer
	
	// using watermarking & stamping
	// watermarks/stamps can go anywhere on the page, position 0,0 is the top left corner of the CONTENT, if you want to watermark the margins use negative positions
	
	//$pdf->SetWatermarkLocation(100,100);			// If you want to put your watermark at position (100,100)
	//$pdf->SetWatermarkTransformation(45,1,2,2);	// If you want to rotate your watermark 45 degrees, make it fully opague (like a stamp) and make it twice as big in both directions
	//$pdf->SetWatermarkImage('http://www.htm2pdf.co.uk/img/logo.png');	// If you want to use our logo as watermark
	//$pdf->SetWatermarkText('DRAFT','Tahoma','#FF0000', 64);			// If you want to put 'DRAFT' as a watermark in the Tahoma font, size 64 and color red
	
	// using stationary, also know as (full) page backgrounds
	// stationary can stretch over the whole page in the background, position 0,0 is the top left corner of your page
	
	//$pdf->SetStationaryLocation(100,100);			// If you want to put your stationary/background image(s) at position (100,100)
	//$pdf->SetStationaryTransformation(0,1,0,0);	// If you want make it fully opague and stretch it over full background horizontally and vertically
	//$pdf->SetStationaryImages('http://www.htm2pdf.co.uk/img/logo.png');	// If you want to use our logo as the background stationary for the first page, and also for the next pages and the last page, since you didn't specify those in this example
	
	// authorization settings
	
	//$pdf->SetHttpAuthentication('user','pass');	// If you want to authorize our client with HTTP Authentication user name 'user' and password 'pass'
		
	// setting encryption, password protection & rights management
	
	//$pdf->SetEncryptionLevel(128, false);		// if you want to encrypt the document with 128 RC4 encryption
	//$pdf->SetPasswords('master', 'user');		// if you want to set the owner password to 'master' and the document open password to 'user'
	//$pdf->SetPermissions(false, false, false, false, false);	// if you want to disallow all permissions (no printing, no copying, no modification, no access for visually impaired)
	
	// conversion from HTML and merging PDFs
	
	//$pdf->CreateFromURL ('www.google.com');		// if you want to convert a URL
	
	//$pdf->CreateFromHTML ('<html><head></head><body>your html ..</body></html>');	// if you want to convert raw HTML
	//$pdf->CreateFromFile ('/home/8613268/html/website.com/test.html');			// if you want to convert a file on your local server
	//$pdf->CreateFromForm (1, $params);											// if you want to convert a form that we host for you
	//$pdf->MergeFromCache(2,array('1,4','z-1'));									// if you want to merge the last two files we converted for you, the 2nd parameter is optional if you want to merge them fully; in this case you merge page 1 and 4 of the 1st file, with all pages in reverse order from the 2nd pdf 
	
	// saving & displaying the PDF
	
	//$pdf->Save('html.pdf');		// if you want to save the PDF on your system
	//$pdf->DisplayInline();		// if you want to display the PDF inline in the user's browser
	
	//$pdf->Display();				//  if you want to display the PDF as attachment for your user
	
	//$pdf->Display('mypdf.pdf');	// if you want to display the PDF as attachment with your own specific filename for your user
	
} catch (Exception $error) {
	echo $error->getMessage(); 		// echos the message including the code e.g. 401 - Authorization Required
	echo $error->getCode(); 		// echos the code of the error e.g. 401
}
?>