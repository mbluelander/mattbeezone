((header))
title:Debian is my smoothest Linux experience yet 
author:matt
tags:blog, LinuxSaga, tech
date:2025-05-22
((content))
$$blogtop$$

## General desktop experience

It's been over a month since I made the switch to Debian from Windows 7, so how's it going? Not bad! I've been able to get a desktop experience pretty similar to what I'm used to, and in fact I like [Bluecurve](https://www.xfce-look.org/p/2191581) more than any of the styles available on Windows 7. My installation has been rock solid so far, and I don't believe I've needed to restart my computer once. Minor nitpick #1: I usually put my computer to sleep when I'm not using it, but for some reason it now always immediately wakes up when I try to do so. So I've been using "hibernate" instead, which means to wake it up, I have to physically raise the screen of the laptop slightly. Which isn't that bad, and it keeps me from accidentally waking up the computer by bumping the mouse, so it might be an improvement.

Once I got past the initial setup phase, I've barely had to type my password at all. I'm not installing or updating software at a rate anywhere close to where it'd be an annoyance. Critically, Debian *doesn't constantly nag me to update shit*. I can keep using the programs that work for me and update what I need, when I need to. This hasn't been the case even on other Debian-based distributions, so I'm very happy to have such a peaceful computing environment.

Nitpick #2: there have been a couple instances where the version of a program in the apt store doesn't work---[yt-dlp](https://github.com/yt-dlp/yt-dlp) comes to mind---but grabbing the binary and adding it to my ``path`` has been painless. This is a general linux development, not something specific to debian, but I'm pleased with how often I'm able to download a binary and it'll just work. The era of expecting the home user to compile shit from source to do anything appears to be over.

## Games

Now, I haven't been doing anything all that complex yet. It's still a 10-year-old laptop, so the only games I've been playing have been NES roms and small indie games from itch, which have been working fine. I haven't been streaming or needed to edit video: I was disappointed to learn that most of the Archipelago randomizers that didn't work on Windows 7 don't work on linux either. I don't know why I didn't think to check this---I assumed that since archipelago is cross-platform, the developers would try to be cross-platform as well, and I just needed a current OS. Sadly, many of them seem built solely for Windows 10 or 11, even games that have native linux ports like *VVVVVV* and *Rogue Legacy*. I tried to get the randos working with proton but the whole arrangement is just too janky. Bummer!

## Crafting

Most of my creative work in the last month has been this blog and website, and debian has been just fine. Filezilla doesn't have the weird development drama that the windows version has had, so that's been my ftp interface. It's missing a few nice features that WinSCP has, like I can't right-click in a remote folder and create a file directly, I have to make it locally first and upload it, but it's not a huge deal.

For editing I've been using [mousepad](https://gitlab.xfce.org/apps/mousepad), the default text editor for XFCE, and it's great. It's like notepad except that it has nice dark themes, line numbers and syntax highlighting, all the features I want from a full IDE without all the cruft.

Nitpick #3: the find-and-replace in mousepad is busted. I found [this reddit thread](https://www.reddit.com/r/xfce/comments/bqzpcj/regex_in_mousepad/) suggesting this is a long-standing bug, so as recommended, I've been using gedit for my find-and-replace needs; but I don't want to use it as my default editor because the UI is awful. That thread is 6 years old, and when I [tracked down the bug](https://gitlab.xfce.org/apps/mousepad/-/issues/9) it does appear to have been fixed, so I'm going to try to update to a newer version of mousepad and hope the UI is unfuckedwith. 

## Nitpick #4: image editors

Speaking of fucky UIs, one of my primordial frustrations with linux is the lack of an image editor with a normal UI. On windows, [Irfanview](https://www.irfanview.com/) and [paint.net](https://getpaint.net/) have been indispensable parts of my image-editing workflow for over a decade. Irfanview is the best program for operations like cropping, resizing, adjusting colors, rotating, and exporting. It's unbelievably fast and lightweight. It's so good I even paid the voluntary 10€ registration fee, back when I was making more than a living wage and could support projects like this, that's how important irfanview is, and it has no equivalent on linux. I did get it working under wine, but it's janky. It takes a long time to start up. If I try to paste the contents of the clipboard into a new image, it creates a canvas with the correct dimensions but is completely transparent. Certain keyboard shortcuts don't work: I can't alt-click to create a ratio-bound selection because in linux, pressing alt and click-dragging resizes the window. Enough little frictions that add up to an experience that's sadly not really usable.

Paint.net has an intuitive *paintbrush*-like UI with essential features like layers, magic wand select, and plugins that enable feathering and stroke fill. For as good as Irfanview is for basic image editing, paint.net is good for intermediate image editing. It's a shame that it'll probably be forever windows-only: it relies too much on .net libraries to work under wine. It's theoretically possible to create a linux version with [mono](https://www.mono-project.com/), that's how [Bizhawk](https://tasvideos.org/Bizhawk) handles their linux port, but paint.net is free-as-in-beer, not open-source, and the developers don't seem to have any interest in changing that.

[Pinta](https://www.pinta-project.com/) was once a workable paint.net clone, but it's always had issues. When I used it back in the day, it crashed a lot, and to this day, it doesn't support any scaling algorithms. It works for pixel art, where the only scaling I need to do is integer nearest-neighbor, but for any other use-case it makes images unacceptably crunchy. Recent versions have fucked up the UI, using small, indistinguishable monochrome icons, so it's no longer even a good paint.net clone.

There's the image editor with the shitty name. I've tried it. The less said about that one, the better.

[Krita](https://krita.org/en/) seems like it would be a great program for people who use a drawing tablet to create digital paintings, or are used to the quirks of this type of software; for me, the UI is unintelligible nonsense. Any image editor that requires me to look up a tutorial to figure out how to erase is, to me, a bad piece of software. I found a reddit thread titled [I just want to erase something](https://www.reddit.com/r/krita/comments/xsh3l7/i_just_want_to_erase_something/) expressing the same frustration I was having. Here's the advice the person was given:

>If you want an eraser to work on a click instead of sliding over the unwanted pixel you'll need to make an eraser brush out of a stamp. Stamps are designed to work without movement across pixels , brushes are designed to never do that, otherwise we'd all be making unintentional marks each time we positioned the brush.
>
>Just pick any stamp brush at all, change the tip to the plain square or circle and change the blending mode to erase. You can then save this new preset if you wish.

Statements dreamed up by the utterly deranged.

I put out a call on fedi to ask if anyone knew of an image editor I was overlooking, and Rylie at [Game Making Tools](https://www.gamemaking.tools/wiki/index.php/LazPaint) suggested [LazPaint](https://lazpaint.github.io/). It's the closest thing I've found to a normal, functional image editor. It starts up instantaneously, has most of the functions I need from paint.net, and has a UI that *mostly* makes intuitive sense. There are some quirks; for example, I'm used to having buttons to move layers up or down, and LazPaint seems to only allow me to drag them; when I save an image, the descriptions for image quality and bit depth settings are the same color as the background, so I have to kind of guess what I'm doing from the sliders and drop-downs; the way the color selector works is a bit wonky compared to what I'm used to; but overall, it's the first linux image editor I've found that's generally usable. All of this site's [merch](https://www.redbubble.com/people/mattbeezone/shop?asc=u) was made with LazPaint, which I know doesn't look that impressive, but it's the only way I could make it at all. It allowed something in my head to exist as opposed to not exist. To me, that's a win.

## Videos

Youtube continues to be a nightmare website. I can barely watch videos at 480p in firefox; when I do, I have to use "theater" mode, because having  other thumbnails on the screen drops the video playback to shoe size FPS.[^shoe]

Luckily, yt-dlp continues to work fine. I use [whirltube](/whirltube) to streamline the process, and most short videos download in less time than it takes the video page to fully load in firefox. If I stuck with Windows 7 it would only be a matter of time before the developers dropped support; the releases on the GitHub page now say you need windows 8+, so I think it already happened. I'm glad I no longer have to worry about that.

Nitpick #5: I'm having a surprising number of issues with VLC. Most youtube videos I download work fine, but any video from another source is a roll of the dice. When I was doing research and taking screenshots for the [Ren and Stimpy](/blog/ren-and-stimpy) post, videos would start with a strange "strobe" effect where it would show the video for a few frames and go black for a few frames; this went away when I scrubbed forward in the video and scrubbed back to the beginning. But videos also had a strange artifact in the form of a corrupted stripe at the bottom of the frame. Here's what the first image from the *R&S* article looked like before I cropped it: 

![](https://i.imgur.com/CInRVaz.png)

No idea what's causing this. I've been watching *Rocky & Bullwinkle* with my spouse, one of her childhood favorites, and those episodes have the same issue. The built-in video player is called Parole, and it doesn't do this, but the UI sucks and there's no way to capture screenshots. I'm surprised it's so janky, I don't think I've ever had a single issue with VLC on windows.[^frame] It almost feels like some sort of PAL/NTSC conversion issue, but that makes no sense with a digital file, right? Even if they were ripped from PAL DVDs, surely there's no difference once they've been codec'd and deinterlaced, right?

Some videos won't play in VLC at all. The player opens and immediately crashes. For those, I have to use the built-in media player. It's called Parole, and it doesn't have any of the issues that VLC has, but the UI is bad. Scrubbing through the video is janky and imprecise. It can cause playback freezes and desyncs. It doesn't have a snapshot feature. Perhaps it's time to find a different program. It's hard to imagine VLC not being the gold standard, though. Even the android version, for how clunky the UI is, *works*.

## Misc. nitpicks

The clock doesn't sync from the internet. I had to set it manually, and it drifts by several minutes over the course of weeks. If I completely shut the computer down, it'll be off by however many hours it was off; luckily, it seems to know how long it's been hibernating and adjust the clock accordingly. My understanding is that I can fix this by installing something called ntp, and it doesn't seem that complicated, but it hasn't been high enough priority for me to fix it yet. It's odd in 2025 to have a system that doesn't just keep the time synced out of the box.

The numlock state keeps flipping on its own. I always want to use the numpad for numbers, I'll never want to use those keys for navigation, so this is frustrating. I installed a program called numlockx, and followed instructions to add it to my ``xinit`` file (which works kinda like autoexec.bat) and that mostly did the trick, numlock doesn't get switched off every time the screensaver kicks on anymore; but I still occasionally try to type numbers and can't because it's been flipped. Idk why, there doesn't seem to be any rhyme or reason to it.

## Headphone update

I owe linux an apology, my theory was wrong and I'm almost certain my headphones crashing is due to a physical fault. This is because the crashes are *strongly* correlated with moving the headphones in some way, like pulling an ear cup to scratch my head, pushing the button, putting them around my neck, taking them off or putting them on. I had suspected this might be the case, but I dismissed the possibility because I couldn't reproduce it. No amount of wiggling the headphones or the wires could trigger an intentional crash. After spending some more time with them, it's too strong a correlation to be a coincidence. The reason it happens less often at work is because I move less: I spend most of the day doing the same work, or at least the same category of work, with minimal movement except when I get up for breaks. At home I move both myself and the headphones a lot more. It sucks that I need to replace them but I'm glad I know what the issue is.

## Unknowns

In the late 2000s, I had a netbook, as was the style at the time. I went through a period, much like now, where my primary computer died and I had to use the netbook as my main system in the meantime. To squeeze more performance out of it, I used something called *Ubuntu Netbook Remix*, which was a stripped-down version intended for low-performance processors and limited RAM. It worked okay for most basic tasks, but one of my most negative experiences with linux happened when I needed to print something. 

I shit you not when I say it took the better part of the day figuring out how to do this. I spent a good 6-7 hours on one of my days off looking at forums, documentation and tutorials, trying to piece together contradictory information about CUPS, postscript, spoolers, daemons, and other assorted buzzwords that made no sense to me. I did eventually get it to work, but I vowed that once I got my desktop up and running, I would never touch linux again.[^liar] One of the most unpleasant troubleshooting experiences of my life for what was, in my mind, one of the primary functions of a computer.

These days I don't have many reasons to print at home. In the rare cases I need to print something, I can usually do it at work. We to through so much paper and toner that the occasional personal document is unnoticeable. I ran out of toner at home and haven't bothered to replace the cartridge yet.  I dread the day something changes at work and I once again need to figure out how to use my printer, although it has to be better now, right? God, I hope so.

Well, that's the long and short of it. I still don't know how my setup will hold up to more intensive games, streaming, video editing, etc. because the computer itself is the bottleneck. I talked a lot about nitpicks, but my experience has mostly been remarkable for just how unremarkable it is. The OS, for the most part, stays out of my way and lets me do what I need to do. I don't think it's a drop-in replacement for windows for most people, and I'm fortunate that I'm somewhat technically inclined, enough to make it behave the way I want---but I don't have to be a full-time, card-carrying certified *__Computer Toucher__* to make it work, and my hair remains untornout. I hereby declare Debian the winner of linux. Congrats to Deb and Ian for their success $$pat$$

[^shoe]: US shoe sizes, so like, 5-20. 

[^frame]: Other than the lack of a "go back a frame" button, but this is a [well-documented religious objection](https://forum.videolan.org/viewtopic.php?t=126609#p449758) on the part of the developers.

[^liar]: Microsoft made a liar out of me. I couldn't imagine how bad things would get, but it's now clear that open source is the only viable future under capitalism.


$$pagebuttons$$