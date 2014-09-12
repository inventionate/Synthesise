<?php namespace Synthesise\Extensions;

class Parser
{

	/**
	* Normalisiert die übergebenen URL
	**/
	public function normalizeURL($url)
	{
		return urlencode($url);
	}

	/**
	 * HTML für PDF generieren
	 * Erzeugt einen HTML String, der
	 *
	 * @return string des für die PDF-Konvertierung formatierten Markups
	 *
	 */
	 public function htmlMarkup($title, $content)
	 {

	 	$html = file_get_contents(__DIR__.'/pdf_template/default.html');
	 	$html = str_replace("{{TITLE}}",$title,$html);
	 	$html = str_replace("{{CONTENT}}",$content,$html);
	 	return $html;

	 }

	 /**
	  * Nomalisiert einen übergebenen Namen
	  *
	  */
	  public function normalizeName($name)
	  {
		  return strtolower(str_replace(array(' ','-','–','—','?','!','ä','ö','ü','ß'),array('_','_','_','_','','','ae','oe','ue','ss'),$name));
	  }
}
