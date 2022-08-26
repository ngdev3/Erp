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
                                    <h6>Note: User Name Should be Unique</h6>
                                    <hr>
                                    <div class="m-3-percentage">
                                        <?php echo form_open_multipart('', array('id' => 'stateFormValidationID',)); ?>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">City Name<span style="color:red">*</span></label>
                                                <?php
                                                $city_name = @$result->name;
                                                $postvalue = @$_POST['city_name'];
                                                echo form_input(array('name' => 'city_name', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'City Name', 'value' => !empty($postvalue) ? $postvalue : $city_name));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('city_name'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="state_status">State Type*</label>
                                                <select id="state" class="form-control" name="state">
                                                    <option value="" selected>Select State</option>
                                                    <?php if (!empty($state_list)) {
                                                        foreach ($state_list as $x => $y) { ?>
                                                        
                                                            <option value="<?php echo $y->id; ?>" <?php if($y->id==$result->state_id){echo "selected";} ?>><?php echo $y->name; ?></option>
                                                    <?php }
                                                    }; ?>

                                                </select>

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
                                                    <a href="<?php echo base_url('admin/user/'); ?>"><button type="button" class="btn btn-danger"> Cancel </button></a>
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
                city_name: {
                    required: true,
                },
                state: {
                    required: true,
                },
                status: {
                    required: true,
                },
            },
            messages: {
                city_name: {
                    required: '<div style="color:red">City Name field is required.</div>',
                },
                state: {
                    required: '<div style="color:red">State field is required.</div>',
                },
                status: {
                    required: '<div style="color:red">Status field is required.</div>',
                }
            }
        });
    });
</script>