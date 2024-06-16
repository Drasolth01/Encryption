<?php
  // Replace with your Formspree endpoint
  $formspree_url = 'https://formspree.io/f/mqkrrwaw';

  // Prepare form data
  $post_data = http_build_query(array(
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'subject' => $_POST['subject'],
    'message' => $_POST['message']
  ));

  // Prepare request options
  $options = array(
    'http' => array(
      'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => $post_data,
    ),
  );

  // Create context
  $context  = stream_context_create($options);

  // Send the request and capture the response
  $result = file_get_contents($formspree_url, false, $context);

  // Check for success
  if ($result === FALSE) {
    // Handle error
    die('Error submitting the form!');
  } else {
    // Success response
    echo 'Form submitted successfully!';
  }
?>
