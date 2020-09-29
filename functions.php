<?php

// search with AND 
function searchStrings($path, $keyword_list) {
	$output = array();
    foreach ($keyword_list as $keyword) {
        $command = "grep -irl \"$keyword\" $path";
        exec($command, $output[]);
    }

    $collection[1] = $output[0];
    foreach($output as $search_result) {
        $collection[] = $search_result;
     }
    
    $result = call_user_func_array('array_intersect', $collection);

    // sort the results
    sort($result);

    return $result;
}

// search with OR
function searchStrings2($path, $keyword_list) {
    $pattern = implode('\|', $keyword_list) ;
    $command = "grep -irl '$pattern' $path";
	$output = array();
    exec($command, $output);
    
    // sort the results
    sort($result);
    
    return $output;
}

function getName($url) {
    $name = end(explode("/", $url));
    $name = str_replace(".html", "", $name);
    $name = str_replace("-", " ", $name);
    return $name;
}

function setCheckbox($name, $folders) {
    if (isset($folders)) {
        foreach ($folders as $folder) {
            if ($folder == $name)
                echo "checked";
        }
        if (count($folders) >= 18)
            echo " checked";
    }
    else {
        echo "checked";
    }
}