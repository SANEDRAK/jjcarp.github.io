<?php

  $msg = '';
  $msgClass = '';

  if(filter_has_var(INPUT_POST, 'submit')) {
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  if(!empty($name) && !empty($email) && !empty($message)) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $msg = 'Use a valid E-mail!';
    } else {
      $toEmail = 'zinerguy@gmail.com';
      $subject = 'You got a message From: '.$name;
      $body = '<h2>Conact Request</h2>
      <h4>Name: </h4><p>'.$name.'</p>
      <h4>Email</h4><p>'.$email.'</p>
      <h4>Message</h4><p>'.$message.'</p>';

      $headers = "MIME-Version 1.0". \r\n;
      $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";

      $headers .= "From: " .$name."<".$email.">".\r\n;

      if(mail($toEmail, $subject, $body, $headers)) {
        $msg = "Email Sent!";
        $msgClass="Green";
      } else {
        $msg ="Your email was not sent";
        $msgClass="#ec0001";
      }

    }
  } else {
    $msg = 'Please fill in all fields';
  }
}
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/contact.css">
  <link href="/css/awesomecss/fontawesome-all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/contact.css">
  <title>Contact Us</title>

</head>
<body>
  <div class="container">
    <h1 id="logo"><a href="index.html"><span class="color">Closet</span> Solutions</a></h1>
    <div class="wrapper">
      <div class="info">
        <h3>Logo</h3>
        <ul>
          <li><span class="info-title"><i class="fas fa-road scale"></i> Address</span> <br> 785 W. Rialto Ave. Unit D Rialto, CA 92376</li>
          <li><span class="info-title"><i class="fas fa-phone scale"></i> Phone Number</span><br>
             <a href="tel:(909) 202-2387">(909) 202-2387</a> or <a href="tel:(909) 749-8020">(909) 749-8020</a></li>
          <li><span class="info-title"><i class="fas fa-envelope scale"></i> Email Address</span> <br>
             <a href="mailto:Closetsolutons@gmail.com">Closetsolutons@gmail.com</a></li>
        </ul>
      </div>
      <div class="contact">
        <h3>Email Us</h3>

        <?php if($msg != ''): ?>
          <div class="alert">
              <?php echo $msg; ?>
          </div>

      <?php endif ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <p>
            <label for=""> Name</label>
            <input type="text" name="name" placeholder="Full Name">
          </p>
          <p>
            <label for="">Subject</label>
            <input type="text" name="subject">
          </p>
          <p>
            <label for="">Email Address</label>
            <input type="text" name="email" placeholder="E-Mail">
          </p>
          <p>
            <label for="">Telephone</label>
            <input type="tel" name="phone" placeholder="(xxx) xxx-xxxx">
          </p>

          <p class="full">
            <label for=""> Message</label>
            <textarea name="message" rows="5"></textarea>
          </p>

          <p class="full"><button type="submit" name="submit">Submit</button></p>

        </form>
      </div>
    </div>
  </div>
</body>
</html>
