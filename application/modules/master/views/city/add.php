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
<<<<<<< Updated upstream
                                                <label for="inputEmail4">First Name<span style="color:red">*</span></label>
                                                <?php
                                                $first_name = @$result->first_name;
                                                $postvalue = @$_POST['first_name'];
                                                echo form_input(array('name' => 'first_name', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'First Name', 'value' => !empty($postvalue) ? $postvalue : $first_name));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('first_name'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Last Name<span style="color:red">*</span></label>
                                                <?php
                                                $last_name = @$result->last_name;
                                                $postvalue = @$_POST['last_name'];
                                                echo form_input(array('name' => 'last_name', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'Last Name', 'value' => !empty($postvalue) ? $postvalue : $last_name));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('last_name'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Email Id<span style="color:red">*</span></label>
                                                <?php
                                                $email = @$result->email;
                                                $postvalue = @$_POST['email'];
                                                echo form_input(array('name' => 'email', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'Email ID', 'value' => !empty($postvalue) ? $postvalue : $email));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('email'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Mobile No<span style="color:red">*</span></label>
                                                <?php
                                                $mobile_no = @$result->mobile_no;
                                                $postvalue = @$_POST['mobile_no'];
                                                echo form_input(array('name' => 'mobile_no', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'Mobile Number', 'value' => !empty($postvalue) ? $postvalue : $mobile_no));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('mobile_no'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Password<span style="color:red">*</span></label>
                                                <?php
                                                $password = '';
                                                $postvalue = @$_POST['password'];
                                                echo form_input(array('name' => 'password', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'Password', 'value' => !empty($postvalue) ? $postvalue : $password));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('password'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Pan Number<span style="color:red">*</span></label>
                                                <?php
                                                $pan_number = @$result->pan_number;
                                                $postvalue = @$_POST['pan_number'];
                                                echo form_input(array('name' => 'pan_number', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'Pan Number', 'value' => !empty($postvalue) ? $postvalue : $pan_number));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('pan_number'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Aadhar Number<span style="color:red">*</span></label>
                                                <?php
                                                $aadhar_number = @$result->aadhar_number;
                                                $postvalue = @$_POST['aadhar_number'];
                                                echo form_input(array('name' => 'aadhar_number', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'Aadhar Number', 'value' => !empty($postvalue) ? $postvalue : $aadhar_number));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('aadhar_number'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Designation<span style="color:red">*</span></label>
                                                <?php
                                                $designation = @$result->designation;
                                                $postvalue = @$_POST['designation'];
                                                echo form_input(array('name' => 'designation', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'Designation', 'value' => !empty($postvalue) ? $postvalue : $designation));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('designation'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Address<span style="color:red">*</span></label>
                                                <?php
                                                $address = @$result->address;
                                                $postvalue = @$_POST['address'];
                                                echo form_input(array('name' => 'address', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'Address', 'value' => !empty($postvalue) ? $postvalue : $address));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('address'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Group Id<span style="color:red">*</span></label>
                                                <?php
                                                $group_id = @$result->group_id;
                                                $postvalue = @$_POST['group_id'];
                                                echo form_input(array('name' => 'group_id', 'maxlength' => '25', 'class' => 'form-control', 'placeholder' => 'Group Id', 'value' => !empty($postvalue) ? $postvalue : $group_id));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('group_id'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="state_status">User Type<span style="color:red">*</span></label>
                                                <select id="inputState2" class="form-control" name="user_type">
                                                    <option value=""> Select User Type</option>
                                                    <?php

                                                        $selected = 'selected="selected"';?>
                                                    <option value="2" <?php if (@$result->user_type == 2) {
                                                                            echo $selected;
                                                                        } ?>>Admin</option>
                                                    <option value="3" <?php if (@$result->user_type == 3) {
                                                                            echo $selected;
                                                                        } ?>>Accountant</option>
                                                    <option value="4" <?php if (@$result->user_type == 4) {
                                                                            echo $selected;
                                                                        } ?>>Support</option>
                                                    <option value="5" <?php if (@$result->user_type == 5) {
                                                                            echo $selected;
                                                                        } ?>>Manager</option>
=======
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
>>>>>>> Stashed changes

                                                </select>

                                            </div>
<<<<<<< Updated upstream
                                            <label class="error">
                                                <div class="help-block" style="color:red"> <?php echo form_error('user_type'); ?></div>
                                            </label>
                                            <div class="form-group col-md-6">
                                                <label for="state_status">Status<span style="color:red">*</span></label>
=======
                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="state_status">Status*</label>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                mobile_no: {
                    required: true,
                },
                password: {
                    required: true,
                },
                pan_number: {
                    required: true,
                },
                aadhar_number: {
                    required: true,
                },
                designation: {
                    required: true,
                },
                address: {
                    required: true,
                },
                group_id: {
                    required: true,
                },
                user_type: {
=======
                city_name: {
                    required: true,
                },
                state: {
                    required: true,
                },
                status: {
>>>>>>> Stashed changes
                    required: true,
                },
            },
            messages: {
<<<<<<< Updated upstream
                first_name: {
                    required: '<div style="color:red">First Name field is required.</div>',
                },
                last_name: {
                    required: '<div style="color:red">First Name field is required.</div>',
                },
                email: {
                    required: '<div style="color:red">Email field is required.</div>',
                    email: '<div style="color:red">Enter a valid email.</div>'
                },
                mobile_no: {
                    required: '<div style="color:red">Mobile Number field is required.</div>',
                },
                password: {
                    required: '<div style="color:red">Password field is required.</div>',
                },
                pan_number: {
                    required: '<div style="color:red">Pan Number field is required.</div>',
                },
                aadhar_number: {
                    required: '<div style="color:red">Aadhar number field is required.</div>',
                },
                designation: {
                    required: '<div style="color:red">Designation field is required.</div>',
                },
                address: {
                    required: '<div style="color:red">Address field is required.</div>',
                },
                group_id: {
                    required: '<div style="color:red">Group Id field is required.</div>',
                },
                user_type: {
                    required: '<div style="color:red">User Type field is required.</div>',
=======
                city_name: {
                    required: '<div style="color:red">City Name field is required.</div>',
                },
                state: {
                    required: '<div style="color:red">State field is required.</div>',
                },
                status: {
                    required: '<div style="color:red">Status field is required.</div>',
>>>>>>> Stashed changes
                }
            }
        });
    });
</script>