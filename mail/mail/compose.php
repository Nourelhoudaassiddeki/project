<?php
include 'connection.php';
$sql = "SELECT * from users";
$result = mysqli_query($conn, $sql);
?>
<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-wrapper">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class="fa fa-envelope"></i> Compose New Message</h4>
                </div>
                <form method="post" id="composer-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control to">
                                <option>Select Option</option>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    ?>
                                <option value="<?php echo $email ?>"><?php echo $name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="subject" type="text" class="form-control subj" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="body" id="email_message" class="form-control body" placeholder="Message" style="height: 120px;"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="send" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                        <button id="send" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Send Message</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#send').click(function(e) {
            var to = $('.to').val();
            var subject = $('.subj').val();
            var body = $('.body').val();

            e.preventDefault();
            $('#send').prop('disabled', true);

             $.ajax({
            data: { to, subject, body},
            url: "action.php",
            type: "POST",
            success: function (response) {
                $('#send').prop('disabled', false);
                $('#composer-form').trigger("reset");
                $('#compose-modal').modal('hide');
                window.location.reload();
                Toastify({ text: 'Message Sent Successfully', duration: 3000,
                    style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
                }).showToast();
            },
            error: function (error) {
                $('#send').prop('disabled', false);
                Toastify({ text: 'Failed due to an error, Please refresh the Webpage', duration: 3000,
                    style: { background: "linear-gradient(to right, #C43D1C, #EA1E0E)" }
                }).showToast();
            }
        });
        })
    })
</script>