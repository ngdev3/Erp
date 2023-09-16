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
                                                <label for="inputEmail4">Tax Slab Name*</label>
                                                <?php
                                                $name = @$result->tax_slab_name;
                                                $postvalue = @$_POST['tax_slab_name'];
                                                echo form_input(array('name' => 'tax_slab_name', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'tax_slab_name', 'placeholder' => 'Tax Slab Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('tax_slab_name'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">IGST*</label>
                                                <?php
                                                $name = @$result->igst;
                                                $postvalue = @$_POST['igst'];
                                                echo form_input(array('type' => 'number','min' => '0','step' => '0.01','max' => '1000','name' => 'igst', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'igst', 'placeholder' => 'IGST', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('igst'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">CGST*</label>
                                                <?php
                                                $name = @$result->cgst;
                                                $postvalue = @$_POST['cgst'];
                                                echo form_input(array('type' => 'number','min' => '0','step' => '0.01','max' => '1000','name' => 'cgst', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'cgst', 'placeholder' => 'CGST', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('cgst'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">SGST*</label>
                                                <?php
                                                $name = @$result->sgst;
                                                $postvalue = @$_POST['sgst'];
                                                echo form_input(array('type' => 'number','min' => '0','step' => '0.01','max' => '1000','name' => 'sgst', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'sgst', 'placeholder' => 'SGST', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('sgst'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">CESS*</label>
                                                <?php
                                                $name = @$result->cess;
                                                $postvalue = @$_POST['cess'];
                                                echo form_input(array('type' => 'number','min' => '0','step' => '0.01','max' => '1000','name' => 'cess', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'cess', 'placeholder' => 'CESS', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('cess'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="calculated_tax_on_mrp">Calculated Tax On MRP*</label>
                                                <select  class="form-control" name="calculated_tax_on_mrp">
                                                    <?php
                                                    if (@$result->calculated_tax_on_mrp == $val->calculated_tax_on_mrp) {} ?>
                                                    <option value="Yes" <?php if (@$result->calculated_tax_on_mrp == 'Yes') {echo 'selected="selected"';} ?>>Yes</option>
                                                    <option value="No" <?php if (@$result->calculated_tax_on_mrp == 'No') {echo 'selected="selected"';} ?>>No</option>
                                                </select>
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
                                                    <button type="submit" class="btn btn-success"> Submit </button>
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
                tax_slab_name: {
                    required: true,
                },
                igst: {
                    required: true,
                },
                sgst: {
                    required: true,
                },
                cgst: {
                    required: true,
                },
                cess: {
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
                tax_slab_name: {
                    required: '<div style="color:red">Tax Slab name field is required.</div>',
                },
                igst: {
                    required: '<div style="color:red">IGST name field is required.</div>',
                },
                sgst: {
                    required: '<div style="color:red">SGST name field is required.</div>',
                },
                cgst: {
                    required: '<div style="color:red">CGST name field is required.</div>',
                },
                cess: {
                    required: '<div style="color:red">CESS name field is required.</div>',
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