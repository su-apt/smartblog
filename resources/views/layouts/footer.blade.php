<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="text-muted">© 2021 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
  </footer>
</div>

    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

@if(Auth::check())
    <script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('markNotification') }}", {
            method: 'POST',
            data: {
               "_token": "{{ csrf_token() }}",
               " id" : id
            }
        });
    }
    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                $(this).parents('li.ps-container').remove();
                 $("#mark-all").html("accepted");
            });
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('li.ps-container').remove();
            })
        });
    });

    function like(id = null) {
        return $.ajax("{{ route('likes') }}", {
            method: 'POST',
            data: {
               "_token": "{{ csrf_token() }}",
               " id" : id
            }
        });
    }
     $(document).on('click', '#unlike', function() {
            var id = ($(this).data("id"));
            let request = like($(this).data('id'));
            request.done(() => {
               $('#like-'+id+'').removeClass("fas fa-heart").addClass("far fa-heart");
               $('#likebutton'+id+'').load(window.location.href + ' #content'+id+' > *');
            });
        });
    $(function() {
        $(document).on('click', '.like', function(){
            var id = ($(this).data("id"));
            let request = like($(this).data('id'));
            request.done(() => {
                $('#like-'+id+'').removeClass("far fa-heart").addClass("fas fa-heart");
                $('#likebutton'+id+'').load(window.location.href + ' #content'+id+' > *');
            });
        });
    });
    </script>
    @endif
</body>
</html>
