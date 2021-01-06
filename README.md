# Agency Integration WordPress Plugin

Proof of concept for integration of Craft CMS Agency application data into Wordpress

## Setup

Add the following constants to `wp-config.php`:

```
define( 'AGENCY_API_BASE_URL', 'your_url' );
define( 'AGENCY_ENABLE_CACHE', false/true );
```

## How it works

This plugin allows to display the vita of an actor/actress in WordPress posts.

The slug of the corresponding Craft CMS entry must be provided, optionally a custom heading can be passed in.

Depending on your WordPress setup and which plugins are installed, there are different ways to integrate the data:

### Elementor (free) installed?

An Elementor widget can be found in the 'Wigets' section.

This widget allows you to customize the typography and text color, as well as the usual
elementor widget setting (background-color, spacing etc).

### Advanced Custom Fields (PRO) installed?

A block can be found in the block editors 'widgets' section.
This allows a full editor preview.

Setup:

* Create a new field group.
* Add a field 'slug' (Field Type: Text, Field Name: slug)
* Set up location: Show this field group if `Block is equal to Vita ACF Block`
* Display names/instructions etc. is up to you.

### Gutenberg (Block Editor) Block

A block can be found in the block editors 'widgets' section.
This does not allow a full editor preview.

### Shortcode

Can be used in the Classic Editor or in a shortcode block.

`[vita slug="firstname-lastname" heading="your heading"]`

## Styling

A simple styling is provided. You may want to add your own styling using the following class names:

* .vita
* .vita-heading
* .vita-class
* .vita-year
* .vita-role
