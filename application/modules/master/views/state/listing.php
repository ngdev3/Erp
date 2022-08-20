 <!-- Main content -->
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