<?php
$xml = <<<XML
    <xml>
        <text>some text here</text>
    </xml>
XML;
$dom = new DOMDocument();
$dom->loadXML($xml);
$xpath = new DomXpath($dom);
$node = $xpath->query("//text/text()")->item(0);
$node->data = ucwords($node->data);
echo $dom->saveXML();
echo '<br>';
$xml = <<<XML
<xml>
    <text type="misc">some text here</text>
    <text type="misc">some more text here</text>
    <text type="misc">yet more text here</text>
</xml>
XML;
$dom = new DOMDocument();
$dom->loadXML($xml);
$xpath = new DomXpath($dom);
$result = $xpath->query("//text");
$result->item(0)->parentNode->removeChild($result->item(0));
$result->item(1)->removeAttribute('type');
$result = $xpath->query('text()', $result->item(2));
$result->item(0)->deleteData(0, $result->item(0)->length);
echo $dom->saveXML();
echo '<br>';
$dom = new DomDocument();
$node = $dom->createElement('ns1:somenode');
$node->setAttribute('ns2:someattribute', 'somevalue');
$node2 = $dom->createElement('ns3:anothernode');
$node->appendChild($node2);
// Set xmlns:* attributes
$node->setAttribute('xmlns:ns1', 'http://example.org/ns1');
$node->setAttribute('xmlns:ns2', 'http://example.org/ns2');
$node->setAttribute('xmlns:ns3', 'http://example.org/ns3');
$dom->appendChild($node);
echo $dom->saveXML();


