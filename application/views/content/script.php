<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>dist/js/pages/dashboard2.js"></script>


<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.js"></script>

<!-- JQuery Confim Box -->
<script src="<?php echo base_url(); ?>plugins/jconfirm/jquery-confirm.min.js"></script>

<!-- Jquery Form Validations -->
<script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jquery-validation/additional-methods.min.js"></script>

<!-- Push Notification ERP -->
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js"></script>

<script type="text/javascript">
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDxQyEVlkphdD3osyOjmgLhcrG8iDE7zqM",
  authDomain: "cr-erp.firebaseapp.com",
  projectId: "cr-erp",
  storageBucket: "cr-erp.appspot.com",
  messagingSenderId: "152799917375",
  appId: "1:152799917375:web:fc42542a9c0cf1c5cd8f8a",
  measurementId: "G-7WTWJXD3CK"
};

firebase.initializeApp(firebaseConfig);
const messaging =   firebase.messaging();

// Get registration token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
messaging.getToken({ vapidKey: 'BH63-cv9h5HPgIJWySweZMfhJ2dhrTCVpthdqzhnQkW2RZzxQRihy5_ShHN2I9tD_fMQ_7QSZzaVVl6KUqTfQLk' }).then((currentToken) => {
    console.log(currentToken);
  if (currentToken) {
    
  } else {
    // Show permission request UI
    console.log('No registration token available. Request permission to generate one.');
    // ...
  }
}).catch((err) => {
  console.log('An error occurred while retrieving token. ', err);
  // ...
});

messaging.onMessage((data)=>{
    alert(data);
    Notification.requestPermission((status)=>{
        alert(status);
        if(status == 'granted'){
            let title   =   data['data']['title'];
            let body   =   data['data']['body'];
            new Notification(title,{
                body:body
            })
        }
    })
})

</script>
