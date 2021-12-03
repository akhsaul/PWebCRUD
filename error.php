<?php
require_once 'func_helper.php';
$location = $_GET['loc'];
$message = $_GET['msg'];
$title = $_GET['title'];
$msgToConsole = $_GET['toConsole'];
?>
<?php
require_once "assets/header.html"
?>
    <!-- Button trigger modal -->
    <button type="button" id="click" class="btn btn-primary visually-hidden" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">Launch
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <?php
                        echo $title
                        ?>
                    </h5>
                </div>
                <div class="modal-body">
                    <?php
                    echo $message;
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = () => {
        document.getElementById('click').click()
    }
    document.getElementById('close').addEventListener('click', () => {
        document.location = <?= $location ?>
    });
</script>
<?php
echoToConsole($msgToConsole);
?>
<?php
require_once "assets/footer.html"
?>