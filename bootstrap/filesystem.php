<?php

if (env('FILESYSTEM') == 'dropbox') {
    return new GibbonCms\Gibbon\Filesystems\DropboxFilesystem(env('DROPBOX_TOKEN'));
}

return new GibbonCms\Gibbon\Filesystems\PlainFilesystem(realpath(__DIR__.'/../../Dropbox/gibboncms.io'));
