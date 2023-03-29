<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Deleting</title>
</head>
<body>
    <?php
        $xml = new DOMDocument('1.0');
        $xml->load('AITools.xml');
        
        $AIs = $xml->getElementsByTagName('AI');

        $Tools = $_POST['ToolName'];

        foreach($AIs as $AI){
            $ToolName = $AI->getElementsByTagName('ToolName')->item(0)->nodeValue;

            if($Tools == $ToolName){
                $xml->getElementsByTagName('AIs')->item(0)->removeChild($AI);
                $xml->save('AITools.xml');

                echo'<p>Record Deleted</p>
                <a href="delete.php">Back</a>';
            }
        }
    ?>
</body>
</html>