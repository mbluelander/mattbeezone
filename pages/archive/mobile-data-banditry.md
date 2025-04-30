((header))
title:Mobile Data Banditry
author:matt
tags:hacks, internet, long, phones, tech
date:2025-05-01
((content))
<h1 id="pagetitle">$$title$$</h1>

>$$date$$
>
>Tags: $$tags$$

I have a cheap no-contract phone plan that offers a couple gigabytes of data plus "unlimited talk and text" for $15 a month. Since this is supplementary to my home internet, the couple GB is usually enough, if I'm careful to use mostly text-based applications. Every once in awhile there's a new podcast I want to download and listen to immediately, or I want to look at a site on the adweb, but these occasions are rare and I've gotten pretty good at rationing my data to last all 30 days.

In April, I ran out on day 29. So close! I knew I'd be fine without for a day, I could still text my partner and I could still call someone if there was an emergency. But when this happens, I get curious whether there might be a way to circumvent the data restriction.

You see, my phone is still receiving data. Text is data. I can visit the website for my phone carrier and pay my bill. I can send and receive multimedia messages, that's potentially a *lot* more data than a text. My phone still says I'm connected to LTE. Clearly there's a normal data connection there and my carrier is just limiting what sources of data I can connect to. But what if I can fool the network into thinking I'm doing approved data activities when I'm not? 

I touch on technical concepts about which I have some basic understanding but am not an expert. If you don't care about my kibitzing, here's the

### TL;DR

I didn't find a way to fool it, but I think MMS has some untapped potential, I discovered a loophole that gives me access to some useful google web functions, and I might have forced my cell phone provider to fix a very cute exploit.

### background: what is a phone?

I pride myself on having approximate knowledge of many things, but I'll be honest, I don't have a clue how phone networks operate. Modern ones, I mean. When you're talking about old copper-wire POTS[^1], I can trace a conceptual line from the telegraph and electrical sound modulation to pulse dialing and switchboards with human operators; then to touch-tone dialing and electronic switchboards controlled by DTMF tones. I may not understand the fine details, but I get the gist.

Now that everything is cell phones and VOIP, I have no clue. It's a black box. I know people have set up their own home PBX/VOIP systems with software like asterisk, but I can't conceptualize how it works. I know it involves "leasing" a phone number, but how? From who? Who owns phone numbers? The government? Do I call up the FCC and say "one phone number, please"? I think it probably involves multiple levels of intermediate wholesalers, and I can't imagine the total expense is anything but prohibitive.

Likewise, I have no idea how cell phones differentiate "stuff that comes through the phone number" and "stuff that comes through the internet". So, my first idea is totally hypothetical and based on shit I don't understand.

### method 0: MMS

Multimedia Messaging Service (MMS) is an extention of the old Short Message Service (SMS) used for texts. These days, it's most famous for being abused by texting apps that want to cosplay as full-featured chat programs, with reactions and rich media, so if you're in a group text with a bunch of people using iphones, it's this annoying bullshit smeared over dozens of sprawling incoherent messages:

