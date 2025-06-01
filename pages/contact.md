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
<label for="email">Contact email (will not be published)</label><br>
<input type="text" name="email" id="email" style="width:50%"><br><br>
<label for="subject">Subject</label><br>
<input type="text" name="subject" id="subject" value="$$subject$$" style="width:90%;">
<br><br>
<label for="captcha">
<label for="captcha">Which word sounds like the last word of the title of this website: advocate, benefactor, patron, sponsor, supporter<span style="color:red;">*</span></label><br>
<input type="text" name="captcha" id="captcha" required><br><br>
<label for="message">Message<span style="color:red;">*</span></label><br>
<textarea class="cform" name="message" cols="30" rows="5" minlength=20 required></textarea><br><br>
<input type="submit" value="Send">
</form>