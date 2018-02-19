# Classes Folder
This folder is purely here for autoloading classes if you may have need. The Uno child theme will look in this folder for corresponding files that match class names called elsewhere in the theme. You can delete or leave blank, but for reference, the folder is included.

### Rules
In order for classes to properly autoload, they must follow a simple naming convention: 

- Name must match the internal class name.
- One class per file.
- Extension pattern is `.class.php`

So, for example, if you want a class (in this case, `Uno`) available from a call like `new Uno()`, then you'll add `Uno.class.php` to the `/classes` folder.