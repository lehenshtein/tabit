<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

if (function_exists('user_submitted_posts')) user_submitted_posts();


$host = "localhost";
$user = "w98002v4_wp1";
$password = "q5732973l";
$db_name = "w98002v4_wp1";
    


$connect = mysql_connect($host,$user,$password) or die (mysql_error());

mysql_select_db($db_name,$connect) or die (mysql_error());
//@mysql_select_db($db_name);

$result = mysql_query('SELECT * FROM `wp_posts`');
while($row = mysql_fetch_array($result))
{
echo '<p>Запись id='.$row['post_title'].'. Текст: '.$row['post_content'].'</p>';// выводим данные
}
if($result) {
    echo "Данные получены";
} else {
    echo "Данные не получены";
}
 mysql_close($connect);

?>
<?php
//Если переменная Name передана
if (isset($_POST["Name"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysql_query("INSERT INTO `wp_posts` (`post_content`, `post_title`,`post_status`, `post_author`) 
                        VALUES ('".$_POST['Name']."','".$_POST['Price']."','".$_POST['Status']."','".$_POST['Author']."')");
    //Если вставка прошла успешно
    if ($sql) {
        echo "<p>Данные успешно добавлены в таблицу.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}

?>

<table>
<form action="" method="post">
    <tr>
        <td>статус:</td>
        <td><input type="text" name="Status" value="publish"></td>
    </tr>
     <tr>
        <td>Автор:</td>
        <td><input type="text" name="Author" value="4"></td>
    </tr>
     <tr>
        <td>Категория:</td>
        <td><input type="text" name="Category" value="array(1)"></td>
    </tr>
    <tr>
        <td>Наименование:</td>
        <td><input type="text" name="Name"></td>
    </tr>
    <tr>
        <td>Цена:</td>
        <td><input type="text" name="Price" size="3"> руб.</td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
    </tr>
</form>
</table>

<?php
 