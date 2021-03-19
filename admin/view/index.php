<div id="main-kunkey"></div>

<script type="text/javascript">
$(document).ready(function() {
reload_analytic();
});
function reload_analytic() {
    $('#loading-page').show();
                $.ajax({url: '/admin/view/analytic/main_analytic.php',
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        token: '<?php echo $user['token'];?>'
                    }
                }).done(function(res) {
    $('#main-kunkey').html(res);
    $('#loading-page').fadeOut();
                });
}
</script>