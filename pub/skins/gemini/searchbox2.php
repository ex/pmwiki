<?php if (!defined('PmWiki')) exit();

/* alternative searchbox function & markup, with onfocus and onblur events
   fully capable of pmwiki's advanced pagelist and search results functions.
*/
## versiondate: 2014-02-20

## redefine searchbox format:
function SearchBox2($pagename, $opt) {
  global $SearchBoxOpt, $SearchQuery, $EnablePathInfo;
 SDVA($SearchBoxOpt, array(
    'size'   => '20', 
    'label'  => FmtPageName('$[Search]', $pagename),
    'value'  => str_replace("'", "&#039;", $SearchQuery)));
 $opt = array_merge((array)$SearchBoxOpt, (array)$opt);
 $focus = $opt['focus'];
 $opt['action'] = 'search';
 if($opt['target']) $target = MakePageName($pagename, $opt['target']); 
 else $target = $pagename;
 $out = FmtPageName(" class='wikisearch' action='\$PageUrl' method='get'>", $target);
 $opt['n'] = IsEnabled($EnablePathInfo, 0) ? '' : $target;
 $out .= "
   <input type='text' name='q' value='{$opt['value']}' class='inputbox searchbox' size='{$opt['size']}' ";
	if ($focus) $out .= "
	 onfocus=\"if(this.value=='{$opt['value']}') this.value=''\" onblur=\"if(this.value=='') this.value='{$opt['value']}'\" ";
 $out .= " />
   <input type='submit' class='inputbutton searchbutton' value='{$opt['label']}' />";
 foreach($opt as $k => $v) {
   if ($v == '' || is_array($v)) continue;
   if ($k=='q' || $k=='label' || $k=='value' || $k=='size') continue;
   $k = str_replace("'", "&#039;", $k);
   $v = str_replace("'", "&#039;", $v);
   $out .= "
   <input type='hidden' name='$k' value='$v' />";
 }
 return "<form ".Keep($out)."
  </form>";
}
Markup_e('searchbox', '>links',
  '/\\(:searchbox(\\s.*?)?:\\)/',
  "SearchBox2(\$pagename, ParseArgs(\$m[1]))");