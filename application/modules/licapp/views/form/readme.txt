Dear guest,

Thank you for your interest in this service of http://www.htm2pdf.co.uk.

In this package you will find the following files:

	- readme.txt
	- htm2pdfapi.php	- the SDK library
	- example.php 		- an example PHP file that shows you how you can use our SDK


Requirements:

Our SDK will work only in PHP and on systems that have cURL installed, which is usually the case. 
You can use phpinfo() to find out if you have it or not.

Please refer to PHP.net if you want to install cURL yourself (http://php.net/manual/en/book.curl.php)

Also - your web user needs write access to the temporary directory on your server to write the PDF file that you receive.
It will throw an exception if you don't and you can then either change the rights of the web user or set a different
temp directory for the library to use with the function SetTempDirectory(..).

How to use the SDK:

The example.php file is designed to get you up and running immediately. Just do the following:

1) copy the htm2pdfapi.php file to your PHP scripts directory on the server
2) edit the example.php to include your user id and apikey
3) if you are putting example.php in a different directory then htm2pdfapi.php then also change the require 
   statement at the top of the file to point to htm2pdfapi.php correctly

Now just call the example.php script from your browser and you will see that it works! 

Support:

Please check http://www.htm2pdf.co.uk/html-to-pdf-sdk and/or contact us at support@htm2pdf.co.uk if you have any further questions on how to use this.