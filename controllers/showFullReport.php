<?php

$filepath = "../downloads/response.xml";
$xmlDoc = file_get_contents($filepath);
$xmlObj = new SimpleXMLElement($xmlDoc,LIBXML_NOCDATA);
$html = $xmlObj->xpath("//DOCUMENT");

?>

<div class="col-md-12 text-center">
    <hr>
    <button type="button" class="btn btn-danger" id="clear">Clear Report</button><hr>
</div>
<?= $html[0] ?>