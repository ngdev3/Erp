<!-- REQUIRED SCRIPTS -->

<script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
<script>
window.OneSignalDeferred = window.OneSignalDeferred || [];
OneSignalDeferred.push(function(OneSignal) {
  OneSignal.init({
    appId: "865a79ce-2666-43f3-b105-4ded58b35a78",
    safari_web_id: "web.onesignal.auto.20f3ee95-6f21-4aad-a9bb-9c5899a4353a",
    notifyButton: {
      enable: true,
    },
    promptOptions: {
      slidedown: {
        prompts: [{
            type: "smsAndEmail",
            autoPrompt: false,
            text: {
              emailLabel: "Insert Email Address",
              smsLabel: "Insert Phone Number",
              acceptButton: "Submit",
              cancelButton: "No Thanks",
              actionMessage: "Receive the latest news, updates and offers as they happen.",
              updateMessage: "Update your push notification subscription preferences.",
              confirmMessage: "Thank You!",
              positiveUpdateButton: "Save Preferences",
              negativeUpdateButton: "Cancel",
            },
            delay: {
              pageViews: 1,
              timeDelay: 20
            },
          },
          {
            type: "category",
            autoPrompt: true,
            text: {
              actionMessage: "We'd like to show you notifications for the latest news and updates.",
              acceptButton: "Allow",
              cancelButton: "Cancel",

              /* CATEGORY SLIDEDOWN SPECIFIC TEXT */
              negativeUpdateButton: "Cancel",
              positiveUpdateButton: "Save Preferences",
              updateMessage: "Update your push notification subscription preferences.",
            },
            delay: {
              pageViews: 3,
              timeDelay: 20
            },
            categories: [{
                tag: "politics",
                label: "Politics"
              },
              {
                tag: "local_news",
                label: "Local News"
              },
              {
                tag: "world_news",
                label: "World News",
              },
              {
                tag: "culture",
                label: "Culture"
              },
            ]
          }
        ]
      }
    }
  });
});
</script>


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






