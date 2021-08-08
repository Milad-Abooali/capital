<?php

?>

<?php
    try {
        $path = self::UI_PATH.'global/head.php';
        (file_exists($path))
            ? require_once $path
            : throw new Exception("<strong style='color: #ef661b'>$path</strong> is not exist.");
    } catch (Exception $e) {
        die($e->getMessage());
    }
?>

<?php
try {
    $path = self::UI_PATH.'global/sidebat.php';
    (file_exists($path))
        ? require_once $path
        : throw new Exception("<strong style='color: #ef661b'>$path</strong> is not exist.");
} catch (Exception $e) {
    die($e->getMessage());
}
?>

home.

<?php Mahan4\m::print($this->Page_DATA->test) ?>


<^^= $this->Page_DATA->test ^^>

<?php
    try {
        $path = self::UI_PATH.'global/footer.php';
        (file_exists($path))
            ? require_once $path
            : throw new Exception("<strong style='color: #ef661b'>$path</strong> is not exist.");
    } catch (Exception $e) {
        die($e->getMessage());
    }
?>
