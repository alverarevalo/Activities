<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.CSS">
        <title>Update Page</title>
    </head>

    <body>

        <form class="create" method="post" action="loadUpdate.php" >
            <div class="field">
                <label>AI Tool:</label>
                <select name="AITool" id="AITool" required>
                    <option selected disabled>Select</option>
                    <?php
                        $xml = new DOMDocument('1.0');
                        $xml->load('AITools.xml');
                        $AIs = $xml->getElementsByTagName('AI');

                        foreach($AIs as $AI){
                            $title = $AI->getElementsByTagName('ToolName')->item(0)->nodeValue;
                            echo'<option>'. $title .'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="field">
                <label>Developer:</label>
                <input name="Developer" id="Developer" type="text" required>
            </div>
            <div class="field">
                <label for="ReleaseDate">Release Date:</label>
                <input name="ReleaseDate" id="ReleaseDate" type="text" required>
            </div>
            <div class="field">
                <label for="Category">Category:</label>
                <input name="Category" id="Category" type="text" required>
            </div>
            <div class="field">
                <label for="SubscriptionType">Subscription Type:</label>
                <select name="SubscriptionType" id="SubscriptionType" required> 
                        <option selected disabled>Select</option>
                        <option value="Free">Free</option>
                        <option value="Paid">Paid</option>
                        <option value="Free and Paid">Free and Paid</option>
                    </select>
            </div>




            <div class="buttons">
                <button name="submit" type="submit">Update</button>
                <button><a href="index.php">Back</a></button>
            </div>

        </form>



    </body>

</html>