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

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	// display the new shorturl - this is called as part of an Ajax Callback
	
        echo elgg_view("shorturl/view", array('submitted_url' => get_input('url'))); 
     
?>