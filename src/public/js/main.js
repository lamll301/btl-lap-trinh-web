
function calculateCurrentPrice(old_price, discount) {
    const currentPriceInput = document.getElementById('current_price');
    var currentPrice = Math.ceil((old_price - old_price * discount / 100) / 1000) * 1000;
    currentPriceInput.value = currentPrice;
}

function buttonBuy(prod_id) {
    var quantity = document.getElementById('quantity_prod').value;
    if (quantity) {
        var buyLink = document.getElementById('buy_link');
        buyLink.href = '/watch-shop/src/resources/views/order.php?prod_id=' + prod_id + '&quantity=' + quantity;
    }
    else alert("Vui lòng nhập số lượng bạn muốn mua!")
}

