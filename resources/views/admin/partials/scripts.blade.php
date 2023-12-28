<!-- General JS Scripts -->
<script src="{{ asset('backend/modules/jquery.min.js') }}"></script>
<script src="{{ asset('backend/modules/popper.js') }}"></script>
<script src="{{ asset('backend/modules/tooltip.js') }}"></script>
<script src="{{ asset('backend/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('backend/modules/moment.min.js') }}"></script>
<script src="{{ asset('backend/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('backend/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('backend/modules/chart.min.js') }}"></script>
<script src="{{ asset('backend/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('backend/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('backend/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('backend/js/page/index-0.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('backend/js/scripts.js') }}"></script>
<script src="{{ asset('backend/js/custom.js') }}"></script>
<!--toaster js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>

<!-- Dynamic delete alert-->

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.delete-item', function (event) {
            event.preventDefault();

            let deleteUrl = $(this).attr('href');
            console.log(deleteUrl);

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,
                        success: function (data) {
                            if(data.status === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    data.message
                                );

                                window.location.reload();
                            } else if(data.status === 'error') {
                                Swal.fire(
                                    'Can not Deleted!',
                                    data.message
                                );
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log(error);
                        }
                    })
                }
            });
        });
    });
</script>
@stack('scripts')
