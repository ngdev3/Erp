<div class="">
    <a class="padding-5" href="<?php echo base_url(); ?>master/tax_slab/view/<?= ID_encode($row['id']) ?>"><i class='fa fa-eye text-info'> </i> </a> </a>
    <a class="padding-5" href="<?php echo base_url(); ?>master/tax_slab/edit/<?= ID_encode($row['id']) ?>"><i class="fa fa-edit text-success"></i></a>

    <?php
    if ($row['status'] != 'Delete') { ?>
        <a href="javascript:void(0);" class="padding-5 text-warning" id="getData_<?php echo $row['id'] ?>" data-value="<?php echo $row['tax_slab_name'] ?>" title="delete" onclick="delete_data(<?php echo $row['id'] ?>);"><i class="fa fa-trash"></i></a>
    <?php }else{ ?>
        <a href="javascript:void(0);" class="padding-5 text-primary" id="getData_<?php echo $row['id'] ?>" data-value="<?php echo $row['tax_slab_name'] ?>" title="delete" onclick="restore_data(<?php echo $row['id'] ?>);"><i class="fa fa-history"></i></a>
        <?php }?>
</div>