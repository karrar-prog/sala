<label for="input_f4">اختر الاجابة</label>

<select onchange="showDiv('hidden_div','hidden_div2', this)"  id="input_f4" name="f4" class="form-control">
    {{--<option selected value="0">العوام</option>--}}
    {{--<option selected value="0">الساة</option>--}}
    <option disabled selected value> -- هل سجلت مسبقا هنا -- </option>
    <option   value="0">سجلت - واحتاج الى سلة اخرى</option>
    <option  value="1">لم استلم</option>
</select>
