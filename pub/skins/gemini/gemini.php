<?php if (!defined('PmWiki')) exit();
/*  Copyright 2014 Hans Bracker. 
    This file is part of the gemini skin for PmWiki 2.2.56+
    You can redistribute it and/or modify
    it under the terms of the GNU General Public License as published
    by the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This script sets the default styles for gemini skin.
    It also defines various style options. All options are loaded via seperate css files,
    one each for colors, fonts, rightbar settings and alternative layouts.  
        
    To set different styles than the defaults it uses stylechange.php.
    For switching styles the following are used, which set cookies :
    ?setcolor=..., ?setfont=..., ?setrb=..., setlayout=...
    The following can be used to change a style for a page, without setting  a cookie:
    ?colors=..., ?fonts=..., ?rb=..., ?layout=...
    The possible parameters are defined below in various lists.
      
    By default, the cookies that are created will expire after
    one year.  To have cookies to expire at the end of the browser
    session, set $FontCookieExpires=0; $ColorCookieExpires=0; 
    $RightbarCookieExpires=0; $LayoutCookieExpires=0;
*/
global $FmtPV, $SkinName, $SkinVersionDate, $SkinVersionNum, $SkinVersion, $SkinRecipeName, 
       $SkinSourceURL, $RecipeInfo;
# Some Skin-specific values
$RecipeInfo['GeminiSkin']['Version'] = '2014-02-20';
$SkinName = 'gemini';
$SkinRecipeName = "GeminiSkin";

# for use in conditional markup  (:if enabled GeminiSkin:)
global $GeminiSkin; $GeminiSkin = 1;

global $DefaultColor, $DefaultFont, $DefaultLayout, $DefaultRightbar, 
    $HTMLStylesFmt, $HTMLHeaderFmt, $SidebarWidth, $DefaultSidebar,
    $EnableRightBar, $EnableStyleOptions, $EnableColorOptions, $EnableFontOptions,
    $EnableSidebarOptions, $EnableLayoutOptions, $EnableRightbarOptions,$EnableMenuOptions,
    $EnableThemes, $EnableFontSizer, $EnableBackgroundImages,
    $EnableSidebarSearchbox, $EnableSidebarFontSizer, $EnableGroupTitle,
    $EnablePmWikiCoreCss, $EnablePopupEditForm, $BackgroundImgUrlFmt;

# A RightBar if created is displayed, by default, for all pages.
# $EnableRightBar = 0 disables RightBar as default, for all pages.
# RightBar can be shown on individual pages or groups (via group header) 
# by including markup (:showright:) on the page.
# It can be hidden by including markup (:noright:) on pages.
# A user can also set different widths and hide the Rightbar
# through actions ?setrb=3 (or 2, 1, 0) and ?rb=3 (or 2, 1, 0)
# if Style options are enabled (see below)
SDV($EnableRightBar, 1);

## Adds searchbox to top of sidebar. 
# A searchbox can also be inserted through markup (:searchbox:), 
# which could be added anywhere in the SideBar, PageTopMenu or PageFootMenu.
# In this case you may wish to set
# $EnableSidebarSearchbox = 0;  to disable searchbox in the template.
SDV($EnableSidebarSearchbox, 1);

## Adds fontsizer. To disable font sizing set in config.php: $EnableFontsizer = 0;
# Set $EnableSidebarFontSizer = 0; if the default fontsizer buttons shall not be shown,
# and alternative buttons by adding (:fontsizer:) to sidebar or other places
SDV($EnableFontSizer, 1);
SDV($EnableSidebarFontSizer, 1);

## adding  preview popup for edit window
SDV($EnablePopupEditForm, 1);

# Enables grouplink in titlebar; set to 0 for no grouplink in titlebar.
# The group name can also be hidden on pages with markup (:nogroup:)
SDV($EnableGroupTitle, 1);

# Set default colors, font and layout schemes here,
# the default loads without any cookie being set.
# Different defaults can be set also in config.php 
# or a groups local/GroupName.php (for different coloured groups for instance)
# by adding lines like  $DefaultColor = 'blue';
# The keywords used her must be defined below in the various Page...Lists
SDV($DefaultLayout,   'smallheader'); 
SDV($DefaultSidebar,  'left');
SDV($DefaultRightbar, 'narrow');
SDV($DefaultColor,    'silver');
SDV($DefaultFont,     'verdana');

