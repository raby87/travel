<?php 
/*
$a = <<<EOT
{
 "items": [
  {
     "volumeInfo": {
          "title": "raby",
          "authors": [
           "刚刚"
          ],
          "description": "Leonid McGill can't say no to the beautiful woman who walks into his office with a stack of cash and a story. ",
          "imageLinks": {
             "thumbnail": "http://books.google.co.th/books/content?id=mKBOehKRx1kC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api",
          },
      },
  }]
}
EOT;
*/

$a = array();
$volumeInfo['volumeInfo']['title'] = "raby";
$volumeInfo['volumeInfo']['authors'] = "raby";
$volumeInfo['volumeInfo']['description'] = "raby";
$volumeInfo['volumeInfo']['imageLinks'] = "raby";

array_push($a,$volumeInfo);
echo json_encode($a);


?>
