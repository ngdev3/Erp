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
                                        <div class="col-md-12">
                                            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                                <a href="<?= base_url() ?>admin/user" id="back-btn" class="btn cur-p btn-primary pull-right">Back</a>
                                                <br><br>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th class="table_bg" scope="col">User Name</th>
                                                            <td><?php echo $result->first_name.' '.$result->last_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Email Id</th>
                                                            <td><?php echo $result->email; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Mobile Number</th>
                                                            <td><?php echo $result->mobile_no; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">PAN Number</th>
                                                            <td><?php echo $result->pan_number; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Aadhar Number</th>
                                                            <td><?php echo $result->aadhar_number; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Designation</th>
                                                            <td><?php echo $result->designation; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Address</th>
                                                            <td><?php echo $result->address; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="row">Status</th>
                                                            <td><?php echo $result->status; ?></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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