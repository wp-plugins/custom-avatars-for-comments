=== Custom Avatars For Comments ===
Contributors: nkuttler
Author URI: http://www.nkuttler.de/
Plugin URI: http://www.nkuttler.de/wordpress-plugin/custom-avatars-for-comments/
Donate link: http://www.nkuttler.de/wordpress/donations/
Tags: admin, plugin, comment, comments, avatar, avatars, gravatar, gravatars, i18n, l10n, internationalized, localized
Requires at least: 2.9
Tested up to: 3.0
Stable tag: 0.2.2

Allows custom avatars for every comment.

== Description ==

This was initially written for a client and he agreed to open-source it. Thanks, John! Your visitors will be able to choose from the avatars you upload to your website for each and every comment they make. Various configuration options are available.

See a [live demo](http://www.nkuttler.de/wordpress/custom-avatars-for-comments/) on the plugin's home page.


= Other plugins I wrote =

 * [Better Lorem Ipsum Generator](http://www.nkuttler.de/wordpress-plugin/wordpress-lorem-ipsum-generator-plugin/)
 * [Better Related Posts](http://www.nkuttler.de/wordpress-plugin/wordpress-related-posts-plugin/)
 * [Custom Avatars For Comments](http://www.nkuttler.de/wordpress-plugin/custom-avatars-for-comments/)
 * [Better Tag Cloud](http://www.nkuttler.de/wordpress-plugin/a-better-tag-cloud-widget/)
 * [Theme Switch](http://www.nkuttler.de/wordpress-plugin/theme-switch-and-preview-plugin/)
 * [MU fast backend switch](http://www.nkuttler.de/wordpress-plugin/wpmu-switch-backend/)
 * [Visitor Movies for WordPress](http://www.nkuttler.de/wordpress-plugin/record-movies-of-visitors/)
 * [Zero Conf Mail](http://www.nkuttler.de/wordpress-plugin/zero-conf-mail/)
 * [Move WordPress Comments](http://www.nkuttler.de/wordpress-plugin/move-wordpress-comments/)
 * [Delete Pending Comments](http://www.nkuttler.de/wordpress-plugin/delete-pending-comments/)
 * [Snow and more](http://www.nkuttler.de/wordpress-plugin/snow-balloons-and-more/)

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
= 0.2.2 ( 2010-12-09 ) =
 * Load css + js from correct server
 * Re-arrange admin page
= 0.2.1.2 ( 2010-06-06 ) =
 * Make the exclude CSS option work
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
