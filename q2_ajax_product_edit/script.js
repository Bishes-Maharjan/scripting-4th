function editProduct(id) {
    const productDiv = document.getElementById('product-' + id);
    const titleSpan = productDiv.querySelector('.product-title');
    const currentTitle = titleSpan.innerText;

    // Create input field
    const input = document.createElement('input');
    input.type = 'text';
    input.value = currentTitle;
    
    // Create save button
    const saveBtn = document.createElement('button');
    saveBtn.innerText = 'Save';
    saveBtn.onclick = function() {
        saveProduct(id, input.value, productDiv, titleSpan);
    };

    // Replace span with input and save button
    productDiv.innerHTML = '';
    productDiv.appendChild(input);
    productDiv.appendChild(saveBtn);
}

function saveProduct(id, newTitle, productDiv, titleSpan) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "success") {
                // Update UI on success
                productDiv.innerHTML = '';
                titleSpan.innerText = newTitle;
                productDiv.appendChild(titleSpan);
                
                // Add Edit button back
                const editBtn = document.createElement('button');
                editBtn.innerText = 'Edit';
                editBtn.onclick = function() { editProduct(id); };
                productDiv.appendChild(editBtn);
            } else {
                alert("Error updating product.");
            }
        }
    };
    
    xhr.send("id=" + encodeURIComponent(id) + "&title=" + encodeURIComponent(newTitle));
}
