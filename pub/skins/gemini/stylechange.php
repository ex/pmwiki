<?php if (!defined('PmWiki')) exit();
/*  
    stylechange.php   - A part of Gemini and FixFlow skins -
    
    This script enables various skin configurations using alternative css files
    or styles injected via skin.php.
    It uses six sets of options, to set fonts, colors, the rightbar, 
    the sidebar position, the menu behaviour and different layouts. 
    It uses six cookies. 
    The various options are defined in skin.php 
*/

global $Now, $LayoutCss, $SidebarCss, $MenuCss, $FontCss, $RightbarCss, $ColorCss,
   $CookiePrefix, $LayoutCookie, $SidebarCookie, $MenuCookie, $RightbarCookie, 
   $FontCookie, $ColorCookie ;

# set cookie expire time (default 1 year)
SDV($LayoutCookieExpires,$Now+60*60*24*365);
SDV($SidebarCookieExpires,$Now+60*60*24*365);
SDV($MenuCookieExpires,$Now+60*60*24*365);
SDV($RightbarCookieExpires,$Now+60*60*24*365);         
SDV($FontCookieExpires,$Now+60*60*24*365);
SDV($ColorCookieExpires,$Now+60*60*24*365);

$prefix = $CookiePrefix.$SkinName.'_';

SDV($SkinCookie, $prefix.'setskin');

# layout cookie routine
if($EnableLayoutOptions) {
   SDV($LayoutCookie, $prefix.'setlayout');
   if (isset($_COOKIE[$LayoutCookie])) $sl = $_COOKIE[$LayoutCookie];
   if (isset($_GET['setlayout'])) {
       $sl = $_GET['setlayout'];
       setcookie($LayoutCookie,$sl,$LayoutCookieExpires,'/');}
   if (isset($_GET['layout'])) $sl = $_GET['layout'];
   if (@$PageLayoutList[$sl]) $LayoutCss = $PageLayoutList[$sl];
   else $sl = $DefaultLayout;
   }
   
# sidebar cookie routine
if($EnableSidebarOptions) {
   SDV($SidebarCookie, $prefix.'setsidebar');
   if (isset($_COOKIE[$SidebarCookie])) $ss = $_COOKIE[$SidebarCookie];
   if (isset($_GET['setsidebar'])) {
     $ss = $_GET['setsidebar'];
     setcookie($SidebarCookie,$ss,$SidebarCookieExpires,'/');}
   if (isset($_GET['sidebar'])) $ss = $_GET['sidebar'];
   if (@$PageSidebarList[$ss]) $SidebarCss = $PageSidebarList[$ss];
   else $ss = $DefaultSidebar;
   }
   
# menu cookie routine
if($EnableMenuOptions) {
   SDV($MenuCookie, $prefix.'setmenu');
   if (isset($_COOKIE[$MenuCookie])) $sm = $_COOKIE[$MenuCookie];
   if (isset($_GET['setmenu'])) {
     $sm = $_GET['setmenu'];
     setcookie($MenuCookie,$sm,$MenuCookieExpires,'/');}
   if (isset($_GET['menu'])) $sm = $_GET['menu'];
   if (@$PageMenuList[$sm]) $MenuCss = $PageMenuList[$sm];
   else $sm = $DefaultMenu;
   }

# rightbar cookie routine
if($EnableRightbarOptions) {
   SDV($RightbarCookie, $prefix.'setrb');
   if (isset($_COOKIE[$RightbarCookie])) $sr = $_COOKIE[$RightbarCookie];
   if (isset($_GET['setrb'])) {
     $sr = $_GET['setrb'];
     setcookie($RightbarCookie,$sr,$RightbarCookieExpires,'/');}
   if (isset($_GET['rb'])) $sr = $_GET['rb'];
   if (@$PageRightbarList[$sr]) $RightbarCss = $PageRightbarList[$sr];
   else $sr = $DefaultRightbar;
   }

# font cookie routine
if($EnableFontOptions) {
   SDV($FontCookie, $prefix.'setfont');
   if (isset($_COOKIE[$FontCookie])) $sf = $_COOKIE[$FontCookie];
   if (isset($_GET['setfont'])) {
     $sf = $_GET['setfont'];
     setcookie($FontCookie,$sf,$FontCookieExpires,'/');}
   if (isset($_GET['fonts'])) $sf = $_GET['fonts'];
   if (@$PageFontList[$sf]) $FontCss = $PageFontList[$sf];
   else $sf = $DefaultFont;
   }

# color cookie routine 
if($EnableColorOptions) {
   SDV($ColorCookie, $prefix.'setcolor');
   if (isset($_COOKIE[$ColorCookie])) $sc = $_COOKIE[$ColorCookie];
   if (isset($_GET['setcolor'])) {
     $sc = $_GET['setcolor'];
     setcookie($ColorCookie,$sc,$ColorCookieExpires,'/');}
     if (isset($_GET['colors'])) $sc = $_GET['colors'];
   if (@$PageColorList[$sc]) $ColorCss = $PageColorList[$sc];
   else $sc = $DefaultColor;
   }

#####end cookies
