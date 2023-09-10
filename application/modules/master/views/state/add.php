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
                                    <h6>Note: State Name Should be Unique</h6>
                                    <hr>
                                    <div class="m-3-percentage">
                                        <?php echo form_open_multipart('', array('id' => 'stateFormValidationID',)); ?>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">State Name*</label>
                                                <?php
                                                $name = @$result->name;
                                                $postvalue = @$_POST['add_name'];
                                                echo form_input(array('name' => 'add_name', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'State Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('add_name'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="state_status">Status*</label>
                                                <select id="inputState2" class="form-control" name="status">
                                                    <?php
                                                    if (@$result->status == $val->status) {
                                                        
                                                    } ?>
                                                    <option value="Active" <?php if (@$result->status == 'Active') {
                                                                                echo 'selected="selected"';
                                                                            } ?>>Active</option>
                                                    <option value="Inactive" <?php if (@$result->status == 'Inactive') {
                                                                                    echo 'selected="selected"';
                                                                                } ?>>Inactive</option>
                                                    <option value="Delete" <?php if (@$result->status == 'Delete') {
                                                                                    echo 'selected="selected"';
                                                                                } ?>>Delete</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="checkbox checkbox-circle checkbox-info peers ai-c text-center">
                                                <div class="peer">
                                                    <button type="submit" class="btn btn-success"> Submit </button>
                                                    <a href="<?php echo base_url('master/state/'); ?>"><button type="button" class="btn btn-danger"> Cancel </button></a>
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
                add_name: {
                    required: true,
                }
            },
            messages: {
                add_name: {
                    required: '<div style="color:red">State name field is required.</div>',
                }
            }
        });
    });
</script>