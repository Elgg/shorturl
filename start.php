<?php

	/**
	 * Elgg shortUrl plugin
	 * This basic plugin converts any length of URL into something that is 19 characters long
	 * NOTE: when the relationship has been formed between the long and short url, the first value
	 * in the relationship table 'guid_one' is the long url
	 * 
	 * @package ElggShortUrl
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

	/**
	 * ShortUrl initialisation
	 *
	 * These parameters are required for the event API, but we won't use them:
	 * 
	 * @param unknown_type $event
	 * @param unknown_type $object_type
	 * @param unknown_type $object
	 */

		function shorturl_init() {
			
			// Load system configuration
				global $CONFIG;
				
			// Extend system CSS with our own styles, which are defined in the shorturl/css view
				extend_view('css','shorturl/css');
				
			// Register a URL handler for shorturl posts
				register_entity_url_handler('shorturl_url','object','shorturl');
			
		}
		
        /**
        * This function generates a random code for the new short URL
        * The letter l (lowercase L) and the number 1
        * have been removed, as they can be mistaken
        * for each other.
        * @return num $code
        */ 
        
        function randomCode() {
    
            $chars = "abcdefghijkmnopqrstuvwxyz023456789";
            srand((double)microtime()*1000000);
            $i = 0;
            $code = '' ;
    
            while ($i <= 4) {
                $num = rand() % 33;
                $tmp = substr($chars, $num, 1);
                $code = $code . $tmp;
                $i++;
            }
    
            return $code;
        }
        
        /**
         * Function to create a small url
         *
         * @param text $url - the url to be converted
         * @return string 
         **/
         
        function createUrl($url){
            
            if (preg_match_all('/(?<!href=["\'])((ht|f)tps?:\/\/[^\s\r\n\t<>"\'\!\(\)]+)/ie', $url, $urls))   {
                 
                //grab a random 5 digit code for our new URL
                 $newUrlCode = randomCode();
                 
                //create a new short url 
                $shorturl = "http://f1t.us/" . $newUrlCode;
                 
                //save the long url - returns the newly formed GUID
                $long_url = save_url("long url", $url);
                //save the new short url - returns the newly formed GUID
                $short_url = save_url("short url", $shorturl);
                
                // check both url's saved
                if($long_url && $short_url){
                    //create a relationship between the long and short url
                    $create_relationship = add_entity_relationship($long_url, "short_url_link", $short_url);
                }
              
                //if the relationship worked return the new url
                if($create_relationship) {
                    //display the form for the user to drag the new short url into the required text area
                    return "<p><b>Select the link and drag to the text area:</b></p><input type=\"text\" onclick=\"this.select()\" value=\"{$shorturl}\" class=\"new_url\"/> [<a href=\"{$shorturl}\" class=\"test_url_link\">test the new link</a>]";
                }else{
                    return "We have a problem.";// false;
                }
                   
             }else{
                 return "That is not a url";
             }
        }
        
        /**
         * A simple function to save a url
         * @param string title
         * @param string $url
         * @return GUID | false depending on the outcome
         **/
         
         function save_url($title, $url){
             
             // Load system configuration
				global $CONFIG;
             
            // Initialise a new ElggObject
			    $shortUrl = new ElggObject();
	        // Tell the system it's a shorturl item
			    $shortUrl->subtype = "shorturl";
			// Set its owner to the current user
			    $shortUrl->owner_guid = $_SESSION['user']->getGUID();
	        // The URL tool is always public
			    $shortUrl->access_id = 2;
			// set the title
			    $shortUrl->title = $title;
			// set the description field to contain the url
			    $shortUrl->description = $url;
			    
			// save the url
			    $shortUrl->save();
			    
			//return the GUID of the newly saved url
			    return $shortUrl->guid;
			    
         }
        
        // Make sure the shouts initialisation function is called on initialisation
		    register_elgg_event_handler('init','system','shorturl_init');
        
?>