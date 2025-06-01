((header))
title:Android Browsers are Weird
author:matt
tags:blog, crafting, phones, tech
date:2025-05-06
((content))
$$blogtop$$

In the old days, Android phones all came with an app installed that was just called *Browser*. This was usually an official Google app, and it was just a wrapper around android's [WebView.](https://en.m.wikipedia.org/wiki/WebView) This is a system component that's always been part of Android, and it's a web renderer that *any* app can use. If you use an app like Instagram or Facebook and click a link, it often uses WebView to render it, rather than opening a dedicated browser. This is because Facebook wants to keep you using Facebook, and if it opens a full browser, you can type in a URL or open a new tab to go somewhere else. Facebook wants you to just tap the "back" button and go back to Facebook, so unless you start clicking links, that's the only option you get.

The popular third-party browsers on early Android, like *Kiwi* and *Dolphin*, were simply wrappers around the WebView API that offered additional features or a better UI than the default Android browser. Some mobile browsers, like *Brave* and *Opera*,[^opera] market themselves heavily and include malware or deceptive services to profit off the users in some way; but fundamentally they're just the same WebView implementation under the hood.[^brave]

There are exceptions; the android version of Firefox still uses a version of their Gecko engine, but as a result it's slower and clunkier than the ones that use WebView.

I use [Via](https://play.google.com/store/apps/details?id=mark.via.gp). It's also just a wrapper around WebView like *Kiwi* and *Dolphin* were, but unlike those browsers, it hasn't yet capitalized on its popularity by adding ads or other malware. It's fast, it stays out of the way, and it even has some basic ad-blocking functionality. It's not as comprehensive as [uBlock Origin](https://en.wikipedia.org/wiki/UBlock_Origin), but it makes the corporate web somewhat usable on a mobile device.

Now, I haven't mentioned the elephant in the room, which is Chrome: at some point, Android stopped coming with an app called "Browser"[^browser] and started including Chrome, which makes sense: they want to unify all their OS stuff under the Chrome umbrella, because in many ways, everything is becoming a web app. ChromeOS can run Android apps, and many modern Android apps are made with the same javascript frameworks that websites are made with. The distinction is becoming less meaningful. 

Here's what I don't understand: *surely* the android version of Chrome is also a wrapper around WebView, right? So why do sites look different on Chrome than they do in Via? I've been mildly obsessed with this question, because I opened my site in Chrome and noticed a lot of text is the wrong size. Other than ``<h1> <h2>`` etc, and the navigation bar and footer, all the text on this site should be exactly the same size. I carefully crafted page elements so that, for example, the Browse section of [the front page](/) is two neat columns in harmony with the rest of the text. But on Chrome, the text in those columns is smaller. The "browse" item in the navbar is too small, the navbar items don't line up nicely in three rows, and the overall text size is much larger than it should be.

I've pored over the CSS. I can't figure out where the discrepancy is coming from. I can't figure out why it doesn't look exactly the same as it does in Via. It *should*. Chrome must use WebView under the hood, right? Or maybe now it's more accurate to say WebView is using Chrome. Either way, it *should* all be the same. The Chrome app is 30MB, which is bigger than *Via*'s 12 MB, but that's probably accounting for Chrome's google profile integration and other data-mining malware. There's no way it contains an entirely separate rendering engine; the desktop version is around 200MB. Idkwtf.

In [Mobile Data Banditry](/archive/mobile-data-banditry), I used my browser's development tools[^chromium] to modify my mobile carrier's web site to insert an ``<iframe>`` and see if it would allow me to bypass their data restrictions.[^mdb] I complained about the user experience on a phone:

![](https://i.imgur.com/eERManS.jpg)

But it was at least possible in 2022. Now it doesn't seem to be. There may be some browser that offers this functionality, but crucially, I can't use the developer tools on mobile Chrome to see what CSS it's applying and why. Mobile Chrome doesn't even seem to have a *view source* function. It's 100% for consumption.

I have a tendency to fixate on small details---you wouldn't believe how long it took me to make sure the little arrow on the "Browse" drop-down changes back and forth correctly---but here, I'm going to have to tap out. I don't have a comb fine-toothed enough to figure out how to make the CSS look normal in Chrome, nor do I have the spoons to care. My official recommendation is not to use Chrome; if you do, zooming out to 90% makes it look closer to how I intend. Beyond that, I can't help you 🦝

[^browser]: Your phone may still come with an app called *Browser*, but it's probably from your phone manufacturer or carrier, not Google. Samsung phones in particular like to change your default browser back to Samsung's Browser every time your device has an update: it's a wrapper around WebView with some added malware.

[^chromium]: In that entry, I incorrectly stated that Android browsers are based on Chromium; my understanding now is that "Chromium" is just the name used by the open-source components of Chrome. If you want to get technical, the engine used by all of these browsers is called Blink. Hopefully you can understand my confusion. What is the exact relationship between WebView, Blink and mobile Chrome? $$mystery$$

[^opera]: Opera used to be great; it was my go-to browser for most of the 2000s, back when there was an actual browser ecosystem. It was bought by a vulture capital cabal in 2016 and has since used its name recognition to facilitate [scams](/topics/scam).

[^mdb]: It didn't, but I still think it was a clever idea.

[^brave]: Reader Goofpunk believes Brave and Opera are in fact using Chromium components rather than WebView; I haven't installed either browser (for obvious reasons) but if true, this makes the whole ecosystem that much more confusing to me: Why would they choose to use Chromx instead of WebView? What's the difference, but more importantly, why *is* there a difference??

$$pagebuttons$$