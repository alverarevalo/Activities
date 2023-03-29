<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.CSS">
        <title>Delete</title>
        <script>
        function verify(){
            let choice = confirm('Are you sure you want to delete this record?');
            if(choice==false) return false;
        }
    </script>
    </head>

    <body>


        <form class="delete" action="loadDelete.php" method="post" onsubmit='return verify()'>
            <label for="ToolName">AI Tools: </label>
                <select name="ToolName" id="ToolName" required >
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

            <div class="buttons">
                <button><a href="index.php">Back</a></button>
                <button name="delete" type="submit">Delete</button>
            </div>
            
        </form>
        



    </body>

</html> 