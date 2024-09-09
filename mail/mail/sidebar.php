<?php include 'connection.php' ?>

<div class="col-md-3">
    <h2 class="grid-title"><i class="fa fa-inbox"></i> <?php if(str_contains($_SERVER['REQUEST_URI'], 'inbox')) { echo 'Inbox'; } else { echo 'Sent'; } ?></h2>
    <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;NEW MESSAGE</a>

    <hr>

    <div>
        <ul class="nav nav-pills nav-stacked">
            <li class="header">Folders</li>
            <li <?php if(str_contains($_SERVER['REQUEST_URI'], 'inbox')) { ?> class="active" <?php } ?> >
            <a href="<?php echo 'inbox.php' ?>"><i class="fa fa-inbox"></i> Inbox (

            <?php
            $loginUserEmail = 'nourelhoudaassiddeki@gmail.com';
            $sql = "SELECT * from mails where mail_to = '$loginUserEmail' ";
            $result = mysqli_query($conn, $sql);
            $inboxCount = mysqli_num_rows($result);
            echo $inboxCount;
            ?>

            )</a></li>
            <li <?php if(str_contains($_SERVER['REQUEST_URI'], 'sent')) { ?> class="active" <?php } ?>
            ><a href="<?php echo 'sent.php'  ?>"><i class="fa fa-mail-forward"></i> Sent ( 

            <?php
            $loginUserEmail = 'nourelhoudaassiddeki@gmail.com';
            $sql = "SELECT * from mails where mail_from = '$loginUserEmail' ";
            $result = mysqli_query($conn, $sql);
            $inboxCount = mysqli_num_rows($result);
            echo $inboxCount;
            ?>

            )</a></li>
        </ul>
    </div>
</div>