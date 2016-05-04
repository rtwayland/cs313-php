<?php
//first question variables
  $yes160_count = 0;
  $no160_count = 0;
  $cs160 = $_POST['cs160'];

  if ($cs160 == 'yes') {
      ++$yes160_count;
  } else {
      ++$no160_count;
  }

//second question variables
  $yes_cpp_count = 0;
  $no_cpp_count = 0;
  $cpp = $_POST['cpp'];

  if ($cplus == 'yes') {
      ++$yes_cpp_count;
  } else {
      ++$no_cpp_count;
  }

  //third question variables
$cpp_lang = 0;
$java_lang = 0;
$python_lang = 0;
$javascript_lang = 0;
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
  //fourth question variables
  $ux = 0;
  $webDev = 0;
  $gDev = 0;
  $ai = 0;
  $other = 0;
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
    case 'Other':
      ++$other;
      break;
    default:
      break;
  }

  //comment box
$comment = $_POST['comment'];
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
             <th>Other</th>
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
                 <td>
                     <?php echo $other; ?>
                 </td>
             </tr>
         </table>
         <?php echo $comment ?>
     </div>
 </body>

 </html>
