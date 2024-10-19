@if(session()->has('message'))

<div>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script>
        $(document).ready(function(){
              // Function to fade out and remove the alert after a delay
              function removeAlert() {
                  $("#alert").fadeTo(500, 0).slideUp(500, function(){
                      $(this).remove(); 
                  });
              }
    
              // Show the alert
              $("#alert").alert();
    
              // Hide the alert after 3 seconds
              setTimeout(function() {
                  removeAlert();
              }, 500); // Adjust the delay as needed
          });
        function alertState() {
            return {
                data: null,
                alertFlag(){
                    $refs.alertRef.alert();
                    setTimeout(function () {
                        this.deleteAlert();
                    }, 1000)
                },
                deleteAlert(){
                    $refs.alertRef.slideUp(500, function () {
                        $refs.alertRef.remove();
                    })
                }
            }
        }
    </script>
    <div x-data="alertState()">

        @if (session('type')=="error")
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('message')}}
            
        </div>
        @else
        <div id="alert" class="bg-green-300 rounded-md p-2  transition ease-in-out" x-ref="alertRef" x-on="" x-init="alertFlag()" role="alert">
            {{session('message')}}
        </div>
        @endif
    </div>
</div>

@endif