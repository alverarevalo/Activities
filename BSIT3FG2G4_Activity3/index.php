
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
            <div class="buttons">
                <a href="create.php">Add</a>
                <a href="update.php">Edit</a>
                <a href="delete.php">Delete</a>
                <button type="submit" name="search" id="searchbtn">Search</button>
                <input id="search" name="search" type="text">
            </div>
            
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
            

            echo '
                <div class="row">
                    Tool Name: ' . $toolName . '
                    Developer: ' . $developer . ' 
                    Release Date: ' . $releaseDate . '
                    Category: ' . $category . '
                    Subscription Type: ' . $subscriptionType . '
                </div>
            ';
            }

            
        ?>
        </div>
    </body>
    </html>

