((header))
title:Kiki URL Rewrites With Managed Hosting
author:matt
tags:blog, kiki, meta, tech
date:2025-04-26
((content))
# $$title$$ {#pagetitle}

>$$date$$
>
>Tags: $$tags$$

Just a quick note about URL redirects with kiki: the [user guide](https://tomodashi.com/kikidemo/help/user_guide) gives some steps for enabling URL rewriting (under the heading "SEO-Friendly Permalinks") for use with the "easy" style of permalinks. For example, instead of ``example.com/index.php?page=blog``, it's much cleaner to simply have ``example.com/blog``.) I figure most people using kiki would prefer this setup, if possible.

The steps in the documentation assume you're running your own apache server[^nginx] and have access to the configuration, but with a managed hosting provider (such as [mine](https://nearlyfreespeech.net)) the process is different. It took some figuring out, but here's what worked for me:

Create a file in your root folder called ``.htaccess``. It should be a text file with only the following lines:

```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?page=$1 [L,QSA]
```

Here's what each line does:

**RewriteEngine on** enables the URL rewriting feature.

**RewriteCond %{REQUEST_FILENAME} !-d** says this rule only applies to anything that isn't an existing folder name.

**RewriteCond %{REQUEST_FILENAME} !-f** says this rule only applies to anything that isn't an existing file name.

**RewriteRule ^(.*)$ index.php?page=$1 [L,QSA]** is what does the rewriting. ``^(.*)$`` is what's know 
as a "wildcard expression".[^regex] It ensures that the rule applies to whatever the visitor types after the ``.com/``.[^zone] the $1 is a reference tag. It refers to whatever appears in the first (in this case only) set of parentheses. So if a visitor types ``example.com/whatever``, as long as "whatever" isn't an existing file or folder name, that it'll display as if the person instead visited ``example.com/index.php?page=whatever``. Importantly, this doesn't *forward* the visitor, it actually changes the URL. That's the difference between a rewrite and a redirect; I confused the terminology in a previous draft, sorry about that.

**[L,QSA]** is part of the Apache rule. ``L`` means "last", i.e. "stop after you process this rule." ``QSA`` is a flag that allows the rule to work with queries, i.e. anything after the ``?`` in the URL.*[^rewrite]*

Big thanks to [RaVBaker](https://gist.github.com/RaVbaker/2254618) for helping me piece this together, particularly his [extended example](https://gist.github.com/RaVbaker/2254618#extended-example). This stuff is tricky and most of the tutorials out there do not explain things well.

The solution may be different for you depending on your hosting provider, but hopefully this will point you in the right direction.

$$pagebuttons$$

[^nginx]: I unfortunately don't have any information about nginx.

[^regex]: To get even more into the weeds: the ``^`` means "the beginning of the line". The ``$`` means "the end of the line". The ``.`` means "any letter, number or symbol". The ``*`` means "I'll keep looking for the previous thing until you tell me to stop". Putting the wildcard in parentheses like ``(.*)`` means you can refer to whatever is between them later in the expression with ``$1``. Regular expressions are [very powerful](https://xkcd.com/208/), but they can make your head spin a bit.

[^zone]: Or in my case of course, ``.zone/``

[^rewrite]: See [RewriteRule Flags](https://httpd.apache.org/docs/current/rewrite/flags.html) at Apache.org.