<!-- Critical JavaScript - Load only essential functionality immediately -->
<script>
    // Progressive loading script - load immediately
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

<!-- Core app functionality - load with high priority -->
<script src="{{asset('admin/js/core/app.js')}}" defer></script>

<!-- All other JavaScript - Load asynchronously with lower priority -->
<script src="{{asset('admin/vendors/js/vendors.min.js')}}" defer></script>
<script src="{{asset('admin/js/core/app-menu.js')}}" defer></script>
<script src="{{asset('admin/vendors/js/charts/apexcharts.min.js')}}" defer></script>
<script src="{{asset('admin/vendors/js/extensions/toastr.min.js')}}" defer></script>
<script src="{{asset('admin/js/scripts/pages/dashboard-ecommerce.js')}}" defer></script>

<!-- External libraries - Load asynchronously with lowest priority -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" defer></script>
<script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}" defer></script>
<script src="{{asset('admin/js/scripts/forms/form-select2.js')}}" defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
<script src="{{asset('admin/js/custom.js')}}" defer></script>

<!-- Lazy load non-critical functionality -->
<script>
    // Load non-critical scripts after page is fully loaded
    window.addEventListener('load', function() {
        // Lazy load jQuery mask if needed
        if (typeof $ !== 'undefined' && $('.phone-mask').length > 0) {
            var script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js';
            script.async = true;
            document.head.appendChild(script);
        }
        
        // Initialize non-critical features
        setTimeout(function() {
            // Load any additional features that aren't immediately needed
        }, 1000);
    });
    
    // Essential functions - load asynchronously
    function deleteAlert(url) {
        if (typeof Swal !== 'undefined') {
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
    }
    
    function confirmationAlert(url) {
        if (typeof Swal !== 'undefined') {
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
    }
</script>

<!-- Essential event handlers - load asynchronously -->
<script defer>
    // Modal functionality
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
    });

    // Feather icons
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    });

    // Close modal
    $(document).on('click','.close',function(){
        $(this).closest('.modal').modal('hide');
    });
    
    // Decimal input handling
    $(document).on('input', '.decimal', function (e) {
        this.value = this.value.replace(/[^0.00-9.99]/g, '').replace(/(\..*)\./g, '$1').replace(new RegExp("(\\.[\\d]{2}).", "g"), '$1');
    });

    // Form submission prevention
    $(document).ready(function() {
        $(".submit_form").on("keypress", function(event) {
            var keyCode = event.which ? event.which : event.keyCode;
            if (keyCode === 13) {
                event.preventDefault();
            }
        });
    });

    // Slug generation
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
                .trim()
                .toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^a-z0-9-]/g, '')
                .replace(/-+/g, '-');
        }
    });

    // URL copying
    $(document).ready(function() {
        $(document).on('click','.choose_url',function() {
            var textToCopy = $(this).data('url');
            var tempTextarea = $('<textarea>');
            $('#mediaModal').append(tempTextarea);
            tempTextarea.val(textToCopy).select();
            document.execCommand('copy');
            tempTextarea.remove();
            if (typeof toastr !== 'undefined') {
                toastr.success('Successfully Copied');
            }
        });
    });
</script>
