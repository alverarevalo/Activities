<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Creating</title>
</head>
<body>
    <?php
        $xml = new DOMDocument('1.0');
        $xml->formatOutput = true;
        $xml->preserveWhiteSpace =false;
        $xml->load('AITools.xml');

        $AITool = $_POST['AITool'];
        $Developer = $_POST['Developer'];
        $ReleaseDate = $_POST['ReleaseDate'];
        $Category = $_POST['Category'];
        $SubscriptionType = $_POST['SubscriptionType'];

        $AI = $xml->createElement('AI');

        $ToolName = $xml->createElement('ToolName', $AITool);
        $Dev = $xml->createElement('Developer', $Developer);
        $Rel = $xml->createElement('ReleaseDate', $ReleaseDate);
        $Cat = $xml->createElement('Category', $Category);
        $Subs = $xml->createElement('SubscriptionType', $SubscriptionType);

        $AI->appendChild($ToolName);
        $AI->appendChild($Dev);
        $AI->appendChild($Rel);
        $AI->appendChild($Cat);
        $AI->appendChild($Subs);

        $xml->getElementsByTagName('AIs')->item(0)->appendChild($AI);
        $xml->save('AITools.xml');

        echo'<p>Record Saved</p>
        <a href="create.php">Back</a>';
    ?>
</body>
</html>

