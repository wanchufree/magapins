<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="pines, pins, remeras, camisetas, remera, camiseta, vinilo textil, vinilos textiles, telas, tejido, aprietapapeles, sujeta papeles, sujeta documentos, imanes, magnetos, sublimados, sublimaciones, sublimar, estampados, sublimado, sublimar tejidos, estampados personalizados, iman, imán, pulseras, brazaletes, tyvek, pulsera, brazalete, trucker, gorras, gorra, camionero, gorra trucker, sublimacion, sublimaciones, tazas, taza, orca, polímero, cerámica, llaveros, llavero, destapador, destapadores, mates, mate, sublimate, sublimates, algodones, algodón, estampado, poliéster, magapins, magali galimany villeta, teo galimany, estampados textiles, personalización de textiles, artículos personalizados">
    <meta name="author" content="Magali Galimany Villeta">
    <meta name="description" content="Articulos de Marketing y Accesorios para cualquier marca, evento o momento">
    <meta property="og:description" content="Articulos de Marketing y Accesorios para cualquier marca, evento o momento">
    <meta property="og:title" content="magapins">
    <meta property="og:url" content="https://www.magapins.com.ar/">
    <meta property="og:image" content="./assets/logo.png">
    <meta property="og:share_count" content="true">
    <title>magapins | bienvenido</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" type="image/png" href="./assets/logo.png">
</head>
<body>
<header>
        <img class="logo" src="./assets/logo.png" alt="Logo">
        <label class="switch">
            <input type="checkbox" id="slider" checked>
            <span class="slider"></span>
        </label>
        <a href="" class="hidden"><svg class="icon-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg></a>
			<div class="container-icon">
				<div class="container-cart-icon">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" class="icon-cart"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
					<div class="count-products">
						<span id="contador-productos">0</span>
					</div>
				</div>
				<div class="container-cart-products hidden-cart">
					<div class="row-product hidden">
						<div class="cart-product">
								<span class="cantidad-producto-carrito"></span>
								<p class="titulo-producto-carrito"></p>
								<span class="precio-producto-carrito"></span>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-close"> <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
						</div>
					</div>
					<div class="cart-total hidden">
						<h3>Total:</h3>
						<span class="total-pagar"></span>
					</div>
					<p class="cart-empty">El carrito está vacío</p>
                    <div class="xxx">
                    <button id="empty-cart" class="btn-action hidden">Vaciar carrito</button>
                    <a href="#modal1"><button id="checkout" class="btn-action hidden">Finalizar compra</button></a>
                    </div>
                </div>
			</div>
</header>
<h1 class="center">Bienvenido a magapins!</h1>
<div class="container-items">
<?php
    $servername = "190.228.29.53";
    $username = "megapines";
    $password = "iDgMqm8LoPN0";
    $dbname = "magapines";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {die("Conexión fallida: " . $conn->connect_error);}
    $sql = "SELECT id, img, nameProduct, quantity FROM products";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<div class='item'>";
    if (strpos($row['img'], 'video') !== false) {
    echo "<video src='./assets/{$row['img']}.mp4' controls title='{$row['nameProduct']}'></video>";}
    else
    {echo "<img src='./assets/{$row['img']}.png' title='{$row['nameProduct']}' alt='{$row['nameProduct']}'>"; }
    echo "<div class='info-product center'>";
    echo "<h2>{$row['nameProduct']}</h2>";
    if ($row['quantity'] > 0) {
    echo '<p>Stock: <svg class="icon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg></p>';
    } else {
    echo "<p>sin stock</p>";
    }
    $product_id = $row['id'];
    $sql_variants = "SELECT name, price FROM variants WHERE product_id = $product_id";
    $result_variants = $conn->query($sql_variants);
    if ($result_variants->num_rows > 0) {
        echo "<select class='center dropdowns' name='variant' onchange='updatePrice(this)'>";
        $first_variant = true;
        $first_variant_price = 0;
        while($variant = $result_variants->fetch_assoc()) {
            if ($first_variant) {
                $first_variant_price = $variant['price'];
                $first_variant = false;
            }
            echo "<option value='{$variant['price']}'>{$variant['name']}</option>";
        }
        echo "</select>";
        echo "<input class='dropdowns center quantity-input' type='number' name='quantity' value='1' min='1' onchange='updatePrice(this)'>";
        echo "<p class='price center'>\${$first_variant_price}</p>";
    } else {
        echo "<input class='center quantity-input' type='number' value='1' min='1' onchange='updatePrice(this)'>";
        echo "<p class='price center'>Precio no disponible</p>";
    }
    echo "<button class='btn-add-cart'>Añadir al carrito</button>";
    echo "</div>";
    echo "</div>";
}
} else {
    echo "0 resultados";
}
$conn->close();
?>
</div>
<div id="modal1" class="modalmask">
    <div class="modalbox movedown">
        <dialog open id='dialog'>
        <a href="#close" title="Close" class="close"><svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="icon-close">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                />
        </svg></a>
        <form method="POST" action="email.php">
            <h2>Completá los datos para finalizar tu pedido.</h2>
            <label for="full-name">Nombre y Apellido:</label>
            <input type="text" id="full-name" name="full_name" required>
            <br/>
            <label>Email:<input type="email" name="email" autocomplete="email"></label>
            <br/>
            <label>Teléfono:<input class="mt" type="tel" name="phone" autocomplete="phone" required/></label>
            <br/>
            <label><input type="radio" name="receptionOption" onChange="handleReceptionOptionChange()" value="delivery" required />Envío</label>
            <label><input class="mt" type="radio" name="receptionOption" value="pickup" onChange="handleReceptionOptionChange()" required />Retiro</label>
            <br/>
            <div id="address-container"><label">Dirección:</label><input type="text" id="address" name="address" autocomplete="address"/></div>
            <label"><input type="radio" name="paymentOption" value="cash" onChange="handlePaymentOptionChange()" required />Efectivo </label>
            <label"><input  type="radio"  name="paymentOption" value="transfer" onChange="handlePaymentOptionChange()" required  />Transferencia  </label>
            <input type="text" id="miInput" name="miInput" style="display: none;">
            <div id="cbu-container"><p>CBU: 0720555288000035799768</p></div>
            <br />
            <button type="submit" class="btn-action">Realizar Pedido</button>
        </form>
    </div>
    </dialog>
</div>
<footer>
<a href="mailto:magapins@gmail.com?subject=Hola."><svg class="icon-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z"/></svg></a>
<a href="https://instagram.com/magapins" target="_blank" rel="noopener noreferrer"><svg class="icon-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
<a href="https://wa.me/+5491136995220" target="_blank" rel="noopener noreferrer"><svg class="icon-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></a>
<p class="center">Desarrollado por <br> <a href="https://www.instagram.com/teo.gali/" target="_blank">Galimany Web Design</a></p>
</footer>
<script src="scripts.js"></script>
</body>
</html>