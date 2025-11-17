@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Page Heading -->
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <!-- <img class="img-responsive" width="100%" src="{{ config('app.header') }}" /> -->
                </div>
                <div class="card-body">
                    <form class="form-inline">
                        <div class="col-sm-6 text-center" style=" margin: 0 auto; width: 25%">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#daftarModal"><i class="fa fa-users fa-3x" aria-hidden="true"></i></a>
                            <p class="mb-1"><b>Pendaftaran Pekerja Baru</b></p>
                        </div>
                    </form>
                </div>
                </div>
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-black">Maklumat Pekerja</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableSenarai" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>ID Pekerja</th>
                                    <th>Jawatan</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- var dari Homecontroller -->
                                <?php $count = 0;?>
                                @forelse($list_employees as $app)
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>{{ $app-> name }}</td>
                                    <td>{{ $app-> empID }}</td>
                                    <td>{{ $app-> positions }}</td>
                                    @if ($app->status == 1)
                                    <td>Aktif</td>
                                    @else
                                    <td>Tidak Aktif</td>
                                    @endif
                                    <td style="width:18%">
                                        <a data-id="{{$app->id}}" class="btn btn-sm btn-primary lihatMaklumatModal" title="Lihat Maklumat">
                                            <i class="fa fa-clipboard-list"></i>
                                        </a>
                                        <a data-id="{{$app->id}}" class="btn btn-sm btn-primary kemaskiniModal" title="Kemaskini Maklumat Pekerja">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a data-id="{{$app->id}}" data-name="{{$app->name}}" class="btn btn-sm btn-danger deleteModal" title="Buang Rekod">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fa fa-inbox fa-2x mb-3"></i>
                                        <p class="mb-0">Tiada rekod dijumpai</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal daftar -->
<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color:rgb(68, 174, 235);">
        <h5 class="modal-title" id="daftarModalTitle">Pendaftaran Pekerja Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
         <!-- Load your daftarUser page content here -->
         @include('crud_sample.daftarUsers')
      </div>
    </div>
  </div>
</div>

<!-- modal lihat maklumat -->
<div class="modal fade" id="lihatMaklumatModal" tabindex="-1" role="dialog" aria-labelledby="daftarModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 600px;">
    <div class="modal-content">

      <div class="modal-header" style="background-color:rgb(68, 174, 235);">
        <h5 class="modal-title" id="daftarModalTitle">Maklumat Pekerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
         <!-- Load your daftarUser page content here -->
          @include('crud_sample.lihatMaklumat')
      </div>
    </div>
  </div>
</div>

<!-- Modal kemaskini -->
<div class="modal fade" id="kemaskiniModal" tabindex="-1" role="dialog" aria-labelledby="daftarModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color:rgb(68, 174, 235);">
        <h5 class="modal-title" id="daftarModalTitle">Kemaskini Rekod Pekerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
         <!-- Load your daftarUser page content here -->
          @include('crud_sample.kemaskiniMaklumat')
      </div>
    </div>
  </div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header" style="background-color:rgb(250, 43, 28);">
        <h5 class="modal-title" id="deleteTitle">Padam Rekod Pekerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <p class="fs-5">
          Anda ingin memadam rekod <strong id="deleteUserName"></strong>?
        </p>
        <p class="fs-5">
          Adakah anda pasti?
        </p>
      </div>

      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button id="confirmDeleteBtn" href="#" class="btn btn-danger">Padam</button>
      </div>

    </div>
  </div>
</div>

@endsection

@push('scripts')

<script>
//for prop jenis kontrak off tarikh akhir (daftarUsers.blade.php)
$(document).ready(function() {
    $('#typeCon').on('change', function() {
        var contractType = $(this).val();
        
        if (contractType === 'TETAP') {
            $('#endDate').prop('disabled', true);
            $('#endDate').val(''); // Clear the value
            $('#endDate').css('background-color', '#e9ecef'); 
            $('#endDate').css('cursor', 'not-allowed');
        } else if (contractType === 'KONTRAK') {
            $('#endDate').prop('disabled', false);
            $('#endDate').css('background-color', ''); 
            $('#endDate').css('cursor', '');
        } else {
            $('#endDate').prop('disabled', true);
            $('#endDate').val('');
            $('#endDate').css('background-color', '#e9ecef');
            $('#endDate').css('cursor', 'not-allowed');
        }
    });
    $('#typeCon').trigger('change');
});

//kemaskini disable end date tetap (kemaskiniMaklumat.blade.php)
$(document).ready(function() {
    $('#eType').on('change', function() {
        var contractType = $(this).val();
        
        if (contractType === 'TETAP') {
            $('#eEnd').prop('disabled', true);
            $('#eEnd').val(''); // Clear the value
            // $('#eEnd').css('background-color', '#e9ecef'); 
            $('#eEnd').css('cursor', 'not-allowed');
        } else if (contractType === 'KONTRAK') {
            $('#eEnd').prop('disabled', false);
            $('#eEnd').css('background-color', ''); 
            $('#eEnd').css('cursor', '');
        } 
    });
    $('#eType').trigger('change');
});

