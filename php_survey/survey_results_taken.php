<?php

$lines = file('results.txt', FILE_IGNORE_NEW_LINES);

//first question variables
 $yes160_count = $lines[0];
 $no160_count = $lines[1];

 //second question variables
 $yes_cpp_count = $lines[2];
 $no_cpp_count = $lines[3];

   //third question variables
 $cpp_lang = $lines[4];
 $java_lang = $lines[5];
 $python_lang = $lines[6];
 $javascript_lang = $lines[7];

 //fourth question variables
 $ux = $lines[8];
 $webDev = $lines[9];
 $gDev = $lines[10];
 $ai = $lines[11];
 // $other = $lines[12];

 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Survey Results</title>
    <link rel="stylesheet" href="survey.css" type="text/css">
</head>

<body>
    <div class="results-wrapper">
        <h1 id="taken-message">You have already taken this survey</h1>
        <h1>Survey Results</h1>
        <p>Should ECEN 160 Digital Systems be required for the Software Engineering major?</p>
        <table class="results-table">
            <th>Yes</th>
            <th>No</th>
            <tr>
                <td>
                    <?php echo $yes160_count; ?>
                </td>
                <td>
                    <?php echo $no160_count; ?>
                </td>
            </tr>
        </table>
        <p>Should C++ be the first programming language taught?</p>
        <table class="results-table">
            <th>Yes</th>
            <th>No</th>
            <tr>
                <td>
                    <?php echo $yes_cpp_count; ?>
                </td>
                <td>
                    <?php echo $no_cpp_count; ?>
                </td>
            </tr>
        </table>

        <p>Which programming language should be taught as a student's first language?</p>
        <table class="results-table">
            <th>C++</th>
            <th>Java</th>
            <th>Python</th>
            <th>JavaScript</th>
            <tr>
                <td>
                    <?php echo $cpp_lang; ?>
                </td>
                <td>
                    <?php echo $java_lang; ?>
                </td>
                <td>
                    <?php echo $python_lang; ?>
                </td>
                <td>
                    <?php echo $javascript_lang; ?>
                </td>
            </tr>
        </table>

        <p>Which of these options would you like to see added as an emphasis in the Computer Science department?</p>
        <table class="results-table">
            <th>User Experience Design</th>
            <th>Web Development</th>
            <th>Game Development</th>
            <th>Artificial Inteligence</th>
            <tr>
                <td>
                    <?php echo $ux; ?>
                </td>
                <td>
                    <?php echo $webDev; ?>
                </td>
                <td>
                    <?php echo $gDev; ?>
                </td>
                <td>
                    <?php echo $ai; ?>
                </td>
            </tr>
        </table>
        <?php echo $comment ?>
    </div>
</body>

</html>
