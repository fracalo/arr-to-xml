Convert php arrays to xml 
--------------------------

A php class that converts multidimensional arrays to xml.  
It supports regular nodes, repeating node tags, attributes
namespaces, cdata sections, and all you should need when building an xml data structure.



#### install
```
composer require fracalo/arr2xml
```

#### usage examples
```php
protected static $data = [
    '_nodeName' => 'root',
    '_val' => [
        [
            '_nodeName' => 'items',
            '_val' => [
                [
                    '_nodeName' => 'item',
                    '_val' => 'Computer'
                ],
                [
                  '_nodeName' => 'item',
                  '_val' => 'Keyboard'
                ],
                [
                    '_nodeName' => 'item',
                    '_val' => 'Mouse'
                ],
                [
                    '_nodeName' => 'item',
                    '_val' => 'Monitor'
                ],
            ]
        ]
    ]
];

$x = new Xml('1.0', 'UTF-8');
$xml = $x->convert($payload);

```
##### output:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<root>
  <items>
    <item>Computer</item>
    <item>Keyboard</item>
    <item>Mouse</item>
    <item>Monitor</item>
  </items>
</root>

```

