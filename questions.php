<?php
include('connection.php');
if($_POST['submit']) {
    $name = $_POST['name'];
	$age = $_POST['age'];
	$phone = $_POST['phone'];
	if($name == '' || $age == '' || $phone == '') {
		echo '<h2>Please fill all * mandatory fields.</h2>';
	}	

	if($q1=='' || $q2 =='' || $q3 =='')
    $q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];


	if($q1=='' || $q2 =='' || $q3 =='') {
		echo '<h2>Please answer all questions.</h2>';
	}
	else {
		$score = 0;
		if($q1 == 1) { // 1st option is correct
		$score++;
		}
		if($q2 == 3) { // 3rd option is correct
		$score++;
		}
		if($q3 == 2) { // 2nd option is correct
		$score++;
		}
	        $score = $score	/ 3 *100;
		
		if($score < 50)
		{
		echo '<h2>You need to score at least 50% to pass the exam.</h2>';
		}
		else {
		echo '<h2>You have passed the exam and scored '.$score.'%.</h2>';
		}
	}
}
?>

<html>

<head>
    <title>PHP Multiple Choice Questions and Answers</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="question-container">
        <div class="question-content">
            <h1>Multiple Choice Questions Answers</h1>
            <p>Please fill the details and answers the all questions-</p>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="form-control">
                    <h3>1. Which one is the most interesting? </h3>
                    <div class="form-group">
                        <div class="form-answer">
                            <label>
                                <input type="radio" name="question1" value="small" checked>
                                <img src="assets/images/questions/question1-option1.png" alt="Option 1">
                            </label>
                        </div>
                        <div class="form-answer">
                            <label>
                                <input type="radio" name="question1" value="small" checked>
                                <img src="assets/images/questions/question1-option2.png" alt="Option 2">
                            </label>
                        </div>
                        <div class="form-answer">
                            <label>
                                <input type="radio" name="question1" value="small" checked>
                                <img src="assets/images/questions/question1-option3.png" alt="Option 2">
                            </label>
                        </div>
                        <div class="form-answer">
                            <label>
                                <input type="radio" name="question1" value="small" checked>
                                <img src="assets/images/questions/question1-option4.png" alt="Option 2">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <h3>1. Which one is the most interesting? </h3>
                    <div class="form-group">
                        <div class="form-answer">
                            <label>
                                <input type="radio" name="question2" value="small" checked>
                                <img src="assets/images/questions/question1-option1.png" alt="Option 1">
                            </label>
                        </div>
                        <div class="form-answer">
                            <label>
                                <input type="radio" name="question2" value="small" checked>
                                <img src="assets/images/questions/question1-option2.png" alt="Option 2">
                            </label>
                        </div>
                        <div class="form-answer">
                            <label>
                                <input type="radio" name="question2" value="small" checked>
                                <img src="assets/images/questions/question1-option3.png" alt="Option 2">
                            </label>
                        </div>
                        <div class="form-answer">
                            <label>
                                <input type="radio" name="question2" value="small" checked>
                                <img src="assets/images/questions/question1-option4.png" alt="Option 2">
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>  


                <label>
                <input type="radio" name="test" value="ss">
                <img src="assets/images/questions/question1-option2.png" alt="Option 2">
                </label>
                <label>
                <input type="radio" name="test" value="big">
                <img src="assets/images/questions/question1-option3.png" alt="Option 2">
                </label>
                <label>
                <input type="radio" name="test" value="big">
                <img src="assets/images/questions/question1-option4.png" alt="Option 2">
    </div>
    <div class="container">
        <h1>Multiple Choice Questions Answers</h1>
        <p>Please fill the details and answers the all questions-</p>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <h3>Ques1 : Who is the father of PHP? </h3>
            <label>
            <input type="radio" name="test" value="small" checked>
            <img src="assets/images/questions/question1-option1.png" alt="Option 1">
            </label>

            <label>
            <input type="radio" name="test" value="ss">
            <img src="assets/images/questions/question1-option2.png" alt="Option 2">
            </label>
            <label>
            <input type="radio" name="test" value="big">
            <img src="assets/images/questions/question1-option3.png" alt="Option 2">
            </label>
            <label>
            <input type="radio" name="test" value="big">
            <img src="assets/images/questions/question1-option4.png" alt="Option 2">
            </label>
            <div class="form-group">
                <input type="submit" value="Submit" name="submit" class="btn btn-primary" />
            </div>
        </form>
    </div>
</body>

</html>