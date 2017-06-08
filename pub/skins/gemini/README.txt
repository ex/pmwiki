
#### Installation instructions for Gemini and FixFlow skins ####

Install in the usual way by unzipping into skin directory.
A directory named gemini or fixflow will be created with all the files,
grouped in several subdirectories.
Upload the directory and all its subdirectories with all files.

##### Files included #####
Files for all:
README.txt        this readme file.
skin.php          skin script with lots of configuration settings.
stylechange.php   script for changing the style options, based on setting cookies.
skin-gemini.tmpl   skin html template file.
Cascading Style Sheets CSS:
css/layout-gemini.css  toplevel main layout css file for gemini.
css/layout-main.css    main layout css file.
css/layout-print.css   Layout for printing.
css/rightbar.css       rightbar styles
css/c-*.css            files for various colour schemes
css/font-*.css         files for various font schemes
css/pm-core.css        core pmwiki styles
popup2edit.css         popup edit window styles
popup2edit-noscript.css alternative for no-script browsers

images/*.gif *.jpg images for various colour schemes in image folder.

Pagestore files for wiki configuration pages:
wikilib.d/* default configuration pages:
   Site.Gemini-Configuration  with links to the other configuration pages and basic configurations
   Site.Popup-EditForm  default edit form page
   Site.Popup-EditQuickRef popup quick reference (help) page for edit form   
   Site.Gemini-EditForm second edit form if popup isdisabled
   Site.PageTopMenu     default top menu with action links
   Site.PageFootMenu    default foot menu with action links
   Site.PageHeader      default header with pmwiki logo
   Site.PageFooter      default footer
   Site.StyleOptions    page to switch style options
   PmWiki.GeminiTips    admin tips 
   Pmwiki.Gemini or PmWiki.FixFlow short skin "about" page


##### Editing configuration files #####

To set up Gemini as the default skin add to config.php:
   $Skin = 'gemini';

If you use skinchange.php add the following to the $PageSkinList array:
   'gemini' => 'gemini', 

To set different defaults for font and color scheme you can edit the main.php file.
Near the top you find the lines where you can replace the default file names with the ones
of you preference. You need to enter the exact filename (not the path or folder name).

Underneath are arrays for the various options, which can be expanded to include different custom files for
colour and font schemes, and layouts. 

For conveniance it is easier to set different defaults in config.php by adding lines like:
   $DefaultColor = 'sand';
   $DefaultFont = 'georgia';
   
You can also turn style option switching off in config.php with:
   $EnableStyleOptions = 0;
or switch individual style options off. Please see the skin.php file for
details.
   
This way you can customise an individual field, if you have the skin installed in 
the farm's pub/skins/ directory.


##### Setting up the pages containing action links ##### 

All the page actions are configured on wiki pages, not in the template, so they are easily customisable.
If you wish your site to look more "normal" without displaying any edit links you can remove these.
This will just hide the links, but is not a replacement for proper site security, in case that is needed.
You can also add your favourite links etc. You are not restricted to page actions!

Site.PageFootMenu and Site.PageTopMenu are installed automatically, but will not overwrite existing versions,
and can subsequently be edited and configured to your needs.

Note: "Print View" is not necessary any longer, since the skin supports a special print layout, 
so one can go straight to the browsers Print or print Preview function. 
 
##### Setting up the Header (header title and logo) ######

Previously the template contained a link to a logo image, and its location was specified
in config.php by setting $PageLogoUrl. This can still be done, but  
the header can also be configured from a wiki page (this has preference to the $PageLogoUrl
setting):

Site.PageHeader is installed automatically with a default pmwiki logo. It will not overwrite
an existing version. Edit it to include a link to your logo image and/or any header title text.
Example of logo image, linking to Main.Homepage, and uploaded to the Site group:

[[Main.HomePage| Attach:Site/PageHeader/logo.gif]]

Best effect is achieved by creating a transparent gif image for the logo. 
To fit the logo into the sidebar it should not be wider than 160px.
A short texttitle can be used instead, or in addition, to a logo.

PageHeader pages can also be created in wiki groups, and any such page will be displayed 
instead of the default page in the Site group. This allows for customising the header 
for various groups.


##### Setting up a Page Footer ######

Site.PageFooter is installed automatically, but will not overwrite an existing version.

Edit the page for any wiki-site wide footer information 
(like copyright notices etc). Groups can also have their own PageFooter pages for showing
group-specific footer information.


###### Setting up different defaults in skin.php #####

See wiki page Pmwiki.GeminiTips