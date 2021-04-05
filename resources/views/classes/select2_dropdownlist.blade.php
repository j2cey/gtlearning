<script>
    $('.classe_id').select2({
        placeholder: 'Selectionnez une Classe',
        ajax: {
            url: '/classes.softget',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.intitule,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
