<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curl Test</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body id="page-top">


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center" id="logoDiv"><img src="/images/beesmartee.png"></div>
            <div class="col-md-8 col-md-offset-2 btn btn-primary">
                <h2 class="text-default text-center">
                    Generate your report below
                </h2>
            </div>
        </div>
    </div>

    <!--  REPORTS ARE GENERATED BELOW  -->
    <div class="container-row">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <hr>

                <div class="col-md-12" id="creditReport">
                    <button class="btn btn-info" id="getReportButton">
                        Get report
                    </button>
                </div>
                <div class="col-md-12 text-info" id="creditReportContainer">
                    <!-- Credit Liabilities will render here  -->
                </div>
            </div>
        </div>
    </div>



</body>
<script src="js/generateReport.js"></script>
<script src="js/index.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
