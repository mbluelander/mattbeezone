((header))
title:Coding as a Craft
author:matt
tags:blog, crafting, kiki, mental health, meta, programming
date:2025-04-26
((content))
$$blogtop$$

Learning about bash and working on [whirltube](/?page=whirltube) has got me feeling the programming itch again, and I'm not sure what to do with it. Part of me wants to keep adding stuff to whirltube even though I don't need to, but that way lies madness. I need to find a new project (or go back to an existing one.)

I've never approached coding like a programmer. My interest in programming lies in my ability make tangible things. I wasn't blessed with natural artistic talent, I can't paint a painting, or record an album, or build a chair, or grow a garden, or weave a tapestry; but I *can* create a program. I can visualize what I want a piece of software to look like and do, and I can start with nothing, and I can build it brick by brick. 

Most professional software devs will tell you you're a fool if you start from scratch, that you should use existing libraries as much as possible. Why reinvent the wheel? But to me, the invention is the joyful part of the process. It's fun to invent the wheel. There are a lot of wheels I could use, but this one is mine. To me, it's like saying "why paint Mt. Fuji? There are already lots of paintings of Mt. Fuji, just look at one of those." 

It's inefficient, of course it is, the same way painting a picture is inefficient compared to taking a photo, or writing a blog post is inefficient compared to telling an ai to write one for me, or watching the sunset is inefficient compared to work. The inefficiency is the point.

This is an unorthodox view of programming, because historically, the efficiency has always been the point. Back in the 60s and 70s, computers had so little processing power and memory to work with, efficiency was *everything*. You had to be a technical sorcerer to make a computer do anything, much less do it well. High level languages like BASIC and COBOL made computing more approachable, but you had to use machine code to make anything real-time or impressive.

Fast-forward to today, and computers can do billions of things per second, many of them simultaneously, and hold vast libraries in their volatile memory. A bit of inefficiency isn't going to hurt anything. I have no interest in optimizing my program until it can execute commands in 0.005 seconds instead of 0.01.

## Video Game Tangent {#vg-tangent}

