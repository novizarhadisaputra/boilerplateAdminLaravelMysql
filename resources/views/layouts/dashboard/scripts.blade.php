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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
    $('#addFile').click(function (e) {
        e.preventDefault();
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

    $('.btn-delete').click(function (e) {
        console.log('masuk')
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
        <input type="hidden" name="_method" value="DELETE">
    <div class="modal-body">
        Are you sure delete ${$(this).data('name')} ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
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

</script>

<!-- Page Specific JS File -->
