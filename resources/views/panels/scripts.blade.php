{{-- Vendor Scripts --}}
<script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('vendors/js/ui/prism.min.js') }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset('js/core/app-menu.js') }}"></script>
<script src="{{ asset('js/core/app.js') }}"></script>
<script src="{{ asset('js/scripts/components.js') }}"></script>
@if($configData['blankPage'] == false)
<script src="{{ asset('js/scripts/customizer.js') }}"></script>
<script src="{{ asset('js/scripts/footer.js') }}"></script>
@endif
<script src="{{ asset('js/scripts/sweetalert.min.js') }}"></script>
<script type="text/javascript">
  // BUTTON DELETE
  $(document).on('click', 'button.btnDelete', function (e) {
      e.preventDefault();
      var self = $(this);
      swal({
          title             : "Are you sure?",
          text              : "You will not be able to recover this!",
          type              : "warning",
          showCancelButton  : true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText : "Yes, delete it!",
          cancelButtonText  : "No, Cancel delete!",
          closeOnConfirm    : false,
          closeOnCancel     : true
      },
      function(isConfirm){
          if(isConfirm){
              swal("Deleted!","your product has been deleted", "success");
              setTimeout(function() {
                  self.parents(".delete_form").submit();
              }, 2000);
          }
      });
  });
</script>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],

        toolbar: 'undo redo | fontselect fontsizeselect formatselect |' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  // Making 2 variable month and day
  var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
  var monthNames2 = [ "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12" ];
  var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

  // make single object
  var newDate = new Date();
  // make current time
  newDate.setDate(newDate.getDate());
  // setting date and time
  $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
  $('#roll-call-date').html(newDate.getFullYear() + "-" + monthNames2[newDate.getMonth()] + "-" + newDate.getDate());
  setInterval( function() {
  // Create a newDate() object and extract the seconds of the current time on the visitor's
  var seconds = new Date().getSeconds();
  // Add a leading zero to seconds value
  $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
  },1000);

  setInterval( function() {
  // Create a newDate() object and extract the minutes of the current time on the visitor's
  var minutes = new Date().getMinutes();
  // Add a leading zero to the minutes value
  $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
  },1000);

  setInterval( function() {
  // Create a newDate() object and extract the hours of the current time on the visitor's
  var hours = new Date().getHours();
  var minutes = new Date().getMinutes();
  var seconds = new Date().getSeconds();
  // Add a leading zero to the hours value
  $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
  $(".roll-call-time").html(( hours < 10 ? "0" : "" ) + hours + ( minutes < 10 ? "0" : "" ) + minutes + ( seconds < 10 ? "0" : "" ) + seconds);
  }, 1000);
  });
  </script>
  {{-- page script --}}
  @yield('page-script')
  {{-- page script --}}
