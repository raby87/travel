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
     "Walter Mosley"
    ],
    "publisher": "Penguin",
    "publishedDate": "2011-03-08",
    "description": "Leonid McGill can't say no to the beautiful woman who walks into his office with a stack of cash and a story. She's married to a rich art collector. Now she fears for her life. Leonid knows better than to believe her, but he can't afford to turn her away, even if he knows this woman's tale will bring him straight to death's door.",
    "industryIdentifiers": [
     {
      "type": "ISBN_10",
      "identifier": "1101503017"
     },
     {
      "type": "ISBN_13",
      "identifier": "9781101503010"
     }
    ],
    "readingModes": {
     "text": true,
     "image": false
    },
    "pageCount": 384,
    "printType": "BOOK",
    "categories": [
     "Fiction"
    ],
  }]
}
EOT;

echo $a;


?>
