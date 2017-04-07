# Wordpress Schema Plugin

Just a fallback Testimonial plugin for [WP-Schema-Plugin](https://github.com/start-jobs/wp-schema-plugin)

## Features
- adds testimonial support to wordpress;

## Installing
- drop this plugin in `/wp-content/plugins/`;
- activate from Wordpress Plugin manager;
- complete setup in "Schema Settings" menu;

## Shortcodes
It is advised to use php functions from within the theme rather than `do_shortcode('[wsp_***]');`, since `do_shortcode` is very expensive operation.

- `[wsp_testimonials]` / `wsp_testimonials( $args )` - returns all public custom post type `Testimonials` testimonials formatted in HTML. Can be used with the following attributes:
  - `hr="true"` - will add `<hr>` after every testimonial *(default: `False`)*. Good for Testimonial display;
  - `mode="raw"` - will return raw `array` of testimonial data without HTML formatting *(default: `html`)*. Good for custom modifications;
  - `id="$id"` - will return only `$id` testimonial *(default: `False`)*. Good for highlighting specific testimonial;
  - `limit="$n"` - limit to `$n` amount of newest testimonials. *(default: `-1`)*. Good for sliders;

## Built With
- [Schema rating markup](https://schema.org/Rating);
- [Schema structure testing tool](https://search.google.com/structured-data/testing-tool);
- [wp-plugin-template](https://github.com/hlashbrooke/wsp-testimonials);

## Versioning
We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags).
