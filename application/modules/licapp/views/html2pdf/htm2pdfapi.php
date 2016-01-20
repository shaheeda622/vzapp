<?php
/**
 * filename	:	htm2pdfapi.php
 * version	:	1.71
 *
 * You can use our HTML to PDF SDK as follows:
 *
 *		Step 1: Initiliaze the Htm2PdfApi class and (optionally) set server settings
 *
 *      $pdf = new Htm2PdfApi($userid, $apikey);
 *      
 *      $pdf->SetServer('europe');					// use this if you want to use a specific regional server or if you subscribed to a dedicated or unmetered server - shared servers are 'europe', 'asia' and 'usa'
 *      $pdf->SetCurlTimeOut(30);					// your default Curl timeout is 10 seconds, if you convert large files or are on a slow network then please increase this
 *      
 *      Step 2: (Optional) Change conversion options, which you may have set defaults for in the members area, if you want to
 *      
 *      Please see http://www.htm2pdf.co.uk/html-to-pdf-sdk for a full list of option methods and their meanings.
 *      
 *      // page conversion settings
 *      $pdf->SetPageSize(...);						// Set the page size to one of the standard formats like A4, B0, Letter etc
 *      $pdf->SetPageDimensions(...);				// Set the page size to exact dimensions or force a single page PDF
 *      $pdf->SetPageOrientation(...);				// Set the page orientation to either Portrait or Landscape
 *      $pdf->SetMargins(....);						// Set the margins
 *      $pdf->SetGrayscale(..);						// Define whether or not to create the PDF in grayscale
 *      $pdf->SetJavaScript(...);					// Define whether or not to render the Javascript as well
 *      $pdf->SetJavaScriptDelay(...);				// Define the amount of msec to wait before JavaScript completes
 *      $pdf->SetImages(...);						// Define whether or not to include images
 *      $pdf->SetBackground(...);					// Define whether or not to include the background
 *      $pdf->SetCssMediaType(...);					// Define the CSS media type that should be used for the conversion
 *      
 *      // header & footer settings
 *      $pdf->SetHeader(...);						// Define the header in HTML
 *      $pdf->SetFooter(...);						// Define the footer in HTML
 *      $pdf->SetPageOffset(...);					// Define the offset for page numbering
 *      
 *      // watermarking
 *      $pdf->SetWatermarkLocation(...);			// Define location of the watermark
 *      $pdf->SetWatermarkTransformation(...);		// Define rotation, opacity and scaling of the watermark
 *      $pdf->SetWatermarkImage(...);				// Define the URL of the watermark image
 *      $pdf->SetWatermarkText(...);				// Define the text of the watermark and it's font characteristics (font, color, size)
 *      											// Note - you can only display an image watermark OR a text watermark
 *      
 *      // stationary settings aka (full) background settings
 *      $pdf->SetStationaryLocation(...);			// Define location of the stationary background
 *      $pdf->SetStationaryTransformation(...);		// Define rotation, opacity and scaling of the stationary - set scaling to 0 for FULL BACKGROUND DISPLAY
 *      $pdf->SetStationaryImages(...);				// Define the URL of the stationary images for first page, next pages and last page
 *      
 *      // authorization settings
 *      $pdf->SetHttpAuthentication(...);			// Set user name and password for basic HTTP Authentication
 *      
 *      // encryption & password protection settings
 *      $pdf->SetEncryptionLevel(...);				// Define the encryption level for the PDF
 *      $pdf->SetPasswords(...);					// Set the owner password and the 'document open' password
 *      $pdf->SetPermissions(...);					// Set the permissions for everyone except the owner, for example if printing is allowed etc.
 *     
 *      Step 3: Choose one of the following use cases
 *      
 *      $pdf->CreateFromURL('http://www.ab.com');	// create a PDF from a URL
 *      $pdf->CreateFromHTML('<html><head>....');	// create a PDF from a string containing HTML code
 *      $pdf->CreateFromFile('/files/file.htm');	// create a PDF from a local file
 *      $pdf->CreateFromForm($form, $parameters);	// create a PDF from one of the forms we've created for you
 *      $pdf->MergeFromCache($count, $pages);		// create a PDF from one or more of the PDFs you have created before, $count says how many of the last files you want to merge and the optional $pages can be used to select specific pages or ranges
 *
 *		Step 4: Choose to either save it on your system or display it to your user
 *
 *      $pdf->Save('/files/yourfile.pdf');			// Save the PDF as local file
 *
 *      $pdf->Display();							// Display the PDF as attachment in the user's browser
 *      $pdf->Display('example.pdf');				// Display the PDF as attachment in the user's browser with filename example.pdf     
 *      $pdf->DisplayInline();						// Display the PDF inline in the user's browser
 *
 * Exception handling:
 *
 * All public functions will return true on success and false on failure.
 *  
 * Furthermore they will throw standard PHP Exceptions in case of serious errors.
 * It is therefore recommended to use the components of this API in a try / catch block as follows:
 * 
 * Try {
 * 		$pdf = new Htm2PdfApi ($userid, $apikey);
 *  	$pdf->CreateFromURL('http://www.google.com');
 *  	$pdf->Display();
 *  } catch Exception($error) {
 *  	// do something with $error->getMessage() and/or $error->getCode()
 *  }
 *  
 * Please see http://www.htm2pdf.co.uk/html-to-pdf-sdk for a list of error codes and their meanings. 
 *
 */

