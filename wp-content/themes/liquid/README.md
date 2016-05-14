# [Liquid](http://liquid.getfluid.com)

Liquid is a WordPress starter theme based off of [Sage](https://github.com/roots/sage) and [Cutlass](https://github.com/zach-adams/cutlass-wp-theme). Liquid includes the [Foundation](https://github.com/zurb/foundation) front end framework as well as a a modified version of [Laravel's Blade](http://laravel.com/docs/5.1/blade) tempalate engine.

## Requirements

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| PHP >= 5.4.x    | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Node.js 0.12.x  | `node -v`    | [nodejs.org](http://nodejs.org/) |
| gulp >= 3.8.10  | `gulp -v`    | `npm install -g gulp` |
| Bower >= 1.3.12 | `bower -v`   | `npm install -g bower` |

For more installation notes, refer to the [Install gulp and Bower](#install-gulp-and-bower) section in this document.

## Features

* [Gulp](http://gulpjs.com/) build script that compiles Sass, checks for JavaScript errors, and concatenates and minifies files
* [Bower](http://bower.io/) for front-end package management
* [Sass](http://sass-lang.com/) [Foundation](http://foundation.zurb.com/)
* [Blade](http://cutlasswp.com/docs/)

## Installation

Clone the git repo - `https://github.com/getfluid/liquid.git` and then rename the directory to the name of your theme or website.

If you don't use [Bedrock](https://github.com/roots/bedrock), you'll need to add the following to your `wp-config.php` on your development installation:

```php
define('WP_ENV', 'development');
```

WARNING: Livereload will not work until you add this to your wp-config.php, or equivalent file.

## Configuration

Edit `lib/setup.php` to enable or disable theme features

## Theme development

Liquid uses [gulp](http://gulpjs.com/) as its build system and [Bower](http://bower.io/) to manage front-end packages.

### Install gulp and Bower

Building the theme requires [node.js](http://nodejs.org/download/). We recommend you update to the latest version of npm: `npm install -g npm@latest`.

From the command line:

1. Install [gulp](http://gulpjs.com) and [Bower](http://bower.io/) globally with `npm install -g gulp bower`
2. Navigate to the theme directory, then run `npm install`
3. Run `bower install`
4. Run `gulp build`

You now have all the necessary dependencies to run the build process.

### Available gulp commands

From the theme root, you can now begin to build your assets. Below are the available gulp commands you can use, depending on what you need.

* `gulp` — Compile assets when file changes are made and refresh browser - For local development.
* `gulp build` — Compile assets (with no source maps) before deploying the site to a production server.

### Available Blade Functions

The Liquid theme utilizes a modified version of Laravel's Blade engine. Below, you'll find the blade functions you can use in your templates. This is only a handful of the awesome things Blade allows you to do. We recommend reading the [Blade](http://laravel.com/docs/5.1/blade) documentation to find out more.

### Brackets
`{{ getDo() }}` compiles to `<?php getDo() ?>`

`{{{ $stuff }}}` compiles to `<?php echo $stuff ?>`

### Wordpress Loop
```
@wpposts
  <h2><a href="{{ the_permalink() }}">{{ the_title() }}</a></h2>
@wpempty
  <p>{{ _e( 'Sorry, no posts matched your criteria.' ) }}</p>
@wpend
```

### Wordpress Specific Loop
```
@wpquery( array( 'post_type' => 'post' ) )
  <li><a href="{{ the_permalink() }}">{{ the_title() }}</a></li>
@wpempty
  <li>{{ __( 'Sorry, no posts matched your criteria.' ) }}</li>
@wpend
```

### Define a variable
```
@define $phpvar = 'whatever'
```

### Advanced Custom Fields
```
@acfrepeater('images')
  <li>{{ the_sub_field( 'image' ) }}</li>
@acfend
```

### Advanced Custom Fields if (get_field())
```
@ifgf('button_text')
  <li>{{ the_sub_field('button_text') }}</li>
@endif
```

### Echoing a Variable
```
Hello, {{{ $name }}}.
The Wordpress site url is {{ bloginfo('url') }}
```

### Render A View
```
@include('header')
	<p>Hello World!</p>
@include('footer')
```

### Blade Comments
```
{{-- This is a comment --}}
```

### For Loop
```
@for ($i = 0; $i <= count($comments); $i++)
  The comment body is {{{ $comments[$i] }}}
@endfor
```

### Foreach Loop
```
@foreach ($comments as $comment)
  The comment body is {{{ $comment->body }}}.
@endforeach
```

### While Loop
```
@while ($something)
  I am still looping!
@endwhile
```

### If Statement
```
@if ( $message == true )
  I'm displaying the message!
@endif
```

### If Else Statement
```
@if (count($comments) > 0)
  I have comments!
@else
  I have no comments!
@endif
```

### Else If Statement
```
@if ( $message == 'success' )
  It was a success!
@elseif ( $message == 'error' )
  An error occurred.
@else
  Did it work?
@endif
```

### For Else Statement
```
@forelse ($posts as $post)
  {{{ $post->body }}}
@empty
  There are not posts in the array!
@endforelse
```

### Unless Statement
```
@unless($age >= 18)
  You cannot vote
@endunless
```