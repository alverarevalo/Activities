<?php
    $xml = new domdocument("1.0");
    $xml->load("AITools.xml");
    $search = strtolower($_REQUEST["q"]);

    $AIs = $xml->getElementsByTagName('AI');
    $flag = 0;

    $output = "<div class='result' id='search-result'><ul>";

    foreach($AIs as $AI){
        $ToolName = $AI->getElementsByTagName('ToolName')->item(0)->nodeValue;
        $Developer = $AI->getElementsByTagName('Developer')->item(0)->nodeValue;
        $ReleaseDate = $AI->getElementsByTagName('ReleaseDate')->item(0)->nodeValue;
        $Category = $AI->getElementsByTagName('Category')->item(0)->nodeValue;
        
        $Tools = strtolower($ToolName);
        $Dev = strtolower($Developer);
        $Cat = strtolower($Category);
        if(
            ($search == strtolower(substr($Tools, 0, strlen($search)))) ||
            ($search == strtolower(substr($Dev, 0, strlen($search)))) ||
            ($search == strtolower(substr($ReleaseDate, 0, strlen($search)))) ||
            ($search == strtolower(substr($Cat, 0, strlen($search))))
        ){
            $flag++;
            $SubscriptionType = $AI->getElementsByTagName('SubscriptionType')->item(0)->nodeValue;
            echo'
                    <div class="AI">
                        <h3 class="title">' . $ToolName .'</h3>
                        <div class="genre">' . $Developer .'</div>
                        <div class="releaseYear">' . $ReleaseDate .'</div>
                        <div class="console">' . $Category .'</div>
                        <div class="director">' . $SubscriptionType .'</div>
                    </div>
                ';
        }
    }
    if($flag == 0){
        echo'<p>No Record Found.</p>';
        
    }

    $animes = $xml->getElementsByTagName("AI");

    $output = "<div class='result' id='search-result'><ul>";

    foreach($animes as $anime)
    {
        $animetitle = $anime->getElementsByTagName("animetitle")->item(0)->nodeValue;
        $releaseddate = $anime->getElementsByTagName("releaseddate")->item(0)->nodeValue;
        $picture = $anime->getElementsByTagName("picture")->item(0)->nodeValue;

        if($search == strtolower(substr($animetitle, 0, strlen($search)))) {
            if($output == "<ul>") {
                $output = "
                <li class='result-list'>
                    <div class='search-list'>
                        <img class='search-list-img' src='data:image;base64,".$picture."'>
                        <div class='search-list-right'>
                            <span class='search-list-title'>".$animetitle."</span><br>
                            <span class='search-list-release'>".$releaseddate."</span>
                        </div>
                    </div>
                </li>
                ";
            }
            else {
                $output .= "<li class='result-list'>
                    <div class='search-list'>
                        <img class='search-list-img' src='data:image;base64,".$picture."'>
                        <div class='search-list-right'>
                            <span class='search-list-title'>".$animetitle."</span><br>
                            <span class='search-list-release'>".$releaseddate."</span>
                        </div>
                    </div>
                </li>
                ";
            }
        }

    }

    $output .= "</ul></div>";

	if($output=="<div class='result' id='search-result'><ul></ul></div>") //if no matching name 
        echo "
        <div class='result' id='search-result'>
            <ul>
                <li class='result-list'>
                    <div class='no-record'>
                        <div class='search-list-right'>
                            <span class='no-record-text'>No Result found.</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        ";
	else
		echo $output;
?>