class Htm2PdfApi {

	private $userid, $apikey, $version='1.71', $tempfile=null, $tempdir, $cleanfilename='My PDF file', $options=array();
	private $encryption=false, $level=128, $aes='', $ownerpass='', $userpass='', $print=true, $extract=true, $modify = true, $annotate=true, $accessibility=true;
	private $curltimeout=10;
	private $subdomain='api';
	
	public function __construct($userid, $apikey) {
		$this->tempdir = sys_get_temp_dir();
		$this->userid = $userid;
		$this->apikey = $apikey;
		$this->SetWatermarkLocation();
		$this->SetWatermarkTransformation();
		$this->SetStationaryLocation();
		$this->SetStationaryTransformation();
	}

    // Remove temporary file when script completes
	public function __destruct() { if($this->tempfile!==null) unlink($this->tempfile); }

	// Allows you to set the server of your choice, please note there's no check on validity
	// By default we use the api subdomain and other standard values are 'us', 'europe', and 'asia'
	public function SetServer($server) {
		$this->subdomain = $server;
	}
	
	// Allows you to set the temporary directory for storing the PDF you receive from us in case the user processing your http requests has no access to the regular tmp directory
	public function SetTempDirectory($tmp) {
		$this->tempdir = $tmp;
	}
	// Allows you to set the timeout for Curl yourself - we default it to 20 seconds and that's usually enough to get your data
	public function SetCurlTimeOut($seconds) {
		$this->curltimeout = intval($seconds);
	}
	
	// Sets the page size to the value passed, but only if it's one of the supported page sizes
	//
	// Returns true on success and false if the page size is not supported
	public function SetPageSize($ps) {
		$allowed = array("A0","A1","A2","A3","A4","A5","A6","A7","A8","A9","B0","B1","B2","B3","B4","B5","B6","B7","B8","B9","B10","C5E","Comm10E","DLE","Executive","Folio","Ledger","Legal","Letter","Tabloid");
		if (false !== array_search($ps, $allowed)) {
			$this->options['page-size'] = $ps;
			return true;
		} else
			return false;
	}
	
	// Sets the page dimensions to the values passed, but only if the unit is correct and width>0
	//
	// If height = 0 then we will generate a single long page PDF for the whole source URL/HTML
	//
	// Returns true on success and false if the page dimensions are not supported
	public function SetPageDimensions($width, $height, $unit) {
		$allowed = array("in","mm","pt");
		$unit = strtolower($unit);
		if ((false !== array_search($unit, $allowed)) && is_numeric($width) && is_numeric($height)) {
			$this->options['page-width'] = $width . $unit;
			$this->options['page-height'] = $height . $unit;
			return true;
		} else
			return false;
	}
	
