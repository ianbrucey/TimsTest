var fullReportGenUrl = '/controllers/showFullReport.php';
/*
 * show the credit report
 */
$(document).on("click",'.revealReport', function() {
    $.get(fullReportGenUrl).done(function(data){
        $('#generatedReport').html(data);
    });
});

$(document).on("click",'#clear', function() {
    $('#generatedReport').html("");
});

