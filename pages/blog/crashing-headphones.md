((header))
title:My headphones keep crashing
author:matt
tags:blog, LinuxSaga, tech
date:2025-05-19
((content))
$$blogtop$$

Occasionally my headphones will suddenly start repeating the last audio sample it received, machine-gun-like; this lasts about 10 seconds, then the headphones disconnect, then a few seconds later they reconnect. It sounds just like when a game crashes and your sound driver doesn't know what to do with the garbled data, so it just repeats the last sample over and over until you either kill the program or restart your computer. 

It's tempting to blame this development entirely on linux, but it's happening with my phone, too. It's much less frequent on my phone, and I can go most of a workday with only one or two crashes, but at home, it's reaching a point where I can't even get through a 30-minute video without a crash or two. Linux seems to be the catalyst, but it's not quite so clear-cut.

If you're a regular reader, you might be aware that I use a somewhat specialized pair of headphones:

![alt text](https://i.imgur.com/jT5dboo.jpeg "")

These are [3M Worktunes Connect](https://www.3m.com/3M/en_US/p/d/cbgnawus1754/) headphones, and despite their poor rating on the product page, they're the best headphones I've found that meet my needs. They provide 24dB of noise reduction, they're fully wireless and they have a battery that lasts all day on a charge. They've really become an indispensable part of my [kit](/archive/edc). They protect me from the noise pollution of urban life,[^anc] but more importantly, they've improved my executive function tremendously. I can leave them on for most of the day and listen to things as I do what needs doing. I can listen to podcasts, videos, audiobooks and music all day at work. When I get home, I usually disconnect them from my phone and pair them to my computer. That way, whatever I'm watching or listening to, I can continue watching or listening to when I get up and do something else. I can make dinner, or wash dishes, or take care of Sunny's needs without it feeling like a chore, because my focus isn't interrupted.

I have a pair of wired headphones I use for streaming[^streaming] and I've been using those until I can figure out what's going on with these. The cable isn't long enough to reach the computer on my desk, so I have my microphone on its tripod plugged in via USB, and my headphones are plugged into that. It works, but it's a lot harder to get up and do something when I have to pause whatever I'm listening to.

Bluetooth has always been a terrible unreliable technology, but I never had anywhere near this many problems before I started using linux. They *never* crashed like this, and I've been using them for a long time. I'm on my third pair. They typically last 1-2 years, and when they fail, it's always been a physical fault: the wire frame snaps from repeated flexing, or the button breaks. I've never had to replace them because of  a software issue before. Sometimes they'll disconnect from whatever they're paired to for no reason, bluetooth is flaky, but never like this. The fact that it's also happening with my phone makes me wonder what in the world can be happening.

I don't know much about how bluetooth works, but here's my theory: the headphones must have some small amount of memory to store the device address of every bluetooth device it's been paired with. I believe this is necessary because every bluetooth connection is a handshake between two devices; even though they don't have a display and their input is limited to a single button, the headphones must contain a tiny computer to make this handshake, and because it would be annoying to complete the pairing process every time, it has a small amount of flash memory to store the device history. How many devices will a person pair the headphones to in the lifetime of the product? The headphones can probably store like 50-100 addresses, which the designers assumed is massive overkill, nobody will ever pair them to that many audio devices.

Well, the linux bluetooth driver, being open-source and thus not as purpose-made or well-tested as manufacturer's driver, may be doing something to cause this storage to fill up. It's not using a different address every time, because I don't have to "re-pair" the headphones each time they crash. There might be some sort of garbage collection that's not being done properly, causing the buffer to overrun and the headphones, not designed to deal with this failure mode, simply crash.

This is all conjecture, but that's the only story that makes sense to me. That would explain why they're much more stable with my phone, and why I never had this issue before switching to linux. All that said, I'm not sure exactly how I'm supposed to fix it. The manual says the headphones have a "factory reset" mode that can be activated by continuing to hold the button for 7 seconds after I turn them off, but that doesn't seem to do anything on mine $$pink$$

At some point I intend to get a dedicated bluetooth transmitter, like this:

![](/files/tx.jpg "")

That way I can just connect my computer with a 3.5mm headphone jack and hopefully won't have to worry about software at all. It'll degrade the audio quality somewhat, but I mostly listen to speech when I'm at home anyway, and if I'm listening to music, it's usually through my good speakers.

The transmitter pictured is currently $35 at the Bezos Bazaar, which is more than I'd like to spend just to get headphone functionality back. There are cheaper options, but they mostly seem designed for car use, so I don't expect the range will be very good at all. Having a dedicated transmitter with a proper antenna will hopefully give me a better connection, because it also tends to break up if I move too far away from the source, turn on the microwave, etc.

What's unclear at this point is whether I'll also need to replace my headphones. At this point in time they're working fine, I'm at work and they've been connected to my phone all morning without issue. But without the ability to do a factory reset, or troubleshoot them at a hardware level, it's hard to be 100% sure the crashing won't persist. I don't want to spend $35 and find out the problem really was the headphones all along.[^aliexpress]

I say all this now before my next proper linux update, because this is the biggest issue I've experienced since switching, and I can't even definitively blame it on linux. But you have to admit, the circumstantial evidence is hard to ignore. Other than this, it's been relatively smooth! Tune in next time to hear about the good stuff! And a handful of minor nitpicks!


[^aliexpress]: There are some cheaper options in the Ma Market, and ethically I really don't know if there's much difference these days, but there is a greater risk of not getting what I paid for. I checked ebay and, like all common household goods, I don't see any used ones being sold at a second-hand appropriate price. What a pointless website that turned out to be, huh?

[^streaming]: Bluetooth headphones add an unacceptable amount of lag for streaming, because I hear myself a split second after I talk. The 3M headphones have a 3.5mm jack for wired mode, but incredibly the audio *is still processed* as if it's being used in bluetooth mode. The lag is still present and the battery needs to have a charge, so they don't turn into normal headphones once the non-replaceable battery dies, they just become e-waste $$froggy$$ unhinged engineering.

[^anc]: Some might be wondering why I don't "just" get active noise-cancelling headphones. I've tried them, and they don't work for me. They work fine for the consistent drone of the bus engine, but every time it hits a bump or pothole, the sound shoots through my skull as if the headphones are little ear trumpets funneling the sound directly into my auditory cortex.

$$pagebuttons$$