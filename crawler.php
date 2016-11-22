<?php
include("simple_html_dom.php");
$links=array();
$titles=array();
$images=array();
function crawl_page($url, $depth) 
{
	global $links,$titles,$images;
    if($depth > 0)
    {
    	$html = file_get_html($url);
    	foreach($html->find('title') as $element)
    	{
    		array_push($titles,$element);
    	}
    	foreach($html->find('img') as $element)
    	{
    		array_push($images,$element->src);
    	}
		foreach($html->find('a') as $element)
		{
       		array_push($links,$element->href); 
       		crawl_page($element->href, $depth-1);
		}
	}
	$links = array_unique($links);
	$json_string = json_encode([$links,$titles,$images],JSON_PRETTY_PRINT);
	echo $json_string;
	return $json_string;
}
$s=crawl_page('http://127.0.0.1/mypage.html', 2);
echo $s;
?>