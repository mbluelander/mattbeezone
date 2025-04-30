((header))
title:I Hate The Person Linux Turns Me Into
author:matt
tags:archive, LinuxSaga, rant, tech
date:2025-04-12
((content))
<h1 id="pagetitle">$$title$$</h1>

>$$date$$
>
>Tags: $$tags$$

I don't have anything planned this weekend outside of the usual chores, so I embarked on the project of setting up linux on my computer. I had made the decision weeks ago, but I wanted to wait until we finished this round of archipelago streams, because I knew it might take days or weeks to get my streaming setup working and stable again. We finished on Thursday, so on Friday I backed up all my essential files, and today I did a clean install. I had stuck with Windows 7 as long as possible, but it's time to finally pull the plug.

Archipelago is the thing that finally convinced me: most of the game integrations don't work with Windows 7, and the April 1 update killed Windows 7 support completely. I could've stuck with the old version--none of the newly supported games are in my wheelhouse--but my options would still be extremely limited. Most supported games that otherwise run fine on 7, like VVVVVV, have randomizers that require windows 10. It doesn't make sense to me, because you can write a program for Windows 7 and it'll still work on Windows 10. There's backwards compatibility. I don't know why people use new APIs just because they exist.

Anyway, the installation went fine, all my hardware seems to be supported (it's a Thinkpad, so no surprises there) but every single facet of using the software has required painstaking research to figure out what I'm supposed to do. The app store on this version of linux (fedora XFCE) is called **_"dandified yum dragora"_**, a terrible and meaningless name I'll never remember, so it will always be *__duke nukem forever__* to me. Some of the programs I want to use are on there, but a lot of them aren't. I installed VLC to watch videos, and it didn't come with any of the codecs it apparently needs to work. Codecs? I thought the whole point of VLC is that it doesn't require codecs. I was thrilled in 2009 when VLC came along and I no longer had to mess with "k-lite codec pack" and the like.

After googling and finding dozens of forum threads for ways to install the codecs and trying 3 or 4 of them, I finally gave up and took someone's advice to install VLC from "flatpack" instead. Flatpack is like DNF, but different. It doesn't have a UI, so I had to use a command prompt to install it. 

The two main uses for a computer are 1. using the web, and 2. watching videos. Linux came with firefox, so #1 was at least taken care of, but I shouldn't have to go into the command prompt to do the very next thing on the list. Off to a bad start!

Once it said it was finished installing, it wasn't installed, so I had to google what to do next. I logged out and back in. It's there now.

Next I had to install Chrome for when my spouse wants to use my computer. This was a piece of cake! I went to the chrome website, I clicked the "get chrome" button, it downloaded a file, I double-clicked it and installed chrome. I hate chrome, but you gotta hand it to them, they make it easy to use their program. If only every program cared about whether people use it.

Next I needed to install bizhawk, for games. It's not on any of the app stores, but it wasn't too hard to set up. I downloaded a .tar.gz file (which is like a zip file but worse) and extracted the contents into a folder. I tried running the executable, but nothing happened. This took some figuring out, but basically the program doesn't run if you click the executable directly, you have to make a desktop shortcut. So I did that, and it launched, but I couldn't play any games. As it turns out, this version doesn't come with any of the firmware you need. Everything, *everything* on linux requires at least two or three extra steps nobody tells you about.

I googled the bizhawk firmware and downloaded all of them. I got a couple NES and PSX games to work. When I tried to set up the PSX controller, the icons for triangle, square and O don't show up. Just X. So I'll have to trial-and-error to figure out which fields correspond to which buttons. But first I have to figure out why all of the buttons on my controller aren't working. When I first tried to configure it, start and select weren't working. I unplugged it and plugged it back in. Now L and R aren't working. When I use [hardwaretester.com](https://hardwaretester.com/gamepad), all of the buttons are recognized, so I don't know what the problem is. AFAICT, Linux doesn't have a gamepad configuration tool, so I have no way to even troubleshoot it.[^gamepad]

Okay, let's forget about programs for a minute and talk about UI: at a glance, modern linux desktops don't look too bad. Some of them even have themes where everything doesn't look completely flat. Nice! Way better than modern Windows. 

However, even on themes modeled after Classic Windows, the illusion of user-friendliness shatters as soon as you try to use it. You immediately find yourself confronted with missing UI functionality you weren't even aware you need until it's gone, at which point you realize how indispensable it is.

For example, on my default installation, the color of the active window's title bar was the same as inactive title bars, no matter what theme I used. Not being able to tell which window has focus meant I would start typing a chat message in Discord, and suddenly whatever I had open in Firefox would start responding to a bunch of hotkeys I didn't intend to press. Maddening!

There are about a million different settings menus that sound like they might let you change UI colors, such as "Display", "Appearance", "Color profiles", "Desktop", "Panel", "Panel Profiles", "Window Manager", "Window Manager Tweaks", "XF Dashboard", etc. etc. Can you guess which one of these has the option to change the active window title bar color? If you guessed "none of them", you would be correct. I had to go into the folder for the theme I'm using, *create a CSS file*, and add a line of CSS I'd have never known about if I didn't happen to find a forum thread where someone asked this question. There isn't even a placeholder file with a bunch of example code I can uncomment, I have to somehow know what the elements are called.

What about the taskbar? Looks normal, but observe: The Firefox taskbar item isn't all the way to the left, even though it was the first program I opened:

![](https://i.imgur.com/xRGlvc8.png "")

The web browser has been the main program I use on a computer for at least 20 years. I have 20 years of muscle memory that says the  web browser is always the very first thing on the taskbar. If this is ever *not* the case, I drag it all the way to the left so it is the first thing. On linux, of course dragging doesn't do anything.

I stumbled on the answer on my own, which is good because I have no idea what these things are called or how to google them. They're not icons; they *have* icons, but what do you call the thing the icon and text label lives on? The answer is "window buttons", apparently, but I've never consciously thought of them as "buttons" before now. I didn't need a name for them, because they worked the way they're supposed to.

Anyway, you have to go into "Panel Preferences"--"panel" is what the taskbar is called on linux, even though the word "taskbar" isn't trademarked and they could just *call it that*--and enable the setting for the "sorting order" to "allow drag-and-drop". Why isn't this the default? Why do I have to request special permission?

![](https://i.imgur.com/zROit5H.png "")

You are a computer. Let me drag. Let me drop.

Speaking of dragging, here's a UI thing no amount of googling or experimentation is helping with: when you move or resize a window, it has this little tooltip in the middle showing the current position and size of the window. I see how this could be useful in some circumstances, but there's a bug where it doesn't properly erase and redraw the tooltip when you move the window, causing this "snaking" effect I find incredibly annoying. So I'd like to turn this feature off please.

>![](https://i.imgur.com/dKRgWkC.jpeg "")
>
>I had to take a photo of my screen with my phone, because there's no way to make the screenshot key take a screenshot. Pressing it opens the screenshot-taking *program*, but it won't let you open this program while a window is in motion. Want to take a screenshot while you're moving a window? "Fuck you", that's what linux has to say.

I can't find a single piece of documentation or official communication that acknowledges this feature exists. I found one reddit thread with someone asking how to turn it off, and no one had any idea what he was talking about. What are the magic words I need to find a solution? "XFCE window size tooltip" seems like a good bet, but googling that brings up nothing but unrelated problems using the same words. Is it not a tooltip? What is it? I want to throw my computer from the window of a moving train. I want to walk into the sea.

I hate what linux turns me into. I turn into a gibbering problem-solving maniac. I can't cope with everything being broken at once. It's not just adjusting to a new workflow, it's building a new workflow from scratch atom by atom. My brain wants to fix everything at once, and it's so hard to interrupt the doom cycle. My spouse practically had to physically drag me away from the keyboard so I could get to the laundry room before it closes. It's ADHD kryptonite.

It's like being overwhelmed by sidequests in *Skyrim*, except I get a new sidequest when I open the menu. I get a new sidequest for every page of the inventory, every tab on the skill tree, every item slot I try to equip. I press the "jump" button and I'm given a sidequest to complete before I unlock jumping. No quest targets appear on my compass except the ones to the north. I have to do sidequests to unlock east, west and south.

I would not play this game. I would uninstall it immediately. But this isn't a game. It's the software I need to do literally everything. No one should have to endure this.

Well, I could complain about broken UI literally all day. The whole reason I'm here is because of archipelago, so let's fire up the new version and have a lo--

```python
Fatal Python error: init_fs_encoding: failed to get the 
Python codec of the filesystem encoding
Python runtime state: core initialized
ModuleNotFoundError: No module named 'encodings'

Current thread 0x00007f215ebd95c0 (most recent call first):
  <no Python frame>
```

<audio controls src="https://mattbee.zone/hangup.mp3"></audio>

>*`Apr 13 2025`* See Kami's response to this post, [I'm sorry, but you're holding it wrong](https://kami.bearblog.dev/i-hate-the-person-linux-turns-me-into-im-sorry-but-youre-holding-it-wrong/), and my response, [Linux Mint](/?page=archive/linux-mint).


$$pagebuttons$$



[^gamepad]: It doesn't come with one, but I found a program called [input remapper](https://github.com/sezanzeb/input-remapper) that allowed me to remap every gamepad button to a key on the keyboard. So it's like JoyToKey except that I have to use it for everything, not just keyboard games. Whatever works, I guess.
