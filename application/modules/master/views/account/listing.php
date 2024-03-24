 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-12">
         <div class="card">
           <!-- /.card-header -->
           <div class="card-body">
             <div class="col-6"> </div>
             <div class="col-6 pull-right">
               <a href="<?php echo base_url('master/account/add'); ?>" id="back-btn" class="btn btn-success">Tax Slab</a>
               <a href="javascript:void(0)" id="back-btn" onclick="getGSTDetail()" class="btn btn-success">Tax getGSTDetail</a>
             </div>

             <table id="datatable-grid" class="table table-bordered table-striped">
               <thead>
                 <tr>
                   <th>Id</th>
                   <th>TaxSlab Name</th>
                   <th>IGST</th>
                   <th>CGST</th>
                   <th>SGST</th>
                   <th>CESS</th>
                   <th>Calculated tax on mrp</th>
                   <th>Zero tax type</th>
                   <th>Status</th>
                   <th>Action</th>
                 </tr>
               </thead>
             </table>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
 </section>
 <!-- /.content -->

 <script>
   //    DELETE CATEGORY
   function delete_data(id) {
     var name = $('#getData_' + id).data('value');
     var csrf_name = "<?= $this->security->get_csrf_token_name() ?>";
     var csrf_token = "<?= $this->security->get_csrf_hash() ?>";
     if (id != '') {
       $.confirm({
         title: 'Confirmation Dialog',
         content: 'Are you sure want to Delete <b>' + name + "</b> Detail",
         buttons: {
           confirm: {
             btnClass: 'btn-blue',
             action: function() {
               $.ajax({
                 type: "POST",
                 url: "<?php echo site_url("master/account/deletedata") ?>",
                 data: csrf_name + '=' + csrf_token + '&id=' + id,
                 success: function(data) {
                   window.location.href = "<?= base_url() ?>master/account";
                 }
               });
             }
           },
           cancel: {}
         }
       });
     }
   }

   function restore_data(id) {
     var name = $('#getData_' + id).data('value');
     var csrf_name = "<?= $this->security->get_csrf_token_name() ?>";
     var csrf_token = "<?= $this->security->get_csrf_hash() ?>";
     if (id != '') {
       $.confirm({
         title: 'Confirmation Dialog',
         content: 'Are you sure want to Restore <b>' + name + "</b> Detail",
         buttons: {
           confirm: {
             btnClass: 'btn-blue',
             action: function() {
               $.ajax({
                 type: "POST",
                 url: "<?php echo site_url("master/account/restoreData") ?>",
                 data: csrf_name + '=' + csrf_token + '&id=' + id,
                 success: function(data) {

                   window.location.href = "<?= base_url() ?>master/account";
                 }
               });
             }
           },
           cancel: {}
         }
       });
     }
   }

   function getGSTDetail(id) {
                var settings = {
              "url": "https://sheet.gstincheck.co.in/check/04c31f8e9b721bd0c53521c40688cba6/24AAACC1206D1ZM",
              "method": "GET",
              "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
              console.log(response);
            });
   }

   $(function() {
     $("#datatable-grid").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "dom": 'frtipB',
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
       "ajax": {
         url: "<?php echo base_url(); ?>/master/account/view_all", // json datasource
         type: "post",
         error: function(data) {
           $("#employee-grid_processing").css("display", "none");
         }
       },

     }).buttons().container().appendTo('#datatable-grid_wrapper .col-md-6:eq(0)');
   });

   

 </script>