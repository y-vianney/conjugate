<?php

    function generate_suff($tense, $isSimple)
    {
        
        if ($tense == "présent") 
        {
            if ($isSimple) return ["e", "es", "e", "ons", "ez", "ent"];
            else return ["e", "es", "e", "eons", "ez", "ent"];
        }
        else if ($tense == "futur") return ["erai", "eras", "era", "erons", "erez", "eront"];
        else if ($tense == "passé")
        {
            if ($isSimple) return ["ai", "as", "a", "âmes", "âtes", "èrent"];
            else return ["eai", "eas", "ea", "eâmes", "eâtes", "èrent"];
        }
        else if ($tense == "imparfait") 
        {
            if ($isSimple) return ["ais", "ais", "ait", "ions", "iez", "aient"];
            else return ["eais", "eais", "eait", "ions", "iez", "eaient"];
        }
    }

    function conjugatePast($radical)
    {
        $rslt = '';

        $rslt .= 'J\'ai <span class="super">' . $radical . 'é</span>';
        $rslt .= "<br>Tu as <span class=\"super\">" . $radical . 'é</span>';
        $rslt .= "<br>Il/Elle/On a <span class=\"super\">" . $radical . 'é</span>';
        $rslt .= "<br>Nous avons <span class=\"super\">" . $radical . 'é</span>';
        $rslt .= "<br>Vous avez <span class=\"super\">" . $radical . 'é</span>';
        $rslt .= "<br>Ils/Elles ont <span class=\"super\">" . $radical . 'é</span>';

        return $rslt;
    }

    function conjugate_verb($verb, $tense)
    {   
        $persons = array('Je', 'Tu', 'Il/Elle/On', 'Nous', 'Vous', 'Ils/Elles');
        $racine = substr($verb, 0, -2);
        $terminaison = substr($verb, -2);
        $isLikeManger = (substr($racine, -1) != "g") ? true : false;
        $textToShow = "";
        
        if ($terminaison == "er")
        {
            if ($tense == "passé composé") $textToShow = conjugatePast($racine);
            else
            {
                $suffixes = generate_suff($tense, $isLikeManger);
                for ($i = 0; $i < 6; $i++)
                {
                    $textToShow .= "<span>$persons[$i] <span class=\"super\">$racine$suffixes[$i]</span></span> </br>";
                }
            }
        } 
        else $textToShow = "Nous prenons en compte uniquement les verbes du premier groupe.";

        return $textToShow;
    }
?>