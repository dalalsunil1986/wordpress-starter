## About This Repo
This is the official GitRepo of calvinkoepke.com.

## Config
### Setting Up Theme
This theme is free to use, however it assumes that the user has at least a moderate knowledge of development
and can make it work for their own use-case.

Basic settings for home/blog page:

1. Create a page and set it to the template: "Page Home".
2. Create a page for your blog feed and give it a title.
3. Under Settings > Reading in the WP Dashboard, set Front Page Displays to the static option, and select the appropriate pages. Example of mine: https://cloudup.com/cgqUviz0Yoy

### Setting Up Compiler
Requires [Node](https://nodejs.org/en/) to run setup scripts.

Setup the project by cloning to your desktop, navigating to the folder in Terminal, and entering the commmand:

`npm install`

Then run the compiler and start watching files by running: `gulp` from the the theme root directory.

## Gulp Commands

`gulp watch`
Watches the files and compiles them upon save.

`gulp css`
Compiles, minifies, and outputs the CSS files in the `/assets/css/` directory using PostCSS + Plugins.

`gulp scripts`
Compiles, minifies, and bundles JS files in the `/assets/js/` directory using Uglify + Concat + Rename. Outputs to `/build/js/app.min.js`.

## Credits and Licensing
Copy all you want, just be nice about it: [Licensed under MIT](https://opensource.org/licenses/MIT)

Find me on Twitter: [@cjkoepke](https://twitter.com/cjkoepke)
