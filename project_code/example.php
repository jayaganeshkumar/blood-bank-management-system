<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body
        {
            background-color: yellow;
            color: red;
        }
    </style>
</head>
<body>
    <h1 id="subject">Database Management System</h1>
    <p id="about">A database is an organized collection of data, generally stored and accessed electronically from a computer system. Where databases are more complex they are often developed using formal design and modeling techniques.</p>
    <script>
        document.getElementById("subject").innerHTML = "Web Technology";
        document.getElementById("subject").style.color = "blue";
        document.getElementById("about").innerHTML = "Web development is the work involved in developing a Web site for the Internet (World Wide Web) or an intranet (a private network). Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services. A more comprehensive list of tasks to which Web development commonly refers, may include Web engineering, Web design, Web content development, client liaison, client-side/server-side scripting, Web server and network security configuration, and e-commerce development."
        document.getElementById("about").style.color = "blue";
    </script>
</body>
</html>