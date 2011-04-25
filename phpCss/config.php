<?php
define('PREFIX', '-b-');
$userDefineShortcutsFile='User.json';//user shortcuts json file 
$workingOBCSS='../css/obcss.css';
$outputCssFile='../css/main.css';


//vars that will be replaced
$vars = array(
    'color1' => 'red',
    'color2' => 'blue',
    'size1' => '20px',
    'contSize'=>'800px'
);


$NewLine="\n";
//shortcuts that will be replaced
$shortcuts = array(
    PREFIX => '/*Welcome*/',
    PREFIX.'border-r' => '-moz-border-radius:{a};'.$NewLine.'-webkit-border-radius:{a};'.$NewLine.'border-radius:{a};',
    PREFIX.'translate' => '-webkit-transform: translate({a});'.$NewLine.'-moz-transform: translate({a});'.$NewLine.'-o-transform: translate({a});',
    PREFIX.'skew=>' => '-webkit-transform: skew({a});'.$NewLine.'-moz-transform: skew({a});'.$NewLine.'-o-transform: skew({a});',
    PREFIX.'scale' => '-webkit-transform: scale ({a});'.$NewLine.'-moz-transform: scale({a});'.$NewLine.'-o-transform: scale({a});',
    PREFIX.'rotate' => '-webkit-transform: rotate({a});'.$NewLine.'-moz-transform: rotate({a});'.$NewLine.'-o-transform: rotate({a});',
    PREFIX.'box-shadow' => '-moz-box-shadow:{a};'.$NewLine.'-webkit-box-shadow:{a};'.$NewLine.'box-shadow:{a};',
    PREFIX.'transition' => '-webkit-transition:{a};'.$NewLine.'-moz-transition:{a};'.$NewLine.'-o-transition:{a};',
    PREFIX.'cc'=>'-moz-column-count:{a};/*Firefox*/'.$NewLine.'-webkit-column-count:{a};/*Safari and Chrome*/'.$NewLine.'column-count:{a};',
    PREFIX.'center' => 'margin:0 auto;'.$NewLine.'width:{a};',
    PREFIX.'reset' =>'html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
margin: 0;
padding: 0;
border: 0;
outline: 0;
font-weight: inherit;
font-style: inherit;
font-size: 100%;
font-family: inherit;
vertical-align: baseline;
} /* remember to define focus styles! */
:focus {
outline: 0;
}
body {
line-height: 1;
color: black;
background: white;
}
ol, ul {
list-style: none;
} 
table {
border-collapse: separate;
border-spacing: 0;
}
caption, th, td {
text-align: left;
font-weight: normal;
}
blockquote:before, blockquote:after,
q:before, q:after {
content: "";
}
blockquote, q {
quotes: "" "";
}'
);


?>
