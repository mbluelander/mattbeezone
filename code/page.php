<?
// Custom dynamic variables. Place at bottom of section beginning: //
//////// Setup Page Variables and Text ///////////

/// recent - get last 3 blog posts using RSS2HTML ///

//$dynamic_content["recent"] = '<script src="https://embeds.rss2html.net/embed.js?url=https%3A%2F%2Fmattbee.zone%2Frss.xml&amp;embed_default_styles=0&amp;embed_default_scripts=0&amp;embed_render_copy_link=0&amp;embed_render_title=0&amp;feed_title_fallback=+&amp;feed_render_image=0&amp;feed_title_link_open_new_tab=0&amp;feed_render_description=0&amp;item_count=3&amp;item_title_link_open_new_tab=0&amp;item_render_feed_title_prefix=0&amp;item_render_body=0&amp;item_published_label=&amp;item_published_format=%25b+%25d,+%25Y&amp;item_title_tag=p"></script>';//

$dynamic_content["recent"] = "<iframe src='recent.html' style='border:none; height:400px; width:100%;' scrolling=no></iframe>";



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

/// replybutton - launches external contact form, passing $$title$$ to ?subject ///

$dynamic_content["replybutton"] = "<button onClick='showForm()' class='sharebutton'>Reply &#x1f48c;</button><div class='replyhidden' id='replyform'><blockquote>If you mentioned this post on your own site and would like to notify me, please enter the URL here:<br>
<form action='/contact-php/mail.php' method='POST'><input type='url' name='name' id='name' style='max-width:80%;' size=50 required><input type='hidden' name='subject' value='" . $dynamic_content["title"] . "'> <input type='hidden' name='email'><input type='hidden' name='message' value='Mention'><input type='text' name='captcha' value='sponsor' style='display:none;'> <input type='submit' value='Ping me!'></form><br><br>If you have an account on the <a href='https://fediverse.party/'>fediverse</a>, you can reply to the post in the <a href='https://gamemaking.social/@minterpunct/tagged/alhm'>Mastodon feed</a>.<br><br>Otherwise, <a href='https://mattbee.zone/contact?subject=" . $dynamic_content["title"] . "'>click here</a> to send a message.</blockquote></div>"; 

/// savebutton - save article to internet archive ///

$dynamic_content["savebutton"] = "<button onClick='showIA()' class='sharebutton'>Save 🏛️</button>"; 

/// pagebuttons - combine three previous buttons into one function ///

$dynamic_content["pagebuttons"] = $dynamic_content["likebutton"] . " " .  $dynamic_content["sharebutton"] . " " .  $dynamic_content["savebutton"] . " " . $dynamic_content["replybutton"];

/// pat, nb, lander, sad, toot, mystery, pink, ohno - custom emoji ///

$dynamic_content["pat"] = "<span class='emoji' style='background: no-repeat center url(/emoji/headpat.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["lander"] = "<span class='emoji' style='background: no-repeat center url(/emoji/lander.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["nb"] = "<span class='emoji' style='background: no-repeat center url(/emoji/nb.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["sad"] = "<span class='emoji' style='background: no-repeat center url(/emoji/blobsad.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["toot"] = "<span class='emoji' style='background: no-repeat center url(/emoji/toot.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["mystery"] = "<span class='emoji' style='width:59px !important; height:20px; background: no-repeat center url(/emoji/mystery.png); background-position:bottom; background-size: 59px 20px; filter:invert(1);'> </span>";

$dynamic_content["froggy"] = "<span class='emoji' style='background: no-repeat center url(/emoji/froggy.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["pink"] = "<span class='emoji' style='background: no-repeat center url(/emoji/pink.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["ohno"] = "<span class='emoji' style='background: no-repeat center url(/emoji/ohno.png); background-position:bottom; background-size: 20px 20px;'> </span>";

$dynamic_content["wow"] = "<span class='emoji' style='background: no-repeat center url(/emoji/wow.png); background-position:bottom; background-size: 20px 20px;'> </span>";

// qotd and potd - front-page "quote of the day" and "picture of the day" modules //

$day = (int)date("d");
$month = date("m");

// quotes and images stored in individual folders with subfolders 01-12. //
include '/home/public/qotd/' . $month . '/qotd.php';
include '/home/public/potd/' . $month . '/potd.php';

// quotes stored in an array with 31 strings, retrieved by the day of the month.//
$dynamic_content["qotd"] = $quote[$day];

// pictures stored in array with 31 strings for image filename and 31 for captions. Images are stored in 1-31, captions stored in 101-131. //
$potd = "/potd/" . $month . "/" . $pic[$day];
$caption = $pic[$day + 100];

$dynamic_content["potd"] = "<img style='max-width:100%; max-height:600px;' src=" . $potd . "><p>" . $caption . "</p>";   

/// blogtop - Creates full block for the top of blog posts, including h1 title with page id element, date, and tags. Variable needs to be after tags function for links to work. ///
if (!isset($page_datetime)) {$page_datetime = "";} //needed in case no date present in header
$dynamic_content["blogtop"] = "<h1 id='pagetitle'>" . $dynamic_content["title"] . "</h1><blockquote>" . $page_datetime . "<br><br>Tags: " . $dynamic_content["tags"] . "</blockquote>";

///pagebottom - block at bottom of pages with tags and last modified time

$dynamic_content["pagebottom"] = "<div style='border-bottom:0.15em solid var(--color_main); padding: 1em 0 1em 0; display:block;'></div><blockquote>Tags: " . $dynamic_content["tags"] . "<br><br>Last modified: " . date ("F d Y H:i:s", filemtime($page_filename)) . " EDT</blockquote>";

?>