	// Sets the page orientation to the value passed, but only if it's portrait or landscape
	//
	// Returns true on success and false if the page orientation is not supported
	public function SetPageOrientation($po) {
		$po = strtolower($po);
		if (($po == 'portrait') || ($po == 'landscape')) {
			$this->options['orientation'] = $po;
			return true;
		} else
			return false;
	}
	
	// Sets the margins to the values passed, but only if the unit is one of the three types allowed and the margins are real numbers
	//
	// Returns true on success and false if the margins are not supported	
	public function SetMargins($top, $bottom, $left, $right, $unit) {
		$allowed = array("in","mm","pt");
		$unit = strtolower($unit);
		if ((false !== array_search($unit, $allowed)) && is_numeric($top) && is_numeric($bottom) && is_numeric($left) && is_numeric($right)) {
			$this->options['margin-top'] = $top . $unit;
			$this->options['margin-bottom'] = $bottom . $unit;
			$this->options['margin-left'] = $left . $unit;
			$this->options['margin-right'] = $right . $unit;
			return true;
		} else
			return false;
	}
	
	// Sets the grayscale to the value passed, but only if it's on or off
	//
	// Returns true on success and false if the passed value is not correct
	public function SetGrayscale($switch) {
		$return = true;
		$switch = strtolower($switch);
		if ($switch == 'on')
			$this->options['grayscale'] = '1';
		elseif ($switch == 'off')
			$this->options['grayscale'] = '0';
		else 
			$return = false;
		
		return $return;
	}
	
	// Sets JavaScript processing to the value passed, but only if it's on or off
	//
	// Returns true on success and false if the passed value is not correct
	public function SetJavaScript($switch) {
		$return = true;
		$switch = strtolower($switch);
		if ($switch == 'on')
			$this->options['disable-javascript'] = '0';
		elseif ($switch == 'off')
			$this->options['disable-javascript'] = '1';
		else
			$return = false;
		
		return $return;
	}
	
	// Sets JavaScript delay to the value passed, but only if it's greater than 0
	//
	// Returns true on success and false if the passed value is not correct
	public function SetJavaScriptDelay($msec) {
		$ms = intval($msec);
		if ($ms > 0) {
			$this->options['javascript-delay'] = $ms;
			return true;
		} else
			return false;
	}
	
	// Sets image inclusion to the value passed, but only if it's on or off
	//
	// Returns true on success and false if the passed value is not correct
	public function SetImages($switch) {
		$return = true;
		$switch = strtolower($switch);
		if ($switch == 'on')
			$this->options['no-images'] = '0';
		elseif ($switch == 'off')
			$this->options['no-images'] = '1';
		else
			$return = false;
		
		return $return;
	}
	
	// Sets background display to the value passed, but only if it's on or off
	//
	// Returns true on success and false if the passed value is not correct
	public function SetBackground($switch) {
		$return = true;
		$switch = strtolower($switch);
		if ($switch == 'on')
			$this->options['no-background'] = '0';
		elseif ($switch == 'off')
			$this->options['no-background'] = '1';
		else
			$return = false;
		
		return $return;
	}
	
	// Sets CSS Media Type to the value passed, but only if it's 'print' or 'screen'
	//
	// Returns true on success and false if the passed value is not correct
	public function SetCssMediaType($switch) {
		$return = true;
		$switch = strtolower($switch);
		if ($switch == 'screen')
			$this->options['print-media-type'] = '0';
		elseif ($switch == 'print')
		$this->options['print-media-type'] = '1';
		else
			$return = false;
	
		return $return;
	}
	
	// Define the header in HTML
	//
	// Returns true on success and false if the passed value is an empty string
	public function SetHeader($headerhtml) {
		$html = trim($headerhtml);
		if (strlen($html)) {
			$this->options['header-html'] = $html;
			return true;
		} else
			return false;
	}
	
