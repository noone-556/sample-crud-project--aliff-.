<div class="col-12">
    <form id="formMaklumatPekerja" name="formMaklumatPekerja">
        @csrf
        <table class="table table-borderless table-sm" id="daftarMaklumatPekerja">
            <tbody>
                <!-- Hidden ID -->
                <tr hidden>
                    <td colspan="2">
                        <input type="text" class="form-control-plaintext" id="ID" name="ID" value="" readonly />
                    </td>
                </tr>

                <!-- Section Header -->
                <tr>
                    <th class="text-primary" colspan="2">Maklumat Pekerja</th>
                </tr>

                <tr>
                    <td style="width:25%">Nama:</td>
                    <td style="width:75%">
                        <input type="text" class="form-control" id="nameEMP" name="nameEMP"
                            onkeyup="this.value = this.value.toUpperCase();"
                            oninvalid="this.setCustomValidity('Ruangan ini wajib diisi')"
                            oninput="setCustomValidity('')"
                            required 
                        />
                    </td>
                </tr>

                <tr>
                    <td>ID Pekerja:</td>
                    <td>
                        <input type="text" class="form-control" id="empID" name="empID" 
                            onkeyup="this.value = this.value.toUpperCase();" required/>
                    </td>
                </tr>

                <tr>
                    <td>Alamat Emel:</td>
                    <td>
                        <input type="text" class="form-control" id="empEmail" name="empEmail" value="" onchange="ValidateEmail(this);" required/>
                    </td>
                </tr>

                <tr>
                    <td>No telefon:</td>
                    <td>
                        <input type="text" class="form-control" id="empPhone" name="empPhone" value="" />
                    </td>
                </tr>

                <tr>
                    <td>Jawatan:</td>
                    <td>
                        <input type="text" class="form-control" id="roleEMP" name="roleEMP" 
                        onkeyup="this.value = this.value.toUpperCase();" required/>
                    </td>
                </tr>

                <tr>
                    <td>Jenis Kontrak:</td>
                    <td colspan="2" style="width:70%">
                        <select class="form-control form-control-sm select-arrow" id="typeCon" name="typeCon" required>
                            <option value="">-- Pilih Jenis Kontrak --</option>
                            <option value="TETAP">TETAP</option>
                            <option value="KONTRAK">KONTRAK</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Tarikh Mula:</td>
                    <td>
                        <input type="date" class="form-control" id="startDate" name="startDate" value="" required/>
                    </td>
                </tr>
                <tr>
                    <td>Tarikh Akhir:</td>
                    <td>
                        <input type="date" class="form-control mb-3" id="endDate" name="endDate" value="" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-end">
                        <button type="submit" class="btn btn-sm btn-primary" ><i class="fa fa-update"><i class="fa fa-save"></i> </i> Daftar </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
