<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('771fe5c2a9fa7acceab9', {
        cluster: 'ap1'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('notifications', function (data) {
        alert(JSON.stringify(data));
    });

    $(document).ready(function () {
        if ($('select[name="department_id"]').val()) {
            let department_id = $('select[name="department_id"]').val();
            showSections(department_id);
        }
    });

    $('#addFile').click(function (e) {
        e.preventDefault();
        if ($('.custom-file-input').length === 3) {
            return Swal.fire({
                title: 'Warning!',
                text: 'File not allow more than 3 files!',
                icon: 'error',
                confirmButtonText: 'Close'
            })
        }
        let html = `
        ${$('#files').html()}
        <div class="form-group col-md-4">
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="customFile" name="files[]">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>`;
        $('#files').html(html);
    });

    $('select[name="department_id"]').change(function (e) {
        let section_id = $(this).val();
        showSections(section_id);
    });

    $('.btn-modal').click(function (e) {
        e.preventDefault();
        let html = `
    <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form class="needs-validation" action="${$(this).attr('href')}" method="POST">
        <input type="hidden" name="_token" value="${$(this).data('csrf')}">
        <input type="hidden" name="_method" value="${$(this).data('method')}">
    <div class="modal-body">
        ${$(this).data('wording')} ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">${$(this).data('button-label')}</button>
    </div>
    </form>
    `;
        $('.modal-content').html(html)
        $('.modal-general').modal('show');
    });

    $(document).on('change', '.custom-file-input', function () {
        let fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    async function showSections(department_id = null) {
        let query = {}
        if (department_id) {
            query.id = department_id;
        }
        $.get(`{{route('sections.find')}}`, query, function (response) {
            if (response) {
                let data = response.filter(val => val.department_id == department_id)
                let options = data.map(val => {
                    return `<option value='${val.id}'>${val.name}</option>`;
                });
                $('select[name="section_id"]').html(options.join(''));
            }
        });
    }

</script>

<!-- Page Specific JS File -->
