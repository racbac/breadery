# breadery

Contributors: automattic, racbac
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready

Requires at least: 4.5
Tested up to: 4.8
Stable tag: 1.0.0
License: GNU General Public License v2 or later
License URI: LICENSE

## Description
[The Breadery](https://www.breaderyonline.com/) is a small business that sells handmade baked goods alongside various foodstuffs from local vendors. As a side project, I built a custom WordPress theme that introduces responsive layout and an updated design.

## Installation

1. In the admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use the theme.

## Features
### Responsive Layout
The Breadery's website was not responsive. I incorporated Bootstrap classes via page templates and WordPress filters. The main stylesheet uses flexbox and media queries to further customize the site's responsiveness.

### New SVG Logo
I recreated Breadery's logo as an SVG, to align with the new design and optimize resizing.

### Social Icon Styling
#### Automatic Font Awesome Icons
I adapted the SVG icon class in WordPress's Twenty Nineteen theme to support [Font Awesome](https://fontawesome.com/)'s webfont, since the latter includes more icons and easy CSS resizing. The class can 1) given a URL, map it to a social network and return the corresponding icon's HTML, or  2) check the icon database for a given icon name, and return the HTML if it exists.
See inc/icons.php

#### Social Network Coloring
The theme contains a SCSS file to generate classes that apply brand colors to an element's background or foreground, on default or hover.
See src/scss/_social-colors.scss

### Custom Responsive Sidebar
The theme's sidebar uses Bootstrap-style markup to create a toggleable offscreen sidebar.
See src/scss/_sidebar.scss and sidebar.php

### Theme Functionality
When editing pages, users can hide the page's title and add custom CSS to the page via custom meta boxes.
See functions.php

## Changelog

### 1.0 - April 11 2019
- Initial release

## Credits

Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
Font Awesome 5 https://fontawesome.com/, (C) Fonticons, Inc., [SIL OFL 1.1](https://scripts.sil.org/OFL)
Bootstrap 4 https://getbootstrap.com/, (C) Bootstrap, [MIT](https://github.com/twbs/bootstrap/blob/master/LICENSE)
