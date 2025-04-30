((header))
title:Contact
author:matt
tags:main
date:2024-04-29
((content))

<h1>Contact Me</h1>
        
<form action="/contact-php/mail.php" method="POST">
<label for="name">Name</label><br>
<input type="text" name="name" id="name" style="width:50%";><br><br>
<label for="email">Your Contact Info</label><br>
<input type="text" name="email" id="email" style="width:50%"><br><br>
<label for="subject">Subject</label><br>
<input type="text" name="subject" id="subject" value="$$subject$$" style="width:90%;">
<br><br>
<label for="captcha">
<input type="text" name="captcha" id="captcha" style="display:none;">
<label for="message">Message<span style="color:red;">*</span></label><br>
<textarea class="cform" name="message" cols="30" rows="5" minlength=20 required></textarea><br><br>
<input type="submit" value="Send">
</form>