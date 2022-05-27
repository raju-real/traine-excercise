<tr>
    <td>
      <select name="languages[]" class="form-control col-md-4">
        <option value="">Select Language</option>
        @foreach($languages as $language)
          <option value="{{ $language->id }}">{{ $language->name }}</option>
        @endforeach
      </select>
    </td>
    <td>
      <input type="text" name="file_name[]" value="" class="form-control" placeholder="File Title">
    </td>
    <td>
      <input type="file" name="files[]" class="form-control col-md-4" value="">
    </td>
    <td>
      <button type="button" class="btn btn-danger btn-sm mt-1 col-md-4" onclick="deleteRow(this)">
          <i class="fa fa-trash"></i>
        </button>
    </td>
  </tr>