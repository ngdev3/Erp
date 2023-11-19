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
                                    <h6>Note: Center Name Should be Unique</h6>
                                    <hr>
                                    <div class="m-3-percentage">
                                        <?php echo form_open_multipart('', array('id' => 'TaxSlabFormValidationID',)); ?>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Center Name*</label>
                                                <?php
                                                $name = @$result->center_name;
                                                $postvalue = @$_POST['center_name'];
                                                echo form_input(array('name' => 'center_name', 'class' => 'form-control', 'id' => 'center_name', 'placeholder' => 'Center Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
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
                                                echo form_input(array('type' => 'text','name' => 'incharge_name', 'class' => 'form-control', 'id' => 'incharge_name', 'placeholder' => 'Incharge Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
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
                                                echo form_input(array('type' => 'number','name' => 'incharge_mobile_no', 'class' => 'form-control', 'id' => 'incharge_mobile_no', 'placeholder' => 'Incharge Mobile No', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('incharge_mobile_no'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Incharge Center Location*</label>
                                                <?php
                                                $name = @$result->incharge_location;
                                                $postvalue = @$_POST['incharge_location'];
                                                echo form_input(array('type' => 'text','name' => 'incharge_location', 'class' => 'form-control', 'id' => 'incharge_location', 'placeholder' => 'Incharge Location', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('incharge_location'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Center Target ( MT )*</label>
                                                <?php
                                                $name = @$result->target;
                                                $postvalue = @$_POST['target'];
                                                echo form_input(array('type' => 'number','name' => 'target', 'class' => 'form-control', 'id' => 'target', 'placeholder' => 'Target', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('target'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Center Financial Year*</label>
                                                <select class="form-control" name="financial_year_id">
                                                    <option value="">Select Financial Year</option>
                                                    <?php if (!empty($gstFY)) {
                                                        foreach ($gstFY as $key => $val) {
                                                            ?>
                                                            <option value="<?= $val->id ?>"
                                                            <?php if (@$val->id ==  @$result->financial_year_id) {echo 'selected="selected"';} ?>><?= $val->financial_year ?></option>
                                                                            
                                                    <?php }
                                                    }; ?>
                                                </select>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('financial_year_id'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                       
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Center Crop Type*</label>
                                                <select class="form-control" name="crop_type_id">
                                                    <option value="">Select Crop Type</option>
                                                    <?php if (!empty($getCrop)) {
                                                        foreach ($getCrop as $key => $val) {
                                                            ?>
                                                            <option value="<?= $val->id ?>"
                                                            <?php if (@$val->id ==  @$result->crop_type_id) {echo 'selected="selected"';} ?>><?= $val->crop_name ?></option>
                                                                            
                                                    <?php }
                                                    }; ?>
                                                </select>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('crop_type_id'); ?></div>
                                                </label>
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
                                                    <button type="submit" class="btn btn-success"> Submit </button>
                                                    <a href="<?php echo base_url('master/center/'); ?>"><button type="button" class="btn btn-danger"> Cancel </button></a>
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
                financial_year_id: {
                    required: true,
                },
                target: {
                    required: true,
                },
                crop_type_id: {
                    required: true,
                }
            },
            messages: {
                center_name: {
                    required: '<div style="color:red">Center Name name field is required.</div>',
                },
                incharge_name: {
                    required: '<div style="color:red">Incharge Name field is required.</div>',
                },
                incharge_location: {
                    required: '<div style="color:red">Incharge Location field is required.</div>',
                },
                incharge_mobile_no: {
                    required: '<div style="color:red">Incharge Mobile No field is required.</div>',
                },
                financial_year_id: {
                    required: '<div style="color:red">Financial Year name field is required.</div>',
                },
                target: {
                    required: '<div style="color:red">Target ( MT ) field is required.</div>',
                },
                crop_type_id: {
                    required: '<div style="color:red">Crop Type field is required.</div>',
                }
            }
        });
    });
</script>