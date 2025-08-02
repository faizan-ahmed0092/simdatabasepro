<!-- Critical JavaScript - Load only essential functionality immediately -->
<script src="{{asset('admin/js/core/app.js')}}"></script>

<!-- Progressive loading script -->
<script>
    // Show content progressively as it loads
    document.addEventListener('DOMContentLoaded', function() {
        // Show critical content immediately
        document.body.classList.add('loaded');
        
        // Show async content as it loads
        window.addEventListener('load', function() {
            document.querySelectorAll('.async-content').forEach(function(el) {
                el.classList.add('loaded');
            });
        });
    });
</script>

<!-- Semi-critical JavaScript - Load with high priority but async -->
<script src="{{asset('admin/vendors/js/vendors.min.js')}}" defer></script>
<script src="{{asset('admin/js/core/app-menu.js')}}" defer></script>

<!-- Non-critical JavaScript - Load asynchronously -->
<script src="{{asset('admin/vendors/js/charts/apexcharts.min.js')}}" defer></script>
<script src="{{asset('admin/vendors/js/extensions/toastr.min.js')}}" defer></script>
<script src="{{asset('admin/js/scripts/pages/dashboard-ecommerce.js')}}" defer></script>

<!-- External libraries - Load asynchronously -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" defer></script>
<script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}" defer></script>
<script src="{{asset('admin/js/scripts/forms/form-select2.js')}}" defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

<!-- Custom JavaScript -->
<script src="{{asset('admin/js/custom.js')}}" defer></script>

<script>
    // Load non-critical scripts after page load
    window.addEventListener('load', function() {
        // Lazy load jQuery mask if needed
        if (typeof $ !== 'undefined' && $('.phone-mask').length > 0) {
            var script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js';
            script.async = true;
            document.head.appendChild(script);
        }
    });

    function deleteAlert(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $('#delete-form').attr('action', url);
                $('#delete-form').submit();
            }
        });
    }
    
    function confirmationAlert(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.value) {
                window.location = url
            }
        });
    }
</script>

<script>
    $(document).on('click', '.open_modal', function () {
        var url = $(this).attr('data-url');
        var id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        $.ajax({
            type: "GET",
            data: {
                id: id,
                type: type,
            },
            url: url,
            success: function (response) {
                $('.modal').modal('hide');
                $('.CustomTypeBody').empty();
                $('.CustomTypeBody').html(response.html);
                $('.CustomTypeModal').modal('show');
            }
        });
    })
</script>

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

    $(document).on('click','.close',function(){
        $(this).closest('.modal').modal('hide');
    })
    
    $(document).on('input', '.decimal', function (e) {
        this.value = this.value.replace(/[^0.00-9.99]/g, '').replace(/(\..*)\./g, '$1').replace(new RegExp("(\\.[\\d]{2}).", "g"), '$1');
    });
</script>

<script>
    $(document).ready(function() {
        // Bind the keypress event to the input fields inside the form
        $(".submit_form").on("keypress", function(event) {
            // Get the key code for the pressed key
            var keyCode = event.which ? event.which : event.keyCode;

            // Check if the pressed key is Enter (key code 13)
            if (keyCode === 13) {
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(document).on('keyup','.generateSlug',function () {
            var inputString = $(this).val();
            var slug = generateSlug(inputString);
            $('.slug_string').val(slug);
            $('.slug_string_area').text(slug);
        });
        
        $(document).on('keyup','.slug_string',function () {
            var inputString = $(this).val();
            $('.slug_string_area').text(inputString);
        });

        function generateSlug(str) {
            return str
                .trim()                  // Trim leading/trailing white spaces
                .toLowerCase()           // Convert to lowercase
                .replace(/\s+/g, '-')    // Replace spaces with dashes
                .replace(/[^a-z0-9-]/g, '') // Remove non-alphanumeric characters except dashes
                .replace(/-+/g, '-');    // Replace multiple dashes with a single dash
        }
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click','.choose_url',function() {
            var textToCopy = $(this).data('url');
            var tempTextarea = $('<textarea>');
            $('#mediaModal').append(tempTextarea);
            tempTextarea.val(textToCopy).select();
            document.execCommand('copy');
            tempTextarea.remove();
            toastr.success('Successfully Copied');
        });
    });
</script>