>![conversation screenshot](https://i.imgur.com/G6FpyjK.jpg)
>
>The future of communication.

But before Apple did what Apple always does to standards, it was a perfectly nice way to send pictures or voice messages to your friends. It seems like the maximum size for an MMS message is 300KB, 600KB, or 1MB, depending on which google result you believe and whether your carrier is using the most recent standard.

So, it seems like it should be fairly simple to send any size file you want in chunks encoded as png images or Base64 text.

The hard part would be automating a system that can send via whatever pipe MMS messages are sent through. I don't have a computer with a phone number, and I don't know how to send anything to a phone number.

But interestingly, the server my carrier uses to relay MMS is http!

>![mobile access settings screenshot](https://i.imgur.com/hSBXyH4.jpg)
>
>Luckily, the photo editor on my phone has a weird bug that makes images look gnarly and cybre whenever I use the pen tool. Redaction-core!

If the MMS data is sent over http—assuming it's not somehow encrypted (the "wapenc" in the url could be a clue that it's being encrypted or it could just mean encoding, I have no idea)—it should be possible to snoop on the packets, figure out how they're being sent, and reverse-engineer a way to send your own data through that pipe. And this is where my well of technical knowledge has run dry. I have no idea how to do what I described. I just suspect it may be possible.

### method 1: hang on a sec

But wait... you don't necessarily have to text someone from a phone number. Every (?) cell phone carrier gives you an e-mail address. It's your phone number @ a special domain, like `5558675309@txt.carrier.com`. So you'd just need to encode the data chunks, e-mail them, then reassemble. This is a system someone could actually build. Sending large amounts of data this way might cause you to get rate limited or throttled, but ah, that would mean the "unlimited texting" they promised is a filthy lie, wouldn't it? Then they got a lawsuit on their hands 🙃

But hey, with smaller files, encoding shenanigans might not even be necessary. At first, I assumed that MMS systems won't let you attach arbitrary file types, because when I try to include an attachment in a text message, the options presented by the android UI are pretty limited:

![attachment modal screenshot](https://i.imgur.com/qZONyVP.jpg)

But if I'm sending an email, I'm not restricted to what this UI will allow me to attach. **Can I text myself Super Mario Bros.?**

![An MMS message that reads "additional media content is included. Please check the message in detail.](https://i.imgur.com/b1wQMxF.jpg)

Hm, okay, "Please check the message in detail." I can probably do that by... uh... "long-pressing" on it?

>![screenshot of message details. It shows a size of 41 kilobytes.](https://i.imgur.com/NWCOKuh.jpg)
>
>This time I cropped out the part of the UI with alpha transparency and it didn't fuck it up at all. What's the deal, phone?

Okay, 41KB. Mario is in there somewhere, in some form. How do I get him out? Mario's not equipped to survive in computer world. He doesn't have a frisbee made of light or anything.[^5]

At first I assumed it's impossible and the system isn't built for these kinds of attachments, so I went through a whole bunch of rigamarole trying to send it with a .txt extension, copy the text, and turn it back into a .nes file on the other end, which didn't work (it just strips the part where all the binary data's hidden.) Then I tried to encode the rom into Base64 and decode it, which also didn't work. I spent a lot of time trying to figure out what I was doing wrong (I think it has something to do with incompatible line ending format between the two programs I was using) which is part of what made it take so long for me to finish writing this.

But I had an epiphany, and none of that was necessary. Turns out all I needed to do was long-press on the message and choose the worst-named function in UI history:
```
"share" 🙄
```
It gave me a list of different apps I could share it with. One of the options was the file manager. When I "shared" the message with it, I got to choose a location where I wanted to save it:

![screenshot of message: smb001.nes copied to android storage](https://i.imgur.com/o81EeQd.jpg)

And there you have it. It always appends 001 to the filename for some reason, but otherwise it's the same file. I texted myself an NES rom via e-mail and it works in [Nesoid](https://f-droid.org/packages/com.androidemu.nes/). No metered data required.

>![screenshot of super mario bros being played on a horizontal phone with virtual buttons](https://i.imgur.com/jzUYUTC.jpg)
>
>Finally, Mario the way it's meant to be played: while smooshing your thumbs against indiscernible spots on an unyielding glass screen.

So now that I know it works, it's time to test the limits.

First off, I don't know whether this is obvious, but you do need an active data connection to get the attachments. I tried turning mobile data off, and messages will come through, but it's just the SMS text notifying you that you received something; none of the data in the MMS layer is accessible over the edge network. Once I turned LTE back on, it came in properly.

I know it works on a data connection that's been suspended for going over the cap, but it wouldn't work if I were suspended for nonpayment; even though there is an active LTE connection, I wouldn't be able to get calls or texts.

* I tried it with the Dragon Warrior 3 rom, which is 512KB, and that went through fine. 

* I wanted to see if it would allow me to send an APK, so I found one small enough, a tiny storage analysis utility called [DiskUsage](https://m.apkpure.com/diskusage/com.google.android.diskusage). It sent and installed with no issues.[^3] **⚠️ This should go without saying, but do not install random apk files from the web, or open any executable file from an unknown source. Doing so may may put your phone at risk. ⚠️** 

* I wanted to send a different file type between 600KB and 1MB, so I looked through my downloads and found a 700KB .mobi copy of Frank Herbert's *Children of Dune*. It also went through no problem.

* I sent a .7z archive of a GBA rom slightly more than 1MB, expecting it to fail, but it went through. Might the limit not be 1MB after all? *Hm...*

* A 5MB PDF? No probalo 👌

* A 16MB game boy advance rom? Well, now it gets complicated. 

I assume  it failed, and thus the file size limit is somewhere between 5 and 16MB, but I can't be sure, because it didn't bounce back on the e-mail end or give me some sort of undeliverable message warning on the phone end. It just silently failed. Or, maybe it hasn't failed yet.

This is where we get to the big caveat for this method: not only is it very slow, it's slow in an unpredictable way. A 5MB file might go through almost immediately, or a 50k file might take 10 minutes. The GBA rom might show up eventually, but at this point it's been half an hour, which is longer than any other file has taken, so I'm assuming the network unceremoniously discarded it. If this changes, I'll add an erratum here.[^4]

Still, if it's not urgent, this is a way to get a non-trivial amount of data without counting against your cap. I can definitely see a scenario where it's practical to have a system where you send an SMS containing the URL for a file to an e-mail inbox on a server you control, a script fetches the file, and the system replies with the file attached. With a very low monthly cap, it's prudent to preserve every precious megabyte possible.


### method 2: elite hacking skills

I have access to my carrier's website. What if I use the browser developer tools and drop an `<iframe>` on the page that loads the website I want?

Well, chromium-based browsers on Android (the one I use is Kiwi Browser) do have developer tools, just like Chrome on PC, but it's barely functional on a phone. When you try to edit a page element, the keyboard pushes the UI up to completely obscure what you're typing, so I had to type the tag in a text editor, carefully position my cursor, and use the paste button on the keyboard.

>![android chromium dev tools screenshot](https://i.imgur.com/eERManS.jpg)
>
>The ultimate development environment. A real hacker can __sense__ the code.

I wanted the iframe to contain this website, so I pasted this just after the body tag:

```
<iframe src="http://bluelander.bearblog.dev">
```

Having the carrier website open in one tab and the developer tools open in another tab uses about 900% of my available ram, and doing anything at all with the dev tools slowed everything to a crawl, but eventually I managed to paste the tag and switch back to the site tab without the browser crashing. There was a big white box superimposed over the site that may have been an iframe failing to load the requested content, or may have just been general jank. I could no longer scroll or interact with the site in any way. I realize now that I should have used the TLS version of the URL, since it probably won't want to load an http iframe on an https site even under the best conditions, but if by some miracle the https version worked, this still clearly wouldn't be functional enough to rely on.

### method 3: the samsung/telecom goodwidget pact

I have a samsung phone, so it comes with its own terrible built-in browser that I never use and can't uninstall. However, when I was experimenting, I discovered something shocking: even when data is restricted, google search is 100% functional in the samsung browser. Additionally, it's faster than any other website I use over LTE, ever.

I have an unlocked xcover 4 that originates from outside the US and a BYOP plan, so I assume samsung has worked out a deal with all the carriers to prioritize google search traffic, so people using samsung phones won't complain that the search widget sucks.

When I discovered this, I immediately set out to discover what limitations are placed on it. What I'm allowed to do is very granular: I can do a google search or a google image search. All of the instant search results still work, so I can find the weather for my area, or convert cups to millilitres, or calculate the square root of 7, or see the tallest punk singers in descending order of height.[^2] 

As soon as I tap on one of the results, the connection fails, even if it's an AMP page. 

I can't go to most google subdomains directly, but some of them sort of work if I do a google search and then click on the link from the google search results. For example, nothing happens if I type books.google.com into the URL bar, but if I search for "google books" and click the link in the result, I have pretty much full access. I thought this would be a way to get to public-domain books, but gbooks itself doesn't seem to host any full texts, even ones it has the rights to. If I search for "Frankenstein", I can't find, like, a text version from Project Gutenberg. It's just various commercial publications, at best all I can get is a preview. You *can* find noncommercial versions, but they all link to a $0 purchase in the google play store, which I would argue is slightly less free than actually free.

I was able to get to google translate, which was exciting because there was a chance I could use the old anti-firewall trick: you can use google translate as a proxy to view whatever webpage you want, just "translate" a page that's already in english from another language into english. But no dice. Google Translate loaded, it looked like it was going to work, but when I clicked the link to view the translated page, just an infinite throbber.

While I was at it, I also took a stab at seeing if the [google web cache](https://webcache.googleusercontent.com/search?q=cache:https://bluelander.bearblog.dev/) would work, but nope, no connection.

Some subdomains are accessible, but less functional. If I search for "google drive", the link takes me to a splash page inviting me to log in, even if I'm already logged in. Clicking the link fails to do anything. Weirdly, youtube works, even when I type youtube.com into the address bar, but it has no video thumbnails and (naturally) I can't watch videos there. I guess this is so you can get fast results when you do a video search with the widget. And some subdomains like gmail and google news don't work at all.

I tried every google product I could think of that might be a backdoor to useful data—docs, sites, chat, voice, hangouts, blogger, podcasts, even weird shit like [google arts and culture](https://artsandculture.google.com/)—and if I could access any of them at all, I was stymied as soon as I tried to do anything useful with them. They locked everything down as tightly as possible. That said, I consider this a small victory, because there *are* useful things I can do with my phone when I'm out of data. If I ever desperately need to prove who won the 1942 World Series to win a bar bet, there's nothing my telecom can do to stop me!

>![very glitchy screenshot of google search results with a purple line on it](https://i.imgur.com/PXBVTVN.jpg)
>
>Oh no, I brought back the wrong sports almanac, this is the __blaseball__ result!

### method 4: sneak in through the help docs

This one's my favorite. Not only did it almost work, but it reminds me of a classic windows exploit only 90s kids will remember.


So, I'm back to Kiwi Browser. I load up my carrier's homepage. I'll be using this site to demonstrate the steps.

Tap the little lock icon in the URL bar, and tap where it says "Connection is secure". 

![Screenshot](https://i.imgur.com/YZMu6MF.png)

![screenshot](https://i.imgur.com/MTOctZy.png)

It'll show you some info about the page's encryption status.

>![UI screenshot](https://i.imgur.com/aiUdHXn.png)
>
>I didn't want the joke to wear thin, so I begrudgingly downloaded [a different image editor](https://f-droid.org/en/packages/org.catrobat.paintroid/). Don't worry, the glitchy isn't going anywhere.

At the bottom, tap "what do these mean?" and it'll take you to the google support page about TLS certificates. 

![web screenshot](https://i.imgur.com/ERCiaX0.png)

Normally there's not many places you can go from here, but I'm logged in, and it's inviting me to take a look at my account settings. 

From there, I can tap the waffle menu at the top and get access to a bunch of google services.

![web screenshot](https://i.imgur.com/6MPRSZ4.jpg)

Now, this modal didn't work when I was using google in the samsung browser: it gave me a throbber that spun for a minute but eventually errored out. 

>![web screenshot](https://i.imgur.com/zsNII6w.jpg)
>
>It would give me a similar error if I tried to tap my account picture.

But here, it came up right away. So I tap News, and it takes me to google news. I wasn't able to get there with the samsung trick! Excited, I tap the waffle menu again and tap "drive". It takes me straight to my google drive account. I can see all my files. 

But something's amiss. I can see the file names, but there are no thumbnails, and the javascript or CSS didn't load properly, because the page looks broken (I was too excited to think to screenshot this, a shame I will never live down) but I tapped one of my files, and... nothing. A throbber that throbbed forever. I force-closed kiwi browser, opened it again, tried to get back to the google help doc, and this time nothing happened. They caught me. I don't know how they noticed it so quickly, maybe it's because I was already fucking around to see what I could get away with, but that door is now closed. Still though, what a thrill. For just a moment, I could say... **I'm in 😎⚡🖥️**

If you're not familiar with it, the Windows 98 trick involves using a byzantine series of help menus to bypass the login screen, as immortalized in [this gif](https://i.imgur.com/fqjnK.gif).

### conclusions

Method #4 ended up inconclusive, but it was exciting to find a back door, even if they did immediately slam it shut.

Method #3 is interesting, but probably not an actual exploit, and I don't know how universal it is, i.e. whether it's all samsung phones or just my specific model, or even if it would still work if my OS was up to date. Still, it's an actually useful feature I didn't know I had before.

Method #2 was a silly idea I didn't expect to work, but it was fun to discover new depths of just how bad an interface can be.

MMS is definitely the most promising option. I never guessed it would allow you to receive any type of file, as long as you know how to operate the arcane UI. The 5MB limit makes it tricky, but I remember in the days of shaky dial-up and only-barely-less-awful DSL, it wasn't uncommon to find large files distributed as dozens of chunks you stitch together with a program like hjsplit. Desperate times call for creative solutions.

I think we could be getting more milage out of MMS as a text delivery platform, too. If I had the technical chops, I think the first thing I would make is a relay to accept text messages, turn them into a wikipedia search query, and reply with a text-only version of the requested article. This should work even on the cheapest pre-paid normalphones that aren't useful multimedia devices, and I know wikipedia has its limitations, but having a cheap device with a cheap connection that lets you instantly find information about anything, well, it reminds me of something

>![xkcd comic](https://imgs.xkcd.com/comics/kindle.png)
>
>[[view big]](https://imgs.xkcd.com/comics/kindle.png) [[transcript]](https://www.explainxkcd.com/wiki/index.php/548:_Kindle#Transcript)

So uh, if you read this far, thanks! Hope you had a good time. The moral of the story is: fuck around and find out, because fucking around is fun, and learning is cool 🦝


[^1]: Plain ol' telephone service.

[^2]: Joey Ramone was 6'6"? Holy shit.

[^3]: Sidenote: not only did it install just fine, it's also a surprisingly useful app. It's essentially an Android version of [SpaceMonger](https://archive.org/details/spcmn140_zip), the free 1.40 release of which has been my go-to storage analysis program on Windows for years.

[^4]: Today protonmail sent me an error notice that says "Your message could not be delivered for more than 12 hour(s). It will be retried until it is 2 day(s) old." Which is kind of a weird failure mode. Also, since writing this, I've tried different attachment sizes to see if I can pinpoint the exact limit, and nothing larger than 5MB has sent, so looks like I got it in 1.

[^5]: But maybe he should. Nintendo: call me 🤙

$$pagebuttons$$