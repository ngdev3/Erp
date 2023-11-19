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
                                    <h6>Note: Party Type Name Should be Unique</h6>
                                    <hr>
                                    <div class="m-3-percentage">
                                        <div class="col-md-12">
                                            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                                <a href="<?= base_url() ?>master/party_type" id="back-btn" class="btn cur-p btn-primary pull-right">Back</a>
                                                <br><br>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Party Type Name</th>
                                                            <td><?php echo $result->party_name; ?></td>
                                                        </tr>
                                                       
                                                        <tr>
                                                            <th class="table_bg" scope="col">Updated Date</th>
                                                            <td><?php echo $result->updated_date; ?></td>
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