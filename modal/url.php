<?php 
function UrlCall($url,$alert=NULL)
{ 
    if(empty($alert) && $alert ==NULL){ ?>
        <script>
            document.location = "<?= $url;?>";
        </script>
    <?php } else{ ?>
        <script>
            alert('<?= $alert;?>');
            document.location = "<?= $url;?>";
        </script>
<?php } }?>