	// Define the footer in HTML
	//
	// Returns true on success and false if the passed value is an empty string
	public function SetFooter($footerhtml) {
		$html = trim($footerhtml);
		if (strlen($html)) {
			$this->options['footer-html'] = $html;
			return true;
		} else
			return false;
	}
	
	// Define the page offset
	public function SetPageOffset($offset) {
		$this->options['page-offset'] = intval($offset);
	}
	
	/* Sets the encryption level to the parameters specified, possible input:
	 * 
	 *  level: 
	 *  	40: 40 bit RC4
	 *  	128: 128 bit RC4 or AES (depending on AES switch)
	 *  	256: 256 AES encryption
	 *  	other values -> 128 bit encryption 
	 *  aes: only relevant for 128-bit encryption
	 *  	true: aes encryption on
	 *  	false: aes encryption off
	 * 
	 */
	public function SetEncryptionLevel($level, $aes=false) {
		switch ($level) {
			case 40:
			case 128:
			case 256:
				$this->level = $level;
				break;
			default:
				$this->level = 128;
				break;
		}
		$this->aes = $aes;
		$this->encryption=true;
	}
	
	// Sets the owner password (controls the encryption and rights parameters) and user password (needed to open the PDF)
	public function SetPasswords ($ownerpass, $userpass) {
		$this->ownerpass = $ownerpass;
		$this->userpass = $userpass;
		$this->encryption=true;
	}
	
	/* Sets the permissions for the PDF
	 * 
	 * $print :
	 * 	true: allow printing
	 *  false: disallow printing
	 * $modify :
	 * 	true: allow document modification
	 *  false: disallow document modification
	 * $copy : 
	 * 	true: allow copying of content
	 * 	false: disallow copying of content
	 * $annotate:
	 * 	true: allow comment authoring and form operations
	 * 	false: disallow comment authoring and form operations
	 * $accessibility (only relevant for 128-bit encryption and under)
	 * 	true: allow access to visually impaired
	 * 	false: disallow access to visually impaired
	 */
	public function SetPermissions($print=true, $modify=true, $copy=true, $annotate=true, $accessibility=true) {
		$this->print = $print;
		$this->modify = $modify;
		$this->extract = $copy;
		$this->annotate = $annotate;
		$this->accessibility = $accesibility;
		$this->encryption=true;
	}
	
	/* Sets the location of the watermark
	 * 
	 * $x: x location, this should be an integer value >=0
	 * $y: y location, this should be an integer value >=0
	 */
	public function SetWatermarkLocation($x=0, $y=0) {
		$this->options['wm_x'] = intval($x);
		$this->options['wm_y'] = intval($y);
	}
	
	/* Sets the transformation characteristics of the watermark
	 *
	* $angle: angle in degrees to which the watermark is rotated - this is clockwise and should be an integer >=0 and <=360
	* $opacity: opacity of the watermark, this is a float between 0 and 1, 0 is completely transparant and 1 is completely opague
	* $scaling_x: scaling factor in the horizontal direction, 1 = normal size, 2 = twice as wide, 0.5 = half as wide
	* $scaling_y: scaling factor in the vertical direction, 1 = normal size, 2 = twice as tall, 0.5 = half as tall
	*/
	public function SetWatermarkTransformation($angle=0, $opacity=1, $scaling_x=1, $scaling_y=1) {
		$ret = true;
	
		$a = intval($angle); $o = floatval($opacity); $sx = floatval($scaling_x); $sy = floatval($scaling_y);
		if ($a<0 || $a>360) { // the angle should be between 0 and 360 degrees
			$a=0; $ret = false;
		}
		if ($o<0 || $o>1) { // the opacity should be between 0 and 1
			$o=1; $ret = false;
		}
		if ($sx<=0) { // only positive scaling is possible
			$sx = 1; $ret = false;
		}
		if ($sy<=0) { // only positive scaling is possible
			$sy = 1; $ret = false;
		}
		
		$this->options['wm_angle'] = $a;
		$this->options['wm_opac'] = $o;
		$this->options['wm_sx'] = $sx;
		$this->options['wm_sy'] = $sy;
		
		return $ret;
	}
	
