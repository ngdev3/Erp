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
                                    <h6>Note: Party Type Should be Unique</h6>
                                    <hr>
                                    <div class="m-3-percentage">
                                        <?php echo form_open_multipart('', array('id' => 'stateFormValidationID',)); ?>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Party Type Name*</label>
                                                <?php
                                                $name = @$result->party_name;
                                                $postvalue = @$_POST['party_type_name'];
                                                echo form_input(array('name' => 'party_type_name', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'cate_id', 'placeholder' => 'Party Type Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('party_type_name'); ?></div>
                                                </label>
                                            </div>
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
                                                    <a href="<?php echo base_url('master/party_type/'); ?>"><button type="button" class="btn btn-danger"> Cancel </button></a>
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
                party_type_name: {
                    required: true,
                }
            },
            messages: {
                party_type_name: {
                    required: '<div style="color:red">Party Type name field is required.</div>',
                }
            }
        });
    });
</script>