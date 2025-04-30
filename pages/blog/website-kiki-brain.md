((header))
title:Website, Kiki, Brain
author:matt
tags:blog, kiki, mental health, meta, programming
date:2025-04-29
((content))
<h1 id="pagetitle">$$title$$</h1>

>$$date$$
>
>Tags: $$tags$$

Most of my creative energy for the past few days has gone into  [my website](https://mattbee.zone). I'm really happy with how it's coming along. My goal was a design that combined the simplicity of my bearblog with the colorful personalization of my old neocities site, and I think I nailed it. I solved the navigation problem by putting all the major site categories in a well-designed and accessible drop-down menu in the navigation bar. I've always wanted a site with a drop-down menu, but always balked because doing it with pure CSS or a details/summary hack never looked or behaved quite the way I wanted. Like I'm sure it's possible if I beat my head against it long enough, but instead, I just used javascript. Every big website is three javascript frameworks in a trenchcoat, so I can have a little script or two. It looks great.

I think I'm pretty happy with the design and structure of my site, most of the changes I want to make now will involve hacking the PHP to streamline and automate some processes. I'm not going to rush it, because I need to take a break from programming for awhile. I love it, but I tend to get "lost in the sauce" a little bit. It's like the good version of what I experienced during my [Linux ordeal](/blog/linux-hate). Instead of addiction fueled by frustration, it's fueled by the joy of creation. It's good, but hacking the PHP will be much more challenging than anything I've done with kiki this far and I need to slow my brain down.

## Kiki

Speaking of kiki, I'm still very happy with it. There are some functions from other wiki/blog solutions I wish it had, but it's still been a joy to work with. I can't believe how long my workflow for having a website was "writing HTML in the Neocities editor". I don't like writing HTML under the best circumstances, and I love neocities philosophically, but their file management/editing UI is straight-up dog trash. Maybe it's just the devil I know, but markdown works for my brain. Making a new page on neocities involved: deciding what template I want to use, copying and pasting the template, making sure to change all the fiddly bits (there are still pages on the old portfolio site with the wrong title attribute because I just couldn't make myself care,) writing the page, checking the formatting, fixing the formatting, checking the page again, checking the links, fixing the links, and hopefully adding a link to the main page (checking it 2 or 3 more times to make sure everything works properly, usually fixing at least one more thing after it's live...)

With kiki, the process is: create a link to the new page. Click the link. Fill out metadata. Write markdown. Save. Done. I'm still not perfect, but I make way fewer mistakes because markdown *stays out of my way*. It feels like *__writing++__*, not ``writing subsystem for hypertext``.

Anyway, I've copied most of my stuff from the old site and linked to most of my stuff on third-party sites. There's still probably a lot of blog posts I want to copy over to [the archive](https://mattbee.zone/archive), but so far I've just got a few recent ones and a few old ones that stick out in my memory. If you've been a reader on bearblog and you think any particular entries are worth highlighting, please <a href="https://mattbee.zone/contact?subject=Entries worth highlighting">let me know</a>.

In other website news, I'm thinking of ditching the guestbook, at least for now. I checked my dashboard to see if all the recent activity has impacted my hosting fees at all, and no, not really; but I noticed that the cost of a SQL database is almost as much as the rest of my website combined. Which is still barely anything, but like, the guestbook is kind of broken anyway. It doesn't escape characters properly, which wouldn't be a big deal, except that it breaks if someone uses an apostrophe,[^apos] which is a *pretty important* character. Like if you're going to write English with a limited character set, you can get by with just periods, commas and apostrophes. Losing any of those 3 is kind of a dealbreaker. I can fix it by editing the database, but I don't relish the idea of it looking like trash until I notice it and am at home where I can fix it.

I could debug it, but I'd rather spend my energy on a guestbook module I can cleanly incorporate into kiki, preferably using flat files instead of a database.

I mean... I guess the simplest option would be to just use my [existing contact form](https://mattbee.zone/contact), and if you put "guestbook" in the subject line then I'll add your message to a guestbook. I'll just make a "guestbook" tag and give each entry its own page. Boom, problem solved. People might not want to use it if the message doesn't appear instantaneously, but then they can just not use it. There are plenty of places on the internet for instantaneity, my personal website doesn't have to be one of them. It's cool.

Also, I realized my captcha approach was totally unnecessary. I changed it to a "negative captcha". The idea is, bots that spam forms on websites will put something in each input field. They're not designed to leave anything blank. So I have a captcha field on the form that's invisible to humans but visible to bots. If that field contains *anything* when the form is submitted, it's identified as a bot submission and rejected. I read about this technique years ago, and apparently it works, I don't know why I didn't think to do that before now. I guess "bots fill out every field" feels slightly more superstitious to me than "bots can't identify emoji". Like, *is* it true? I feel like I've seen spam comments on blogger where the bot didn't bother to fill out the URL field. Which seems counter-intuitive to the purpose of spam, but nothing about spam makes sense to me. Anyway, I guess I'll see if I get any spam and report back. If it doesn't, I might try giving the bot traps ID attributes like "message" and "email" and see if it's more inclined to fill them out. The *actual* message and email fields could have gibberish IDs, they only matter to me and the computer.

## Brain

So, I just did all the work I talked about for the guestbook. At work, on my phone, even though it would've been way easier if I waited til I got home. This is the problem with my brain problems: if I have an idea, I need to act on it *immediately*, because I have the motivation now, I may not have the motivation later. A lifetime of ADHD executive dysfunction has trained me to strike while the iron is hot, do the thing *now* because when I get home, it may be too late. Even though my ADHD is treated, and I'm a *lot* more likely to be able to follow up on an idea, old habits die hard.

Even as I was writing this, I thought "Now that I integrated the guestbook page into kiki, I *know* I can do the same with the contact form." Previously both functions were in their own separate sandbox, and I crudely copied the HTML generated from one of my pages to make it *appear* to be smoothly integrated. But there were seams. I knew I could do it right.

The only PHP function in the form is one that parses the URL for a ``?subject=`` query and auto-fills the subject field if there's anything in there. Following the instructions in the [user guide](https://tomodashi.com/help/user_guide), I added a new variable to the ``load_page()`` function to allow me to do this from within kiki:

```
if ($page_source)
{
... snip ...
if (isset($_GET["subject"]))
    {
	    $dynamic_content["subject"] = $_GET["subject"];
    } else {
    $dynamic_content["subject"] = "";
    }	
... snip ...    
}
```

Now in my contact form all I have to do is add ``value="$subject$"``[^dollar] to the subject field, and it works! It's seamless!

This is something I was never able to do with oddmuse. I had to use the "copy the HTML" method and keep the contact form sandboxed, because the contact form was PHP and oddmuse was perl.

It's a very small thing, but this is the first time I've actually changed the kiki code for a dynamic function, and not just adding a ``<title>`` attribute or header image. Getting it to work feels incredible, I'm unstoppable. I already know what my next hack will be: custom emoji! It should be dead simple to add a $$headpat$$ variable that will drop in this critter:

![](https://i.imgur.com/wmJKGWr.png "")

See, this is what my brain does. I shouldn't be doing any of this. Remember what I said the other day about debugging PHP on your phone? And how you should not? I can't take my own advice. I said I needed to take a break from programming and slow down and then I did this in the same afternoon. My brain makes me do things I shouldn't. I wish it didn't have a mind of its own $$pat$$

[^apos]: Yes, technically it's a "single quotation mark", but you know what I mean. It's the key on the keyboard that everyone uses as an apostrophe.

[^dollar]: But with two dollar signs on each side instead of one. Even in ``<pre>`` tags and using HTML shortcodes, dynamic variables still get parsed!


$$pagebuttons$$