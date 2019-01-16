<?php

namespace Fracalo\Arr2Xml;

/*
usage

$payload = [
    '_nodeName' => 'listing',
    '_attrs' => [
        // '_nodeAttrs' => [
        'type' => 'vers 2'

    ],
    '_val' => [
        [
            '_nodeName' => 'innerWrap',
            '_val' => 'innerval'
        ],
        [
            '_nodeName' => 'mario' ,
            '_val' => '42'
        ]
    ]
];

$x = new Xml('1.0', 'UTF-8');
$xml = $x->convert($payload);

*/

class Arr2Xml
{
    /**
     * @var \DOMDocument
     */
    private $d;

    /**
     * Arr2Xml constructor.
     * @param string $version
     * @param string $encoding
     * @param array $nsAttributes
     * @param bool $formatoutput
     */
    public function __construct($version = '1.0', $encoding = 'UTF-8', $formatoutput = true)
    {
        $version = empty($version) ? '1.0' : $version;

        $this->d = new \DOMDocument($version, $encoding);

        $this->d->formatOutput = $formatoutput;
    }

    /**
     * @param $el
     * @param array $nsAttrs
     * nsAttributes is an array with the signature like below
     *
     */
    public function addNsAttibutes(&$el, Array $nsAttrs)
    {
        foreach ($nsAttrs as $nsAttr){
            $ns = $nsAttr['_ns'];
            $name = $nsAttr['_name'];
            $value = $nsAttr['_value'];
            $el->setAttributeNS($ns, $name, $value);
        }
    }

    /**
     * @param array $payload
     * @param bool $root
     * @return string
     */
    public function convert(Array $payload, $root = false)
    {

        $nodename = $payload['_nodeName'] ?? $payload['_nn'];

        // if root is not set we use the xml root
        if (empty($root))
          $root = $this->d;

        // fallback for _val is an empty string
        $val = isset($payload['_val']) ? $payload['_val'] : '';

        // fallback for _attrs and _attrsNS is an empty array
        $attrs = $payload['_attrs'] ?? [];
        $attrsNS = $payload['_attrsNS'] ?? [];

        $cdata = $payload['_cdata'] ?? '';

        if ( !is_array($val) ) {
            $this->createAndAttachNodeEl($root, $nodename, $val, $cdata, $attrs, $attrsNS);
        }
        else {
          // if we get here we're dealing with an intermediate node where for sure there will be other iterations of this function
          // val is an indexed array from here on..

          // first we create the intermediate element/node
          $el = $this->d->createElement($nodename);

          // we try to attach attributes
          $this->addAttributes($el, $attrs);
          $this->addNsAttibutes($el, $attrsNS);

          // at this point we iterate over each node
          foreach($val as $nodePayload)
              $this->convert($nodePayload, $el);

          // and attach it to root
          $root->appendChild($el);
        }

        /////////////////////////////////////////////////////////
        // at this point we should have a perfectly formatted xml
        $xml = $this->d->saveXML();
        return $xml;
    }

    /**
     * @param $el
     * @param array $attrArr
     * used for setting a namespace for each entry in a multidimensional array
     */
    protected function addAttributes(&$el, Array $attrArr)
    {
        foreach ($attrArr as $k => $v)
            $el->setAttribute($k, $v);
    }

    /**
     * @param \DOMElement $wrapEl
     * @param String $k
     * @param String $v
     */
    protected function createAndAttachNodeEl(&$wrapEl, String $k, String $v, String $cdata, Array $attrs, Array $attrsNS)
    {
        $node = $this->d->createElement($k, $v);

        // we fill/attach cdata if is present
        if (!empty($cdata)) {
            $cdata = $this->d->createCDATASection($cdata);
            $node->appendChild($cdata);
        }

        // we addAttributes
        $this->addAttributes($node, $attrs);
        $this->addNsAttibutes($node, $attrsNS);

        // finally we attach the node
        $wrapEl->appendChild($node);
    }
}