	/* Defines the location of the watermark image
	 * 
	 * $imageloc: url that points to the image, if needed you can upload to our server; Note we only test whether this exists at our server's side
	 * 
	 */
	public function SetWatermarkImage($imageloc) {
		
		$iloc = trim($imageloc);
		if (!$this->CheckURL($iloc)) {
			throw new Exception ("Watermark URL is invalid", 905);
			return false;
		}
		$this->options['wm_image'] = $iloc;
		
		return true;
	}
	
	/* Defines the watermark text and it's text properties
	 * 
	 * $text: the text that needs to be watermarked
	 * $fontname: the name of the font - we support e.g. Helvetica, Courier, Tahoma, Arial and many more
	 * $fontcolor: the color of the font in hexadecimal notation e.g. #FF0000 for red or #000000 for black
	 * $fontsize: the size of the font
	 */
	public function SetWatermarkText($text, $fontname="Helvetica",$fontcolor="#000000", $fontsize=64) {
		$ret = true;

		if (!strlen(trim($text))) { // you need to fill in a text, this would otherwise lead to a hard error since we can not assume anything
			throw new Exception ("Watermark text can not be empty", 906);
			return false;
		}
		$fname = trim($fontname);
		if (!strlen($fname)) { // you need to pass a fontname and otherwise we'll assume Helvetica
			$fname = "Helvetica";
			$ret = false;
		}
		$fcolor = trim($fontcolor); // if you don't pass a valid color we'll assume black
		if (!preg_match('/^#(?:[0-9a-fA-F]{3}){1,2}$/', $fcolor)) {
			$fcolor="#000000";
			$ret = false;
		}
		$fsize = intval($fontsize);
		if ($fsize<=0) { // you need to pass a positive font size
			$fsize = 64; $ret = false;
		}
		$this->options['wm_text'] = $text;
		$this->options['wm_font'] = $fname;
		$this->options['wm_fontcolor'] = $fcolor;
		$this->options['wm_fontsize'] = $fsize;
		
		return $ret;
	}
	
	/* Sets the location of the stationary aka (full) page background, starting at the utmost left upper corner of the page
	 *
	* $x: x location, this should be an integer value >=0
	* $y: y location, this should be an integer value >=0
	*/
	public function SetStationaryLocation($x=0, $y=0) {
		$this->options['bg_x'] = intval($x);
		$this->options['bg_y'] = intval($y);
	}
	
	/* Sets the transformation characteristics of the background
	 *
	* $angle: angle in degrees to which the background is rotated - this is clockwise and should be an integer >=0 and <=360
	* $opacity: opacity of the background, this is a float between 0 and 1, 0 is completely transparant and 1 is completely opague
	* $scaling_x: scaling factor in the horizontal direction, 1 = normal size, 2 = twice as wide, 0.5 = half as wide, 0 = FULL WIDTH OF THE PAGE
	* $scaling_y: scaling factor in the vertical direction, 1 = normal size, 2 = twice as tall, 0.5 = half as tall, 0 = FULL HEIGHT OF THE PAGE
	*/
	public function SetStationaryTransformation($angle=0, $opacity=1, $scaling_x=1, $scaling_y=1) {
		$ret = true;
	
		$a = intval($angle); $o = floatval($opacity); $sx = floatval($scaling_x); $sy = floatval($scaling_y);
		if ($a<0 || $a>360) { // the angle should be between 0 and 360 degrees
			$a=0; $ret = false;
		}
		if ($o<0 || $o>1) { // the opacity should be between 0 and 1
			$o=1; $ret = false;
		}
		if ($sx<0) { // only positive scaling is possible (or 0, which is full width)
			$sx = 1; $ret = false;
		}
		if ($sy<0) { // only positive scaling is possible (or 0, which is full height)
			$sy = 1; $ret = false;
		}
	
		$this->options['bg_angle'] = $a;
		$this->options['bg_opac'] = $o;
		$this->options['bg_sx'] = $sx;
		$this->options['bg_sy'] = $sy;
	
		return $ret;
	}
	
