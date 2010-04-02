=== Custom Avatars For Comments ===
Contributors: nkuttler
Author URI: http://www.nkuttler.de/
Plugin URI: http://www.nkuttler.de/wordpress/custom-avatars-for-comments/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=11041772
Tags: admin, plugin, comment, comments, avatar, avatars, gravatar, gravatars, i18n, l10n, internationalized, localized
Requires at least: 2.9
Tested up to: 2.9
Stable tag: 0.1.2.0

Allows custom avatars for every comment. You have to edit your theme for this to work.

== Description ==
This was initially written for a client and he agreed to open-source it, thanks, John!. Your visitors will be able to choose from the avatars you upload to your website for each and every comment they make. Various configuration options are available.

You have to modify your theme a little for this to work, see the Installation section.

See a [live demo](http://www.nkuttler.de/wordpress/custom-avatars-for-comments/) on the plugin's home page.

= My plugins =

[Better tag cloud](http://www.nkuttler.de/wordpress/nktagcloud/): I was pretty unhappy with the default WordPress tag cloud widget. This one is more powerful and offers a list HTML markup that is consistent with most other widgets.

[Theme switch](http://www.nkuttler.de/wordpress/nkthemeswitch/): I like to tweak my main theme that I use on a variety of blogs. If you have ever done this you know how annoying it can be to break things for visitors of your blog. This plugin allows you to use a different theme than the one used for your visitors when you are logged in.

[Zero Conf Mail](http://www.nkuttler.de/wordpress/zero-conf-mail/): Simple mail contact form, the way I like it. No ajax, no bloat. No configuration necessary, but possible.

[Move WordPress comments](http://www.nkuttler.de/wordpress/nkmovecomments/): This plugin adds a small form to every comment on your blog. The form is only added for admins and allows you to [move comments](http://www.nkuttler.de/nkmovecomments/) to a different post/page and to fix comment threading.

[Delete Pending Comments](http://www.nkuttler.de/wordpress/delete-pending-comments): This is a plugin that lets you delete all pending comments at once. Useful for spam victims.

[Snow and more](http://www.nkuttler.de/wordpress/nksnow/): This one lets you see snowflakes, leaves, raindrops, balloons or custom images fall down or float upwards on your blog.

[Fireworks](http://www.nkuttler.de/wordpress/nkfireworks/): The name says it all, see fireworks on your blog!

[Rhyming widget](http://www.rhymebox.de/blog/rhymebox-widget/): I wrote a little online [rhyming dictionary](http://www.rhymebox.com/). This is a widget to search it directly from one of your sidebars.

== Installation ==
Unzip, upload to your plugin directory and enable the plugin. You will need to do a little change to your theme to use this plugin. You need a very basic understanding of HTML and maybe CSS to do this. The steps are:

1. Find the comments.php file in your theme directory and open it in an editor. Alternatively edit it through the WordPress theme editor under Appearance-Editor. If your theme doesn't use a comments.php search for a file with a wp_list_comments call or with the comments form.
2. Add `<?php global $CommentAvatarsFrontend; if ( isset( $CommentAvatarsFrontend ) ) $CommentAvatarsFrontend->select(); ?>` where the avatar select list should appear.
3. Upload your own custom avatars to the the wp-content/commentavatars/ directory.

= Support =
Visit the [plugin's home page](http://www.nkuttler.de/wordpress/custom-avatars-for-comments/) to leave comments, ask questions, etc. Please do NOT ask how to modify your theme. I offer paid support though, see my [contact page](http://www.nkuttler.de/contact/) if you're prepared to pay me something around $50.

== Screenshots ==
1. The modified comment form. See the [live demo](http://www.nkuttler.de/wordpress/custom-avatars-for-comments/) on my blog.
2. The options page.

== Frequently Asked Questions ==
Q: Why can't I see the select box for the custom avatars on my website?<br />
A: Please read the Installation section.

Q: How do I remove the link to the plugin homepage?<br />
A: Please read the plugin's settings page, you can disable it there.

== Changelog ==
= 0.1.2.0 ( 2010-04-03 ) =
 * Code and interface cleanups, docs update.
 * Add random avatara selection.
= 0.1.1.0 ( 2010-04-02 ) =
 * Additional CSS class for the custom avatar images.
 * Update docs and german translation.
= 0.1.0.3 ( 2010-04-01 ) =
 * Convert entities in readme.txt.
 * Fix CSS, JS paths.
= 0.1.0 ( 2010-04-01 ) =
 * First public release
 * Add german translation
= 0.0.2 =
 * Development branch
= 0.0.1 =
 * Unpublished release for my client
