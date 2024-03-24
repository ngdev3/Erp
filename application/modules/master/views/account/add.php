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
                                    <h6>Note: Account Creation Should be Unique</h6>
                                    <hr>
                                    <div class="m-3-percentage">
                                        <?php echo form_open_multipart('', array('id' => 'TaxSlabFormValidationID',)); ?>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">GST No</label>
                                                <?php
                                                $name = @$result->gst_no;
                                                $postvalue = @$_POST['gst_no'];
                                                echo form_input(array('name' => 'gst_no', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'gst_no', 'placeholder' => 'GST No', 'value' => !empty($postvalue) ? $postvalue : $name, 'onfocusout' => 'searchForGST(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('gst_no'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Account Name*</label>
                                                <?php
                                                $name = @$result->account_name;
                                                $postvalue = @$_POST['account_name'];
                                                echo form_input(array('type' => 'text','max' => '1000','name' => 'account_name', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'account_name', 'placeholder' => 'Account Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('account_name'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Print Name*</label>
                                                <?php
                                                $name = @$result->print_name;
                                                $postvalue = @$_POST['print_name'];
                                                echo form_input(array('type' => 'text','max' => '1000','name' => 'print_name', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'print_name', 'placeholder' => 'Print Name', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('print_name'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Incharge Location*</label>
                                                <?php
                                                $name = @$result->incharge_location;
                                                $postvalue = @$_POST['incharge_location'];
                                                echo form_input(array('type' => 'text','max' => '1000','name' => 'incharge_location', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'incharge_location', 'placeholder' => 'Incharge Location', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('incharge_location'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Target ( MT )*</label>
                                                <?php
                                                $name = @$result->target;
                                                $postvalue = @$_POST['target'];
                                                echo form_input(array('type' => 'number','max' => '1000','name' => 'target', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'target', 'placeholder' => 'Target', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('target'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Target ( MT )*</label>
                                                <?php
                                                $name = @$result->target;
                                                $postvalue = @$_POST['target'];
                                                echo form_input(array('type' => 'number','max' => '1000','name' => 'target', 'maxlength' => '25', 'class' => 'form-control', 'id' => 'target', 'placeholder' => 'Target', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('target'); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                       
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Remark*</label>
                                                <?php
                                                $name = @$result->remark;
                                                $postvalue = @$_POST['remark'];
                                                echo form_input(array('type' => 'text','max' => '1000','name' => 'target', 'maxlength' => '2590', 'class' => 'form-control', 'id' => 'target', 'placeholder' => 'Remark', 'value' => !empty($postvalue) ? $postvalue : $name, 'onkeyup' => 'validate_character(this)'));
                                                ?>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('remark'); ?></div>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Financial Year*</label>
                                                <select class="form-control" name="unit_id">
                                                    <option value="">Select Financial Year</option>
                                                    <?php if (!empty($getUnitType)) {
                                                        foreach ($getUnitType as $key => $val) {
                                                            ?>
                                                            <option value="<?= $val->id ?>"
                                                            <?php if (@$val->id ==  @$result->unit_id) {echo 'selected="selected"';} ?>><?= $val->unit_name ?></option>
                                                                            
                                                    <?php }
                                                    }; ?>
                                                </select>
                                                <label class="error">
                                                    <div class="help-block" style="color:red"> <?php echo form_error('unit_id'); ?></div>
                                                </label>
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
                                                    <button type="submit" class="btn btn-suctarget"> Submit </button>
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
   var api_key = 0;
   var api_url = 0;
   $(function() {
        var settings = {
        "url": "<?php echo base_url(); ?>/master/account/updateGstHit",
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
        response = JSON.parse(response);
        api_key = response.api_key;
        api_url = response.url;
        });
    });


   function searchForGST(gst_no){
    var gst_no  =   gst_no.value;


    if (gst_no != '') {
       $.confirm({
         title: 'Confirmation Dialog',
         content: 'Are you sure want to Search GST No <b>' + gst_no + "</b> Detail",
         buttons: {
           confirm: {
             btnClass: 'btn-blue',
             action: function() {
               

                var settings = {
                    "url": api_url+"/balance/"+api_key,
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    var resp = `{
                        "flag": true,
                        "message": "GSTIN  found.",
                        "data": {
                            "ntcrbs": "SPO",
                            "adhrVFlag": "No",
                            "lgnm": "CENTRAL WAREHOUSING CORPORATION",
                            "stj": "State - Gujarat,Division - Division - 1,Range - Range - 3,Unit - Ghatak 10 (Ahmedabad) (Jurisdictional Office)",
                            "dty": "Regular",
                            "cxdt": "",
                            "gstin": "24AAACC1206D1ZM",
                            "nba": [
                                "Bonded Warehouse",
                                "Service Provision",
                                "Recipient of Goods or Services",
                                "Warehouse / Depot",
                                "Input Service Distributor (ISD)"
                            ],
                            "ekycVFlag": "No",
                            "cmpRt": "NA",
                            "rgdt": "01/07/2017",
                            "ctb": "CORPORATION",
                            "pradr": {
                                "adr": "CENTRAL WAREHOUSING CORPORATION, MAHALAXMI CHAR RASTA, PALDI, Ahmedabad, Gujarat, 380007",
                                "addr": {
                                    "flno": "",
                                    "lg": "",
                                    "loc": "PALDI",
                                    "pncd": "380007",
                                    "bnm": "CENTRAL WAREHOUSING CORPORATION",
                                    "city": "",
                                    "lt": "",
                                    "stcd": "Gujarat",
                                    "bno": "0",
                                    "dst": "Ahmedabad",
                                    "st": "MAHALAXMI CHAR RASTA"
                                }
                            },
                            "sts": "Active",
                            "tradeNam": "CENTRAL WARE HOUSING CORP.LTD.",
                            "isFieldVisitConducted": "Yes",
                            "ctj": "Commissionerate - AHMEDABAD SOUTH,Division - DIVISION-VII - SATELLITE,Range - RANGE V",
                            "einvoiceStatus": "Yes",
                            "lstupdt": "",
                            "adadr": [],
                            "ctjCd": "",
                            "errorMsg": null,
                            "stjCd": ""
                        }
                    }`;

                    
                    resp = (JSON.parse(resp)).data;
                    var account_name = resp.lgnm;
                    var print_name  =  resp.tradeNam;
                    var area =   resp.pradr.addr.bnm;
                    var street =   resp.pradr.addr.st;
                    var locality =   resp.pradr.addr.loc;
                    var district =   resp.pradr.addr.dst;
                    var state =   resp.pradr.addr.stcd;
                    var pin_code =   resp.pradr.addr.pncd;
                    $('#account_name').val(account_name)
                    $('#print_name').val(print_name)
                    console.log("account_name",account_name);
                    console.log("print_name",print_name);
                    console.log("area",area);
                    console.log("street",street);
                    console.log("locality",locality);
                    console.log("district",district);
                    console.log("state",state);
                    console.log("pin_code",pin_code);
                    
                    
                });
             }
           },
           cancel: {}
         }
       });
     }


   }




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
                target: {
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
                center_name: {
                    required: '<div style="color:red">Account Creation field is required.</div>',
                },
                incharge_name: {
                    required: '<div style="color:red">incharge_name name field is required.</div>',
                },
                incharge_location: {
                    required: '<div style="color:red">incharge_location name field is required.</div>',
                },
                incharge_mobile_no: {
                    required: '<div style="color:red">incharge_mobile_no name field is required.</div>',
                },
                target: {
                    required: '<div style="color:red">target name field is required.</div>',
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