	/* Defines the locations of the stationary akak background images
	 * 
	 * $i1: the image for the 1st page
	 * $i2: the image for all pages, which are not the 1st or the last page
	 * $i3: the image for the last page
	 *
	* $i1, $i2, $i3: urls that point to images, if needed you can upload to our server; Note we only test whether this exists at our server's side, not if they are valid images
	*
	*/
	public function SetStationaryImages($i1, $i2='', $i3='') {
	
		if ($this->CheckURL($i1) && ($this->CheckURL($i2) || $i2=='') && ($this->CheckURL($i3) || $i3 == '')) {
			$this->options['bg_img1'] = trim($i1);
			$this->options['bg_img2'] = trim($i2);
			$this->options['bg_img3'] = trim($i3);
			return true;
		} else {
			throw new Exception ("Stationary background URL is invalid", 907);
			return false;
		}
	}
	
	// Sets the user name and password for basic HTTP authentication, which we'll use to get the page for conversion
	//
	// Returns true on success or false when user name or password is empty
	public function SetHttpAuthentication($username, $password) {
		if (strlen(trim($username)) && strlen(trim($password))) {
			$this->options['username'] = trim($username);
			$this->options['password'] = trim($password);
			return true;
		} else
			return false;
	}
	
	// Creates a PDF by converting a web page indicated by a URL
	public function CreateFromURL ($url) {
		$u = trim($url);
		if ($this->CheckURL($u)) {
			$this->cleanfilename = str_replace('.','_',$u) . '.pdf';
			return $this->CallServer(1, $u);
		} else {
			throw new Exception ("URL is invalid", 900); 
			return false;
		}	
	}
	
	// Creates a PDF by converting plain HTML
	public function CreateFromHTML ($html) {
		if (strlen(trim($html))) {
			return $this->CallServer(2, $html);
		} else {
			throw new Exception ("HTML string can not be empty", 901); 
			return false;
		}		
	}

	// Creates a PDF based on a local file
	public function CreateFromFile ($filename) {
		$file = trim($filename);
		if (file_exists($file)) {
			if (filesize($file)) {
				return $this->CallServer(3, '@'.$file);
			} else {
				throw new Exception ("File can not be empty", 911);
				return false;
			}
		} else {
			throw new Exception ("Filename does not exist", 910);
			return false;
		}	
	}

	// Creates a PDF based on a form stored on the server, filled with the parameters specified
	public function CreateFromForm ($form, $parameters) {
		return $this->CallServer(4, $form, $parameters);
	}
	
	// Uses one or more PDFs to create a new PDF by taking pages from them and reorganizing them
	// This can be merging, but also taking pages out of the PDFs which are passed
	public function MergeFromCache ($count, $pages=array()) {
		$wrongpar = false;
		$c = intval($count);
		
		if ($c == 0) {
			throw new Exception ("You must merge from at least one PDF", 951);
			return false;
		} else {
			if (sizeof($pages)>0) {
				if (sizeof($pages)!=$c)
					$wrongpar = true;
				else
					foreach ($pages as $page) {
						$tmp = $page;
						if ($page != preg_replace("/[^\d^,^z^\-^\s]/", "", $tmp))
							$wrongpar = true;
					}
			}
			if ($wrongpar) {
				throw new Exception ("Check your merge pages parameter", 951);
				return false;
			} else {
				
				$this->options['count'] = $c;
				$this->options['pages'] = serialize($pages);
				
				return $this->CallServer(5, $form);
			}
		}
	}

    // Saves the PDF as filename
	public function Save($filename) {
		if($this->tempfile===null) return false;
		else {
			if (copy($this->tempfile,$filename)) return true;
			else {
				throw new Exception ("Not possible to save PDF file", 920);
				return false;
			}
		}
	}

    // Displays the PDF as attachment in the user's browser, you can pass a filename that the user will see as downloaded file. This filename should contain the extension .pdf
    public function Display($filename=null) {
		if ($filename !== null) 
			return $this->DisplayPDF($filename); 
		else
			return $this->DisplayPDF($this->cleanfilename);
	}
	
