<?php /*?>
<div class="message success" onclick="this.classList.add('hidden')"><?= h($message) ?></div>
<?php */?>

<div class="msg-success" id="response-message-data">
                                <?= h($message) ?>
                                <div class="pull-right">
                                    <a href="#" onclick="$(this).parents('.msg-success').hide()">X</a>
                                </div>
</div>

<style>
        
    
    .msg-success{background-color:#dbf6ff;padding:15px 15px;margin-bottom:10px;color:#00a0d4;font-size: 20px;}
.msg-unsuccess{background-color:#ffe4e0;padding:15px 15px;color:#d6503e;margin-bottom:10px;font-size: 20px;}
    
    
    </style>
