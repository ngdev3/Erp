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
                                        <div class="col-md-12">
                                            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                                <a href="<?= base_url() ?>master/center" id="back-btn" class="btn cur-p btn-primary pull-right">Back</a>
                                                <br><br>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Center Name</th>
                                                            <td><?php echo ($result->center_name); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Incharge Name</th>
                                                            <td><?php echo ucfirst($result->incharge_name); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Incharge Mobile No</th>
                                                            <td><?php echo ucfirst($result->incharge_mobile_no); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Incharge Location</th>
                                                            <td><?php echo ucfirst($result->incharge_location); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Crop Name</th>
                                                            <td><?php echo ucfirst($result->crop_name); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Center Target</th>
                                                            <td><?php echo ucfirst($result->target); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Financial Year</th>
                                                            <td><?php echo ucfirst($result->financial_year); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="row">Status</th>
                                                            <td><?php echo $result->status; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="row">Added By</th>
                                                            <td class="text-primary"><?php $user_data = get_users_data($result->user_id); echo $user_data->first_name.' '.$user_data->last_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="row">Added Date</th>
                                                            <td><?php echo ($result->added_date); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="row">Updated Date</th>
                                                            <td><?php echo ($result->updated_date); ?></td>
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