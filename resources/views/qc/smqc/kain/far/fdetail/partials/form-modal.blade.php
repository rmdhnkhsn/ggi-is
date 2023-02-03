<style>
	table, td, th {
  border: 1px solid black;
  }
  table {
    border-collapse: collapse;
  }
			#box1{
				width:180px;
				height:180px;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tabel{
				width:100%;
				height: auto;
        padding:10px;
        border: 2px solid grey;
				background:white;
			}
      #tb{
        width:100%;
				height: auto;
        border: 1px solid grey;
				background:white;
			}
      #tbl{
        width:100%;
				height: 200px;
        border: 1px solid grey;
				background:white;
			}
      h7 {
        text-decoration: overline;
      }
      input[type=text] {
        width: 100%;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid black;
}
</style>
<div class="col-lg-12">
    <table style="width:100%; height:80px; overflow:auto;">
        <tr>
            <td colspan="9"><center><font color="black" size="2"> FABRIC DEFECT</FONT></center></td>
            <td colspan="9"><center><font color="black" size="2">PRINT/DEFECT</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">DYING DEFECT</FONT></center></td>
        </tr>
        <tr>
            <td colspan="3"><center><font color="black" size="2">HOLE</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">LUMP THREAD</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">YARN DEFECT</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">SHADE</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">MISPRINT</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">BLEED</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">DIRTY</FONT></center></td>
        </tr>
        <tr>
            <td colspan="3"><center><font color="black" size="2">BOLONG</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">B.TIMBUL</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">CCT.TENUN</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">BELANG</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">WRN.HILANG</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">BLOBOR</FONT></center></td>
            <td colspan="3"><center><font color="black" size="2">NODA</FONT></center></td>
        </tr>
        <tr>
            <td><center><font color="black" size="2">F</FONT></center></td>
            <td><center><font color="black" size="2">T</FONT></center></td>
            <td><center><font color="black" size="2">S</FONT></center></td>
            <td><center><font color="black" size="2">F</FONT></center></td>
            <td><center><font color="black" size="2">T</FONT></center></td>
            <td><center><font color="black" size="2">S</FONT></center></td>
            <td><center><font color="black" size="2">F</FONT></center></td>
            <td><center><font color="black" size="2">T</FONT></center></td>
            <td><center><font color="black" size="2">S</FONT></center></td>
            <td><center><font color="black" size="2">F</FONT></center></td>
            <td><center><font color="black" size="2">T</FONT></center></td>
            <td><center><font color="black" size="2">S</FONT></center></td>
            <td><center><font color="black" size="2">F</FONT></center></td>
            <td><center><font color="black" size="2">T</FONT></center></td>
            <td><center><font color="black" size="2">S</FONT></center></td>
            <td><center><font color="black" size="2">F</FONT></center></td>
            <td><center><font color="black" size="2">T</FONT></center></td>
            <td><center><font color="black" size="2">S</FONT></center></td>
            <td><center><font color="black" size="2">F</FONT></center></td>
            <td><center><font color="black" size="2">T</FONT></center></td>
            <td><center><font color="black" size="2">S</FONT></center></td>
        </tr>
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- Baris 2  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 2  -->
        <!-- Baris 3  -->
        <tr>                                     
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 3  -->
        <!-- Baris 4  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 4  -->
        <!-- Baris 5  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 5  -->
        <!-- Baris 6  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 6  -->
        <!-- Baris 7  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 7  -->
        <!-- Baris 8  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 8  -->
        <!-- Baris 9  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 9  -->
        <!-- Baris 10  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 10  -->
        <!-- Baris 11  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 11  -->
        <!-- Baris 12  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 12  -->
        <!-- Baris 13  -->
        <tr>
            <input type="hidden" name="report_id[]" id="report_id" value="{{ $data->report_id}}">
            <input type="hidden" name="fars_id[]" id="fars_id" value="{{ $data->id}}">
            <input type="hidden" name="roll_no[]" id="roll_no" value="{{ $data->roll_no}}">
            
            <td><input type="number" name="bol_f[]" id="bol_f" style="width: 3.4em"></td>
            <td><input type="number" name="bol_t[]" id="bol_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bol_s[]" id="bol_s">
                <option value="">S</option>
                <option value="2">2</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="tim_f[]" id="tim_f" style="width: 3.4em"></td>
            <td><input type="number" name="tim_t[]" id="tim_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="tim_s[]" id="tim_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="ten_f[]" id="ten_f" style="width: 3.4em"></td>
            <td><input type="number" name="ten_t[]" id="ten_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="ten_s[]" id="ten_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="bel_f[]" id="bel_f" style="width: 3.4em"></td>
            <td><input type="number" name="bel_t[]" id="bel_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="bel_s[]" id="bel_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="wh_f[]" id="wh_f" style="width: 3.4em"></td>
            <td><input type="number" name="wh_t[]" id="wh_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="wh_s[]" id="wh_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="blbr_f[]" id="blbr_f" style="width: 3.4em"></td>
            <td><input type="number" name="blbr_t[]" id="blbr_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="blbr_s[]" id="blbr_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
            <td><input type="number" name="nod_f[]" id="nod_f" style="width: 3.4em"></td>
            <td><input type="number" name="nod_t[]" id="nod_t" style="width: 3.4em"></td>
            <td>
            <select tabindex="1" style="width: 3.4em" name="nod_s[]" id="nod_s">
                <option value="">S</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </td>
        </tr>
        <!-- batas suci baris 13  -->
    </table>
</div>
<div class="col-lg-12" style="padding-top:15px;">
    <button type="submit" class="btn btn-primary btn-block">Create</button>
</div>
