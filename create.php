<?php
//if message is send
if(!empty($_POST)) {
    $errors = '';

    //check name field
    if(empty($_POST['name']) ||
        (!empty($_POST['name']) && empty(trim($_POST['name'])))
    ) {
        $errors .= 'Please, fill your name!<br />';
        $name_error = true;
    }

    //check receiver field
    $receiver_values = ['sales', 'tech', 'support', 'hr'];
    //if is empty
    if(empty($_POST['receiver'])) {
        $receiver_error = true;
        $errors .= 'Please, choose receiver!<br />';
    }
    //if is not empty and array loop trough values and check they are real
    elseif(!empty($_POST['receiver']) && is_array($_POST['receiver'])) {
        $receiver_valid = true;
        foreach ($_POST['receiver'] as $receiver) {
            if(!in_array($receiver, $receiver_values)) {
                $receiver_error = true;
                $errors .= 'Some of the receiver is invalid!<br />';
            }
        }
    }
    //if is not empty and not array - error
    elseif(!empty($_POST['receiver']) && !is_array($_POST['receiver'])) {
        $errors .= 'Please, do not try to hack me!!! <br />';
        $receiver_error = true;
    }

    //if about is empty
    if(empty($_POST['about']) ||
        (!empty($_POST['about']) && empty(trim($_POST['about'])))
    ) {
        $errors .= 'Please, fill your about! <br />';
        $about_error = true;
    }

    //if message is empty
    if(empty($_POST['message']) ||
        (!empty($_POST['message']) && empty(trim($_POST['message'])))
    ) {
        $errors .= 'Please, fill your message!<br />';
        $message_error = true;
    }

    function filter_data($data) {
        return htmlentities(addslashes(htmlspecialchars($data)));
    }

    //if no errors filter data and save
    if(empty($errors)) {
        $name = filter_data($_POST['name']);
        $about = filter_data($_POST['about']);
        $message = filter_data($_POST['message']);
        $date = time();

        $sql = 'INSERT INTO messages (name, receiver, about, message, date) VALUES ';
        $count = count($_POST['receiver']);
        $i = 0;

        foreach ($_POST['receiver'] as $receiver) {
            $i++;
            $sql .= "('".$name."', '".$receiver."', '".$about."', '".$message."', '".$date."') ";
            if($count > 1 && $i < $count) {
                $sql .= ', ';
            }
        }

        if($conn->query($sql)) {
            $success = 'message send';
        }
        else {
            echo mysqli_error($conn);
        }
    }
}
?>
<h1 class="text-center">Sent a message</h1>
<form method="post" id="create">
    <?php
    if(!empty($errors)){
        echo '<p class="bg-danger text-center">'.$errors.'</p>';
    }
    elseif(!empty($success)) {
        echo '<p class="bg-success text-center">'.$success.'</p>';
    }
    ?>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="receiver">Receiver:</label>
        <select id="receiver" class="form-control" name="receiver[]" multiple>
            <option value="sales">Sales</option>
            <option value="tech">Technical support</option>
            <option value="support">Support</option>
            <option value="hr">HR</option>
        </select>
    </div>
    <div class="form-group">
        <label for="about">About:</label>
        <input type="text" name="about" id="about" class="form-control" />
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" class="form-control"></textarea>
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-lg btn-primary">Send</button>
    </div>
</form>
