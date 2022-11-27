<?php
include('Readfromxml.php');
$sortKey = '';
$sortOrder = 'asc';
$output = 'html';

//this is for run script through command
$options = getopt('', array("output:","sortkey::","sortorder::"));
if(is_array($options)){
    if(isset($options['output']))
        $output = $options['output'];

    if(isset($options['sortkey'])) 
        $sortKey = $options['sortkey'];

    if(isset($options['sortorder']))
        $sortOrder = $options['sortorder'];

}

$urls = array(
    'http://www.voyagersfamily.ch/feed.xml',
    'http://www.rss-specifications.com/blog-feed.xml',
);

$reader = new ReadFromXml($urls, $sortKey, $sortOrder); // 2nd parameter is sorting key and 3rd is sort order both are optional
$data = $reader->getDataFromXml();
