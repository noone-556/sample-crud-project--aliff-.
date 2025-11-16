<div class="col-sm-12">
    <form action="" method="" name="formKemaskiniPekerja" id="formKemaskiniPekerja">
    @csrf
    <table class="table table-borderless table-sm">
         <tbody>
            <tr hidden>
                <td>Id:</td>
                <td colspan="2" style="width:70%"> 
                <input type="text" class="form-control-plaintext form-sm" id="idEMP" name="idEMP" value="" readonly/>
                </td>
            </tr>
            <tr>
                <td>Nama:</td>
                <td colspan="2" style="width:70%">
                <input type="text" class="form-control-plaintext form-sm" id="eNama" name="eNama" value="" readonly/>
                </td>
            </tr>
            <tr>
                <td>ID Pekerja:</td>
                <td colspan="2" style="width:70%">
                <input type="text" class="form-control-plaintext form-sm" id="eidEMP" name="eidEMP" value="" readonly/>
                </td>
            </tr>
            <tr>
                <td>Jawatan:</td>
                <td colspan="2" style="width:70%">
                <input type="text" class="form-control-plaintext form-sm" id="ePos" name="ePos" value="" readonly/>
                </td>
            </tr>
            <tr>
                <td>Jenis Kontrak:</td>
                <td colspan="2" style="width:70%">
                    <select class="form-control form-control-sm select-arrow" id="eType" name="eType" required>
                        <option value="">-- Pilih Jenis Kontrak --</option>
                        <option value="TETAP">TETAP</option>
                        <option value="KONTRAK">KONTRAK</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tarikh Mula:</td>
                <td colspan="2" style="width:70%" >
                <input type="text" class="form-control form-sm" id="eStart" name="eStart" value="" />
                </td>
            </tr>
			<tr>
                <td>Tarikh Tamat:</td>
                <td colspan="2" style="width:70%" >
                <input type="text" class="form-control form-sm" id="eEnd" name="eEnd" value="" />
                </td>
            </tr>
			<tr id="email">
                <td>Alamat Email:</td>
                <td colspan="2" style="width:70%">
                <input type="email" maxlength="50" class="form-control form-control-sm" id="eEmail" name="eEmail"
                    onchange="ValidateEmail(this);" required>
                </td>
            </tr>
            <tr>
                <td>Status:</td>
                <td colspan="2" style="width:70%">
                <input type="text" class="form-control-plaintext form-sm" id="eStatus" name="eStatus" value="" readonly/>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-end">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"> | Kemaskini</i></button>
                </td>
            </tr>
        </tbody>
    </table>
  </form>
</div>

<style>
    .select-arrow {
    background-image: url("data:image/svg+xml;utf8,<svg width='16' height='16' fill='%23666' viewBox='0 0 16 16' xmlns='http://www.w3.org/2000/svg'><path d='M3 6l5 5 5-5H3z'/></svg>");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 14px;
    padding-right: 30px; /* space for icon */
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
</style>