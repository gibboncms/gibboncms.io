title: Liana - Installation
data:
  nav: 
    section: docs-liana-1
    name: Installation

---

# Installation

The easiest way to install Liana is via composer.

```
$ composer create-project gibboncms/liana my-new-cool-project
```

After all the php dependencies are installed, you'll have to install the necessary node modules for gulp.

```
$ npm install
$ gulp
```

Alternatively you could not use elixir alltogether, then you'd need to remove the elixir function calls from the master layout.
