<?php

$fname = "../sql/content.sql";

function contentGenreGen($genreName, $genre, $count){
    $c = [
        "INSERT INTO Books VALUES(null",
        "Author-",
        "Title-",
        "Short description ",
        "Full description ",
        $genre,
        "img/content/preview/example.jpg",
        "img/content/full/example.jpg"
    ];
    global $fname;
    $file = fopen($fname, "a");

    for($i = 0; $i < $count; ++$i){
        $discount = rand(0, 1) ? rand(10, 99) : 0;
        $str = $c[0] . ', "'  . $c[1] . $i . '", "' . $c[2] . rand(1, 500) . " $genreName". '", "' . $c[3] . rand(10, 10000) . '", "';
        $str .= $c[4] . '", ' . rand(1, 75) . ', ' . rand(1, 400) . ', ' . $discount . ', ' . $c[5] . ', "' . $c[6] . '", "' . $c[7] . '");';
        fwrite($file, "$str\n");
    }
    fclose($file);
}

function contentAddCategory($file, $count, $name){
    $file = fopen($file, "a");
    for($i = 1; $i < $count; ++$i){
        if(rand(0, 1) == 1){
            $str = "INSERT INTO $name VALUES(null, $i);";
            fwrite($file, $str . "\n");
        }
    }
    fclose($file);
}

function contentProducts($file, $num_books){
    $file = fopen($file, "a");
    for($i = 1; $i < $num_books; ++$i) {
        $str = "INSERT INTO Products VALUES(null, $i, 'Product intormation $i', 'Other details $i');";
        fwrite($file, $str . "\n");
    }
    fclose($file);
}

function commentsGen($file, $num_books){
    $file = fopen($file, "a");
    for($i = 1; $i < $num_books; ++$i) {
        for($k = 0; $k < 1; ++$k) {
            $str = "INSERT INTO Comments VALUES(null, $i, 'Username$i', 'e$i@mail.address', 'I like the book. $i');";
            fwrite($file, $str . "\n");
        }
    }
    fclose($file);
}

function contentGen(){
    $genres = [
        //["GenreName", GenreId, Count]
        ["Computers",   1, 33],
        ["Cooking",     2, 43],
        ["Education",   3, 73],
        ["Fiction",     4, 13],
        ["Health",      5, 23],
        ["Mathematics", 6, 23],
        ["Medical",     7, 41],
        ["Reference",   8, 3],
        ["Science",     9, 16],

        ["Children",        10, 13],
        ["Science Fiction", 11, 17],
        ["Fantasy",         12, 19],
        ["Mystery",         13, 11],
        ["Romance",         14, 24],
        ["Horror",          15, 3],
        ["Poetry",          16, 2],
        ["Literature",      17, 9],
        ["Crime",           18, 12],
        ["Comic",           19, 4],
        ["Psychology",      20, 5],
        ["Art",             21, 2],
        ["Photography",     22, 14],
        ["Law",             23, 16],
        ["History",         24, 17],
        ["Business",        25, 18],
        ["Baby",            26, 11],
        ["Sex",             27, 9],
        ["Travel",          28, 7],
        ["Sports",          29, 4],

        ["General",         30,32],
        ["Diaries, Letters & Journals",     31, 17],
        ["Memoirs",                         32, 4],
        ["True Stories",                    33, 1],
        ["Generic Exams",                   34, 4],
        ["GK Titles",                       35, 3],
        ["Medical Entrance",                36, 1],
        ["Other Entrance Exams",            37, 4],
        ["PG Entrance Examinations",        38, 3],
        ["Self-help Titles",                39, 4],
        ["Sociology",                       40, 7],

        ["Academic and Reference",          41, 1],
        ["Business Trade",                  42, 2],
        ["Engineering and Computer Science",43, 4],
        ["Humanities, Social Sciences and Languages",44, 2],
        ["Introduction to Computers",       45, 8],
        ["Science and Maths",               46, 5],
        ["Trade Business",                  47, 2],
        ["English Language & Literature",   48, 1],
        ["English Language Teaching",       49, 4],
        ["Environment Awareness",           50, 5],
        ["Environment Protection",          51, 7],

        ["Earth Sciences",                  52, 8],
        ["Geography",                       53, 1],
        ["The Environment",                 54, 4],
        ["Regional & Area Planning",        55, 5],
        ["Fantasy",                         56, 3],
        ["Gay",                             57, 0],
        ["Humorous",                        58, 2],
        ["Interactive",                     59, 4],
        ["Legal",                           60, 7],
        ["Lesbian",                         61, 0],
        ["Men'S Adventure",                 62, 5],
        ["Movie Or Television Tie-In",      63, 3],
        ["Mystery & Detective",             64, 3],
        ["Political",                       65, 1],

        ["Algebra",                         66, 8],
        ["Differential Equations",          67, 2],
        ["Discrete Mathematics",            68, 9],
        ["Fourier Analysis",                69, 4],
        ["Numerical Analysis",              70, 2],
        ["Probability",                     71, 4],
        ["Statistical Methods/data Analysis",72, 4],
        ["Stochastic And Random Processes", 73, 8],
        ["Topology",                        74, 5],
        ["Statistics",                      75, 13],
        ["Statistical Methods",             76, 6]
    ];
    foreach($genres as $value) contentGenreGen($value[0], $value[1], $value[2]);

    global $fname;
    for($i = 0, $count = 0; $i < count($genres); ++$i) $count += $genres[$i][2];
    // bestsellers
    contentAddCategory($fname, $count, "bestsellers");
    // newarrivals
    $newarrivals = rand($count/4, $count/2);
    contentAddCategory($fname, $newarrivals, "newarrivals");
    // usedbooks
    $usedbooks = rand($count/8, $count/4);
    contentAddCategory($fname, $usedbooks, "usedbooks");
    // specialoffers
    $specialoffers = rand($count/16, $count/8);
    contentAddCategory($fname, $specialoffers, "specialoffers");

    contentProducts($fname, $count);

    commentsGen($fname, $count);
    echo "done!";
}
contentGen();