# UNO
> A free, powerful, developer boilerplate for WordPress theme builders who use the Genesis Framework.

## Getting Started
The Uno child theme for the Genesis Framework is a powerful, extendable, yet minimal boilerplate for beginner and mid-level Genesis developers alike.

The way that Uno is built allows for minimal to no configuration at all — a developer should be able to just add their own features with ease.

In order for Uno to work properly, you'll need to run `composer install` to add dependencies. If you don't have Composer, [install it first](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) — the easiest way is to install Globally, so you have access to it anywhere.

Once installed, require the class in your `functions.php` file, and kickstart Uno, either by instantiation or by a static function call:

```php
// Import the master Uno class.
require_once( get_stylesheet_directory() . '/vendor/uno/uno-package/Uno.class.php' );

// Kickstart by class instantiation:
$uno = new Uno();

// Kickstart by static function call:
Uno::init();
```

After this, you'll have access to all that Uno has to offer. Here are a few rules you should follow when developing with Uno:

### Autoloading
Uno allows for autoloading, both for classes and files.

###### Classes
By default, Uno checks classes found in the `./classes/` folder for a match if a class declaration can't be found. This allows you to define a class that you want available throughout your theme, without explicitly requiring it later.

In order for classes to properly autoload, they must follow a simple naming convention: 

- File name must match the internal class name.
- One class per file.
- Extension pattern is `.class.php`

So, for example, if you want a class (i.e., `Uno`) available to call, like `new Uno()`, then you'll add `Uno.class.php` to the `/classes` folder. When the server hits the instantiation of this class, if will look in `./classes` for a matching filename, and load that before calling the class.

###### Directories
By default, Uno autoloads files recursively found in `./src/` folder. This allows you to break up all your functions, hooks, and filters between separate files. They just load, without needing to require them elsewhere, or needing to remember to delete that require if you delete the called file.

The directory is limited to 200 files per call (more than enough). You can also utilize the autoload function by calling the static function from the Uno class. Example:

```php
// Statically
Uno::autoload( '/path/to/directory' );

// Via instantiation
$uno = new Uno();
$uno->autoload( '/path/to/directory' );
```

A big thanks to [Aaron Holbrook](https://aaronjholbrook.com/), who originally authored the [autoload function](https://github.com/a7/autoload). Uno utilizes almost an exact copy, with some minor adjustments.