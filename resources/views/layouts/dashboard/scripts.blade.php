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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@if (auth()->user()->hasRole(['super admin', 'admin']))
@include('layouts.dashboard.notification')
@endif
<script>
    $(document).ready(function () {
        if ($('select[name="department_id"]').val()) {
            let department_id = $('select[name="department_id"]').val();
            showSections(department_id);
        }
        if (document.getElementById('#workOrderPie') || document.getElementById('#abnormalityPie')) {
            getDataAbnormality();
            getDataWorkOrder();
        }
    });

    $('#filterChartWorkOrder').change(function (e) {
        e.preventDefault();
        getDataWorkOrder($(this).val());
    })

    $('#filterChartAbnormality').change(function (e) {
        e.preventDefault();
        getDataAbnormality($(this).val());
    });

    $('#addFile').click(function (e) {
        e.preventDefault();
        if ($('.file-input').length === 3) {
            return Swal.fire({
                title: 'Warning!',
                text: 'File not allow more than 3 files!',
                icon: 'error',
                confirmButtonText: 'Close'
            })
        }
        let html = `
        <div class="form-group col-md">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="input-group-text btn-danger btn-remove-file" id="inputGroupFileAddon${$('.file-input').length + 1}">x</button>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input file-input" name="files[]" id="inputGroupFile${$('.file-input').length + 1}"
                        aria-describedby="inputGroupFileAddon${$('.file-input').length + 1}">
                    <label class="custom-file-label" for="inputGroupFile${$('.file-input').length + 1}">Choose file</label>
                </div>
            </div>
        </div>`;
        $('#files').append(html);
    });

    $(document).on('click', '.btn-remove-file', function (e) {
        e.preventDefault();
        let btnGroup = $(this).attr('id').split('inputGroupFileAddon');
        console.log('object',  $(`label[for="inputGroupFile${btnGroup[1]}"]`).val());
        $(`#inputGroupFile${btnGroup[1]}`).val('');
        $(`label[for="inputGroupFile${btnGroup[1]}"]`).text('Choose file');
    });

    $('#addAttachment').click(function (e) {
        e.preventDefault();
        if ($('.attachment').length === 3) {
            return Swal.fire({
                title: 'Warning!',
                text: 'Attachment not allow more than 3 files!',
                icon: 'error',
                confirmButtonText: 'Close'
            })
        }
        let html = `
        <div class="form-group col-md-6">
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input attachment" id="customFile"
                    accept="application/pdf, image/jpeg, image/jpg, image/png" name="files[]">
                <label class="custom-file-label" for="customFile">Replace file</label>
            </div>
        </div>`;
        $('#attachments').append(html);
    });

    $('#addAttachmentClosed').click(function (e) {
        e.preventDefault();
        if ($('.attachment-closed').length === 3) {
            return Swal.fire({
                title: 'Warning!',
                text: 'Attachment not allow more than 3 files!',
                icon: 'error',
                confirmButtonText: 'Close'
            })
        }
        let html = `
        <div class="form-group col-md-6">
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input attachment-closed" id="customFile"
                    accept="application/pdf, image/jpeg, image/jpg, image/png" name="files[]">
                <label class="custom-file-label" for="customFile">Replace file</label>
            </div>
        </div>`;
        $('#attachmentsClosed').append(html);
    });

    $('select[name="department_id"]').change(function (e) {
        let section_id = $(this).val();
        showSections(section_id);
    });

    $('.btn-modal').click(function (e) {
        e.preventDefault();
        let html = `
    <div class="modal-header">
        <h5 class="modal-title">${$(this).data('title')}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form class="needs-validation" action="${$(this).attr('href')}" method="POST">
        <input type="hidden" name="_token" value="${$(this).data('csrf')}">
        <input type="hidden" name="_method" value="${$(this).data('method')}">
    <div class="modal-body">
        ${$(this).data('content-html') != "" && $(this).data('content-html') != undefined ? $(this).data('content-html') : $(this).data('wording') +' ?'}
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

    async function getDataWorkOrder(years = null, status = null, department = null) {
        let query = {
            years: years,
            status: status,
            department: department
        }
        $.get(`{{route('work-order.ajax.data')}}`, query, function (response) {
            if (response) {
                showPieChartWorkOrder(response);
            }
        });
    }

    async function showPieChartWorkOrder(data = null) {
        $('#workOrderPie').remove();
        $('#cardWorkOrderPie').html(`<canvas id="workOrderPie" height="182"></canvas>`)
        let newData = [];
        let newLabel = [];
        let closed;
        let outstanding;
        if (data != null) {
            let dataGroup = await groupBy(data, 'label');
            console.log('data', data)
            for (const key in dataGroup) {
                if (dataGroup.hasOwnProperty(key)) {
                    newLabel.push(key);
                    newData.push(dataGroup[key].length)
                }
            }
        }

        let ctx = document.getElementById('workOrderPie').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: newLabel,
                datasets: [{
                    label: '# of Votes',
                    data: newData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
        });
    }

    async function getDataAbnormality(years = null, status = null, department = null) {
        let query = {
            years: years,
            status: status,
            department: department
        }
        $.get(`{{route('abnormality.ajax.data')}}`, query, function (response) {
            if (response) {
                showPieChartAbnormality(response);
            }
        });
    }
    async function showPieChartAbnormality(data = null) {
        $('#abnormalityPie').remove();
        $('#cardAbnormalityPie').html(`<canvas id="abnormalityPie" height="182"></canvas>`)
        let newData = [];
        let newLabel = [];
        let closed;
        let outstanding;
        if (data != null) {
            let dataGroup = await groupBy(data, 'label');
            console.log('data', data)
            for (const key in dataGroup) {
                if (dataGroup.hasOwnProperty(key)) {
                    newLabel.push(key);
                    newData.push(dataGroup[key].length)
                }
            }
        }

        let ctx = document.getElementById('abnormalityPie').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: newLabel,
                datasets: [{
                    label: '# of Votes',
                    data: newData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
        });
    }

    async function groupBy(arr, key) {
        return arr.reduce(function (rv, x) {
            (rv[x[key]] = rv[x[key]] || []).push(x);
            return rv;
        }, {});
    }

</script>

<!-- Page Specific JS File -->
