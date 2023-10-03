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
                                    <h6>Note: Tax Slab Name Should be Unique</h6>
                                    <hr>
                                    <div class="m-3-percentage">
                                        <?php echo form_open_multipart('', array('id' => 'TaxSlabFormValidationID',)); ?>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Center Name*</label>
                                                <?php
                                                $name = @$result->center_name;
                                                $postvalue = @$_POST['center_name'];
                                                echo form_input(array('name' => 'center_name', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'center_name', 'placeholder' => 'Center Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('center_name'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Incharge Name*</label>
                                                <?php
                                                $name = @$result->incharge_name;
                                                $postvalue = @$_POST['incharge_name'];
                                                echo form_input(array('type' => 'text','max' => '1000','name' => 'incharge_name', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'incharge_name', 'placeholder' => 'Incharge Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('incharge_name'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Incharge Mobile No*</label>
                                                <?php
                                                $name = @$result->incharge_mobile_no;
                                                $postvalue = @$_POST['incharge_mobile_no'];
                                                echo form_input(array('type' => 'number','max' => '1000','name' => 'incharge_mobile_no', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'incharge_mobile_no', 'placeholder' => 'Incharge Mobile No', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('incharge_mobile_no'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Incharge Location*</label>
                                                <?php
                                                $name = @$result->incharge_location;
                                                $postvalue = @$_POST['incharge_location'];
                                                echo form_input(array('type' => 'text','max' => '1000','name' => 'incharge_location', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'incharge_location', 'placeholder' => 'Incharge Location', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('incharge_location'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Target ( MT )*</label>
                                                <?php
                                                $name = @$result->target;
                                                $postvalue = @$_POST['target'];
                                                echo form_input(array('type' => 'number','max' => '1000','name' => 'target', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'target', 'placeholder' => 'Target', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('target'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Target ( MT )*</label>
                                                <?php
                                                $name = @$result->target;
                                                $postvalue = @$_POST['target'];
                                                echo form_input(array('type' => 'number','max' => '1000','name' => 'target', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'target', 'placeholder' => 'Target', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('target'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                       
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Remark*</label>
                                                <?php
                                                $name = @$result->remark;
                                                $postvalue = @$_POST['remark'];
                                                echo form_input(array('type' => 'text','max' => '1000','name' => 'target', 'maxlength' => '2590', 'class' => 'form-control', 'id' => 'target', 'placeholder' => 'Remark', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('remark'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Financial Year*</label>
                                                <select class="form-control" name="unit_id">
                                                    <option value="">Select Financial Year</option>
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
                                                <label for="zero_tax_type">Zero Tax Type*</label>
                                                <select  class="form-control" name="zero_tax_type">
                                                    <?php
                                                    if (@$result->zero_tax_type == $val->zero_tax_type) {} ?>
                                                    <option value="Yes" <?php if (@$result->zero_tax_type == 'Yes') {echo 'selected="selected"';} ?>>Yes</option>
                                                    <option value="No" <?php if (@$result->zero_tax_type == 'No') {echo 'selected="selected"';} ?>>No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="state_status">Status*</label>
                                                <select id="inputState2" class="form-control" name="status">
                                                    <?php
                                                    if (@$result->status == $val->status) {} ?>
                                                    <option value="Active" <?php if (@$result->status == 'Active') {echo 'selected="selected"';}?> >Active</option>
                                                    <option value="Inactive" <?php if (@$result->status == 'Inactive') {echo 'selected="selected"';} ?>>Inactive</option>
                                                    <option value="Delete" <?php if (@$result->status == 'Delete') {echo 'selected="selected"';} ?>>Delete</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="checkbox checkbox-circle checkbox-info peers ai-c text-center">
                                                <div class="peer">
                                                    <button type="submit" class="btn btn-suctarget"> Submit </button>
                                                    <a href="<?php echo base_url('master/tax_slab/'); ?>"><button type="button" class="btn btn-danger"> Cancel </button></a>
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
   
    var invalidChars = [
        "-",
        "+",
        "e",
    ];
    $(document).on('keypress', ':input[type="number"]', function(e) {
            if (invalidChars.includes(e.key)) {
                e.preventDefault();
            }
        });


    $(document).ready(function($) {
        $('#TaxSlabFormValidationID').validate({
            rules: {
                center_name: {
                    required: true,
                },
                incharge_name: {
                    required: true,
                },
                incharge_location: {
                    required: true,
                },
                incharge_mobile_no: {
                    required: true,
                },
                target: {
                    required: true,
                },
                calculated_tax_on_mrp: {
                    required: true,
                },
                zero_tax_type: {
                    required: true,
                },
            },
            messages: {
                center_name: {
                    required: '<div style="color:red">Tax Slab name field is required.</div>',
                },
                incharge_name: {
                    required: '<div style="color:red">incharge_name name field is required.</div>',
                },
                incharge_location: {
                    required: '<div style="color:red">incharge_location name field is required.</div>',
                },
                incharge_mobile_no: {
                    required: '<div style="color:red">incharge_mobile_no name field is required.</div>',
                },
                target: {
                    required: '<div style="color:red">target name field is required.</div>',
                },
                calculated_tax_on_mrp: {
                    required: '<div style="color:red">Calculated Tax On MRP name field is required.</div>',
                },
                zero_tax_type: {
                    required: '<div style="color:red">Zero Tax Type name field is required.</div>',
                }
            }
        });
    });
</script>