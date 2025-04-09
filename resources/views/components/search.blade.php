<label>Agente *</label><br>
<select name="employees[]" id="{{ $id }}" class="form-control select" style="width:100%;" multiple required>
    <option value="0">Seleccione un item ...</option>
</select>

<script>
    var key = "{{ $key ?? 'id' }}";
    $(document).ready(function() {
        $('.select').select2({
            ajax: {
                url: '{{ $url }}',
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item[key],
                                text: `${item.profile.first_name} ${item.profile.last_name}` 
                            }
                        })
                    }
                }
            }
        });

        const template = (data) => {
            return data.name;
        }
    });
</script>