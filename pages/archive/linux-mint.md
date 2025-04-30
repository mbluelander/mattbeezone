((header))
title:Linux Mint
author:matt
tags:archive, correspondence, LinuxSaga, rant, tech
date:2025-04-13
((content))
<h1 id="pagetitle">$$title$$</h1>

>$$date$$
>
>Tags: $$tags$$

In response to [my last post](/linux-hate), Kami [wrote a reply](https://kami.bearblog.dev/i-hate-the-person-linux-turns-me-into-im-sorry-but-youre-holding-it-wrong/) which boils down to:

>Just get Linux Mint.

A reader named Mark sent a reply with much the same advice. I appreciate both of your responses.

When I used Mint, I had a number of problems similar to the ones described in my previous post, but the worst is that the filesystem would gradually become more and more corrupt as I used it. I would randomly find myself unable to do anything because the entire hard drive would become locked down to "read only" mode. When I rebooted, the OS wouldn't load, and it would bring me to a grub prompt. I could run a `fsck` command, which would temporarily fix the problem and allow me to use the computer a little longer, but the filesystem would inevitably become corrupt again. Each time I ran `fsck`, it took a little bit longer, eventually needing 30-45 minutes to run its course; and each time this happened, I would have less and less time before the filesystem shit itself again. Eventually it would reach a point of unrecoverability, and I would need to wipe the hard drive and reinstall the OS. This happened about once a month.

$$pagebuttons$$