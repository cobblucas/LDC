* WP dashboard
    * new widgets added (BB twitter feed, BB Support Twitter feed, NP engage Feed, BB Facebook Feed, BB Youtube latest videos, BB Community link)

* Client settings
    * add logo and logo for sticky navigation (if different)
    * Google Analytics or Google Tag Manager field for ID option
    * Pages banners - in order to setup some fallback banners for internal pages, posts, events, search and archives
    * 404 content editable + banner option
    * custom sidebar - allow client to create an infinite amount of “sidebars” that will then display under “appearance” > “widgets”
    * blog options - to allow client to control some settings when displaying posts on pages.
    * Footer info - client can easily add the info that will go in the footer via a WYSIWYG
    * Newsletter - a field to paste the newsletter code (that will display by default in the footer)

* Developer Settings
    * only accessible by bbdev user.
    * lock down - option to enable “prototype” mode and have the whole site grayscale. Hide or show plugins updates. hide or show ACF tab.
    * option to choose background color of WP login screen (useful when client logo is white for instance)
    * fonts - to paste the font code from Typekit or Google Fonts
    * scripts: Addthis - only have to add the Profile ID. (use the blackbaudinteractive account to generate new Profile and create new social share tools, if the client does not have their own account)
    * scripts - Owl carousel JS option added
    * CPT - removed unneeded CPT. kept  Engagement Footer only for now - can be turned off if needed.
    * pages toolbar - need to get in code if Google translate or Font resizer need to be added.
    * Google API key for ACF - so that ACF map can work. A unique API needs to be generated for each client.
    * Google Translate - new field to add the GT code.
    * Mobile menu options - option to now have the offcanvas (either left or right)

* Social sharing
    * getting rid of Share This - keeping Addthis
    * Addthis code can integrate with analytics code

* Users
    * user role editor plugin added and create a custom role called “Site Admin” given to clients only. They have almost all same privileges as and Admin except they cannot see the plugins tab and cannot edit some major settings.
    * all new user get the Blackbaud custom color scheme that matches their branding.

* Plugins
    * Gravity forms officially replaced Formidable - One contact form is setup on the “Contact” page. Recaptcha should be enabled by generating a site key and secret key from the plugin settings page.
    * WP media folder - organizing the media library. Now turned on option to enable duplication of media and overriding of files
    * Bulk Page creator - to create multiple pages at once (useful when creating main menu pages)
    * Foobox - integrated with internal pages image galleries and custom video fields.
    * Instagram Feed Pro license - can add feed on pages or sidebars.
    * ACF content analysis for Yoast in order to take into account ACF in SEO scan.
    * disable rest API plugin added for security and a WP glitch.
    * location nav menu for ACF added in order to customize WP menus with ACF.

* mu-plugins
    * for  WYSIWYG widget
    * for Facebook Feed widget (only FB URL needed)
    * for Twitter Feed widget (now only Twitter URL needed)
    * for Pinterest Board widget ( only need specific pinterest board URL)

* Engagement Footer
    * various background options available (image, colors) - background position or fixed background. add a filter over image
    * Content options built with flexible content ( CTA’s, Featured content (text with an image or video), or testimonial)

* ACF
    * reduced clutter of repeated fields by using the new CLONE field
    * a work in progress to improve all the fields and options

* Menus
    * now ability to add font awesome icons directly to the social menu - (can also be customized for any other menu if need be)
    * ability to custom code a mega menu with ACF directly into primary navigation - (not built-in by default)

* All pages, posts and events
    * Page panner option with option for background image position and caption option with caption position option
    * engagement footer option to select one section created under the Engagement Footer CPT.

* Homepage
    * all content on homepage is done with flexible content sections
    * Options (Slider, CTAs, WYSIWYG, home features, Latest posts, Engagement section selection)
        
* Internal Pages
    * ability to turn on or off sidebar
    * main content has flexible modules  (accordion, data table, image gallery, landing subpages, latest posts, personnel, tabs, testimonial, video, WYSIWYG)
    * sidebar has flexible modules
    * featured image enabled again to display on search result page ( could also be helpful for SEO)
    * Field for excerpt added to display on search result page

* Sidebars
    * flexible modules (sidebar feature, sidebar navigation, video, WP widgets, WYSIWYG)


* WP101 Videos
    * WP Training with Blackbaud added. Simply update the URL of video under Settings after uploading it to server in wp-content/trainings/ folder.

* Calendar
    * Ai1ec custom theme (bbipress calendar) enabled. Agenda view custom style (enhanced)
    * Ai1ec add-on for extended views. (masonry posterboard)

* CODE
    * mobile navigation - includes dropdown arrow for mobile - for mobile OS compatibility
    * moved each navigation into their own files nav-NAV_NAME.php
    * search page now include content built with ACF (thanks Lucas!)

* Database
    * new DB table prefix bbi_ instead of wp_ (to make it more secure)

* Images
    * custom image sizes defaults