# Style options for users to switch color and font schemes, rightbar width, 
# sidebar position and header layout. Disable user options by setting 
# $EnableStyleOptions = 0;
SDV($EnableStyleOptions, 1);   # By default style options are enabled, 
# Inidividual option switching can be disabled by type setting any of the following to zero
# An admin may prefer to have the header layout and sidebar position not changeable
SDV($EnableColorOptions, 1);   # color scheme switching
SDV($EnableFontOptions, 1);    # font scheme switching
SDV($EnableSidebarOptions, 1); # sidebar position switching
SDV($EnableLayoutOptions, 1);  # header layout switching
SDV($EnableRightbarOptions, 1);# rightbar width switching
SDV($EnableMenuOptions, 0); # no function for Gemini

# By default markup (:theme colorname fontname:)is enabled, 
# SDV($EnableThemes, 0); #disables theme display.
SDV($EnableThemes, 1);

## background image for transparent color scheme
SDV($BackgroundImgUrlFmt, '$SkinDirUrl/images/beach.jpg');

# Quick way to disable background images:
# Set to 0 if you don't want textured backgrounds set
SDV($EnableBackgroundImages, 1);

# load pmwiki-core.css instead of default styles in page head
SDV($EnablePmWikiCoreCss, 1);

# option arrays, these can be expanded with more custom files.
# comment out any options not wanted, or in config.php set $PageColorList['keyword'] = '';
# The keyword (left of arrow) is used to set the default. 
# Right of the arrow is the css file which gets loaded.
global $PageColorList, $PageFontList, $PageRightbarList;
SDVA($PageColorList, array (
        'blue' => 'c-blue.css',
        'sky' => 'c-sky.css',
        'sky-blue' => 'c-sky-blue.css',
        'sand' => 'c-sand.css',
        'silver' => 'c-silver.css',
        'lavender' => 'c-lavender.css',
        'lilac' => 'c-lilac.css',       
        'pink' => 'c-pink.css',
        'red-gold' => 'c-red-gold.css',
        'green-gold' => 'c-green-gold.css',
        'parch-blue' => 'c-parch-blue.css',
        'parch-yellow' => 'c-parch-yel.css',
        'night' => 'c-night-blue.css',
        'stars' => 'c-night-stars.css',
        'trans' => 'c-transparent.css',
        ));
SDVA($PageFontList, array (
        'sans' => 'font-sans.css',
        'verdana' => 'font-verdana.css',
        'georgia' => 'font-georgia.css',
        'times' => 'font-times.css',
        'palatino' => 'font-palatino.css',
        'monospace' => 'font-lucida.css',
        'courier' => 'font-courier.css',
        'comic' => 'font-comic.css'
        ));
$PageLayoutList = array (
       'standard' => 'standard',        
       'smallheader' => 'smallheader'            
        );
$PageSidebarList = array (
        'left'  => 'left',        
        'right' => 'right'     
        );        
SDVA($PageRightbarList, array (
        '0' => 'display:none',
        'off' => 'display:none',
        'on' => 'width:12em',
        '1' => 'width:12em',
        'narrow' => 'width:12em',
        '2' => 'width:16em',
        'normal' => 'width:16em',
        '3' => 'width:22em',
        'wide' => 'width:22em',
        ));

# set sidebar width
SDV($SidebarWidth, '175px');

# =========== end of configuration section of skin.php ================= #

# compatibility check with pmwiki version number
global $VersionNum, $CompatibilityNotice;
if($VersionNum < '2001018') 
   $CompatibilityNotice = "<p style='color:red'>Compatibility problem: Please upgrade to the latest pmwiki version</p>";

global $BodyAttrFmt;
SDV($BodyAttrFmt, '');

