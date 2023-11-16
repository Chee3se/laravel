<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP reminder</title>
</head>
<body>
    <h1>PHP reminder</h1>
    <h2>Defining variables and including them in text</h2>
    <p>
        Code: <br><br>
        <?php
        echo "
        \$txt = \"cheese-cake.onthewifi.com\";<br>
        echo \"I love \" . \$txt . \"!\";
        ";
        ?>
    </p>
    <p>
        Output: <br><br>
        <?php
        $txt = "cheese-cake.onthewifi.com";
        echo "I love " . $txt . "!";
        ?>
    </p>
    <h2>HTML elements in php</h2>
    <p>
        Code: <br><br>
        <?php
        echo "
        \$txt1 = \"Learn PHP\";<br>
        echo \"&lth4&gt\" . \$txt1 . \"&lt/h4&gt\";
        ";
        ?>
    </p>
    <p>
        Output: <br>
        <h4>Learn PHP</h4>
    </p>
    <h2>Foreach loop</h2>
    <p>
        Code: <br><br>
        <?php
        echo "
        \$age = array(\"Peter\"=>\"35\", \"Ben\"=>\"37\", \"Joe\"=>\"43\");
        <br>
        foreach(\$age as \$x => \$val) {<br>
        echo \"\$x = \$val&ltbr&gt\";<br>
        }
        "
        ?>
    </p>
    <p>
        Output: <br><br>
        <?php
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

        foreach($age as $x => $val) {
        echo "$x = $val<br>";
        }
        ?>
    </p>
</body>
</html>