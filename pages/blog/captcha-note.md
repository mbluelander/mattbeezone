((header))
title:Quick Note on Captchas
author:matt
tags:blog, meta
date:2025-05-07
((content))
$$blogtop$$

Well, the "negative captcha" I talked about a few days ago didn't do shit. The oldest reference to the idea I can find is from 2007, so I should've guessed that trick would no longer work. I've been getting a ton of spam in the [guestbook](/guestbook) for websites about finding pre-owned cars in Ukraine. Even if I *were* a Ukrainian car-driver, I'd probably have more pressing issues at the moment.

So there's a captcha again, and this time it should be something that's trivial for humans to answer but hopefully subjective enough to trip up a bot-and also not based on image recognition, because that can cause accessibility issues, and doing an audio captcha is a pain.

I expect that these bots are doing some sort of LLM query now, which seems nuts-if my tiny nothing of a website with no external links is a target, the bots must be spamming at a massive scale, and doing an LLM query for thousands or millions of websites must be super expensive; I hardly see how spamming my little website with rounding-error traffic can possibly be worth it. But spambots were able to figure out what color the sky is, and tell me, so there must be *some* amount of language processing going on.

I feel like identifying that a word "sounds like" another word is something even LLMs would struggle with,[^LLM] so hopefully this cuts the spam without being too much of a burden. I mean, I guess I could ask "how many Rs are in the word strawberry" and it'd be effective forever, but that might trip some people up, too.

Also, when I was setting this up, I realized that the form for mention URLs when you press the "reply" button was configured incorrectly, so if you sent any of those, I haven't been receiving them. It should be working now, so feel free to resubmit if you like and sorry about the error. There's no captcha on that form at the moment, but I might add one if it becomes a problem too.

Finally, to the reader who sent a reply to [Neurodivergence](/blog/neurodivergence) around when I was messing with the captcha stuff, your message came through and I'll reply when I get a chance. Sorry for all the weirdness.

$$pagebuttons$$

[^LLM]: When I got home from work, I asked one of the leading chatbots to answer and sure enough it flubbed it in spectacular fashion. It clearly didn't understand the question and the rationale for its wrong answer made no sense even in a vacuum.