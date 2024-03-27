<?php
$style = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $color = $_POST['color'];
    $size = $_POST['size'];
    $fontStyle = isset($_POST['fontStyle']) ? $_POST['fontStyle'] : [];

    $style = "color: $color; font-size: $size;";
    if (in_array('bold', $fontStyle)) {
        $style .= " font-weight: bold;";
    }
    if (in_array('italic', $fontStyle)) {
        $style .= " font-style: italic;";
    }
}
?>

    <form method="post">
        Color:
        <input type="radio" name="color" value="red" required> Red
        <input type="radio" name="color" value="green"> Green
        <input type="radio" name="color" value="blue"> Blue
        <br>
        Size:
        <select name="size" required>
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
        </select>
        <br>
        Font style:
        <input type="checkbox" name="fontStyle[]" value="bold"> Bold
        <input type="checkbox" name="fontStyle[]" value="italic"> Italic
        <br>
        <input type="submit" value="Submit">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p style=\"$style\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>";
}
?>