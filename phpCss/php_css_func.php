<?php

function trimFile($filename) {
    if (file_exists($filename)) {
        $insideComment = false;
        $file = file($filename, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        foreach ($file as $line)
        {
            $trimd_line = trim($line);
            $trimd_line = remove_css_comments($trimd_line, $insideComment);
            if ($trimd_line) {

                $output[] = $trimd_line;
            }
        }
        return $output;
    }else
        return 'file not exists';
}

function replace_by_reference(&$file, $vars, $exp) {
    $count = count($file);
    for ($index = 0; $index < $count; $index++)
    {
        $line = $file[$index];


        //fine only lines with css values
        if (strstr($line, ':')) {

            foreach ($vars as $key => $value)
            {
                $reg = '/' . $key . '/';
                $line = preg_replace($reg, $value, $line);
                //str_replace($key, $value, $line);
            }
        }
        if (strstr($line,PREFIX)) {
          
            //replace prefix style

            $aLine_bb = explode(';', $line);

            $seperator = isset($aLine_bb[2]) ? "\n" : '';
            $line = '';
            foreach ($aLine_bb as $bbline)
            {
                if (strstr($bbline, PREFIX)) {


                    $aAtt = explode(":", $bbline);
                    $key = $aAtt[0];

                    $css_val = isset($aAtt[1]) ? $aAtt[1] : '';
                    if (array_key_exists($key, $exp)) {

                        $line .= $exp[$key];
                        if ($css_val) {
                            $reg = '/{a}/';
                            $line = preg_replace($reg, $css_val, $line);
                            $line.=$seperator;
                        }
                    }
                }
                else if ($bbline) {
                    $line.=trim($bbline) . ';';
                }
            }
        }



        $file[$index] = $line;
    }
}

function remove_css_comments($line, &$insideComment) {

    //the order of the things are importent!!!
//remove comments that stays in one line
    if (!$insideComment) {
        $line = preg_replace('/\/\*.*\*\//', '', $line);
    }
    //the end of comment the so clear it 
    if (strstr($line, '*/')) {
        $insideComment = FALSE;
        $line = preg_replace('/.*\*\//', '', $line);
    }
//if halt then we are in the comment so keet delete it 
    if ($insideComment) {
        $line = '';
    }
    //finds the start of the comment and start delete
    if (strstr($line, '/*')) {
        $insideComment = true;
        $line = preg_replace('/\/\*.*/', '', $line);
    }

    return $line;
}

function get_user_bb($filename, &$exp) {
    if(file_exists($filename)){
   $userFile=json_decode(file_get_contents($filename), true);
    foreach ($userFile as $key => $value) {
    $userFile2[PREFIX.$key]=$value;
}
    $exp=array_merge($exp,$userFile2);
    }else{
        echo "file not found: $filename";
    }
}
?>
