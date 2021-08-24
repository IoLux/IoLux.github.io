<?php 
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $guese_mail = $_POST['email'];
    $message = $_POST['message'];

    
    if (empty($name) || empty($guese_mail) || empty($message)) {
        echo("Error occured!, please chcek your form again, Thank you.");
        exit;
    }
    
    if (IsInjected($guese_mail)) {
        echo("BAD EMAIL ADDRESS");
        exit;
    }

    $to = "billyyuriaan@student.telkomuniversity.ac.id";
    $headers = array(
    'From' => $guese_mail,
    'Reply-To' => $guese_mail,
    'X-Mailer' => 'PHP/' . phpversion());

    mail($to, $guese_mail, $message, $headers);
    exit;
}





