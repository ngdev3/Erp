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
                                    <h6>Note: Tax Slab Should be Unique</h6>
                                    <hr>
                                    <div class="m-3-percentage">
                                        <div class="col-md-12">
                                            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                                <a href="<?= base_url() ?>master/tax_slab" id="back-btn" class="btn cur-p btn-primary pull-right">Back</a>
                                                <br><br>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Tax Slab Name</th>
                                                            <td><?php echo ucfirst($result->tax_slab_name); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">IGST</th>
                                                            <td><?php echo ucfirst($result->igst); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">SGST</th>
                                                            <td><?php echo ucfirst($result->sgst); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">CGST</th>
                                                            <td><?php echo ucfirst($result->cgst); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">CESS</th>
                                                            <td><?php echo ucfirst($result->cess); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Calclated Tax On MRP</th>
                                                            <td><?php echo ucfirst($result->calculated_tax_on_mrp); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_bg" scope="col">Zero Tax Type</th>
                                                            <td><?php echo ucfirst($result->zero_tax_type); ?></td>
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