Convert php arrays to xml 
--------------------------

A php class that converts multidimensional arrays to xml.  
It supports regular nodes, attributes
namespaces, cdata sections, and all you should need when building an xml data structure.



#### install
```
composer require fracalo/arr2xml
```

#### usage
```php
$payload = [
   '_nodeName' => 'root',
   '_val' => [
       [
           '_nodeName' => 'Good_guy',
           '_val' => [
               [
                   '_nodeName' => 'name',
                   '_val' => 'Luke Skywalker'
               ],
               [
               '_nodeName' => 'weapon',
               '_val' => 'Lightsaber'
               ]
           ],
       ],
       [
           '_nodeName' => 'Bad_guy',
           '_val' => [
               [
                   '_nodeName' => 'name',
                   '_val' => 'Sauron'
               ],
               [
                   '_nodeName' => 'weapon',
                   '_val' => 'Evil Eye'
               ]
           ],
       ],
   ]
];

$x = new Xml('1.0', 'UTF-8');
$xml = $x->convert($payload);

```
##### output:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<root>
  <Good_guy>
    <name>Luke Skywalker</name>
    <weapon>Lightsaber</weapon>
  </Good_guy>
  <Bad_guy>
    <name>Sauron</name>
    <weapon>Evil Eye</weapon>
  </Bad_guy>
</root>
*/

```
