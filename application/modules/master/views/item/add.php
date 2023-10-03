<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="masonry-item col-md-12">
                                <div class="bgc-white p-20 bd">
                                    <h6>Note: Item Name Should be Unique</h6>
                                    <hr>
                                    <div class="m-3-percentage">
                                        <?php echo form_open_multipart('', array('id' => 'stateFormValidationID',)); ?>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Item Name*</label>
                                                <?php
                                                $name = @$result->item_name;
                                                $postvalue = @$_POST['item_name'];
                                                echo form_input(array('name' => 'item_name', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Item Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('item_name'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">HSN Code*</label>
                                                <?php
                                                $name = @$result->hsn_code;
                                                $postvalue = @$_POST['hsn_code'];
                                                echo form_input(array('name' => 'hsn_code', 'maxlength' => '25', 'class' => 'form-control',  'placeholder' => 'HSN Code', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('hsn_code'); ?></div>
                                                </label>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">GST Slab*</label>
                                                <select class="form-control" name="gst_slab_id">
                                                    <option value="">Select GST Slab</option>
                                                    <?php if (!empty($gstslabs)) {
                                                        foreach ($gstslabs as $key => $val) {
                                                            ?>
                                                            <option value="<?= $val->id ?>"
                                                            <?php if (@$val->id ==  @$result->gst_slab_id) {echo 'selected="selected"';} ?>><?= $val->tax_slab_name ?></option>
                                                                            
                                                    <?php }
                                                    }; ?>
                                                </select>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('gst_slab_id'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Unit Name*</label>
                                                <select class="form-control" name="unit_id">
                                                    <option value="">Select Unit Type</option>
                                                    <?php if (!empty($getUnitType)) {
                                                        foreach ($getUnitType as $key => $val) {
                                                            ?>
                                                            <option value="<?= $val->id ?>"
                                                            <?php if (@$val->id ==  @$result->unit_id) {echo 'selected="selected"';} ?>><?= $val->unit_name ?></option>
                                                                            
                                                    <?php }
                                                    }; ?>
                                                </select>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('unit_id'); ?></div>
                                                </label>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Bharti*</label>
                                                <?php
                                                $name = @$result->bharti;
                                                $postvalue = @$_POST['bharti'];
                                                echo form_input(array('name' => 'bharti', 'maxlength' => '25', 'class' => 'form-control',  'placeholder' => 'Bharti', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('bharti'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Short Name*</label>
                                                <?php
                                                $name = @$result->short_name;
                                                $postvalue = @$_POST['short_name'];
                                                echo form_input(array('name' => 'short_name', 'maxlength' => '25', 'class' => 'form-control',  'placeholder' => 'Short Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('short_name'); ?></div>
                                                </label>
                                            </div>

                                        </div>


                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="state_status">Status*</label>
                                                <select id="inputState2" class="form-control" name="status">
                                                    <?php
                                                    if (@$result->status == $val->status) {
                                                        $selected = 'selected="selected"';
                                                    } ?>
                                                    <option value="Active" <?php if (@$result->status == 'Active') {
                                                                                echo 'selected="selected"';
                                                                            } ?>>Active</option>
                                                    <option value="Inactive" <?php if (@$result->status == 'Inactive') {
                                                                                    echo 'selected="selected"';
                                                                                } ?>>Inactive</option>

                                                </select>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="checkbox checkbox-circle checkbox-info peers ai-c text-center">
                                                <div class="peer">
                                                    <button type="submit" class="btn btn-success"> Submit </button>
                                                    <a href="<?php echo base_url('master/item/'); ?>"><button type="button" class="btn btn-danger"> Cancel </button></a>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function($) {
        $('#stateFormValidationID').validate({
            rules: {
                item_name: {
                    required: true,
                },
                hsn_code: {
                    required: true,
                },
                gst_slab_id: {
                    required: true,
                },
                unit_name: {
                    required: true,
                },
                bharti: {
                    required: true,
                },
                short_name: {
                    required: true,
                },
            },
            messages: {
                item_name: {
                    required: '<div style="color:red">Item name field is required.</div>',
                },
                hsn_code: {
                    required: '<div style="color:red">HSN Code field is required.</div>',
                },
                gst_slab_id: {
                    required: '<div style="color:red">GST Slab field is required.</div>',
                },
                unit_name: {
                    required: '<div style="color:red">Unit name field is required.</div>',
                },
                bharti: {
                    required: '<div style="color:red">Bharti name field is required.</div>',
                },
                short_name: {
                    required: '<div style="color:red">Short name field is required.</div>',
                },
            }
        });
    });
</script>