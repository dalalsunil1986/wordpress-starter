## About This Repo
This is the official GitRepo of calvinkoepke.com.

## Setup
Requires [Node](https://nodejs.org/en/) to run scripts.

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
