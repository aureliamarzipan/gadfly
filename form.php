<?php include 'top.php'; 

$dataIsGood = false;

$message = '';

$name = '';
$email = '';
$submission = '';
$instructions = '';
$submissionType = '';
$discoveryInstagram = 0;
$discoveryPrint = 0;
$discoveryFriend = 0;
$discoverOther = 0;

function getData($field) {
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    // Check for letters, numbers and dash, period, space and single quote only.
    // added & ; and # as a single quote sanitized with html entities will have 
    // this in it bob's will be come bob's
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    print PHP_EOL . '<!--Starting Sanitization -->' . PHP_EOL;

    $name = getData('txtName');
    $email = getData('txtEmail');
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $submission = getData('txtSubmission');
    $instructions = getData('txtInstructions');
    $discoveryInstagram = (int) getData('chkInstagram');
    $discoveryPrint = (int) getData('chkPrint');
    $discoveryFriend = (int) getData('chkFriend');
    $discoverOther = (int) getData('chkOther');
    $submissionType = getData('radSubmissionType');

    print PHP_EOL . '<!--Starting Validation -->' . PHP_EOL;
    $dataIsGood = true;

    if ($name == '') {
        $message .= '<p class="mistake">Please type in a name</p>';
        $dataIsGood = false;
    }
    elseif(!verifyAlphaNum($name)) {
        $message .= '<p class="mistake">Your name contains invalid characters, please remove them</p>';
        $dataIsGood = false;
    }
    
    if ($email == '') {
        $message .= '<p class="mistake">Please type in your email</p>';
        $dataIsGood = false;
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message .= '<p class="mistake">Your email contains invalid characters, please remove them</p>';
        $dataIsGood = false;
    }

    if ($submission == '') {
        $message .= '<p class="mistake">Please enter your submission</p>';
        $dataIsGood = false;
    }
    elseif(!verifyAlphaNum($submission)) {
        $message .= '<p class="mistake">Your submission contains invalid characters, please remove them</p>';
        $dataIsGood = false;
    }

    if ($instructions == '') {
        $message .= '<p class="mistake">Please enter instructions for your submission</p>';
        $dataIsGood = false;
    }
    elseif(!verifyAlphaNum($instructions)) {
        $message .= '<p class="mistake">Your instructions contain invalid characters, please remove them</p>';
        $dataIsGood = false;
    }

    if (!in_array($submissionType, array('radPoetry', 'radArticle', 'radArt', 'radOther'))) {
        $message .= '<p class="mistake">Please select the type of your submission</p>';
        $dataIsGood = false;
    }

    $totalChecked = 0;
    if ($discoveryInstagram != 1) $discoveryInstagram = 0;
    $totalChecked += $discoveryInstagram;

    if ($discoveryPrint != 1) $discoveryPrint = 0;
    $totalChecked += $discoveryPrint;

    if ($discoveryFriend != 1) $discoveryFriend = 0;
    $totalChecked += $discoveryFriend;

    if ($discoverOther != 1) $discoverOther = 0;
    $totalChecked += $discoverOther;

    if ($totalChecked == 0) {
        $message .= '<p class="mistake">Please select how you found out about us</p>';
        $dataIsGood = false;
    }

    print PHP_EOL . '<!--Starting Saving -->' . PHP_EOL;

    if ($dataIsGood) {
        $sql = 'INSERT INTO tblGadflySubmissions
        (fldName, fldEmail, fldSubmission, fldInstructions, fldDiscoveryInstagram, fldDiscoveryPrint, fldDiscoveryFriend, fldDiscoveryOther, fldSubmissionType)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $data = array($name, $email, $submission, $instructions, $discoveryInstagram, $discoveryPrint, $discoveryFriend, $discoverOther, $submissionType);
        $statement = $pdo->prepare($sql);

        try {
            if ($statement->execute($data)) {
                $message = '<h2>Thank you</h2>';
                $message .= '<p>Your submission was sucessfully saved. We should have sent you a confirmation email.</p>';

                $to = $email;
                $from = 'The Gadfly <akornhei@uvm.edu>';
                $subject = 'Your Gadfly Submission';

                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
                $headers .= "From: " . $from. "\r\n";

                $mailMessage = '<h1>Thank you for submitting!</h1>';
                $mailMessage .= '<p>We\'ll consider your submission and let you know what we\'ve decided.</p>';
                $mailMessage .= '<p>Be well!</p>';

                $mailSent = mail($to, $subject, $mailMessage, $headers);

            } else {
                $message = '<p>Record was NOT sucessfully saved</p>';
                $dataIsGood = false;
            }
        } catch (PDOException $e) {
            $message .= '<p>Couldn\'t insert the record, please contact us to inform us of the error</p>';
        }
    }

    if(!$dataIsGood) {
        print '<p class="mistake"><strong>Your form has the following mistakes that need to be fixed.</strong></p>';
    }

    print $message;

    // print '<p>Post array:</p><pre>';
    // print_r($_POST);
    // print '</pre>';
}
?>

    <main class="form">
        <h1>Submit something!</h1>
        <section  id="form-section">
            <h2>Share your wonderful work with us and the world</h2>
            <form action="#" method="POST">
                <fieldset>
                    <legend>Personal information</legend>
                    <p>
                        <label for="txtName">Name (how you'd like to be credited):</label>
                        <input type="text" id="txtName" name="txtName" value="<?php print $name; ?>">
                    </p>
                    <p>
                        <label for="txtEmail">Email adress (for us to contact you about your submission):</label>
                        <input type="email" id="txtEmail" name="txtEmail" value="<?php print $email; ?>">
                    </p>
                </fieldset>
                <fieldset>
                    <legend>Submission information</legend>
                    <p>
                        <label for="txtSubmission">Submission link (please don't dump the whole thing here):</label>
                        <input type="text" id="txtSubmission" name="txtSubmission" value="<?php print $submission; ?>">
                    </p>
                    <p>
                        <label for="txtInstructions">Special instructions for your submission:</label>
                        <input type="text" id="txtInstructions" name="txtInstructions" value="<?php print $instructions; ?>">
                    </p>
                </fieldset>

                <fieldset>
                    <legend>What type is your submission?</legend>
                    <p>
                        <input type="radio" id="radPoetry" value="radPoetry" name="radSubmissionType" <?php if ($submissionType == 'radPoetry') print 'checked'; ?>>
                        <label for="radPoetry">Poetry</label>
                    </p>
                    <p>
                        <input type="radio" id="radArticle" value="radArticle" name="radSubmissionType" <?php if ($submissionType == 'radArticle') print 'checked'; ?>>
                        <label for="radArticle">Article</label>
                    </p>
                    <p>
                        <input type="radio" id="radArt" value="radArt" name="radSubmissionType" <?php if ($submissionType == 'radArt') print 'checked'; ?>>
                        <label for="radArt">Art</label>
                    </p>
                    <p>
                        <input type="radio" id="radOther" value="radOther" name="radSubmissionType" <?php if ($submissionType == 'radOther') print 'checked'; ?>>
                        <label for="radOther">Other</label>
                    </p>
                </fieldset>

                <fieldset>
                    <legend>How did you find out about us (check all that apply)</legend>
                    <p>
                        <input type="checkbox" id="chkInstagram" name="chkInstagram" value="1" <?php if ($discoveryInstagram == 1) print 'checked'; ?>>
                        <label for="chkInstagram">Instagram</label>
                    </p>
                    <p>
                        <input type="checkbox" id="chkPrint" name="chkPrint" value="1" <?php if ($discoveryPrint == 1) print 'checked'; ?>>
                        <label for="chkPrint">A print issue</label>
                    </p>
                    <p>
                        <input type="checkbox" id="chkFriend" name="chkFriend" value="1" <?php if ($discoveryFriend == 1) print 'checked'; ?>>
                        <label for="chkFriend">A friend</label>
                    </p>
                    <p>
                        <input type="checkbox" id="chkOther" name="chkOther" value="1" <?php if ($discoverOther == 1) print 'checked'; ?>>
                        <label for="chkOther">Other</label>
                    </p>
                </fieldset>
                <fieldset>
                    <p>
                        <input type="submit" value="Submit">
                    </p>
                </fieldset>
            </form>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
