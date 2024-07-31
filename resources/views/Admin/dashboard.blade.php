@extends('Template.admin')

@section('content-below')
This is Admin panel which can be accessed by Admin PMB UHN only
<button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      const toastTrigger = document.getElementById('liveToastBtn');
      const toastLiveExample = document.getElementById('liveToast');

      if (toastTrigger && toastLiveExample) {
          const toast = new bootstrap.Toast(toastLiveExample);

          toastTrigger.addEventListener('click', function() {
              toast.show();
          });
      }
  });
</script>
@endsection