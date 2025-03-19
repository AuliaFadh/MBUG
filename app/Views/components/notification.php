<?php 
$errors = session()->getFlashdata('errors');
$success = session()->getFlashdata('success');
?>

<?php if ($errors || $success) : ?>
    <div style="z-index:100;" class="toast-container toast-custom position-fixed top-0 end-0 p-3 show">
        <?php if ($errors) : 
            $errors = is_array($errors) ? $errors : [$errors];
            foreach ($errors as $error) : ?>
                <div class="toast align-items-center text-white bg-danger border-0 fade-toast" role="alert"
                aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?= esc($error) ?>
                        </div>
                        <button type="button" class="toast-btn-close-custom mx-2" onclick="closeToast(this)"
                        data-bs-dismiss="toast"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            <?php endforeach;
        endif; ?>

        <?php if ($success) : 
            $success = is_array($success) ? $success : [$success];
            foreach ($success as $msg) : ?>
                <div class="toast align-items-center text-white bg-success border-0 fade-toast" role="alert"
                aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?= esc($msg) ?>
                        </div>
                        <button type="button" class="toast-btn-close-custom mx-2" onclick="closeToast(this)"
                        data-bs-dismiss="toast"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            <?php endforeach;
        endif; ?>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        var toastEls = document.querySelectorAll('.fade-toast');
        toastEls.forEach(function(toastEl) {
            toastEl.classList.add('show-toast');
        });
    }, 500);
});

function closeToast(button) {
    var toastEl = button.closest('.toast');
    toastEl.classList.add('hide-toast');
    setTimeout(() => toastEl.remove(), 500);
}
</script>

<?php endif; ?>


