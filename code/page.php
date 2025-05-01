<?
// Custom dynamic variables. Place at bottom of section beginning: //
//////// Setup Page Variables and Text ///////////

/// subject - if URL has ?subject=[x], [x] is stored in this dynamic variable ///

if (isset($_GET["subject"])) {
	$dynamic_content["subject"] = $_GET["subject"];
} else {
$dynamic_content["subject"] = "";
}	

/// likebutton - does nothing but show a fun Easter egg message on multiple clicks. See JavaScript in index.php ///

$dynamic_content["likebutton"] = "<button onClick=likebutton()  class='sharebutton'>Like &#128077;</button>";

/// sharebutton - uses JavaScript in index.php to copy page title and/or URL to clipboard ///


$dynamic_content["sharebutton"] = "<input id='sharebutton' type='text' value=' ' id='myInput' style='display:none;'>";

$dynamic_content["sharebutton"] .= "<button onClick='myFunction()' class='sharebutton'>Share &#x1F4E3;</button>";

/// replybutton - reveals hidden div with form to submit a pingback url, with link to launch full contact form. Relies on external PHP mailsend function. Passes the title of the current page to the ?subject= query ///

$dynamic_content["replybutton"] = "<button onClick='showForm()' class='sharebutton'>Reply &#x1f48c;</button><div class='replyhidden' id='replyform'><blockquote>If you mentioned this post on your own site and would like to notify me, please enter the URL here:<br>
<form action='/contact-php/mail.php' method='POST'><input type='text' name='name' id='name' style='width:30em'; required><input type='hidden' name='subject' value='" . $dynamic_content["title"] . "'> <input type='hidden' name='email'><input type='hidden' name='message' value='Mention'><input type='text' name='captcha' style='display:none;'> <input type='submit' value='Send'></form><br>Otherwise, click <a href='https://mattbee.zone/contact?subject=" . $dynamic_content["title"] . "'>here</a> to send a message.</blockquote></div>"; 

/// pagebuttons - combine three previous buttons into one function ///

$dynamic_content["pagebuttons"] = $dynamic_content["likebutton"] . " " .  $dynamic_content["sharebutton"] . " " .  $dynamic_content["replybutton"];

/// pat, nb, lander - custom emoji ///

$dynamic_content["pat"] = "<span class='emoji' style='background: no-repeat center url(/emoji/headpat.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["lander"] = "<span class='emoji' style='background: no-repeat center url(/emoji/lander.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["nb"] = "<span class='emoji' style='background: no-repeat center url(/emoji/nb.png); background-position:bottom; background-size: 20px 20px;'> </span>";

/// blogtop - Creates full block for the top of blog posts, including h1 title with page id element, date, and tags. Variable needs to be after tags function for links to work. ///
if (!isset($page_datetime)) {$page_datetime = "";} // needed in case no date present in header
$dynamic_content["blogtop"] = "<h1 id='pagetitle'>" . $dynamic_content["title"] . "</h1><blockquote>" . $page_datetime . "<br><br>Tags:" . $dynamic_content["tags"] . "</blockquote>";
