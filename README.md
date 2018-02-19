# UNO
> A free, powerful, developer boilerplate for WordPress theme builders who use the Genesis Framework.

## Getting Started
The Uno child theme for the Genesis Framework is a powerful, extendable, yet minimal boilerplate for beginner and mid-level Genesis developers alike.

The way that Uno is built allows for minimal to no configuration at all — a developer should be able to just add their own features with ease.

With this in mind, there a few rules you should follow when developing with Uno:

### Autoloading
Uno allows for autoloading, both for classes and files.

###### Classes
By default, Uno autoloads classes found in the `./classes/` folder. This allows you to define a class that you want available throughout your theme, without explicitly requiring it.

In order for classes to properly autoload, they must follow a simple naming convention: 

- File name must match the internal class name.
- One class per file.
- Extension pattern is `.class.php`

So, for example, if you want a class (in this case, `Uno`) available from a call like `new Uno()`, then you'll add `Uno.class.php` to the `/classes` folder.

###### Directories
By default, Uno autoloads files recursively found in `./src/` folder. This allows you to break up all your functions, hooks, and filters between separate files. They just load, without needing to require them elsewhere, or needing to remember to delete that require if you delete the called file.

The directory is limited to 200 files per call (more than enough). You can also utilize the autoload function by calling the static function from the Uno class. Example:

```php
Uno::autoload( '/path/to/directory' );
```

A big thanks to [Aaron Holbrook](https://aaronjholbrook.com/), who originally authored the [autoload function](https://github.com/a7/autoload). Uno utilizes almost an exact copy, with some minor adjustments.