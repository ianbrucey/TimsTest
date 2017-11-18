
var reportGenUrl = '/controllers/generateReport.php';
var getReportBtn = $('#getReportButton');
var creditReportContainer = $('#creditReportContainer');


/**
 * GET CREDIT LIABILITIES
 *
 * here we will generate a small report of the clients credit liabilities.
 * they can click on the names of the creditors for more info
 */
$(getReportBtn).on("click",function() {
    console.log('getting report');
    $.get(reportGenUrl).done(function (data) {
        creditReportContainer.html(data);
        $('table').show(1000);
    });
});
