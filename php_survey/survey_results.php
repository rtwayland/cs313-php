<?php
  $yes160_count = 0;
  $no160_count = 0;

  $yes_cpp_count = 0;
  $no_cpp_count = 0;

  $cs160 = $_POST['cs160'];
  $cpp = $_POST['cpp'];

  if ($cs160 == 'yes') {
      ++$yes160_count;
  } else {
      ++$no160_count;
  }

  if ($cplus == 'yes') {
      ++$yes_cpp_count;
  } else {
      ++$no_cpp_count;
  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Survey Results</title>
    <link rel="stylesheet" href="survey.css" type="text/css">
  </head>
  <body>
    <h1>Survey Results</h1>
    <p>Digital Systems should be required for Software Engineering majors:</p>
    <table>
      <th>Yes</th>
      <th>No</th>
      <tr>
        <td><?php echo $yes160_count; ?></td>
        <td><?php echo $no160_count; ?></td>
      </tr>
    </table>
    <p>C++ should be the first programming language learned:</p>
    <table>
      <th>Yes</th>
      <th>No</th>
      <tr>
        <td><?php echo $yes_cpp_count; ?></td>
        <td><?php echo $no_cpp_count; ?></td>
      </tr>
    </table>
  </body>
</html>
