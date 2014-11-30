<?php
/**
 * This file is part of vfsStream.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package  org\bovigo\vfs
 */
namespace org\bovigo\vfs\linking;

require 'bootstrap.php';

use org\bovigo\vfs\vfsStream;

$root = vfsStream::setup();
$dir  = vfsStream::newDirectory('some')->at($root);
$file = vfsStream::newFile('target.txt')->withContent('hello, world!')->at($dir);
$link = vfsStream::newSymlink('link', $file)->at($dir);

var_dump(readlink($link->url()));

var_dump(readlink($file->url()));

var_dump(readlink($dir->url() . '/doesNotExist'));