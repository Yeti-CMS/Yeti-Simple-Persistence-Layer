<?php

    // Change this password to secure your site
    $password = "simplePassword1";
    
    // POST Request
    $pass = $_POST['password'];
    $path = $_POST['path'];
    $data = $_POST['data'];
    
    // Early return if our password doesn't match
    if ($pass != $password) {
        exit;
    }

    // remove any occurrence of ../ (basic security mechanism)
    $path = explode('../', $path);
    $path = implode('', $path);
    
    // Add . to the beginning of the path
    $path = "." . $path;
    
    // Checks to ensure we can write to this file
    if (file_exists($path."index.html")) {
        $path .= "index.html";
    } else if (file_exists($path."index.htm")) {
        $path .= "index.htm";
    }

    // Get the <head>!
    $d = new DOMDocument;
    $mock = new DOMDocument;
    $d->loadHTML(file_get_contents($path));
    $head = $d->getElementsByTagName('head')->item(0);
    foreach ($head->childNodes as $child) {
        $mock->appendChild($mock->importNode($child, true));
    }
        
    $headContents = $mock->saveHTML();
        
    // Write that file!
    $data = str_replace('\r', "\r", $data);
    $data = str_replace('\n', "\n", $data);
    $data = str_replace('[EndOfLine]', "\r\n", $data);
    $data = stripslashes($data);
        
    $data2 = "<html>\n<head>\n" . $headContents . "\n</head>\n<body>" . $data . "\n</body>\n</html>\n";
        
    $data = $data2;
        
    file_put_contents($path, $data);

?>
