<?php
$coyote_edge_sidebar = coyote_edge_get_sidebar();
?>
<div class="edgtf-column-inner">
    <aside class="edgtf-sidebar">
        <?php
            if (is_active_sidebar($coyote_edge_sidebar)) {
                dynamic_sidebar($coyote_edge_sidebar);
            }
        ?>
    </aside>
</div>
