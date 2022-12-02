<?php
// Required Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: applicant/json; charset=UTF-8");


if($_POST) {
    $receipent = "roychan0129@gmail.com";
    $subject = "Email from my portfolio site";
    $visitor_name = "";
    $visitor_email = "";
    $message = "";
    $fail = array();

    //Cleans and stores first name in the $visitor_name variable
    if(isset($_POST['firstname']) && !empty($_POST['firstname'])){
        $visitor_name .= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    }else{
        array_push($fail, "firstname");
    }

    //Cleans and apends last name in the $visitor_name variable
    if(isset($_POST['lastname']) && !empty($_POST['lastname'])){
            $visitor_name .= " ".filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    }else{
        array_push($fail,"lastname");
    }

    //Cleans and stores email in the $visitor_name variable
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $visitor_email .= str_replace(array("\r", "\n", "%0a", "%0d"), "", $_POST['email']);
        $visitor_email .= filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }else{
        array_push($fail, "email");
    }
    
    //Cleanse message and stores in $message varible
    if(isset($_POST['message']) && !empty($_POST['message'])){
        $clean = filter_var($_POST['message'],   FILTER_SANITIZE_STRING);
        $message = htmlspecialchars($clean);
    }else{
        array_push($fail, "message");
    }

    $headers = "From: " .$visitor_name."\r\n" . "Reply-To: " .$visitor_email. "\r\n" ."X-Mailer: PHP/" .phpversion();
    if(count($fail)==0){
        mail($receipent, $subject, $message, $headers);
        $results['messages'] = sprintf("Thank you for contacting us, %s. We will respong within 24 hours. ", $visitor_name);
    }else{
        header("HTTP/2 488 You did NOT fill out the form correctly");
        die(json_encode(['message' => $fail]));
    }
}else{
    $results['message'] = "Please Fill In All The Empty Row";
}

echo json_encode($results);


?>