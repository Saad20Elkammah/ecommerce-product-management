document.addEventListener("DOMContentLoaded", function () {
    const productForm = document.getElementById("productForm");

    function openModal(mode, product = null) {
        document.getElementById("productModal").classList.remove("hidden");
        document.getElementById("modalTitle").innerText = mode === "edit" ? "Edit Product" : "Add Product";
        productForm.reset();
        clearErrors();
        document.getElementById("productId").value = product ? product.id : '';
        if (product) {
            document.getElementById("name").value = product.name;
            document.getElementById("description").value = product.description;
            document.getElementById("price").value = product.price;
            document.getElementById("quantity").value = product.quantity;
        }
    }

    function closeModal() {
        document.getElementById("productModal").classList.add("hidden");
    }

    function validateForm() {
        clearErrors();
        let isValid = true;
        const name = document.getElementById("name").value.trim();
        const description = document.getElementById("description").value.trim();
        const price = document.getElementById("price").value;
        const quantity = document.getElementById("quantity").value;

        if (!name || name.length > 255) {
            showError("name", name ? "Product name must be less than 255 characters." : "Product name is required.");
            isValid = false;
        }
        if (!description || description.length < 10) {
            showError("description", description ? "Description must be at least 10 characters." : "Description is required.");
            isValid = false;
        }
        if (!price || isNaN(price) || price < 0 || price > 100000) {
            showError("price", price ? "Price must be between 0 and 100,000." : "Price is required.");
            isValid = false;
        }
        if (!quantity || isNaN(quantity) || !Number.isInteger(Number(quantity)) || quantity < 0 || quantity > 100000) {
            showError("quantity", quantity ? "Quantity must be a non-negative integer and less than 100,000." : "Quantity is required.");
            isValid = false;
        }

        return isValid;
    }

    function showError(field, message) {
        document.getElementById(`error-${field}`).innerText = message;
    }

    function clearErrors() {
        document.querySelectorAll(".error-message").forEach(el => el.innerText = "");
    }

    productForm.addEventListener("submit", function (event) {
        event.preventDefault();
        if (!validateForm()) return;

        const productId = document.getElementById("productId").value;
        const url = productId ? `/products/${productId}` : "/products";
        const method = productId ? "PUT" : "POST";

        const data = {
            name: document.getElementById("name").value,
            description: document.getElementById("description").value,
            price: document.getElementById("price").value,
            quantity: document.getElementById("quantity").value,
            _token: '{{ csrf_token() }}',
        };

        $.ajax({
            url: url,
            method: method,
            data: data,
            success: function (response) {
                if (response.success) {
                    location.reload();
                } else {
                    alert("Failed to save the product.");
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(field => showError(field, errors[field][0]));
                } else {
                    alert("An error occurred while saving the product.");
                }
            }
        });
    });

    window.deleteProduct = function (id) {
        if (confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                url: `/products/${id}`,
                method: "DELETE",
                data: { _token: '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert("Failed to delete the product.");
                    }
                },
                error: function () {
                    alert("An error occurred while deleting the product.");
                }
            });
        }
    };

    window.openModal = openModal;
    window.closeModal = closeModal;
});
