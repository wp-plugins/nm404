=== nm404 ===

Contributors: affiliatesolutions
Tags: 404, nm404, no more 404, error, not found, redirection
Requires at least: 3.0
Tested up to: 4.2
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Avoid any 404 errors on your Wordpress-Site by redirecting the request to the closest match found in the sitemap.xml.

If the request will end up in a 404 error, this plugin redirects any user or search engine crawler like Google-Bot, to the closest post or category in your blog.
A sitemap.xml is required to grant the whole functionality of nm404.

*   sitemap.xml required

= Advantages =

*   no more 404 errors
*   no manual redirects necessary
*   better search results
*   better ranking
*   better browsing experience on your website

== Installation ==

Simply install and activate the plugin. "no more 404" don't need any further configuration at the moment.

== Frequently Asked Questions == 

= How do I configure "no more 404"? =

"no more 404" doesn't need any configuration at the moment. It simply does what it is supposed to.

= Why some redirections seem to take too long? =

For large blogs with more than 10000 articles for example, it could take a little bit to search on that larger sitemap.xml the appropiate match for the request.
To avoid a delay you may either cache your sitemap.xml (e.g. through varnish) or put a static sitemap.xml in your document-root.

Additionally it is now possible to limit the entries to parse from the sitemap.xml to increase speed.
Depending on the hardware, it is possible to set a limit to maximal 1000 entries.

= Will the plugin get any enhancements in future? =

We are continuously improving this plugin. In future it will be possible to configure some nice options, so stay tuned!

== Changelog ==

= 1.0.4 =
* Do not redirect favicons requests. For better loading speed
* Minor code tweaks
* Updated readme.txt

= 1.0.3 =
* Backwards compatibility to PHP 5.3

= 1.0.2 =
* Added plugin support for limiting entries to parse from the sitemap.xml to increase speed
* Minor code tweaks

= 1.0.1 =
* Added settings menu

= 1.0.0 =
* Initial release
