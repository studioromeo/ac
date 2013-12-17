<?php

/**
 * Theme functions for categories
 */

function total_categories() {
    if( ! $categories = Registry::get('categories')) {
        $categories = \Anchor\Core\Models\Category::all();

        Registry::set('categories', $categories->getIterator());
    }

    return $categories->count();
}

// loop categories
function categories() {
    if( ! total_categories()) return false;

    $items = Registry::get('categories');

    if($result = $items->valid()) {
        // register single category
        Registry::set('category', $items->current());

        // move to next
        $items->next();
    }

    return $result;
}

// single categories
function category_id() {
    return Registry::prop('category', 'id');
}

function category_title() {
    return Registry::prop('category', 'title');
}

function category_slug() {
    return Registry::prop('category', 'slug');
}

function category_description() {
    return Registry::prop('category', 'description');
}

function category_url() {
    return 'TODO';
    // die()
    // return base_url('category/' . category_slug());
}

function category_count() {
    return Anchor\Core\Models\Category::find(category_id())
        ->posts()->where('status', 'published')->count();
}
