      </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="modal-stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <?php echo form_open('Login/logout'); ?>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Yakin ingin keluar?
            </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Pilih "Logout" jika anda yakin ingin keluar.
          </div>
          <div class="modal-footer" id="ModalFooter">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">
              Cancel
            </button>
            <button class="btn btn-primary" type="submit">
              Log Out
            </button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>

    <script src="datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('.tanggal').datepicker({
          format: "dd-mm-yyyy",
          autoclose:true
        });
      });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>


    <!-- Load and execute javascript code used only in this page -->
    <script src="<?php echo base_url() ?>/assets/js/pages/uiTables.js"></script>
    <script>$(function () {UiTables.init();});</script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="<?php echo base_url() ?>/assets/js/pages/formsComponents.js"></script>
    <script>$(function(){ FormsComponents.init(); });</script>

    <script>
      <?php 
      if (isset($modal_show)) {
        echo $modal_show;
      } 
      ?>
    </script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker();
      } );
    </script>

    <script>
  // Note: This example requires that you consent to location sharing when
  // prompted by your browser. If you see the error "The Geolocation service
  // failed.", it means you probably did not give permission for the browser to
  // locate you.
  var map, infoWindow;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 17
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        infoWindow.setPosition(pos);
        infoWindow.setContent('Lokasi Anda Sekarang');
        
        get_detail(position.coords.latitude, position.coords.longitude);
        infoWindow.open(map);
        map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  }

  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
  }

  function get_detail(lat,long) {
    $("#lat").val(lat);
    $("#long").val(long);
    $.ajax({   
      type: "GET",
      url: "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+long+"&key=AIzaSyDbCEZR7lFNoJCdptAZ4zlZNnAMU2pf7Bc",             
      dataType: "html",               
      success: function(response){                    
            // $("#responsecontainer").html(response); 


            var temp=jQuery.parseJSON(response);
            //  console.log(''+temp.results[0]['address_components'][1]['long_name']);
            var temp1 =temp.results[0]['address_components'][0]['long_name'];
            var temp2 =temp.results[0]['address_components'][1]['long_name'];
            var temp3 =temp.results[0]['address_components'][2]['long_name'];
            var temp4 =temp.results[0]['address_components'][3]['long_name'];
            var temp5 =temp.results[0]['address_components'][4]['long_name'];
            try{
              var temp6 =temp.results[0]['address_components'][5]['long_name'];
            }catch(err){
              var temp6='';
            }
            try {
              var temp7 =temp.results[0]['address_components'][7]['long_name'];
            } catch(err) {
              var temp7='';
            }
            

            $("#user_position").val(temp1+" "+temp2+" "+temp3+" "+temp4+" "+temp5+" "+temp6+" "+temp7);

          }

        });
  }
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbCEZR7lFNoJCdptAZ4zlZNnAMU2pf7Bc&callback=initMap">
</script>

</body>
</html>

