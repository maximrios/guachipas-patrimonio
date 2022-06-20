/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import * as Order from './modules/Order';
import * as OrderProduct from './modules/OrderProduct';

window.Order = Order;
window.OrderProduct = OrderProduct;

$(document).on('click', '.btn-delete', function(event) {
    event.preventDefault()
    let form = $(this).closest('form')[0]
    let message = $(this).attr('data-message')
    Swal.fire({
        title: 'Confirmar',
        html: message,
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonText: 'Confirmar'
    }).then(function(result) {
        if(result.isConfirmed === true) {
            form.submit();
        }
    })    
})