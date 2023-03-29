<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Updating</title>
</head>
<body>
    <?php
        $xml = new DOMDocument('1.0');
        $xml->formatOutput = true;
        $xml-> preserveWhiteSpace = false;
        $xml->load('AITools.xml');

        $AIToolSelect = $_POST['AITool'];
        $Developer = $_POST['Developer'];
        $ReleaseDate = $_POST['ReleaseDate'];
        $Category = $_POST['Category'];
        $SubscriptionType = $_POST['SubscriptionType'];
        
        $AIs = $xml->getElementsByTagName('AI');
        
        foreach($AIs as $AI){

            $AITool = $AI->getElementsByTagName('ToolName')->item(0)->nodeValue;

            if($AIToolSelect == $AITool){
                $newNode = $xml->createElement('AI');
                $ToolName = $xml->createElement('ToolName', $AITool);
                $Dev = $xml->createElement('Developer', $Developer);
                $Rel = $xml->createElement('ReleaseDate', $ReleaseDate);
                $Cat = $xml->createElement('Category', $Category);
                $Subs = $xml->createElement('SubscriptionType', $SubscriptionType);
                
                $newNode->appendChild($ToolName);
                $newNode->appendChild($Dev);
                $newNode->appendChild($Rel);
                $newNode->appendChild($Cat);
                $newNode->appendChild($Subs);

                $xml->getElementsByTagName('AIs')->item(0)->replaceChild($newNode, $AI);
                $xml->save('AITools.xml');

                echo'<p>Record Updated</p>
                <a href="update.php">Back</a>';
            }
        }
    ?>
</body>
</html>