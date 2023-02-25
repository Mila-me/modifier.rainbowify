<?php
/**
 * Smarty plugin
 */
/**
 * Smarty rainbowify modifier plugin
 * Type:     modifier
 * Name:     rainbowify
 * Purpose:  make letters in string like rainbow
 *
 * @param string  $string    string to rainbowify
 * @param boolean $rainbow_order boolean to use rainbow order of colors
 * @param boolean $inline_css boolean to use inline css, not classes
 *
 * @return string rainbowified string
 * @author Emil "Mila-me" Michalik
 */
function smarty_modifier_rainbowify($string, $rainbow_order = false, $inline_css = true)
{
    $colors = array("FF0000", "FF8400", "FFFF00", "00FF00", "0000FF", "5050CC", "7E2B71");
    $colors_css = array("red","orange","yellow","green","blue","indigo","violet");
    $string = (string) $string;
    $rainbowified = null;
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] == ' ') $rainbowified .= ' ';
        else {
            if ($inline_css) {
                if ($rainbow_order) {
                    $rainbowified .= '<span style="color: #' . $colors[$i % 7] . ';">' . $string[$i] . '</span>';
                } else {
                    $rainbowified .= '<span style="color: #' . $colors[rand(0, count($colors) - 1)] . ';">' . $string[$i] . '</span>';
                }
            } else {
                if ($rainbow_order) {
                    $rainbowified .= '<span class="rainbowify-' . $colors_css[$i % 7] . '">' . $string[$i] . '</span>';
                } else {
                    $rainbowified .= '<span class="rainbowify-' . $colors_css[rand(0, count($colors_css) - 1)] . '">' . $string[$i] . '</span>';
                }
            }
        }
    }
    return (string) $rainbowified;
}
/* CSS to include if you doesn't use inline_css
.rainbowify-red {
    color: #FF0000;
}
.rainbowify-orange {
    color: #FF8400;
}
.rainbowify-yellow {
    color: #FFFF00;
}
.rainbowify-green {
    color: #00FF00;
}
.rainbowify-blue {
    color: #0000FF;
}
.rainbowify-indigo {
    color: #5050CC;
}
.rainbowify-violet {
    color: #7E2B71;
}
/* CSS to include if you want to use $more_colors without inline-css
