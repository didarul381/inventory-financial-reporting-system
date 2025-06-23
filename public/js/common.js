// common.js

// Reusable validation setup function
function setupValidation(formSelector, rules, messages) {
    $(formSelector).validate({
        rules: rules,
        messages: messages,
        errorClass: 'text-danger',
        errorElement: 'small',
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        }
    });
}

$(document).ready(function () {
    // Example: Product form validation
    setupValidation('#productForm', {
        name: { required: true },
        purchase_price: { required: true, number: true, min: 0 },
        sell_price: { required: true, number: true, min: 0 },
        stock: { required: true, digits: true, min: 1 },
    }, {
        name: "Please enter product name",
        purchase_price: "Enter a valid purchase price",
        sell_price: "Enter a valid sell price",
        stock: "Enter a valid stock quantity",
    });

    // Example: Sale form validation
    setupValidation('#salesForm', {
        product_id: { required: true },
        quantity: { required: true, digits: true, min: 1 },
        discount: { number: true, min: 0 },
        customer_paid: { required: true, number: true, min: 0 },
    }, {
        product_id: "Please select a product",
        quantity: "Enter a valid quantity",
        discount: "Enter a valid discount amount",
        customer_paid: "Enter the amount paid by customer",
    });
});
