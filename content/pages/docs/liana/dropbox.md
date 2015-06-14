title: Liana - Dropbox
data:
  nav: 
    section: docs-liana-4
    name: Dropbox

---

# Dropbox

Liana provides two ways to use Dropbox to manage your content, a pure PHP implementation, and a server implementation. The first is easier to set up, but a hassle to manager, the second is a bit trickier to set up, but a breeze to use afterwards.

## PHP Implementation

Gibbon's core provides a Dropbox filesystem adapter. To use it, you'll need to replace the PlainFilesystem instance with an instance of DropboxFilesystem. This can be done easily by editing some values in the .env file. You'll need to generate a Dropbox token via it's [app console](https://www.dropbox.com/developers/apps).

```
FILESYSTEM=dropbox
DROPBOX_TOKEN=xxxxxx
```

Building the content cache takes a long time with the DropboxFilesystem, so rebuilding on every request isn't really an option. I'd recommend manually rebuilding or setting up a cron job.

## Server Implementation

The server implementation requires you to install Dropbox on your Linux server and set up some watchers. For this short tutorial I'm using a server provisioned by [Laravel Forge](https://forge.laravel.com/), which assumes we'll end up with the following directories:

- The user folder is `/home/forge`
- Dropbox is located in `/home/forge/Dropbox` (`~/Dropbox`)
- De site's content will be contained in `/home/forge/dropbox/gibboncms.io`
- De site's source files are located in `/home/forge/gibboncms.io`

First you'll need to install Dropbox on your server. This can be done with `wget` on Ubuntu servers:

```bash
$ cd ~ && wget -O - "https://www.dropbox.com/download?plat=lnx.x86_64" | tar xzf -
```

After installation you'll need to start the Dropbox daemon:

```bash
$ ~/.dropbox-dist/dropboxd
```

Next up install Dropbox's helper script to set up the excludes (next step):

```bash
$ curl -o dropbox.py https://linux.dropbox.com/packages/dropbox.py
```

Exclude all the unnecessary folders:

```bash
$ ./dropbox.py exclude add Apps
$ ./dropbox.py exclude add Photos
$ ./dropbox.py exclude add Screenshots
# etc
```

By now your content should be synchronized:

```bash
$ ls ~/Dropbox/gibboncms.io
blocks blog pages settings
```

To watch for changes we're going to use inotify:

```bash
$ apt-get install inotify-tools
```

Write the inotify script to `~/dbxwatcher`, and make it executable with `chmod +x ~/dbxwatcher`. Here's the build script:

```bash
#!/usr/bin/env bash

inotifywait -m -r -e create -e move -e modify -e delete . |
    while read path action file; do
        /usr/bin/php /home/forge/gibboncms.io/artisan liana:build
    done
```

Finally we'll need to make sure the inotify script is always running. We're going to use supervisor for this:

```bash
$ apt-get install supervisor
$ service supervisor restart
```

Create a supervisor program in `/etc/supervisor/conf.d/dbxwatcher.conf`:

```
[program:dbxwatcher]
command=/home/forge/dbxwatcher
directory=/home/forge/Dropbox/gibboncms.io
autostart=true
autorestart=true
startretries=3
stderr_logfile=/var/log/dbxwatcher/dbxwatcher.err.log
stdout_logfile=/var/log/dbxwatcher/dbxwatcher.out.log
user=forge
```

Register and start the program:

```bash
$ supervisorctl reread
$ supervisorctl update
$ supervisorctl start dbxwatcher
```

That's it, Liana will rebuild on every Dropbox change now! Make sure your application's filesystem implementation is pointing towards your dropbox folder.

```php
// ~/gibboncms.io/bootstrap/filesystem.php

return new GibbonCms\Gibbon\Filesystems\PlainFilesystem(realpath(__DIR__.'/../../Dropbox/gibboncms.io'));
```
