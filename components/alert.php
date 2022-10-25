<?php
if ($condition) { ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="20" height="20" role="img">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <strong>Sucesso!</strong> <?php echo $success_message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="20" height="20" role="img">
            <use xlink:href="#x-circle-fill" />
        </svg>
        <strong>Erro!</strong> <?php echo $error_message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php } ?>

<script>
    setTimeout(() => {
        bootstrap.Alert.getOrCreateInstance('.alert').close()
    }, 5000);
</script>