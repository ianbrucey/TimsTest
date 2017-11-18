<?php

function formatCreditDate($str) {
    $date = new DateTime($str);
    return $date->format("M - Y");
}

$filepath = "../downloads/response.xml"; // change to "../download/response.xml" for test context
$xmlDoc = file_get_contents($filepath);
$xmlObj = new SimpleXMLElement($xmlDoc,LIBXML_NOCDATA);
$creditLiabilities = $xmlObj->xpath("//CREDIT_LIABILITY");
$html = $xmlObj->xpath("//DOCUMENT");
$columns = ['Creditor', 'Report Date', 'Unpaid Balance', 'Monthly Payment', 'Account Type'];

?>
<h3 class="text-primary text-center text-info">
    Report details
</h3>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <?php
        foreach ($columns as $column)
        {
            echo sprintf("<th>%s</th>",$column);
        }
        ?>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($creditLiabilities as $node)
    {
        echo '<tr>';
        echo sprintf("<td><a class='revealReport' href='#'>%s</a></td>", $node->_CREDITOR['_Name']);
        echo sprintf("<td>%s</td>", formatCreditDate($node['_AccountReportedDate']));
        echo sprintf("<td>$%s</td>", !empty($node['_UnpaidBalanceAmount']) ? $node['_UnpaidBalanceAmount'] : "0");
        echo sprintf("<td>$%s</td>", !empty($node['_MonthlyPaymentAmount']) ? $node['_MonthlyPaymentAmount'] : "0");
        echo sprintf("<td>%s</td>", $node['_AccountType']);
        echo '</tr>';
    }
    ?>
    </tbody>
  </table>

<div id="generatedReport" class="row">

</div>