/** Untuk check tarikh akhir tidak kurang daripada tarikh mula */
$("#startDate").on("change", function () {

    var start = $(this).val();
    $("#endDate").attr("min", start);

});

// <!-- daftar pekerja -->
$(document).ready(function() {
    // console.log("jQuery is loaded!");
    
    $("#formMaklumatPekerja").on("submit", function (e) {
        e.preventDefault(); // prevent double submission

        var form = this;
        var email = $("#empEmail").val();
        var empID = $("#empID").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        try {

            // CHECK EMPLOYEE ID
            $.ajax({
                url: '/semak-idpekerja',
                type: 'GET',
                data: { EMPID: empID },
                dataType: 'JSON',
                success: function (data) {
                    try {

                        if (data > 0) {
                            toastr.error("Nombor ID pekerja telah digunakan.");
                            return;
                        }

                        // CHECK EMAIL
                        $.ajax({
                            url: '/semak-email',
                            type: 'GET',
                            data: { EMAIL: email },
                            dataType: 'JSON',
                            success: function (data) {
                                try {

                                    if (data > 0) {
                                        toastr.error("Email telah digunakan oleh pengguna lain!");
                                        return;
                                    }

                                    // SUBMIT FORM
                                    var formData = $(form).serialize();

                                    $.ajax({
                                        url: '/daftar-pekerja',
                                        type: 'POST',
                                        data: formData,
                                        success: function (response) {
                                            toastr.success("Data berjaya disimpan!");
                                            $('#daftarModal').modal('hide');
                                            location.reload();
                                        },

                                        error: function (xhr, status, error) {
                                            console.error("Form Submit Error:", xhr.responseText);
                                            toastr.error("Ralat ketika menyimpan data!");
                                        }

                                    });

                                } catch (innerErr) {
                                    console.error("Email check try/catch error:", innerErr);
                                    toastr.error("Ralat semasa menyemak email.");
                                }
                            },

                            error: function (xhr, status, error) {
                                console.error("Email check Ajax error:", xhr.responseText);
                                toastr.error("Tidak dapat menyemak email.");
                            }
                        });

                    } catch (innerErr) {
                        console.error("EMP ID try/catch error:", innerErr);
                        toastr.error("Ralat semasa menyemak ID pekerja.");
                    }
                },

                error: function (xhr, status, error) {
                    console.error("EMP ID Ajax error:", xhr.responseText);
                    toastr.error("Tidak dapat menyemak ID pekerja.");
                }

            });

        } catch (e) {
            console.error("General try/catch error:", e);
            toastr.error("Ralat tidak dijangka berlaku.");
        }

    });

});
</script>


