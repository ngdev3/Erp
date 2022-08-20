<?php

if (@$_GET['status'] != 'delete') { ?>
    <div class="">
        <a class="padding-5" href="<?php echo base_url(); ?>master/state/view/<?= ID_encode($row['id']) ?>"><i class='fa fa-eye text-info'> </i> </a> </a>
        <a class="padding-5" href="<?php echo base_url(); ?>master/state/edit/<?= ID_encode($row['id']) ?>"><i class="fa fa-edit text-success"></i></a>

        <a href="javascript:void(0);" class="padding-5 text-warning" title="delete" onclick="delete_state(<?php echo $row['id']; ?>);">
            <i class="fa fa-trash"></i>
        </a>
    </div>
<?php }
if (@$_GET['status'] == 'delete') {
    $restoreArr = array(
        'table' => 'fs_users',
        'col1' => 'status',
        'col2' => 'id',
        'value' => 'active',
        'id' => ID_decode($row),
    );
    $resA = htmlspecialchars(json_encode($restoreArr));
?>

<?php } ?>