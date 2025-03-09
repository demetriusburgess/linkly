<?php
// 404.php
header("HTTP/1.0 404 Not Found");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
        }

        .container img {
            width: 150px;
            height: auto;
        }

        h1 {
            font-size: 48px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- 8-bit style link SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" width="128" height="128">
        <circle cx="64" cy="64" r="60" fill="#F4D6A0" stroke="#000000" stroke-width="4"/>
        <circle cx="44" cy="50" r="12" fill="#FFFFFF" stroke="#000000" stroke-width="3"/>
        <circle cx="84" cy="50" r="12" fill="#FFFFFF" stroke="#000000" stroke-width="3"/>
        <circle cx="44" cy="50" r="6" fill="#000000"/>
        <circle cx="84" cy="50" r="6" fill="#000000"/>
        <ellipse cx="64" cy="75" rx="25" ry="15" fill="#FFFFFF" stroke="#000000" stroke-width="3"/>
        <path d="M44,90 Q64,110 84,90" stroke="#000000" stroke-width="3" fill="none"/>
        <ellipse cx="64" cy="80" rx="8" ry="5" fill="#F4D6A0" stroke="#000000" stroke-width="2"/>
        <path d="M34,40 Q30,25 20,30 Q30,15 44,30" fill="#F4D6A0" stroke="#000000" stroke-width="2"/>
        <path d="M94,40 Q98,25 108,30 Q98,15 84,30" fill="#F4D6A0" stroke="#000000" stroke-width="2"/>
        </svg>
        <h1>404</h1>
        <p>Oops! The page you're looking for can't be found.</p>
        <p><a href="/linkly">Go back to the homepage</a></p>
    </div>
</body>
</html>
