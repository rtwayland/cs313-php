<?php
//Open the file
 $file = fopen('results.txt', 'r') or die('Unable to open file!');
if (filesize('results.txt') == 0) {
    fclose($file);
    $file = fopen('results.txt', 'w');
    for ($i = 0; $i < 12; ++$i) {
        fwrite($file, "0\n");
    }
    fclose($file);
}
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

  fclose($file);

  $cs160 = $_POST['cs160'];

  if ($cs160 == 'yes') {
      ++$yes160_count;
  } else {
      ++$no160_count;
  }

  $cpp = $_POST['cpp'];

  if ($cplus == 'yes') {
      ++$yes_cpp_count;
  } else {
      ++$no_cpp_count;
  }

$lang = $_POST['lang'];

switch ($lang) {
  case 'c++':
    ++$cpp_lang;
    break;
  case 'java':
    ++$java_lang;
    break;
  case 'python':
    ++$python_lang;
    break;
  case 'javascript':
    ++$javascript_lang;
    break;
  default:
    break;
}

  $emphasis = $_POST['emphasis'];

  switch ($emphasis) {
    case 'User Experience Design':
      ++$ux;
      break;
    case 'Web Development':
      ++$webDev;
      break;
    case 'Game Development':
      ++$gDev;
      break;
    case 'Artificial Inteligence':
      ++$ai;
      break;
    default:
      break;
  }


//Write the results to the file
$file = fopen('results.txt', 'w');

//first question variables
  fwrite($file, "$yes160_count\n");
  fwrite($file, "$no160_count\n");

  //second question variables
  fwrite($file, "$yes_cpp_count\n");
  fwrite($file, "$no_cpp_count\n");

    //third question variables
  fwrite($file, "$cpp_lang\n");
  fwrite($file, "$java_lang\n");
  fwrite($file, "$python_lang\n");
  fwrite($file, "$javascript_lang\n");

  //fourth question variables
  fwrite($file, "$ux\n");
  fwrite($file, "$webDev\n");
  fwrite($file, "$gDev\n");
  fwrite($file, "$ai\n");
  // fwrite($file, "$other");

  fclose($file);

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
         <h1>Survey Results</h1>
         <p>Digital Systems should be required for Software Engineering majors:</p>
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
         <p>C++ should be the first programming language learned:</p>
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
