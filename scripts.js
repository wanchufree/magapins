const btnCart = document.querySelector('.container-cart-icon');
const containerCartProducts = document.querySelector('.container-cart-products');
btnCart.addEventListener('click', () => {containerCartProducts.classList.toggle('hidden-cart');});
const cartInfo = document.querySelector('.cart-product');
const rowProduct = document.querySelector('.row-product');
const productsList = document.querySelector('.container-items');
let allProducts = [];
const valorTotal = document.querySelector('.total-pagar');
const contarProductos = document.querySelector('#contador-productos');
const cartEmpty = document.querySelector('.cart-empty');
const cartTotal = document.querySelector('.cart-total');
productsList.addEventListener('click', e => {
    if (e.target.classList.contains('btn-add-cart')) {
        const product = e.target.parentElement;
        const variant = product.querySelector('.dropdowns').selectedOptions[0].text;
        const quantityInput = parseInt(product.querySelector('.quantity-input').value);
        const infoProduct = {
            quantity: quantityInput,
            title: product.querySelector('h2').textContent,
            price: product.querySelector('.price').textContent,
            variant: variant,
        };
        const exists = allProducts.some(product =>
            product.title === infoProduct.title && product.variant === infoProduct.variant
        );
        if (exists) {
            const products = allProducts.map(product => {
                if (product.title === infoProduct.title && product.variant === infoProduct.variant) {
                    product.quantity += quantityInput;
                    return product;
                } else {
                    return product;
                }
            });
            allProducts = [...products];
        } else {
            allProducts = [...allProducts, infoProduct];
        }
        showHTML();
    }
});
rowProduct.addEventListener('click', e => {
    if (e.target.classList.contains('icon-close')) {
        const productElement = e.target.parentElement;
        const title = productElement.querySelector('.titulo-producto-carrito').textContent;
        const variant = productElement.querySelector('.variant-producto-carrito').textContent;
        allProducts = allProducts.filter(product =>
            !(product.title === title && product.variant === variant)
        );
        showHTML();
    }
});
const showHTML = () => {
    if (!allProducts.length) {
        cartEmpty.classList.remove('hidden');
        rowProduct.classList.add('hidden');
        cartTotal.classList.add('hidden');
        btnEmptyCart.classList.add('hidden');
        btnCheckout.classList.add('hidden');
    } else {
        cartEmpty.classList.add('hidden');
        rowProduct.classList.remove('hidden');
        cartTotal.classList.remove('hidden');
        btnEmptyCart.classList.remove('hidden');
        btnCheckout.classList.remove('hidden');
    }
    rowProduct.innerHTML = '';
    let total = 0;
    let totalOfProducts = 0;
    allProducts.forEach(product => {
        const containerProduct = document.createElement('div');
        containerProduct.classList.add('cart-product');
        containerProduct.innerHTML = `
            <div class="info-cart-product">
                <span class="cantidad-producto-carrito">${product.quantity}</span>
                <p class="titulo-producto-carrito">${product.title}</p>
                <p class="variant-producto-carrito">${product.variant}</p>
                <span class="precio-producto-carrito">${product.price}</span>
            </div>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="icon-close"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                />
            </svg>
        `;
        rowProduct.append(containerProduct);
        total += parseFloat(product.quantity * product.price.slice(1));
        totalOfProducts += product.quantity;
    });
    valorTotal.innerText = `$${total.toFixed(2)}`;
    contarProductos.innerText = totalOfProducts;
    saveLocal(allProducts);
};
const btnEmptyCart = document.querySelector('#empty-cart');
const btnCheckout = document.querySelector('#checkout');
btnEmptyCart.addEventListener('click', () => {
    allProducts = [];
    showHTML();
});
function updatePrice(element) {
    const container = element.closest('.info-product');
    const selectElement = container.querySelector('.dropdowns');
    const inputElement = container.querySelector('.quantity-input');
    const priceElement = container.querySelector('.price');
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const unitPrice = parseFloat(selectedOption.value);
    const quantity = parseInt(inputElement.value);
    const totalPrice = unitPrice * quantity;
    priceElement.textContent = `$${totalPrice.toFixed(2)}`;
}
        function handleReceptionOptionChange() {
            var addressContainer = document.getElementById('address-container');
            var deliveryOption = document.querySelector('input[name="receptionOption"][value="delivery"]');
            if (deliveryOption.checked) {
                addressContainer.style.display = 'block';
            } else {
                addressContainer.style.display = 'none';
            }
        }
        function handlePaymentOptionChange() {
            var cbuContainer = document.getElementById('cbu-container');
            var transferOption = document.querySelector('input[name="paymentOption"][value="transfer"]');
            if (transferOption.checked) {
                cbuContainer.style.display = 'block';
            } else {
                cbuContainer.style.display = 'none';
            }
        }
        const preferedColorScheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        const slider = document.getElementById('slider');
        const setTheme = (theme) => {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
        }
        slider.addEventListener('click', ()  => {
            let switchToTheme = localStorage.getItem('theme') === 'dark' ? 'light' : 'dark';
            setTheme(switchToTheme);
        });
        setTheme(localStorage.getItem('theme') || preferedColorScheme);
document.addEventListener('click', function (event) {
    const cart = document.querySelector('.container-cart-products');
    const cartIcon = document.querySelector('.container-cart-icon');
    const deleteButton = event.target.closest('.icon-close');
    const ATCButton = event.target.closest('.btn-add-cart');
    if (!cart.contains(event.target) && !cartIcon.contains(event.target) && !deleteButton && !ATCButton) {
        cart.classList.add('hidden-cart');
    }
});
const saveLocal = () => {localStorage.setItem('products', JSON.stringify(allProducts));}
document.addEventListener('keydown', function (event) {
    const modal = document.querySelector('.modalmask');
    const dialog = document.querySelector('dialog');
    if (event.key === 'Escape' && modal) {
        modal.style.opacity = 0;
        modal.style.pointerEvents = 'none';
        dialog.removeAttribute('open');
    }
});
document.addEventListener('keydown', function (event) {
    const cart = document.querySelector('.container-cart-products');
    if (event.key === 'Escape' && !cart.classList.contains('hidden-cart')) {
        cart.classList.add('hidden-cart');
    }
});
document.querySelector('.btn-add-cart').addEventListener('click', function() {
  const valorGuardado = localStorage.getItem('products');
  if (valorGuardado) {
    document.getElementById("miInput").value = valorGuardado;
  }
});