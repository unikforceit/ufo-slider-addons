<?php
function woo_multi_product_cat($tax)
{
    $args =  [
        'taxonomy'=> $tax,
        'parent'   => 0,
        'hide_empty' => true,
    ];
    $categories_obj = get_categories($args);
    $categories = array();

    foreach ($categories_obj as $pn_cat) {
        $categories[$pn_cat->term_id] = $pn_cat->cat_name;
    }

    return $categories;
}
function ufochangeHeading($level, $content) {
    // Ensure the level is between 1 and 6
    if ($level < 1 || $level > 6) {
        return "Invalid heading level!";
    }

    // Return nothing if content is empty
    if (empty($content)) {
        return "";
    }

    // Generate the heading tag
    $headingTag = "h" . $level;

    // Return the complete HTML heading element
    return "<$headingTag class='heading'>$content</$headingTag>";
}