This optimization fetish is still fairly common among programmers, and we see it manifest in niche game genres. I was excited for the Zachtronics game [Exapunks](https://zachtronics.itch.io/exapunks), and pre-ordered the edition that came with the physical zines and other feelies. I *loved* the retro hacker aesthetic (still do) and was excited to jump into a game that involves actual programming. I thought it would be right up my alley.

I got nothing out of the game and gave up on it almost immediately. I was solving the puzzles, but it didn't feel like fun to me, it felt like work. The game showed me how quickly my friends' programs completed and in how few lines of code. It expected me to want to try to beat their scores, but why would I? I solved the puzzle. Why would I care about solving it better? I achieved the goal.

We see the same zeal for optimization in sims like *Factorio* and *Stardew Valley*, and in sandbox games like *Minecraft*. I get no dopamine at all from these sorts of games. I bought *My Time at Portia* thinking it'd be an *Animal Crossing*-esque chill social life sim game with more mechanical depth, and was disappointed when it devolved into optimization porn. I reached a point in the gameplay loop where I was expected to build intricate clockwork systems of widgets creating and refining materials to use to make other widgets, and I was done. It started feeling like drudgery. I came to realize that playing and creating are two very different mindsets for me. With play, I'm extrinsically goal-oriented. I want a game to present fun systems for me to interact with to achieve concrete goals. I also want an interesting world to explore and a character to represent "me" in the world.

Creation is different. My goals are all intrinsic. I want to visualize a thing and have the building blocks I need to make it, self-directed. I want to turn nothing into something. My attitude when I play *Minecraft* is, why would I build something in this game when I could be building my *own* game? As usual, this bridge between what I like and what everyone else likes is a shaky one of unattainable passage, but at least I've figured out how my brain works and can adjust my expectations accordingly.

## Back To Programming

That was a very long tangent, but hopefully it helps illustrate why I approach programming as a craft and not a science. This isn't to downplay the importance of efficient, optimized, low-level code for the functions that need it. For example, compression algorithms. Our entire media ecosystem is dependent on image, audio, and video compression. These are getting better all the time, and we've seen some truly staggering gains in file size and efficiency, which means we need less bandwidth and less storage for media of higher quality than was possible just a few years ago. I can't even begin to grok the math and physics required to make this possible, and I'm in no way comparing myself to the actual computer scientists. I'm grateful for all their work.

I guess in technical terms one could call me a "front-end developer", although most folks who self-identify this way would probably not accept me into their club, either. My idea of what makes a good interface isn't state of the art.

I think TUIs, or text user interfaces, are cool. I think mouse-driven interfaces are good for UIs that require a lot of non-linear decisions in a small amount of space, like a hypertext document or a LucasArts adventure game. But for a menu-driven interface where each menu only has a few options, I think keyboard control is the way to go. If a menu only has four things to do, why make me move my mouse between them? Why hide options behind multiple clicks? If a menu can be controlled exclusively by the four main fingers of my left hand, it requires almost no thought or effort.

When GUIs were the new hotness in the late 80s and early 90s, and everyone was getting used to this strange new tool called the "mouse", every peg started getting hammered into the "mouse" slot whether it made sense or not. I think that's a shame.

On the extreme other end, which I also don't like, is the command line interface, which I don't really think is an interface at all. It's an interface for other programs, not people. One of my main beefs with linux is that many programs are written with the assumption that people will enjoy interacting with the computer this way, and I don't. I don't want to have to type ``--help`` and scroll through a myopia-inducing codex of arcane glyphs to figure out how to do what I want. I strongly believe that if you invoke a program without any arguments, it should give you a basic TUI with the most commonly-used options and let you select one. That's what whirltube is, it's what I would expect to see if I type "yt-dlp" on the command line and press enter, if the world worked in a way that makes sense to me.

So, TUIs are cool. You know what else is cool? Websites.

## What's Next

When I started writing this, I didn't know what my next project would be, but now I know. It's my website.

[Kiki](https://tomo-dashi.itch.io/kiki) came along, and it's exactly what I've been looking for in a "CMS".[^cms] It's a wiki and a blog engine written in PHP, but it's not a gigantic monster of a framework like Wordpress or Mediawiki. It's also not a stripped-down static site generator that requires building on the command line.[^static] It's a web 1.0 creation tool for the 21st century. You don't have to install node or react or ember or any JavaScript frameworks; you don't need any frameworks whatsoever. Just a webserver that supports PHP (or any webserver at all if you're using it in static mode.)

In [Self-Hosting Again](https://bluelander.bearblog.dev/self-hosting-again/) I reckoned that I wouldn't be moving off bear anytime soon:

>It'd be nice if there was a self-hostable CGI blog CMS for normal people, but [...] that's not really a thing.

Kiki is that thing! It exists! It supports a markdown flavor that's basically exactly the same as what bear uses, so my writing workflow is the same. I can post entries and create pages from my website, without needing to FTP into my site. When I *can* FTP into my site, that's when it gets really fun.

I forgot how much I enjoy having full control over the l tech stack. I can edit HTML and CSS, but I can also get in and hack the PHP engine itself. I can change any aspect that doesn't suit me. I can add new functionality! I just need to learn how to do it in PHP, which despite what the tech world would have you believe is still quite functional and stable. I can even add a bit of javascript, for fun. I've softened on my anti-javascript stance. Writing raw JS is a good time. I can add all sorts of fun little widgets and Easter eggs. No, as I noted in [a recent footnote](https://bluelander.bearblog.dev/im-doing-technology/#fn-1), the enemy isn't javascript, it's frameworks.

The [Mozilla Developer Network](https://developer.mozilla.org/en-US/docs/Learn_web_development/Core/Frameworks_libraries) says:

>JavaScript frameworks are an essential part of modern front-end web development

I live in the modern era, so I guess I still don't qualify as a front-end developer; but you can call me a web crafter 🦝

$$pagebuttons$$

[^cms]: "Content Management System" is such a gross turn of phrase. I feel like no one uses "CMS" anymore, which is good, but I don't know if anything has replaced it. Can we call them "hypertext engine construction kits"? HECK yeah, we can.

[^static]: But it can be used this way! It's very flexible.
