<?php

    /**
	 * Elgg shorturl add form
	 * 
	 * @package ElggShortUrl
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <dave@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 */
	 
?>
<!-- required jquery function to grab the new short url -->
<script type="text/JavaScript">
 $(document).ready(function(){  
   $("#submit").click(function(){
     $("#quote p").load("<?php echo $vars['url']; ?>mod/shorturl/index.php", { url:$("#url").val()});
   });
    
 });
</script>

<!-- the actual Fit Url form -->
<div id="fit_it">
   <h2>Make that long url fit:</h2>
   <div id="quote"><p> </p></div>
   <input type="text" id="url" value="" class="url_input" /><br />
   <input type="submit" id="submit" value="Create short url" class="url_submit_button">
 </div>