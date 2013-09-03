<?

include("inc/function.incl.php");

$key = crypt_encrypt(10, key_gen());

$errorMsg = '';

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 5//EN"
    "http://www.w3.org/TR/html4/strict.dtd"
    >
<html lang="en">
<head>
    <title><!-- Insert your title here --></title>
</head>
<body>
<?
if (isset($_POST['submit'])) {
    
    $keyWrite = $_POST['keyWrite'];
    $keyCheck = $_POST['keyCheck'];
    
    $keyCheck = crypt_decrypt(10, $keyCheck);
    
    if ($keyWrite == $keyCheck) {
        echo ("Correct");
    } else {
        echo("Wrong");
    }
    
} else {

?>
    <form action="" method="post">
        <img src="images/captcha.php?key=<?=$key?>" />
        <input type="hidden" name="keyCheck" value="<?=$key?>" />
        <input type="text" name="keyWrite" value="" />
        <input type="submit" name="submit" value="check" />
    </form>
<? } ?>
</body>
</html>
