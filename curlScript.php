<?php
/**
 * With this script, we will generate an xml request, post it to an API and write the response to a file.
 * To run, please "cd" to project root and run the following command:
 * "php curlScript.php"
 */

$requestGroup = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><REQUEST_GROUP></REQUEST_GROUP>');
$requestGroup->addAttribute(" MISMOVersionID","2.3.1");

$requestingParty = $requestGroup->addChild("REQUESTING_PARTY");
$requestingParty->addAttribute(" _Name","ACG Funding");
$requestingParty->addAttribute(" _StreetAddress","1661 Hanover Road Suite 216");
$requestingParty->addAttribute(" _City","City of Industry");
$requestingParty->addAttribute(" _State","CA");
$requestingParty->addAttribute(" _PostalCode","91748");

$receivingParty  = $requestGroup->addChild("RECEIVING_PARTY");
$receivingParty->addAttribute(" _Name","Credit Technologies");
$receivingParty->addAttribute(" _StreetAddress","31550 Winterplace Parkway");
$receivingParty->addAttribute(" _City","Salisbury");
$receivingParty->addAttribute(" _State","MD");
$receivingParty->addAttribute(" _PostalCode","21804");
$receivingParty->addAttribute(" _Identifier","AR");

$submittingParty    = $requestGroup->addChild("SUBMITTING_PARTY");
$submittingParty->addAttribute(" _Name","BeSmartee");
$submittingParty->addAttribute(" _StreetAddress","16892 Bolsa Chica Street 201");
$submittingParty->addAttribute(" _City","Huntington Beach");
$submittingParty->addAttribute(" _State","CA");
$submittingParty->addAttribute(" _PostalCode","92649");
$submittingParty->addAttribute(" LoginAccountIdentifier","besmartee");
$submittingParty->addAttribute(" LoginAccountPassword","263nx848");
$submittingParty->addAttribute(" _Identifier","BeSmartee07272015");

$request            = $requestGroup->addChild("REQUEST");
$request->addAttribute(" RequestDatetime","2017-02-16T09:20:59");
$request->addAttribute(" InternalAccountIdentifier","");
$request->addAttribute(" LoginAccountIdentifier","besmartee");
$request->addAttribute(" LoginAccountPassword","mortgageai9");

$requestData        = $request->addChild("REQUEST_DATA");
$creditRequest      = $requestData->addChild("CREDIT_REQUEST");

$creditRequest->addChild("MISMOVersionID","2.3.1");
$creditRequest->addChild("LenderCaseIdentifier","LME8BW68");
$creditRequest->addChild("RequestingPartyRequestedByName","Tim Nguyen");

$creditRequestData = $creditRequest->addChild("CREDIT_REQUEST_DATA");
$creditRequestData->addAttribute(" CreditRequestID","CreditRequest1");
$creditRequestData->addAttribute(" BorrowerID","Borrower");
$creditRequestData->addAttribute(" CreditReportRequestActionType","Submit");
$creditRequestData->addAttribute(" CreditReportType","Merge");
$creditRequestData->addAttribute(" CreditRequestType","Individual");
$creditRequestData->addAttribute(" CreditRequestDateTime","2017-02-16T09:20:59");

$creditRepoIncluded = $creditRequestData->addChild("CREDIT_REPOSITORY_INCLUDED");
$creditRepoIncluded->addAttribute(" _EquifaxIndicator","Y");
$creditRepoIncluded->addAttribute(" _ExperianIndicator","Y");
$creditRepoIncluded->addAttribute(" _TransUnionIndicator","Y");

$loanApplication = $creditRequest->addChild("LOAN_APPLICATION");
$borrower = $loanApplication->addChild("BORROWER");
$borrower->addAttribute(" BorrowerID","Borrower");
$borrower->addAttribute(" _FirstName","Tim");
$borrower->addAttribute(" _LastName","Testcase");
$borrower->addAttribute(" _BirthDate","1999-01-01");
$borrower->addAttribute(" _HomeTelephoneNumber","714-235-7114");
$borrower->addAttribute(" _SSN","123456789");
$borrower->addAttribute(" _PrintPositionType","Borrower");

$residence = $borrower->addChild("_RESIDENCE");
$residence->addAttribute(" _StreetAddress","4053 Aladdin Dr");
$residence->addAttribute(" _City","Huntington Beach");
$residence->addAttribute(" _State","CA");
$residence->addAttribute(" _PostalCode","92649");
$residence->addAttribute(" BorrowerResidencyType","Current");

$XML = $requestGroup;
/*
 * STORING DOCUMENT CODE
 *
 * This code will handle the xml submission
 *
 * if successful, the file will be stored in '/downloads'
 */

/** this URL is commented as to not lock the account for whom it belong */
const API_URL = "https://credit.meridianlink.com/some/route";
const WRITE_FILE_PATH = "../downloads/response.xml";
$response = null;


    try {
        $response = postXML(API_URL, $XML);
    } catch (Exception $e) {
        print($e."\n");
    }

    if ($response) {
        if (file_put_contents(WRITE_FILE_PATH, $response)) {
             print("response generated\n");
        } else {
            print("no response returned\n");
        }
    }




function postXML($url, SimpleXMLElement $xmlData)
{
    $xmlString = $xmlData->asXML();
    $postQueryString = "request=$xmlString";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postQueryString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

?>