<script>
$(function(){
    //paparanMaklumat
    $("#tableSenarai").on("click", ".lihatMaklumatModal", function(){

        var id = $(this).attr('data-id');
        console.log("id lihat ", id);

    $.ajax({
        url: '/disp-maklumat',
        type: 'GET',
        data: {id:id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {

            // console.log("Raw data:", data);
            // console.log("Data type:", typeof data);
            // console.log("First element:", data[0]);
            // console.log("Name value:", data[0]['name']);

            var disp = data[0];

            var nama = disp['name'];
            var empID = disp['empID'];
            var email = disp['email'];
            var position = disp['positions'];
            var typeCon = disp['contract_type'];
            var startdate = formatDate(disp['start_date']);
            var endDate = formatDate(disp['end_date']);
            console.log(startdate)
            var phone = disp['phone'];
            var status = disp['status'];


            setValArray('#tableLihatMaklumat #EMPNAME', nama);
            setValArray('#tableLihatMaklumat #EMPID', empID);
            setValArray('#tableLihatMaklumat #EMPEMAIL', email);
            setValArray('#tableLihatMaklumat #EMPPOS', position);
            setValArray('#tableLihatMaklumat #EMPCONTYPE', typeCon);
            setValArray('#tableLihatMaklumat #EMPSTARTDATE', startdate);
            setValArray('#tableLihatMaklumat #EMPENDDATE', endDate);
            
            if (phone == null) {
                setValArray('#tableLihatMaklumat #EMPPHONE', '-');
            } else {
                setValArray('#tableLihatMaklumat #EMPPHONE', phone);
            }

            if (status == 1) {
                setValArray('#tableLihatMaklumat #EMPSTATUS', 'AKTIF');
            } else {
                setValArray('#tableLihatMaklumat #EMPSTATUS', 'TIDAK AKTIF');
            }



            $('#lihatMaklumatModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error("Error:", xhr.responseText);
            alert("Error: " + error);
        }
    });
    
        
    });
}); //end paparanMaklumat



    $(function(){
        //paparanKemaskini
        $("#tableSenarai").on("click", ".kemaskiniModal", function(){


            var id = $(this).attr('data-id');

                $.ajax({
                url: '/disp-maklumat',
                type: 'GET',
                data: {id: id},
                success: function(data){

                    var disp = data[0];

                    var nama = disp['name'];
                    var empID = disp['empID'];
                    var email = disp['email'];
                    var position = disp['positions'];
                    var typeCon = disp['contract_type'];
                    var startdate = disp['start_date'];   //YYYY-MM-DD
                    var endDate = disp['end_date'];
                    var phone = disp['phone'];
                    var status = disp['status'];
                    var $modal = $('#kemaskiniModal');

                    $("#eNama").val(nama);
                    $("#eidEMP").val(empID);
                    $("#ePos").val(position);
                    $("#eType").val(typeCon);
                    $("#eStart").val(startdate);
                     $("#eEmail").val(email);

                    if (endDate == null) {
                        $("#eEnd").val(endDate);
                    } else {
                        $("#eEnd").val(endDate);
                    }

                    if (status == 1) {
                        // $("#eStatus").val('Aktif');
                        $modal.find('#eStatus').prop('checked', true);
                        $modal.find('#eStatusText').text('Aktif');
                    } else {
                        $modal.find('#eStatus').prop('checked', false);
                        $modal.find('#eStatusText').text('Tidak Aktif');
                    }

                    $('#kemaskiniModal').modal('show');
                    
                }
            })        
        });
    }); //end paparanKemaskini

    //submit form kemaskini
    $('#formKemaskiniPekerja').on("submit", function(){

        var email = $("#eEmail").val();
        var empID = $("#eidEMP").val();

        $.ajax({
            url:'/semak-email',
            type:'GET',
            data: {EMAIL: email, EMPID: empID},
            async: true,
            dataType:'JSON',
            success:function(data) {
                    
                if (data > 0){

                toastr.error("Email telah digunakan oleh pengguna lain!");
                return false;

                }else{

                    var formData = $('#formKemaskiniPekerja').serializeArray();
                    
                    var statusExists = formData.some(function(item) {
                        return item.name === 'eStatus';
                    });
                    
                    // If checkbox is unchecked, add eStatus with value 0
                    if (!statusExists) {
                        formData.push({name: 'eStatus', value: '0'});
                    }
                
                    console.log("data", formData);


                    $.ajax({
                    url: '/kemaskini-maklumat',
                    type: 'POST',
                    data: formData,
                    success: function(data){
                            toastr.success('Maklumat Berjaya dikemaskini');
                        }
                    });
                    setTimeout( function () {
                    window.location.reload(true);
                    }, 140000);
                }
            }
        });

        return false;
    });



    // Open delete modal 
    $(document).on('click', '.deleteModal', function () {
        let id = $(this).data('id');
        let name = $(this).data('name');

        $('#deleteUserName').text(name);

        // Store the id in the "Padam" button
        $('#confirmDeleteBtn').data('id', id);

        // Show the modal
        $('#deleteModal').modal('show');
    });

    //padam button inside modal delete
    $('#confirmDeleteBtn').click(function(e) {

        let id = $(this).data('id');
        console.log("id", id)

        $.ajax({
            url: '/padam-maklumat/' + id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response){
                toastr.success('Maklumat Berjaya dipadam');
                setTimeout(function () {
                    window.location.reload(true);
                }, 2000);
            },
            error: function(xhr){
                toastr.error('Gagal memadam maklumat');
            }
        });


    });
</script>

<script>

    function toMY(dateStr) {
        if (!dateStr) return "";
        const [y, m, d] = dateStr.split("-");
        return `${d}/${m}/${y}`;
    }

    //to make the input editable
    $("#eStart, #eEnd").on("focus", function () {
        let val = $(this).val();

        // Convert DD/MM/YYYY → YYYY-MM-DD
        if (val.includes("/")) {
            let [d, m, y] = val.split("/");
            $(this).val(`${y}-${m}-${d}`);
        }

        // Change input type to date
        $(this).attr("type", "date");
    });

    // Format date from yymmdd to dd/mm/yy
    function formatDate(formatdate){

        var date = new Date(formatdate);
        var day = date.getDate();
        var month = date.getMonth();
        var year = date.getFullYear();

        var monthNames = [
            "JANUARI", "FEBRUARI", "MAC", "APRIL", "MEI", "JUN",
            "JULAI", "OGOS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DISEMBER"
        ];

        var newDate = day + ' ' + monthNames[month] + ' ' + year;

        return newDate;
    }
    
    
    function setValArray(tableid, arrval){ // Set value dari table yang mempunyai array.
        $(tableid).html(arrval);
    }

    //validate email input
    function ValidateEmail(inputText) {

    // Email regex
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (inputText.value.match(mailformat)) {
            inputText.setCustomValidity(""); // valid → clear error
            return true;

        } else {
            inputText.setCustomValidity("Sila masukkan format emel yang betul"); 
            return false;
        }
    }

    //to change text at kemaskini status
    $(document).ready(function() {
        $('#eStatus').change(function() {
            if ($(this).is(':checked')) {
                $('#eStatusText').text('Aktif');
                $('#eStatus').val('1');
            } else {
                $('#eStatusText').text('Tidak Aktif');
                $('#eStatus').val('0');
            }
        });
    });
</script>
@endpush