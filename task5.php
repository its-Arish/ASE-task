
/*
5. Write a crawler in PHP to extract data from URL: https://books.toscrape.com/
a. Navigate to category ‘Science’
b. Collect all the listings available (across pages)
c. Collect the following data from each listing (column names as listed in bold, with
required datatype):
i. id: Create a random alphanumeric text value of length 8 – String
ii. category : ‘Science’ (Fixed value – String)
iii. category_url : Category URL – String
iv. title : Book Title (full text – String)
v. price : Price listed for the book – Float
vi. stock: Stock Availability – String
vii. rating: No of Ratings (Stars value – Float)
viii. url: Detail URL of the book – String
d. Create a ‘CSV’ file named ‘science_listing.csv’, with data collected

*/



<?php
$var = curl_init();
curl_setopt($var, CURLOPT_URL, "https://books.toscrape.com/catalogue/category/books/science_22/index.html");
curl_setopt($var, CURLOPT_RETURNTRANSFER, true);

$html  = curl_exec($var);

$dom = new DOMdocument();
@ $dom->loadHTML($html);
$xpath = new DOMXPath($dom);

$article = $dom->getElementsByTagName('article');
$out_arr = array();
$stocks = $xpath->query('//*[@id="default"]/div/div/div/div/section/div[2]/ol/li/article/div[2]/p[2]');
$ratings = $xpath->query('.//*[@id="default"]//article/p');
$alink = $xpath->query('.//*[@id="default"]//article/h3/a');
$prices = $xpath->query('//*[@id="default"]/div/div/div/div/section/div[2]/ol/li/article/div[2]/p[1]');


foreach ($article as $k => $link) {
    $title = $link->getElementsByTagName('a');
    foreach($title as $t) {
        $new_t = $t->getAttribute('title');
        if($new_t) {
            $out_arr[$k]['title'] = $new_t;
        }
        
    }
}

foreach($alink as $k => $a) {
    $new_t = $a->getAttribute('href');
    $all_link = str_replace('../../..', 'https://books.toscrape.com/catalogue', $new_t);
    if($all_link) {
        $out_arr[$k]['href'] = $all_link;
    }
}

foreach ($prices as $k => $price) {
    $pvar = $price->textContent;
    $out_arr[$k]['price'] = $pvar;
}

foreach ($stocks as $k => $stock) {
    $svar = $stock->textContent;
    $out_arr[$k]['stock'] = trim($svar);
}

foreach ($ratings as $k => $rating) {
    $rvar = str_replace('star-rating', '', $rating->getAttribute('class'));
    $out_arr[$k]['rating'] = $rvar;
}
print_r($out_arr);

$fp = fopen('science_listing.csv', 'w');

fputcsv($fp, array_keys($out_arr[0]));
foreach ($out_arr as $fields) {
    fputcsv($fp, $fields);
}
  
fclose($fp);