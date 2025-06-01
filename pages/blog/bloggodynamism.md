((header))
title:IP Theater, Congrats to Rabbit, Bloggodynamism
author:matt
tags:blog, copyright, correspondence, crafting, meta, no-ai
date:2025-05-01
((content))
$$blogtop$$

I was thinking about the art I use from [openclipart](https://openclipart.org) and [opengameart](https://opengameart.org) and it made me feel bad about publishing with a  noderivs license. Having public domain art to draw from adds a lot of life to this website and my other projects, and it would be cool if someone [liked one of my stories](/stories) and wanted to turn it into a comic, or read it on a podcast, or use it as inspiration for a game. I'd be proud if something I made could contribute to open culture, too; I just put the noderivs clause on there as a feeble protest against AI scraping. But this is kind of silly. Technically the "non-commercial" clause should protect me, now that OpenAI is no longer a "non-profit" there's no legal argument that their activity is non-commercial, but the sad reality is that corporations are going to do whatever the fuck they want and I as an individual have no legal recourse, because the system is designed to protect capital and nothing else. So fuck it, I'm going to switch to CC-BY-SA. The only thing ND does is discourage the people who might actually get some value from my work and use it ethically. I'll keep the no-ai disclaimer even though I don't think it legally does anything; I can't legally do anything, anyway. Maybe someday I'll be part of a class-action brought by the EFF or something, that's the best I can hope for. Maybe I should just go full public domain with everything. In practice this is all just intellectual property theater. Legal cosplay. I'm not a member of the class that's allowed protection so I get exploited. That's the game I'm forced to play, so I might as well try to help my team.

## Congrats to Rabbit!

[Rabbit](https://jackalope.city) at jackalope.city finished [100 days to offload](https://talk.jackalope.city/talk/100-days-to-offload-complete/)! Completing a challenge [to blog 100 days in a year](https://100daystooffload.com/) doesn't sound that hard on paper, it only requires a 27.4% posting frequency, but if you're not used to that amount of output, it can be quite an adjustment. It takes moxy to stick with a new habit. It takes grit to stay self-motivated. It takes courage to write even on days it doesn't come easy. Well done!

I [finished the challenge](https://bluelander.bearblog.dev/just-another-normal-day/) in July 2022, and in typical me fashion, I didn't tag any of my posts or really talk about it much until I was done. I don't know why I'm so resistant to self-congratulation;  I have this knee-jeek reaction that I would be perceived as conceited or narcissistic, but I don't think it's conceited or narcissistic when other people are proud of *their* accomplishments. Maybe I should try the *Be Kind To Myself For 100 Days* challenge.

My 100-day challenge was the self-imposed kick in the butt I needed to think of myself as a writer again. Although my output slowed down in 2023 and significantly in 2024, the bug is still with me, hopefully for good.

I'm not doing any kind of official challenge this year, but I'm well on my way to 100 posts again: 40 posts already and it's only May. I think I'm going to be more motivated to write now that I'm doing it on my own website, too. I don't have to worry about spamming any feeds, because I'm not sharing it with anyone else. I have free reign over my domain! Oops, there I go thinking like a landlord. It's hard not to when most of the rest of the internet treats us like digital serfs.

## Bloggodynamism

So, I went kind of ham with the custom dynamic variables: I have not one but three custom emoji: ``pat``, ``nb`` and ``lander`` give you $$pat$$
$$nb$$
$$lander$$[^sad]

I'm sure I'll add a few more, but I'll try to use them sparingly in the blog: they probably won't show up right in the feed, because they rely on external stylesheets for the formatting. You can't just drop an ``img src`` tag into the middle of a sentence and call it good, you have to make a tiny div that uses the image as a background if you want to be able to size and position it properly. Way too much hassle to do it manually, but a piece of cake with the power of PHP.

But, it kind of leaves feed readers out in the cold, so I'll try not to rely too heavily on them. In fact, most of this stuff is only going to be relevant to page visitors, sorry! Feed readers can skip this section.

I created variables for each of the buttons at the bottom of the blog post: ``likebutton``, ``sharebutton`` and ``replybutton``. Just in case I ever want to use them individually. Hey, it could happen! But I also made ``pagebuttons`` so I can drop in all three at once, which is what I'll be doing all the time.

This wasn't that much friction before, because I could include the code in my post template, but now all that ugly HTML is hidden away in the guts of the computer, instead of messing up my nice orderly markdown files. Plus, if I want to change something about them, I can do so on every page at once! If I decide I don't want them, I can replace them with an empty string. Anything I want repeated over and over, it's *always* better to have a function rather than doing it by hand.

I also created ``blogtop``, which generates the entire top section of the blog post: the ``h1`` title (including the ``pagetitle`` id attribute that makes the share button work), the block quote div, the date and the tags. For pages, there's ``pagebottom`` which shows a blockquote div with the tags and the date the page was last modified. Ideally, there shouldn't be a single page that you look at and wish you knew when it was from. I find that sort of thing frustrating. There are pages where it's not necessary, I don't think anyone is going to look at the [contact page](/contact) and think "what's the context for this??!", and it seems excessive to use the full ``pagebottom`` on every single [topic](https://mattbee.zone/&tag=topics) page. But all the main stuff should have some form of date stamp.

I also cleaned up the buttons: the share button previously broke everything if it was on a page without a ``pagetitle`` id, but now if that attribute doesn't exist, it'll just copy the URL. To encourage inter-blog communication, the reply button will now show you a field to enter a URL to ping me from your own site (a great idea shamelessly stolen from [Rabbit](https://jackalope.city)), with a link to the contact form if you want to send a message. I'm not using webmentions or anything, it just uses the same script as the contact form and guestbook to send me an email. Webmentions would be cool if every blog was running them and set up to automatically ping every other blog that's mentioned, but since that's not a thing, it might as well just be an email. Maybe the glorious webmention future will arrive someday.

Rather than post all the new code, I'll just link to the [repository](https://github.com/mbluelander/mattbeezone) I set up as a site backup. It's a snapshot of all the HTML generated in static mode, all the markdown files and all the bits of custom code in conveniently-labeled folders. The idea is to do backups on the last day of each month, so if anything happens and I lose my webhosting again, I won't lose that much history. I kinda wish I was doing that with my oddmuse site, there's probably some stuff in there that I would like to have kept $$sad$$ maybe I'll try to do weekly backups of my markdown...

Anyway, there are only two more features I want to hack in to call it "done":[^curse] I want the "what's new" section to automatically display the dates and titles of the three most recent blog posts with links to view more,[^widget] and I want the ``/blog`` landing page to automagically show links to all the blog posts. I use a lot of images and footnotes, so I don't think doing a simple [tag sort](https://mattbee.zone/?tag=blog&sort=newest) will be the best way to browse the entire blog, especially once I have hundreds of posts here.

I'd prefer if tag search worked more like bear, where it just shows you links to everything with that tag instead of full pages, and I'd like it if I could have a page that shows every tag. There's no easy way to do that with kiki. Which isn't a big deal right now, but you know, I'd like this to be my forever home. Someday, muse willing, this site will contain vast multitudes. I think I'll be able to hack all this in, I feel more confident after messing with dynamic variables and looking at the pagegen code. It'll be a lot more complicated, but it's doable. I know how to do a for loop. I can see which part of the code looks at the page tags and how. I know how to put a div together piece by piece. The main problem is figuring out at which point in the program the variables I need to work with are in scope. It's challenging to figure out by reading the code which variables I can use where.

I know I can do it, but I really, really need to take a break from programming now. I love it but it has taken over my brain. I have a site that I'm really happy with, it's time to use and enjoy it $$pat$$

[^curse]: But I have the curse of the tinkerer, nothing will ever be done unless I force myself to *accept* it as done, there will *always* be bits I look at and think "I should make this different". Lord grant me the wisdom to not change the things that don't need changing.

[^sad]: And now ``sad`` gives me $$sad$$, which I added for this post.

[^widget]: I was using an [RSS 2 HTML widget](https://rss.bloople.net/) for this, which is really handy when you're on neocities and stuck with HTML and js, but I can find a much more elegant way to do it here. Plus, it would sometimes take too long and prevent the rest of the page from loading for several seconds, and for whatever reason the `async` attribute was making it break the page layout, so something about it doesn't play nice with the pagegen code.

$$pagebuttons$$