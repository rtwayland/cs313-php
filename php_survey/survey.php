<?php
//Open the session
session_start();

if (isset($_SESSION['surveyStatus'])) {
    header('Location: http://php-rwayland.rhcloud.com/php_survey/survey_results.php');
    exit();
} else {
    echo 'Please take this survey<br>';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP Survey</title>
    <link rel="stylesheet" href="survey.css" type="text/css">

    <script type="text/javascript">
    function checkField() {
      if (document.getElementById('cpp-yes').checked) {
          document.getElementById('cplus').checked = true;
      }

      if (document.getElementById('cpp-no').checked) {
        document.getElementById('cplus').checked = false;
      }
    }
        // function addTextArea() {
        //     var comment = document.getElementById('comment-box');
        //     var box = "<textarea name='comment' rows='8' cols='40' placeholder='Write your comment here'></textarea>";
        //     if (document.getElementById('other').checked) {
        //         comment.innerHTML = box;
        //         comment.style.display = "block";
        //     } else {
        //         comment.style.display = "none";
        //     }
        // }

    </script>

</head>

<body onsubmit="checkField()">

  <a  href="survey_results.php"><div id="view-results">View Survey</div></a>

    <div class="center-form">
        <form action="calc_survey_results.php" method="post">
            <h1>Computer Science Department Issues</h1>
            <p>Should ECEN 160 Digital Systems be required for the Software Engineering major?</p>
            <table>
                <th>Yes</th>
                <th>No</th>
                <tr>
                    <td>
                        <input id="cs160-yes" type="radio" name="cs160" value="yes" required>
                    </td>
                    <td>
                        <input id="cs160-no" type="radio" name="cs160" value="no" required>
                    </td>
                </tr>
            </table>


            <p>Should C++ be the first programming language taught?</p>
            <table>
                <th>Yes</th>
                <th>No</th>
                <tr>
                    <td>
                        <input id="cpp-yes" type="radio" name="cpp" value="yes" onchange="checkField()" required>
                    </td>
                    <td>
                        <input id="cpp-no" type="radio" name="cpp" value="no" onchange="checkField()" required>
                    </td>
                </tr>
            </table>

            <p>Which programming language should be taught as a student's first language?</p>
            <table>
                <th>C++</th>
                <th>Java</th>
                <th>Python</th>
                <th>JavaScript</th>
                <tr>
                    <td>
                        <input type="radio" name="lang" id="cplus" value="c++" onchange="checkField()" required>
                    </td>
                    <td>
                        <input type="radio" name="lang" id="java" value="java" onchange="checkField()" required>
                    </td>
                    <td>
                        <input type="radio" name="lang" id="python" value="python" onchange="checkField()" required>
                    </td>
                    <td>
                        <input type="radio" name="lang" id="javascript" value="javascript" onchange="checkField()" required>
                    </td>
                </tr>
            </table>

            <p>Which of these options would you like to see added as an emphasis in the Computer Science department?</p>

            <table>
                <th>User Experience Design</th>
                <th>Web Development</th>
                <th>Game Development</th>
                <th>Artificial Inteligence</th>
                <!-- <th>Other</th> -->
                <tr>
                    <td>
                        <input type="radio" name="emphasis" value="User Experience Design" onchange="addTextArea()" required>
                    </td>
                    <td>
                        <input type="radio" name="emphasis" value="Web Development" onchange="addTextArea()" required>
                    </td>
                    <td>
                        <input type="radio" name="emphasis" value="Game Development" onchange="addTextArea()" required>
                    </td>
                    <td>
                        <input type="radio" name="emphasis" value="Artificial Inteligence" onchange="addTextArea()" required>
                    </td>
                    <!-- <td>
                        <input id="other" type="radio" name="emphasis" value="Other" onchange="addTextArea()" required>
                    </td> -->
                </tr>
            </table>

            <!-- <div id="comment-box"></div> -->
            <br>
            <button type="submit" name="button">Submit Survey</button>
        </form>
    </div>
</body>

</html>
