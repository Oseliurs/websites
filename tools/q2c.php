<!DOCTYPE HTML>
<html>
<body style="background-color: rgb(225,225,225)">
    <form name="savefile" method="post" action="">
        <textarea rows="16" cols="100" name="textdata"></textarea><br/>
        <input type="submit" name="submitsave" value="Save Text to Server">
</form>
    <?php
    if (isset($_POST)){
        if ($_POST['submitsave'] == "Save Text to Server" ) {
            $text = $_POST["textdata"];
            $filename = date("d-m-Y_h-i-s");
            $ipath = "content/ifilepro/" . $filename . ".pro";
            $opath = "content/ofilecmake/" . $filename . ".txt";
            file_put_contents($ipath, $text);
            shell_exec("sudo python3 cmake/pro2cmake.py " . $ipath . " -o " . $opath);
            sleep(2);
            readfile($opath);
        }
    }
    ?>
</body>
</html>