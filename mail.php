<?php

$message = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
    $messageContent = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // outpy display
    $message =  "<strong>Name:</strong> " .$name . "<br>".
                "<strong>Email:</strong> " . $email . "<br>" .
               "<strong>Subject:</strong> " . $subject . "<br>" .
               "<strong>Message:</strong> " . nl2br($messageContent);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arsenal&family=Play&family=Rajdhani:wght@400;500&family=Varela+Round&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Play', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: black;
        }
        .container {
            background:#E5E4E2;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(1, 1, 1, 1);
            width: 300px;
            text-align: center;
        }
        p {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
        }
        a {
            color: blue;
            display:inline-block;
            text-decoration: none;
            font-weight: bold;
            padding: 10px;
        }
        a:hover {
          color: black;
            text-decoration: underline;
        }
        h1 {
            color: red; 
            font-size: 24px; 
            margin-bottom: 20px;
        }

        .mode-toggle {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    z-index: 1000;
}

.mode-toggle:hover{
    opacity: 3;
}
 /* Dark mode styles */
 body.dark-mode {
            background-color: white;
            color: silver;
        }
        body.dark-mode .container {
            background: whitesmoke;
        }
        body.dark-mode a {
            color: #1e90ff;
        }
        
        body.dark-mode h1 {
            color: #ff6f6f;
        }
        body.dark-mode .mode-toggle {
            background-color: #e0e0e0;
            color: black;
        }
        body.dark-mode .mode-toggle:hover {
            opacity: 0.8;
        } 
    </style>
</head>
<body>
<button id="mode-toggle" class="mode-toggle">Toggle Dark Mode</button>
    <div class="container">
        <!-- Display the message -->
         <h1>Sure about your information?</h1>
        <p><?php echo $message; ?></p>
        <a href="mail2.html" style="float: left; color: blue; text-decoration: none; font-weight: bold;">Go back</a>

        <a href="contend.html" style="float: right; color: blue; text-decoration: none; font-weight: bold;">Confirm</a>
    </div>
    <script>
        // Get the button and body elements
        const toggleButton = document.getElementById('mode-toggle');
        const body = document.body;

        // Check if there's a saved mode in localStorage
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark-mode');
            toggleButton.textContent = 'Light Mode';
        }

        // Toggle dark mode and light mode
        toggleButton.addEventListener('click', () => {
            body.classList.toggle('dark-mode');

            // Change button text based on mode
            if (body.classList.contains('dark-mode')) {
                toggleButton.textContent = 'Light Mode';
                localStorage.setItem('theme', 'dark');
            } else {
                toggleButton.textContent = 'Dark Mode';
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</body>
</html>
