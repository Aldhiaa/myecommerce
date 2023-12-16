<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        ol {
            list-style-type: decimal;
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
$termsAndCon =App\Models\TermsAndCon::all();

?>
<h1>Terms and Conditions</h1>

@if($termsAndCon->count() >= 0)
    <ol>
        @foreach($termsAndCon as $term)
            <li>{{ $term->text }}</li>
        @endforeach
    </ol>
@else
    <p>No terms and conditions available.</p>
@endif

</body>
</html>
