<?php
if (!empty($msg)) {
    echo "<h2>$msg</h2>";
}
?>

<div id="sender">

    <h2>Изпратете email</h2>

    <form method="POST" action="function.php">
        <div id="name">
            <label for="name"><input type="text" placeholder="Име" name="name" id="name-name"></label>
        </div>
        <div id="email">
            <label for="email"><input type="email" placeholder="Email адрес" name="email" id="email-email"></label>
        </div>
        <div id="message">
            <label for="message"><textarea class="message" name="message" placeholder="Съобщение" id="message-message"
                                           rows="8" cols="20"></textarea></label>
        </div>
        <input type="submit" id="button" value="Изпрати">
    </form>
</div>
