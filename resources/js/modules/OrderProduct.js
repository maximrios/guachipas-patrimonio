function init() {
    
}

function addForm() {
    $('#quantity').on('change', function() {
        calculate();
    });
    $('#unit_price').on('change', function() {
        calculate();
    });
}

function calculate() {
    var quantity = document.getElementById('quantity').value;
    var price = document.getElementById('unit_price').value;
    var total = document.getElementById('total_price');
    var result = quantity * price;
    total.value = result;
}

export { init, addForm }