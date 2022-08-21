 <!-- Main content -->
 <?php $QUERY_STRING = $_SERVER['QUERY_STRING']; ?>
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h3 class="card-title">DataTable with default features</h3>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <table id="datatable-grid" class="table table-bordered table-striped">
               <thead>
                 <tr>
                   <th>Id</th>
                   <th>Name</th>
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
   function delete_state(id) {
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
                 url: "<?php echo site_url("master/state/delete_city") ?>",
                 data: csrf_name + '=' + csrf_token + '&id=' + id,
                 success: function(data) {

                   window.location.href = "<?= base_url() ?>master/state";
                 }
               });
             }
           },
           cancel: {}
         }
       });
     }
   }

   function restore_state(id){
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
                 url: "<?php echo site_url("master/state/restoreData") ?>",
                 data: csrf_name + '=' + csrf_token + '&id=' + id,
                 success: function(data) {

                   window.location.href = "<?= base_url() ?>master/state";
                 }
               });
             }
           },
           cancel: {}
         }
       });
     }
   }

   $(function() {
     $("#datatable-grid").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "dom": 'frtipB',
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
       "ajax": {
         url: "<?php echo base_url(); ?>/master/state/view_all", // json datasource
         type: "post",
         error: function(data) {
           $("#employee-grid_processing").css("display", "none");
         }
       },

     }).buttons().container().appendTo('#datatable-grid_wrapper .col-md-6:eq(0)');
   });
 </script>