# pmwiki core styles 
# disable pmwiki default core styles, load from core.css
global $HTMLStylesFmt, $PmWikiCoreStylesFmt;
if($EnablePmWikiCoreCss==1) { 
# awaiting pmwiki suport for pmwiki-core.css, $PmWikiCoreCss may need update!
  global $PmWikiCoreCss;
  SDV($PmWikiCoreCss, "pmwiki-core.css");
  if(file_exists("$FarmD/pub/css/$PmWikiCoreCss")) SDV($PmWikiCoreStylesFmt, "
    <link href='$FarmPubDirUrl/css/$PmWikiCoreCss' rel='stylesheet' type='text/css' />");
  else
    SDV($PmWikiCoreStylesFmt, "
     <link href='$SkinDirUrl/css/pm-core.css' rel='stylesheet' type='text/css' />");
  
   $HTMLStylesFmt['pmwiki'] = '';
   $HTMLStylesFmt['diff'] = '';
   $HTMLStylesFmt['simuledit'] = '';
   $HTMLStylesFmt['markup'] = '';
   $HTMLStylesFmt['urlapprove'] = '';
   $HTMLStylesFmt['vardoc'] = '';
   $HTMLStylesFmt['wikistyles']= '';
}

# check for javascript cookie, set $javascript var for (:if enabled javascript:) switch  
global $javascript;
if (isset($_COOKIE['javascript'])) $javascript = $_COOKIE['javascript']; 

# add fontsizer
#if($FontSizer==0 && $EnableFontSizer==1) 
if($EnableFontSizer==1) { include_once("$SkinDir/fontsizer.php");
      $HTMLStylesFmt['fontsizer'] = "";}

# switch to hide FontSizer links
if ($EnableSidebarFontSizer==0) $HTMLStylesFmt[] = " #sidebarfontsizer {display:none} \n";

# define variables
global $Now, $LayoutCss, $SidebarCss, $MenuCss, $RightbarCss, $FontCss,  
        $ColorCss, $IE6Css, $IE5Css, $HTMLStylesFmt, $SkinDir;
$sc = $DefaultColor;
$sf = $DefaultFont;     
$sl = $DefaultLayout;
$ss = $DefaultSidebar;
$sr = $DefaultRightbar;
$ColorCss = $PageColorList[$sc];
$FontCss = $PageFontList[$sf];
$LayoutCss = $PageLayoutList[$sl];
$SidebarCss = $PageSidebarList[$ss];
$RightbarCss = $PageRightbarList[$sr];

# add stylechange.php for cookie setting code if set.
if ($EnableStyleOptions) {include_once("$SkinDir/stylechange.php");};

# do not show rightbar box if RightBar is empty
$prb = FmtPageName('$FullName-RightBar',$pagename);
$grb = FmtPageName('$Group.RightBar',$pagename);
$srb = FmtPageName('$SiteGroup.RightBar',$pagename);
if (PageExists($prb)) $rpage = ReadPage($prb);
if (PageExists($grb)) $rpage .= ReadPage($grb);
if (PageExists($srb)) $rpage .= ReadPage($srb);
if(@$rpage['text']=='') {$HTMLStylesFmt[] = " #rightbar { display:none } \n";};

# header layout and logo-position switching 
if ($sl=='smallheader') { 
   SetTmplDisplay('PageHeaderFmt', 0); 
   SetTmplDisplay('PageStdTopNavFmt', 0);
   }
if ($sl=='standard') { 
   $HTMLStylesFmt[]=" #sideheader.pageheader {display:none}\n"; 
   SetTmplDisplay('PageSmlTopNavFmt', 0);
   }

# add {$PageLogoUrl} to page variables to use on default PageHeader page
global $FmtPV;
$FmtPV['$PageLogoUrl'] = '$GLOBALS["PageLogoUrl"]';

## add alternative searchbox markup
include_once("$SkinDir/searchbox2.php");
  
# switch to hide sidebar searchbox 
global $smallsearchbox;
if ($EnableSidebarSearchbox == 0) { 
            $HTMLStylesFmt[] = " #sidebarsearch {display:none} \n";
            $smallsearchbox = 1;
            };

# switch to hide RightBar
if ($EnableRightBar==1) SetTmplDisplay('PageRightFmt', 1);
else SetTmplDisplay('PageRightFmt', 0);

# changes to extended markup recipe for selflink definition:
global $LinkPageSelfFmt;
$LinkPageSelfFmt = "<a class='selflink'>\$LinkText</a>";

## Set Titles
global $HTMLTitleFmt, $GroupTitleFmt, $TitleFmt, $WikiTitle;
// display or hide group-link in titlebar. Use GroupTitle if available.
if($EnableGroupTitle==0) $GroupTitleFmt = "";
else { 
  // check if GroupTitle is installed
  if (isset($FmtPV['$GroupTitlespaced'])) $grouptitle = PageVar($pagename, '$GroupTitlespaced');
  else $grouptitle = PageVar($pagename, '$Groupspaced');
  SDV($GroupTitleFmt, "<div id='pagegroup'><a href='\$ScriptUrl/\$Group/'>$grouptitle</a></div>");
  }
// set page title
global $PageUrl;
$title = PageVar($pagename, '$Titlespaced');
SDV($TitleFmt, "<h1><a class='titlelink' href='$PageUrl?action=browse'>$title</a></h1>");
// set HTML title
SDV($HTMLTitleFmt, "$WikiTitle - $grouptitle - $title");

#adding switch for 'Pagename-Titlebar' subpage for fancy font titlebars
$ftb = FmtPageName('$FullName-TitleBar',$pagename);
if(PageExists($ftb))  $HTMLStylesFmt[] = " .titlelink { display:none } \n ";  

## ============== special markups ===========================================
# Markup (:nogroup:) to hide group link in titlebar 
function NoPageGroup() {
        global $GroupTitleFmt;
        $GroupTitleFmt = "";
        return ''; } 
Markup_e('nogroup','directives','/\\(:nogroup:\\)/',
  "NoPageGroup()");

## Markup (:noleft:) redefinition
function NoLeftBar() {
     global $HTMLStylesFmt, $PageLeftFmt;
     SetTmplDisplay('PageLeftFmt',0);
     SetTmplDisplay('PageSBRightFmt',0);
     $HTMLStylesFmt[] = " #main { margin-left:0; width:100%; padding-right:0;} #sidebar{margin-left:-500px} #outer{margin-left:0} #left {width:0} \n ";
     return '';
   }
Markup_e('noleft','directives','/\\(:noleft:\\)/', "NoLeftBar()"); 

## Markup (:showright:) (but never shows RB in edit mode)
global $action;
if ($action != 'edit') {
Markup_e('showright','directives','/\\(:showright:\\)/',
  "SetTmplDisplay('PageRightFmt', 1)"); };

## Markup (:notopmenu:)
function NoTopMenu() {
    global $HTMLStylesFmt, $PageTopMenuFmt;
    SetTmplDisplay('PageSmlTopNavFmt',0);
    SetTmplDisplay('PageStdTopNavFmt',0);
    $HTMLStylesFmt[] = "  #titlebar { margin-top:5px } \n ";
    return '';
    }
Markup_e('notopmenu','directives','/\\(:notopmenu:\\)/', "NoTopMenu()"); 
  
## Markup (:nofootmenu:) 
Markup_e('nofootmenu','directives','/\\(:nofootmenu:\\)/',
  "SetTmplDisplay('PageFootMenuFmt', 0)");
  
## Markup (:noaction:) = notopmenu + nofootmenu
function NoAction2() {
    NoTopMenu();
    SetTmplDisplay('PageFootMenuFmt', 0);
    return '';
    }
Markup_e('noaction','directives','/\\(:noaction:\\)/', "NoAction2()");
  
## Markup (:noheader:) 
function NoHeader() {
    global $HTMLStylesFmt, $PageHeaderFmt;
    SetTmplDisplay('PageHeaderFmt',0);
    $HTMLStylesFmt[] = "  #clearheader {height:1px; }
                            #header { display:none; } \n ";
    return '';
    }
Markup_e('noheader','directives','/\\(:noheader:\\)/', "NoHeader()"); 

## Markup (:theme colorname fontname:)
function SetTheme($opt) {
   global $ColorCss, $PageColorList, $FontCss, $PageFontList,$BackgroundImgUrlFmt,
   		$HTMLHeaderFmt, $HTMLStylesFmt, $SkinDirUrl, $EnableThemes;
   $opt = ParseArgs($opt);
   $opt[''] = (array)@$opt[''];
   $sc = (isset($opt['color'])) ? $opt['color'] : array_shift($opt['']);
   $sf = (isset($opt['font']))  ? $opt['font']  : array_shift($opt['']);
   if (@$PageColorList[$sc]) { 
      $ColorCss = $PageColorList[$sc];
      $HTMLHeaderFmt['skin-color'] = "   
   <link href='$SkinDirUrl/css/$ColorCss' rel='stylesheet' type='text/css' media='screen' />";
   }
   if($sf) {
     if (@$PageFontList[$sf]) {
       $FontCss = $PageFontList[$sf];};
       $HTMLHeaderFmt['skin-font'] = "   
   <link href='$SkinDirUrl/css/$FontCss' rel='stylesheet' type='text/css' media='screen' />";
   }
   if($opt['background']) {
      $ColorCss = $PageColorList['trans'];
      $HTMLHeaderFmt['skin-color'] = "   
   <link href='$SkinDirUrl/css/$ColorCss' rel='stylesheet' type='text/css' media='screen' />";
   	$BackgroundImgUrlFmt = $opt['background'];
   	$HTMLHeaderFmt['trans-background'] = " 
			<style type='text/css'><!--
				body { background:url({$BackgroundImgUrlFmt}) fixed; } \n
			--></style>
		";
	}
};
if($EnableThemes == 1) {
    Markup_e('theme', 'fulltext',
      '/\\(:theme\\s+(.*?)\\s*:\\)/',
      "SetTheme(\$m[1])"); 
}
else {
    Markup_e('theme', 'fulltext',
      '/\\(:theme\\s+(.*?)\\s*:\\)/',
      "");
};



## add double line horiz rule markup ====
Markup('^====','>^->','/^====+/','<:block,1>
  <hr class="hr-double" />');

## removing rightbar, header, title for history and uploads windows
global $action;
if ($action=='diff' || $action=='upload') { 
            SetTmplDisplay('PageRightFmt', 0);
            SetTmplDisplay('PageHeaderFmt', 0);
            SetTmplDisplay('PageTitleFmt', 0);
    };

## alternative Diff (History) form with link in title
global $PageDiffFmt, $PageUploadFmt;
$PageDiffFmt = "<h2 class='wikiaction'>
  <a href='\$PageUrl'> \$FullName</a> $[History]</h2>
  <p>\$DiffMinorFmt - \$DiffSourceFmt - <a href='\$PageUrl'> $[Cancel]</a></p>";

## alternative Uploads form with link in title 
$PageUploadFmt = array("
  <div id='wikiupload'>
  <h3 class='wikiaction'>$[Attachments for] 
  <a href='\$PageUrl'> {\$FullName}</a></h3>
  <h3>\$UploadResult</h3>
  <form enctype='multipart/form-data' action='{\$PageUrl}' method='post'>
  <input type='hidden' name='n' value='{\$FullName}' />
  <input type='hidden' name='action' value='postupload' />
    <p align='right' style='float:left'>$[File to upload:]
    <input name='uploadfile' type='file' size=50 /></p>
    <p align='right' style='float:left' />$[Name attachment as:]
    <input type='text' name='upname' value='\$UploadName' size=25 />
    <input type='submit' value=' $[Upload] ' /></p>
    </form></div><br clear=all />",
  'wiki:$[{$SiteGroup}/UploadQuickReference]');

## defining page variables
$SkinVersionDate = $RecipeInfo['GeminiSkin']['Version'];
$SkinVersionNum = str_replace("-","",$SkinVersionDate);
$SkinVersion = $SkinName." ".$SkinVersionDate;
$SkinSourceUrl = 'http://www.pmwiki.org/wiki/Cookbook/'.$SkinRecipeName;
# setting variables as page variables
$FmtPV['$SkinName'] = '$GLOBALS["SkinName"]';
$FmtPV['$SkinVersionDate'] = '$GLOBALS["SkinVersionDate"]';
$FmtPV['$SkinVersionNum'] = '$GLOBALS["SkinVersionNum"]';
$FmtPV['$SkinVersion'] = '$GLOBALS["SkinVersion"]';
$FmtPV['$SkinRecipeName'] = '$GLOBALS["SkinRecipeName"]';
$FmtPV['$SkinSourceUrl'] = 'PUE($GLOBALS["SkinSourceUrl"])';
    
## provide backward compatibility for non-relative urls
if ($VersionNum < 2001900) 
      Markup('{*$var}', '<{$var}', '/\\{\\*\\$/', '{$');
######

## automatic loading of skin default config pages
global $WikiLibDirs, $SkinDir;
    $where = count($WikiLibDirs);
    if ($where>1) $where--;
    array_splice($WikiLibDirs, $where, 0, 
        array(new PageStore("$SkinDir/wikilib.d/\$FullName")));

global $XLLangs, $PageEditForm, $SiteGroup; 
SDV($PageEditForm, $SiteGroup.'.Popup-EditForm');
XLPage('gemini', 'Site.Gemini-Configuration' );
   array_splice($XLLangs, -1, 0, array_shift($XLLangs));      
   
# popup editform load switch
global $ShowHide, $SiteGroup, $HTMLHeaderFmt, $action;
if ($action=='edit') {
  SetTmplDisplay('PageRightFmt',0);
  if($EnablePopupEditForm==1) {
     if(!$ShowHide) include_once("$SkinDir/showhide.php");
     $HTMLHeaderFmt['popupedit'] = "
      <script type='text/javascript'><!--
         document.write(\"<link href='$SkinDirUrl/css/popup2edit.css' rel='stylesheet' type='text/css' />\");
      --></script>
      <noscript>
         <link href='$SkinDirUrl/css/popup2edit-noscript.css' rel='stylesheet' type='text/css' />
      </noscript>
      ";
  }
  else $HTMLHeaderFmt['popupedit'] = "
    <link href='$SkinDirUrl/css/popup2edit-noscript.css' rel='stylesheet' type='text/css' />";
} 

## load skin css files
global $HTMLHeaderFmt;
$HTMLHeaderFmt['skin-layout'] = "
  <style type='text/css' media='all'>
    @import '$SkinDirUrl/css/layout-main.css';
    @import '$SkinDirUrl/css/layout-gemini.css';
    @import '$SkinDirUrl/css/rightbar.css';
  </style>
  <link href='$SkinDirUrl/css/layout-print.css' rel='stylesheet' type='text/css' media='print' />";
$HTMLHeaderFmt['skin-font'] = "  
   <link href='$SkinDirUrl/css/$FontCss' rel='stylesheet' type='text/css' media='screen' />";
$HTMLHeaderFmt['skin-color'] = "   
   <link href='$SkinDirUrl/css/$ColorCss' rel='stylesheet' type='text/css' media='screen' />";

if ($sc=='trans') {
	$HTMLHeaderFmt['trans-background'] = " 
		<style type='text/css'><!--
			body { background:url({$BackgroundImgUrlFmt}) fixed; } \n
		--></style>
	";
}

if($EnableBackgroundImages==0)
$HTMLHeaderFmt['skin-bg-images'] = "
  <style type='text/css' media='screen' >
    body,#content,#titlebar,#sidebar,#footnav,#footer,#rightbar{background-image:none}
  </style>
";

## sidebar width
$HTMLHeaderFmt['sbwidth'] = " 
   <style type='text/css'><!--
   #sidebarbox { width: $SidebarWidth }
   --></style> 
   ";
## switch sidebar position  
## sidebar left, rightbar right
if ($ss =='left') {
   global $SBLeft; $SBLeft = true;
   SetTmplDisplay('PageSBRightFmt', 0);
   $HTMLHeaderFmt['rightbar'] = " 
  <style type='text/css'><!--
     #rightbar { $RightbarCss; margin:-1em -2.2em 0.25em 1em; float:right;} 
  --></style>
  <!--[if lt IE 7]>
    <style type='text/css'> #rightbar {margin:-1em -1.1em 0.25em 1em; } </style>
  <![endif]-->
  ";
 }
## sidebar right, rightbar left
if ($ss =='right') {
   global $SBRight; $SBRight = true;
   SetTmplDisplay('PageLeftFmt', 0);
   $HTMLHeaderFmt['rightbar'] = " 
  <style type='text/css'><!--
     #rightbar { $RightbarCss; margin:-1em 1.5em 0.25em -2.2em; float:left;}
  --></style>
  <!--[if lt IE 7]>
    <style type='text/css'> #rightbar {margin:-1em 1.5em 0.25em -1.1em; } </style>
  <![endif]-->
  ";
}
 
global $EnablePreWrap;
SDV($EnablePreWrap, 1);
# preserve spaces and wrap lines in preformatted text
if($EnablePreWrap==1) { 
  $HTMLHeaderFmt['prewrap'] = "
  <style type='text/css'>
  pre {	white-space: pre-wrap; /* css-3 */
	white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
	white-space: -pre-wrap; /* Opera 4-6 */
	white-space: -o-pre-wrap; /* Opera 7 */
	*break-word: break-all; /* Internet Explorer 7 */
	*white-space: pre;
	* html pre { white-space: normal; /* old IE */ }	
	</style>
  ";
} 