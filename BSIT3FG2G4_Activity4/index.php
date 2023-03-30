
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.CSS">
        <title>IT 310 ACTIVITY 3 XML WITH CRUD USING DOM PHP</title>
    </head>
    <body>

        <div class="container">

            <div class="buttons">
                
                <a href="create.php">Add</a>
                <a href="update.php">Update</a>
                <a href="delete.php">Delete</a>

            </div>

            <form class="searchbox" method="post" action="loadSearch.php">
                <button type="submit" name="search" id="search">Search</button>
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
            

            echo '
                <div class="row">
                    <div>Tool Name: ' . $toolName . '</div>
                    <div>Developer: ' . $developer . ' </div>
                    <div>Release Date: ' . $releaseDate . '</div>
                    <div>Category: ' . $category . '</div>
                    <div>Subscription Type: ' . $subscriptionType . '</div>   
                </div>
            ';
            }

            
        ?>
    </body>
    </html>
