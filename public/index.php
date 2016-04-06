<?php 

$a = <<<EOT
{
 "kind": "books#volumes",
 "totalItems": 576,
 "items": [
  {
     "kind": "books#volume",
     "id": "GWfvFkdqmNYC",
     "etag": "5EATv+J2jto",
     "selfLink": "https://www.googleapis.com/books/v1/volumes/GWfvFkdqmNYC",
     "volumeInfo": {
          "title": "raby",
          "subtitle": "A Leonid McGill Mystery",
          "authors": [
           "刚刚"
          ],
          "publisher": "Penguin",
          "publishedDate": "2011-03-08",
          "description": "Leonid McGill can't say no to the beautiful woman who walks into his office with a stack of cash and a story. She's married to a rich art collector. Now she fears for her life. Leonid knows better than to believe her, but he can't afford to turn her away, even if he knows this woman's tale will bring him straight to death's door.",
            "imageLinks": {
             "smallThumbnail": "http://books.google.co.th/books/content?id=mKBOehKRx1kC&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api",
             "thumbnail": "http://books.google.co.th/books/content?id=mKBOehKRx1kC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api"
            },
      }
  }]
}
EOT;

echo $a;


?>
