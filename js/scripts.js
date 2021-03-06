/**
* CI MCS Extension
* 
* Javascript scripts.js to be used with CI MCS Extension
* 
* @package		CI MCS Extension
* @author		Jason Davey
* @copyright	Copyright (C) 2015 Frozen Tiger Ltd.
* @license		http://www.exoiz.com/mcs_license
* @Version		3.0.0
* 
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*/

function URLEncode(string, encoding) {
	if (encoding == "ascii") {
		var i;
		var hex = "";
		for (i = 0; i < string.length; ++i) {
			hex += "%" + hexfromdec(string.charCodeAt(i));
		}
		return hex;
	} else {
		string = string.replace(/\r\n/g, "\n");
		var utftext = "";
		for (var n = 0; n < string.length; n++) {
			var c = string.charCodeAt(n);
			if (c < 128) {
				utftext += String.fromCharCode(c);
			} else if (c > 127 && c < 2048) {
				utftext += String.fromCharCode(c >> 6 | 192);
				utftext += String.fromCharCode(c & 63 | 128);
			} else {
				utftext += String.fromCharCode(c >> 12 | 224);
				utftext += String.fromCharCode(c >> 6 & 63 | 128);
				utftext += String.fromCharCode(c & 63 | 128);
			}
		}
		return escape(utftext);
	}
}

function URLDecode(encodedString, encoding) {
	if (encoding == "ascii") {
		var output = encodedString;
		var binVal, thisString;
		var myregexp = /(%[^%]{2})/;
		while ((match = myregexp.exec(output)) != null &&
		match.length > 1 && match[1] != "") {
			binVal = parseInt(match[1].substr(1), 16);
			thisString = String.fromCharCode(binVal);
			output = output.replace(match[1], thisString);
		}
		return output;
	} else {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;
		while (i < encodedString.length) {
			c = encodedString.charCodeAt(i);
			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			} else if (c > 191 && c < 224) {
				c2 = encodedString.charCodeAt(i + 1);
				string += String.fromCharCode((c & 31) << 6 | c2 & 63);
				i += 2;
			} else {
				c2 = encodedString.charCodeAt(i + 1);
				c3 = encodedString.charCodeAt(i + 2);
				string += String.fromCharCode((c & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
				i += 3;
			}
		}
		return unescape(string);
	}
}
function flash(url, w, h) {
	document.write("<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"" + w + "\" height=\"" + h + "\">\n");
	document.write("<param name=\"movie\" value=\"" + url + "\" />\n");
	document.write("<param name=\"quality\" value=\"high\">\n");
	document.write("<embed src=\"" + url + "\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"" + w + "\" height=\"" + h + "\"></embed>\n");
	document.write("</object>\n");
}

function nl2br(str){
    return (str + '').replace(/([^>])\n/g, '<br>\n');
}

function br2nl(str){
    return str.replace(/<br\s*\/?>/mg,"\n");
}