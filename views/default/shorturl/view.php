<?php

	/**
	 * Elgg shortUrl tool
	 * 
	 * @package ElggShortUrl
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */
	 
	 //grab the submitted url
	 $url_to_convert = $vars['submitted_url'];
	 
	 // call the main action and display the results
     echo createUrl($url_to_convert);
     
?>