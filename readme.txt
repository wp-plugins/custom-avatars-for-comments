=== Custom Avatars For Comments ===
Contributors: nkuttler
Author URI: http://www.nkuttler.de/
Plugin URI: http://www.nkuttler.de/wordpress/custom-avatars-for-comments/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=11041772
Tags: admin, plugin, comment, comments, avatar, avatars, gravatar, gravatars, i18n, l10n, internationalized, localized
Requires at least: 2.9
Tested up to: 3.0
Stable tag: 0.2.1.1

Allows custom avatars for every comment.

== Description ==

This was initially written for a client and he agreed to open-source it. Thanks, John! Your visitors will be able to choose from the avatars you upload to your website for each and every comment they make. Various configuration options are available.

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

1. Unzip
2. Upload to your plugins directory
3. Enable the plugin
4. Upload your own custom avatars to the the wp-content/commentavatars/ directory

== Screenshots ==

1. The modified comment form. See the [live demo](http://www.nkuttler.de/wordpress/custom-avatars-for-comments/) on my blog.
2. The options page.

== Frequently Asked Questions ==

Q: I have uploaded avatars, there is no error message on the settings page, but I still can't see the avatar selection field<br />
A: Your theme is most likely broken. Tell your theme developer to read the [Theme Development](http://codex.wordpress.org/Theme_Development) page and to add the comment_form action.

Q: I don't like where the avatar selection field shows up on the page.<br />
A: Perform the following steps:

1. Find the comments.php file in your theme directory and open it in an editor. Alternatively edit it through the WordPress theme editor under Appearance-Editor. If your theme doesn't use a comments.php search for a file with a wp_list_comments call or with the comments form.
2. Add `<?php global $CommentAvatarsFrontend; if ( isset( $CommentAvatarsFrontend ) ) $CommentAvatarsFrontend->select(); ?>` where the avatar select list should appear.
3. Check the "Don't show the select field automatically." box on the settings page.

Q: How do I remove the link to the plugin homepage?<br />
A: Please read the plugin's settings page, you can disable it there.

== Changelog ==

= 0.2.1.1 ( 2010-04-06 ) =
 * This should fix the upgrade bug reported by [Twinkling82](http://gamingirl.com/) which kept the plugin in a perpetual upgrade loop. Thanks for the report!
= 0.2.1.0 ( 2010-04-05 ) =
 * Add a 'reset plugin' checkbox, if anybody runs into upgrading problems.
 * Small fix for image URLs
= 0.2.0.0 ( 2010-04-04 ) =
 * The plugin should now work without theme modifications when installed. If it does not, your theme is broken, please see the FAQ. If you were already using an earlier release of this plugin, the automatic display of the select box will be deactivated. You can change that setting on the options page.
 * Add the option to display a 'select no avatar' button
 * Fix forcing of border color
 * Various code optimizations
= 0.1.2.4 ( 2010-04-03 ) =
 * The 0.1.2.2 release broken the frontend CSS, sorry about that, and sorry for releasing so many updates in one day, the plugin is still very young.
 * Admin CSS fix for webkit.
 * I hope nobody uses multiple comment forms on one page.
= 0.1.2.2 ( 2010-04-03 ) =
 * Rename CSS classes and remove IDs to make more sense and avoid invalid markup.
= 0.1.2.1 ( 2010-04-03 ) =
 * Bugfix in the random selection code.
= 0.1.2.0 ( 2010-04-03 ) =
 * Code and interface cleanups, docs update.
 * Add random avatar selection.
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
