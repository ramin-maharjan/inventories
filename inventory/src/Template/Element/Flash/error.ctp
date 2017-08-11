
<?php /*?>
<div class="message error" onclick="this.classList.add('hidden');"><?= h($message) ?></div>
<?php */?>

<div class="msg-unsuccess"  id="response-message-data">
                                <?= h($message) ?>
                                <div class="pull-right">
                                    <a href="#" onclick="$(this).parents('.msg-unsuccess').hide()">X</a>
                                </div>

</div>
