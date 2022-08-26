<div class="">
    <a class="padding-5" href="<?php echo base_url($DefaultRedirectionWithHypan); ?>/view/<?= ID_encode($row['city_id']) ?>"><i class='fa fa-eye text-info'> </i> </a> </a>
    <a class="padding-5" href="<?php echo base_url($DefaultRedirectionWithHypan); ?>/edit/<?= ID_encode($row['city_id']) ?>"><i class="fa fa-edit text-success"></i></a>

    <?php
    if ($row['city_status'] != 'Delete') { ?>
        <a href="javascript:void(0);" class="padding-5 text-warning" id="getData_<?php echo $row['city_id'] ?>" data-value="<?php echo $row['city_name'] ?>" title="delete" onclick="delete_data(<?php echo $row['city_id'] ?>);"><i class="fa fa-trash"></i></a>
    <?php }else{ ?>
        <a href="javascript:void(0);" class="padding-5 text-primary" id="getData_<?php echo $row['city_id'] ?>" data-value="<?php echo $row['city_name'] ?>" title="delete" onclick="restore_data(<?php echo $row['city_id'] ?>);"><i class="fa fa-history"></i></a>
        <?php }?>
</div>