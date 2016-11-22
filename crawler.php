<?php
include("simple_html_dom.php");
function crawl_page($url, $depth) 
{
	$link=array();
	$title=array();
	$image=array();

    if($depth > 0)
    {
    	$html = file_get_html($url);
    	foreach($html->find('title') as $element)
    	{
    		$title[]=array('Title'=>$element->plaintext);
    	}
    	foreach($html->find('img') as $element)
    	{
    		$image[]=array('img'=>$element->src);
    	}
		foreach($html->find('a') as $element)
		{
			$link[]=array('Title'=>$title,'Images'=>$image,'href'=> $element->href, 'internal_links'=> crawl_page($element->href, $depth-1));
		}
	}
	return $link;
}
$s=crawl_page('http://127.0.0.1/mypage.html', 2);
echo json_encode($s,JSON_PRETTY_PRINT);
?>
