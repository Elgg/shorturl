<?php

	/**
	 * Elgg ShortUrl CSS extender
	 * 
	 * @package ElggShortUrl
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */

?>

#fit_it {
    padding:5px;
    margin:10px 0 10px 0;
    background:#dedede;
}

#fit_it h2 {
    padding:0;
    margin:0;
    border:none;
}
/* input url box */
#fit_it input.url_input {
	width: 600px;
	height: 30px;
	padding: 4px;
	font-family: Arial, 'Trebuchet MS','Lucida Grande', sans-serif;
	font-size: 140%;
	color:#666666;
	border:1px solid #cccccc;
	margin:10px 0 0 0;
}
#fit_it input.url_submit_button {
	background-color: #ffffff;
	color:#3399cc;/* blue */
	font-size: 11px;
	font-weight: bold;
	text-decoration:none;
	margin:10px 0px 4px 0px;
	padding:2px 4px 4px 4px;
	border:1px solid #3399cc;
	cursor:pointer;
	width:auto;
}
#fit_it input.url_submit_button:hover {
	background-color: #3399cc;/* blue */
	color:#ffffff;/* blue */
	border:1px solid #3399cc;
}
/* input box with short url */
#fit_it input.new_url {
	width: 200px;
	height: 35px;
	padding: 4px;
	font-family: Arial, 'Trebuchet MS','Lucida Grande', sans-serif;
	font-size: 160%;
	color:#ffffff;
	background-color: #3399cc;/* blue */
	border:1px solid #cccccc;
	margin:10px 0 0 0;
}

#fit_it input.new_url:hover {
    color:#000000;
}