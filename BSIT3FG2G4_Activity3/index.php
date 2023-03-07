
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>IT 310 ACTIVITY 3 XML WITH CRUD USING DOM PHP</title>
    </head>
    <body>
        <div class="container">
            <button><a href="create.html">Add</a></button>
            <button><a href="update.html">Edit</a></button>
            <button><a href="delete.html">Delete</a></button>
            <form action="">
                <button type="submit" name="search">Search</button>
                <input id="search" name="search" type="text">
            </form>
            
        <?php 
            $xml = new domdocument("1.0");
            $xml->load("AITools.xml");
            
            $AIs = $xml->getElementsByTagName("AI");
            
            foreach($AIs as $AI)
            {
            $toolName = $AI->getElementsByTagName("ToolName")->item(0)->nodeValue;;
            $developer = $AI->getElementsByTagName("Developer")->item(0)->nodeValue;
            $releaseDate = $AI->getElementsByTagName("ReleaseDate")->item(0)->nodeValue;
            $category = $AI->getElementsByTagName("Category")->item(0)->nodeValue;
            $subscriptionType = $AI->getElementsByTagName("SubscriptionType")->item(0)->nodeValue;
            
            echo "Tool Name: $toolName<br>";
            echo "Developer: $developer<br>";
            echo "Release Date: $releaseDate<br>";
            echo "Category: $category<br>";
            echo "Subscription Type: $subscriptionType<br><br>";
            }
        ?>
        </div>
    </body>
    </html>

