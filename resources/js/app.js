import './bootstrap';

// normalne by som to riesil cez vue, requesty axios, ale ked jednoducho, tak jednoducho, idem s jquery

$('#autocompleteInput').on('input', function() {
    let query = $(this).val()
    let container = $('#autocompleter');

    container.empty();

    if (query === '') {
        return;
    }
    axios.get('api/search', {
        params: {
            q: query,
        }
    })
    .then( response => {
        console.log(query)
        // uvedomujem si, ze som to dal natvrdo :)
        if (response.data.data.length === 0) {
            container.append('<p> Žiadne výsledky pre "' + query + '"</p>')
        }
        response.data.data.forEach(item => {
            container.append('<a href="http://127.0.0.1:8000/city/' + item.id + '">' + item.name + '</a><br/>')
        });
    })
    .catch( error => {
        console.log(error)
    })
});
