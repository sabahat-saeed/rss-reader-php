<?php
include('Readfromxml.php'); 
$sortKey = 'pubDate';      //sortkey veriable for set value of orderkey  
$sortOrder = 'asc'; //sortorder veriable for set sorting order and by default set order ascending  

$output = 'text';
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
$urls = array(  //hard-coded xml urls in array 
    'http://www.voyagersfamily.ch/feed.xml',
    'http://www.rss-specifications.com/blog-feed.xml',
);

$reader = new ReadFromXml($urls, $sortKey, $sortOrder); // 2nd parameter is sorting key and 3rd is sort order both are optional
$data = $reader->getDataFromXml();