	// Displays the PDF inline in the user's browser
	public function DisplayInline() {
		return $this->DisplayPDF();
	}
	
/** Private functions **/
	private function DisplayPDF($filename=null) {
		if($this->tempfile===null) { return false;}
		else {
			header('Pragma: public');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Content-Type: application/pdf');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: '.filesize($this->tempfile));
		
			if($filename!==null)
				header("Content-Disposition: attachment; filename=\"$filename\"");
		
			readfile($this->tempfile);
			return true;
		}
	}
	
	private function CheckURL($u) {
		if ((strpos($u,'http://') === 0) or (strpos($u,'https://') === 0))
			return filter_var($u, FILTER_VALIDATE_URL);
		else
			return filter_var('http://' . $u, FILTER_VALIDATE_URL);
	}
	
	private function addEncryptionOptions() {
		if ($this->encryption) {
			$this->options['level'] = $this->level;
			$this->options['ownerpass'] = $this->ownerpass;
			$this->options['userpass'] = $this->userpass;
			if ($this->aes)
				$this->options['aes'] = 'y';
			else
				$this->options['aes'] = 'n';
			if ($this->extract)
				$this->options['extract'] = 'y';
			else
				$this->options['extract'] = 'n';
			if ($this->accessibility)
				$this->options['accessibility'] = 'y';
			else
				$this->options['accessibility'] = 'n';
			switch ($this->level) {
				case 40:
					if ($this->annotate)
						$this->options['annotate'] = 'y';
					else
						$this->options['annotate'] = 'n';
					if ($this->modify)
						$this->options['modify'] = 'y';
					else
						$this->options['modify'] = 'n';
					if ($this->print)
						$this->options['print'] = 'y';
					else
						$this->options['print'] = 'n';
					break;
				case 128:
				case 256:
					if ($this->modify)
						$this->options['modify'] = 'all';
					elseif ($this->annotate)
						$this->options['modify'] = 'annotate';
					else
						$this->options['modify'] = 'none';
					if ($this->print)
						$this->options['print'] = 'full';
					else
						$this->options['print'] = 'none';
					break;
			}
		}
	}
	
	private function CallServer ($method, $data, $parameters=array()) {
		if( !function_exists("curl_init") || !function_exists("curl_setopt") || !function_exists("curl_exec") || !function_exists("curl_close") ) {
			throw new Exception("cURL must be installed!", 930);
			return false;
		} else {
			$this->addEncryptionOptions();
			$apimethod = "http://" . $this->subdomain . ".htm2pdf.co.uk/advanced/$method/";
			$fields = array(
					'userid' => $this->userid,
					'apikey' => $this->apikey,
					'version'=> $this->version,
					'data' => $data,
					'method' => $method,
					'params' => serialize($parameters),
					'options' => serialize($this->options),
			);

			$this->tempfile = tempnam($this->tempdir,'tmp');
						
			if ((substr($this->tempfile, 0, strlen($this->tempdir)) == $this->tempdir) && ($fp = fopen($this->tempfile, 'w'))) {
				$ch = curl_init();
				
				curl_setopt($ch, CURLOPT_URL, $apimethod);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
				curl_setopt($ch, CURLOPT_TIMEOUT, $this->curltimeout);
				curl_setopt($ch, CURLOPT_FILE, $fp);
	
				curl_exec($ch);
				
				$errortext = curl_error($ch);
				$errorcode = curl_errno($ch);
				$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				 
				curl_close($ch);
				fclose($fp);
				
				if ($errorcode != 0) {
					throw new Exception('Curl error: ' . $errorcode . ' ' . $errortext, 800+$errorcode);    
				} elseif ($httpcode == 200) { 
					return true;
				} else {
					throw new Exception('HTTP error: ' . $httpcode, $httpcode);
	        	}
			} else
				throw new Exception("Access error - your system's web user can not write to $this->tempdir", 940);
		}
	}
}
?>