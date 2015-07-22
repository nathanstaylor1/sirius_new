<?php

use dflydev\markdown\MarkdownParser;
use \Suin\RSSWriter\Feed;
use \Suin\RSSWriter\Channel;
use \Suin\RSSWriter\Item;

date_default_timezone_set('Australia/Melbourne');

/* General Blog Functions */

function get_directory_contents($d){

	$cache = array_reverse(glob($d . '/*'));
	
	return $cache;
}

function get_files(){


	// get the dirs of all files
	$linkdocs = get_directory_contents("res/links/docs");
	$linkfiles = get_directory_contents("res/links/files");
	$links = array('files' => $linkfiles, 'docs' => $linkdocs);

	$tooldocs = get_directory_contents("res/tools/docs");
	$toolfiles = get_directory_contents("res/tools/files");
	$tools = array('files' => $toolfiles, 'docs' => $tooldocs);

	$articledocs = get_directory_contents("res/articles/docs");
	$articlefiles = get_directory_contents("res/articles/files");
	$articles = array('files' => $articlefiles, 'docs' => $articledocs);
	
	$dirs = array('links' => $links, 'tools' => $tools, 'articles' => $articles);

	$output = array('links' => array(), 'tools' => array(), 'articles' => array());

	//open and parse all files
	foreach($dirs as $k=>$v){

		$resourcebundle = array();

		foreach($v as $key=>$value){

			
			foreach($value as $filename){

				$filecontents = file_get_contents($filename);

				$arraykey = explode(".", array_pop( explode( "/", $filename ) ) )[0];

				if ($key == "docs"){

					$split = explode( "#?#", $filecontents);

					$title = $split[0];
					$description = $split[1];

					$resourcebundle[$arraykey]["title"] = $title;
					$resourcebundle[$arraykey]["description"] = $description;
					$resourcebundle[$arraykey]["docspath"] = $filename;

				} elseif ($key == "files") {

					$url = $filename;
					$fl =  explode(".", $filename);
					$ext = array_pop($fl);
					$id = array_pop( explode( "/", implode($fl) ) );

					if ($k == "links"){
						$url = $filecontents;
					}

					$resourcebundle[$arraykey]["url"] = $url;
					$resourcebundle[$arraykey]["ext"] = $ext;
					$resourcebundle[$arraykey]["filespath"] = $filename;
					$resourcebundle[$arraykey]["id"] = $id;

				}

			}

		}

		$output[$k] = $resourcebundle;

	}

	return $output;
}

// test input from forms for maliciousness
function test_input($data) {
  $data = strip_tags($data);
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}
