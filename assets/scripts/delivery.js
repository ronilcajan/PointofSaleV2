$(document).ready(function () {
    $('#supplier_search').typeahead({
        source: function (query, result) {
            $.ajax({
                url: "../model/search_suppliers.php",
                data: {query:query},            
                dataType: "json",
                type: "POST",
                success: function (data) {
                    result($.map(data, function (item) {
                        return item;
                    }));
                }
            });
        }
    });
});